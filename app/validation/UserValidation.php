<?php

namespace App\Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;

class UserValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'USER_USERNAME',
            new PresenceOf(
                [
                    'message' => 'Username cannot be empty'
                ]
            )
        );
        $this->add(
            'USER_PASSWORD',
            new PresenceOf(
                [
                    'message' => 'Password cannot be empty'
                ]
            )
        );
        $this->add(
            'USER_EMAIL',
            new PresenceOf(
                [
                    'message' => 'Email cannot be empty'
                ]
            )
        );
        $this->add(
            'USER_NAME',
            new PresenceOf(
                [
                    'message' => 'Name cannot be empty'
                ]
            )
        );
        $this->add(
            'USER_BIRTHDATE',
            new PresenceOf(
                [
                    'message' => 'Birthdate cannot be empty'
                ]
            )
        );
        $this->add(
            'USER_GENDER',
            new PresenceOf(
                [
                    'message' => 'Gender cannot be empty'
                ]
            )
        );
    }
}