<?php
include_once("./includes/connection/db_connection.php");
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


    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="stylesheet/taskView.css">


</head>

<body>
<div id="pageContainer">
    <?php



    $mode = 2;
    if ($mode == 1) {
        echo '<div id="policyCol" class="container-fluid">
                        <div class="row">
                            <div id="driverPolicy" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div>
                                    <h3>Fahrer</h3>
                                    <hr>
                                    <h4>Berechtigungen</h4>
                                    <ul>
                                        <li>Zugeteilte Aufträge anschauen</li>
                                        <li>Auftragsvollendung melden</li>
                                        <li>Passwort/ Email/ Benutzerbild ändern</li>
                                    </ul>
                                    <h4>Momentane Mitglieder</h4>
                                    <ul>
                                        <li>...</li>
                                        <li>...</li>
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>

                            <div id="dispoPolicy" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div>
                                    <h3>Disponent</h3>
                                    <hr>
                                    <h4>Berechtigungen</h4>
                                    <ul>
                                        <li>Kann Aufträge annehmen oder ablehnen</li>
                                        <li>Kann Aufträge verteilen</li>
                                        <li>Berechtigung von Fahrer</li>
                                    </ul>
                                    <h4>Momentane Mitglieder</h4>
                                    <ul>
                                        <li>...</li>
                                        <li>...</li>
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>

                            <div id="technicalLeaderPolicy" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div>
                                    <h3>Technische Leiter</h3>
                                    <hr>
                                    <h4>Berechtigungen</h4>
                                    <ul>
                                        <li>Benutzer hinzufügen/ verändern/ deaktivieren</li>
                                        <li>Fahrzeuge hinzufügen/verändern/ löschen </li>
                                        <li>Berechtigung von Fahrer & Disponent</li>
                                    </ul>
                                    <h4>Momentane Mitglieder</h4>
                                    <ul>
                                        <li>...</li>
                                        <li>...</li>
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>

                            <div id="adminPolicy" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div>
                                    <h3>Admin</h3>
                                    <hr>
                                    <h4>Berechtigungen</h4>
                                    <ul>
                                        <li>Hat auf alles vollen Zugriff</li>
                                    </ul>
                                    <h4>Momentane Mitglieder</h4>
                                    <ul>
                                        <li>...</li>
                                        <li>...</li>
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
    } else {
        include_once 'includes/accessDeniedMessage.php';
    }
    ?>
</div>
</body>
</html>