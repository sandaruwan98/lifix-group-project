<?php 
namespace classes;
include_once  __DIR__ . '/../utils/classloader.php';


class Authentication extends Framework{
    private $regdata = ['','','','',''];
    private $roles_to_select = null;
    public function getRegData(){
        return $this->regdata;
    }
    public function getRoles_to_select(){
        return $this->roles_to_select;
    }
   
        

    public function __construct() {
        $this->session = new Session('login');
    }

    public function Loginuser()
    {
        
        if (isset($_POST["loginBtn"])) {
            $username = $_POST["username"];
            $pass = $_POST["password"];
           

            // $usermodel = $this->loadModel('User');
            $usermodel = new \models\User();
            $encrypted_pass = md5($pass);
            $result = $usermodel->getUser($username,$encrypted_pass);

            if ($result->num_rows == 0) {
                $this->session->sendMessage("Wrong credentials","danger");
                return;
            }

            $user = $result->fetch_assoc();
            $status =  $user["statusFlag"];
            if ($status == 0) {
                $this->session->sendMessage("Your account does not activated yet","danger");
                return;
            }
            if ($status == 2) {
                $this->session->sendMessage("Your account is suspended","danger");
                return;
            }
            if ($status == 1) {
                
                $_SESSION['id']=$user['userId'];
                $_SESSION["user"] = $user["username"];
                // $_SESSION["name"] = $user["Name"];
                $rolemodel = new \models\Role();
                $roles = $rolemodel->getActiveRoles($user['userId']);
                if ($roles->num_rows==1) {
                    $role = $roles->fetch_array();
                    
                    $_SESSION["role"] =  $role[0];
            
                    switch($role[0]){
                        case DSFL: header('location:../divisionalsecretary/index.php');break;
                        case CleckFL:header('location:../clerk/index.php');break;
                        case StorekeeperFL:header('location:../storekeeper/index.php');break;
                        case TechnicianFL:header('location:../technician/index.php');break;
                        case AdminFL:header('location:../admin/index.php');break;
                    }
                }else {
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
           
            $this->regdata = [$username,$name,$phone,$pass,$confirmpass];

            if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $name)){
                $this->session->sendMessage("Invalid  Name","danger");return ;
            }

            if(preg_match("/[a-zA-Z]+/", $phone)){
                $this->session->sendMessage("Invalid phone number","danger");return ;
            }
            
            if($pass != $confirmpass){
                $this->session->sendMessage("Passwords does not match","danger");return;
            }
            //strong pass valid
            // if(preg_match("", $pass)){
            //     $this->session->sendMessage("Passwords is weak","danger");
            //     return ;
            // }

        
            // $usermodel = $this->loadModel('User');
            $usermodel = new \models\User();
            
            if(!$usermodel->isUsernameAvailable($username))
            {
                $this->session->sendMessage("Username already taken,Try onother","danger");return ;
            }


            $encrypted_pass = md5($pass);
            $user_id = $usermodel->CreateUser($username,$name,$role,$phone,$encrypted_pass);

            $rolemodel = new \models\Role();
            

            if ($rolemodel->addRole($user_id,$role)) {
            
                $this->session->sendMessage("Registration successful","success");
                echo "<script>setTimeout(() => {  location.href = './index.php' }, 2000);</script>";
            }
        }
    }



    
}


