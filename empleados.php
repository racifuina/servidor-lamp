<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <script src="./jquery-3.5.1.min.js"></script>
    <script src="./popper.min.js"></script>
    <script src="./bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix border-bottom" >
                        <h2 class="pull-left">Empleados</h2>
                    </div>
                    <div class="mb-5"> 
                        <a href="./welcome.php" class="btn btn-secondary mr-2">Inicio</a>
                        <a href="./create.php" class="btn btn-success pull-right">Agregar empleado</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Puesto</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['puesto'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No hay empleados.</em></div>';
                        }
                    } else{
                        echo "Ocurri?? un error.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
