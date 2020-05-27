<?php
class Connectivity
{
    private static $host = "192.168.1.3";
    private static $db = "foodies_db";
    private static $username = "root";
    private static $password = "root";

    public static function Connect()
    {
        $con = null;
        try
        {
            $con = new PDO('mysql:host='.self::$host.';dbname'.self::$db,
                self::$username,
                self::$password);

            $con->setAttribute(PDO::ATTR_TIMEOUT, 5);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo json_encode(ErrorCodes::db_mysql_exception($e->getMessage()));
        }

        return $con;
    }

    public static function getHost() {
        return self::$host;
    }
}