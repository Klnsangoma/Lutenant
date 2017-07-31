<?php 
require_once('database.php');
if($_POST){
  session_start();
$email= $_SESSION['EMAIL'];	
$bedrooms=filter_input(INPUT_POST,'Bedrooms');
$price=filter_input(INPUT_POST,'Price ');
$type=filter_input(INPUT_POST,'Type');
if($picture=filter_input(INPUT_POST,'Picture')== NULL || $picture=filter_input(INPUT_POST,'Picture') == FALSE){
  $picture=NULL;
}

$size=filter_input(INPUT_POST,'Size');

	
$query = 'INSERT INTO property_details
                 (Bedrooms,Price,Size,Type,HomePicture,Email)
              VALUES
                 (:bedrooms,:size, :price,:type,:picture ,:email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':bedrooms', $bedrooms);
	$statement->bindValue(':price', $price);
	    $statement->bindValue(':type', $type);
		$statement->bindValue(':size', $size);
		$statement->bindValue(':picture', $picture);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
	 


}
?>

<html>
<head>
 <meta charset="utf-8">
  <title>LuTenant </title>
  <meta name="lutenantApp" content= "LuTenant App" >
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0./css/bootstrap-theme.min.css"/>

    <nav class="navbar navbar-inverse navbar-fixed-top" id"my navber">
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
            <li><a href="#signIn">Manage Profile</a>
            <li><a href="#signIn">ViewAdverts</a>
            <li><a href="#signIn">ManageAdvets</a>
            <li><a href="#signIn">AddReview</a>

            <li><a href="#signIn">SignUp</a>

          </ul>
      </div>
    </div>

</nav>
</head>


<body>
</br></br>

<div class="container">
<div class="row">
<form name = "addPropertyDetailForm" class="form-control-danger" method="POST" enctype="multipart/form-data" action="ManageProperty.php">
</br>
</br>


	<div class="form-group  <?php  if(isset($error['ErrorBedrooms'])) { echo'has-error';}?> "> 
    <label for="Bedrooms">Bedrooms</label> </br>
    <input type="text" name="Bedrooms" class="form-control <?php  if(isset($error['ErrorBedrooms'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['Bedrooms'])); ?>"/>
   </div> 


<div class="form-group  <?php  if(isset($error['ErrorPrice'])) { echo'has-error';}?> "> 
    <label for="Price">Price</label></br>
    <input type="text" name="Price" class="form-control <?php  if(isset($error['ErrorPrice'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['Price'])); ?>"/>

  
<div class="form-group  <?php  if(isset($error['ErrorSize'])) { echo'has-error';}?> "> 
    <label for="Size">Size</label></br>
    <input type="text" name="Size" class="form-control <?php  if(isset($error['ErrorSize'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['Size'])); ?>"/>
   </div> 
  
   
<div class="form-group  <?php  if(isset($error['ErrorType'])) { echo'has-error';}?> "> 
    <label for="Type">Type</label></br>
    <input type="text" name="Type" class="form-control <?php  if(isset($error['ErrorType'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['Type'])); ?>" />
   </div> 
</br>
   <input type="file" name="Picture"/>
   <input type ="submit" name="upload" value="Upload"/>


 </form>
 <?php 


 

    // Add the product to the database  
   /* */

   

?>

<script src="https://code.jquery.com/jquery-2.2.1.min.js"  ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
</body>


</html>