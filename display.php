<html>
<body>
    

    </body>
</html>


<?php 


require('mysqli_connect.php'); // Connect to the db.


// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

// Define the query:
$q1 = "SELECT * FROM Book_Catalog";
$r1 = @mysqli_query($dbc, $q1); // Run the query.

echo '<h1>Book Catalog</h1>';



if($r1 === FALSE) { die(mysql_error()); } 


 
	 print "
  <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#E0FA14\">
   <tr>
   <td width=100>Book Name:</td> 
  <td width=100>Year</td> 
  <td width=100>Author</td> 
  <td width=100>Description</td>
  </tr>"; 


// Session starts now
session_start();

$bg = '#eeeeee';
while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
    
		echo '<tr bgcolor="' . $bg . '">
        
		<td align="left"><a href=display2.php?itemid=' . $row['bookID'] . '>' . $row['bookName'] . '</a></td>
		<td align="left">' . $row['bookYear'] . '</td>
        
		<td align="left">
        '. $row['bookAuthor'] . '
        </td>
        
        <td align="left">
        '. $row['bookDescription'] . '
        </td>
        
        
        
         
        
        
	</tr>
	';
} // End of WHILE loop.


echo '</tbody></table>';
mysqli_free_result($r1);
mysqli_close($dbc);

	




    
?>


