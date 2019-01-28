<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

// Both actions will require the ID so leave it out of the conditional
$eventId = filter_var($_POST['eventId'], FILTER_VALIDATE_INT);

if (isset($_POST['delete'])){
    $_SESSION['action'] = 'delete';

    // Delete the event
    $sqlQuery = 'DELETE FROM events WHERE id = ' . $eventId;
    $result = $mysqli->query($sqlQuery);

    // Send a banner alert back to the user
    if ($result == true){
        $_SESSION['alert'] = 'success';
    } else {
        $_SESSION['alert'] = 'error';
    }

    header('Location: /admin/events');
    die();

} else if (isset($_POST['update'])){
    $_SESSION['action'] = 'update';

    $eventTitle = addslashes($_POST['eventName']);
    $eventDesc = addslashes($_POST['eventDesc']);
    $eventDate = date("Y-m-d", strtotime($_POST['eventDate']));
    $eventStartTime = date('H:i:s', strtotime($_POST['startTime']));
    $eventEndTime = date('H:i:s', strtotime($_POST['endTime']));

    $eventsData = array(
        'event_name' => $eventTitle,
        'event_desc' => $eventDesc,
        'event_date' => $eventDate,
        'start_time' => $eventStartTime,
        'end_time'   => $eventEndTime
    );

    if (!empty($_POST['registrationLink'])){
        $registrationLink = $_POST['registrationLink'];
    
        $url = $mysqli->real_escape_string($registrationLink);

        $eventsData['registration_url'] = $url;
    }
    
    if ((!empty($_FILES['bannerImage']['name'])) && (isset($_FILES['bannerImage']['tmp_name']))){
        $fileName = $_FILES['bannerImage']['name'];
        $fileSize = $_FILES['bannerImage']['size'];
        $fileType = $_FILES['bannerImage']['type'];
        $fileTmp = $_FILES['bannerImage']['tmp_name'];

        $directoryToUpload = $_SERVER['DOCUMENT_ROOT'] . '/img/events/banners/' . $eventId . '/';
        $directoryToUploadWithFileName = $directoryToUpload . $fileName;
        $pathForFrontEnd = '/img/events/banners/' . $eventId . '/' . $fileName;

        if (!is_dir($directoryToUpload)){
            mkdir($directoryToUpload, 0777, true);
        }
        move_uploaded_file($fileTmp, $directoryToUploadWithFileName);

        $eventsData['banner_path'] = $pathForFrontEnd;
    }
    
    $sqlQuery = "UPDATE events SET ";
    foreach ($eventsData as $databaseField => $databaseValue){
        if (!empty($databaseValue)){
            $sqlQuery .= $databaseField . " = '" . addslashes($databaseValue) . "', ";
        }
    }
    $sqlQuery = substr($sqlQuery, 0, strlen($sqlQuery) - 2);
    $sqlQuery .= " WHERE id = $eventId;";
    $result = $mysqli->query($sqlQuery);

    if ($result == true){
        $_SESSION['alert'] = 'success';
    } else {
        $_SESSION['alert'] = 'error';
    }

    header('Location: /admin/editevent/' . $eventId);
    die();
}
?>