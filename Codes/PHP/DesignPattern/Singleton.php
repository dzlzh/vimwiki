<?php

namespace singleton;

/**
 * Class Singleton
 */
class Singleton
{
    private static $instance;

    /**
     * __construct
     *
     * @return void
     */
    private function __construct()
    {
        return null;
    }

    /**
     * getInstance PHP7+
     *
     * @return self
     */
    public function getInstance() : Singleton
    {
        self::$instance = self::$instance ?? new self();
        return self::$instance;
    }

    /**
     * getInstance PHP7-
     *
     * @return self
     */
    public static function getInstance_()
    {
        self::$instance = !self::$instance ? new self() : self::$instance;
        return self::$instance;
    }
    
}

//PHP7+
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();
var_dump($obj1 === $obj2);

//PHP7-
$obj3 = Singleton::getInstance_();
$obj4 = Singleton::getInstance_();
var_dump($obj3 === $obj4);
