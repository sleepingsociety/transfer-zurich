<?php
include_once("../../includes/connection/db_connection.php");
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
    <script src="../../javascript/loginPage.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../stylesheet/taskView.css">
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
                            <a href="../../adminOverview.php"><img src="../../img/atap-logo.png"
                                                                   class="img-nav img-responsive"
                                                                   id="imgLogo"></a>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="../../adminOverview.php">Auftragsverwaltung</a></li>
                                <li class="active"><a href="../../managment.php">Verwaltung</a></li>
                                <li><a href="../../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="pageContent row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <?php

                    if (isset($_POST["addDestination"])) {


                        if (!get_magic_quotes_gpc()) {
                            $destination = addslashes($_POST["destination"]);
                            $zipCode = addslashes($_POST["zipCode"]);
                        } else {
                            $destination = $_POST["destination"];
                            $zipCode = $_POST["zipCode"];
                        }
                        $traffic_jam_surcharge = $_POST['traffic_jam_surcharge'];
                        $search_on_site = $_POST['search_on_site'];
                        $breaks = $_POST['breaks'];
                        $type_id = $_POST['type_id'];
                        $country = $_POST['country'];
                        $maut_auswahl = $_POST['maut_id'];
                        $region = 1;

                        $sql = "INSERT INTO destination (destination, zipCode, country_fs, region_fs, breaks, traffic_jam_surcharge, search_at_place, type_fs, maut_fs)
                        VALUES ('$destination', '$zipCode','$country', '$region', '$breaks','$traffic_jam_surcharge','$search_on_site', '$type_id', '$maut_auswahl')";

                        mysqli_select_db($connection, $dbname);

                        $retval = mysqli_query($connection, $sql);

                        if (!$retval) {
                            die('could not enter date: ' . mysqli_error($connection));
                        }

                        echo "Entered data successfully\n";

                    } else {
                        ?>

                        <h1>Neue Destination hinzufügen</h1>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_add_destination">Destination</label><br>
                                    <input id="destination_id_add_destination" type="text" class="form-control"
                                           name="destination">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">

                                    <label for="addDestinationCountrySelect">Land</label><br>
                                    <select id="addDestinationCountrySelect" class="form-control" name="country">
                                        <?php
                                        $selectCountryQuery = "SELECT country_id, country FROM country";

                                        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

                                        while ($selectCountryRow = mysqli_fetch_array($selectCountryResult)) {
                                            echo "<option value=" . $selectCountryRow['country_id'] . ">" . $selectCountryRow['country'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_add_zipCode">PLZ</label><br>
                                    <input id="destination_id_add_zipCode" type="text" class="form-control"
                                           name="zipCode">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="addDestinationRegionSelect">Region</label><br>

                                    <?php
                                    // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                                    $getRegionId = "SELECT region_id, region, country_fs FROM region";
                                    $getRegionIdResult = mysqli_query($connection, $getRegionId) or die (mysqli_error($connection));
                                    ?>

                                    <select id="addDestinationRegionSelect" class="form-control" name="region_id">
                                        <?php
                                        while ($row = mysqli_fetch_array($getRegionIdResult)) {
                                            echo "<option value=" . $row['region_id'] . ">" . $row['region'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="addDestinationTypeSelect">Typ</label><br>
                                    <?php
                                    // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                                    $getTypeId = "SELECT type_id, type FROM type";
                                    $type_ID = 1;
                                    $getTypeIdResult = mysqli_query($connection, $getTypeId) or die (mysqli_error($connection));
                                    ?>
                                    <select id="addDestinationTypeSelect" class="form-control" name="type_id">
                                        <?php
                                        while ($row = mysqli_fetch_array($getTypeIdResult)) {
                                            echo "<option value=" . $row['type_id'] . ">" . $row['type'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="addDestinationMautSelect">Benötigtes Maut.</label><br>

                                    <?php
                                    // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                                    $getMautId = "SELECT maut_id, maut_strecke FROM maut";
                                    $maut_ID = 1;
                                    $getMautIdResult = mysqli_query($connection, $getMautId) or die (mysqli_error($connection));
                                    ?>

                                    <select id="addDestinationMautSelect" class="form-control" name="maut_id">
                                        <?php
                                        while ($row = mysqli_fetch_array($getMautIdResult)) {
                                            echo "<option value=" . $row['maut_id'] . ">" . $row['maut_strecke'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_add_traffic_jam_surcharge">Stau Zuschlag</label><br>
                                    <input id="destination_id_add_traffic_jam_surcharge" type="text"
                                           class="form-control" name="traffic_jam_surcharge">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_add_search_on_site">Suche vor Ort</label><br>
                                    <input id="destination_id_add_search_on_site" type="text" class="form-control"
                                           name="search_on_site">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_add_breaks">Pausen</label><br>
                                    <input id="destination_id_add_breaks" type="text" class="form-control"
                                           name="breaks">
                                </div>
                            </div>
                            <button name="addDestination" class="btn btn-default" type="submit" value="addDestination">
                                Destination hinzufügen
                            </button>

                        </form>
                        <?php
                    }
                    ?>

                </div>

                <div class="col-md-6 col-sm-6 col-lg-6">

                    <?php

                    if (isset($_POST["addDestination"])) {


                        if (!get_magic_quotes_gpc()) {
                            $destination = addslashes($_POST["destination"]);
                            $zipCode = addslashes($_POST["zipCode"]);
                        } else {
                            $destination = $_POST["destination"];
                            $zipCode = $_POST["zipCode"];
                        }
                        $traffic_jam_surcharge = $_POST['traffic_jam_surcharge'];
                        $search_on_site = $_POST['search_on_site'];
                        $breaks = $_POST['breaks'];
                        $type_id = $_POST['type_id'];
                        $country = $_POST['country'];
                        $maut_auswahl = $_POST['maut_id'];
                        $region = $_POST['region_id'];

                        // SQL for updating the database record

                        $updateDestinationQuery = "UPDATE destination 
                    SET destination = '$destination', SET zipCode = '$zipCode', SET country_fs = '$country', 
                    SET region_fs = '$region', SET breaks = '$breaks', SET traffic_jam_surcharge = '$traffic_jam_surcharge', 
                    SET search_at_place = '$search_on_site', SET type_fs = '$type_id', SET maut_fs = '$maut_auswahl'
                    WHERE destination_id = $destination_ID";

                        mysqli_select_db($connection, $dbname);

                        $updateDestination = mysqli_query($connection, $updateDestinationQuery);

                        if (!$updateDestination) {
                            die('could not enter date: ' . mysqli_error($connection));
                        }
                        echo "Entered data successfully\n";

                    } else {
                        ?>
                        <h1>Destinationen Editieren</h1>
                        <?php


                        // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                        $getDestinationId = "SELECT destination_id, destination FROM destination";
                        $getDestinationIdResult = mysqli_query($connection, $getDestinationId) or die (mysqli_error($connection));

                        $destination_ID = 1;
                        if (isset($_POST["confirmDestinationButton"])) {

                            if (!get_magic_quotes_gpc()) {

                                $destination_ID = addslashes($_POST["destination_id"]);

                            } else {
                                $destination_ID  = $_POST["destination_id"];
                            }

                        }
                        ?>

                        <div class="row">
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="destination_id_select">ID</label><br>
                                <select id="destination_id_select" class="form-control" name="destination_id">
                                    <?php
                                    while ($row = mysqli_fetch_array($getDestinationIdResult)) {
                                        echo "<option value=" . $row['destination_id'] . ">" . $row['destination'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_destination">Destination</label><br>
                                    <input type="text" class="form-control" name="destination"
                                           id="destination_id_select_destination">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">

                                    <label for="editDestinationCountrySelect">Land</label><br>
                                    <select id="editDestinationCountrySelect" class="form-control" name="country">
                                        <?php
                                        $selectCountryQuery = "SELECT country_id, country FROM country";

                                        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

                                        $country_id = $selectCountryRow['country_id'];

                                        while ($selectCountryRow = mysqli_fetch_array($selectCountryResult)) {
                                            echo "<option value=" . $selectCountryRow['country_id'] . ">" . $selectCountryRow['country'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_zipCode">PLZ</label><br>
                                    <input type="text" class="form-control" name="zipCode"
                                           id="destination_id_select_zipCode">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="region">Region</label><br>

                                    <?php
                                    // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                                    $getRegionId = "SELECT region_id, region, country_fs FROM region";
                                    $getRegionIdResult = mysqli_query($connection, $getRegionId) or die (mysqli_error($connection));
                                    ?>

                                    <select id="editDestinationRegionSelect" class="form-control" name="region_id">
                                        <?php
                                        while ($row = mysqli_fetch_array($getRegionIdResult)) {
                                            echo "<option value=" . $row['region_id'] . ">" . $row['region'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_type">Typ</label><br>
                                    <?php
                                    // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                                    $getTypeId = "SELECT type_id, type FROM type";
                                    $type_ID = 1;
                                    $getTypeIdResult = mysqli_query($connection, $getTypeId) or die (mysqli_error($connection));
                                    ?>
                                    <select class="form-control" name="type_id" id="destination_id_select_type">
                                        <?php
                                        while ($row = mysqli_fetch_array($getTypeIdResult)) {
                                            echo "<option value=" . $row['type_id'] . ">" . $row['type'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_maut">Benötigtes Maut.</label><br>

                                    <?php
                                    // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
                                    $getMautId = "SELECT maut_id, maut_strecke FROM maut";
                                    $maut_ID = 1;
                                    $getMautIdResult = mysqli_query($connection, $getMautId) or die (mysqli_error($connection));
                                    ?>

                                    <select class="form-control" id="destination_id_select_maut" name="maut_id">
                                        <?php
                                        while ($row = mysqli_fetch_array($getMautIdResult)) {
                                            echo "<option value=" . $row['maut_id'] . ">" . $row['maut_strecke'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_traffic_jam_surcharge">Stau Zuschlag</label><br>
                                    <input type="text" class="form-control" name="traffic_jam_surcharge"
                                           id="destination_id_select_traffic_jam_surcharge">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_search_on_site">Suche vor Ort</label><br>
                                    <input type="text" class="form-control" name="search_on_site"
                                           id="destination_id_select_search_on_site">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="destination_id_select_breaks">Pausen</label><br>
                                    <input type="text" class="form-control" name="breaks"
                                           id="destination_id_select_breaks">
                                </div>
                            </div>
                            <button name="editDestination" class="btn btn-default" type="submit"
                                    value="editDestination">
                                Änderungen Speichern
                            </button>
                        </form>
                        <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
</body>
</html>