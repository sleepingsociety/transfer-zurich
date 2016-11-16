<?php
/**
 * Created by PhpStorm.
 * User: dkalchofner
 * Date: 16.11.2016
 * Time: 08:52
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

session_start();
if(isset($_SESSION['user']) && $_SESSION['user']!=''){
    header("Location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="register.php" method="POST">
    <label>E-Mail <input name="user" /></label><br/>
    <label>Password <input name="pass" type="password"/></label><br/>
    <button name="submit">Register</button>
</form>
<?
if(isset($_POST['submit'])){
/*    $musername = "root";
    $mpassword = "backstreetboys";
    $hostname = "127.0.0.1";
    $db = "p";*/
    $port = 3306;
    $dbh=new PDO('mysql:dbname='.$dbname.';host='.$servername.";port=".$port,$dbusername, $dbpassword);/*Change The Credentials to connect to database.*/
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $password=$_POST['pass'];
        $sql=$dbh->prepare("SELECT COUNT(*) FROM `users` WHERE `username`=?");
        $sql->execute(array($_POST['user']));
        if($sql->fetchColumn()!=0){
            die("User Exists");
        }else{
            function rand_string($length) {
                $str="";
                $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $size = strlen($chars);
                for($i = 0;$i < $length;$i++) {
                    $str .= $chars[rand(0,$size-1)];
                }
                return $str; /* http://subinsb.com/php-generate-random-string */
            }
            $p_salt = rand_string(20); /* http://subinsb.com/php-generate-random-string */
            $site_salt="subinsblogsalt"; /*Common Salt used for password storing on site.*/
            $salted_hash = hash('sha256', $password.$site_salt.$p_salt);
            $sql=$dbh->prepare("INSERT INTO `users` (`id`, `username`, `password`, `psalt`) VALUES (NULL, ?, ?, ?);");
            $sql->execute(array($_POST['user'], $salted_hash, $p_salt));
            echo "Successfully Registered.";
        }
    }
}
?>
</body>
</html>