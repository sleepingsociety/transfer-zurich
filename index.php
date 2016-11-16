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
    <script src="javascript/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascript/loginPage.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>

<div id="site-canvas">
    <div class="header-info">
        <p>Erfahre mehr über die Website</p>
        <button class="about-button">Click here</button>
    </div>

    <section>
        <span></span>
        <h1>Login</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
            <input placeholder='Benutzername' type='text'>
            <input placeholder='Passwort' type='password'>
            <?php
            session_start();
            if(isset($_SESSION['user']) && $_SESSION['user']!=''){header("Location:home.php");}
            $dbh=new PDO($servername, $dbusername, $dbpassword);/*Change The Credentials to connect to database.*/
            $email=$_POST['mail'];
            $password=$_POST['pass'];
            if(isset($_POST) && $email!='' && $password!=''){
                $sql=$dbh->prepare("SELECT id,password,psalt FROM users WHERE username=?");
                $sql->execute(array($email));
                while($r=$sql->fetch()){
                    $p=$r['password'];
                    $p_salt=$r['psalt'];
                    $id=$r['id'];
                }
                $site_salt="subinsblogsalt";/*Common Salt used for password storing on site. You can't change it. If you want to change it, change it when you register a user.*/
                $salted_hash = hash('sha256',$password.$site_salt.$p_salt);
                if($p==$salted_hash){
                    $_SESSION['user']=$id;
                    header("Location:home.php");
                }else{
                    echo "<h2>Username/Password is Incorrect.</h2>";
                }
            }
            ?>
        </form>
        <button class="login-button">Login</button>
        <h2>
            <a href='#'>Passwort vergessen?</a>
        </h2>
    </section>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Site Created by D.Kalchofner, L.Auriquio & D.O'Kerwin</p>
    </div>
</footer>
</body>
</html>
