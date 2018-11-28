<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/contact.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$message = $_POST['message'];

$contactSubmission = new Contact($firstName, $lastName, $email, $phoneNumber, $message);

$result = $contactSubmission->insertNewContactSubmission();

if ($result){
    echo json_encode(array('response' => true));
} else {
    echo json_encode(array('response' => false));
}
?>