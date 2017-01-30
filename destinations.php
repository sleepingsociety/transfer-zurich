<?php
$dbname = $_SERVER['DB_NAME'];
$servername = $_SERVER['DB_HOST'];
$dbusername = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = @new mysqli($servername, $dbusername , $dbpassword, $dbname );

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

                    if (isset($_POST['add'])) {

                        if(! get_magic_quotes_gpc() ) {
                            $destination = addslashes ($_POST['destination']);
                            $spec_mount = addslashes ($_POST['spec_mount']);
                            $country = addslashes ($_POST['country']);
                            $region = addslashes ($_POST['region']);
                            $typ = addslashes ($_POST['typ']);
                            $route_from_zrh = addslashes ($_POST['route_from_zrh']);
                            $route_from_bsl = addslashes ($_POST['route_from_bsl']);
                            $route_from_alt = addslashes ($_POST['route_from_alt']);
                            $served_by = addslashes ($_POST['served_by']);
                            $mount_web = addslashes ($_POST['mount_web']);
                            $mount_preis = addslashes ($_POST['mount_preis']);
                            $mount_info = addslashes ($_POST['mount_info']);
                        }else {
                            $destination = $_POST['destination'];
                            $spec_mount = $_POST['spec_mount'];
                            $country = $_POST['country'];
                            $region = $_POST['region'];
                            $typ = $_POST['typ'];
                            $route_from_zrh = $_POST['route_from_zrh'];
                            $route_from_bsl = $_POST['route_from_bsl'];
                            $route_from_alt = $_POST['route_from_alt'];
                            $served_by = $_POST['served_by'];
                            $mount_web = $_POST['mount_web'];
                            $mount_preis = $_POST['mount_preis'];
                            $mount_info = $_POST['mount_info'];
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
                        $regular1_4 = $_POST['regular1_4'];
                        $regular5_8 = $_POST['regular5_8'];
                        $regular9_14 = $_POST['regular9_14'];
                        $regular15_16 = $_POST['regular15_16'];
                        $vip1_3 = $_POST['vip1_3'];
                        $vip4_7 = $_POST['vip4_7'];


                        $sql = "INSERT INTO destinations (destination, spec_mount, country, region, typ, distance_from_zrh, distance_from_bsl, distance_from_alt, route_from_zrh,
                        route_from_bsl, route_from_alt,  time_zrh, time_bsl, time_alt, served_by, mount_web, mount_preis, mount_info, traffic_jam_surcharge, search_on_site, 
                        breaks, regular1_4, regular5_8, regular9_14, regular15_16, vip1_3, vip4_7) VALUES ('$destination', '$spec_mount', '$country', '$region', '$typ', '$distance_from_zrh',
                        '$distance_from_bsl', '$distance_from_alt', '$route_from_zrh', '$route_from_bsl', '$route_from_alt', '$time_zrh', '$time_bsl', '$time_alt', '$served_by', '$mount_web', '$mount_preis',
                        '$mount_info', '$traffic_jam_surcharge', '$search_on_site', '$breaks', '$regular1_4', '$regular5_8', '$regular9_14', '$regular15_16', '$vip1_3', '$vip4_7')";

                        $sql1 = "INSERT INTO test (destination) VALUES ('$destination')";

                        if (mysqli_query($connection, $sql1)) {
                            echo "New record created successfully";
                            echo $vip1_3 . 'Test';
                        } else {
                            echo "Error: " . $sql1 . "<br>" . mysqli_error($connection);
                        }


                    } else {
                        ?>


                        <h1>Add new Destination</h1>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                            <div class="form-group">
                                <label for="destination">Destination</label><br>
                                <input type="text" class="form-control" id="destination">
                            </div>
                            <div class="form-group">
                                <label for="spec_mount">Special Mount</label><br>
                                <input type="text" class="form-control" id="spec_mount" placeholder="?">
                            </div>
                            <div class="form-group">
                                <label for="country">Land</label><br>
                                <input type="text" class="form-control" id="country" placeholder="Schweiz">
                            </div>
                            <div class="form-group">
                                <label for="region">Region</label><br>
                                <input type="text" class="form-control" id="region" placeholder="Graubünden">
                            </div>
                            <div class="form-group">
                                <label for="typ">Typ</label><br>
                                <input type="text" class="form-control" id="typ" placeholder="?">
                            </div>
                            <div class="form-group">
                                <label for="distance_from_zrh">Distanz von Zürich Flugafen</label><br>
                                <input type="text" class="form-control" id="distance_from_zrh" placeholder="40">
                            </div>
                            <div class="form-group">
                                <label for="distance_from_bsl">Distanz von Basel </label><br>
                                <input type="text" class="form-control" id="distance_from_bsl" placeholder="30">
                            </div>
                            <div class="form-group">
                                <label for="distance_from_alt">Distanz von Altenrieden</label><br>
                                <input type="text" class="form-control" id="distance_from_alt" placeholder="50">
                            </div>
                            <div class="form-group">
                                <label for="route_from_zrh">Route von Zürich</label><br>
                                <input type="text" class="form-control" id="route_from_zrh" placeholder="Bild">
                            </div>
                            <div class="form-group">
                                <label for="route_from_bsl">Route von Basel</label><br>
                                <input type="text" class="form-control" id="route_from_bsl" placeholder="Bild">
                            </div>
                            <div class="form-group">
                                <label for="route_from_alt">Route von Altenrieden</label><br>
                                <input type="text" class="form-control" id="route_from_alt" placeholder="Bild">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="time_zrh">Zeit von Zürich</label><br>
                                    <input type="text" class="form-control" id="time_zrh" placeholder="01:00">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="time_bsl">Zeit von Basel</label><br>
                                    <input type="text" class="form-control" id="time_bsl" placeholder="00:40">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="time_alt">Zeit von Altenrieden</label><br>
                                    <input type="text" class="form-control" id="time_alt" placeholder="01:10">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="served_by">Served by</label><br>
                                <input type="text" class="form-control" id="served_by" placeholder="?">
                            </div>
                            <div class="form-group">
                                <label for="mount_web">Maut Web?</label><br>
                                <input type="text" class="form-control" id="mount_web" placeholder="?">
                            </div>
                            <div class="form-group">
                                <label for="mount_preis">Maut Preis</label><br>
                                <input type="text" class="form-control" id="mount_preis" placeholder="20fr">
                            </div>
                            <div class="form-group">
                                <label for="mount_info">Maut Info</label><br>
                                <input type="text" class="form-control" id="mount_info" placeholder="Info">
                            </div>
                            <div class="form-group">
                                <label for="traffic_jam_surcharge">Stau Zuschlag</label><br>
                                <input type="text" class="form-control" id="traffic_jam_surcharge"
                                       placeholder="5.- / h">
                            </div>
                            <div class="form-group">
                                <label for="search_on_site">search on site</label><br>
                                <input type="text" class="form-control" id="search_on_site" placeholder="?">
                            </div>
                            <div class="form-group">
                                <label for="breaks">Pausen</label><br>
                                <input type="text" class="form-control" id="breaks" placeholder="Zeit">
                            </div>
                            <div class="form-group">
                                <label for="regular1_4">regular1_4</label><br>
                                <input type="text" class="form-control" id="regular1_4" placeholder="Preis">
                            </div>
                            <div class="form-group">
                                <label for="regular5_8">regular5_8</label><br>
                                <input type="text" class="form-control" id="regular5_8" placeholder="Preis">
                            </div>
                            <div class="form-group">
                                <label for="regular9_14">regular9_14</label><br>
                                <input type="text" class="form-control" id="regular9_14" placeholder="Preis">
                            </div>
                            <div class="form-group">
                                <label for="regular15_16">regular15_16</label><br>
                                <input type="text" class="form-control" id="regular15_16" placeholder="Preis">
                            </div>
                            <div class="form-group">
                                <label for="vip1_3">vip1_3</label><br>
                                <input type="text" class="form-control" id="vip1_3" placeholder="Preis">
                            </div>
                            <div class="form-group">
                                <label for="vip4_7">vip4_7</label><br>
                                <input type="text" class="form-control" id="vip4_7" placeholder="Preis">
                            </div>

                            <input name = "add" type = "submit" id = "add"
                                   value = "Add Destination">

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