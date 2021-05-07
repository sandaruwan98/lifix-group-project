<?php

    use classes\Sms;

    require '../classes/Sms.php';
    
    $recipient = $_POST["phone"];

    if($recipient) {
        if (session_id() == ""){
            session_start();
        }
        
        // otp creates
        $otp = rand(1000,9999);
        $_SESSION["otp"] = "$otp";

        // send the otp
        $sms = new Sms($recipient);
        $sms->sendOtp($otp);
    }