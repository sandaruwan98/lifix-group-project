<?php 
namespace classes;

class FrameWork
{
    protected $session;
   

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
   
}
