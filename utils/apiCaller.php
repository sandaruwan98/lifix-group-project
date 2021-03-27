<?php

namespace classes;

include_once  __DIR__ . '/../utils/classloader.php';

$recipient = $_POST["phone"];

if ($recipient) {
    if (session_id() == "") {
        session_start();
    }

    $otp = rand(1000, 9999);
    $_SESSION["otp"] = "$otp";

    Sms::sendOtp($recipient, $otp);
}
