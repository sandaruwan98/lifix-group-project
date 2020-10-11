<?php 
    require_once "../classes/Database.php";

    $pwd2 = "";
    $pwd3 = "";

    class DbAccess extends Database {

        function addNewUser($userroll, $username, $pwd) {
            $query = "INSERT INTO userdatademo( userroll, username, password) VALUES ( '$userroll','$username','$pwd')";
            if ($this->conn->query($query) === TRUE) {
                header("location: userCtrl.php");
            }
        }

        function pwdReset($username, $pwd) {
            //can't update pwd from a access revoked account 
            $query = "UPDATE userdatademo SET password = '$pwd' WHERE username = '$username' AND NOT revokeAccess = 1";
            if ($this->conn->query($query) === TRUE) {
                header("location: userCtrl.php");
            }
        }

        function revoke($username) {
            $query = "UPDATE userdatademo SET revokeAccess = 1 WHERE username = '$username'";
            if ($this->conn->query($query) === TRUE) {
                header("location: userCtrl.php");
            }
        }

        function fetchData() {
            $query = "SELECT username FROM userdatademo";
            $list =   $this->conn->query($query);
            return $list;
        }
    }


    if(isset($_POST['userroll'])) {
        $pwd2 = "";
        if($_POST['password'] == $_POST['password2']) {
            $obj = new DbAccess();
            $obj->addNewUser($_POST['userroll'], $_POST['username'], $_POST['password']); 
            unset($obj);
        }
        else $pwd2 = "Passwords did not match";
    }
    else if(isset($_POST['useracc']) && isset($_POST['password']) && isset($_POST['password2'])) {
        $pwd3 = "";
        if($_POST['password'] == $_POST['password2']) {
            $obj = new DbAccess();
            $obj->pwdReset($_POST['useracc'], $_POST['password']); 
            unset($obj);
        }
        else $pwd3 = "Passwords did not match";
    }
    else if(isset($_POST['useracc'])) {
            $obj = new DbAccess();
            $obj->revoke($_POST['useracc']); 
            unset($obj);
    }

?>