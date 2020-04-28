<?php

class ErrorCodes
{
    public static function no_error() {
        return array('error' => null);
    }
    public static function db_connection_error($details = null) {
        return self::encode(0, 'Database connection error!', $details);
    }

    public static function db_mysql_exception($details = null) {
        return self::encode(1, 'Mysql exception!', $details);
    }

    public static function token_invalid_error($details = null) {
        return self::encode(2, 'Token is invalid!', $details);
    }

    public static function token_invalid_format_error($details = null) {
        return self::encode(3, 'Token\'s format is invalid!', $details);
    }

    private static function encode($code, $msg, $details) {
        return array('error' =>
            array(
            'code' => $code,
            'msg' => $msg,
            'details' => $details
        ));
    }
}