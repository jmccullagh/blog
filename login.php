<?php
include 'core/int.php';

if (empty($_POST) === false) {
    $username =$_POST['username'];
    $password = $_POST['password'];
    
    if (empty($username) === true || empty($password) === true) {
        $errors[] = 'Please enter a username and password';
    } else if (user_exists($username) === false) {
        $errors[] = 'Your username or password is incorrect'; 
    } else if (user_active($username) === false) {
        $errors[] = 'Your account is not active. Please check you email to complete registration';
    } else {
        $login = login($username, $password);
        if ($login === false) {
            $errors[] = 'The username / password is incorrect';
        }else {
            echo 'ok!';
            //set the user session
            //redirect user to home
        }
    }
    
    print var_dump($errors);

}
?>