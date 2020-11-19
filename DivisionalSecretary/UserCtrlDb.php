<?php 

    include_once '../utils/classloader.php';

    class DbAccess extends classes\Database {


        function addNewUser($userroll, $name) {
            // echo "in AddNewUser();'$userroll'  '$name'";
            $query="INSERT INTO user(`username`, `Name`, `occuFlag`, `statusFlag`) VALUES ('$name','$name','$userroll',0)";
            if ($this->conn->query($query) === TRUE) {
                header("location: index.php");
                // echo "inoshcisuvsdfvohfsdviudsfjbvdfpviodhfvoip";
            }
        }

        function pwdReset($name) {
            $query = "UPDATE user SET statusFlag = 0 WHERE name = '$name'";
            if ($this->conn->query($query) === TRUE) {
                header("location: userCtrl.php");
            }
        }

        function revoke($name) {
            $query = "UPDATE user SET statusFlag = 2 WHERE name = '$name'";
            if ($this->conn->query($query) === TRUE) {
                header("location: userCtrl.php");
            }
        }

        function fetchData() {
            $query = "SELECT name FROM user WHERE NOT statusFlag = 2";
            $list =   $this->conn->query($query);
            return $list;
        }
    }


    if(isset($_POST['unroll'])) {
        $obj = new DbAccess();
        $obj->addNewUser($_POST['userroll'], $_POST['name']); 
        unset($obj);       
    }
    else if(isset($_POST['reset']) && $_POST['reset'] == 'RESET') {
            $obj = new DbAccess();
            $obj->pwdReset($_POST['useracc']); 
            unset($obj);
        
    }
    else if(isset($_POST['revoke']) && $_POST['revoke'] == 'REVOKE') {
            $obj = new DbAccess();
            $obj->revoke($_POST['useracc']); 
            unset($obj);
        
    }

?>