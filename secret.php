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
    <title>Contenido Secreto</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <style>
        @keyframes bgcolor {
            0% {
                background-color: #45a3e5
            }

            30% {
                background-color: #66bf39
            }

            60% {
                background-color: #eb670f
            }

            90% {
                background-color: #f35
            }

            100% {
                background-color: #864cbf
            }
        }

        body {
            font: 14px sans-serif; 
            text-align: center;
            -webkit-animation: bgcolor 9s infinite;
            animation: bgcolor 3s infinite;
            -webkit-animation-direction: alternate;
            animation-direction: alternate;
        }
    </style>
</head>
<body>
    <h1 class="mt-5">Contenido Secreto</h1>
        <video width="1200" height="800" controls autoplay>
            <source src="movie.webm" type="video/webm">
            Your browser does not support the video tag.
        </video>
    <p>
        <a href="welcome.php" class="btn btn-link ml-3">Regresar</a>
    </p>
</body>
</html>

