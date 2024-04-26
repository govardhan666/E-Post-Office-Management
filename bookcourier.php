<!DOCTYPE html>
<html>
<head>
	<title>Book Courier Facility</title>
<style>
    .container {
	max-width: 600px;
	margin: 0 auto;
	padding: 20px;
	background-color: #f7f7f7;
	border-radius: 5px;
	box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

h1 {
	text-align: center;
	margin-bottom: 20px;
}

form {
	display: flex;
	flex-direction: column;
}

label {
	margin-top: 10px;
}

input[type="text"],
input[type="email"],
select,
textarea {
    padding: 10px;
	border: 1px solid #ccc;
	border-radius: 3px;
	font-size: 16px;
}

input[type="number"] {
	width: 50px;
}

select {
	width: 100%;
}

textarea {
	resize: vertical;
}

input[type="submit"] {
	margin-top: 20px;
	background-color: #4CAF50;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 3px;
	font-size: 16px;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #3e8e41;
}

a {
	color: #0066cc;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
	<div class="container">
		<h1>Book Courier Facility</h1>
		<form action="bookcourier.php" method="POST">
			<label for="Sname">Sender Name:</label>
			<input type="text" id="Sname" name="Sname" required>
			<label for="Rname">Reciever Name:</label>
			<input type="text" id="Rname" name="Rname" required>
			<label for="gender">Gender:</label>
			<select id="gender" name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
				<option value="other">Other</option>
			</select>
			<label for="age">Age:</label>
			<input type="number" id="age" name="age" min="1" max="120" required>
			<label for="courier">Type of Courier Facility:</label>
			<select id="courier" name="courier" required>
				<option value="">Select Speed</option>
                <option value="speedPost">Speed Post</option>
				<option value="normalPost">Normal Post</option>
				<option value="ultraSpeedPost">Ultra Speed Post</option>
			</select>
			<label for="Saddress">Sender's Address</label>
			<textarea id="Saddress" name="Saddress" rows="5" required></textarea>
			<label for="deliveryGuy">Select Courier Delivery guy</label>
			<select id="deliveryGuy" name="deliveryGuy" required>
				<option value="">Select Delivery Guy</option>
				<option value="Ramesh">Ramesh</option>
				<option value="Krishna">Krishna</option>
				<option value="Padmavathi">Padmavathi</option>
				<option value="Sailaja">Sailaja</option>
			</select>
			<label for="date">Date of Picking: </label>
			<input type="date" id="date" name="date" required>
			<label for="time">Time of Picking:</label>
			<input type="time" id="time" name="time" required>
			<label for="Raddress">Reciever's Address:</label>
			<textarea id="Raddress" name="Raddress" rows="5"></textarea>
			<input type="submit" value="Book Courier Facility">
		</form>
		<p>Already have a booking? <a href="index.html">Sign Out</a></p>
	</div>
    <?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'bookappointment';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
	die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Get form data
	$Sname = mysqli_real_escape_string($conn, $_POST['Sname']);
	$Rname = mysqli_real_escape_string($conn, $_POST['Rname']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$courier = mysqli_real_escape_string($conn, $_POST['courier']);
	$Saddress = mysqli_real_escape_string($conn, $_POST['Saddress']);
	$deliveryGuy = mysqli_real_escape_string($conn, $_POST['deliveryGuy']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	$Raddress = mysqli_real_escape_string($conn, $_POST['Raddress']);

	if (empty($Sname) || empty($Rname) || empty($gender) || empty($age) || empty($courier) || empty($Saddress) || empty($deliveryGuy) || empty($date) || empty($time) || empty($Raddress)) {
		echo '<p>Please fill in all required fields.</p>';
	} else {

		$sql = "INSERT INTO appointments (Sname, Rname, gender, age, courier, Saddress, deliveryGuy, date, time, Raddress) VALUES ('$Sname', '$Rname', '$gender', '$age', '$courier', '$Saddress', '$deliveryGuy', '$date', '$time', '$Raddress')";

		if (mysqli_query($conn, $sql)) {
			echo '<p>                        Your Courier Picking Facility was successfully booked. Our Delivery guy will reach you to pick courier on time.</p>';
		} else {
			echo 'Error: ' . mysqli_error($conn);
		}
	}

	mysqli_close($conn);
}
?>

</body>
</html>
