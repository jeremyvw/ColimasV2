<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Models\Book;
use App\Models\Users;
use App\Models\Borrows;

class BorrowController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function manageAction()
    {
        $this->view->borrows = Borrows::find();
    }

    public function detailAction($id)
    {
        $borrow = Borrows::findFirstByBORROW_ID($id);

        $this->view->borrow = $borrow;
    }

    public function updateAction($id)
    {
        $borrow = Borrows::findFirstByBORROW_ID($id);

        $expectedreturndate = $this->request->getPost('expectedreturndate');
        $status = $this->request->getPost('status');

        $borrow->BORROW_EXPECTEDRETURNDATE = $expectedreturndate;
        $borrow->BORROW_STATUS = $status;

        $success = $borrow->save();
        if($success)
        {
            $this->flashSession->success('Request has been successfully modified.');
        }
        $this->response->redirect('/borrow/manage');

    }
}