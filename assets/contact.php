<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
$phone=$selecttext='';
if(isset($_POST["phone"])){
	$phone=$_POST["phone"];
}
if(isset($_POST["selecttext"])){
	$selecttext=$_POST["selecttext"];
}

$EmailTo = "riadhosan2@gmail.com";
$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
if(isset($_POST["address"]) && $_POST["address"]!=''){
	$Body .= "Address: ";
	$Body .= $_POST["address"];
	$Body .= "\n";
}
if(isset($_POST["sel"]) && $_POST["sel"]!=''){
	$Body .= "services: ";
	$Body .= $_POST["sel"];
	$Body .= "\n";
}
if(isset($_POST["sele"]) && $_POST["sele"]!=''){
	$Body .= "Person: ";
	$Body .= $_POST["sele"];
	$Body .= "\n";
}
if(isset($_POST["datetimepicker1"]) && $_POST["datetimepicker1"]!=''){
	$Body .= "Date: ";
	$Body .= $_POST["datetimepicker1"];
	$Body .= "\n";
}
if(isset($_POST["datetimepicker3"]) && $_POST["datetimepicker3"]!=''){
	$Body .= "Time: ";
	$Body .= $_POST["datetimepicker3"];
	$Body .= "\n";
}
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$Body .= "phone: ";
$Body .= $phone;
$Body .= "\n";
if(isset($_POST["selecttext"]) && $_POST["selecttext"]!=''){
	$Body .= "service: ";
	$Body .= $selecttext;
	$Body .= "\n";
}


// send email
$success = mail($EmailTo, $Subject, $Body, "contact.php".$email);
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