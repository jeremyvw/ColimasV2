<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Validation\BookValidation;
use App\Models\Books;
use App\Models\Authors;
use App\Models\Categories;
use Phalcon\Mvc\Model\Manager;

class BookController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->books = Books::find();
    }

    public function createAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $cat = $this->session->get('auth')['category']; 
        $temp = $this->session->get('auth')['id'];
        if($cat == 0){
            $this->view->authors = Authors::find();
            $this->view->categories = Categories::find();
        }
        else{
            $this->view->borrows = Borrows::findByUSER_ID($temp);
        }
    }

    public function addAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $cat = $this->session->get('auth')['category']; 
        $temp = $this->session->get('auth')['id'];
        if($cat == 0){
            $book = new Books();
            $this->view->authors = Authors::find();
            $this->view->categories = Categories::find();

            $title = $this->request->getPost('title');
            $year = $this->request->getPost('year');
            $shelf = $this->request->getPost('shelf');
            $description = $this->request->getPost('description');
            $pagecount = $this->request->getPost('pagecount');
            $status = $this->request->getPost('status');
            $count = $this->request->getPost('count');
            
            if($this->request->hasFiles())
            {
                $image = $this->request->getUploadedFiles()[0];
                $path = 'img/books/'.$image->getName();
                $book->BOOK_COVERIMAGE = $path;
                $image->moveTo($path);
            }

            $authorid = $this->request->getPost('authorid');
            $categoryid = $this->request->getPost('categoryid');

            $checkBookTitle = Books::findFirst("BOOK_TITLE = '$title'");

            if($checkBookTitle)
            {
                $this->flashSession->error('Book title already exist.'); 
                $this->response->redirect('/book/create');  
            }
            else
            {
                $book->BOOK_TITLE = $title;
                $book->BOOK_YEAR = $year;
                $book->BOOK_SHELF = $shelf;
                $book->BOOK_DESCRIPTION = $description;
                $book->BOOK_PAGECOUNT = $pagecount;
                $book->BOOK_STATUS = $status;
                $book->BOOK_COUNT = $count;
                $book->AUTHOR_ID = $authorid;
                $book->CATEGORY_ID = $categoryid;
                
                $success = $book->save();
        
                if($success)
                {
                    $this->flashSession->success('Book has been successfully added into collection.');
                }
                $this->response->redirect('/book/manage');
            
            }
        }
        else{
            $this->view->borrows = Borrows::findByUSER_ID($temp);
        }
    }

    public function editAction($id)
    {
        // $id = $this->dispatcher->getParam("id");
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $cat = $this->session->get('auth')['category']; 
        $temp = $this->session->get('auth')['id'];
        if($cat == 0){
            $book = Books::findFirstByBOOK_ID($id);
        
            $this->view->book = $book;
            $this->view->authors = Authors::find();
            $this->view->categories = Categories::find();
        }
        else{
            $this->response->redirect('/');
        }
        
    }

    public function updateAction($id)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $cat = $this->session->get('auth')['category']; 
        $temp = $this->session->get('auth')['id'];
        if($cat == 0){
            $book = Books::findFirstByBOOK_ID($id);

            $this->view->authors = Authors::find();
            $this->view->categories = Categories::find();

            $title = $this->request->getPost('title');
            $shelf = $this->request->getPost('shelf');
            $description = $this->request->getPost('description');
            $pagecount = $this->request->getPost('pagecount');
            $status = $this->request->getPost('status');
            $count = $this->request->getPost('count');
            
            if($this->request->hasFiles())
            {
                unlink($book->BOOK_COVERIMAGE);
                $image = $this->request->getUploadedFiles()[0];
                $path = 'img/books/'.$image->getName();
                $book->BOOK_COVERIMAGE = $path;
                $image->moveTo($path);
            }

            $authorid = $this->request->getPost('authorid');
            $categoryid = $this->request->getPost('categoryid');

            // $book = Books::findFirst("id = '$BOOK_ID'");
            $book->BOOK_TITLE = $title;
            $book->BOOK_SHELF = $shelf;
            $book->BOOK_DESCRIPTION = $description;
            $book->BOOK_PAGECOUNT = $pagecount;
            $book->BOOK_STATUS = $status;
            $book->BOOK_COUNT = $count;

            $book->AUTHOR_ID = $authorid;
            $book->CATEGORY_ID = $categoryid;

            if ($book->save() === false)
            {
                foreach ($book->getMessages() as $message)
                {
                    echo $message, "\n";
                }
            }
            else
            {
                $this->response->redirect('/book/manage');
            }
        }
        else{
            $this->response->redirect('/');
        }
    }

    public function destroyAction($id)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('/user/login');
        }

        $cat = $this->session->get('auth')['category']; 
        $temp = $this->session->get('auth')['id'];
        if($cat == 0){
            $book = Books::findFirstByBOOK_ID($id);

            $success = $book->delete();
            
            if($success)
            {
                $this->flashSession->success('Book has been successfully removed from collection.');
            }
            $this->response->redirect('/book/manage');
        }
        else{
            $this->response->redirect('/');
        }
    }

    public function detailAction($id)
    {
        $book = Books::findFirstByBOOK_ID($id);
        
        $this->view->book = $book;
        $this->view->authors = Authors::find();
        $this->view->categories = Categories::find();
    }

    public function searchAction()
    {
        $searchKey = $this->request->getPost('searchKey');
        $searchBy = $this->request->getPost('searchBy');
        $searchKey = '%'.$searchKey.'%';
        if($searchBy == 'Author'){
            $searchKey = '%'.$searchKey.'%';
            $query = $this->modelsManager->createQuery('SELECT * FROM Books, Authors
            WHERE AUTHOR_NAME LIKE :searchKey:');
            $results = $query->execute([
                'searchKey' => $searchKey,
            ]);
        }
        else if($searchBy == 'BOOK_TITLE'){
            $searchKey = '%'.$searchKey.'%';
            $query = $this->modelsManager->createQuery('SELECT * FROM Books
            WHERE BOOK_TITLE = :searchKey:');
            $results = $query->execute([
                'searchKey' => $searchKey,
            ]);
        }
        else{
            $results = Books::query()
                    ->where('BOOK_TITLE LIKE :judul:')
                    ->bind(
                        [
                            'judul' => $searchKey,
                        ]
                    )
                    ->execute();
        }
        $this->view->results = $results;
    }

}