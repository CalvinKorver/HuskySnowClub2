<?php



require 'vendor/autoload.php';
 
use App\SQLiteConnection;
use App\SQLiteInsert;
use App\SQLiteMemberRoster;
 
$pdo = (new SQLiteConnection())->connect();

$sqlite = new SQLiteInsert($pdo);

$memberViewer = new SQLiteMemberRoster($pdo);



$canSignup = TRUE; // Global sign up allowed boolean
$buttonType = $_POST['button-type'];


if ($buttonType == 'admin') {
    if ($memberViewer -> checkAdminCode($_POST['admin_password'])) {
        echo "here";
        echo $memberViewer -> displayMembers();
        
    }
} else {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    if (isset($_POST['class']) ? $class = $_POST['class'] : $canSignup = false);




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
        $cashError = false;
        if ((isset($_POST['refer']) && $_POST['refer'] != null) ? $refer = $_POST['refer'] : $canSignup = false);
        if ((isset($_POST['payment'])  && $_POST['payment'] != null) ? $payment = $_POST['payment'] : $canSignup = false);
        if ((isset($_POST['activity']) && $_POST['activity'] != null) ? $activity = $_POST['activity'] : $canSignup = false);

        /* Checks if cashcode is correct if user selected cash as payment method */
        if ($payment == 'cash') {
            $cashcode = $_POST['cashcode'];
            if ($sqlite->checkCashCode($cashcode) != 1) { 
                $canSignup = false;
                $cashError = true;
            }
        }

        /* Checks if email exists*/
        $emailExists = $sqlite->memberExists($email, 'signup');
        
        // Case 1: We can insert a new member barring any database insertion errors
        if (!$emailExists && $canSignup) {
            $memberId = $sqlite->insertMemberSignup($fname, $lname, $email, $class, $refer, $activity, $payment);
            if ($memberId != null ) {
                header("Location: pages/success-signup");
            } else {
                header("Location: pages/error");
            }

        // Case 2: There was a cash code error
        } else if ($cashError) {
            header("Location: pages/passerror");

        // Case 3: There was a general failure, the email likely already exists in the database.
        } else {
            header("Location: pages/fail");
        }
    }
}


 


