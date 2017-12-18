<?php
include_once ("../../includes/connection/db_connection.php");
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
    <script>
       /* $(document).ready(function () {
          createUsers();
         });*/
    </script>


    <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../stylesheet/taskView.css">


</head>

<body>
<div id="pageContainer">
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

            <div class="col-md-6">
                <?php

                if (isset($_POST["saveNewMaut"])) {

                    if (!get_magic_quotes_gpc()) {

                        $maut_strecke = addslashes($_POST["maut_strecke"]);
                        $bemerkung = addslashes($_POST["bemerkung"]);
                        $preisSaisonPw = addslashes($_POST["preis_saison_pw"]);
                        $preisOhneSaisonPw = addslashes($_POST["preise_ohne_saison_pw"]);
                        $preisSaisonBus = addslashes($_POST["preis_saison_bus"]);
                        $preisOhneSaisonBus = addslashes($_POST["preis_ohne_saison_bus"]);
                        $preisSaisonAnhaenger = addslashes($_POST["preis_saison_anhaenger"]);
                        $preisOhneSaisonAnhaenger = addslashes($_POST["preis_ohne_saison_anhaenger"]);

                    } else {
                        $maut_strecke = $_POST["maut_strecke"];
                        $bemerkung = $_POST["bemerkung"];
                        $preisSaisonPw = $_POST["preis_saison_pw"];
                        $preisOhneSaisonPw = $_POST["preise_ohne_saison_pw"];
                        $preisSaisonBus = $_POST["preis_saison_bus"];
                        $preisOhneSaisonBus = $_POST["preis_ohne_saison_bus"];
                        $preisSaisonAnhaenger = $_POST["preis_saison_anhaenger"];
                        $preisOhneSaisonAnhaenger = $_POST["preis_ohne_saison_anhaenger"];

                    }

                    $sqlInsertNewMaut = "INSERT INTO maut (maut_strecke, maut_preis_saison_pw, maut_preis_ohne_saison_pw, maut_preis_saison_bus, 
                    maut_preis_ohne_saison_bus, maut_preis_saison_bus_anhaenger, maut_preis_ohne_saison_bus_anhaenger, maut_bemerkung) 
                    VALUES ('$maut_strecke', '$preisSaisonPw', '$preisOhneSaisonPw', '$preisSaisonBus', '$preisOhneSaisonBus', 
                    '$preisSaisonAnhaenger', '$preisOhneSaisonAnhaenger', '$bemerkung')";


                    mysqli_select_db($connection, $dbname);

                    $retval = mysqli_query($connection, $sqlInsertNewMaut);

                    if (!$retval) {
                        die('could not enter date: ' . mysqli_error($connection));
                    }

                    echo "Entered data successfully\n";

                }
                ?>

                <h1>Add new Maut</h1>
                <p>Alle Preise in CHF</p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="maut_strecke">Maut</label><br>
                            <input type="text" class="form-control" name="maut_strecke">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="bemerkung">Bemerkung</label><br>
                            <input type="text" class="form-control" name="bemerkung">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="preis_saison_pw">Preis Saison PW</label><br>
                            <input type="number" step="0.05" class="form-control" name="preis_saison_pw">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="preise_ohne_saison_pw">Preis ohne Saison PW</label><br>
                            <input type="number" step="0.05" class="form-control" name="preise_ohne_saison_pw">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="preis_saison_bus">Preis Saison Bus</label><br>
                            <input type="number" step="0.05" class="form-control" name="preis_saison_bus">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="preis_ohne_saison_bus">Preis ohne Saison Bus</label><br>
                            <input type="number" step="0.05" class="form-control" name="preis_ohne_saison_bus">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="preis_saison_anhaenger">Preis Saison Anhänger</label><br>
                            <input type="number" step="0.05" class="form-control" name="preis_saison_anhaenger">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="preis_ohne_saison_anhaenger">Preis ohne Saison Anhänger</label><br>
                            <input type="number" step="0.05" class="form-control" name="preis_ohne_saison_anhaenger">
                        </div>
                    </div>

                    <button name="saveNewMaut" class="btn btn-default" type="submit" value="saveNewMaut">Hinzufügen
                    </button>

                </form>

            </div>


            <?php
            // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
            $getMautId = "SELECT maut_id, maut_strecke FROM maut";
            $getMautIdResult = mysqli_query($connection, $getMautId) or die (mysqli_error($connection));
            ?>

            <div class="col-md-6">
                <h1>Edit Maut</h1>

                <?php
                $maut_ID = 1;
                if (isset($_POST["confirmMautButton"])) {

                    if (!get_magic_quotes_gpc()) {

                        $maut_ID = addslashes($_POST["maut_id"]);

                    } else {
                        $maut_ID = $_POST["maut_id"];
                    }

                }
                ?>

                <form method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?> ">

                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="maut_id">ID</label><br>
                            <select class="form-control" name="maut_id" id="editMautSelect">
                                <?php
                                while ($row = mysqli_fetch_array($getMautIdResult)) {
                                    echo "<option value=" . $row['maut_id'] . ">" . $row['maut_strecke'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                </form>
                <?php
                $getCountryAndShort = "SELECT maut_strecke, maut_preis_saison_pw, maut_preis_ohne_saison_pw, maut_preis_saison_bus, 
                    maut_preis_ohne_saison_bus, maut_preis_saison_bus_anhaenger, maut_preis_ohne_saison_bus_anhaenger, maut_bemerkung FROM maut WHERE maut_id = $maut_ID";
                $getCountryAndShortResult = mysqli_query($connection, $getCountryAndShort) or die (mysqli_error($connection));

                while ($row = mysqli_fetch_array($getCountryAndShortResult)) {
                    ?>
                    <form id="maut_form" method="post">
                        <div class="row">
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="maut_strecke">Maut</label><br>
                                <input type="text" value="<?php echo $row['maut_strecke']; ?>" class="form-control"
                                       name="maut_strecke" id="maut_strecke">
                            </div>
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="bemerkung">Bemerkung</label><br>
                                <input type="text" value="<?php echo $row['maut_bemerkung']; ?>" class="form-control"
                                       name="bemerkung" id="maut_bemerkung">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="preis_saison_pw">Preis Saison PW</label><br>
                                <input type="number" step="0.05" value="<?php echo $row['maut_preis_saison_pw']; ?>" class="form-control" name="preis_saison_pw" id="maut_preis_saison_pw">
                            </div>
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="preise_ohne_saison_pw">Preis ohne Saison PW</label><br>
                                <input type="number" step="0.05" value="<?php echo $row['maut_preis_ohne_saison_pw']; ?>" class="form-control" name="preise_ohne_saison_pw" id="maut_preis_ohne_saison_pw">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="preis_saison_bus">Preis Saison Bus</label><br>
                                <input type="number" step="0.05" value="<?php echo $row['maut_preis_saison_bus']; ?>" class="form-control" name="preis_saison_bus" id="maut_preis_saison_bus">
                            </div>
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="preis_ohne_saison_bus">Preis ohne Saison Bus</label><br>
                                <input type="number" step="0.05" value="<?php echo $row['maut_preis_ohne_saison_bus']; ?>" class="form-control" name="preis_ohne_saison_bus" id="maut_preis_ohne_saison_bus">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="preis_saison_anhaenger">Preis Saison Bus Anhänger</label><br>
                                <input type="number" step="0.05" value="<?php echo $row['maut_preis_saison_bus_anhaenger']; ?>" class="form-control" name="preis_saison_anhaenger" id="maut_preis_saison_bus_anhaenger">
                            </div>
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="preis_ohne_saison_anhaenger">Preis ohne Saison Bus Anhänger</label><br>
                                <input type="number" step="0.05" value="<?php echo $row['maut_preis_ohne_saison_bus_anhaenger']; ?>" class="form-control"
                                       name="preis_ohne_saison_anhaenger" id="maut_preis_ohne_saison_bus_anhaenger">
                            </div>
                        </div>

                            <button id="mautUpdateButton" class="btn btn-default" type="button" onclick="updateMaut()">
                                Speichern
                            </button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php

        if (isset($_POST["saveRegions"])) {

            if (!get_magic_quotes_gpc()) {

                $country_fs = addslashes($_POST["country_fs"]);
                $region = addslashes($_POST["region"]);

            } else {
                $country_fs = $_POST["country_fs"];
                $region = $_POST["region"];
            }

            $sqlRegion = "INSERT INTO region (region, country_fs) VALUES ('$region', '$country_fs')";


            mysqli_select_db($connection, $dbname);

            $retval = mysqli_query($connection, $sqlRegion);

            if (!$retval) {
                die('could not enter date: ' . mysqli_error($connection));
            }

            echo "Entered data successfully\n";

        }
        ?>

    </div>
</div>
</body>
</html>