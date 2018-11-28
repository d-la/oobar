<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
$mysqli = initializeMysqlConnection();

$eventTitle = $_POST['eventName'];
$eventDesc = $_POST['eventDesc'];
$eventDate = date("Y-m-d", strtotime($_POST['eventDate']));
$eventStartTime = date('H:i:s', strtotime($_POST['startTime']));
$eventEndTime = date('H:i:s', strtotime($_POST['endTime']));

$sqlQuery = "CALL spInsertNewEvent('" . addslashes($eventTitle) . "', '" . addslashes($eventDesc) . "', '" . $eventDate . "', '" . $eventStartTime . "', '" . $eventEndTime . "');";

$result = $mysqli->query($sqlQuery);

if ($result == true){
    header('Location: /admin/events.php');
    die();
} else {
    header('Location: /admin/events.php');
    die();
}


?>