<?php
    // textBiz credentials
    $user = "94701549225";
    $password = "9221";
    
    $recipient = $_POST["phone"];

    if($recipient && isset($_POST['from'])) {
        if (session_id() == ""){
            session_start();
        }
        
        $otp = rand(1000,9999);
        $_SESSION["otp"] = "$otp";

        sendOtp($recipient, $otp, $user, $password);
    }

    // call this when need to send an OTP
    function sendOtp($recipient, $otp, $user, $password) {

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

    // call this when need to send comfirmation msg
    function sendConfirmation($recipient, $user, $password) {
        $text = "Successful";
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
