<?php
//date_default_timezone_set('Africa/Johannesburg');


session_start();


	include 'database.php';
	if(isset($_POST['messageSubmit']))
	{
		$email=$_POST['email'];
      	$comDate=$_POST['comDate'];
		$message=$_POST['message'];
		$_SESSION['EMAIL'] =$email;
 
/*$sql="INSERT INTO comments (ema,comDate,message) VALUES('')"
	}*/
}
?>


<!DOCTYPE html>
<html>
<head>

 <meta charset="utf-8">
  <title>LuTenant </title>
  <meta name="lutenantApp" content= <?php echo "<a href='LutenantHomepage.php'>LuTenant App </a>";?>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />

<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0./css/bootstrap-theme.min.css"/>



<meta charset="utf-8">
	<title>Add comment</title>
	<link rel="stylesheet" type="text/css" href="customize.css">
</head>
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">

          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a href="" class="navbar-brand">LuTenant</a>

      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse" >
          <ul class="nav navbar-nav" >
            <li><a href="ManageProperty.php">Manage Property</a>
            <li><a href="reviews.php">Reviews</a>
            

            <li><a href=""></a>
           
           

          </ul>
      </div>
    </div>

</nav>


<div class="wrap">
<img src="images/house.jpg" alt="Its a beautiful house believe me!" >
</div>
<?php
echo "<form method='POST' action=''>
	<input type='hidden' name='userId' value='Anonymous'>
	<input type='hidden' name='comDate' value=''".date('Y-m-d H:i:s')."'>
	<textarea name='messsage' placeholder='Say something nice...'></textarea><br>
	<div class='form-group'>
		<div class='col-md-2'></div>
		<div class='col-md-6'>
			<button type='submit' name='messageSubmit' class='btn' >Comment</button>
				
		</div>
	</div>
</form>";
?>
<script src="https://code.jquery.com/jquery-2.2.1.min.js"  ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
</body>
</html>