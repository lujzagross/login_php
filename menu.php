<head>
	<link rel="stylesheet" type="text/css" href="menu.css">
</head>


<?php $curpage = basename($_SERVER['PHP_SELF']); ?>
<nav>
    <ul>
        <li><a href="loginpage.php" <?php if($curpage == 'loginpage.php') {echo 'class="active"'; } ?>>Home</a></li>
        <li><a href="login.php" <?php if($curpage == 'login.php') {echo 'class="active"'; } ?>>Login</a></li>
        <li><a href="register.php" <?php if($curpage == 'register.php') {echo 'class="active"'; } ?>>Register</a></li>
    </ul>
</nav>