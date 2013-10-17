<?php
/* 
 CONNECT-DB.PHP
 Allows PHP to connect to your database
*/

 // Database Variables (edit with your own server information)
 $server = 'ASPINdb478.db.11960925.hostedresource.com';
 $user = 'ASPINdb478';
 $pass = 'Summer11!';
 $db = 'ASPINdb478';
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());


?>
