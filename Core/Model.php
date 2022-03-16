<?php

namespace Core;

use App\Config;
use mysqli;

/**
 * Base model
 *
 * PHP version 7.0
 */
abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $db = new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_NAME);
            if ($db->connect_error)
                die("Connection failed: " . $db->connect_error);
        }

        return $db;
    }
}
