<?php include("curPageURL.php") ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="Site.css" rel="stylesheet"/>
    
    <!--- Photo slideshow --->
  
    <link rel="stylesheet" type="text/css" href="../images/engine1/style.css" />
	<script type="text/javascript" src="../images/engine1/jquery.js"></script>

</head>
<body>

<?php include("navigation.php"); ?> 


<div id="Header">


    <img src="../images/aspinlogo.png" alt="ASPIN Catering" style="height:150px;width:150px;" href="../index.php" />
		
	<div id="ContactContainer">
		(609) 555-1212 </br>
		contact@aspincatering.com
	</div>

<?php $URL = curPageURL(); ?>

  <?php if ($URL == "http://www.adambehrman.com/" || $URL == "http://www.adambehrman.com/index.php") : ?>

	<div id="buttoncontainer">
	<a class="button" href="#">Order Here</a>
	</div>	

  <?php endif; ?>	

</div>

  

