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
<th>Description</th>
<th>Quantity</th>
<th>Expdate</th>
<th>Location</th>
<th>Time</th>
<th>Grab</th>
</tr>";

while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['expdate'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "<td>" . $row['time'] . "</td>";
echo "<td> Grab </td>";
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