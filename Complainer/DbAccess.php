<?php
session_unset();
include_once  __DIR__ . '/../utils/classloader.php';

$errors = array('name' => '', 'nic' => '', 'lampid' => '', 'phone' => '', 'otp' => '');
$name = $nic = $lampId = $phoneNo = $otpCode = $otp = $note = "";
$redirect = "";

$lampObj = new models\LampPost();

class DbAccess
{
    public $repairObj;
    public $complaintObj;

    public function sendData($page, $greeting, $msg, $btnText)
    {

        $repairObj = new models\Repair();
        $complaintObj = new models\Complaint();
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $lp_id = $_POST['lampid'];
        $phoneno = $_POST['phone'];
        $note = $_POST['note'];

        array_search('yes', $_POST) ? ($bulb = 1) : ($bulb = 0);


        $complainerCheck = $complaintObj->checkComplainerExists($nic);
        $complainer_id = $complaintObj->addComplainer($complainerCheck, $nic, $name, $phoneno);
        $repairId = $repairObj->createRepair('a', $lp_id, 0, 0, $complainer_id);
        $complaintObj->addComplaint($bulb, $note, $lp_id, $repairId, $complainer_id);

        if ($complainer_id &&  $repairId) {
            session_start();
            $_SESSION['h1'] = $greeting;
            $_SESSION['p'] = $msg;
            $_SESSION['btn'] = $btnText;
            $_SESSION['page'] = $page;
            $_SESSION['rid'] = $repairId;
            $_SESSION['lpid'] = $lp_id;

            header("location: success.php");
        }
    }
}

if (isset($_POST['submit'])) {
    if (session_id() == "") {
        session_start();
    }
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $lampId = $_POST['lampid'];
    $phoneNo = $_POST['phone'];
    $otpCode = $_POST['otp'];
    $note = $_POST['note'];

    if (empty($name) || !preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $name)) {
        $name = "";
        $errors['name'] = 'Name must be a valid name';
    }
    if (empty($nic) || !preg_match("/^[1-9]([0-9]{8}(x|v|X|V))|([1-9][0-9]{10}(x|v|X|V))$/", $nic)) {
        $nic = "";
        $errors['nic'] = 'NIC must be a valid NIC number';
    }
    if (empty($lampId) || $lampObj->getLampPost_byid($lampId) == null) {
        $lampId = "";
        $errors['lampid'] = 'ID must be a valid ID';
    }
    if (empty($phoneNo) || preg_match("/[a-zA-Z]+/", $phoneNo)) {
        $phoneNo = "";
        $errors['phone'] = 'Enter valid number';
    }
    // if (empty($otpCode) || isset($_SESSION['otp']) != true || $_SESSION['otp'] != $otpCode) {
    //     $otpCode = "";
    //     $errors['otp'] = 'OTP must be valid';
    // }
    if (!array_filter($errors)) {
        $obj = new DbAccess();
        $obj->sendData($page, $greeting, $msg, $btnText);
    }
}

?>