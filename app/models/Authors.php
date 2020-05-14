<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class Authors extends Model
{
    public $AUTHOR_ID;
    public $AUTHOR_NAME;

    public function initialize()
    {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('authors');

        $this->hasMany(
            'AUTHOR_ID',
            'Books',
            'AUTHOR_ID'
        );
    }
}