<?php

namespace mem;

/**
 * Class Mem
 * @author DZLZH
 */
class Mem
{
    private $type = 'Memcached';
    private $m;
    private $time = 0;
    private $error;

    /**
     * Constructor  
     *
     * @return void
     */
    public function __construct()
    {
        if (!class_exists($this->type)) {
            $this->error = "No " . $this->type;
            return false;
        } else {
            $this->m = new $this->type;
        }
    }
    
    /**
     * addServer
     *
     * @return void
     */
    public function addServer($arr)
    {
        $this->m->addServers($arr);
    }

    /**
     * s
     *
     * @return void
     */
    public function s($key, $value = '', $time = 0)
    {
        $number = func_num_args();
        if ($number == 1) {
            $this->get($key);
        } else if ($number >= 2) {
            if ($value === null) {
                $this->delete($key);
            } else {
                $this->set($key, $value, $time);
            }
        }
    }

}
