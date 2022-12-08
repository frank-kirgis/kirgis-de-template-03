<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Bitte Namen eingeben ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Bitte E-Mail eingeben ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
/*
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Bitte Betreff eingeben ";
} else {
    $msg_subject = $_POST["msg_subject"];
}
*/

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Bitte Nachricht eingeben ";
} else {
    $message = $_POST["message"];
}

$EmailTo = "frank.kirgis@gmail.com";
$Subject = "Nachricht von e-commerce-manager.eu";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "E-Mail: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Nachricht: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>