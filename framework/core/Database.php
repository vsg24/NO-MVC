<?php

namespace NOMVC\Core;

use Aura\Sql\ExtendedPdo;
use Aura\Sql\ConnectionLocator;

class Database
{
    public $connections;
    public $db;

    public function __construct()
    {
        $this->connections = new ConnectionLocator;
        // Default connection
        $this->connections->setDefault(function () {
            return new ExtendedPdo(
                DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME,
                DB_USERNAME,
                DB_PASSWORD
            );
        });

        // Uncomment and configure if you want to use different connections for read/write
        
//        // the write (master) server
//        $connections->setWrite('master', function () {
//            return new ExtendedPdo(
//                'mysql:host=master.db.localhost;dbname=database',
//                'username',
//                'password'
//            );
//        });
//
//        // read (slave) #1
//        $connections->setRead('slave1', function () {
//            return new ExtendedPdo(
//                'mysql:host=slave1.db.localhost;dbname=database',
//                'username',
//                'password'
//            );
//        });

        $this->db = $this->connections->getDefault();
    }

    public static function toDatabase($database) : Database
    {
        return $database;
    }
}