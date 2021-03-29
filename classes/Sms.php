<?php

namespace classes;

class Sms
{
    //textBiz credentials
    public $user = "94701549225";
    public $password = "9221";
    public $recipient;
    public $lamp_id;

    public function __construct($recipient, $lamp_id) 
    {
        $this->recipient = $recipient;
        $this->lamp_id = $lamp_id;
    }

    // call this when need to send comfirmation msg
    public function sendConfirmation()
    {
        $text = urlencode("Your complaint on lamppost: ".$this->lamp_id." is now repaired");
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

}
