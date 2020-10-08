<?php

include '../classes/Database.php';
class AuthController extends Database{
    protected $username,$password;
    protected $usrTag="12";
    protected $passTag="12";
    protected $wrongCredentials="12";
    protected $statusUser=1;
    protected $starusPass=1;
    public function __construct()
    {
        parent::__construct();   
        
    }

    function validateUser($username){
        if(preg_match('/\\s+/',$username) || empty($username)){
            return 0;
        }else{
            return 1;
        }
    }

    function validatePass($password){
        if(preg_match('/\\s+/',$password) || empty($password)){
            return 0;
        }else{
            return 1;
        }
    }

    function loginUser($username,$password){
        $this->statusUser=$this->validateUser($username);
        $this->starusPass=$this->validatePass($password);

        if(!$this->starusPass && !$this->statusUser){
            $this->passTag="Pasword field is empty";
            $this->usrTag="user name field is empty";
            // both fiels are empty
            // header('location:../Clerk/index.php');
        }
        elseif(!$this->starusPass){
            $query="SELECT * FROM `user` WHERE `username`='$username'";
            $result=$this->conn->query($query);
            $row=$result->fetch_assoc();
            // $val=$row['statusFlag'];
            if($result->num_rows==1){
                if($row['statusFlag']==0){// 0 is reset
                    session_start();
                    $_SESSION['user']=$username;
                    header('location:./reset.html');
                }else{
                    $this->passTag="Pasword field is empty";
                    // password field is empty
                }
            }else{
                $this->wrongCredentials="Wrong Credentials";
            }
            
            

        }elseif(!$this->statusUser){
            $this->usrTag="UserName field is empty";
            // username field is empty
        }else{
            echo "came in to the else part  ".$username. " ".$password;
            echo "came in to the else part";
            $query="SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";

            $result=$this->conn->query($query);
            // $result2=$result->fetch_assoc();
            
            if($result->num_rows==1){
                $row1=$result->fetch_assoc();
                if($row1['statusFlag']==1){
                    session_start();
                    $_SESSION['user']=$username;
                    switch($row1['occuFlag']){
                        case 1: header('location:../Clerk/index.php');break;
                        // case 2:header('location:./Clerk.html');break;
                        // case 3:header('location:./storekeeper.html');break;
                        // case 4:header('location:./technician.html');break;
                        default: session_destroy();
                    }
                }else if($row1['statusFlag']==0){
                    header('location:./reset.html');
                    session_start();
                    $_SESSION['user']=$username;
                }else{
                    // Account has banned
                    $this->wrongCredentials="You account has suspended";
                }
            }else{
                $this->wrongCredentials="You have entered wrong credetials";
                //alert "wrong credentials"
            }

        }
    } 

    public function getWrongCredentials(){
        return $this->wrongCredentials;
    }
    public function getUsrTag(){
        return $this->usrTag;
    }
    public function getPassTag(){
        return $this->passTag;
    }
        
    

}

?>