<?php

// include '../models/Database.php';
include_once '../utils/classloader.php';

class AuthController extends models\Database{
    protected $username,$password;
    protected $usrTag="Username";
    protected $passTag="Password";
    protected $wrongCredentials="";
    protected $statusUser=1;
    protected $starusPass=1;
    public function __construct()
    {
        parent::__construct();    
        
    }

    function validateUser($username){
        if(empty($username)){
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
            $this->passTag="Password field is empty";
            $this->usrTag="Username field is empty";
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
                    $_SESSION['id']=$row['userId'];
                    // $_SESSION['id']=23;
                    $this->__destruct();
                    header('location:./reset.php');
                }else{
                    $this->passTag="Password field is empty....";
                    // $this->wrongCredentials="Pasword field is empty";
                    // password field is empty
                }
            }else{ 
                $this->wrongCredentials="Wrong Credentials";
            }
            
            

        }elseif(!$this->statusUser){
            // $this->wrongCredentials="UserName field is empty";
            $this->usrTag="UserName field is empty";
            
            // username field is empty
        }else{
            // echo "came in to the else part  ".$username. " ".$password;
            // echo "came in to the else part";
            $encrypted_pass = md5($password);
            $query="SELECT * FROM `user` WHERE `username`='$username' AND `password`='$encrypted_pass'";

            $result=$this->conn->query($query);
            // $result2=$result->fetch_assoc();
            
            if($result->num_rows==1){
                $row1=$result->fetch_assoc();
                if($row1['statusFlag']==1){
                    session_start();
                    $_SESSION['user']=$username;
                    $_SESSION['id']=$row1['userId'];
                    $_SESSION['occuFlag']=$row1['occuFlag'];
                    $this->__destruct();
                    switch($row1['occuFlag']){
                        case 1: header('location:../DivisionalSecretary/index.php');break;
                        case 2:header('location:../Clerk/index.php');break;
                        case 3:header('location:../storekeeper/index.php');break;
                        case 4:header('location:../technician/index.php');break;
                        default: session_destroy();
                    }
                }else if($row1['statusFlag']==0){
                    session_start();
                    $_SESSION['user']=$username;
                    $_SESSION['id']=$row1['userId'];
                    $this->__destruct();
                    header('location:./reset.php');
                   
                }else{
                    // Account has banned
                    $this->wrongCredentials="You account has been suspended";
                }
            }else{
                

                $query="SELECT * FROM `user` WHERE `username`='$username'";
                $result=$this->conn->query($query);
                $row=$result->fetch_assoc();
                // $val=$row['statusFlag'];
                if($result->num_rows==1){
                    if($row['statusFlag']==0){// 0 is reset
                        session_start();
                        $_SESSION['user']=$username;
                        $_SESSION['id']=$row['userId'];
                        // $_SESSION['id']=23;
                        $this->__destruct();
                        header('location:./reset.php');
                    }else{
                        $this->passTag="Wrong password..";
                        // $this->wrongCredentials="Pasword field is empty";
                        // password field is empty
                    }
                }else{
                    $this->wrongCredentials="You have entered wrong credetials";
                }                



                // $this->wrongCredentials="You have entered wrong credetials";
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