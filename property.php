<?php
session_start();
if(isset($_SESSION['EMAIL'])){

	
	

if($_POST){
	
$error = array();

$email=$_SESSION['EMAIL'];
$address1= filter_input(INPUT_POST,'AddressLine1',FILTER_SANITIZE_STRING);
$address2=filter_input(INPUT_POST,'AddressLine2',FILTER_SANITIZE_STRING);
$city=filter_input(INPUT_POST,'City',FILTER_SANITIZE_STRING);
$province=filter_input(INPUT_POST,'PROVINCES',FILTER_SANITIZE_STRING);

$_SESSION['ADDRESSLINE1'] = $address1;



if(empty($_POST['AddressLine1']))
{	$error['ErrorAddressLine1']= 'AddressLine1 cannot be empty ';
} 
if(empty($_POST['AddressLine2']))
{	$error['ErrorAddressLine2']= "AddressLine2 cannot be empty" ;
} 
if(empty($_POST['City']))
{	$error['ErrorCity']= "City cannot be empty"; 
} 
if(empty($_POST['PostalCode']))
{	$error['ErrorPostalCode']= "PostalCode cannot be empty" ;
} 
if(count($error)== 0){


require_once('database.php');


$queryRegister='INSERT INTO property_registration(AddressLine1,AddressLine2,City,Province,Email) VALUES(:address1,:address2,:city,:province, :email )   ';
$statementRegister = $db->prepare($queryRegister);
$statementRegister->bindValue(':address1', $address1);
$statementRegister->bindValue('address2',  $address2);
$statementRegister->bindValue(':city',$city);
$statementRegister->bindValue(':province',  $province);
$statementRegister->bindValue(':email',  $email);
$statementRegister->execute();
$statementRegister->closeCursor();
}
?>

<?php
echo " <p>INSERTED</P>";


}

}
  ?>



<!DOCTYPE html>
<html lang = "en">

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
            <li><a href="#signIn">Manage Profile</a></li>
            <li><a href="#signIn">ViewAdverts</a></li>
            <li><a href="#signIn">ManageAdvets</a></li>
            <li><a href="#signIn">AddReview</a></li>

            <li><a href="#signIn">SignUp</a>

          </ul>
      </div>
    </div>

</nav>
  
  </head>
<body>

</br>

<div class="container">
<div class="row">
<form method="post" action="add_PropertyDetail.php" class="form-control-danger" target="">
</br>
</br>

	<div class="form-group  <?php  if(isset($error['ErrorAddressLine1'])) { echo'has-error';}?> "> 
    <label for="AddressLine1">AddressLine1</label>
    <input type="text" name="AddressLine1" class="form-control <?php  if(isset($error['ErrorAddressLine1'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['AddressLine1'])); ?>"/>
   </div> 


<div class="form-group  <?php  if(isset($error['ErrorAddressLine2'])) { echo'has-error';}?> "> 
    <label for="AddressLine2">AddressLine2</label>
    <input type="text" name="AddressLine2" class="form-control <?php  if(isset($error['ErrorAddressLine2'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['AddressLine2'])); ?>"/>
    </div>

  
<div class="form-group  <?php  if(isset($error['ErrorCity'])) { echo'has-error';}?> "> 
    <label for="City">City</label>
    <input type="text" name="City" class="form-control <?php  if(isset($error['ErrorCity'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['City'])); ?>" id="City"/>
   </div> 
  
   
<div class="form-group  <?php  if(isset($error['ErrorPostalCode'])) { echo'has-error';}?> "> 
    <label for="PostalCode">PostalCode</label>
    <input type="text" name="PostalCode" class="form-control <?php  if(isset($error['ErrorPostalCode'])) echo'class="form-control form-control-danger;'?>"  value="<?php if(isset($_POST['PostalCode'])); ?>" />
   </div> 
  
 


<select name="PROVINCES">
<option value="Eastern Cape">Eastern Cape</option>
<option value="Free State">Free State</option>
<option value="Gauteng">Gauteng</option>
<option value="KwaZulu-Natal">KwaZulu-Natal</option>
<option value=">Mpumalanga">>Mpumalanga</option>
<option value="Northern Cape">Northern Cape</option>
<option value="North West">North West</option>
<option value="Western Cape">Western Cape</option>
</select>
  
</br>
<input type="submit" name="submit" value="submit"/>


  
  </div>
</div>
  
</form>






<script src="https://code.jquery.com/jquery-2.2.1.min.js"  ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
</body>
 </html >