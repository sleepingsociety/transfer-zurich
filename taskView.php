<html>

<head>
    <meta charset="UTF-8">
    <title>Transfer-Zurich</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="javascript/loginPage.js" type="text/javascript"></script>

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
        </div>

        <h2>Title</h2>
    <div class="form">
        <div class="container">
            <form>
                <div class="form-header">
                    <div class="form-inline">

                        <div class="form-group">
                            <label for="projectnumber">Project Nummer:</label><br>
                            <input type="text" class="form-control" id="projectnumber" placeholder="ZH-443">
                        </div>
                        <div class="form-group">
                            <label for="lead-passenger">Lead Passenger:</label><br>
                            <input type="text" class="form-control" id="lead-passenger" placeholder="Tim Tester">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label><br>
                            <input type="text" class="form-control" id="date" placeholder="27.10.2016">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label><br>
                            <input type="text" class="form-control" id="time" placeholder="16:30">
                        </div>
                        <div class="form-group padding-bottom">
                            <div class="btn-toolbar" role="toolbar" aria-label="nav-buttons">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default" aria-label="nav-left">
                                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default" aria-label="nav-right">
                                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="origin">Origin:</label>
                            <input type="text" class="form-control" id="origin" placeholder="Zurich Airport">

                            <label class="sr-only" for="origin-address">Origin-Address</label>
                            <textarea class="form-control" rows="3" id="origin-address"
                                      placeholder="Zurich Airport"></textarea>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="pick-up-time">Pick Up Time</label>
                                <input type="text" class="form-control" id="pick-up-time" placeholder="16:20">
                            </div>
                            <div class="form-group">
                                <label for="flight-from-to">Flight from to</label>
                                <input type="text" class="form-control" id="flight-from-to" placeholder="NYC / ZRH">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="transfer-type">Transfer-Type</label>
                            <input type="text" class="form-control" id="transfer-type" placeholder="Credit Card">
                        </div>
                        <div class="form-group">
                            <label for="special-needs">Special Needs</label>
                            <input type="text" class="form-control" id="special-needs" placeholder="Water">
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="number-passengers">Number of Passengers</label>
                                <input type="text" class="form-control" id="number-passengers" placeholder="2">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="number-baby">Number of Babys</label>
                                <input type="text" class="form-control" id="number-baby" placeholder="0">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="number-toddlers">Number of Toddlers</label>
                                <input type="text" class="form-control" id="number-toddlers" placeholder="0">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="number-kids">Number of Kids</label>
                                <input type="text" class="form-control" id="number-kids" placeholder="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="driver">Driver</label>
                            <input type="text" class="form-control" id="driver" placeholder="Max Muster">
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="vehicle-type">Vehicle Type</label><br>
                                <input type="text" class="form-control" id="vehicle-type" placeholder="VIP">
                            </div>
                            <div class="form-group">
                                <label for="trailer">Trailer</label><br>
                                <input type="text" class="form-control" id="trailer" placeholder="No">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" class="form-control" id="destination" placeholder="Wiedikon">

                            <label class="sr-only" for="destination-address">Destination-Address</label>
                            <textarea class="form-control" rows="3" id="destination-address"
                                      placeholder="Origin-address"></textarea>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="take-off">Take Off</label>
                                <input type="text" class="form-control" id="take-off" placeholder="19:11">
                            </div>
                            <div class="form-group">
                                <label for="flight-number">Flightnumber</label>
                                <input type="text" class="form-control" id="flight-number" placeholder="H4R4MB3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="terminal">Terminal</label>
                            <input type="text" class="form-control" id="terminal" placeholder="AP15">
                        </div>
                        <div class="form-group">
                            <label for="phone-passenger">Phone Passenger</label>
                            <input type="text" class="form-control" id="phone-passenger" placeholder="+1223412134">

                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="suitcase-big">Suitcase Big</label>
                                <input type="text" class="form-control" id="suitcase-big" placeholder="1">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="suitcase-medium">Suitcase Medium</label>
                                <input type="text" class="form-control" id="suitcase-medium" placeholder="2">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="suitcase-small">Suitcase Small</label>
                                <input type="text" class="form-control" id="suitcase-small" placeholder="0">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="ski-snowboard">Ski / Snowboard</label>
                                <input type="text" class="form-control" id="ski-snowboard" placeholder="3">
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="other-luggage">Other Luggage</label>
                                <input type="text" class="form-control" id="other-luggage" placeholder="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comments</label>
                            <textarea class="form-control" rows="3" id="comment" placeholder="comment"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="license-plate">License Plate</label>
                            <input type="text" class="form-control" id="license-plate" placeholder="ZH-123-321">
                        </div>
                    </div>
                </div>
                <input class="position btn btn-default" type="button" value="Input">
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
