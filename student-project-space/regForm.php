<?php

// Create connection
$con = mysql_connect(':mysql','test2','123'); //'mysql.default_host','mysql_user','mysql_password'

//check connection
if (!$con) {
  die("Connection failed: " . mysql_error());
}

//select database
mysql_select_db("CIT647StudentsConcertsProfiles", $con);

//Create Random Unique ID for RowNum field in Database Table
$pattern = "1234567890";
$RowID = rand(0, 100000);

//Store form names in variables
$First = $_POST['FirstName'];
$Last = $_POST['LastName'];
$Phone = $_POST['PhoneNum'];

//sql to insert data into table
$sql = "INSERT INTO CIT647StudentsConcertProfilesTable (RowNum, FirstName, LastName, PhoneNum) VALUES ('$RowID', '$First', '$Last', '$PhoneNum')";

if (mysql_query($sql, $con)) {
  echo <<<Message
    <div style="text-align:center;">
      <h1>We've received your information.</h1>
      <center>
      Thank you for submitting your information for the concert.<br>
      Make sure to print a copy of the following information for your records,<br>
      including the following confirmation ID which will be used to print <br>
      a ticket for you when you arrive at the ticket booth.<br>
        <br>
      Your ticket confirmation number is as follows:<br>
      <br>

        Confirmation Number: $RowID<br>
        First Name: $First<br>
        Last Name: $Last<br>
        Phone Number: $Phone

        <p/>
        <input type="button"
        onClick="window.print()"
        value="Print This Page"/>
        <br><br> <a href="index.html">Return to the homepage</a>
    </div>
Message;
} else {
  echo "ERROR: Not able to execute $sql. " , mysql_error($con);
}

//Close the connection
mysql_close($con);
/*
 * To change this template use Tools | Templates.
 */
?>