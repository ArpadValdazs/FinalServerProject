<?php


namespace App;


trait Singleton
{
    private static $instance = null;

    public static function getInstance(){
        return
        self::$instance ? self::$instance = new static() : self::$instance;
}
}