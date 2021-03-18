<?php 

    include_once  __DIR__ . '/../utils/classloader.php';

    class DbAccess extends models\Database {


        function addNewUser($userroll, $name) {
            $query="INSERT INTO user(`username`, `Name`, `occuFlag`, `statusFlag`) VALUES ('$name','$name','$userroll',0)";
            if ($this->conn->query($query) === TRUE) {
                header("location: index.php");
            }
        }

        function pwdReset($name) {
            $query = "UPDATE user SET statusFlag = 0 WHERE name = '$name'";
            if ($this->conn->query($query) === TRUE) {
                header("location: index.php");
            }
        }

        function revoke($name) {
            $query = "UPDATE user SET statusFlag = 2 WHERE name = '$name'";
            if ($this->conn->query($query) === TRUE) {
                header("location: index.php");
            }
        }

        function fetchData() {
            $query = "SELECT name FROM user WHERE NOT statusFlag = 2 AND NOT statusFlag = 0";
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