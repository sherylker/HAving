 <?php
session_start();
require 'DBconfig/config.php';


if (isset($_GET['edit'])) {
$reqid=$_GET['edit'];
$result = mysqli_query($con,"SELECT * FROM requesttable where reqid='$reqid'");
$row=mysqli_fetch_array($result);
}

if (isset($_POST['new_time_req']) or isset($_POST['new_quantity_req'])) {
    $reqid=$_POST['reqid'];
    $new_quantity_req=$_POST['new_quantity_req'];
    $new_time_req=$_POST['new_time_req'];
    $sql = "UPDATE requesttable SET quantity_req='$new_quantity_req', time_req='$new_time_req' WHERE reqid='$reqid'";
    $result=mysqli_query($con, $sql);
    echo "<meta http-equiv='refresh' content='0;url=myrequests.php'>";

}
?>

 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
      <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/style.css" />

 </head>
 <body>
<div class = "form">

 <form id = "createPost" action = "editreq.php" class="myform" method="post">
  <input type="hidden" name="reqid" value="<?php echo $row['reqid'];?>"></br>

    <h3> Quantity: </h3>
  <input type = "number" class="inputvalues" name = "new_quantity_req" value="<?php echo $row['quantity_req'];?>"> </br>
    <h3> Timing(s): </h3>
  <input type = "text" class="inputvalues" name = "new_time_req" value="<?php echo $row['time_req'];?>"> </br>
<br>
<input type = "submit" name = "submit" value = "Update" id="btn">
<a href=homepage.php> <input type="button" id="btn" value="Back"/> </a>

</form>
</div>

 </body>
 </html>
