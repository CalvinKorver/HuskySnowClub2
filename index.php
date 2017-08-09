<?php



require 'vendor/autoload.php';
 
use App\SQLiteConnection;
use App\SQLiteInsert;
 
$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteInsert($pdo);

$canSignup = TRUE; // Global sign up allowed boolean

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
if (isset($_POST['class']) ? $class = $_POST['class'] : $canSignup = false);



$buttonType = $_POST['button-type'];

if ($buttonType == 'interest') {
    $memberExists = $sqlite->memberExists($email, 'interest');
    if (!$memberExists) {
        $memberId = $sqlite->insertMemberInterest($fname, $lname, $email, $class);
        header("Location: pages/success.html");
    } else {
        header("Location: pages/fail.html");
    }
}

if ($_POST['button-type'] == 'signup') {
    if ((isset($_POST['refer']) && $_POST['refer'] != null) ? $refer = $_POST['refer'] : $canSignup = false);
    if ((isset($_POST['payment'])  && $_POST['payment'] != null) ? $payment = $_POST['payment'] : $canSignup = false);
    if ((isset($_POST['activity']) && $_POST['activity'] != null) ? $activity = $_POST['activity'] : $canSignup = false);

    /* Checks if cashcode is correct if user selected cash as payment method */
    if ($payment == 'cash' && isset($_POST['cashcode'])) {
        $cashcode = $_POST['cashcode'];
        $canSignup = $sqlite->checkCashCode($cashcode);
    }

    /* Checks if email exists*/
    $emailExists = $sqlite->memberExists($email, 'signup');
    if (!$emailExists && $canSignup) {
        $memberId = $sqlite->insertMemberSignup($fname, $lname, $email, $class, $refer, $activity, $payment);
        if ($memberId != null ) {
            header("Location: pages/success-signup.html");
        } else {
            header("Location: pages/fail.html");
        }
    } else {
        header("Location: pages/fail.html");
    }
}
 


