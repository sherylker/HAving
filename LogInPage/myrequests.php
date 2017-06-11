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
	$result = mysqli_query($con,"SELECT posttable.ID, posttable.type FROM requesttable, posttable WHERE requesttable.postid = posttable.ID AND requesttable.requester = '$email'");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Type</th>
</tr>";

while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
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