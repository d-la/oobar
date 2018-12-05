<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

$imageName = $_POST['imageName'];
$imageDesc = $_POST['imageDesc'];

$fileName = $_FILES['galleryImage']['name'];
$fileType = $_FILES['galleryImage']['type'];
$fileSize = $_FILES['galleryImage']['size'];
// Temporary Location
$fileTmp = $_FILES['galleryImage']['tmp_name'];
$fileError = $_FILES['galleryImage']['error'];
$registrationLink = $_POST['registrationLink'];

// Get the file extension
$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

$sqlQuery = "INSERT INTO events (name, desc, path, create_date)";
$sqlQuery .= "VALUES ('" . addslashes($imageName) . "', '" . addslashes($imageDesc) . "', '" . addslashes($pathToBeSaved) . "', NOW());";

$result = $mysqli->query($sqlQuery);

// Full directory to upload
$directoryToUpload = $_SERVER['DOCUMENT_ROOT'] . '/img/gallery/';

// Path that will pull the file on front end
$basePathForFrontEnd = '/img/events/banners/';

$pathToBeSaved = $basePathForFrontEnd . $fileName;

$directoryToUploadWithFileName = $directoryToUpload . $fileName;

if (file_exists($directoryToUploadWithFileName)){
    $_SESSION['alert'] = 'file error';
    header('Location: /admin/gallery.php');
    die();
} else if (!file_exists($directoryToUploadWithFileName) && ($result)) {
    // Perform upload
    $fileStatus = move_uploaded_file($fileTmp, $directoryToUploadWithFileName);

    if ($fileStatus){
        $_SESSION['alert'] = 'success';
        header('Location: /admin/gallery.php');
        die();
    } else {
        $_SESSION['alert'] = 'error';
        header('Location: /admin/gallery.php');
        die();
    }
}


?>