<?php

namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;

class Categories extends Model
{
    public $CATEGORY_ID;
    public $CATEGORY_NAME;

    public function initialize()
    {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('categories');

        $this->hasMany(
            'CATEGORY_ID',
            'Books',
            'CATEGORY_ID'
        );
    }
}