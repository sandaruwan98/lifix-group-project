<?php
include "../connection.php";
session_start();


if ($_GET["q"] == "data") {
    $_SESSION["s_id"] = rand(0, 999);

    $_SESSION["name"]  = $_POST["name"];
    $_SESSION["nic"]  = $_POST["nic"];
    $_SESSION["phoneno"]  = $_POST["phoneno"];
    $_SESSION["lp_id"]  = $_POST["lp_id"];
    header("location: index.php?s=" . $_SESSION["s_id"] . "&q=1");
   
}


if ($_GET["q"] == "sendmessage") {
    $_SESSION["s_id"] = rand(0, 999);
    $user = "94701549225";
    $password = "9221";
    $verify_code = rand(1000, 9999);
    $_SESSION["vc"] = $verify_code;
    $text = urlencode("Your verification code : " . $verify_code);
    $to = $_SESSION["phoneno"];


    $baseurl = "http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
    $ret = file($url);

    $res = explode(":", $ret[0]);

    if (trim($res[0]) == "OK") {
        echo "Message Sent - ID : " . $res[1];


    header("location: index.php?s=" . $_SESSION["s_id"] . "&q=2");
    } else {
        echo "Sent Failed - Error : " . $res[1];
    }



}


if ($_GET["q"] == "verify") {
    $typedcode = $_POST["vcode"];

    if ($_SESSION["vc"] == $typedcode) {
        $name = $_SESSION["name"];
        $nic = $_SESSION["nic"];
        $phoneno = $_SESSION["phoneno"];
        $lp_id = $_SESSION["lp_id"];
        $q = "INSERT INTO complaints( name, phoneno, nic, lp_id) VALUES ( '$name','$phoneno','$nic','$lp_id' )";
        if ($conn->query($q) === TRUE) {
            echo "New record created successfully";
            header("location: index.php");
        }
    } else {
        // echo "<script>alert('fuck you !!!!');</script>";
        $_SESSION["invalid"] = 1;
        header("location: index.php?s=" . $_SESSION["s_id"] . "&q=2");
    }
}


// SELECT LAST_INSERT_ID()