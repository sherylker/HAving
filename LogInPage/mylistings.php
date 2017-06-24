<?php 
session_start();
require 'DBconfig/config.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Listings</title>
 	<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/style.css" />

 </head>

 <body>

  <div class="form">


  <?php 

    $email=$_SESSION['email'];
	$result = mysqli_query($con,"SELECT * FROM posttable where email='$email'");

echo "<table border='1'>
<tr>
<th>Type</th>
<th>Quantity</th>
<th>Location</th>
<th>Time</th>
<th>Interested Parties </th>
<th>Edit</th>
</tr>";

while($row = mysqli_fetch_array($result)){

$postid=$row['ID'];
echo "<tr>";
echo "<td>" . $row['type'] . "</td>";
// echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
// echo "<td>" . $row['expdate'] . "</td>";
// echo "<td>" . $row['location'] . "</td>";
// echo "<td>" . $row['time'] . "</td>";
echo "<td>";

$result_2 = mysqli_query($con, "SELECT * FROM requesttable where postid='$postid'");
while ($row_2 = mysqli_fetch_array($result_2)){	
echo $row_2['requester'];?>,<?php
echo $row_2['status'];?>,<?php
echo $row_2['quantity_req'];

$reqid=$row_2['reqid'];
$approve='approve' . $reqid;
$decline='decline' . $reqid;
?> 
<form action="mylistings.php" method="post">
<input type= "submit" value="Approve" name= "<?php echo $approve;?>"> <!-- tmp is the id for the row -->
<input type= "submit" value="Decline" name= "<?php echo $decline;?>"> </br>
</form>
<?php

		//If the approved button is clicked

		if (isset($_POST[$approve])) {	
			$reqid=substr($approve, 7);
			$result_3 = mysqli_query($con, "SELECT * FROM requesttable where reqid='$reqid'");
			$row_3 = mysqli_fetch_array($result_3);

		    $new_quantity= ($row['quantity'] - $row_3['quantity_req']);

		    $update_qty = "UPDATE posttable SET quantity='$new_quantity' WHERE ID='$postid'";
		    $update_status = "UPDATE requesttable SET status='Approved' WHERE reqid='$reqid'";

		    mysqli_query($con, $update_qty);
		    mysqli_query($con, $update_status);		
		
		    echo "<meta http-equiv='refresh' content='0;url=mylistings.php'>";

		}

		if (isset($_POST[$decline])) {
			$reqid=substr($decline, 7);
			$update_status = "UPDATE requesttable SET status='Declined' WHERE reqid='$reqid'";
		    mysqli_query($con, $update_status);	

		    echo "<meta http-equiv='refresh' content='0;url=mylistings.php'>";

		}



}
echo "</td>"; 
echo "<td>"; 
?>

<a href='edit.php?edit=<?php echo $row['ID'];?>'>edit</a>

  <?php
echo "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

	<br><br>
  <a href=homepage.php> <input type="button" id="btn" value="Back"/> </a>


</div>
</body>
</html>