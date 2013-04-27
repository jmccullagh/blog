<?php
include 'core/int.php';
include 'includes/overall/overallheader.php';

if (empty($_POST) === false) {
    $required_fields = array('FirstName','Username','Password','Password_Confirm','Email');
    foreach($_POST as $key=>$value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'Fields marked with an asterisk are required';
            break 1;
        }
    }
    
    if (empty($errors) === true) {
        if (user_exists($_POST['Username']) === true) {
            $errors[] = 'Sorry the username \'' . $_POST['Username'] . '\' is taken';
        }
        if (preg_match("/\\s/", $_POST['Username']) == true) {
            $errors[] = 'Your username cannot contain any spaces';
            
        }
        if (strlen($_POST['Password']) < 6) {
            $errors[] = 'Your password must have at least 6 characters';
        }
        if ($_POST['Password']!== $_POST['Password_Confirm']) {
            $errors[] = 'Your passwords do not match';
        }
        if (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'A valid email address is required';
        }
        if (email_exists($_POST['Email']) === true) {
            $errors[] = 'Sorry this email address \'' . $_POST['Email'] . '\' is already in use';
        }
    }
}


?>

<h1>Register</h1>

<form action="" method="post">
    <ul>
        <li>
            First name*:<br>
            <input type="text" name="FirstName">
        </li>
        <li>
            Last name:<br>
            <input type="text" name="LastName">
        </li>
        <li>
            Username*:<br>
            <input type="text" name="Username">
        </li>
        <li>
            Password*:<br>
            <input type="password" name="Password">
        </li>
        <li>
            Retype password*:<br>
            <input type="password" name="Password_Confirm">
        </li>
        <li>
            Email*:<br>
            <input type="text" name="Email">
        </li>
        <li>
            <input type="submit" value="Register">
        </li>
    </ul>
</form>

<?php
if (empty($_POST) === false && empty($errors) === true) {
$register_data = array
}else {
    echo output_errors($errors);
}
?>

<?php include 'includes/overall/overallfooter.php   '; ?>
