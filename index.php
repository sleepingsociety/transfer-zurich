<?php
$dbname = $_SERVER['DB_NAME'];
$servername = $_SERVER['DB_HOST'];
$dbusername = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];
$connection = new mysqli($servername, $dbusername, $dbpassword);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
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
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">



    <script>
        var desktop;
        var isSliding = false;

        $(document).ready(function() {
            $(window).resize(function() {
                footerStyle();
            });
            footerStyle();

            var lastScrollTop = 0;
            $(window).on('wheel', function(event){
                if(isSliding) {
                    return;
                }
                isSliding = true;
                smoothScroll();

            });
            $('#footer').on("click", smoothScroll);
            var randNum = Math.floor((Math.random() * 7) + 1);
            $(window).resize(function() {
                if ($(this).width() < 768) {
                    if(desktop == true || desktop == null) {
                        desktop = false;
                        document.body.style.backgroundImage = "url('img/background.png')";
                    }
                } else {
                    // default setting for desktop here...
                    if(desktop == false || desktop == null) {
                        desktop = true;
                        document.body.style.backgroundImage = "url('img/Background_Login_0" + randNum + ".jpg')";
                    }
                }
            });
            if ($(window).width() < 768) {
                if(desktop == true || desktop == null) {
                    desktop = false;
                    document.body.style.backgroundImage = "url('img/background.png')";
                }
            } else {
                // default setting for desktop here...
                if(desktop == false || desktop == null) {
                    desktop = true;
                    document.body.style.backgroundImage = "url('img/Background_Login_0" + randNum + ".jpg')";
                }
            }

        });

        function footerStyle() {
            var wH = $(window).height();
            var wW = $(window).width();

            $('#pageContainer').css({height: wH, width: "100%", background: '#dfdfdf', overflow: "hidden"});



            $('#secondPage').css({height: wH, width: "100%", background: '#fafafa'});
            $('.navbar-nav').css({width: "100%", margin: "0px"});
            wH = wH - 56;
            $('#footer').css({top: wH, height: "56px", width: "100%", background: "#3498db", color:"#dddddd", position: "absolute", overflow:"hidden"})
        }

        var keys = [37, 38, 39, 40];

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function keydown(e) {
            for (var i = keys.length; i--;) {
                if (e.keyCode === keys[i]) {
                    preventDefault(e);
                    return;
                }
            }
        }

        function wheel(e) {
            preventDefault(e);
        }

        function disable_scroll() {
            if (window.addEventListener) {
                window.addEventListener('DOMMouseScroll', wheel, false);
            }
            window.onmousewheel = document.onmousewheel = wheel;
            document.onkeydown = keydown;
        }

        function enable_scroll() {
            if (window.removeEventListener) {
                window.removeEventListener('DOMMouseScroll', wheel, false);
            }
            window.onmousewheel = document.onmousewheel = document.onkeydown = null;
        }

        function smoothScroll() {
            var value = document.getElementById("footerText").innerHTML;
            var div = "";
            if(value == "About us") {
                value = "Login";
                div = "#footer";
            } else {
                value = "About us";
                div = "#pageContainer";
            }
            document.getElementById("footerText").innerHTML = value;

            $('html, body').animate({
                scrollTop: $(div).offset().top
            }, 2000, function() {
                isSliding = false;
            });
        }
    </script>
</head>
<body>
<div id="pageContainer">
    <section>
        <span></span>
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
                                session_start();
                                /*   $_SESSION = array(
                                       'login' => true,
                                       'user' => array(
                                           'username' => $row['username']
                                       )
                                   );*/
                                $_SESSION['login'] = true;
                                $_SESSION['username'] = $row['username'];
                                $message['success'] = 'Anmeldung erfolgreich, <a href="adminOverview.php">weiter zum Inhalt.';
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
                $message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.<br />' .
                    'Wenn Sie noch kein Konto haben, gehen Sie <a href="/register.php">zur Registrierung</a>.';
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

    <footer id="footer">
        <div class="container text-center">
            <nav class="nav navbar-nav">
                <h3 id="footerText">About us</h3>
            </nav>
        </div>
    </footer>
</div>
<div id="secondPage">
    <div class="container">
        <div id="about">
            <h3>Willkommen auf der ATAP Transfer Seite</h3>
            <hr>
            <div class="row">

                <div class="col-sm-12 col-md-7 col-lg-7">
                    <h4>Über uns</h4>
                    <p>
                        Der ATAP Transfers ist Mitglied von der ATAP Gruppe Switzerland.
                        Wir haben uns auf persönlichen Service und Transportdienstleistungen
                        für Privat- und Business-Kunden spezialisiert.
                        <br>
                        Mit unseren komfortablen und eleganten Limousinen bringen wir
                        Geschäftsleute, Touristen und alle weiteren interessierten Kunden ab Flughafen
                        Zürich an jede beliebige Destination im Umkreis von 500km.
                        Andere Abfahrtsorte sind nach Vereinbarung möglich.
                        <br>
                        Wir legen Wert auf zuvorkommende Behandlung der Kunden.
                        Deshalb gehen wir gerne auf individuelle Wünsche ein.
                        Unser Service ist persönlich, schnell, diskret und komfortabel.
                        <br>
                        Wir garantieren Ihnen ein optimales Preis-Leistungsverhältnis.
                    </p>
                    <h4>Über diese Seite</h4>
                    <p>
                        Dies ist die interne Seite von diesem Unternehmen, welches von den
                        Schülern Lukas Auriquio, David Kalchofner & Dominik O’Kerwin erstellt wurde.
                        Diese haben den Auftrag von Johann Widmer, einer ihrer Lehrpersonen von der
                        technischen Berufsschule Zürich, erhalten, welcher einer der Geschäftsleiter ist.
                        Auf dieser Seite werden die verschiedenen Arbeitsabläufe halbautomatisiert, wodurch
                        sich der Zeitaufwand und Fehler reduziert haben.
                    </p>
                    <h4>Technische Details</h4>
                    <p>
                        Die Entwickler dieser Seite haben verschiedene Technologien verwendet,
                        unteranderem: HTML, SASS, PHP, JavaScript / JQuery und MySQL.
                    </p>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <h4>Kontaktieren Sie uns</h4>
                    <address>
                        Wallisellerstrasse 114<br>
                        8152 Opfikon<br>
                        Schweiz<br>
                    </address>
                    <h4>Webseite:</h4>
                    <p>www.atap-transfers.com</p>
                    <h4>Telephone</h4>
                    <p>+41 (0)44 368 44 55</p>
                    <h4>Fax</h4>
                    <p>+41 (0)44 368 44 11</p>
                    <h4>E-Mail</h4>
                    <p>info@atap-transfers.com</p>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
index.php
Open with Code Your Cloud
Displaying index.php.