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
    <script src="../../javascript/loginPage.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            //getHotelDetails();
        });
    </script>


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
                            <a href="../../adminOverview.php"><img src="../../img/atap-logo.png" class="img-nav img-responsive"
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
                    // use exec() because no results are returned
                    if (isset($_POST["add"])) {
                        if (!get_magic_quotes_gpc()) {
                            $hotel_name = addslashes($_POST["hotel_name_add"]);
                            $hotel_website = addslashes($_POST['hotel_website_add']);
                            $hotel_street_name = addslashes($_POST['hotel_street_name_add']);
                            $hotel_street_number = addslashes($_POST['hotel_street_number_add']);
                            $hotel_postal_code = addslashes($_POST['hotel_postal_code_add']);
                            $hotel_city = addslashes($_POST['hotel_city_add']);
                            $hotel_country = addslashes($_POST['hotel_country_add']);
                        } else {
                            $hotel_name = $_POST["hotel_name_add"];
                            $hotel_website = $_POST['hotel_website_add'];
                            $hotel_street_name = $_POST['hotel_street_name_add'];
                            $hotel_street_number = $_POST['hotel_street_number_add'];
                            $hotel_postal_code = $_POST['hotel_postal_code_add'];
                            $hotel_city = $_POST['hotel_city_add'];
                            $hotel_country = $_POST['hotel_country_add'];
                        }

                        /*$sql = "INSERT INTO destinations (destination, spec_mount, country, region, typ, distance_from_zrh, distance_from_bsl, distance_from_alt, route_from_zrh,
                        route_from_bsl, route_from_alt,  time_zrh, time_bsl, time_alt, served_by, mount_web, mount_preis, mount_info, traffic_jam_surcharge, search_on_site,
                        breaks) VALUES ('$destination', '$spec_mount', '$country', '$region', '$typ', '$distance_from_zrh',
                        '$distance_from_bsl', '$distance_from_alt', '$route_from_zrh', '$route_from_bsl', '$route_from_alt', '$time_zrh', '$time_bsl', '$time_alt', '$served_by', '$mount_web', '$mount_preis',
                        '$mount_info', '$traffic_jam_surcharge', '$search_on_site', '$breaks')";
                        $sql1 = "INSERT INTO test (destination) VALUES ('$destination')";
                        */

                        mysqli_select_db($dbname,$connection);
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


                        <h1>Add new Hotel</h1>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                            <div class="form-group">
                                <label for="hotel_name_add">Hotel name</label><br>
                                <input type="text" class="form-control" name="hotel_name_add">
                            </div>
                            <div class="form-group">
                                <label for="hotel_website_add">Website</label><br>
                                <input type="text" class="form-control" name="hotel_website_add">
                            </div>

                            <div class="form-group">
                                <label for="hotel_street_name_add">Street name</label><br>
                                <input type="text" class="form-control" name="hotel_street_name_add">
                            </div>
                            <div class="form-group">
                                <label for="hotel_street_number_add">Street number</label><br>
                                <input type="text" class="form-control" name="hotel_street_number_add">
                            </div>

                            <div class="form-group">
                                <label for="hotel_postal_code_add">Postal Code</label><br>
                                <input type="text" class="form-control" name="hotel_postal_code_add">
                            </div>
                            <div class="form-group">
                                <label for="hotel_city_add">City</label><br>
                                <input type="text" class="form-control" name="hotel_city_add">
                            </div>
                            <div class="form-group">
                                <label for="hotel_country_add">Country</label><br>
                                <input type="text" class="form-control" name="hotel_country_add">
                            </div>
                            <input name = "add" type = "submit" id = "add" class="btn btn-default"
                                   value = "Add Hotel">
                        </form>
                    <?php } ?>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">

                    <h1>
                        <button type="button" class="btn btn-default" aria-label="Left Align">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        </button>
                        Edit Destinations
                        <button type="button" class="btn btn-default" aria-label="Left Align">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                        </button>
                    </h1>

                    <div id="saveEditsButton">
                        <form action="../../register.php">

                            <div class="form-group">
                                <label for="hotel_name_edit">Hotel name</label><br>
                                <input type="text" class="form-control" name="hotel_name_edit">
                            </div>
                            <div class="form-group">
                                <label for="hotel_website_edit">Website</label><br>
                                <input type="text" class="form-control" name="hotel_website_edit">
                            </div>

                            <div class="form-group">
                                <label for="hotel_street_name_edit">Street name</label><br>
                                <input type="text" class="form-control" name="hotel_street_name_edit">
                            </div>
                            <div class="form-group">
                                <label for="hotel_street_number_edit">Street number</label><br>
                                <input type="text" class="form-control" name="hotel_street_number_edit">
                            </div>

                            <div class="form-group">
                                <label for="hotel_postal_code_edit">Postal Code</label><br>
                                <input type="text" class="form-control" name="hotel_postal_code_edit">
                            </div>
                            <div class="form-group">
                                <label for="hotel_city_edit">City</label><br>
                                <input type="text" class="form-control" name="hotel_city_edit">
                            </div>
                            <div class="form-group">
                                <label for="hotel_country_edit">Country</label><br>
                                <input type="text" class="form-control" name="hotel_country_edit">
                            </div>

                            <button class="btn btn-default" type="submit" value="saveEdits">Änderungen Speichern </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>