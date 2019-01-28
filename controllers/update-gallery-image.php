<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

$galleryImageId = $_POST['galleryImageId'];
$galleryImageName = $_POST['galleryImageName'];
$galleryImageDesc = $_POST['galleryImageDesc'];
$newGalleryImageName = $_FILES['newGalleryImage']['name'];

if (isset($_POST['update'])){
    // Handle updating the image
    if ((is_numeric($galleryImageId)) && (isset($galleryImageId))){
        // If a new gallery image is provided, update all fields for the current gallery image, otherwise just update what's provided
        if (!empty($newGalleryImageName)){
            $galleryImageType = $_FILES['newGalleryImage']['type'];
            $galleryImageSize = $_FILES['newGalleryImage']['size'];
            // Temporary Location
            $galleryImageLocation = $_FILES['newGalleryImage']['tmp_name'];
    
            $directoryToUploadWithFileName = '/img/gallery/' . $newGalleryImageName;
    
            if (file_exists($directoryToUploadWithFileName)){
                $_SESSION['editGalleryIssue'] = 'File name exists';
                $_SESSION['alert'] = 'error';
                header('Location: /admin/gallery');
                die();
            } else if (!file_exists($directoryToUploadWithFileName)) {
                $fileStatus = move_uploaded_file($galleryImageLocation, $_SERVER['DOCUMENT_ROOT'] . $directoryToUploadWithFileName);
    
                if ($fileStatus === true){
                    // The upload was successfull
                    $sqlQuery = "UPDATE gallery_images SET `name` = '" . addslashes($galleryImageName) . "', description = '" . addslashes($galleryImageDesc) . "', path = '" . addslashes($directoryToUploadWithFileName) . "' WHERE id = " . $galleryImageId . ";";
                    $result = $mysqli->query($sqlQuery);
                    error_log($mysqli->error);
    
                    if ($result == true){
                        $_SESSION['alert'] = 'success';
                    } else {
                        $_SESSION['editGalleryIssue'] = 'Database Query';
                        $_SESSION['alert'] = 'error';
                    }
                } else {
                    $_SESSION['alert'] = 'error';
                }
            }
    
        } else {
            $sqlQuery = "UPDATE gallery_images SET `name` = '" . addslashes($galleryImageName) . "', description = '" . addslashes($galleryImageDesc) . "' WHERE id = " . $galleryImageId . ";";
            $result = $mysqli->query($sqlQuery);
            error_log($mysqli->error);
            if ($result == true){
                $_SESSION['alert'] = 'success';
            } else {
                $_SESSION['editGalleryIssue'] = 'Database Query';
                $_SESSION['alert'] = 'error';
            }
        }
    }

    header('Location: /admin/editgallery/' . $galleryImageId);
    die();
} else if (isset($_POST['delete'])){
    // Handle deleting the image
    $_SESSION['galleryController'] = 'delete';
    if ((is_numeric($galleryImageId)) && (isset($galleryImageId))){
        $sqlQuery = 'DELETE FROM gallery_images WHERE id = ' . $galleryImageId;
        $result = $mysqli->query($sqlQuery);
        if ($result == true){
            $_SESSION['alert'] = 'success';
            header('Location: /admin/gallery');
            die();
        } else {
            $_SESSION['alert'] = 'error';
            header('Location: /admin/editgallery/' . $galleryImageId);
            die();
        }
    }
}

?>