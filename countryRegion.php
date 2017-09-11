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

            <div class="col-md-6">
                <?php

                if (isset($_POST["saveCountry"])) {

                    if (!get_magic_quotes_gpc()) {

                        $country = addslashes($_POST["country"]);
                        $short = addslashes($_POST["short"]);

                    } else {
                        $country = $_POST["country"];
                        $short = $_POST["short"];
                    }

                    $sqlCountry = "INSERT INTO country (country, short) VALUES ('$country', '$short')";


                    mysqli_select_db($connection, $dbname);

                    $retval = mysqli_query($connection, $sqlCountry);

                    if (!$retval) {
                        die('could not enter date: ' . mysqli_error($connection));
                    }

                    echo "Entered data successfully\n";

                }
                ?>

                <h1>Add new Country</h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="country">Land</label><br>
                            <input type="text" class="form-control" name="country">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="short">Kürzel</label><br>
                            <input type="text" class="form-control" name="short">
                        </div>
                    </div>
                    <button name="saveCountry" class="btn btn-default" type="submit" value="saveCountry">Speichern
                    </button>

                </form>

            </div>

            <?php
            // SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.
            $getCountryId = "SELECT country_id, country FROM country";
            $getCountryIdResult = mysqli_query($connection, $getCountryId) or die (mysqli_error($connection));
            ?>

            <div class="col-md-6">
                <h1>Edit Countrys</h1>

                <?php

                if (isset($_POST["saveCountryEdits"])) {

                    if (!get_magic_quotes_gpc()) {

                        $country_ID = addslashes($_POST["country_id"]);

                    } else {
                        $country_ID = $_POST["country_id"];
                    }

                }
                ?>

                <form method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?> ">

                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="country">ID</label><br>
                            <select class="form-control" name="country_id">
                                <?php
                                while ($row = mysqli_fetch_array($getCountryIdResult)) {
                                    echo "<option value=" . $row['country_id'] . ">" . $row['country'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div id="confirmCountryButton" class="form-group col-sm-4 col-md-4 col-lg-4">
                            <button name="saveCountryEdits" class="btn btn-default" type="submit" value="saveEdits">
                                Auswählen
                            </button>
                        </div>

                    </div>


                </form>
                <?php
                $getCountryAndShort = "SELECT country, short FROM country WHERE country_id = $country_ID";
                $getCountryAndShortResult = mysqli_query($connection, $getCountryAndShort) or die (mysqli_error($connection));

                while ($row = mysqli_fetch_array($getCountryAndShortResult)) {
                    ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <div class="row">
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="countryEdit">Land</label><br>
                                <input type="text" value="<?php echo $row['country']; ?>" class="form-control"
                                       name="countryEdit">
                            </div>

                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="shortEdit">Kürzel</label><br>
                                <input type="text" value="<?php echo $row['short']; ?>" class="form-control"
                                       name="shortEdit">
                            </div>
                        </div>
                        <div id="saveEditsButton">
                            <button name="saveCountryEdits" class="btn btn-default" type="submit" value="saveEdits">
                                Speichern
                            </button>
                        </div
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

        <div class="pageContent row">
            <div class="col-md-6">
                <h1>Add new Region</h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="region">Region</label><br>
                            <input type="text" class="form-control" name="region">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">

                            <label for="country">Land</label><br>
                            <select class="form-control" name="country_fs">
                                <?php
                                $selectCountryQuery = "SELECT country_id, country FROM country";

                                $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

                                while ($selectCountryRow = mysqli_fetch_array($selectCountryResult)) {
                                    echo "<option value=" . $selectCountryRow['country_id'] . ">" . $selectCountryRow['country'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="saveEditsButton">
                        <button name="saveRegions" class="btn btn-default" type="submit" value="saveEdits">Speichern
                        </button>
                    </div>

                </form>
            </div>


            <!--
            SQL for Getting Data from DB & Put it in Form, & Update it when saved etc.

            -->

            <div class="col-md-6 col-sm-6 col-lg-6">
                <h1>Edit Regions</h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">
                            <label for="region">Region</label><br>
                            <input type="text" class="form-control" name="region">
                        </div>
                        <div class="form-group col-sm-4 col-md-4 col-lg-4">

                            <label for="country">Land</label><br>
                            <select class="form-control" name="country">
                                <?php
                                $selectCountryQuery = "SELECT country_id, country FROM country";

                                $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

                                while ($selectCountryRow = mysqli_fetch_array($selectCountryResult)) {
                                    echo "<option value=" . $selectCountryRow['country_id'] . ">" . $selectCountryRow['country'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="saveEditsButton">
                        <button name="saveRegionEdits" class="btn btn-default" type="submit" value="saveEdits">
                            Speichern
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
</body>
</html>