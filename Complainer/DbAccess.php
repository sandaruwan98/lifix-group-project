<?php 

    require_once "../classes/Complaint.php";
    require_once "../classes/Repair.php";
    
    

    $errors = array('name'=>'', 'nic'=>'', 'lampid'=>'', 'phone'=>'', 'otp'=>'');
    $name = $nic = $lampId = $phoneNo = $otpCode = $note = "";

    class DbAccess {
        public $repairObj;
        public $complaintObj;
        
        public function sendData($page) {
            $repairObj = new Repair();
            $complaintObj = new Complaint();
            
            $name = $_POST['name'];
            $nic = $_POST['nic'];
            $lp_id = $_POST['lampid'];
            $phoneno = $_POST['phone'];
            $note = $_POST['note'];
            array_search('Yes', $_POST)?($bulb = 1):($bulb = 0);

            // $q = "SELECT complainer_id FROM complainer WHERE NIC='$nic'";
            // $list =   $this->conn->query($q);
            // if ($list->num_rows >0) {
            //     $id = $list->fetch_assoc();
            //     $id = $id['complainer_id'];
            //     $q = "UPDATE complainer SET NIC = '$nic', Name = '$name', phone_no = '$phoneno' WHERE complainer_id = '$id';";
            // }else {
            //     $q = "INSERT INTO complainer( NIC, Name, phone_no) VALUES ('$nic','$name','$phoneno');";
            // }

            // $q .= "INSERT INTO complaint( is_bulb_there, Notes, lp_id) VALUES ('$bulb','$note','$lp_id') ";
            

            $repairId = $repairObj->createRepair('a', $lp_id, 0, 0);
            $complainerCheck = $complaintObj->checkComplainerExists($nic);
            $complainer_id = $complaintObj->addComplainer($complainerCheck, $nic, $name, $phoneno);
            $complaintObj->addComplaint($bulb, $note, $lp_id, $repairId, $complainer_id);
            if ($complainer_id ) {
                header("location: $page");
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

        if(empty($name) || !preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = 'Name must be a valid name';
        }
        if(empty($nic)) {
            $errors['nic'] = 'NIC must be a valid NIC number';
        }
        if(empty($lampId)) {
            $errors['lampid'] = 'Lamp post ID must be a valid ID number';
        }
        // if(empty($phoneNo || !preg_match('((\+94)|0)[0-9]{2}[.\- ]?[0-9]{3}[.\- ]?[0-9]{4}', $phoneNo))) {
        //     echo "fdd";//$errors['phone'] = 'Lamp post ID must be a valid ID number';
        // }
        if(empty($phoneNo)) {
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
