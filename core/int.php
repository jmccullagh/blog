<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

if (logged_in() === true) {
    $session_UserID = $_SESSION['UserID'];
    $user_data = user_data($session_UserID, 'UserID', 'Username', 'Password', 'FirstName', 'LastName', 'Email');

}

$errors = array();
?>