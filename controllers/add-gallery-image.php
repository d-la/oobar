<?php 
// require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Gallery.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
$mysqli = initializeMysqlConnection();

// Placeholder array that will hold the names of images that exist, to be returned to the client side UI, if any
$existingImageNames = array();

$imageDesc = $_POST['imageDesc'];

// Get the total image count 
$totalImageCount = count($_FILES['galleryImage']['name']);

$galleryImage = new Gallery();

if ($totalImageCount > 0){
    for ($i = 0; $i < $totalImageCount; $i++){
        // User assigned name for the name
        $imageName = $_POST['imageName'];

        // Actual file data
        $fileName = $_FILES['galleryImage']['name'][$i];
        $fileType = $_FILES['galleryImage']['type'][$i];
        $fileSize = $_FILES['galleryImage']['size'][$i];
        $fileTmp = $_FILES['galleryImage']['tmp_name'][$i];

        // When uploading multiple files, we only have 1 image name and description input for multiple uploads.
        // To prevent SQL errors (unique names), append the current index to each file name and image name before
        // they get inserted into the database
        if ($totalImageCount > 1){
            $fileExtension = strtolower($galleryImage->returnImageExtension($fileName));
            $fileNameWithoutExtension = $galleryImage->returnImageNameWithoutExtension($fileName);

            $fileName = $fileNameWithoutExtension . $i . '.' . $fileExtension;
            $imageName = $imageName . $i;
        }

        if (!empty($fileName)){
            $directoryToUploadWithFileName = '/img/gallery/' . $fileName;

            // Check if the file already exists. We can't have duplicates
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $directoryToUploadWithFileName)){
                $_SESSION['alert'] = 'warning';
                $_SESSION['img_name'] = true;

                // Add the current file name to placeholder array so the user will see which files already exist in our server
                $existingImageNames[] = $fileName;
                $_SESSION['existingGalleryImageFiles'] = $existingImageNames;

                if ($totalImageCount > 1){
                    // If we're uploading more than 1 image, break the current loop index and move to the next image upload
                    break;
                } else {
                    error_log('File already exists for file ' . $fileName);
                    // If theres only 1 image to upload, kill the script and bring the user back to the gallery page
                    header('Location: /admin/gallery');
                    die();
                }   
            } else {
                // The image does not exist in our server. Perform upload and database insertion

                $fileUploadStatus = move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'] . $directoryToUploadWithFileName);

                if ($fileUploadStatus === true){
                    // File upload successful
                    $galleryImage->setImageName($imageName);
                    $galleryImage->setImageDescription($imageDesc);
                    $galleryImage->setImagePath($directoryToUploadWithFileName);

                    $result = $galleryImage->insertNewGalleryImage();

                    if ($result === true){
                        // Successfull database insertion
                        $_SESSION['alert'] = 'success';
                        error_log('Successful database insertion for file ' . $fileName);
                    } else {
                        // Failed database insertion
                        $_SESSION['alert'] = 'error';
                        error_log('Failed database insertion for file ' . $fileName);
                    }

                } else {
                    // File upload failed
                    $_SESSION['alert'] = 'error';
                    error_log('Unable to upload file for file ' . $fileName);
                }

            }
        }
    }
}

header('Location: /admin/gallery');
die();

?>