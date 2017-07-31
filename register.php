<?php

	/*$email="";
	$username="";
	
	$password_1="";
	$password_2="";*/
	

	if($_POST){
		

session_start();
	require_once('database.php');
	$errors = array();
		$email=$_POST['email'];
		$username=$_POST['username'];
		$fullname=$_POST['fullname'];
		$password_1=$_POST['password_1'];
		$password_2=$_POST['password_2'];
		$_SESSION['EMAIL'] = $email;
		$_SESSION['PASSWORD'] = $password;
		



		if(empty($_POST["username"]))
			{
				$errors['username_error']="Username is required";
			}
		if(empty( $_POST["email"]))
			{
				$errors['email_error']="Email is required";
				
			}
			if(empty( $_POST["fullname"]))
			{
				$errors['fullname_error']="Fullname is required";
				
			}
		if(empty($_POST["password_1"]))
			{
				$errors['password_error']= "Password is required";
			}

		if($password_1!=$password_2)
			{	
				$error['errorNoMatch'] = "<p> password does not match</p>";

				echo "<p>Passwords do not match</p>";
				
			}
		if(count($errors)== 0)
		{
			$query = "INSERT INTO user(Email,Fullname,Username,Password) VALUES(:email,:fullname,:username,:password)" ;
			$statement = $db -> prepare($query);
			$statement -> bindValue(':email',$email);
			$statement -> bindValue(':fullname',$fullname);
			$statement -> bindValue(':username',$username);
			$statement -> bindValue(':password',$password_1);
			$statement -> execute();
			$statement ->closeCursor();

			header("location:login.php");

	
	   }

	}


?>

<!DOCTYPE html>
<hlml>
<head>

   <meta charset="utf-8"/>
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign Up</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="stylesheet" type="text/css" href="customize.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">

<meta charset="utf-8"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" >
	<link rel="stylesheet" type="text/css" href="customize.css">
	-->

  <title>Register</title>
  <div class="header">
  	<h2>Register</h2>
	<hr/>
  </div>

</head>
<body>


	<form id ="form1" method="post"   <?php if(isset($email) && isset($password_1)) echo  "action=login.php"?>>
	
<div class="container">
<div class="form-horizontal">
	

	<div class="form-group">
		<div class="col-md-2"><label>Email</label></div>
		
		<div class="col-md-6">
			<input type="email" id="emailId"  name="email" placeholder="Email" required="required">
		</div>
	</div>

<div class="form-group">
		<div class="col-md-2"><label>Full Name</label></div>
		
		<div class="col-md-6">
			<input type="text" name="fullname" placeholder="Full Name" required="required">
		</div>
	</div>

<div class="form-group">

		<div class="col-md-2"><label>Username</label></div>
		
		<div class="col-md-6"> 

			<input type="text" name="username" placeholder="Username" required="required">
		</div>

	</div>

<div class="form-group">
		<div class="col-md-2"><label>Password</label></div>
		
		<div class="col-md-6">
			<input type="password" name="password_1" placeholder="Password" required="required">
		</div>
	</div>

<div class="form-group">
		<div class="col-md-2"><label>Confirm Password</label></div>
		
		<div class="col-md-6">
			<input type="password" name="password_2" placeholder="Confirm Password" required="required">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<button type="submit" name="register" class="btn" >Register</button>
				<p>Already have an account? <a href="login.php">Sign in</a></p>
		</div>
	</div>

</div>
</div>
		
	</form>
	?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  ></script>
</body>
</hlml>