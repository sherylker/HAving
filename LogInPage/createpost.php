<?php 
session_start();
require 'DBconfig/config.php';
 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title> Create a posting </title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">

</head>

<style>
.fsSubmitButton { 
  font-family: 'Asap', sans-serif;
  width:200px;
  padding: 10px;
  font-weight: bold;
  background-color: #F39C12;
  border-radius: 50px;
  font-size:20px;
}
body {
  font-family: 'Asap', sans-serif;
}
p{
  font-size: 14px;
}
input[type = "checkbox"] {
  font-size: 14px;
}

</style>

<body>
  <header>
  <center>  <h1> Create a Post </h1> </center>
</header>
  <form id = "createPost" action = "createpost.php" method="post">

  <h3> Type of item: </h3>
  <input type= "text" name = "type" size = "50" placeholder = "Canned food, mattress etc..."> </br>

<h3> Description: </h3>
<p> Indicate the brand, if it's halal (for food), condition, description... </p>
<input type = "text" name = "description" wrap = "soft" size = "80 100" placeholder = "Indicate the brand, if it's halal (for food), description..."> </br></br>
<h3> Quantity: </h3>
<input type = "number" name = "quantity" placeholder = "20"> </br>

<h3> Expiry date (if applicable): </h3>
<input type = "date" name = "expdate"> </br>

<h3> Collection point(s): </h3>
<input type = "text" name = "location" size = "50" placeholder = "Clementi NTUC Last counter"> </br>

<h3> Timing(s): </h3>
<input type = "text" name = "time" size = "30" placeholder = "7pm - 9pm; 1030pm -1130pm"> </br>

<p> For food products: </p>
<input type = "checkbox" name="guideline" font-size: "14px"> I agree to the <a href= "http://www.nea.gov.sg/docs/default-source/public-health/food-hygiene/Guidelines/guidelines-on-food-donation-.pdf"> NEA guideline of food donation</a>.</br>
</br>
</br>
<input type = "submit" name = "submit" value = "Post" class = fsSubmitButton>

</form>

<?php
	if (isset($_POST['submit'])) {

		$type=$_POST['type'];
		$description=$_POST['description'];
		$quantity=$_POST['quantity'];
		$expdate=$_POST['expdate'];
		$location=$_POST['location'];
		$time=$_POST['time'];

		$query= "insert into posttable values('$type', '$description', '$quantity', '$expdate', '$location', '$time')";
        $query_run = mysqli_query($con, $query);
	}

?>

</body>
</html>
