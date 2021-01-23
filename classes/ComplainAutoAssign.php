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
            // $coords[] = $map->getPointsForSection($section["section_id"]);
            $tmp = $map->getPointsForSection($section["section_id"]);
            $tmp2 = [];
            foreach ($tmp as $t) {
                $tmp2[] = [(double) $t[0],(double) $t[1]];
            }
            $coords[]= $tmp2;
            
        }
        $data['techarr'] = $techarr;
        $data['coords'] = $coords;
        return $data;

    }
    public function getLampPostLngLat(){
        $lp = new \models\LampPost();
        $l = $lp->getLangLat_byid($_SESSION["lpid"]);
        return "[".$l['longitude'].",".$l['lattitude']."]";
    }
   
    
}


