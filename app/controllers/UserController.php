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

    public function profileAction()
    {

    }

    public function editAction($id)
    {
        $user = Users::findFirstByUSER_ID($id);

        $this->view->user = $user;
    }

    public function updateAction()
    {

    }

    public function registerAction()
    {
        
    }
    
    public function loginAction()
    {
        
    }

    public function searchAction()
    {
        $searchKey = $this->request->getPost('searchKey');
        $searchBy = $this->request->getPost('searchBy');
        $searchKey = '%'.$searchKey.'%';
        if($searchBy == 'USER_NAME'){
            $searchKey = '%'.$searchKey.'%';
            $query = $this->modelsManager->createQuery('SELECT * FROM Users
            WHERE USER_NAME LIKE :searchKey:');
            $results = $query->execute([
                'searchKey' => $searchKey,
            ]);
        }
        else if($searchBy == 'USER_CATEGORY'){
            $searchKey = '%'.$searchKey.'%';
            $query = $this->modelsManager->createQuery('SELECT * FROM Users
            WHERE USER_CATEGORY LIKE :searchKey:');
            $results = $query->execute([
                'searchKey' => $searchKey,
            ]);
        }
        else{
            $results = Users::query()
                ->where('USER_NAME LIKE :USER_NAME:')
                ->bind(
                    [
                        'USER_NAME' => $searchKey,
                    ]
                )
                ->execute();
        }
        $this->view->result = $results;
    }

}