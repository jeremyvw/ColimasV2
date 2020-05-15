<?php

namespace App\Models;

use Phalcon\Mvc\Model;
// use Phalcon\Validation;
// use Phalcon\Validation\Validator\Uniqueness;

class Users extends Model
{
    public $USER_ID;
    public $USER_USERNAME;
    public $USER_PASSWORD;
    public $USER_EMAIL;
    public $USER_NAME;
    public $USER_BIRTHDATE;
    public $USER_GENDER;
    public $USER_CATEGORY;
    public $USER_PHOTO;

    public function initialize()
    {
        $this->setReadConnectionService('db');
        $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('users');

        $this->hasMany(
            'USER_ID',
            Borrows::class,
            'USER_ID',
            [
                'reusable' => true,
                'alias' => 'borrows'
            ]
        );
    }
}