 <?php 
session_start();
require 'DBconfig/config.php';


if (isset($_GET['edit'])) {
$id=$_GET['edit'];
$result = mysqli_query($con,"SELECT * FROM posttable where ID='$id'");
$row=mysqli_fetch_array($result);
} 

if (isset($_POST['new_type']) or isset($_POST['new_description']) or isset($_POST['new_quantity']) or isset($_POST['new_expdate']) or isset($_POST['new_location']) or isset($_POST['new_time'])) {

    $id=$_POST['ID'];
    $new_type=$_POST['new_type'];
    $new_description=$_POST['new_description'];
    $new_quantity=$_POST['new_quantity'];
    $new_expdate=$_POST['new_expdate'];
    $new_location=$_POST['new_location'];
    $new_time=$_POST['new_time'];
    $sql = "UPDATE posttable SET type='$new_type', description='$new_description', quantity='$new_quantity', expdate='$new_expdate', location='$new_location', time='$new_time' WHERE id='$id'";
    $result=mysqli_query($con, $sql);
    echo "<meta http-equiv='refresh' content='0;url=mylistings.php'>";

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

 <form id = "createPost" action = "edit.php" class="myform" method="post">
  <input type="hidden" name="ID" value="<?php echo $row['ID'];?>"></br>
    <h3> Type of item: </h3>
  <input type= "text" class="inputvalues" name = "new_type" size = "50" value="<?php echo $row['type'];?>" > </br>
  <h3> Description: </h3>
  <input class="inputvalues" type = "text" name = "new_description" wrap = "soft" size = "80 100" value="<?php echo $row['description'];?>"> </br>
  <h3> Quantity: </h3>
  <input type = "number" class="inputvalues" name = "new_quantity" value="<?php echo $row['quantity'];?>"> </br>
  <h3> Expiry date (if applicable): </h3>
  <input type = "date" class="inputvalues" name = "new_expdate" value="<?php echo $row['expdate'];?>"> </br>
  <h3> Collection point(s): </h3>
  <input type = "text" class="inputvalues" name = "new_location" size = "50" value="<?php echo $row['location'];?>"> </br>
  <h3> Timing(s): </h3>
  <input type = "text" class="inputvalues" name = "new_time" size = "30" value="<?php echo $row['time'];?>"> </br>

<h3> For food products: </h3>
<input type = "checkbox" name="guideline" font-size: "14px"> I agree to the <a href= "http://www.nea.gov.sg/docs/default-source/public-health/food-hygiene/Guidelines/guidelines-on-food-donation-.pdf"> NEA guideline of food donation</a>.</br></br> </br>

<input type = "submit" name = "submit" value = "Update" id="btn">
<a href=homepage.php> <input type="button" id="btn" value="Back"/> </a>

</form>
 
 </body>
 </html>