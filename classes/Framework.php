<?php 
namespace classes;

class FrameWork
{
    protected $session;
    protected $data;

    public function __construct() {
        
    }
    public function loadModel($name)    
    {
        $modelname = '\models\\'.$name;
        return new $modelname;
    }
    public function getSession()    
    {
        return $this->session;
    }
    public function getData($key)
    {
        return $this->data[$key];
    }
}
