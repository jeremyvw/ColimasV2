<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Models\Books;
use App\Models\Users;
use App\Models\Borrows;

class BorrowController extends ControllerBase
{
    public function indexAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $cat = $this->session->get('auth')['category']; 
        $temp = $this->session->get('auth')['id'];
        if($cat == 0){
            $this->view->borrows = Borrows::find();
        }
        else{
            $this->view->borrows = Borrows::findByUSER_ID($temp);
        }
    }
    public function detailAction($id)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        // $temp = $this->session->get('auth')['id'];
        $cat = $this->session->get('auth')['category']; 
        if($cat == 0){
            $this->view->borrows = Borrows::findFirstByBORROW_ID($id);
        }
        else{
            $this->response->redirect('/user/login');
        }
    }
    public function addAction($id)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }
        $book = Books::findFirstByBOOK_ID($id);
        if($book->BOOK_COUNT <= 0){
            $this->response->redirect('/book');
        }
        else
        {
            $book->BOOK_ID=$book->BOOK_ID;
            $book->BOOK_TITLE=$book->BOOK_TITLE;
            $book->BOOK_YEAR=$book->BOOK_YEAR;
            $book->BOOK_SHELF=$book->BOOK_SHELF;
            $book->BOOK_DESCRIPTION=$book->BOOK_DESCRIPTION;
            $book->PAGECOUNT=$book->PAGECOUNT;
            $book->BOOK_STATUS=$book->BOOK_STATUS;
            $book->BOOK_COUNT=$book->BOOK_COUNT-1;
            $book->BOOK_COVERIMAGE=$book->BOOK_COVERIMAGE;
            $book->AUTHOR_ID=$book->AUTHOR_ID;
            $book->CATEGORY_ID=$book->CATEGORY_ID;
            $book->save();

            $borrow = new Borrows();

            $borrow->USER_ID=$this->session->get('auth')['id'];
            $borrow->BOOK_ID=$id;
            $borrow->BORROW_STATUS="Pending";
            $borrow->BORROW_STARTDATE = date('Y-m-d h:i:sa');
            $date = date('Y-m-d h:i:sa');
            // $borrow->BORROW_RETURNDATE = strftime("%Y-%m-%d %H:%M:%S", strtotime("$date +7 day"));
            $borrow->BORROW_EXPECTEDRETURNDATE = strftime("%Y-%m-%d %H:%M:%S", strtotime("$date +3 day"));
            if($borrow->BORROW_RETURNDATE)
            {
                $borrow->BORROW_PENALTY = ((strtotime($borrow->BORROW_RETURNDATE) - strtotime($borrow->BORROW_EXPECTEDRETURNDATE))/86400)*10000;
            }
            $success = $borrow->save();

            if($success)
            {
                $this->flashSession->success('Request has been successfully modified.');
            }
            $this->response->redirect('/borrow');

        }
    }

    public function updateAction($id)
    {
        $borrow = Borrows::findFirstByBORROW_ID($id);

        $status = $this->request->getPost('status');

        $borrow->BORROW_STATUS = $status;

        $success = $borrow->save();
        if($success)
        {
            $this->flashSession->success('Request has been successfully modified.');
        }
        $this->response->redirect('/borrow/manage');

    }
}