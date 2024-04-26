<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;

		}

		header {
			background-color: #a812e8;
			color: #fff;
			padding: 10px;
			text-align: center;
		}

		h1 {
			margin: 0;
		}

		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin: 20px;
		}

		.card {
			background-color: #f8f9fa;
			border: 1px solid #ccc;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
			margin: 10px;
			padding: 20px;
			text-align: center;
			width: 300px;
		}

		.card:hover {
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
			transform: translateY(-5px);
		}

		.card h2 {
			margin-top: 0;
		}

		.btn {
			background-color: #007bff;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px;
			transition: background-color 0.3s ease;
			width: 100%;
		}

		.btn:hover {
			background-color: #0069d9;
		}

		 .logout {
			position: absolute;
			top: 10px;
			right: 10px;
		 }

		 .logout button {
			background-color: transparent;
			border: none;
			color: #ffffff;
			cursor: pointer;
			font-size: 16px;
			transition: color 0.3s ease;
		 }

		 .logout button:hover {
			color: #0069d9;
		 }

		.tips {
			background-color: #f8f9fa;
			border: 1px solid #ccc;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
			margin: 20px;
			padding: 20px;
		}

		.tips h2 {
			margin-top: 0;
		}

		.tips p {
			line-height: 1.5;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<header>
		<h1>Hello User, Enjoy our Postal Mailing Services</h1>
		<div class="logout">
			<a href="index.html">Sign out</a>
		</div>
	</header>
	<div class="container">
		<div class="card">
			<h2>Postal Services</h2>
			<p>We provide Delivery and Tracking Services with High Speed</p>
			<button class="btn" >Learn More</button>
		</div>
		<div class="card">
			<h2>Send Courier now</h2>
			<p>Use our Courier Sending Service now. Our Delivery boy will collect courier and send it to your destination</p>
			<a href="bookcourier.php"><button class="btn">Book Courier Facility</button></a>
		</div>
    </div>
<div class="tips">
	<h2>How to address an Envelope?</h2>
	<p>1. Address of the addressee shall be written on front side and sender’s address on back side on an envelope. Minimum 15mm blank space shall be kept from left, bottom and right side of envelope.</p>
	<p>2. Logo and name of the senders company can be written on top left corner and stamps or frank impression on top right corner having gap of minimum 10mm from address block of recipient.</p>
	<p>3. Address block of addressee shall have minimum gap of 40 mm from top.</p>
	<p>4. Stamps or Frank impressions shall be affixed in maximum area of 74 mm.</p>
	<p>5. 15mm shall be left for bar code printing at the bottom of envelope and there should be 5 mm quiet space around 2D barcode.</p>
	<p>6. A quiet zone of ​​minimum 10 mm on all sides of address block must be maintained if advertisement is printed on privately manufactured envelope or inland letter card. ​</p>
</div>
<script>
	const logoutButton = document.querySelector('.logout button');
	logoutButton.addEventListener('click', () => {
		window.location.href = '/logout.php';
	});
</script>
