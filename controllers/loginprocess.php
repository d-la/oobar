<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/sessionstart.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

$email = $_POST['email'];
$password = $_POST['password'];

$validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

if ($validateEmail !== false){
    $mysqli = initializeMysqlConnection();
    $sqlQuery = "SELECT id, first_name, last_name, email, hash FROM users WHERE email = '$email'";
    $rs = $mysqli->query($sqlQuery);
    if ($rs->num_rows > 0){
        while ($row = $rs->fetch_assoc()){
            $hash = $row['hash'];
            $email = $row['email'];
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $userId = $row['id'];
        }
    }
    
    if (password_verify($password, $hash)){
        $_SESSION['userId'] = $userId;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;

        header('Location: /admin/dashboard.php');
        die();
    } else {
        $_SESSION['alert'] = 'error';
        header('Location: /login.php');
        die();
    }
} else {
    $_SESSION['alert'] = 'error';
    header('Location: /login.php');
    die();
}

?>