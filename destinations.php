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

if (!$_SESSION["login"]) header('Location: /index.php');

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
    <script>
        $(document).ready(function () {
            createUsers();
        });
    </script>


    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="stylesheet/taskView.css">


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
                            <a href="adminOverview.php"><img src="img/atap-logo.png" class="img-nav img-responsive"
                                                             id="imgLogo"></a>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="adminOverview.php">Auftragsverwaltung</a></li>
                                <li class="active"><a href="managment.php">Verwaltung</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="pageContent row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <?php


                    // use exec() because no results are returned

                    if (isset($_POST["add"])) {


                        if (!get_magic_quotes_gpc()) {

                            $destination = addslashes($_POST["destination"]);
                            $region = addslashes($_POST['region']);
                            $typ = addslashes($_POST['typ']);
                            $route_from_zrh = addslashes($_POST['route_from_zrh']);
                            $route_from_bsl = addslashes($_POST['route_from_bsl']);
                            $route_from_alt = addslashes($_POST['route_from_alt']);
                            $suntransfers = addslashes($_POST['suntransfers']);
                            $foxtravels = addslashes($_POST['foxtravels']);
                        } else {
                            $destination = $_POST["destination"];

                            $region = $_POST['region'];
                            $typ = $_POST['typ'];
                            $route_from_zrh = $_POST['route_from_zrh'];
                            $route_from_bsl = $_POST['route_from_bsl'];
                            $route_from_alt = $_POST['route_from_alt'];
                            $suntransfers = $_POST['suntransfers'];
                            $foxtravels = $_POST['foxtravels'];
                        }

                        $distance_from_zrh = $_POST['distance_from_zrh'];
                        $distance_from_bsl = $_POST['distance_from_bsl'];
                        $distance_from_alt = $_POST['distance_from_alt'];
                        $time_zrh = $_POST['time_zrh'];
                        $time_bsl = $_POST['time_bsl'];
                        $time_alt = $_POST['time_alt'];
                        $traffic_jam_surcharge = $_POST['traffic_jam_surcharge'];
                        $search_on_site = $_POST['search_on_site'];
                        $breaks = $_POST['breaks'];
                        $country = $_POST['country'];


                        $maut_auswahl = 1;
                        $region = 1;


                        $sql = "INSERT INTO destinations (destination, , country_fs, region_fs, dist_from_zrh, dist_from_bsl, dist_from_alt, route_from_zrh,
                        route_from_bsl, route_from_alt,  time_zrh, time_bsl, time_alt, breaks,  traffic_jam_surcharge, search_at_place, type, maut_fs, 
                        suntransfers, foxtravels) VALUES ('$destination', '$country', '$region', , '$distance_from_zrh',
                        '$distance_from_bsl', '$distance_from_alt', '$route_from_zrh', '$route_from_bsl', '$route_from_alt', '$time_zrh', '$time_bsl', '$time_alt',
                          '$breaks','$traffic_jam_surcharge','$search_on_site', '$typ', '$maut_auswahl','$suntransfers', '$foxtravels')";

                        mysqli_select_db($dbname, $connection);

                        $retval = mysqli_query($connection, $sql);

                        if (!$retval) {
                            die('could not enter date: ' . mysqli_error($connection));
                        }

                        echo "Entered data successfully\n";

                        if (mysqli_query($connection, $sql)) {
                            echo "New record created successfully";

                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                        }


                    } else {
                        ?>


                        <h1>Add new Destination</h1>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination">Destination</label><br>
                                    <input type="text" class="form-control" name="destination">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="country">Land</label><br>
                                    <select class="form-control" name="country">
                                        <option value="1">Schweiz</option>
                                        <option value="2">Deutschland</option>
                                        <option value="3">Österreich</option>
                                        <option value="4">Frankreich</option>
                                        <option value="5">Italien</option>
                                        <option value="6">Lichtenstein</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="region">Region</label><br>
                                    <input type="text" class="form-control" name="region" placeholder="Graubünden">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="typ">Typ</label><br>
                                <input type="text" class="form-control" name="typ" placeholder="?">
                            </div>
                            <div class="form-group">
                                <label for="maut_auswahl">Benötigtes Maut. (drop down Menu)</label><br>
                                <input type="text" class="form-control" name="maut_auswahl">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="distance_from_zrh">Distanz von Zürich Flugafen</label><br>
                                    <input type="text" class="form-control" name="distance_from_zrh" placeholder="40">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="distance_from_bsl">Distanz von Basel </label><br>
                                    <input type="text" class="form-control" name="distance_from_bsl" placeholder="30">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="distance_from_alt">Distanz von Altenrieden</label><br>
                                    <input type="text" class="form-control" name="distance_from_alt" placeholder="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="route_from_zrh">Route von Zürich</label><br>
                                    <input type="file" class="form-control" name="route_from_zrh" placeholder="Bild">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="route_from_bsl">Route von Basel</label><br>
                                    <input type="file" class="form-control" name="route_from_bsl" placeholder="Bild">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="route_from_alt">Route von Altenrieden</label><br>
                                    <input type="file" class="form-control" name="route_from_alt" placeholder="Bild">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="time_zrh">Zeit von Zürich</label><br>
                                    <input type="text" class="form-control" name="time_zrh" placeholder="01:00">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="time_bsl">Zeit von Basel</label><br>
                                    <input type="text" class="form-control" name="time_bsl" placeholder="00:40">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="time_alt">Zeit von Altenrieden</label><br>
                                    <input type="text" class="form-control" name="time_alt" placeholder="01:10">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="traffic_jam_surcharge">Stau Zuschlag</label><br>
                                    <input type="text" class="form-control" name="traffic_jam_surcharge"
                                           placeholder="5.- / h">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="search_on_site">Suche vor Ort</label><br>
                                    <input type="text" class="form-control" name="search_on_site" placeholder="?">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="breaks">Pausen</label><br>
                                    <input type="text" class="form-control" name="breaks" placeholder="Zeit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="served_by">Served by</label><br>
                                <input type="checkbox" name="suntransfers" value="TRUE">Suntransfers<br>
                                <input type="checkbox" name="foxtravels" value="TRUE">Foxtravels<br>
                            </div>
                            <input name="add" type="submit" id="add"
                                   value="Add Destination">

                        </form>
                        <?php

                    }
                    ?>


                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1>Edit Destinations</h1>

                    <div id="saveEditsButton">
                        <form action="register.php">
                            <button class="btn btn-default" type="submit" value="saveEdits">Änderungen Speichern
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>