<?php
include_once ("../includes/connection/db_connection.php");

if(isset($_POST['action'])) {
    if($_POST['type'] === 'countryRegion') {
        $action = $_POST['action'];

        //$query = "SELECT country_id FROM country c JOIN region r ON r.country_fs=c.country_id WHERE region='". $action . "' LIMIT 1;";
        $query = "SELECT country_fs FROM region WHERE region='". $action . "' LIMIT 1;";


        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            echo $row['country_fs'];
        }
        unset($_POST);
    } else if($_POST['type'] === 'destination') {
        $action = $_POST['action'];

        $query = "SELECT destination, zipCode, country_fs, region_fs, breaks, traffic_jam_surcharge, search_at_place, type_fs, maut_fs FROM destination d
                  WHERE d.destination='$action' LIMIT 1;";


        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        $response = [];

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            $response = [
                'destination' => $row['destination'],
                'zipCode' => $row['zipCode'],
                'country' => $row['country_fs'],
                'region' => $row['region_fs'],
                'breaks' => $row['breaks'],
                'traffic_jam_surcharge' => $row['traffic_jam_surcharge'],
                'search_at_place' => $row['search_at_place'],
                'type' => $row['type_fs'],
                'maut_fs' => $row['maut_fs'],
            ];
        }
        unset($_POST);
        echo json_encode($response);
    } else if($_POST['type'] === "CountryRegionEditCountry") {
        $action = $_POST['action'];

        $query = "SELECT country, short FROM country
                  WHERE country='$action' LIMIT 1;";

        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        $response = [];

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            $response = [
                'country' => $row['country'],
                'short' => $row['short']
            ];
        }
        unset($_POST);

        echo json_encode($response);
    } else if($_POST['type'] === "CountryRegionEditRegion") {
        $action = $_POST['action'];

        $query = "SELECT region, country FROM region
                  JOIN country ON country_id=country_fs
                  WHERE region='$action' LIMIT 1;";

        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        $response = [];

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            $response = [
                'countryName' => $row['country'],
                'regionName' => $row['region']
            ];
        }
        unset($_POST);
        echo json_encode($response);
    } else if($_POST['type'] === "MautEdit") {
        $action = $_POST['action'];

        $query = "SELECT maut_strecke, maut_preis_saison_pw, maut_preis_ohne_saison_pw, maut_preis_saison_bus, 
                    maut_preis_ohne_saison_bus, maut_preis_saison_bus_anhaenger, maut_preis_ohne_saison_bus_anhaenger, maut_bemerkung FROM maut WHERE maut_id = $action";

        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        $response = [];

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            $response = [
                'maut_strecke' => $row['maut_strecke'],
                'maut_preis_saison_pw' => $row['maut_preis_saison_pw'],
                'maut_preis_ohne_saison_pw' => $row['maut_preis_ohne_saison_pw'],
                'maut_preis_saison_bus' => $row['maut_preis_saison_bus'],
                'maut_preis_ohne_saison_bus' => $row['maut_preis_ohne_saison_bus'],
                'maut_preis_saison_bus_anhaenger' => $row['maut_preis_saison_bus_anhaenger'],
                'maut_preis_ohne_saison_bus_anhaenger' => $row['maut_preis_ohne_saison_bus_anhaenger'],
                'maut_bemerkung' => $row['maut_bemerkung']
            ];
        }
        unset($_POST);
        echo json_encode($response);
    } else if ($_POST['type'] === "editDestinationCountrySelectSearch") {
        $action = $_POST['action'];

        $query = "SELECT region_id, region FROM region WHERE country_fs=$action";

        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        $responses = [];

        $response = [];

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            array_push($response, [
                'region_id' => $row['region_id'],
                'region' => $row['region'],
            ]);
        }
        array_push($responses, $response);

        $testVar = $responses[0][0]['region_id'];

        $query1 = "SELECT destination_id, destination FROM destination WHERE region_fs=$testVar;";

        $selectCountryQuery1 = $query1;

        $selectCountryResult1 = mysqli_query($connection, $selectCountryQuery1);

        $response1 = [];

        while ($row = mysqli_fetch_array($selectCountryResult1)) {
            array_push($response1, [
                'destination_id' => $row['destination_id'],
                'destination' => $row['destination'],
            ]);
        }

        array_push($responses, $response1);

        $testVar1 = $responses[1][0]['destination_id'];

        $query2 = "SELECT destination, zipCode, country_fs, region_fs, breaks, traffic_jam_surcharge, search_at_place, type_fs, maut_fs FROM destination d
                  WHERE d.destination_id=$testVar1 LIMIT 1;";

        $selectCountryQuery2 = $query2;

        $selectCountryResult2 = mysqli_query($connection, $selectCountryQuery2);

        $response2 = [];

        while ($row = mysqli_fetch_array($selectCountryResult2)) {
            array_push($response2, [
                'destination' => $row['destination'],
                'zipCode' => $row['zipCode'],
                'country' => $row['country_fs'],
                'region' => $row['region_fs'],
                'breaks' => $row['breaks'],
                'traffic_jam_surcharge' => $row['traffic_jam_surcharge'],
                'search_at_place' => $row['search_at_place'],
                'type' => $row['type_fs'],
                'maut_fs' => $row['maut_fs'],
            ]);
        }

        array_push($responses, $response2);

        echo json_encode($responses);
    } else if ($_POST['type'] === "editDestinationRegionSelectSearch") {
        $action = $_POST['action'];

        $query = "SELECT destination_id, destination FROM destination WHERE region_fs=$action";

        $selectCountryQuery = $query;

        $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

        $responses = [];

        $response = [];

        while ($row = mysqli_fetch_array($selectCountryResult)) {
            array_push($response, [
                'destination_id' => $row['destination_id'],
                'destination' => $row['destination'],
            ]);
        }

        array_push($responses, $response);

        $testVar1 = $responses[0][0]['destination_id'];

        $query2 = "SELECT destination, zipCode, country_fs, region_fs, breaks, traffic_jam_surcharge, search_at_place, type_fs, maut_fs FROM destination d
                  WHERE d.destination_id=$testVar1 LIMIT 1;";

        $selectCountryQuery2 = $query2;

        $selectCountryResult2 = mysqli_query($connection, $selectCountryQuery2);

        $response2 = [];

        while ($row = mysqli_fetch_array($selectCountryResult2)) {
            array_push($response2, [
                'destination' => $row['destination'],
                'zipCode' => $row['zipCode'],
                'country' => $row['country_fs'],
                'region' => $row['region_fs'],
                'breaks' => $row['breaks'],
                'traffic_jam_surcharge' => $row['traffic_jam_surcharge'],
                'search_at_place' => $row['search_at_place'],
                'type' => $row['type_fs'],
                'maut_fs' => $row['maut_fs'],
            ]);
        }

        array_push($responses, $response2);

        echo json_encode($responses);
    } else if($_POST['type'] === "updateMaut") {
        $action = $_POST['action'];
        $route = $_POST['maut_strecke'];
        $priceWSeason = $_POST['preis_saison_pw'];
        $priceWOSeason = $_POST['preis_ohne_saison_pw'];
        $priceWSeasonBus = $_POST['preis_saison_bus'];
        $priceWOSeasonBus = $_POST['preis_ohne_saison_bus'];
        $priceWSeasonBusTrailer = $_POST['preis_saison_bus_anhaenger'];
        $priceWOSeasonBusTrailer = $_POST['preis_ohne_saison_bus_anhaenger'];
        $notice = $_POST['bemerkung'];

        $query = "UPDATE 
                      maut 
                  SET 
                      maut_strecke='$route',
                      maut_preis_saison_pw='$priceWSeason',  
                      maut_preis_ohne_saison_pw='$priceWOSeason', 
                      maut_preis_saison_bus='$priceWSeasonBus', 
                      maut_preis_ohne_saison_bus='$priceWOSeasonBus', 
                      maut_preis_saison_bus_anhaenger='$priceWSeasonBusTrailer', 
                      maut_preis_ohne_saison_bus_anhaenger='$priceWOSeasonBusTrailer', 
                      maut_bemerkung='$notice' 
                  WHERE 
                      maut_id = $action";

        $selectCountryQuery = $query;

        if (mysqli_query($connection, $selectCountryQuery) === TRUE) {
            $response = "Record updated successfully";
        } else {
            $response = "Error updating record: " . $connection->error;
        }
        echo json_encode($response);
        unset($_POST);

    }

    unset($_POST);
}