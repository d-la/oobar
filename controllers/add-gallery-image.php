<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

// $imageName = $_POST['imageName'];
$imageDesc = $_POST['imageDesc'];

// Get the total image count 
$totalImageCount = count($_FILES['galleryImage']['name']);

// TODO: Refactor
if ($totalImageCount > 0){
    for ($i = 0; $i < $totalImageCount; $i++){
        // Assign image name so we can assign the index per image being uploaded
        $imageName = $_POST['imageName'];
        $fileName = $_FILES['galleryImage']['name'][$i];
        $fileType = $_FILES['galleryImage']['type'][$i];
        $fileSize = $_FILES['galleryImage']['size'][$i];
        // Temporary Location
        $fileTmp = $_FILES['galleryImage']['tmp_name'][$i];

        // Add the index of the file to prevent sql errors when uploading multiple files
        $filePath = pathinfo($fileName, PATHINFO_EXTENSION);
        $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);

        $fileName = $actualFileName . $i . '.' . strtolower($filePath);

        // Add indicator to imageName to prevent sql errors when uploding multiple files
        $imageName = $imageName . '-' . $i;

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
                    } else {
                        $_SESSION['alert'] = 'error';
                    }
                } else {
                    $_SESSION['alert'] = 'error';
                }
            }
        }
    }
}

header('Location: /admin/gallery.php');
die();

?>