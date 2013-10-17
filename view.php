<?php include("header.php");

/* 
        VIEW.PHP
        Displays all data from 'players' table
*/

        // connect to the database
        include('connect-db.php');

        // get results from database
        $result = mysql_query("SELECT * FROM customers") 
               or die(mysql_error());  
                
        // display data in table
        echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Company</th> <th>Phone Number</th> <th>Email</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['FirstName'] . '</td>';
                echo '<td>' . $row['LastName'] . '</td>';
				echo '<td>' . $row['Company'] . '</td>';
                echo '<td>' . $row['Phone1'] . '</td>';
                echo '<td>' . $row['Email1'] . '</td>';
                
                
                echo '<td><a href="edit.php?ID=' . $row['ID'] . '">Edit</a></td>';
                echo '<td><a href="delete.php?ID=' . $row['ID'] . '">Delete</a></td>';
                echo "</tr>"; 
        } 

        // close table>
        echo "</table>";
?>
<p><a href="new.php">Add a new record</a></p>

<?php include("footer.php"); ?>