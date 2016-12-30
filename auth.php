<?php
$dbname = $_SERVER['DB_NAME'];
$servername = $_SERVER['DB_HOST'];
$dbusername = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = new mysqli($servername, $dbusername, $dbpassword);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(!isset($_SESSION)){
    session_start();
}
session_regenerate_id();

if (empty($_SESSION['login'])) {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
    exit;
} else {
    $login_status = '
			<div style="border: 1px solid black">
				Sie sind als <strong>' . htmlspecialchars($_SESSION['user']['username']) . '</strong> angemeldet.<br />
				<a href="/logout.php">Sitzung beenden</a>
			</div>
		';
}
?>