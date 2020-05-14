<?php

namespace App\Controllers;

use App\Models\Users;

class SessionController extends ControllerBase
{
    public function beforeExecuteRoute()
    {

    }

    public function indexAction()
    {

    }

    public function loginAction()
    {
        $email = $this->request->getPost('email', 'string');
        $password = $this->request->getPost('password', 'string');
        $user = Users::findFirst(
            [
                'conditions' => 'USER_EMAIL = :email:',
                'bind' => [
                    'email' => $email,
                ],
            ]
        );
        if($user)
        {
            // Check user's password
            $check = $this
                ->security
                ->checkHash($password, $user->USER_PASSWORD);
                if($check === true)
                {
                    // Set a session
                    $this->session->set(
                        'auth',
                        [
                            'id' => $user->USER_ID,
                            'email' => $user->USER_EMAIL,
                            'name' => $user->USER_NAME,
                            'password' => $user->USER_PASSWORD,
                            'category' => $user->USER_CATEGORY,
                        ]
                    );
                    $this->response->redirect('/');
                }
                else
                {
                    $this->flashSession->error('Incorrect Password');
                    $this->response->redirect('/user/login');
                }
        }
        else
        {
            $this->flashSession->error('Incorrect Email');
            $this->response->redirect('/user/login');
        }    
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/');
    }

    public function registerAction()
    {
        $user = new Users();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');
        $birthdate = $this->request->getPost('birthdate');
        $gender = $this->request->getPost('gender');
        $category = $this->request->getPost('category');
        
        if($this->request->hasFiles())
        {
            $image = $this->request->getUploadedFiles()[0];
            $path = 'img/profiles/'.$image->getName();
            $user->USER_PHOTO = $path;
            $image->moveTo($path);
        }

        if($password != "")
        {
            $checkUser = Users::findFirst("USER_EMAIL = '$email'");
            if($checkUser)
            {
                $this->flashSession->error('Email is already been used');
                $this->response->redirect('/user/register');
            }
            else
            {
                $user->USER_USERNAME = $username;
                $user->USER_PASSWORD = $this->security->hash($password);
                $user->USER_EMAIL = $email;
                $user->USER_NAME = $name;
                $user->USER_BIRTHDATE = $birthdate;
                $user->USER_GENDER = $gender;
                $user->USER_CATEGORY = $category;
                $user->USER_PHOTO = $path;

                $success = $user->save();

                if($success)
                {
                    
                }
                $this->response->redirect('/user/login');
            }
        }


    }
}
