<?php


/**
 * Abstract class for getting Core_Database -instances
 */
abstract class Core_DatabaseProvider
{
    private static $databaseInstance;

    public static function init($userName, $password, $database, $host = 'localhost')
    {
        self::$databaseInstance = new mysqli(
            $host, $userName, $password, $database
        );

        if (self::$databaseInstance->connect_errno)
        {
            die(printf("Connect failed: %s\n", self::$databaseInstance->connect_errno));
        }
    }

    /**
     * Get a MySQLi instance, to change login name / username, call Core_DatabaseProvider::init()
     * @return mysqli
     */
    public static function getInstanse()
    {
        if (!self::$databaseInstance)
        {
            self::init('root', 'root', 'benchmark');
        }
        return self::$databaseInstance;
    }
}
