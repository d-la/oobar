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

if ((isset($fileName)) && (!empty($fileName))){

    $directoryToUploadWithFileName = '/img/gallery/' . $fileName;

    if (file_exists($directoryToUploadWithFileName)){
        $_SESSION['img_name'] = true;
        $_SESSION['alert'] = 'error';
        header('Location: /admin/gallery.php');
        die();
    } else if (!file_exists($directoryToUploadWithFileName)) {
        // Perform upload
        $fileStatus = move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'] . $directoryToUploadWithFileName);

        if ($fileStatus){

            $sqlQuery = "INSERT INTO gallery_images (`name`, description, path, create_date)";
            $sqlQuery .= " VALUES ('" . addslashes($imageName) . "', '" . addslashes($imageDesc) . "', '" . addslashes($directoryToUploadWithFileName) . "', NOW());";
            $result = $mysqli->query($sqlQuery);
            error_log($mysqli->error);

            if ($result == true){
                $_SESSION['alert'] = 'success';
                header('Location: /admin/gallery.php');
                die();
            } else {
                $_SESSION['alert'] = 'error';
                header('Location: /admin/gallery.php');
                die();
            }
        } else {
            $_SESSION['alert'] = 'error';
            header('Location: /admin/gallery.php');
            die();
        }
    }
}

?>