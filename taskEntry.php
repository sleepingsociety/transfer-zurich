<?php
$dbname = $_SERVER['DB_NAME'];
$servername = $_SERVER['DB_HOST'];
$dbusername = $_SERVER['DB_USERNAME'];
$dbpassword = $_SERVER['DB_PASSWORD'];

$connection = new mysqli($servername, $dbusername, $dbpassword);

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
                <form>
                    <div class="form-header">
                        <div class="form-inline">

                            <div class="form-group">
                                <label for="projectnumber">Project Nummer:</label><br>
                                <input type="text" class="form-control" id="projectnumber" placeholder="ZH-443"
                                       value="<?php if (isset($_SESSION["project_number"])) {
                                           echo $_SESSION["project_number"];
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label for="lead-passenger">Lead Passenger:</label><br>
                                <input type="text" class="form-control" id="lead-passenger" placeholder="Tim Tester"
                                       value="<?php if (isset($_SESSION["lead_passenger"])) {
                                           echo $_SESSION["lead_passenger"];
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label><br>
                                <input type="text" class="form-control" id="date" placeholder="27.10.2016"
                                       value="<?php if (isset($_SESSION["date"])) {
                                           echo $_SESSION["date"];
                                       } ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-body row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origin">Origin:</label>
                                <input type="text" class="form-control" id="origin" placeholder="Zurich Airport"
                                       value="<?php if (isset($_SESSION["origin"])) {
                                           echo $_SESSION["origin"];
                                       } ?>">

                                <label class="sr-only" for="origin-address">Origin-Address</label>
                                <textarea class="form-control" rows="3" id="origin-address"
                                          placeholder="Zurich Airport"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                    <label for="pick-up-time">Pick Up Time</label>
                                    <input type="text" class="form-control" id="pick-up-time" placeholder="16:20"
                                           value="<?php if (isset($_SESSION["pickup_time"])) {
                                               echo $_SESSION["pickup_time"];
                                           } ?>">
                                </div>
                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                    <label for="flight-from-to">Flight from to</label>
                                    <input type="text" class="form-control" id="flight-from-to" placeholder="NYC / ZRH"
                                           value="<?php if (isset($_SESSION["flight_from_to"])) {
                                               echo $_SESSION["flight_from_to"];
                                           } ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                    <label for="transfer-type">Transfer-Type</label>
                                    <input type="text" class="form-control" id="transfer-type" placeholder="Credit Card"
                                           value="<?php if (isset($_SESSION["transfer_type"])) {
                                               echo $_SESSION["transfer_type"];
                                           } ?>">
                                </div>
                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                    <label for="special-needs">Special Needs</label>
                                    <input type="text" class="form-control" id="special-needs" placeholder="Water"
                                           value="<?php if (isset($_SESSION["special_needs"])) {
                                               echo $_SESSION["special_needs"];
                                           } ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="number-passengers">Number of Passengers</label>
                                    <input type="text" class="form-control" id="number-passengers" placeholder="2"
                                           value="<?php if (isset($_SESSION["normal_passengers"])) {
                                               echo $_SESSION["normal_passengers"];
                                           } ?>">
                                </div>

                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="number-baby">Number of Babys</label>
                                    <input type="text" class="form-control" id="number-baby" placeholder="0"
                                           value="<?php if (isset($_SESSION["baby_passengers"])) {
                                               echo $_SESSION["baby_passengers"];
                                           } ?>">
                                </div>


                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="number-toddlers">Number of Toddlers</label>
                                    <input type="text" class="form-control" id="number-toddlers" placeholder="0"
                                           value="<?php if (isset($_SESSION["toddler_passengers"])) {
                                               echo $_SESSION["toddler_passengers"];
                                           } ?>">
                                </div>


                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="number-kids">Number of Kids</label>
                                    <input type="text" class="form-control" id="number-kids" placeholder="1"
                                           value="<?php if (isset($_SESSION["kid_passengers"])) {
                                               echo $_SESSION["kid_passengers"];
                                           } ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destination">Destination:</label>
                                <input type="text" class="form-control" id="destination" placeholder="Wiedikon"
                                       value="<?php if (isset($_SESSION["destination"])) {
                                           echo $_SESSION["destination"];
                                       } ?>">

                                <label class="sr-only" for="destination-address">Destination-Address</label>
                                <textarea class="form-control" rows="3" id="destination-address"
                                          placeholder="Origin-address"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="take-off">Take Off</label>
                                    <input type="text" class="form-control" id="take-off" placeholder="19:11"
                                           value="<?php if (isset($_SESSION["take_off_timne"])) {
                                               echo $_SESSION["take_off_timne"];
                                           } ?>">
                                </div>
                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="flight-number">Flightnumber</label>
                                    <input type="text" class="form-control" id="flight-number" placeholder="H4R4MB3"
                                           value="<?php if (isset($_SESSION["flightnumber"])) {
                                               echo $_SESSION["flightnumber"];
                                           } ?>">
                                </div>

                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="terminal">Terminal</label>
                                    <input type="text" class="form-control" id="terminal" placeholder="AP15"
                                           value="<?php if (isset($_SESSION["terminal"])) {
                                               echo $_SESSION["terminal"];
                                           } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone-passenger">Phone Passenger</label>
                                <input type="text" class="form-control" id="phone-passenger" placeholder="+1223412134"
                                       value="<?php if (isset($_SESSION["phone_passenger"])) {
                                           echo $_SESSION["phone_passenger"];
                                       } ?>">

                            </div>
                            <div class="row">

                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="suitcase-big">Suitcase Big</label>
                                    <input type="text" class="form-control" id="suitcase-big" placeholder="1"
                                           value="<?php if (isset($_SESSION["big_suitcase"])) {
                                               echo $_SESSION["big_suitcase"];
                                           } ?>">
                                </div>

                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="suitcase-medium">Suitcase Medium</label>
                                    <input type="text" class="form-control" id="suitcase-medium" placeholder="2"
                                           value="<?php if (isset($_SESSION["medium_suitcase"])) {
                                               echo $_SESSION["medium_suitcase"];
                                           } ?>">
                                </div>

                                <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                    <label for="suitcase-small">Suitcase Small</label>
                                    <input type="text" class="form-control" id="suitcase-small" placeholder="0"
                                           value="<?php if (isset($_SESSION["small_suitcase"])) {
                                               echo $_SESSION["small_suitcase"];
                                           } ?>">
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                    <label for="ski-snowboard">Ski / Snowboard</label>
                                    <input type="text" class="form-control" id="ski-snowboard" placeholder="3"
                                           value="<?php if (isset($_SESSION["ski_snowboard"])) {
                                               echo $_SESSION["ski_snowboard"];
                                           } ?>">
                                </div>


                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                    <label for="other-luggage">Other Luggage</label>
                                    <input type="text" class="form-control" id="other-luggage" placeholder="1"
                                           value="<?php if (isset($_SESSION["other_luggage"])) {
                                               echo $_SESSION["other_luggage"];
                                           } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comments</label>
                                <textarea class="form-control" rows="3" id="comment" placeholder="comment"
                                          value="<?php if (isset($_SESSION["comments"])) {
                                              echo $_SESSION["comments"];
                                          } ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="comment">Link to Accept</label>
                                <input type="text" class="form-control" id="acceptLink" placeholder="1"
                                       value="<?php if (isset($_SESSION["accept_link"])) {
                                           echo $_SESSION["accept_link"];
                                       } ?>">
                            </div>
                            <div class="form-group">
                                <label for="comment">Link to Decline</label>
                                <input type="text" class="form-control" id="declineLink" placeholder="1"
                                       value="<?php if (isset($_SESSION["decline_link"])) {
                                           echo $_SESSION["decline_link"];
                                       } ?>">
                            </div>

                        </div>
                    </div>
                    <input class="position btn btn-default" type="button" value="Änderungen Speichern">

                    <input class="position btn btn-default" type="button" value="Auftrag Bestätigen">
                    <input class="position btn btn-default" type="button" value="Auftrag Ablehnen">
                </form>

                <form action="parseEmail.php" method="post" id="parseForm">
                    <label for="emailInsert">Insert Email here</label>
                    <textarea name="emailInsertWindow" id="emailInsert" form="parseForm"></textarea>
                    <input type="submit" value="Send" id="submitButton">
                </form>

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
