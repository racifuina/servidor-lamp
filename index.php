<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} else {
    header("location: welcome.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Bienvenido a servidor.acifuina.com</h1>
    <p>
        <a href="login.php" class="btn btn-warning ml-3">Iniciar Sesión</a>
        <a href="welcome.php" class="btn btn-success ml-3">Ir a la pagina de Bienvenida</a>
    </p>
</body>
</html>
