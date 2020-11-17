<?php

include '../classes/Database.php';
class RestController extends classes\Database{

    protected $div_1="";
    protected $div_2="";
    protected $div_3="";
    protected $Id;
    protected $pass_status=1;
    protected $pass_com_status=1;
    protected $usr_status=1;

    public function __construct(){
        parent::__construct();
        session_start();
        $this->checkSession();
        $this->Id=$_SESSION['id'];
    }

    public function validate($string){
        if(preg_match('/\\s+/',$string) || empty($string)){
            return 0;
        }else{
            return 1;
        }
    }

    public function compare($pass, $pass_com){
        if($pass==$pass_com){
            return 1;
        }else{
            return 0;
        }
    }

    public function resetUser($usrname,$pss,$pass_com){
        $this->pass_com_status=$this->validate($pass_com);
        $this->pass_status=$this->validate($pss);
        $this->usr_status=$this->validate($usrname);

        if(!$this->pass_com_status && !$this->pass_status && !$this->usr_status){
            $this->div_2="This field is esseintial";
            $this->div_3="This field is esseintial";
        }elseif(!$this->pass_com_status && !$this->pass_status){
            $this->div_2="This field is esseintial";
            $this->div_3="This field is esseintial";
        }elseif( !$this->pass_status && !$this->usr_status){
            $this->div_2="This field is esseintial";
        }elseif(!$this->pass_com_status && !$this->usr_status){
            $this->div_3="This field is esseintial";
        }elseif(!$this->pass_com_status){
            $this->div_3="This field is esseintial";
        }elseif(!$this->pass_status){
            $this->div_2="This field is esseintial";
        }elseif(!$this->usr_status){
            if($this->compare($pss,$pass_com)){
                $sId=$_SESSION['id'];
                $usr=$_SESSION['user'];
                $encrypted_pass = md5($pss);
                echo $sId." this ".$usr;
                $query="UPDATE `user` SET `username`='$usr',`password`='$encrypted_pass',`statusFlag`=1 WHERE `userId`='$sId'";
                // $query="UPDATE user SET username=".$_SESSION['user'].", password=".$pss.",  WHERE userId=".$this->Id;
                $result=$this->conn->query($query);
                if($result){
                    //send message that done
                    session_destroy();
                    header('location:./index.php');
                }else{
                    //send message that not done
                }
                
            }else{
                $this->div_3="Password is not matching";
            }
        }else{
            if($this->compare($pss,$pass_com)){
                $sId=$_SESSION['id'];
                $encrypted_pass = md5($pss);
                // echo $sId. "I am checking yet";
                // $query="UPDATE user SET 'username'='$usrname', 'password'='$pss',  WHERE 'userId'=$sId";
                $query="UPDATE `user` SET `username`='$usrname',`password`='$encrypted_pass',`statusFlag`=1 WHERE `userId`='$sId'";
                $this->conn->query($query);
                // if($result){
                //     echo "this is sucess";
                //     //send message that done
                //     session_destroy();
                //     header('location:./index.php');
                // }else{
                //     //send message that not done
                // }

                    session_destroy();
                    header('location:./index.php');
            }else{
                $this->div_3="Password is not matching";
            }
        }
    }

    public function checkSession(){
        
        if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
            header('location:./index.php');
        }
    }
    public function getSessionName(){
        return $_SESSION['user'];
    }

    public function getDiv_1(){
        return $this->div_1;
    }
    public function getdiv_2(){
        return $this->div_2;
    }
    public function getdiv_3(){
        return $this->div_3;
    }


}
?>