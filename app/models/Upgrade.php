<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class Upgrade extends Model
{
    public $UPGRADE_ID;
    public $USER_ID;
    public $UPGRADE_REQUESTDATE;
    public $UPGRADE_RESPONDEDTIME;
    public $UPGRADE_STATUS;

    /**
     *  Dipanggil sekali untuk digunakan seluruh instance
     */
    public function initialize(){
        // Untuk mengeset database service yang digunakan untuk read data, default: 'db'
        // database service harus diregister di container dependecy injector
        $this->setReadConnectionService('db');

        // Untuk mengeset database service yang digunakan untuk write data, default : 'db'
        $this->setWriteConnectionService('db');

        // Untuk mengeset schema, default : empty string
        $this->setSchema('dbo');

        // Untuk mengeset nama tabel, default : nama class
        $this->setSource('upgrade');

        $this->belongsTo(
            'USER_ID',
            Users::class,
            'USER_ID',
            [
                'reusable' => true,
                'alias' => 'users'
            ]
        );
    }

    /**
     *  Dipanggil setiap pembuatan instace class baru
     */
    // public function onConstruct(){

    // }

}