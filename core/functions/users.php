<?php
function user_exists($username) {
    $username = sanitize($username);
    $result = mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username'");
    return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username'"), 0) == 1);
}

function user_active($username) {
    $username = sanitize($username);
    return (mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username' AND `Active` = 1"), 0) == 1);
}

function user_id_from_username($username) {
    $username = sanitize($username);
    return mysql_result(mysql_query("SELECT `UserID` FROM `users` WHERE `Username` = '$username'"), 0, 'UserID');
}

function login($username, $password) {
    $user_id = user_id_from_username($username);
    
    $username = sanitize($username);
    //$password = sha1($password);
    
    return ((mysql_result(mysql_query("SELECT COUNT(`UserID`) FROM `users` WHERE `Username` = '$username' AND `Password` = '$password'")) == 1) ? $user_id : false);    
}
?>