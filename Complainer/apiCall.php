<?php
    if (session_id() == ""){
        session_start();
    }
    
    $otp = rand(1000,9999);
    $pno = $_POST["phone"];

    $_SESSION["otp"] = "$otp";

    if($pno) {
        echo $_SESSION["otp"];
    }
        
    

    function call($recipient, $otp) {
       
        // $user = "948808180";
        // $password = "4742";
        // $text = urlencode("$otp");
        // $to = $recipient;
        
        // $baseurl ="http://www.textit.biz/sendmsg";
        // $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        // $ret = file($url);
        
        // $res= explode(":",$ret[0]);
        
        // if (trim($res[0])=="OK")
        // {
        // echo "Message Sent - ID : ".$res[1];
        // }
        // else
        // {
        // echo "Sent Failed - Error : ".$res[1];
        // }
    }
   
?>