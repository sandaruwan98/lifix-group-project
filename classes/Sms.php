<?php

namespace classes;

class Sms {
    public static $user = "94701549225";
    public static $password = "9221";

    public static function sendOtp($recipient, $otp) {

        $text = urlencode("Your Li-Fix OTP is $otp");
        $to = $recipient;
        
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = $baseurl."/?id=".self::$user."&pw=".self::$password."&to=".$to."&text=".$text;
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
    public static function sendConfirmation($recipient, $lamp_id) {
        $text = "Your complaint on lamppost:$lamp_id is now repaired";
        $to = $recipient;
        
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = $baseurl."/?id=".self::$user."&pw=".self::$password."&to=".$to."&text=".$text;
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
    
}