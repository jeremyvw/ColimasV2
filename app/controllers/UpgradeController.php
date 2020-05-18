<?php
// declare(strict_types=1);

namespace App\Controllers;

// use App\Models\Upgrade;
use App\Models\Users;
// use App\Validation\UserValidation;

class UpgradeController extends ControllerBase
{
    public function initialize()
    {
        // $this->view->users = Users::find();
    }

    public function indexAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        // if(!$this->session->has('auth')){
        //     $this->response->redirect('/auth/login');
        // }
    }

    public function updateAction($id)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/auth/login');
        }
        $temp = Upgrade::findFirstById_user($this->session->get('auth')['id_user']);
        if($temp->id_user == $this->session->get('auth')['id_user'])
        {
            $this->response->redirect('/upgrade');
        }
        else if($id <= $this->session->get('auth')['membership'] ){
            $this->response->redirect('/upgrade');
        }
        else {
            $upg = new Upgrade();
            $upg->id_user=$this->session->get('auth')['id_user'];
            // $pem->tanggal_pengembalian = NULL;
            $upg->wanted_membership = $id;
            $upg->tanggal_pengajuan = date('Y-m-d h:i:sa');
            $upg->tanggal_penyetujuan = date('Y-m-d h:i:sa');
            $upg->status_upgrade = 0;
            // Store and check for errors
            $success = $upg->save();


            if($success)
            {
                $this->flashSession->error('Input data berhasil');
            }
            // passing a message to the view
            $this->response->redirect('/users/profil');
        }
    }
}

