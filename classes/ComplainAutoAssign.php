<?php 

namespace classes;
include_once  __DIR__ . '/../utils/classloader.php';


class ComplainAutoAssign extends Framework{
    public function __construct() {
        $this->session = new Session('login');
    }

   
    public function coordinates(){
        $map = new \models\Map();
        $sections = $map->getAllSections();
        $techarr = [];
        $coords = [];
        while ($section=$sections->fetch_assoc()) {
            
            $techarr[] = $section["tech_id"];
            $coords[] = $map->getPointsForSection($section["section_id"]);
            
        }
        $data['techarr'] = $techarr;
        $data['coords'] = $coords;
        return $data;

    }
    public function getLampPostLngLat(){
        $lp = new \models\LampPost();
        $l = $lp->getLangLat_byid(1003);
        return "[".$l['longitude'].",".$l['lattitude']."]";
    }
   
    
}


