<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Models\Books;
use App\Models\Users;
use App\Models\Borrows;

class BorrowController extends ControllerBase
{
    public function initialize()
    {
        // // $this->view->peminjaman = Peminjaman::find();
        // $this->view->peminjaman = Peminjaman::find('id_user = ');
        // $temp = $this->session->get(('auth')['id_user']); 
        $temp = $this->session->get('auth')['id'];
        $this->view->borrows = Borrows::findByUSER_ID($temp);
        $this->view->buku = Books::find();
        // $this->view->penulis = Penulis::find();
        // $this->view->penulis = Tipe::find();
    }
    public function indexAction()
    {
        
    }
    public function detailAction()
    {

    }
    public function addAction($id)
    {
        $book = Books::findFirstByBOOK_ID($id);

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
        $borrow->BORROW_RETURNDATE = strftime("%Y-%m-%d %H:%M:%S", strtotime("$date +7 day"));
        $borrow->BORROW_EXPECTEDRETURNDATE = strftime("%Y-%m-%d %H:%M:%S", strtotime("$date +3 day"));
        $borrow->BORROW_PENALTY = ((strtotime($borrow->BORROW_RETURNDATE) - strtotime($borrow->BORROW_EXPECTEDRETURNDATE))/86400)*10000;
        $success = $borrow->save();

        if($success)
        {
            $this->flashSession->success('Request has been successfully modified.');
        }
        $this->response->redirect('/borrow');

    }
}