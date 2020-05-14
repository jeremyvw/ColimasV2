<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;

class Books extends Model
{
    public $BOOK_ID;
    public $BOOK_TITLE;
    public $BOOK_YEAR;
    public $BOOK_SHELF;
    public $BOOK_DESCRIPTION;
    public $BOOK_PAGECOUNT;
    public $BOOK_STATUS;
    public $BOOK_COUNT;
    public $BOOK_COVERIMAGE;
    public $AUTHOR_ID;
    public $CATEGORY_ID;

    public function initialize()
    {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('books');

        $this->belongsTo(
            'AUTHOR_ID',
            Authors::class,
            'AUTHOR_ID',
            [
                'reusable' => true,
                'alias' => 'authors'
            ]
        );

        $this->belongsTo(
            'CATEGORY_ID',
            Categories::class,
            'CATEGORY_ID',
            [
                'reusable' => true,
                'alias' => 'categories'
            ]
        );
    }
}