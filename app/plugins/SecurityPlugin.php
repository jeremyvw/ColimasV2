<?php
declare(strict_types=1);

/**
 * This file is part of the Invo.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Plugins;

use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Acl\Component;
use Phalcon\Acl\Role;
use Phalcon\Acl\Enum;
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Injectable
{
    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get('auth')['USER_CATEGORY'];
        if ($auth == '0') {
            $role = 'Librarian';

        } 
        else{
            $role = 'Student';
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        if (!$acl->isComponent($controller)) {
            $dispatcher->forward([
                'controller' => 'error',
                'action'     => 'notFound',
            ]);

            return false;
        }

        $allowed = $acl->isAllowed($role, $controller, $action);
        if (!$allowed) {
            $dispatcher->forward([
                'controller' => 'error',
                'action'     => 'unauthorized',
            ]);
            

            // $this->session->destroy();

            return false;
        }


        return true;
    }

    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */

    protected function getAcl(): AclList
    {
        if (isset($this->persistent->acl)) {
            return $this->persistent->acl;
        }

        $acl = new AclList();
        $acl->setDefaultAction(Enum::DENY);

        // Register roles
        $roles = [
            'Librarian'  => new Role(
                'Librarian',
                'Has access on all systems'
            ),
            'Student' => new Role(
                'Student',
                'Can only borrow books'
            )
        ];

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        //Yang gak boleh diakses admin
        $privateResources = [
            'supirtruk'             => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus', 'search'],
            'pabrik'                => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus'],
            'pemiliktruk'           => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus'],
            'user'                  => ['index', 'tambah', 'hapus','master','register'],
            'alatberat'             => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus'],
            'cucian'                => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus'],
            'user'                  => ['index', 'tambah', 'proses', 'hapus', 'master'],
            'pemakaianalatberat'    => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus', 'search'],
            'transaksi'             => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus', 'search'],
            'pengiriman'            => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus', 'search'],
            'keuangan'              => ['index'],
            'mahsun'                => ['index','laporan'],
        ];
        foreach ($privateResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }

        //Public area resources
        $publicResources = [
            'index'                 => ['index'],
            'error'                 => ['notFound', 'serverError', 'unauthorized'],
            'session'               => ['index', 'login', 'logout'],
        ];

        foreach ($publicResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }
        
        // yang boleh diakses admin
        $adminResources = [
            'pemakaianalatberat'    => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus'],
            'user'                  => ['admin'],
            'transaksi'             => ['index', 'tambah', 'proses', 'edit', 'update', 'hapus'],

        ];
        foreach ($adminResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }

        //Grant access to public areas to both master and admins
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        //Grant access to private area to role master
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('master', $resource, $action);
            }
        }
        //Grant access to private area to role admin
        foreach ($adminResources as $resource => $actions) {
                foreach ($actions as $action) {
                        $acl->allow('admin', $resource, $action);
                }
        }
                
        //The acl is stored in session, APC would be useful here too
        // $acl->allow('admin', 'user', 'admin');
        $this->persistent->acl = $acl;

        return $acl;
    }
}