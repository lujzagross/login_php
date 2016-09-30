<!-- -->

<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: loginpage.php");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['id'];
		header("Location: loginpage.php");

	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<a href="loginpage.php">Go back to main page</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Login</h1>
	<span>or <a href="register.php">register here</a></span>

	<!-- JavaScript email validation -->
	<script>
                function validateEmail() {
                    var emailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; // regular expression defining "legal" email-characters and their order
                    if(document.getElementById("email").value.match(emailformat)) // check the content of the element "email" and match this with the variable "emailformat" 
                    {
                        return true;
                    }
                    // ...otherwise give feedback via alert box:
                    else {
                        alert("Please try again my friend");
                        return false;
                    }
                }
            </script>
            
     <!-- creating log in form --> 
	<form id="form" action="login.php" method="POST">
		
		<input type="text" placeholder="Here enter your email" name="email">
		<input type="password" placeholder="and here your password" name="password">

		<input class="submit" type="submit" onclick="validateEmail()">
      
	 
	</form>

</body>
</html>