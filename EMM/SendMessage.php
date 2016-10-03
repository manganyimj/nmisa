<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    
     $email = $_POST["email"];
     $name = $_POST["name"];
     $surname = $_POST["surname"];
     
     $fullName=$surname." ".$name;
     $message = $_POST["mssg"];
     
    //===============Send Email=================================
    $to = "nqobilemavuso@ymail.com";
    //$to="venussibiya@gmail.com";
    $subject ="EMM Contact us Message";
    $headers = 'From:' .$fullName. "\r\n" .
                           $email . "\r\n" .
                            'Hi' ;

    mail($to, $subject, $message, $headers);
    //==========================================================
    
    $_SESSION["signInMssg"]="You Message has been sent...!!";
    header('location:feedback.php');
}

?>