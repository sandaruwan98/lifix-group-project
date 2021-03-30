<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class DS extends Framework
{
    public function __construct() {
        $this->session = new Session(DSFL);
    }
    
   
    public function SystemOverview()
    {
        // inventory data for bar chart
        $inventryModel = new \models\Inventory();
        $inventry = $inventryModel->getInventory();
        $barlabel = "";
        $barval = "";
        while ($row = $inventry->fetch_array()) {
          $barlabel .= '"'.$row["name"] . '" ,';
          $barval .= $row["total"] . ",";
        }
        $data['barlabel'] =$barlabel;
        $data['barval'] =$barval;
        
        $currentdate = date('Y-m-d');
        $lastmonthdate = date('Y-m-d',strtotime(date('Y-m-d')." -1 Months")) ;
        $reportmodel = new \models\ReportGenerate();
        $data['normcount'] =$reportmodel->getnormalRepairCount($lastmonthdate,$currentdate);
        $data['suscount'] =$reportmodel->getsuspiRepairCount($lastmonthdate,$currentdate);

        $result =$reportmodel->getRepairCountBydate($lastmonthdate,$currentdate);
        $arealabel = "";
        $areaval = "";
        $max = 0;
        while ($row = $result->fetch_array()) {
          $arealabel .= '"'.$row["date"] . '" ,';
          $areaval .= $row["count"] . ",";
          if ($row["count"]> $max) {
            $max = $row["count"];
          }
        }
        
        $data['arealabel'] =$arealabel;
        $data['areaval'] =$areaval;
        $data['areamax'] =$max;
        return $data;
    }


    public function TechOverview()
    {
       
       
        
       
        $user = new \models\User();
        $data['techs']  = $user->getUsers(TechnicianFL);
                
         
        if (isset($_POST["generate"])) {
            
            // $repairModel = new \models\Repair();
            $fraudModel = new \models\Fraud();
            $reportmodel = new \models\ReportGenerate();
            $invmodel = new \models\Inventory();
            $data['itemName'] = $invmodel->getItemNames()->fetch_all(MYSQLI_ASSOC);
            $data['normcount'] =$reportmodel->getnormalRepairCountfortech($_POST["firstDate"], $_POST["secondDate"],$_POST["techid"]);
            // $data['suscount'] =$reportmodel->getsuspiRepairCountfortech($_POST["firstDate"], $_POST["secondDate"],$_POST["techid"]);
            
            $data['allnormcount'] =$reportmodel->getAllnormalRepairCountfortech($_POST["techid"]);
            $data['allsuscount'] =$reportmodel->getAllsuspiRepairCountfortech($_POST["techid"]);
            $data['daycount'] =$reportmodel->getdayscountfortech($_POST["techid"]);

            $techdetail = $user->getUserDetails($_POST["techid"]);
            $data['techdetail'] = $techdetail;


            $fraudAlist = $fraudModel->gettypeA_FraudsByUserID($techdetail['userId'], $_POST["firstDate"], $_POST["secondDate"]);
            $fraudAcount = $fraudAlist->num_rows;
            $fraudBlist = $fraudModel->gettypeB_FraudsByUserID($techdetail['userId'], $_POST["firstDate"], $_POST["secondDate"]);
            $fraudBcount = $fraudBlist->num_rows;

            $data['suscount'] = $fraudAcount + $fraudBcount;
            $data['fraudAlist'] = $fraudAlist;
            $data['fraudBlist'] = $fraudBlist;
           

           

        }

        return $data;
    }











}