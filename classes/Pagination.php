<?php 
namespace classes;
include_once  __DIR__ . '/../utils/classloader.php';


class Pagination {
   
    
    private $perpage;
    private $max;
    private $links;
    private $page_no;
    
    public function __construct(int $perpage,int $maxcount,$links=5) {
        $this->perpage = $perpage;  
        $this->max = ceil($maxcount/$perpage);  
        $this->links = $links;  


        if(isset($_GET["p"]) ) {
            $page_no = $_GET["p"];
            if($page_no>$this->max && $page_no<0)
                $this->page_no = 1;
            else
                $this->page_no = $page_no;
        }else{
            $this->page_no = 1;
        }
    }


    public function getPageNo()
    {
        return $this->page_no;
    }
    public function getMax()
    {
        return $this->max;
    }

    
    public function fiteringText()
    {
        $start = ($this->page_no-1) * $this->perpage; 
        return " LIMIT " . $start . ", " . $this->perpage;
    }

    public function getpageArr()
    {
        if ($this->links > $this->max) {
                return range(1, $this->max);
        }else {
            if ($this->page_no < $this->links-1) {
                return range(1,$this->links);
            }elseif( $this->page_no>($this->max-3) ){
                return range($this->max - ($this->links-1) , $this->max);
            }else {
                return range($this->page_no-2,$this->page_no+2);
            }
        }
    }


}


