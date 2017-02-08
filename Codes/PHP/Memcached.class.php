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
    private $debug = false;

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
            return $this->get($key);
        } else if ($number >= 2) {
            if ($value === null) {
                $this->delete($key);
            } else {
                $this->set($key, $value, $time);
            }
        }
    }

    /**
     * set
     *
     * @return boolean
     */
    private function set($key, $value, $time = null)
    {
        if ($this->time === null) {
            $time = $this->time;
        }
        $this->m->set($key, $value, $time);
        if ($this->debug) {
            if ($this->m->getResultCode()) {
                return false;
            }
        }
    }
    
    /**
     * get
     *
     * @return boolean
     */
    private function get($key)
    {
        $return = $this->m->get($key);
        if ($this->debug) {
            if ($this->m->getResultCode()) {
                return false;
            }
        }
        return $return;
    }

    /**
     * delete
     *
     * @return boolean
     */
    private function delete($key)
    {
        $this->m->delete($key);
    }
    
    
    /**
     * getError
     *
     * @return string
     */
    public function getError()
    {
        if ($this->error) {
            return $this->error;
        } else {
            return $this->m->getResultMessage();
        }
    }
    
    
}
