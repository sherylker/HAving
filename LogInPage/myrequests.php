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
	$result = mysqli_query($con,"SELECT requesttable.reqid, posttable.type, requesttable.quantity_req, requesttable.time_req, requesttable.status FROM requesttable, posttable WHERE requesttable.postid = posttable.ID AND requesttable.requester = '$email'");

echo "<table border='1'>
<tr>
<th>Type</th>
<th>Quantity</th>
<th> Timing </th>
<th>Status</th>
<th> Edit </th>
<th> Delete </th>
</tr>";

while($row = mysqli_fetch_array($result)){
echo "<tr>";
$reqid= $row['reqid'];
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['quantity_req'] . "</td>";
echo "<td>" . $row['time_req'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "<td>"

?>
<a href='editreq.php?edit=<?php echo $row['reqid'];?>'>edit</a>
<?php
echo "</td>";

echo "<td>";
?>
<form action = "myrequests.php" method = "post">
<input type= "submit" value="Delete" name= "<?php echo $reqid;?>">
</form>
  <?php

  if(isset($_POST[$reqid])) {
    $delq = mysqli_query($con, "DELETE FROM requesttable WHERE reqid='$reqid'");
    echo "<meta http-equiv='refresh' content='0;url=myrequests.php'>";
  }
echo "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

	</br></br>
  <a href=homepage.php> <input type="button" id="btn" value="Back"/> </a>

</div>
</body>
</html>
