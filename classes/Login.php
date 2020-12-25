<?php 
namespace classes;
include_once  __DIR__ . '/../utils/classloader.php';


class Login extends Framework{

    public function __construct() {
        $this->session = new Session('login');
    }

    public function Loginuser()
    {
        
        if (isset($_POST["loginBtn"])) {
            $username = $_POST["username"];
            $pass = $_POST["password"];
            echo $username.$pass;
            if (empty($username)){
                $this->session->sendMessage("Username is empty","danger");
                return;
            }
    
            if (empty($pass)){
                $this->session->sendMessage("Password is empty","danger");
                return;
            }

            $usermodel = $this->loadModel('User');
            $result = $usermodel->checkUser($username,$pass);

            if ($result->num_rows == 0) {
                $this->session->sendMessage("Wrong credentials","danger");
                return;
            }

        }
    }
   




}


