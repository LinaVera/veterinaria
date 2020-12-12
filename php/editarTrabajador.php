<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>
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
    include("conexion.php");
    $did=$_REQUEST['id'];
    $roll=$_REQUEST['rol'];

    $consulta = "SELECT * FROM trabajador WHERE Codigo='$did'";
    $resultado = $conexion->query($consulta);   
    $fila = $resultado->fetch_assoc();                           
  ?>
    <div id="servi">
        <div class="Conte-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>Editar trabajador</h1>
            <!--Formulario-->
            <form action="Trabajador/Ed_Trabajador.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $did; ?>">
                <input type="hidden" name="rol" value="<?php echo $roll; ?>">
                <?php
                if($roll == 3){//trabajador
                ?>
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" value="<?php echo $fila['Nombre'];?>">
                <label for="Email">Correo electronico</label>
                <input type="text" name="Email" value="<?php echo $fila['Correo_Electronico'];?>">
                <label for="Telefono">Telefono</label>
                <input type="text" name="Telefono" value="<?php echo $fila['Telefono'];?>">
                <label for="Cedula">Cedula</label>
                <input type="number" name="Cedula" value="<?php echo $fila['Cedula'];?>">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="contraseña" value="<?php echo $fila['Clave'];?>">
               <?php
                }else if($roll == 4){
                ?>
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" value="<?php echo $fila['Nombre'];?>">
                <label for="Email">Correo electronico</label>
                <input type="text" name="Email" value="<?php echo $fila['Correo_Electronico'];?>">
                <label for="Telefono">Telefono</label>
                <input type="text" name="Telefono" value="<?php echo $fila['Telefono'];?>">
                <label for="Cedula">Cedula</label>
                <input type="number" name="Cedula" value="<?php echo $fila['Cedula'];?>">
                <?php
                }
                ?>
                <br> <br>
                <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                <button> <a href="Trabajador.php" title="Regresar">Regresar</a></button>
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