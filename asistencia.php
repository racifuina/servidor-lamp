<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$empleado_id = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate empleado_id
    $empleado_id = trim($_POST["empleado_id"]);
    if(empty($empleado_id)){
        $empleado_id_err = "Selecciona un empleado.";
    } else{
        $empleado_id = $empleado_id;
    }
    
    // Check input errors before inserting in database
    if(empty($empleado_id_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO asistencias (empleado_id) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_empleado_id);
            
            // Set parameters
            $param_empleado_id = $empleado_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: asistencias.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registar asistencia</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <style>
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Registar asistencia</h2>
                    <p>Selecciona un empleado para registrar una asistencia.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Empleado</label>
                            <select name="empleado_id" class="form-control <?php echo (!empty($empleado_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $empleado_id; ?>" >
                            <option value="">Seleccionar Empleado</option>
                            <?php
                            // Include config file
                            require_once "config.php";
                            
                            // Attempt select query execution
                            $sql = "SELECT * FROM empleados order by name";
                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                                echo "<option value='" . $row['id'] . "' >" . $row['name'] . "</option>";
                                        }
                                    // Free result set
                                    mysqli_free_result($result);
                                }
                            }
                            // Close connection
                            mysqli_close($link);
                            ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $empleado_id_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        <a href="./asistencias.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
