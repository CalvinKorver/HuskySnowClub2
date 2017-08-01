<?php
<<<<<<< HEAD
 
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
 

=======
require 'vendor/autoload.php';
echo 'Running index.php';
use App\SQLiteConnection;
use App\SQLiteInsert;
use App\Config;

$pdo = (new SQLiteConnection()) -> connect();


if (!$pdo)
	echo 'Error, could not connect to the db';
else
	echo 'Connected to the SQLite db successfully';
	echo 'Starting Insert';	
	$sqlite = new SQLiteInsert($pdo);
	
	$sqlite->insertInterest('test1','test1','test1','test1');
>>>>>>> 1eefe2ea1d88b163d097b6c01cfc9afade6e6b69
