 <?php include("header.php"); ?>
<?php
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($first, $last, $error)
 {
 ?>
 
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 



 <form action="" method="post">
 <div>
 <strong>First Name: </strong> <input type="text" name="FirstName" value="<?php echo $first; ?>" /><br/>
 <strong>Last Name: </strong> <input type="text" name="LastName" value="<?php echo $last; ?>" /><br/>
 <strong>Company: </strong> <input type="text" name="Company" value="<?php echo $company; ?>" /><br/>
<strong>Department: </strong> <input type="text" name="Department" value="<?php echo $department; ?>" /><br/>
<strong>Phone number: </strong> <input type="text" name="Phone1" value="<?php echo $phone1; ?>" /><br/>
<strong>Other phone number: </strong> <input type="text" name="Phone2" value="<?php echo $phone2; ?>" /><br/>
<strong>Email: </strong> <input type="text" name="Email1" value="<?php echo $email1; ?>" /><br/>
<strong>Other email: </strong> <input type="text" name="Email2" value="<?php echo $email2; ?>" /><br/>
<strong>Fax: </strong> <input type="text" name="Fax" value="<?php echo $fax; ?>" /><br/>
<strong>Street: </strong> <input type="text" name="Street1" value="<?php echo $street1; ?>" /><br/>
<strong>Street 2: </strong> <input type="text" name="Street2" value="<?php echo $street2; ?>" /><br/>
<strong>City: </strong> <input type="text" name="City" value="<?php echo $city; ?>" /><br/>
<strong>State: </strong> <input type="text" name="State" value="<?php echo $state; ?>" /><br/>
<strong>Zip: </strong> <input type="text" name="Zip" value="<?php echo $zip; ?>" /><br/>

 <p>* required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 <?php include("footer.php"); ?>

 <?php 
 }
 
 
 

 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
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
 
 mysql_query("INSERT customers SET FirstName='$FirstName', LastName='$LastName',
 				Company='$Company', Department='$Department', Phone1 = '$Phone1',
 				Phone2='$Phone2', Email1='$Email1', Email2='$Email2', Fax='$Fax',
 				Street1='$Street1',Street2='$Street2',City='$City',State='$State',Zip='$Zip'")

 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }
?> 

