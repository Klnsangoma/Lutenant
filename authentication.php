<?php require_once('database.php');





//Check IF EMAIL AND PASSWORD EXIST
/*

$username = filter_input(INPUT_GET, "email");
$password_1 = filter_input(INPUT_GET, "password_1");*/



if(isset($_POST['submit']))
{
$email = trim($_POST['email']);
$password_1 = trim($_POST['password_1']);
$queryCredentials = "SELECT Email, Password FROM user WHERE Email = '$email' AND Password = '$password_1'";

$result = mysqli_query($mysqli,$queryCredentials)or die(mysqli_error());

redirect("LutenantHomepage.php");

}




?>