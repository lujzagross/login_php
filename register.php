<!-- -->

<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: loginpage.php");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<a href="loginpage.php">Go back to main page</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

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
    <!-- creating register form -->        
	<form id="form" action="register.php" method="POST">
		
		<input type="text" placeholder="Here enter your email" name="email">
		<input type="password" placeholder="and here your password" name="password">
		<input type="password" placeholder="and now confirm password" name="confirm_password">
		<input class="submit" type="submit" onclick="validateEmail()">

	</form>

</body>
</html>