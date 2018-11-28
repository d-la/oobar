<?php 
if (isset($_SESSION)){
    session_destroy();
    session_unset();
}
header('Location: /login.php');
die();

?>