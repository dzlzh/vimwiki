<?php

namespace prototype;

/**
 * Class Prototype
 */
class Prototype
{
    protected $param;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * setParam
     *
     * @return void
     */
    public function setParam($param)
    {
        $this->param = $param;
    }

    /**
     * getParam
     *
     * @return void
     */
    public function getParam()
    {
        return $this->param;
    }
    
}

$obj = new Prototype('a');
echo $obj->getParam();
// a

$obj1 = clone $obj;
$obj1->setParam('b');
echo $obj1->getParam();
// b
