<?php
/**
 * Created by PhpStorm.
 * User: dkalchofner
 * Date: 16.11.2016
 * Time: 08:18
 */

$dbname    = $_SERVER['DB_NAME'];
$servername    = $_SERVER['DB_HOST'];
$dbusername    = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = new mysqli($servername, $dbusername, $dbpassword);

if ($connection -> connect_error) {
    die("Connection failed: " . $connection -> connect_error);
}
echo "Connected successfully";

?>
<html>
<head>
    <meta CHARSET="UTF-8">
    <title>Transfer-Zurich</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script src="javascript/loginPage.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
<?
session_start();
if($_SESSION['user']==''){
    header("Location:login.php");
}else{
    $dbh=new PDO('mysql:dbname=db;host=127.0.0.1', 'root', 'backstreetboys');
    $sql=$dbh->prepare("SELECT * FROM users WHERE id=?");
    $sql->execute(array($_SESSION['user']));
    while($r=$sql->fetch()){
        echo "<center><h2>Hello, ".$r['username']."</h2></center>";
    }
}
?>
</body>
</html>