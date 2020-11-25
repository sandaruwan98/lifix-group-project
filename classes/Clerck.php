<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once '../utils/classloader.php';

class Clerck extends FrameWork
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
        $repairmodel = $this->loadModel('Repair');

        $repairs = $repairmodel->getRepairs('a');
        $data['repairs'] = $repairs;

        return $data;
    }
    
    public function RepairPage()
    {

        $repairmodel = $this->loadModel('Repair');
        if (!isset($_GET["id"]))
            header('location: ./repairHistory.php');

        $repair_id = $_GET["id"];
        $complaintmodel =  $this->loadModel('Complaint');
        
        $data['repair_details'] = $repairmodel->getRepairByid($repair_id);

        $data['complaint_details'] = $complaintmodel->getCompliant_by_repair_id($repair_id);
        $data['used_items'] = $repairmodel->getCompliant_by_repair_id($repair_id);
        $data['return_items'] = $repairmodel->getCompliant_by_repair_id($repair_id);

        return $data;
    }
    
    public function Purchase()
    {

        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        $samodel = $this->loadModel('StockAddition');
        $data['StockAdditionList'] = $samodel->get_SA_List();

        return $data;
    }
    




}
