<?php

namespace NOMVC\Core;

use MongoDB;

/**
 * Provides a connection to MongoDB database.
 * `mongodb` driver must be installed. Also installing the high level library `mongodb/mongodb`
 * from Composer is required
 *
 * Class MongoDatabase
 * @package NOMVC\Core
 */
class MongoDatabase
{
    public $dbConn;

    public function __construct()
    {
        $this->dbConn = new Client("mongodb://" . DB_HOST . DB_PORT, $this->getAdditionalConnectionStringOptions());
    }

    private function getAdditionalConnectionStringOptions() : array
    {
        $options = [];
        if(DB_USERNAME != null)
        {
            $options['username'] = DB_USERNAME;
        }
        if(DB_PASSWORD != null)
        {
            $options['password'] = DB_PASSWORD;
        }

        return $options;
    }

    public static function toMongoDatabase($database) : MongoDatabase
    {
        return $database;
    }
}