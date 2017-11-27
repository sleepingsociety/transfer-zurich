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
    } else if($_POST['type'] === 'destination') {
        $action = $_POST['action'];

        //$query = "SELECT country_id FROM country c JOIN region r ON r.country_fs=c.country_id WHERE region='". $action . "' LIMIT 1;";
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

        echo json_encode($response);
    }

}