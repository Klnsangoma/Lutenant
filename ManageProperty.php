<?php
session_start();


$sessionEmail=$_SESSION['EMAIL'];

require_once("database.php");
$queryGetAllProperties = "SELECT AddressLine1 FROM property where Email = :email ";
$statementGetProp = $db ->prepare($queryGetAllProperties);
$statementGetProp -> bindValue(':email',$sessionEmail);
$statementGetProp ->execute();
$homes = $statementGetProp -> fetchAll();
$statementGetProp -> closeCursor();
$homeID= NULL;

$queryPropertyDetail ="SELECT * FROM property_detail WHERE PropertyID = :homeID";
$statementPropDetails = $db -> prepare($queryPropertyDetail);
$statementPropDetails -> bindValue(':homeID',$homeID);
$statementPropDetails -> execute();
$propDetails = $statementPropDetails ->fetchAll();
$statementPropDetails -> closeCursor();


?>
<!DOCTYPE html>
<html lang = "en">

<head>
  <meta charset="utf-8">
  <title>LuTenant </title>
  
 
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0./css/bootstrap-theme.min.css"/>



</div>

  
  </head>
  
  
<body>
<?php if($homes==NULL || $homes== FALSE) { ?>
</br>
</br></br>

<strong> YOU HAVE NO REGISTERED PROPERTIES TO MANAGE </strong>
<?php } ?>

<?php if(count($homes > 0)){?>
	<aside>
	<nav>
	<ul>
	<?php foreach ($homes as $home) :?>

	<li><a href=".?homeID=<?php echo $home['AddressLine1']; ?>"><?php echo $home['AddressLine1']; ?>
	</a></li>
	<?php  endforeach;?>
	</ul>
	</nav>
	</aside>
	
	<section>
	<table>
	<tr>
	<?php if(count($homes > 0)){ ?>

	 <th>BEDROOMS</th>  <th class="right">PRICE</th>  <th>SIZE</th> <th>TYPE</th> <th>&nbsp;</th>
	</tr> <?php } ?>
	<?php foreach($propDetails as $detail) { ?>
	<td><?php $detail['Bedroom'];?>  </td>
	<td><?php$detail['Price']; ?>  </td>
	<td><?php $detail['Size'];?>  </td>
	<td><?php $detail['type'];?>  </td>
	<td colspan=4><?php $detail['HomePicture'];} }?>  </td>
	
	
	
	
	</table>
	</section>
	<a href="property.php" >ADD NEW PROPPERTY ></a>
	





<script src="https://code.jquery.com/jquery-2.2.1.min.js"  ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" ></script>
</body>
</html>