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
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        $usr = Users::findFirstByUSER_ID($this->session->get('auth')['id']);
        $this->view->user = $usr; 
    }

    public function editAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        $usr = Users::findFirstByUSER_ID($this->session->get('auth')['id']);
        $this->view->user = $usr; 
    }

    public function updateAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        $user = Users::findFirstByUSER_ID($this->session->get('auth')['id']);


        $username = $this->request->getPost('username');
        $name = $this->request->getPost('name');
        $birthdate = $this->request->getPost('birthdate');
        $gender = $this->request->getPost('gender');
        
        if($this->request->hasFiles())
        {
            unlink($user->USER_PHOTO);
            $image = $this->request->getUploadedFiles()[0];
            $path = 'img/profiles/'.$image->getName();
            $user->USER_PHOTO = $path;
            $image->moveTo($path);
        }
        else 
        {
            $user->USER_PHOTO = 'img/profiles/basicpict.png';
        }

        $user->USER_USERNAME = $username;
        $user->USER_PASSWORD = $user->USER_PASSWORD;
        $user->USER_EMAIL = $user->USER_EMAIL;
        $user->USER_NAME = $name;
        $user->USER_BIRTHDATE = $birthdate;
        $user->USER_GENDER = $gender;
        $user->USER_CATEGORY = $user->USER_CATEGORY;
        // $user->USER_PHOTO = $path;

        $success = $user->save();

        if($success)
        {
            
        }
        $this->response->redirect('/user/profile');
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