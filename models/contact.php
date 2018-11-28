<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

class Contact{
    private $firstName, $lastName, $email, $phoneNumber, $message;

    private $mysqli;

    /**
     * Constructor function. All string escaping should be completed before passing values to the constructor
     * 
     * @param string $firstName
     * @param string $lastName
     * @param string $email 
     * @param string $phoneNumber 
     * @param string $message 
     */
    public function __construct($firstName = null, $lastName = null, $email = null, $phoneNumber = null, $message = null){
        if ( (!is_null($firstName)) && (is_string($firstName)) ){
            $this->firstName = $firstName;
        }

        if ( (!is_null($lastName)) && (is_string($lastName)) ){
            $this->lastName = $lastName;
        }

        if ( (!is_null($email)) && (filter_var($email, FILTER_VALIDATE_EMAIL)) ){
            $this->email = $email;
        }

        if ( (!is_null($phoneNumber)) && ($this->validatePhoneNumber($phoneNumber)) ){
            $this->phoneNumber = $phoneNumber;
        }

        if ( (!is_null($message)) && (is_string($message)) ){
            $this->message = $message;
        }

        $this->mysqli = initializeMysqlConnection();
    }

    // Getter Functions
    public function getFirstName(){
        if (isset($this->firstName)){
            return $this->firstName;
        }
    }

    public function getLastName(){
        if (isset($this->lastName)){
            return $this->lastName;
        }
    }

    public function getEmail(){
        if (isset($this->email)){
            return $this->email;
        }
    }

    public function getPhoneNumber(){
        if (isset($this->phoneNumber)){
            return $this->phoneNumber;
        }
    }

    public function getMessage(){
        if (isset($this->message)){
            return $this->message;
        }
    }

    // Setter Functions
    public function setFirstName($firstName){
        if (is_string($firstName)){
            $this->firstName = $firstName;
        }
    }

    public function setLastName($lastName){
        if (is_string($lastName)){
            $this->lastName = $lastName;
        }
    }

    public function setEmail($email){
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }
    }

    public function setPhoneNumber($phoneNumber){
        if ($this->validatePhoneNumber($phoneNumber)){
            $this->phoneNumber = $phoneNumber;
        }
    }

    public function setMessage($message){
        if (is_string($this->message)){
            $this->message = $message;
        }
    }

    /**
     * Regex used to validate a US phone number. Javascript should handle the format on the client side
     * 
     * @param string $phoneNumber 
     * 
     * @return boolean True if the phone number is valid
     */
    private function validatePhoneNumber($phoneNumber){
        if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phoneNumber)){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Insert a new contact submission into the database
     * 
     * @return boolean true if execution is successful
     */
    public function insertNewContactSubmission(){
        // $sqlQuery = "CALL spInsertNewContactSubmission('" . $this->mysqli->real_escape_string($this->firstName) . "', '" . $this->mysqli->real_escape_string($this->lastName) . "', '" . $this->email . "', '" . $this->phoneNumber . "', '" . $this->mysqli->real_escape_string($this->message) . "');";
        $sqlQuery = "INSERT INTO contact_submissions (first_name, last_name, email, phone_number, message, contact_date) VALUES ('" . $this->mysqli->real_escape_string($this->firstName) . "', '" . $this->mysqli->real_escape_string($this->lastName) . "', '" . $this->email . "', '" . $this->phoneNumber . "', '" . $this->mysqli->real_escape_string($this->message) . "', NOW());";
        
        $result = $this->mysqli->query($sqlQuery);

        return $result;
    }

}



?>