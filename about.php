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
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer-Zurich</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Font Family Roboto, Weight 100 & 400 -->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">


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
        <a href="./index.php">Login</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </div>

</div>
<div id="navIcon">
    <i class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" onclick="openNav()"></i>

</div>


<div id="pageContainerL">
    <div class="container">
        <div id="about">
            <h2>Willkommen auf der ATAP Transfer Seite</h2>
            <hr>
            <div class="row text-left">
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <h3>Über uns</h3>
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