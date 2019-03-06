<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

class Gallery{

    private $imageId, $imageName, $imageDesc, $imagePath, $imageExtension;

    private $mysqli;

    /**
     * Constructor function that can take 3 parameters. Also initializes database connection
     * 
     * @param string $imageName: full name of the image
     * @param string $imageDesc: the description of the image
     * @param string $imagePath: the path where the image will be located on the server
     */
    public function __construct($imageId = null, $imageName = null, $imageDesc = null, $imagePath = null){
        if ((is_numeric($imageId)) && (!is_null($imageId))){
            $this->imageId = $imageId;
        }

        if ((is_string($imageName)) && (!is_null($imageName))){
            $this->imageName = $imageName;
        }

        if ((is_string($imageDesc)) && (!is_null($imageDesc))){
            $this->imageDesc = $imageDesc;
        }

        if ((is_string($imagePath)) && (!is_null($imagePath))){
            $this->imagePath = $imagePath;
        }

        $this->mysqli = initializeMysqlConnection();
    }

    // Setters
    public function setImageId($imageId){
        if ((is_numeric($imageId)) && (isset($imageId))){
            $this->imageId = $imageId;
        }
    }

    public function setImageName($imageName){
        if ((is_string($imageName)) && (!empty($imageName))){
            $this->imageName = $imageName;
        }
    }

    public function setImageDescription($imageDesc){
        if ((is_string($imageDesc)) && (!empty($imageDesc))){
            $this->imageDesc = $imageDesc;
        }
    }

    public function setImagePath($imagePath){
        if ((is_string($imagePath)) && (!empty($imagePath))){
            $this->imagePath = $imagePath;
        }
    }

    /**
     * Take an image name and return the file extension only
     * 
     * @param string
     * 
     * @return string
     */
    public function returnImageExtension($imageName){
        return pathinfo($imageName, PATHINFO_EXTENSION);
    }

    /**
     * Take an image name and return the file name only
     * 
     * @param string 
     * 
     * @return string
     */
    public function returnImageNameWithoutExtension($imageName){
        return pathinfo($imageName, PATHINFO_FILENAME);
    }

    /**
     * Insert a new gallery image into the database (does not handle uploading the image to the server)
     * 
     * @return boolean
     */
    public function insertNewGalleryImage(){
        if ( (empty($this->imageName)) && (empty($this->imageDesc)) && (empty($this->imagePath)) ){
            error_log('Gallery method insertNewGalleryImage expects imageName, imageDesc, and imagePath to have values.');
            return false;
        } else {
            $sqlQuery = "INSERT INTO gallery_images (`name`, description, path, create_date) ";
            $sqlQuery .= "VALUES ('" . addslashes($this->imageName) . "', '" . addslashes($this->imageDesc) . "', '" . addslashes($this->imagePath) . "', NOW());";

            $queryResult = $this->mysqli->query($sqlQuery);
            error_log($this->mysqli->error);

            if ($queryResult === true){
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Query the database for all gallery images
     * 
     * @return array 
     */
    public function selectAllGalleryImages(){
        $sqlQuery = 'SELECT id, name, description, path FROM gallery_images;';

        $resultSet = 0;
        $returnedObject = $this->mysqli->query($sqlQuery);
        error_log($this->mysqli->error);
        if ($returnedObject->num_rows > 0){
            $resultSet = $returnedObject->fetch_all(MYSQLI_ASSOC);   
        }

        return $resultSet;
    }

    /**
     * Update a gallery images data. Since the form on the front end fills all data except the path, the method should
     * receieve two parameters at most, the imageName and imagePath, even if one of the two are the same as the database value.
     * 
     * @param string $imageName: new image name if any
     * @param string $imageDesc: new image desc if any
     * @param string $imagePath: new image path if any
     */
    public function updateGalleryImageData($imageId, $imageName, $imageDesc, $imagePath = null){
        if (is_numeric($imageId)){
            $this->imageId = $imageId;
        }

        if (is_string($imageName)){
            $this->imageName = $imageName;
        }

        if (is_string($imageDesc)){
            $this->imageDesc = $imageDesc;
        }

        // Create an array that holds the data so we can loop through and append to our query
        $imageData = array(
            '`name`' => $this->imageName,
            'description' => $this->imageDesc
        );

        // If an image path is received, add it to the imageData array
        if (!is_null($imagePath)){
            $this->imagePath = $imagePath;

            $imageData['path'] = $this->imagePath;
        }

        $sqlQuery = "UPDATE gallery_images SET ";
        foreach ($imageData as $databaseKey => $newDatabaseValue){
            $sqlQuery .= $databaseKey . " = '" . addslashes($newDatabaseValue) . "', ";
        }
        // Remove the trailing comma and white space
        $sqlQuery = substr($sqlQuery, 0, strlen($sqlQuery) - 2);
        $sqlQuery .= ' WHERE id = ' . $this->imageId . ';';

        $resultSet = $this->mysqli->query($sqlQuery);
        error_log($this->mysqli->error);
        if ($resultSet === true){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method to delete an existed gallery image
     * 
     * @param int $imageId: ID of the image to be deleted
     * 
     * @return boolean
     */
    public function deleteGalleryImage($imageId){
        if ((isset($imageId)) && (is_numeric($imageId))){
            $this->imageId = $imageId;
        }

        $sqlQuery = "DELETE FROM gallery_images WHERE id = $this->imageId;";
        
        $resultSet = $this->mysqli->query($sqlQuery);
        error_log($this->mysqli->error);
        if ($resultSet === true){
            return true;
        } else {
            return false;
        }
    }

    // function compareGalleryImageHeights($image1, $image2){
    //     if ($image1['height'] == $image2['height']){
    //         return 0;
    //     }

    //     return ($image1['height'] > $image2['height']) ? 1 : -1;
    // }

    public function selectGalleryImagesWithDimensions(){

        $sqlQuery = 'SELECT id, name, description, path FROM gallery_images;';

        $resultSet = 0;
        $returnedObject = $this->mysqli->query($sqlQuery);
        error_log($this->mysqli->error);
        if ($returnedObject->num_rows > 0){
            $resultSet = $returnedObject->fetch_all(MYSQLI_ASSOC);   
        }

        // Loop through the database results and assign each galleryImage a height and width taken from getimagesize
        for ($i = 0; $i < count($resultSet); $i++){

            $imageData = getimagesize($_SERVER['DOCUMENT_ROOT'] . $resultSet[$i]['path']);
            $resultSet[$i]['height'] = $imageData[1];
            $resultSet[$i]['width'] = $imageData[0];
        }

        // Sort the array based on the height of each image
        usort($resultSet, function($image1, $image2){
            if ($image1['height'] == $image2['height']){
                return 0;
            }
    
            return ($image1['height'] > $image2['height']) ? 1 : -1;
        });
        return $resultSet;
    }
}



?>