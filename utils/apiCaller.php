<?php
    
    $recipient = $_POST["phone"];

    if($recipient) {
        if (session_id() == ""){
            session_start();
        }
        
        $otp = rand(1000,9999);
        $_SESSION["otp"] = "$otp";

        call($recipient, $otp);
    }

    function call($recipient, $otp) {
        $user = "94718808180";
        $password = "4742";
        $text = urlencode("Your Li-Fix OTP is $otp");
        $to = $recipient;
        
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        $ret = file($url);
        
        $res= explode(":",$ret[0]);
        
        if (trim($res[0])=="OK")
        {
        echo "Sent";
        }
        else
        {
        echo "Not Sent";
        }
    }
   
?>