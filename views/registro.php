<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="" method="post">
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <br>
            <div>
                <label>Apellidos</label>
                <input type="text" name="apellidos" required>
               
            </div>
            <br>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <br>
            <div>
                <label>Teléfono</label>
                <input type="text" name="telefono" required>
            </div>
            <br>
            <div>
                <label>Fecha nacimiento</label>
                <input type="date" name="fecha_nacimiento" required>
            </div>
            <br>
            <div>
                <label>Direccion</label>
                <input type="text" name="direccion" required>
            </div>
            <br>
            <div>
            <label>Sexo</label>
            <select name="sexo">
                <option value="" selected="selected">Selecccione sexo</option>
                <option value="hombre">Hombre</option>  
                <option value="mujer">Mujer</option>
                <option value="otro">Otro</option>
            </select>
            </div>
            <br>
            <div>
                <label>Usuario</label>
                <input type="text" name="usuario">
            </div>
            <br>    
            <div>
                <label>Contraseña</label>
                <input type="text" name="password">
            </div>
            <br>
            <div>
            <label>Rol</label>
            <select class="form-control" name="rol">
                <option value="" selected>Selecccione rol</option>
                <option value="admin">Admin</option>  
                <option value="user">Usuario</option> 
            </select>
            <span class="help-block"><?php echo $password_err; ?></span>
            </div>           
            </div>
            <br>
            <div align="center">
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </div>
            <br>
            <p align="center">¿Ya tienes una cuenta? <a href="login.php">Inicia sesion aquí</a></p> 
        </form>
        
    </div>    
    <?php include 'footer.php'; ?>
</body>
</html>