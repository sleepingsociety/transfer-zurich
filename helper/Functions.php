<?php
include_once ("../includes/connection/db_connection.php");

if(isset($_POST['action'])) {
    $action = $_POST['action'];

    //$query = "SELECT country_id FROM country c JOIN region r ON r.country_fs=c.country_id WHERE region='". $action . "' LIMIT 1;";
    $query = "SELECT country_fs FROM region WHERE region='". $action . "' LIMIT 1;";


    $selectCountryQuery = $query;

    $selectCountryResult = mysqli_query($connection, $selectCountryQuery);

    while ($row = mysqli_fetch_array($selectCountryResult)) {
        echo $row['country_fs'];
    }
}