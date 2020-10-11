<?php 
require_once "../classes/Database.php";

$pwd2 = "";

class DbAccess extends Database {
    function addNewUser($userroll, $username, $pwd) {
        $query = "INSERT INTO userdatademo( userroll, username, password) VALUES ( '$userroll','$username','$pwd')";
        if ($this->conn->query($query) === TRUE) {
            header("location: userCtrl.php");
        }
    }

    function pwdReset($username, $pwd) {

    }

    function revoke($username) {

    }

}

if(isset($_POST['userroll'])) {
    if($_POST['password'] == $_POST['password2']) {
        $obj = new DbAccess();
        $obj->addNewUser($_POST['userroll'], $_POST['username'], $_POST['password']); 
        unset($obj);
    }
    else $pwd2 =  "Passwords did not match";
}


?>