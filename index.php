<?php
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
