<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="icon" href="../IMAGENES/icon1.png">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="logo_main">
        <a href="../index.html">
            <img src="../IMAGENES/img3.png" alt="Logo" width="550px" height="170px">
        </a>
    </div>
    <?php
        include "menu.php";
        $did=$_REQUEST['id'];
    ?>
    <div id="regis">
        <div class="Contene-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <br><br>
            <h1>REGISTRO DE USUARIOS</h1>
            <br><br>
            <!--Formulario-->
            <form action="Cliente/Ed_Cliente.php" method="POST">
                <?php
                    require("conexion.php");
                    $consulta = "SELECT * FROM usuario WHERE Codigo='$did'";
                    $resultado = $conexion->query($consulta);
                    $fila = $resultado->fetch_assoc();?>
                <input type="hidden" name="id" value="<?php echo $did?>">
                <label for="Nombre dueño">Nombre</label>
                <input type="text" name="Nombre_duenio" value="<?php echo $fila['Nombre']; ?>">
                <label for="Email">Correo electronico</label>
                <input type="text" name="Email" value="<?php echo $fila['Correo_Electronico']; ?>">
                <label for="Telefono">Telefono</label>
                <input type="text" name="Telefono" value="<?php echo $fila['Telefono']; ?>">
                <label for="Cedula">Cedula</label>
                <input type="number" name="Cedula" value="<?php echo $fila['Cedula']; ?>">

                <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="Usuario.php" title="Cerrar">Regresar</a></button>
            </form>
            <!--Fin formulario-->
        </div>
    </div>
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>
</html>