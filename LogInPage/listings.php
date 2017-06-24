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

	$result = mysqli_query($con,"SELECT * FROM posttable where email!='$email'");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Type</th>
<th>Description</th>
<th>Quantity</th>
<th>Expdate</th>
<th>Location</th>
<th>Time</th>
<th>Grab</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
$tmp=$row['ID'];
$supplier=$row['email'];
$requester=$_SESSION['email'];

echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['expdate'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['time'] . "</td>";
echo "<td>"
?>


  <form name="form" method="POST" action="listings.php">
  <input type = "number" class="inputvalues" name = "quantity_req" placeholder = "20" id="reqamount"> </br>
  <input type = "text" class="inputvalues" name = "time_req" placeholder = "730pm" id="reqtime"> </br>
     <input type="submit"  value="Grab" name="<?php echo $tmp;?>">
   </form>


    <?php
    echo "</td>";
?>


<?php
   if (isset($_POST[$tmp])) {
   	$quantity_req=$_POST['quantity_req'];
    $time_req=$_POST['time_req'];
	$query= "insert into requesttable (`supplier`, `requester`, `postid`, `quantity_req`,
        `status`, `time_req`) values( '$supplier', '$requester', '$tmp', '$quantity_req', 'Pending', '$time_req')";
    $query_run = mysqli_query($con, $query);
	}
?>

<?php
echo "</td>";
echo "</tr>";

}
echo "</table>";

mysqli_close($con);
?>

	<br><br>
  <a href=createpost.php> <input type="button" id="btn" value="Add a listing!"/> </a>
  <a href=homepage.php> <input type="button" id="btn" value="Back"/> </a>



</div>
</body>
</html>
