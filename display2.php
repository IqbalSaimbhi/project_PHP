<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        

body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

        span{
            color:red;
            font-size: 0.8em;
        }
span.price {
  float: right;
  color: grey;
}
.form-style-9{
	max-width: 450px;
	background: #FAFAFA;
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
}
.form-style-9 ul{
	padding:0;
	margin:0;
	list-style:none;
}
.form-style-9 ul li{
	display: block;
	margin-bottom: 10px;
	min-height: 35px;
}
.form-style-9 ul li  .field-style{
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	padding: 8px;
	outline: none;
	border: 1px solid #B0CFE0;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;

}.form-style-9 ul li  .field-style:focus{
	box-shadow: 0 0 5px #B0CFE0;
	border:1px solid #B0CFE0;
}
.form-style-9 ul li .field-split{
	width: 49%;
}
.form-style-9 ul li .field-full{
	width: 100%;
}
.form-style-9 ul li input.align-left{
	float:left;
}
.form-style-9 ul li input.align-right{
	float:right;
}
.form-style-9 ul li textarea{
	width: 100%;
	height: 100px;
}
.form-style-9 ul li input[type="button"], 
.form-style-9 ul li input[type="submit"] {
	-moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
	-webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
	box-shadow: inset 0px 1px 0px 0px #3985B1;
	background-color: #216288;
	border: 1px solid #17445E;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	padding: 8px 18px;
	text-decoration: none;
	font: 12px Arial, Helvetica, sans-serif;
}
.form-style-9 ul li input[type="button"]:hover, 
.form-style-9 ul li input[type="submit"]:hover {
	background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
	background-color: #28739E;
}
</style>
    </head>
 <body>
     
     <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>1</b></span></h4>
      <p><?php
          
          
       
          

          session_start();
          
          require('mysqli_connect.php'); // Connect to the db.


   $itemid  = $_GET['itemid'];
          
// Determine where in the database to start returning results...
          
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

$sql="Select * FROM Book_Catalog WHERE bookID = $itemid";  
      
      
      $result = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    
		echo '
        
		
		<td align="left">' . $row['bookName'] . '</td>
        
		
          
        
	</tr>
	';
    
    
    
    
}
          
          
          $_SESSION['itemIID'] = $itemid;
          
          
          




?><span class="price">$15</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$15</b></span></p>
    </div>
     <br><br>
    
     <fieldset><legend>Enter Your Description:</legend>

         
         
         
  <form class="form-style-9" action ="submit.php" method="post">
<ul>
<li>
    <input type="text" name="username" class="field-style field-split align-left" placeholder="Name" 
           value="<?php 
            
             if (isset( $_POST["username"])) {
                 echo $_POST["username"];
                 }
            
        ?>"/>
    
    </li>
    <li>
    
    <input type="text" name="phone" class="field-style field-split align-right" placeholder="Contact" value="<?php 
            
             if (isset( $_POST["phone"])) {
                 echo $_POST["phone"];
                 }
            
        ?>"/>
        
        </li>
<li>
    
    
    <input type="email" name="email" class="field-style field-split align-left" placeholder="Email"
           value="<?php 
            
             if (isset( $_POST["email"])) {
                 echo $_POST["email"];
                 }
            
            ?>"/>  
    
    </li>
    
    
    <li>
    
    <input type="text" name="city" class="field-style field-split align-right" placeholder="City" value="<?php 
            
             if (isset( $_POST["city"])) {
                 echo $_POST["city"];
                 }
            
            ?>"/>
</li> 
    
<li>
<input type="text" name="country" class="field-style field-full align-left" placeholder="Country"
       value="<?php 
            
             if (isset( $_POST["country"])) {
                 echo $_POST["country"];
                 }
            
            ?>"/> 

</li>

<li>
    
    
<input type="submit" value="Submit" />
</li>
</ul>
</form>
    
    
     </fieldset>
     

</body>

 </html>


