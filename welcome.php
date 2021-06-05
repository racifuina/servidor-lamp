<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido al sitio web.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Restablecer contraseña</a>
        <a href="logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a>
    </p>
    <p>
        <a href="secret.php" class="btn btn-lg btn-success ml-3">Acceder a Contenido Secreto</a>
    </p>
</body>
</html>

