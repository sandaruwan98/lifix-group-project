<?php 
namespace classes;
include_once '../utils/classloader.php';

class FrameWork
{
    protected $session;
    public function __construct() {
        
    }
    public function loadModel($name)    
    {
        return new $name;
    }
    public function getSession($name)    
    {
        return $this->session;
    }
}
