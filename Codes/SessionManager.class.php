<?php

/**
 * Class SessionManager
 * @author yourname
 */
class SessionManager
{
    private $redis;
    private $sessionSavePath;
    private $sessionName;
    private $sessionExpireTime = 30;

    /**
     * undocumented function
     *
     * @return void
     */
    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis = connect('127.0.0.1', 6379);

        $retval = session_set_save_handler(
            array($this, 'open'),
            array($this, 'close'),
            array($this, 'read'),
            array($this, 'write'),
            array($this, 'destroy'),
            array($this, 'gc')
        );
        session_start();
    }

    /**
     * open
     *
     * @return void
     */
    public function open($path, $name)
    {
        return true;
    }

    /**
     * close
     *
     * @return void
     */
    public function close()
    {
        return true;
    }

    /**
     * read
     *
     * @return void
     */
    public function read($id)
    {
        $value = $this->redis->get($id);
        return $value ? $value : '';
    }

    /**
     * write
     *
     * @return void
     */
    public function write($id, $data)
    {
        if ($this->redis->set($id, $data)) {
            $this->redis->expire($id, $this->sessionExpireTime);
            return true;
        }
        return false;
    }
    
    /**
     * destroy
     *
     * @return void
     */
    public function destroy($id)
    {
        return $this->redis->delete($id);
    }

    /**
     * gc
     *
     * @return void
     */
    public function gc($maxlifetime)
    {
        return true;
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function __destruct()
    {
        session_write_close();
    }
    
    
    
    
    
}
