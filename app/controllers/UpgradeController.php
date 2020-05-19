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
        $upgrade = Upgrade::findFirstByUPGRADE_ID($id);
        // $upgrade->UPGRADE_ID = $upgrade->UPGRADE_ID;
        $upgrade->UPGRADE_RESPONDEDTIME = date('Y-m-d h:i:sa');
        $upgrade->UPGRADE_STATUS = 1;
        $upgrade->save();

        $user = Users::findFirstByUSER_ID($upgrade->USER_ID);
        $user->USER_CATEGORY = $user->USER_CATEGORY + 1;
        $success = $user->update();

        if($success)
        {
            $this->flashSession->success('Input data berhasil');
        }
        // passing a message to the view
        $this->response->redirect('/upgrade');
    }
}