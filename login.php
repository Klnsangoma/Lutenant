<?php
if($_POST){
	session_start();

	
$email = $_POST['email'];
$password = $_POST['password_1'];
if(isset($_SESSION['EMAIL'])){
$sessionEmail = $_SESSION['EMAIL'];
$sessionPassword =$_SESSION['PASSWORD'];
}

	if($email == $sessionEmail && $password ==$sessionPassword)
	{
		header('location : LutenantHomepage.php');

	} 

	if(empty($_SESSION['EMAIL']) && empty($_SESSION['PASSWORD'])){

		$_SESSION['EMAIL'] = $_POST['email'];
		$_SESSION['PASSWORD'] =$_POST['password_1'];

		$sessionEmail = $_SESSION['EMAIL'];
		$sessionPassword =$_SESSION['PASSWORD'];

		//THIS QUERY SELECTS ALL USERS
/*$queryUser="SELECT * FROM user";
$statementUsers=$db -> prepare($queryUser);
$statementUsers ->execute();
$allUsers= $statementUsers -> fetchAll();
$statementUsers -> closeCursor();
*/
//Check IF EMAIL AND PASSWORD EXIST
$queryCredentials = "SELECT Email,Password FROM user WHERE Email = :email AND Password = :password";
$statementCredentials =$db -> prepare($queryCredentials);
$statementCredentials ->bindValue(':email',$email);
$statementCredentials ->bindValue(':password',$password);
$statementCredentials ->execute();
$userFound = $statementCredentials ->fetchALL();
$statementCredentials ->closeCursor();


foreach($userFound as $user){

	if($user['Email'] == $sessionEmail && $user['Password'] ==$sessionPassword   ){
		header('location : LutenantHomepage.php');
		die();

 	} 
 	
 	

}
 	
}
}
 		
?>

<!DOCTYPE html>
<html>
<head>

   <meta charset="utf-8"/>
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign In</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="stylesheet" type="text/css" href="customize.css"/>

 

  
  <div class="header">
  	<h2>Log in</h2>
	<hr/>
  </div>

</head>
<body>


	<form id ="form1" method="post"  <?php if(isset($sessionEmail) && isset($sessionPassword)) echo  "action=LutenantHomepage.php"?> >
	
<div class="container">
<div class="form-horizontal">
	

	<div class="form-group">
		<div class="col-md-2"><label>Email</label></div>
		
		<div class="col-md-6">
			<input type="email" id="emailId"  name="email" placeholder="Email" required="required">
			
		</div>
	</div>

<div class="form-group">
		<div class="col-md-2"><label>Password</label></div>
		
		<div class="col-md-6">
			<input type="password" name="password_1" placeholder="Password" required="required">
			
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<button type="submit" name="register" class="btn" >Log In</button>
				<p>Don't have an account? <a href="register.php">Sign Up</a></p>
		</div>
	</div>
	
</div>
</div>
		
	</form>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" ></script>
</body>
</html>