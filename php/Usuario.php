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
  ?>
 <div id="servi">
        <div class="Conte-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <br><br>
            <h1>REGISTRO DE USUARIOS</h1>
            <br><br>
            <!--Formulario-->
            <form action="Cliente/R_Cliente.php" method="POST">
                <label for="Nombre dueño">Nombre</label>
                <input type="text" name="Nombre_duenio" placeholder="Nombre y apellido">
                <label for="Email">Correo electronico</label>
                <input type="text" name="Email" placeholder="Correo electrónico">
                <label for="Telefono">Telefono</label>
                <input type="text" name="Telefono" placeholder="Número telefónico">
                <label for="Cedula">Cedula</label>
                <input type="number" name="Cedula" placeholder="Cedula ciudadana">
                <input type="submit" value="REGISTRAR">
            </form>
            <!--Fin formulario-->
        </div>
    </div>
    <!--Tabla de usuarios-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo electrónico</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT * FROM usuario ";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {                    
            ?>
            <tr>
                <td> <?php echo $fila['Cedula']; ?></td>
                <td> <?php echo $fila['Nombre']; ?></td>
                <td> <?php echo $fila['Telefono']; ?></td>
                <td> <?php echo $fila['Correo_Electronico']; ?></td>
                <td>
                    <a  href="editarCliente.php?id=<?php echo $fila['Codigo']; ?>">
                        <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                <td>
                    <a href="Cliente/Eli_Cliente.php?id=<?php echo $fila['Codigo']; ?>">
                        <img src="../IMAGENES/trash.png" alt="Borrar" style="height:40px"></a>
                </td>
            </tr>
            <?php
                }
         ?>
        </table>
    </div>
    <!--Fin tabla de usuarios-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>
</html>