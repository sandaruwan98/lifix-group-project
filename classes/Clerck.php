<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class Clerck extends Framework
{
    public function __construct() {
        $this->session = new Session(CleckFL);
    }
    
    public function DailyRepair()
    {

        $usermodel = $this->loadModel('User');
        $technicians = $usermodel->getUsers(TechnicianFL);
        $data['technicians'] = $technicians;

        $repairmodel = $this->loadModel('Repair');

        $availablerepairs = $repairmodel->getUnassignedRepairs();
        $data['availablerepairs'] = $availablerepairs;

        if (!isset($_SESSION["tid"])) {$_SESSION["tid"]= $technicians->fetch_assoc()['userId'];} 

        $assignedrepairs = $repairmodel->getAssignedRepairs($_SESSION["tid"]);
        $data['assignedrepairs'] = $assignedrepairs;
        
        
       

        return $data;
    }


    public function RepairHistory()
    {
        $repairmodel = new \models\Repair();
        $totalpages = $repairmodel->getRepairsCount('ce');

        $p = new Pagination(5,$totalpages);
        $repairs = $repairmodel->getRepairs('ce', $p->fiteringText() );
        $data['repairs'] = $repairs;
        $data['pagination'] = $p;

        return $data;
    }
    
    public function RepairPage()
    {

        $repairmodel = $this->loadModel('Repair');
        if (!isset($_GET["id"]))
            header('location: ./repairHistory.php');

        $repair_id = $_GET["id"];
        $complaintmodel =  $this->loadModel('Complaint');
        $usermodel =  $this->loadModel('User');
        
        $data['repair_details'] = $repairmodel->getRepairByid($repair_id);
        $data['repair_details']['completed_by'] = $usermodel->getNameById($data['repair_details']['technician_id']);
        $data['complaint_details'] = $complaintmodel->getCompliant_by_repair_id($repair_id);
        $data['used_items'] = $repairmodel->getRepairItemsByid($repair_id,USED_ITEM);
        $data['return_items'] = $repairmodel->getRepairItemsByid($repair_id,RETURN_ITEM);
       
        return $data;
    }
    
    public function Purchase()
    {

        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        $samodel = new \models\StockAddition();

        $totalpages = $samodel->get_SA_ListAll_Count();
        $p = new Pagination(5,$totalpages);
        $data['StockAdditionList'] = $samodel->get_SA_ListAll($p->fiteringText());
        // $this->session->sendMessage("helooo",'success');
        $data['pagination'] = $p;
        return $data;
    }
    




}
