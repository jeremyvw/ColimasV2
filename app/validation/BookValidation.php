<?php

namespace App\Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;

class BookValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'BOOK_TITLE',
            new PresenceOf(
                [
                    'message' => 'Book title must be filled',
                ]
            )
        );

        $this->add(
            'BOOK_YEAR',
            new PresenceOf(
                [
                    'message' => 'Book year must be filled',
                ]
            )
        );

        $this->add(
            'BOOK_SHELF',
            new PresenceOf(
                [
                    'message' => 'Book shelf must be filled',
                ]
            )
        );
    }
}