<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/contact.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Email.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$message = $_POST['message'];

$contactSubmission = new Contact($firstName, $lastName, $email, $phoneNumber, $message);

$result = $contactSubmission->insertNewContactSubmission();

$emailClient = new Email();
$contactFullName = $firstName . ' ' . $lastName;
$emailResponse = $emailClient->contactFormSubmissionAlert($contactFullName, $email, $phoneNumber, $message);

if ($result){
    echo json_encode(array('response' => true, 'emailResponse' => $emailResponse->messages->status));
} else {
    echo json_encode(array('response' => false));
}
?>