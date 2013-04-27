<?php

function user_data($UserID) {
 $data = array();
 $userID = (int) $UserID;
 
 $func_num_args = func_num_args();
 $func_get_args = func_get_args();
 
 if ($func_num_args > 1) {
    unset($func_get_args[0]);
    
    $fields = '`' . implode('`, `', $func_get_args) . '`';
    $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `UserID` = $UserID"));
    
    return $data;
 }
}

function logged_in() {
    return (isset($_SESSION['UserID'])) ? true : false;    
}

function user_exists($username) {
    $username = sanitize($username);
    $result = mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username'");
    return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username'"), 0) == 1);
}

function email_exists($email) {
    $email = sanitize($email);
    $result = mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Email` = '$email'");
    return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Email` = '$email'"), 0) == 1);
}

/*function user_active($username) {
    $username = sanitize($username);
    return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username' AND `Active` = 1"), 0) == 1);
}*/

function user_id_from_username($username) {
    $username = sanitize($username);
    return mysql_result(mysql_query("SELECT `UserID` FROM `users` WHERE `Username` = '$username'"), 0, 'UserID');
}

function login($username, $password) {
    $user_id = user_id_from_username($username);
    
    $username = sanitize($username);
    //$password = md5($password);
    
    return ((mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username' AND `Password` = '$password'"), 0) == 1) ? $user_id : false);    
}
?>