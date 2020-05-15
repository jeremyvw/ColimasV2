<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Validation\BookValidation;
use App\Models\Books;
use App\Models\Authors;
use App\Models\Categories;

class BookController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function manageAction()
    {
        $this->view->books = Books::find();

    }

    public function createAction()
    {
        $this->view->authors = Authors::find();
        $this->view->categories = Categories::find();

    }

    public function addAction()
    {
        $book = new Books();
        $this->view->authors = Authors::find();
        $this->view->categories = Categories::find();

        // $validation = new BookValidation();
        // $messages = $validation->validate($_POST);
        // if(count($messages))
        // {
        //     foreach ($message as $messages)
        //     {
        //         $this->flashSession->error($message->getMessage());
        //     }
        //     $this->response->redirect('/book/create');
        // }
        // else
        // {
            $title = $this->request->getPost('title');
            $year = $this->request->getPost('year');
            $shelf = $this->request->getPost('shelf');
            $description = $this->request->getPost('description');
            $pagecount = $this->request->getPost('pagecount');
            $status = $this->request->getPost('status');
            $count = $this->request->getPost('count');

            // $book->BOOK_TITLE = $this->request->getPost('title');
            // $book->BOOK_YEAR = $this->request->getPost('year');
            // $book->BOOK_SHELF = $this->request->getPost('shelf');
            // $book->BOOK_DESCRIPTION = $this->request->getPost('description');
            // $book->BOOK_PAGECOUNT = $this->request->getPost('pagecount');
            // $book->BOOK_STATUS = $this->request->getPost('status');
            // $book->BOOK_COUNT = $this->request->getPost('count');
            
            if($this->request->hasFiles())
            {
                $image = $this->request->getUploadedFiles()[0];
                $path = 'img/books/'.$image->getName();
                $book->BOOK_COVERIMAGE = $path;
                $image->moveTo($path);
            }

            $authorid = $this->request->getPost('authorid');
            $categoryid = $this->request->getPost('categoryid');

            // $book->AUTHOR_ID = $this->request->getPost('authorid');
            // $book->CATEGORY_ID = $this->request->getPost('categoryid');
    
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

    public function editAction($id)
    {
        // $id = $this->dispatcher->getParam("id");
        $book = Books::findFirstByBOOK_ID($id);
        
        $this->view->book = $book;
        $this->view->authors = Authors::find();
        $this->view->categories = Categories::find();
    }

    public function updateAction($id)
    {
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

    public function destroyAction($id)
    {
        $book = Books::findFirstByBOOK_ID($id);

        $success = $book->delete();
        
        if($success)
        {
            $this->flashSession->success('Book has been successfully removed from collection.');
        }
        $this->response->redirect('/book/manage');
    }

    public function searchAction()
    {
        $searchKey = $this->request->getPost('searchKey');
        $searchBy = $this->request->getPost('searchBy');
        $searchKey = '%'.$searcKey.'%';
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
                ->where('BOOK_TITLE LIKE :BOOK_TITLE:')
                ->bind(
                    [
                        'BOOK_TITLE' => $searchKey,
                    ]
                )
                ->execute();
        }
        $this->view->results = $results;
    }

}