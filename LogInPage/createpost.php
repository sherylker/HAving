<?php
session_start();
require 'DBconfig/config.php';

 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title> Create a posting </title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>

  <div class="form">
  <center>  <h1> Create a Post </h1> </center>

  <form id = "createPost" action = "createpost.php" class="myform" method="post">
  <h3> Type of item: </h3>
  <input type= "text" class="inputvalues" name = "type" size = "50" placeholder = "Canned food, mattress etc..."> </br>
  <h3> Description: </h3>
  <input class="inputvalues" type = "text" name = "description" wrap = "soft" size = "80 100" placeholder = "Indicate the brand, if it's halal (for food), description..."> </br>
  <h3> Quantity: </h3>
  <input type = "number" class="inputvalues" name = "quantity" placeholder = "20"> </br>
  <h3> Expiry date (if applicable): </h3>
  <input type = "date" class="inputvalues" name = "expdate"> </br>
  <h3> Collection point(s): </h3>
  <input type = "text" class="inputvalues" name = "location" size = "50" placeholder = "Clementi NTUC Counter 8"> </br>
  <h3> Timing(s): </h3>
  <input type = "text" class="inputvalues" name = "time" size = "30" placeholder = "7pm - 9pm; 1030pm -1130pm"> </br>

<h3> For food products: </h3>
<input type = "checkbox" name="guideline" font-size: "14px"> I agree to the <a href= "http://www.nea.gov.sg/docs/default-source/public-health/food-hygiene/Guidelines/guidelines-on-food-donation-.pdf"> NEA guideline of food donation</a>.</br></br> </br>

<input type = "submit" name = "submit" value = "Post" id="btn">
<a href=homepage.php> <input type="button" id="btn" value="Back"/> </a>

</form>

<?php

	if (isset($_POST['submit'])) {

		$type=$_POST['type'];
		$description=$_POST['description'];
		$quantity=$_POST['quantity'];
		$expdate=$_POST['expdate'];
		$location=$_POST['location'];
		$time=$_POST['time'];
    $email=$_SESSION['email'];

		$query= "insert into posttable (`type`, `description`, `quantity`, `expdate`,
        `location`, `time`, `email`) values( '$type', '$description', '$quantity', '$expdate', '$location', '$time', '$email')";
    $query_run = mysqli_query($con, $query);
    //  echo "<meta http-equiv='refresh' content='0;url=listings.php'>";
	}

?>

</div>

</body>
</html>
