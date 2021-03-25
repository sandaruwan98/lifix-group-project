<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class Admin extends Framework
{
    public function __construct() {
        $this->session = new Session(AdminFL);
    }
    
   
    public function SectionAssign()
    {

        $usermodel = new \models\User();
        $technicians = $usermodel->getUsers(TechnicianFL);
        $data['technicians'] = $technicians;

        $mapmodel = new \models\Map();
        $sections= $mapmodel->getAllSections();
        
        foreach ($technicians as $tech) {
            $data["color"][$tech["userId"]] = "#e8edee";
        }
        while ($section=$sections->fetch_assoc()) {
            $data["color"][$section["tech_id"]] = $section["color"];
        }


        //  $data['technicians'] =
        return $data;
    }



    public function UserControl(){
        $user = new \models\User();
      
        // add role  
         if(isset($_POST['add']) && $_POST['add'] == 'ADD') {

            $user_id = $_POST['useracc'];
            $user_role = $_POST['userroll'];

            if($user_id != '' && $user_role != ''){
                $role = new \models\Role();

                if( $role->addRole( $user_id, $user_role ) )
                    $this->session->sendMessage("New role added to the user successfully",'success');
                else
                    $this->session->sendMessage("Something went wrong",'danger');
            
            }
            
            header("location: index.php");exit;
         }


        // remove role  
         if(isset($_POST['remove']) && $_POST['remove'] == 'REMOVE') {
            
            $user_id = $_POST['useracc'];
            $user_role = $_POST['userroll'];
            if($user_id != '' && $user_role != ''){

                $role = new \models\Role();
                if( $role->removeRole( $user_id, $user_role ) )
                    $this->session->sendMessage("Role removed from user successfully",'success');
                else
                    $this->session->sendMessage("Something went wrong",'danger');
            }
            
            header("location: index.php");exit;
         }



        // revoke user  
         if(isset($_POST['revoke']) && $_POST['revoke'] == 'REVOKE') {
            if( $user->revoke($_POST['useracc']))
                $this->session->sendMessage("User revoked successfully",'success');
            else
                $this->session->sendMessage("Something went wrong",'danger');

            header("location: index.php");exit;
        }

        $data = $user->getActiveUsers();
        return $data;

    }









}