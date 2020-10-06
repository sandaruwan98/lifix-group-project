<?php 

    $errors = array('name'=>'', 'nic'=>'', 'lampid'=>'', 'phone'=>'', 'otp'=>'');
    $name = $nic = $lampId = $phoneNo = $otpCode = $note = "";

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
            $errors['phone'] = 'Phone number must be a valid number';
        }
        if(empty($otpCode)) {
            $errors['otp'] = 'OTP must be a valid number';
        }

        if(!array_filter($errors)) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lifix";
            $port = "3306";

            $conn = new mysqli($servername, $username, $password, $dbname, $port);  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $name = $_POST['name'];
            $nic = $_POST['nic'];
            $lp_id = $_POST['lampid'];
            $phoneno = $_POST['phone'];
    
            $query = "INSERT INTO complaints( name, phoneno, nic, lp_id) VALUES ( '$name','$phoneno','$nic','$lp_id' )";

            if ($conn->query($query) === TRUE) {
                header("location: index.php");
            }
        }
    }
?>
