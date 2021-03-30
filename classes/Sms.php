<?php

namespace classes;

class Sms
{
    //textBiz credentials
    public $user = "94701549225";
    public $password = "9221";
    public $recipient;

    public function __construct($recipient) 
    {
        $this->recipient = $recipient;
    }

    // call this when need to send comfirmation msg
    public function sendConfirmation($lamp_id)
    {
        $text = urlencode("Your complaint on lamppost: ".$lamp_id." is now repaired");
        // $to = $recipient;

        $baseurl = "http://www.textit.biz/sendmsg";
        $url = $baseurl."/?id=".$this->user."&pw=".$this->password."&to=".$this->recipient."&text=".$text;
        $ret = file($url);

        $res = explode(":", $ret[0]);

        if (trim($res[0]) == "OK") {
            echo "Sent";
        } else {
            echo "Not Sent";
        }
    }

    function sendOtp($otp) {

        $text = urlencode("Your Li-Fix OTP is $otp");
        
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = $baseurl."/?id=".$this->user."&pw=".$this->password."&to=".$this->recipient."&text=".$text;
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
