<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($ID, $FirstName, $LastName, $Company, $Department, $Phone1, $Phone2, $Email1, $Email2,
 			 $Fax, $Street1, $Street2, $City, $State, $Zip, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 <link href="Site.css" rel="stylesheet">
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 <form action="" method="post">
 <input type="hidden" name="ID" value="<?php echo $ID   ; ?>"/>
 <div>
 <p><strong>ID:</strong> <?php echo $ID; ?></p>
  <strong>First Name: </strong> <input type="text" name="FirstName" value="<?php echo $FirstName; ?>" /><br/>
 <strong>Last Name: </strong> <input type="text" name="LastName" value="<?php echo $LastName; ?>" /><br/>
 <strong>Company: </strong> <input type="text" name="Company" value="<?php echo $Company; ?>" /><br/>
<strong>Department: </strong> <input type="text" name="Department" value="<?php echo $Department; ?>" /><br/>
<strong>Phone number: </strong> <input type="text" name="Phone1" value="<?php echo $Phone1; ?>" /><br/>
<strong>Other phone number: </strong> <input type="text" name="Phone2" value="<?php echo $Phone2; ?>" /><br/>
<strong>Email: </strong> <input type="text" name="Email1" value="<?php echo $Email1; ?>" /><br/>
<strong>Other email: </strong> <input type="text" name="Email2" value="<?php echo $Email2; ?>" /><br/>
<strong>Fax: </strong> <input type="text" name="Fax" value="<?php echo $Fax; ?>" /><br/>
<strong>Street: </strong> <input type="text" name="Street1" value="<?php echo $Street1; ?>" /><br/>
<strong>Street 2: </strong> <input type="text" name="Street2" value="<?php echo $Street2; ?>" /><br/>
<strong>City: </strong> <input type="text" name="City" value="<?php echo $City; ?>" /><br/>
<strong>State: </strong> <input type="text" name="State" value="<?php echo $State; ?>" /><br/>
<strong>Zip: </strong> <input type="text" name="Zip" value="<?php echo $Zip; ?>" /><br/><p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form>
 </body>
 </html> 
 <?php
 }



 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['ID']))
 {
 // get form data, making sure it is valid
 $ID =   $_POST['ID'];
 $FirstName = mysql_real_escape_string(htmlspecialchars($_POST['FirstName']));
 $LastName = mysql_real_escape_string(htmlspecialchars($_POST['LastName']));
 $Company = mysql_real_escape_string(htmlspecialchars($_POST['Company']));
 $Department = mysql_real_escape_string(htmlspecialchars($_POST['Department']));
 $Phone1 = mysql_real_escape_string(htmlspecialchars($_POST['Phone1']));
 $Phone2 = mysql_real_escape_string(htmlspecialchars($_POST['Phone2']));
 $Email1 = mysql_real_escape_string(htmlspecialchars($_POST['Email1']));
 $Email2 = mysql_real_escape_string(htmlspecialchars($_POST['Email2']));
 $Fax = mysql_real_escape_string(htmlspecialchars($_POST['Fax']));
 $Street1 = mysql_real_escape_string(htmlspecialchars($_POST['Street1']));
 $Street2 = mysql_real_escape_string(htmlspecialchars($_POST['Street2']));
 $City = mysql_real_escape_string(htmlspecialchars($_POST['City']));
 $State = mysql_real_escape_string(htmlspecialchars($_POST['State']));
 $Zip = mysql_real_escape_string(htmlspecialchars($_POST['Zip']));
 
 
 mysql_query("UPDATE customers SET FirstName='$FirstName', LastName='$LastName',
 				Company='$Company', Department='$Department', Phone1 = '$Phone1',
 				Phone2='$Phone2', Email1='$Email1', Email2='$Email2', Fax='$Fax',
 				Street1='$Street1',Street2='$Street2',City='$City',State='$State',Zip='$Zip' WHERE ID=$ID")
 or die(mysql_error()); 
 

 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['ID']) && is_numeric($_GET['ID']) && $_GET['ID'] > 0)
 {
 // query db
 $ID = $_GET['ID'];
 $result = mysql_query("SELECT * FROM customers WHERE ID= $ID")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $FirstName = $row['FirstName'];
 $LastName = $row['LastName'];
 $Company = $row['Company'];
 $Department = $row['Department'];
 $Phone1 = $row['Phone1'];
 $Phone2 = $row['Phone2'];
 $Email1 = $row['Email1'];
 $Email2 = $row['Email2'];
 $Fax = $row['Fax'];
 $Street1 = $row['Street1'];
 $Street2 = $row['Street2'];
 $City = $row['City'];
 $State = $row['State'];
 $Zip = $row['Zip'];
 
 
 // show form
 renderForm($ID, $FirstName, $LastName, $Company, $Department, $Phone1, $Phone2, $Email1, $Email2,
 			 $Fax, $Street1, $Street2, $City, $State, $Zip,'');
 }  
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>