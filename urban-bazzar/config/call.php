<?php
session_start();
include 'settings.php';
include 'connect.php';
include 'helpers.php';
include 'loginfunctions.php';
include 'userfunctions.php';
include 'itemfunctions.php';
include 'categoryfunctions.php';
include 'brandfunctions.php';
include 'orderfunctions.php';
include 'messagefunction.php';
include 'itemfetcher.php';


$conn = new Connection(DBSERVER,DBUSER,DBPASS,DBNAME);
$conn = $conn->connectDB();

