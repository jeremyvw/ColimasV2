<?php
// declare(strict_types=1);

namespace App\Controllers;

use App\Models\Upgrade;
use App\Models\Users;
// use App\Validation\UserValidation;

class UpgradeController extends ControllerBase
{
    public function indexAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        $this->view->upgrades = Upgrade::find();
        // if(!$this->session->has('auth')){
        //     $this->response->redirect('/auth/login');
        // }
    }

    public function requestAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $upg = new Upgrade();
        $upg->USER_ID=$this->session->get('auth')['id'];
        // $pem->tanggal_pengembalian = NULL;
        $upg->UPGRADE_REQUESTDATE = date('Y-m-d h:i:sa');
        $upg->UPGRADE_STATUS = 0;
        // Store and check for errors
        $success = $upg->save();


        if($success)
        {
            $this->flashSession->success('Input data berhasil');
        }
        // passing a message to the view
        $this->response->redirect('/upgrade');
    }

    public function updateAction($id)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/auth/login');
        }
        else {
            $upg = Upgrade::findFirstByUPGRADE_ID($id);
            $temp = $upg->USER_ID;
            $upg->UPGRADE_REQUESTDATE = $upg->UPGRADE_REQUESTDATE;
            $upg->UPGRADE_RESPONDEDTIME = date('Y-m-d h:i:sa');
            $upg->UPGRADE_STATUS = 1;
            $upg->update();

            // $user = Users::findFirstByUSER_ID($this->session->get('auth')['id']);


            // $username = $this->request->getPost('username');
            // $name = $this->request->getPost('name');
            // $birthdate = $this->request->getPost('birthdate');
            // $gender = $this->request->getPost('gender');
            
            // if($this->request->hasFiles())
            // {
            //     unlink($user->USER_PHOTO);
            //     $image = $this->request->getUploadedFiles()[0];
            //     $path = 'img/profiles/'.$image->getName();
            //     $user->USER_PHOTO = $path;
            //     $image->moveTo($path);
            // }
            // else 
            // {
            //     $user->USER_PHOTO = 'img/profiles/basicpict.png';
            // }
    
            // $user->USER_USERNAME = $username;
            // $user->USER_PASSWORD = $user->USER_PASSWORD;
            // $user->USER_EMAIL = $user->USER_EMAIL;
            // $user->USER_NAME = $name;
            // $user->USER_BIRTHDATE = $birthdate;
            // $user->USER_GENDER = $gender;
            // $user->USER_CATEGORY = $user->USER_CATEGORY;
            // // $user->USER_PHOTO = $path;
    
            // $success = $user->save();
    
            // $user = Users::findFirstByUSER_ID($temp);
            // $user->USER_USERNAME = $user->USER_USERNAME;
            // $user->USER_PASSWORD = $user->USER_PASSWORD;
            // $user->USER_EMAIL = $user->USER_EMAIL;
            // $user->USER_NAME = $user->USER_NAME;
            // $user->USER_BIRTHDATE = $user->USER_BIRTHDATE;
            // $user->USER_GENDER = $user->USER_GENDER;
            // $user->USER_CATEGORY = $user->USER_CATEGORY + 1;
            // $user->USER_PHOTO = $user->USER_PHOTO;
            // $success = $user->save();

            if($success)
            {
                $this->flashSession->success('Input data berhasil');
            }
            // passing a message to the view
            $this->response->redirect('/upgrade');
        }
    }
}

