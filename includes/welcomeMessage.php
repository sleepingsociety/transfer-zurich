<?php
$dbname    = $_SERVER['DB_NAME'];
$servername    = $_SERVER['DB_HOST'];
$dbusername    = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = new mysqli($servername, $dbusername, $dbpassword);

if ($connection -> connect_error) {
    die("Connection failed: " . $connection -> connect_error);
}


if(!isset($_SESSION)){
    session_start();
}

if (!$_SESSION["login"]) header('Location: /index.php');

?>

<div id="welcomeMessage">
    <h3>Willkommen zurück <?php echo $_SESSION['username']; ?></h3>
    <p>Von hier aus können Sie auf die verschiedenen Bereiche<br>
        dieser Webseite zugreifen.</p>
    <p>"Platz für eine extra Nachricht oder so"</p>
</div>


