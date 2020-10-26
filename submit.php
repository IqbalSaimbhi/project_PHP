<?php	

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    
    $result = True;
    
  if(!empty($_POST['username']) ){
        $username = $_POST['username'];
            $santized_name = filter_var($username, FILTER_SANITIZE_STRING);
  }
    else{
        echo nl2br("User Name is Blank!!\n");
        $result = False;
    }
    
  if(!empty($_POST['phone']) ){
        $phone = $_POST['phone'];
             $santized_phone = filter_var($phone, FILTER_SANITIZE_STRING);
      
      if (filter_var($santized_phone, FILTER_VALIDATE_INT)) {
          
          if(strlen($santized_phone)>=10){
              
          }
          else{
               echo nl2br("Contact no. Should be more than or equal to 10 Digits!!\n");
              $result = False;
          }
          
    
} 
      else {
    echo nl2br("Contact No. Should not be Character!!\n");
          $result = False;
}
      
        }
    else{
        echo nl2br("Contact No. is Blank!!\n");
        $result = False;
    }
    
              if(!empty($_POST['email'])){
                    $email = $_POST['email'];
                   $santized_email = filter_var($email, FILTER_SANITIZE_STRING);
                
                      if(strpos($santized_email,'@') && strpos($santized_email,'.com')){
                          
                      }
                      else{
                         echo nl2br("Invalid Email ID"); 
                          $result = False;
                      }
              
                  
                  
              }
     else{
        echo nl2br("Email Should not be Blank!!\n");
         $result = False;
    }
    
      if(!empty($_POST['city'])){
            $city = $_POST['city'];
                              $santized_city = filter_var($city, FILTER_SANITIZE_STRING);
                    }
     else{
        echo nl2br("City is Blank!!\n");
         $result = False;
         
    }
                          if(!empty($_POST['country'])){
                                $country = $_POST['country'];
                                    $santized_cntry = filter_var($country, FILTER_SANITIZE_STRING);
                          }
     else{
        echo nl2br("Country is Blank!!\n");
         $result = False;
    }
      
      
  
      

if($result == False){
    
}
else{     
//echo nl2br("All Good. Success !!\n");
    //check form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
require('mysqli_connect.php'); // Connect to the db.
    
    
    
    
    
    
    // Insert into Customer query
$query = 'INSERT into customerDetails (custName, custContact, custEmail, custCity, custCountry) values (?,?,?,?,?)';
    

    $stmt = mysqli_prepare($dbc, $query);
        
/* bind query */      
    mysqli_stmt_bind_param($stmt,'sssss',$santized_name,$santized_phone,$santized_email,$santized_city,$santized_cntry);

  /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);
    
if ($stmt->affected_rows ==1){
 // echo nl2br("Data has been inserted in Customer Table\n");
}
else{
  echo $stmt->error;
}
    
    
    
    
    
    
    
    
    
    //SELECTING LAST RECORD
    
    
    $sql="SELECT * FROM customerDetails ORDER BY custID DESC LIMIT 1";  
      
      
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //echo "" . $row["custID"]. "";
      
      $customerID = $row["custID"];
  }
} else {
  echo "0 results";
}
   
    
 session_start();
    
  $bookIID =  $_POST['itemid'] = $_SESSION['itemIID'];
    

  
    
    
    
    

    // Insert into OrderDetails query
    
    
    
$q2 = "INSERT INTO orderDetails(bookID, custID, time) VALUES($bookIID,$customerID, NOW())";
if (!mysqli_query($dbc, $q2)) {
  echo "Entry not Inserted.";
}    else{
  //  echo "Entry Inserted successfully";
    
}
    
    
    
   // UPDATE into Inventory query
   
    
    $q2 = "UPDATE InventoryOrder SET availQuantity = availQuantity-1 WHERE bookID = $bookIID";
if (!mysqli_query($dbc, $q2)) {
  echo "Update Unsuccessful.";
}    else{
//    echo "Updated Successfully !!";
    
}
    
    
    
    //SELECTING LAST RECORD FOR DISPLAY
    
    
    $sql="SELECT * FROM orderDetails ORDER BY orderID DESC LIMIT 1";  
      
      
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //echo "" . $row["custID"]. "";
      
      $orderID = $row["orderID"];
 //    echo "$orderID";
  }
} else {
  echo "0 results";
}
    
    

    
    
    
    
    
    
    
    
    
//close the statement
$stmt->close();
unset($stmt);
//close the connection


    
}
}
      
      
      
      
  }
    

else{
    echo "Something Went Wrong";
}
      
      



?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                            <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">IDEA-BOOKS</h1>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                <tr>
                                                    
                                                   
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">  </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Order Confirmation # </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"><?php  
                                                    
                                            //SELECTING LAST RECORD FOR DISPLAY
    
    error_reporting(0);
    $sql="SELECT * FROM orderDetails ORDER BY orderID DESC LIMIT 1";  
      
      
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //echo "" . $row["custID"]. "";
      
      $orderID = $row["orderID"];
     echo "$orderID";
  }
} else {
  echo "0 results";
}        ?></td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> Purchased Item (<?php  
                                                    
                                            //SELECTING LAST RECORD FOR DISPLAY
    
    error_reporting(0);
    $sql="SELECT * FROM Book_Catalog WHERE bookID = $bookIID";  
      
      
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //echo "" . $row["custID"]. "";
      
      $bookName = $row["bookName"];
     echo "$bookName";
  }
} else {
  echo "0 results";
}        ?>) </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> $10.00 </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Shipping + Handling </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> $3.00 </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Sales Tax </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> $2.00 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> $15.00 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>