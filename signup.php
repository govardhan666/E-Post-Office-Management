<?php
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = trim($_POST['dob']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    // Validate form fields
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($phone) || empty($dob) || empty($password) || empty($confirm)) {
        $error = 'All fields are required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match';
    } else {
        // Connect to database
       $dbhost = 'localhost';
        $dbname = 'project';
        $dbuser = 'root';
        $dbpass = '';
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        // Check connection
        if ($conn->connect_error) {
            $error = 'Connection failed: ' . $conn->connect_error;
        } else {
            // Insert user data into database
            $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, username, email, phone, dob, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $firstname, $lastname, $username, $email, $phone, $dob, $password);
            if ($stmt->execute()) {
                $success = 'You have successfully Created E-Post Office Account. Click on Sign in to access your account';
            } else {
                $error = 'Error: ' . $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
      body{
        background-size: cover;
      }
        form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            margin: auto;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
          
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 5px #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #00bcd4;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #0097a7;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
        h1{
            text-align:center;

        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;


  }
  
  header {
    background-color: #a812e8;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
  }
  
  header h1 {
    margin: 0;
  }

  
  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
  }
  
  nav li {
    margin-left: 20px;
  }
  
  nav a {
    color: #ffffff;
    text-decoration: none;
  }
  
  nav a:hover {
    text-decoration: underline;
  }


  </style>
</head>
<body>
	<header>
		<h1>E-Post Office Management</h1>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="signin.php">Sign In</a></li>
				<li><a href="contact.html">Contact Us</a></li>
			</ul>
		</nav>
	</header>
</head>
<body>
  <h1 >Create E-Post Office Account</h1>
  <?php if ($error): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <?php if ($success): ?>
    <p><?php echo $success; ?></p>
  <?php else: ?>
    <form method="post">
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" required>
      <br>
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" required>
      <br>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" required>
      <br>
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <label for="confirm">Confirm Password:</label>
      <input type="password" id="confirm" name="confirm" required>
      <br>
      <input type="submit" value="Create Account">
    </form>
  <?php endif; ?>
</body>
</html>
