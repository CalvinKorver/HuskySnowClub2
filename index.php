<?php



require 'vendor/autoload.php';
 
use App\SQLiteConnection;
use App\SQLiteInsert;
 
$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteInsert($pdo);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
if (isset($_POST['class'])) {
    $class = $_POST['class'];
    // echo 'selected class: ';
    // echo $class . '<br>';
}

if (isset($_POST['refer'])) {
    $refer = $_POST['refer'];
    // echo 'selected refer: ';
    // echo $refer . '<br>';
}

$buttonType = $_POST['button-type'];

if ($buttonType == 'interest') {
    $res = $sqlite->getEmailCount($email, 'interest');
    if ($res == 0) {
        $memberId = $sqlite->insertMemberInterest($fname, $lname, $email, $class);
        header("Location: interest-success.html");
    } else {
        header("Location: interest-error.html");
    }
}

if ($_POST['button-type'] == 'signup') {
    $canSignup = TRUE;

    if (isset($_POST['payment'])) {
        $payment = $_POST['payment'];

        if ($payment == 'cash' && isset($_POST['cashcode'])) {
            $cashcode = $_POST['cashcode'];
            $canSignup = $sqlite->checkCashCode($cashcode);
        }
    }

    if (isset($_POST['activity'])) {
        $activity = $_POST['activity'];
    }

    $res = $sqlite->getEmailCount($email, 'signup');
    if ($res == 0 && $canSignup) {
        $memberId = $sqlite->insertMemberSignup($fname, $lname, $email, $class, $refer, $activity, $payment);
        header("Location: pages/success.html");
    } else {
        header("Location: pages/error.html");
    }
}
 


