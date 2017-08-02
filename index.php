<?php
require 'vendor/autoload.php';
 
use App\SQLiteConnection;
use App\SQLiteInsert;
 
$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteInsert($pdo);

$fname = $_POST['interest-fname'];
$lname = $_POST['interest-lname'];
$email = $_POST['interest-email'];
if (isset($_POST['interest_class'])) {
    $interest = $_POST['interest_class'];

    echo 'selected class: ';
    echo $interest . '  ';
}
$buttonType = $_POST['button-type'];

if ($buttonType == 'interest') {
    $res = $sqlite->getEmailCount($email);
    if ($res == 0) {
        $memberId = $sqlite->insertMemberInterest($fname, $lname, $email, $class);
        header("Location: interest-success.html");
    } else {
        header("Location: interest-error.html");
    }
}

if ($_POST['button-type'] == 'signup') {
    
}
 


