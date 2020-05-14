<?php 

namespace App\Controllers;

use Phalcon\Di;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use App\Models\Users;

class UserController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->users = Users::find();
    }

    public function manageAction()
    {
        $this->view->users = Users::find();

        
        // $query = new Query(
        //     'SELECT * FROM Users WHERE USER_CATEGORY!=0',
        //     $this->di
        // );
        // $users = $query->execute();
        // $this->view->setVar('users', $users);
        
        
        // $query = $this->modelsManager->createQuery('SELECT * FROM Users');
        // $results = $query->execute();
        // $this->view->results = $results;
        
    } 

    public function registerAction()
    {
        
    }
    
    public function loginAction()
    {
        
    }

}