<?php 

require_once "../classes/Database.php";

    $errors = array('name'=>'', 'nic'=>'', 'lampid'=>'', 'phone'=>'', 'otp'=>'');
    $name = $nic = $lampId = $phoneNo = $otpCode = $note = "";

    class DbAccess extends Database {
        function sendData($page) {
            $name = $_POST['name'];
            $nic = $_POST['nic'];
            $lp_id = $_POST['lampid'];
            $phoneno = $_POST['phone'];
            $note = $_POST['note'];

            $query = "INSERT INTO complainer( NIC, Name, phone_no, notes, lp_id) VALUES ( '$nic','$name','$phoneno', '$note', '$lp_id' )";

            if ($this->conn->query($query) === TRUE) {
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
