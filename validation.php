<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<h1> Filter input exampler</h1>
<p> 
Requires: <a href="<?= $_SERVER['PHP_SELF'] ?> ?name=Tue@email?tuje@cphbusiness.dk&age=40">name, email, age parameters</a>
</p>
<hr>
<?php
$a = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT) or die('Missing/illegal age parameter');
$e = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_INT) or die ('Missing/illegal email parameter');
$n = filter_input(INPUT_GET, 'name') or die ('Missing /illegal name parameter');


echo 'a='.$a.'<br>'.PHP_EOL;
echo 'e='.$e.'<br>'.PHP_EOL;
echo 'n='.$n.'<br>'.PHP_EOL;


//$sql = 'INSERT INTO persons (name, email, age) VALUES ('Marc', 'klu@cphbusiness.dk', 100);
$sql = 'INSERT INTO persons (name, email, age) VALUES (?, ?, ?)';

require_once 'dbcon.php';
$stml= $link->prepare($stml);
$stml->bind_param('ssi', $n, $e, $a);
$stml-> execute();

?>

</body>
</html>