<?php 

    include_once '../utils/classloader.php';

    $errors = array('name'=>'', 'nic'=>'', 'lampid'=>'', 'phone'=>'', 'otp'=>'');
    $name = $nic = $lampId = $phoneNo = $otpCode = $note = "";
    $msg= "";

    class DbAccess {
        public $repairObj;
        public $complaintObj;
        
        public function sendData($page) {
            
            $repairObj = new classes\Repair();
            $complaintObj = new classes\Complaint();

            $name = $_POST['name'];
            $nic = $_POST['nic'];
            $lp_id = $_POST['lampid'];
            $phoneno = $_POST['phone'];
            $note = $_POST['note'];
            array_search('yes', $_POST)?($bulb = 1):($bulb = 0);

            $repairId = $repairObj->createRepair('a', $lp_id, 0, 0);
            $complainerCheck = $complaintObj->checkComplainerExists($nic);
            $complainer_id = $complaintObj->addComplainer($complainerCheck, $nic, $name, $phoneno);
            $complaintObj->addComplaint($bulb, $note, $lp_id, $repairId, $complainer_id);

            if ($complainer_id &&  $repairId) {
                // header("location: $page");
                $msg =  "<script>alert('Success'); ". header("location: $page") . ";</script>";
            }
        }
    }

	if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $lampId = $_POST['lampid'];
        $phoneNo = $_POST['phone'];
        $otpCode = $_POST['otp'];
        $note = $_POST['note'];

        if(empty($name) || !preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $name)) {
            $name = "";
            $errors['name'] = 'Name must be a valid name';
        }
        if(empty($nic) || !preg_match("/^[1-9]([0-9]{8}(x|v|X|V)|[0-9]{11})$/", $nic)) {
            $nic = "";
            $errors['nic'] = 'NIC must be a valid NIC number';
        }
        if(empty($lampId) || !preg_match("/^[1-9][0-9]{3}$/", $lampId)) {
            $lampId = "";
            $errors['lampid'] = 'Lamp post ID must be a valid ID';
        }
        // if(empty($phoneNo || !preg_match('((\+94)|0)[0-9]{2}[.\- ]?[0-9]{3}[.\- ]?[0-9]{4}', $phoneNo))) {
        //     echo "fdd";//$errors['phone'] = 'Lamp post ID must be a valid ID number';
        // }
        if(empty($phoneNo)) {
            $phoneNo = "";
            $errors['phone'] = 'Enter valid number';
        }
        if(empty($otpCode)) {
            $errors['otp'] = 'OTP must be a valid number';
        }

        if(!array_filter($errors)) {
            $obj = new DbAccess();
            $obj->sendData($page);
        }
    }
?>
