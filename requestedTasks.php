<?php
include_once ("./includes/connection/db_connection.php");
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
            createRows("request")
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
                                <a href="adminOverview.php"><img src="img/atap-logo.png" class="img-nav img-responsive" id="imgLogo"></a>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="adminOverview.php">Auftragsverwaltung</a></li>
                                    <li><a href="managment.php">Verwaltung</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <h2>Title</h2>
                <hr>
                <div class="pageContent">
                    <table id="requestedTasksTable">
                        <thead>
                            <th>Firma</th>
                            <th>Wann zugesendet</th>
                            <th>Für wann</th>
                            <th>Anzahl Personen</th>
                        </thead>

                        <tfoot>
                            <th>Firma</th>
                            <th>Wann zugesendet</th>
                            <th>Für wann</th>
                            <th>Anzahl Personen</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>