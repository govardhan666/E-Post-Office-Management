<!DOCTYPE html>
<html>
<head>
  <title>Sign In</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align:center;
    }
    label {
      display: block;
      margin-bottom: 5px;
      text-align:center;
    }
    input[type="text"], input[type="password"] {
      margin-bottom: 10px;
      padding: 5px;
      font-size: 1em;
      border-radius: 5px;
      border: none;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
  <!DOCTYPE html>
<html>
<head>
  <title>Sign In</title>
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
				<li><a href="signup.php">Sign Up</a></li>
				<li><a href="contact.html">Contact Us</a></li>
			</ul>
		</nav>
	</header>
</head>
</head>
<body>
  <h1>Sign In to your E-Postal Account</h1>
  <?php
// start the session
session_start();

if (isset($_SESSION['username'])) {
  header('Location: dashboard.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // connect to the database
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "project";

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM users WHERE username = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);

  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

 
    if ($password == $row['password']) {

      header('Location: dashboard.php');
      exit();
    } else {
      $error_message = "Incorrect Password.";
    }
  } else {
    $error_message = "Username not found.";
  }

  $stmt->close();
  $conn->close();
}
?>

<head>
  <title>Sign In to your E-Postal Account</title>
</head>
  <?php
  if (isset($error_message)) {
    echo "<p style='color: red;'>{$error_message}</p>";
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Sign In</button>
  </form>
</body>
</html>


