<?php
include_once ("./includes/connection/db_connection.php");



$wholeEmail = array();

//echo $wholeEmail[0];

$contractor = "";
$project_number;
$lead_passenger;
$datum;
$transfer_type;
$special_needs;
$phone_passenger;
$comments;
$accept_link;
$decline_link;

$number_passengers;
$baby_passengers;
$toddler_passengers;
$kid_passengers;

$origin;
$pickup_time;
$destination;
$landing_takeoff_time;

$suitcase_big;
$suitcase_medium;
$suitcase_small;
$ski_snowboard;
$other_luggage;

$flight_from_to;
$flightnumber;
$terminal;

$allContractors = Array();
$i = 0;
$wholeEmail = $_POST["email_subject"] . "\n" . explode("\n", $_POST["emailInsertWindow"]);

$sql = "SELECT contractor FROM task_entry";
$result = $connection->query($sql);

while($row = mysqli_fetch_assoc($result)) {
    $temp = preg_replace('/\s+/', '', $row['contractor']);
    $allContractors[$i] = $temp;
}

$arrayTest = array();

//Look for the Contractor of the Mail
foreach ($allContractors as $con){
    foreach ($wholeEmail as $row){
        if(strpos($row, $con)){
            //If Contractor was found, it will be saved under $contractor for further use
            $contractor = $con;
        }
    }
}

//if a contractor was found, the rest of the data needed will be selected here
if($contractor != ""){
   $sql = "SELECT project_number, lead_passenger, datum, transfer_type, special_needs, phone_passenger, comments, accept_link, decline_link,
            origin, pickup_time, destination, landing_takeoff_time,
            number_passengers, baby_passengers, toddler_passengers, kid_passengers,
            suitcase_big, suitcase_medium, suitcase_small, ski_snowboard, other_luggage,
            flight_from_to, flightnumber, terminal FROM task_entry
            WHERE contractor = '$contractor';";


    $result = $connection->query($sql);

    while($row = mysqli_fetch_assoc($result)) {
        $project_number = $row['project_number'];
        $lead_passenger = $row['lead_passenger'];
        $datum = $row['datum'];
        $transfer_type = $row['transfer_type'];
        $special_needs = $row['special_needs'];
        $phone_passenger = $row['phone_passenger'];
        $comments = $row['comments'];
        $accept_link = $row['accept_link'];
        $decline_link = $row['decline_link'];

        $number_passengers = $row['number_passengers'];
        $baby_passengers = $row['baby_passengers'];
        $toddler_passengers = $row['toddler_passengers'];
        $kid_passengers = $row['kid_passengers'];

        $origin = $row['origin'];
        $pickup_time = $row['pickup_time'];
        $destination = $row['destination'];
        $landing_takeoff_time = $row['landing_takeoff_time'];

        $suitcase_big = $row['suitcase_big'];
        $suitcase_medium = $row['suitcase_medium'];
        $suitcase_small = $row['suitcase_small'];
        $ski_snowboard = $row['ski_snowboard'];
        $other_luggage = $row['other_luggage'];

        $flight_from_to = $row['flight_from_to'];
        $flightnumber = $row['flightnumber'];
        $terminal = $row['terminal'];
    }

    $tempValue = "";

    foreach($wholeEmail as $row){
//        if(strpos($row, $project_number) !== false){
//            $tempValue = substr($row, strpos($row, ":") + 1);
//            $tempValue = preg_replace('/\s+/', '', $tempValue);
//            $_SESSION["project_number"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
//        }
        if(strpos($row, "Booking ") !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $_SESSION["project_number"] = $tempValue;
        }
        if(strpos($row, $accept_link) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $_SESSION["accept_link"] = $tempValue;
        }
        if(strpos($row, $decline_link) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $_SESSION["decline_link"] = $tempValue;
        }
        if(strpos($row, $lead_passenger) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["lead_passenger"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $datum) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["datum"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $transfer_type) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["transfer_type"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $special_needs) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["special_needs"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $phone_passenger) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["phone_passenger"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $comments) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["comments"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }

        if(stripos($row, $number_passengers) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["number_passengers"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $baby_passengers) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["baby_passengers"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $toddler_passengers) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["toddler_passengers"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $kid_passengers) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["kid_passengers"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }

        if(stripos($row, $origin) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["origin"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $pickup_time) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["pickup_time"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $destination) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["destination"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $landing_takeoff_time) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["take_off_timne"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }

        if(stripos($row, $suitcase_big) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["suitcase_big"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $suitcase_medium) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["suitcase_medium"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $suitcase_small) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["suitcase_small"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $ski_snowboard) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["ski_snowboard"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $other_luggage) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["other_luggage"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }

        if(stripos($row, $flight_from_to) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["flight_from_to"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $flightnumber) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["flightnumber"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
        if(stripos($row, $terminal) !== false){
            $tempValue = substr($row, strpos($row, ":") + 1);
            $tempValue = preg_replace('/\s+/', '', $tempValue);
            $_SESSION["terminal"] = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $tempValue));
        }
    }


}

header("location: /taskEntry.php");

?>

