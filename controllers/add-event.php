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
$registrationLink = $_POST['registrationLink'];

// Get the file extension
$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

// Generate random file name since we're storing on our server and not an external instance
$randomFileName = 'event_banner_' . rand(0, 10000) . '.' . strtolower($fileExtension);

// Full directory to upload
$directoryToUpload = $_SERVER['DOCUMENT_ROOT'] . '/img/events/banners/';

// Path that will pull the file on front end
$basePathForFrontEnd = '/img/events/banners/';


$pathToBeSaved = $basePathForFrontEnd . $randomFileName;

$directoryToUploadWithFileName = $directoryToUpload . $randomFileName;

$url = $mysqli->real_escape_string($registrationLink);

if (file_exists($directoryToUploadWithFileName)){
    
    $uploadPath = returnRandomFileName($directoryToUpload, $fileExtension);
    $fileStatus = move_uploaded_file($fileTmp, $uploadPath);

    $pathToBeSaved = $basePathForFrontEnd . basename($uploadPath);

    if ($fileStatus){
        $_SESSION['alert'] = 'file success';
    } else {
        $_SESSION['alert'] = 'file error';
    }
} else {
    // Perform upload
    $fileStatus = move_uploaded_file($fileTmp, $directoryToUploadWithFileName);

    if ($fileStatus){
        $_SESSION['alert'] = 'file success';
    } else {
        $_SESSION['alert'] = 'file error';
    }
}

// $sqlQuery = "CALL spInsertNewEvent('" . addslashes($eventTitle) . "', '" . addslashes($eventDesc) . "', '" . $eventDate . "', '" . $eventStartTime . "', '" . $eventEndTime . "');";

$sqlQuery = "INSERT INTO events (event_name, event_desc, event_date, start_time, end_time, created_date, banner_path, registration_url)";
$sqlQuery .= "VALUES ('" . addslashes($eventTitle) . "', '" . addslashes($eventDesc) . "', '" . addslashes($eventDate) . "', '" . addslashes($eventStartTime) . "', '" . addslashes($eventEndTime) . "', NOW(), '" . addslashes($pathToBeSaved) . "', '" . $registrationLink . "');";

$result = $mysqli->query($sqlQuery);

if ($result == true){
    $_SESSION['alert'] = 'success';
    header('Location: /admin/events.php');
    die();
} else {
    $_SESSION['alert'] = 'error';
    header('Location: /admin/events.php');
    die();
}

function returnRandomFileName($directoryToUpload, $fileExtension){
    $randomFileName = 'event_banner_' . rand(0, 10000) . '.' . strtolower($fileExtension);
    $newUploadPath = $directoryToUpload . $randomFileName;

    if (file_exists($newUploadPath)){
        return returnRandomFileName($directoryToUpload, $fileExtension);
    } else {
        return $newUploadPath;
    }
}


?>