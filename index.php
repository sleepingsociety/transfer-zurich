<?php

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
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer-Zurich</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">


    <!-- Optional theme -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
    crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
    <script src="javascript/loginPage.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>
<section>
    <span></span>
    <h1>Mitarbeiterlogin</h1>

    <section>
        <span></span>
        <h1>Login</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
            <input placeholder='Benutzername' type='text'>
            <input placeholder='Passwort' type='password'>
            <?php
            session_start();
            if(isset($_SESSION['user']) && $_SESSION['user']!=''){header("Location:userPage.php");}
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
                $site_salt="transzhsalt";/*Common Salt used for password storing on site. You can't change it. If you want to change it, change it when you register a user.*/
                $salted_hash = hash('sha256',$password.$site_salt.$p_salt);
                if($p==$salted_hash){
                    $_SESSION['user']=$id;
                    header("Location:userPage.php");
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

    <button onclick="changePage()">Login</button>
    <h2>
        <a href='#'>Passwort vergessen?</a>
    </h2>
</section>
<footer class="footer">
    <div class="container">
        <p class="text-muted">Erfahren Sie mehr über diese Firma und dieser Seite</p>
    </div>
</footer>
</body>

</html>
