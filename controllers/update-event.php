<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

$eventId = filter_var($_POST['eventId'], FILTER_VALIDATE_INT);
$eventTitle = addslashes($_POST['eventName']);
$eventDesc = addslashes($_POST['eventDesc']);
$eventDate = date("Y-m-d", strtotime($_POST['eventDate']));
$eventStartTime = date('H:i:s', strtotime($_POST['startTime']));
$eventEndTime = date('H:i:s', strtotime($_POST['endTime']));

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

// $sqlQuery = "CALL spUpdateEventDetails($eventId, '" . addslashes($eventTitle) . "', '" . addslashes($eventDesc) . "', '" . $eventDate . "', '" . $eventStartTime . "', '" . $eventEndTime . "');";

$directoryToUploadWithFileName = addslashes($directoryToUploadWithFileName);
$sqlQuery = "UPDATE events SET event_name = '$eventTitle', event_desc = '$eventDesc', event_date = '$eventDate', start_time = '$eventStartTime', end_time = '$eventEndTime', updated_date = NOW(), registration_url = '$registrationLink', banner_path = '$directoryToUploadWithFileName'";
$sqlQuery .= " WHERE id = $eventId;";
echo $sqlQuery;
// $result = $mysqli->query($sqlQuery);

// if ($result == true){
//     header('Location: /admin/events.php');
//     die();
// } else {
//     header('Location: /admin/events.php');
//     die();
// }


?>