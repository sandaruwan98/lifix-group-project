<?php

include '../connection.php';
class AuthController{
    private $username,$password;
    public function __Constructor(){
        
    }

    function validateUser($username){
        if(preg_match('/\\s+/',$username) || empty($username)){
            return 1;
        }else{
            return 0;
        }
    }

    function validatePass($password){
        if(preg_match('/\\s+/',$password) || empty($password)){
            return 1;
        }else{
            return 0;
        }
    }

    function loginUser($username,$password){
        $statusUser=$this->validateUser($username);
        $starusPass=$this->validatePass($password);

        if(!$starusPass && !$statusUser){
            // both fiels are empty
            header('location:../../Clerk/index.php');
        }
        elseif(!$starusPass){
            $query="SELECT * FROM `user` WHERE `username`='.$username.'";
            $result=$conn->query($query);
            $row=$result->fetch_assoc();
            if($row['statusFlag']==0){// 0 is reset
                header('location:./reset.html');
                session_start();
                $_SESSION['user']=$username;
            }else{
                // password field is empty
            }

        }elseif(!$statusUser){
            // username field is empty
        }else{
            $query="SELECT * FROM `user` WHERE `username`='.$username.' AND `password`='.$password.'";
            $result=$conn->query($query);
            if($result->num_rows()==1){
                $row1=$result->fetch_assoc();
                if($row1['statusFlag']==1){
                    session_start();
                    $_SESSION['user']=$username;
                    switch($row1['occuFlag']){
                        case 1: header('location:../../Clerk/index.php');break;
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
                }
            }else{
                //alert "wrong credentials"
            }

        }
    } 

}

?>