<?php
/**
 * Created by PhpStorm.
 * User: Dominik O'Kerwin
 * Date: 02.12.2016
 * Time: 08:18
 */

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

    <script>
        $(document).ready(function() {
            createRows("task");
            createRows("driver");
            createRows("car");
            createAllocationTable();
        });
    </script>

</head>

<body>
<div id="pageContainer">
    <div class="container-fluid">
        <div class="container">
            <div class="nav-top">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-heading">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <img src="img/atap-logo.png" class="img-nav img-responsive" id="imgLogo">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="adminOverview.php">Auftragsverwaltung</a></li>
                                <li><a href="Usermanagment.php">Benutzerverwaltung</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <h2>Title</h2>
            <div class="pageContent">
                <div id="welcomeMessage">
                    <h3>Willkommen zurück zu Atap-Transfers</h3>
                    <p>Von hier aus können Sie auf die verschiedenen Bereiche<br>
                        dieser Webseite zugreifen, welcher nur für den Admin zugänglich sind.<br>
                        Sie können auch als Admin wieder zurück in die Fahreransicht gehen.</p>
                    <button class="btn btn-default">Zur Fahreransicht</button>
                </div>
                <div id="adminNotes" class="container-fluid">
                    <div class="row">
                        <div id="newRequest" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse1"><span id="titleRTask">Unbestätigte Aufträge</span></a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <h4>Es gibt momentan 5 unbestätigte Aufträge</h4>
                                            <button onClick="changePage('requestedTasks')" class="btn btn-default">Zu den Aufträgen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="toAllocate" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse2"><span id="titleATask">Auftragsverteilung</span></a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <h4>Aufträge austeilen</h4>
                                            <p>
                                                Für den heutigen Tag sind noch nicht alle Aufträge <br>
                                                verteilt. Momentan müssen noch 13 Aufträge<br>
                                                verteilt werden. Bitte verteilen Sie diese Aufträge<br>
                                                so schnell wie möglich.
                                            </p>
                                            <button class="btn btn-default" onClick="changePage('allocation')">Zu Auftragsverteilung</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--

                        Ersetzten durch das was im Heft ist.
                        Liste von Angenommen Aufträgen
                        abgelehnten Aufträgen/Grund
                        Veränderungen
                        Cancelation(Grund)
                        Zuteilung(History)
                        Ausgeführten
                        Nicht ausgeführten

                        Filter möglichkeit suchen was auch immer

                        -->


                        <div id="Abgelehnte Aufträge" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    </h4>
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse3"><span id="titleRTask">Unbestätigte Aufträge</span></a>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <h4>Bitte überprüfen Sie die Absagen</h4>
                                            <p>
                                                Es gibt momentan 5 Absagen. Schauen Sie sich<br>
                                                ihre Begründung an und bei Problemen können Sie<br>
                                                den Fahrer kontaktieren. Die abgelehnten Aufträge<br>
                                                werden wieder in der Auftragsverteilung gesendet.
                                            </p>
                                            <button class="btn btn-default">Zu den abgelehnten Aufträgen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>