<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

$eventTitle = $_POST['eventName'];
$eventDesc = $_POST['eventDesc'];
$eventDate = date("Y-m-d", strtotime($_POST['eventDate']));
$eventStartTime = date('H:i:s', strtotime($_POST['startTime']));
$eventEndTime = date('H:i:s', strtotime($_POST['endTime']));

$fileName = $_FILES['bannerImage']['name'];
$fileType = $_FILES['bannerImage']['type'];
$fileSize = $_FILES['bannerImage']['size'];
// Temporary Location
$fileTmp = $_FILES['bannerImage']['tmp_name'];
$fileError = $_FILES['bannerImage']['error'];

$directoryToUpload = $_SERVER['DOCUMENT_ROOT'] . '/img/events/banners/' . $eventId . '/';
$directoryToUploadWithFileName = $directoryToUpload . $fileName;

$registrationLink = $_POST['registrationLink'];

$url = $mysqli->real_escape_string($registrationLink);

if ($fileError === 0){
    die();
} else {
    // Perform upload

    if (!is_dir($directoryToUpload)){
        mkdir($directoryToUpload, 0777, true);
    }
    move_uploaded_file($fileTmp, $directoryToUploadWithFileName);
}

// $sqlQuery = "CALL spInsertNewEvent('" . addslashes($eventTitle) . "', '" . addslashes($eventDesc) . "', '" . $eventDate . "', '" . $eventStartTime . "', '" . $eventEndTime . "');";

$sqlQuery = "INSERT INTO events (event_name, event_desc, event_date, start_time, end_time, created_date, banner_path, registration_url)";
$sqlQuery .= "VALUES ('" . addslashes($eventTitle) . "', '" . addslashes($eventDesc) . "', '" . addslashes($eventDate) . "', '" . addslashes($eventStartTime) . "', '" . addslashes($eventEndTime) . "', NOW()), '" . addslashes($directoryToUploadWithFileName) . "', '" . $registrationLink . "';";


$result = $mysqli->query($sqlQuery);

if ($result == true){
    header('Location: /admin/events.php');
    die();
} else {
    header('Location: /admin/events.php');
    die();
}


?>