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
     * init Mem Class
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
    
}
