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

$message = array();
if (!empty($_POST)) {
    if (
        empty($_POST['f']['username']) ||
        empty($_POST['f']['password']) ||
        empty($_POST['f']['password_again'])
    ) {
        $message['error'] = 'Es wurden nicht alle Felder ausgefüllt.';
    } else if ($_POST['f']['password'] != $_POST['f']['password_again']) {
        $message['error'] = 'Die eingegebenen Passwörter stimmen nicht überein.';
    } else {
        unset($_POST['f']['password_again']);
        $salt = '';
        for ($i = 0; $i < 22; $i++) {
            $salt .= substr('./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', mt_rand(0, 63), 1);
        }
        $_POST['f']['password'] = crypt(
            $_POST['f']['password'],
            '$2a$10$' . $salt
        );

        $connection = @new mysqli($servername, $dbusername , $dbpassword, $dbname );
        if ($connection->connect_error) {
            $message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $connection->connect_error;
        }
        $query = sprintf(
            "INSERT INTO users (username, password)
				SELECT * FROM (SELECT '%s', '%s') as new_user
				WHERE NOT EXISTS (
					SELECT username FROM users WHERE username = '%s'
				) LIMIT 1;",
            $connection->real_escape_string($_POST['f']['username']),
            $connection->real_escape_string($_POST['f']['password']),
            $connection->real_escape_string($_POST['f']['username'])
        );
        $connection->query($query);
        if ($connection->affected_rows == 1) {
            $message['success'] = 'Neuer Benutzer (' . htmlspecialchars($_POST['f']['username']) . ') wurde angelegt, <a href="index.php">weiter zur Anmeldung</a>.';
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
        } else {
            $message['error'] = 'Der Benutzername ist bereits vergeben.';
        }
        $connection->close();
    }
} else {
    $message['notice'] = 'Übermitteln Sie das ausgefüllte Formular um ein neues Benutzerkonto zu erstellen.';
}
?><!DOCTYPE html>
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
    <script>
        $(document).ready(function() {
            createUsers();
        });
    </script>

    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="stylesheet/taskView.css">


</head>
<body>
<form action="/register.php" method="post">
    <?php if (isset($message['error'])): ?>
        <fieldset class="error"><legend>Fehler</legend><?php echo $message['error'] ?></fieldset>
    <?php endif;
    if (isset($message['success'])): ?>
        <fieldset class="success"><legend>Erfolg</legend><?php echo $message['success'] ?></fieldset>
    <?php endif;
    if (isset($message['notice'])): ?>
        <fieldset class="notice"><legend>Hinweis</legend><?php echo $message['notice'] ?></fieldset>
    <?php endif; ?>
    <fieldset>
        <legend>Benutzerdaten</legend>
        <div><label for="username">Benutzername</label> <input type="text" name="f[username]" id="username"<?php echo isset($_POST['f']['username']) ? ' value="' . htmlspecialchars($_POST['f']['username']) . '"' : '' ?> /></div>
        <div><label for="password">Kennwort</label> <input type="password" name="f[password]" id="password" /></div>
        <div><label for="password_again">Kennwort wiederholen</label> <input type="password" name="f[password_again]" id="password_again" /></div>
    </fieldset>
    <fieldset>
        <div><input type="submit" name="submit" value="Registrieren" /></div>
    </fieldset>
</form>
</body>
</html>
