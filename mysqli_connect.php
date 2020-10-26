<?php # Script 9.2 - mysqli_connect.php




define('DB_USER', 'root1');
define('DB_PASSWORD', 'root@1313');
define('DB_HOST', 'localhost');
define('DB_NAME', 'IDEA_BOOKS');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
   
?>