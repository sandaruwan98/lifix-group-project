<?php 
namespace classes;
include_once  __DIR__ . '/../utils/classloader.php';


class Pagination {
   
    
    private $perpage;
    private $max;
    private $links;
    
    public function __construct(int $perpage,int $max,$links=5) {
        $this->perpage = $perpage;  
        $this->max = $max;  
        $this->links = $links;  
    }

    public function getpageArr(int $page_no)
    {
        if ($this->links > $this->max) {
                return range(1, $this->max);
        }else {
            if ($page_no < $this->links-1) {
                return range(1,$this->links);
            }elseif( $page_no>($this->max-3) ){
                return range($this->max - ($this->links-1) , $this->max);
            }else {
                return range($page_no-2,$page_no+2);
            }
        }
    }
}


