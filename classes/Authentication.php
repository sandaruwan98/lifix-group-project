<?php

namespace classes;

include_once  __DIR__ . '/../utils/classloader.php';


class Authentication extends Framework
{
    private $regdata = ['', '', '', '', ''];
    private $roles_to_select = null;
    
    public function getRegData()
    {
        return $this->regdata;
    }

    public function getRoles_to_select()
    {
        return $this->roles_to_select;
    }

    public function __construct()
    {
        $this->session = new Session('nodirect');
    }

    public function Loginuser()
    {

        if (isset($_POST["loginBtn"])) {
            $username = $_POST["username"];
            $pass = $_POST["password"];


            // $usermodel = $this->loadModel('User');
            $usermodel = new \models\User();
            $encrypted_pass = md5($pass);
            $result = $usermodel->getUser($username, $encrypted_pass);

            if ($result->num_rows == 0) {
                $this->session->sendMessage("Wrong credentials", "danger");
                return;
            }

            $user = $result->fetch_assoc();
            $status =  $user["statusFlag"];
            if ($status == 0) {
                $this->session->sendMessage("Your account does not activated yet", "danger");
                return;
            }
            if ($status == 2) {
                $this->session->sendMessage("Your account is suspended", "danger");
                return;
            }
            if ($status == 1) {

                $_SESSION['id'] = $user['userId'];
                $_SESSION["user"] = $user["username"];
                // $_SESSION["name"] = $user["Name"];
                $rolemodel = new \models\Role();
                $roles = $rolemodel->getActiveRoles($user['userId']);
                if ($roles->num_rows == 1) {
                    $role = $roles->fetch_array();

                    $_SESSION["role"] =  $role[0];

                    switch ($role[0]) {
                        case DSFL:
                            header('location:../divisionalsecretary/index.php');
                            break;
                        case CleckFL:
                            header('location:../clerk/index.php');
                            break;
                        case StorekeeperFL:
                            header('location:../storekeeper/index.php');
                            break;
                        case TechnicianFL:
                            header('location:../technician/index.php');
                            break;
                        case AdminFL:
                            header('location:../admin/index.php');
                            break;
                    }
                } else {
                    $_SESSION["role"] = -1;
                    $this->roles_to_select = $roles->fetch_all();
                }
            }
        }
    }


    public function Register()
    {

        if (isset($_POST["register"])) {
            $username = $_POST["username"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $role = $_POST["role"];
            $pass = $_POST["pass"];
            $confirmpass = $_POST["confirmpass"];

            // if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $name)){
            //     $this->session->sendMessage("Invalid  Name","danger");return ;
            // }

            if (preg_match("/[a-zA-Z]+/", $phone)) {
                $this->session->sendMessage("Invalid phone number", "danger");
                return;
            }

            if ($pass != $confirmpass) {
                $this->session->sendMessage("Passwords does not match", "danger");
                return;
            }
            //strong pass valid
            // if(preg_match("", $pass)){
            //     $this->session->sendMessage("Passwords is weak","danger");
            //     return ;
            // }

        
            $usermodel = new \models\User();

            if (!$usermodel->isUsernameAvailable($username)) {
                $this->session->sendMessage("Username already taken,Try onother", "danger");
                return;
            }


            $encrypted_pass = md5($pass);
            $user_id = $usermodel->CreateUser($username, $name, $role, $phone, $encrypted_pass);

            $rolemodel = new \models\Role();

            if ($rolemodel->addRole($user_id,$role)) {
            

                 // send notification to clerck to confirm
                $noti = new \models\Notification();
                $subject = 'New accont activation';
                $body = $username.' (' .$name.')' . 'have created a new account.Activate or reject it';
                $noti->AddNotification($subject,$body, $user_id , AdminFL ,'c-acc',$user_id);
                
                $this->session->sendMessage("Registration successful","success");
                echo "<script>setTimeout(() => {  location.href = './index.php' }, 2000);</script>";
            }
        }
    }

    public function FogotPass()
    {

        // page 1
        if (isset($_POST["getuser"])) {
            $username = $_POST["username"];
            if (!empty($username)) {
                $usermodel = new \models\User();
                if (!$usermodel->isUsernameAvailable($username)) {
                    $_SESSION["fp"] = 0;
                    $_SESSION["username"] = $username;
                    $_SESSION["phone"] = $usermodel->getPhoneNumByusername($username);
                } else {
                    $this->session->sendMessage("Wrong username", "danger");
                }
            }
        }

        if (isset($_POST["back"])) {
            unset($_SESSION["fp"]);
            unset($_SESSION["username"]);
            unset($_SESSION["phone"]);
        }


        // page 2
        if (isset($_POST["send"])) {
            $_SESSION["fp"] = 1;
            $_SESSION["code"] = rand(10000, 99999);
            // send code to phone number 

        }

        if (isset($_POST["resend"])) {

            $_SESSION["code"] = rand(10000, 99999);
            // send code to phone number 

        }
        if (isset($_POST["verify"])) {
            $code = $_POST["code"];
            if ($code == $_SESSION["code"]) {
                $_SESSION["fp"] = 2;
            } else {
                $this->session->sendMessage("Verification code is wrong", "danger");
            }
        }



        // page 3
        if (isset($_POST["reset"])) {
            $pass = $_POST["pass"];
            $pass2 = $_POST["pass2"];
            if (!empty($pass) && !empty($pass2)) {
                if ($pass == $pass2) {
                    $usermodel = new \models\User();
                    if ($usermodel->updatePassword($_SESSION["username"], md5($pass))) {
                        session_destroy();
                        $this->session->sendMessage("Password updated successfully", "success");
                        echo "<script>setTimeout(() => {  location.href = './index.php' }, 2000);</script>";
                    } else
                        $this->session->sendMessage("Something went wrong", "danger");
                } else {
                    $this->session->sendMessage("Passwords does not match", "danger");
                }
            } else {
                $this->session->sendMessage("Please enter a password", "danger");
            }
        }




        if (isset($_GET["cancel"])) {
            session_destroy();
            header('location: ./');
        }
    }
}
