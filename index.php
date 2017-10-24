<?php
$dbname = $_SERVER['DB_NAME'];
$servername = $_SERVER['DB_HOST'];
$dbusername = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = @new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE HTML>
<html xml:lang="de" lang="de">
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
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">

</head>
<body>

<div id="myNav" class="overlay">

    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <!-- Overlay content -->
    <div class="overlay-content">
        <a href="./about.php">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </div>

</div>
<div id="navIcon">
    <i class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" onclick="openNav()"></i>

</div>
<div id="pageContainer">
    <section>
        <?php
        if (isset($_SESSION['login'])) {
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/adminOverview.php');
        } else {
            if (!empty($_POST)) {
                if (
                    empty($_POST['f']['username']) ||
                    empty($_POST['f']['password'])
                ) {
                    $message['error'] = 'Es wurden nicht alle Felder ausgefüllt.';
                } else {
                    $connection = @new mysqli($servername, $dbusername, $dbpassword, $dbname);
                    if ($connection->connect_error) {
                        $message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $connection->connect_error;
                    } else {
                        $query = sprintf(
                            "SELECT username, password FROM users WHERE username = '%s'",
                            $connection->real_escape_string($_POST['f']['username'])
                        );
                        $result = $connection->query($query);
                        if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            if (crypt($_POST['f']['password'], $row['password']) == $row['password']) {
                                  $_SESSION = array(
                                       'login' => true,
                                       'user' => array(
                                           'username' => $row['username']
                                       )
                                   );
                                $_SESSION['login'] = true;
                                $_SESSION['username'] = $row['username'];
                                $message['success'] = 'Anmeldung erfolgreich,weiter zum Inhalt.';
                                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/adminOverview.php');
                            } else {
                                $message['error'] = 'Das Kennwort ist nicht korrekt.';
                            }
                        } else {
                            $message['error'] = 'Der Benutzer wurde nicht gefunden.';
                        }
                        $connection->close();
                    }
                }
            } else {
                $message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.';

            }
        }
        ?>

        <form action="/index.php" method="post">
            <?php if (isset($message['error'])): ?>
                <fieldset class="error">
                    <legend>Fehler</legend><?php echo $message['error'] ?></fieldset>
            <?php endif;
            if (isset($message['success'])): ?>
                <fieldset class="success">
                    <legend>Erfolg</legend><?php echo $message['success'] ?></fieldset>
            <?php endif;
            if (isset($message['notice'])): ?>
                <!-- <fieldset class="notice">
                <legend>Hinweis</legend><?php /*echo $message['notice'] */?></fieldset>-->
            <?php endif; ?>
            <fieldset>
                <legend>Mitarbeiterlogin</legend>
                <div><label for="username">Benutzername</label>
                    <input type="text" name="f[username]" id="username"<?php
                    echo isset($_POST['f']['username']) ? ' value="' . htmlspecialchars($_POST['f']['username']) . '"' : '' ?> />
                </div>
                <div><label for="password">Kennnwort</label> <input type="password" name="f[password]" id="password"/></div>
            </fieldset>
            <fieldset>
                <button type="submit" name="submit" value="Anmelden">Anmelden</button>
            </fieldset>
        </form>
        <div>
            <button onclick="forgotPassword()">Passwort vergessen</button>
            <div id="forgot-pw-div" class="classy">
                <label for="Email">Email</label>
                <input type="email" name="email" id="Email"/>
                <button type="submit" name="submit-button" value="submit">Neues Password anfordern</button>
            </div>
        </div>
    </section>
</div>
</body>
</html>