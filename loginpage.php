<!-- -->

<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="header">
		<a href="loginpage.php">Go back to main page</a>
	</div>

	<?php if( !empty($user) ): ?>

		<br />Welcome <?= $user['email']; ?>!
		<br /><br />You are successfully logged in! Your success is our goal!
		<br /><br />
        <p>Albert Einstein // "Be a loner. That gives you time to wonder..."</p>
		<a href="logout.php">Logout?</a>
        
	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php">Register</a>

	<?php endif; ?>
    

</body>
</html>