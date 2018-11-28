<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';

if (isset($_SESSION)){
    session_destroy();
    session_unset();
}
header('Location: /login.php');
die();

?>