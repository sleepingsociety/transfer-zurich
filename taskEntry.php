<?php
$dbname = $_SERVER['DB_NAME'];
$servername = $_SERVER['DB_HOST'];
$dbusername = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);

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
    <meta charset="UTF-8">
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
                                <li class="active"><a href="adminOverview.php">Auftragsverwaltung</a></li>
                                <li><a href="managment.php">Verwaltung</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="form">
            <div class="container">
                <?php

                if (isset($_POST{"add"})) {


                    if (!get_magic_quotes_gpc()) {
                        $project_number = addslashes($_POST["project_number"]);
                        $lead_passenger = addslashes($_POST["lead_passenger"]);
                        $datum = addslashes($_POST["datum"]);
                        $origin = addslashes($_POST["origin"]);
                        $flight_from_to = addslashes($_POST["flight_from_to"]);
                        $transfer_type = addslashes($_POST["transfer_type"]);
                        $special_needs = addslashes($_POST["special_needs"]);
                        $baby_passengers = addslashes($_POST["baby_passengers"]);
                        $toddler_passengers = addslashes($_POST["toddler_passengers"]);
                        $kid_passengers = addslashes($_POST["kid_passengers"]);
                        $destination = addslashes($_POST["destination"]);
                        $landing_takeoff_time = addslashes($_POST["landing_takeoff_time"]);
                        $flight_number = addslashes($_POST["flight_number"]);
                        $terminal = addslashes($_POST["terminal"]);
                        $phone_passenger = addslashes($_POST["phone_passenger"]);
                        $other_luggage = addslashes($_POST["other_luggage"]);
                        $comments = addslashes($_POST["comments"]);
                        $accept_link = addslashes($_POST["accept_link"]);
                        $decline_link = addslashes($_POST["decline_link"]);
                    } else {
                        $project_number = $_POST["project_number"];
                        $lead_passenger = $_POST["lead_passenger"];
                        $datum = $_POST["datum"];
                        $origin = $_POST["origin"];
                        $flight_from_to = $_POST["flight_from_to"];
                        $transfer_type = $_POST["transfer_type"];
                        $special_needs = $_POST["special_needs"];
                        $baby_passengers = $_POST["baby_passengers"];
                        $toddler_passengers = $_POST["toddler_passengers"];
                        $kid_passengers = $_POST["kid_passengers"];
                        $destination = $_POST["destination"];
                        $landing_takeoff_time = $_POST["landing_takeoff_time"];
                        $flight_number = $_POST["flight_number"];
                        $terminal = $_POST["terminal"];
                        $phone_passenger = $_POST["phone_passenger"];
                        $other_luggage = $_POST["other_luggage"];
                        $comments = $_POST["comments"];
                        $accept_link = $_POST["accept_link"];
                        $decline_link = $_POST["decline_link"];
                    }
                    /*variabeln die keine varchar sind*/
                    $pickup_time = $_POST['pickup_time'];
                    $number_passengers = $_POST['number_passengers'];
                    $suitcase_big = $_POST["suitcase_big"];
                    $suitcase_medium = $_POST["suitcase_medium"];
                    $suitcase_small = $_POST["suitcase_small"];
                    $ski_snowboard = $_POST["ski_snowboard"];

                    /*
                     * Select für die Destination
                     *
                     * Select für den Transfer Typ
                     */

                    $sql = "INSERT INTO income_transfer (lead_passenger, datum, origin, pick_up_time, flight_from_to,
transfer_type_fs, special_needs, number_passengers, baby_passengers, toddler_passengers, kid_passengers, destination_fs,
landing_takeoff_time, flight_number, terminal, phone_passenger, suitcase_big, suitcase_medium, suitcase_small,ski_snowboard,
other_luggage, comments, accept_link, decline_link) VALUES ('$lead_passenger','$datum',
'$origin', '$pickup_time', '$flight_from_to', '$transfer_type', '$special_needs', '$number_passengers', '$baby_passengers','$toddler_passengers',
'$kid_passengers','$destination','$landing_takeoff_time','$flight_number','$terminal','$phone_passenger','$suitcase_big','$suitcase_medium','$suitcase_small',
'$ski_snowboard','$other_luggage','$comments','$accept_link','$decline_link')";


/*
                    echo $sql;*/

                    mysqli_select_db($dbname, $connection);

                    $retval = mysqli_query($connection, $sql);


                    if (!$retval) {
                        die('could not enter data: ' . mysqli_error($connection));
                    }

                    echo "Entered data successfully\n";

                    if (mysqli_query($connection, $sql)) {
                        echo "New record created successfully";

                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
                } else {


                    ?>
                    <form action="parseEmail.php" method="post" id="parseForm">
                        <label for="emailInsert">Insert Email here</label>
                        <textarea class="form-control" rows="3" name="emailInsertWindow" id="emailInsert"
                                  form="parseForm"></textarea>
                        <input type="submit" value="Send" id="submitButton">
                    </form>

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-header">
                            <div class="form-inline">

                                <div class="form-group">
                                    <label for="project_number">Auftrags Nummer:<br>
                                    <input type="text" class="form-control" name="project_number"
                                           value="<?php if (isset($_SESSION["project_number"])) {
                                               echo $_SESSION["project_number"];
                                           } ?>">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="lead_passenger">Haupt Passagier:<br>
                                    <input type="text" class="form-control" name="lead_passenger"
                                           value="<?php if (isset($_SESSION["lead_passenger"])) {
                                               echo $_SESSION["lead_passenger"];
                                           } ?>">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="datum">Datum:<br>
                                    <input type="text" class="form-control" name="datum"
                                           value="<?php if (isset($_SESSION["datum"])) {
                                               echo $_SESSION["datum"];
                                           } ?>">
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-body row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="origin">Start:</label>
                                    <input type="text" class="form-control" name="origin"
                                           value="<?php if (isset($_SESSION["origin"])) {
                                               echo $_SESSION["origin"];
                                           } ?>">

                                    <label class="sr-only" for="origin-address">Start-Adresse</label>
                                    <textarea class="form-control" rows="3" name="origin-address"
                                    ></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="pickup_time">Abholzeit</label>
                                        <input type="text" class="form-control" name="pickup_time"
                                               value="<?php if (isset($_SESSION["pickup_time"])) {
                                                   echo $_SESSION["pickup_time"];
                                               } ?>">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="flight_from_to">Flug von/nach</label>
                                    <input type=" text" class="form-control" name="flight_from_to"
                                        value="<?php if (isset($_SESSION["flight_from_to"])) {
                                            echo $_SESSION["flight_from_to"];
                                        } ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="transfer_type">Transfer-Typ</label>
                                        <input type="text" class="form-control" name="transfer_type"
                                               value="<?php if (isset($_SESSION["transfer_type"])) {
                                                   echo $_SESSION["transfer_type"];
                                               } ?>">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="special_needs">Besondere Bedürfnisse</label>
                                        <input type="text" class="form-control" name="special_needs"
                                               value="<?php if (isset($_SESSION["special_needs"])) {
                                                   echo $_SESSION["special_needs"];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="number_passengers">Anzahl Passagiere</label>
                                        <input type="text" class="form-control" name="number_passengers"
                                               value="<?php if (isset($_SESSION["number_passengers"])) {
                                                   echo $_SESSION["number_passengers"];
                                               } ?>">
                                    </div>

                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="baby_passengers">Anzahl Babys</label>
                                        <input type="text" class="form-control" name="baby_passengers"
                                               value="<?php if (isset($_SESSION["baby_passengers"])) {
                                                   echo $_SESSION["baby_passengers"];
                                               } ?>">
                                    </div>


                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="toddler_passengers">Anzahl Kleinkidner</label>
                                        <input type="text" class="form-control" id="toddler_passengers"
                                               value="<?php if (isset($_SESSION["toddler_passengers"])) {
                                                   echo $_SESSION["toddler_passengers"];
                                               } ?>">
                                    </div>


                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="kid_passengers">Anzahl Kinder</label>
                                        <input type="text" class="form-control" name="kid_passengers"
                                               value="<?php if (isset($_SESSION["kid_passengers"])) {
                                                   echo $_SESSION["kid_passengers"];
                                               } ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destination">Reiseziel:</label>
                                    <input type="text" class="form-control" name="destination"
                                           value="<?php if (isset($_SESSION["destination"])) {
                                               echo $_SESSION["destination"];
                                           } ?>">

                                    <label class="sr-only" for="destination-address">Reiseziel-Address</label>
                                    <textarea class="form-control" rows="3" name="destination-address"
                                    ></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="landing_takeoff_time">Landungs/Abflugszeit</label>
                                        <input type="text" class="form-control" name="landing_takeoff_time"
                                               value="<?php if (isset($_SESSION["landing_takeoff_time"])) {
                                                   echo $_SESSION["landing_takeoff_time"];
                                               } ?>">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="flight_number">Flugnummer</label>
                                        <input type="text" class="form-control" name="flight_number"
                                               value="<?php if (isset($_SESSION["flight_number"])) {
                                                   echo $_SESSION["flight_number"];
                                               } ?>">
                                    </div>

                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="terminal">Terminal</label>
                                        <input type="text" class="form-control" name="terminal"
                                               value="<?php if (isset($_SESSION["terminal"])) {
                                                   echo $_SESSION["terminal"];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_passenger">Telefon des Passagiers</label>
                                    <input type="text" class="form-control" name="phone_passenger"
                                           value="<?php if (isset($_SESSION["phone_passenger"])) {
                                               echo $_SESSION["phone_passenger"];
                                           } ?>">

                                </div>
                                <div class="row">

                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="suitcase_big">Koffer Gross</label>
                                        <input type="text" class="form-control" name="suitcase_big"
                                               value="<?php if (isset($_SESSION["suitcase_big"])) {
                                                   echo $_SESSION["suitcase_big"];
                                               } ?>">
                                    </div>

                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="suitcase_medium">Koffer Medium</label>
                                        <input type="text" class="form-control" name="suitcase_medium"
                                               value="<?php if (isset($_SESSION["suitcase_medium"])) {
                                                   echo $_SESSION["suitcase_medium"];
                                               } ?>">
                                    </div>

                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <label for="suitcase_small">Koffer Klein</label>
                                        <input type="text" class="form-control" name="suitcase_small"
                                               value="<?php if (isset($_SESSION["suitcase_small"])) {
                                                   echo $_SESSION["suitcase_small"];
                                               } ?>">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="ski_snowboard">Ski / Snowboard</label>
                                        <input type="text" class="form-control" name="ski_snowboard"
                                               value="<?php if (isset($_SESSION["ski_snowboard"])) {
                                                   echo $_SESSION["ski_snowboard"];
                                               } ?>">
                                    </div>


                                    <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                        <label for="other_luggage">Anderes Gepäck</label>
                                        <input type="text" class="form-control" name="other_luggage"
                                               value="<?php if (isset($_SESSION["other_luggage"])) {
                                                   echo $_SESSION["other_luggage"];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comments">Kommentar</label>
                                    <textarea class="form-control" rows="3" name="comments"
                                              value="<?php if (isset($_SESSION["comments"])) {
                                                  echo $_SESSION["comments"];
                                              } ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="accept_link">Link um Antrag anzunehmen</label>
                                    <input type="text" class="form-control" name="accept_link"
                                           value="<?php if (isset($_SESSION["accept_link"])) {
                                               echo $_SESSION["accept_link"];
                                           } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="decline_link">Link um Antrag abzulehnen</label>
                                    <input type="text" class="form-control" name="decline_link"
                                           value="<?php if (isset($_SESSION["decline_link"])) {
                                               echo $_SESSION["decline_link"];
                                           } ?>">
                                </div>

                            </div>
                        </div>
                        <input class="position btn btn-default" type="submit" name="add" id="add"
                               value="Änderungen Speichern">


                    </form>
                    <?php
                }
                ?>


            </div>
        </div>
        <footer class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <nav class="nav navbar-nav">
                    <p>&copy; 2016 ATAP</p>
                </nav>
                <nav class="nav navbar-nav navbar-right">
                    <a class="bot" href="#">Sitemap</a>
                    <a class="bot" href="#">Disclaimer</a>
                    <a class="bot" href="#">Impressum</a>
                </nav>
            </div>
        </footer>

</body>

</html>
