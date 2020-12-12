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
  ?>
    <div id="servi">
        <div class="Conte-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>Registro de trabajador</h1>
            <!--Formulario-->
            <form action="Trabajador/R_Trabajador.php" method="POST">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" placeholder="Nombre y apellido">
                <label for="Email">Correo electronico</label>
                <input type="text" name="Email" placeholder="Correo electrónico">
                <label for="Telefono">Telefono</label>
                <input type="number" name="Telefono" placeholder="Número telefónico">
                <label for="Cedula">Cedula</label>
                <input type="number" name="Cedula" placeholder="Cedula ciudadana">
                <label for="categoria">Categoria del trabajador</label>
                <select style="width:100%; height:30px;" name="rol">
                    <option value="-1">Seleccione rol</option>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM rol WHERE Id > 2";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $fila['Id']; ?>"><?php echo $fila['Rol']; ?></option>
                    <?php
                        }
                     ?>
                </select>
                <br> <br>
                <input type="submit" value="REGISTRAR">
            </form>
            <!--Fin formulario-->
        </div>
    </div>
    <!--Tabla-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo electrónico</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT t.Codigo, t.Cedula, t.Nombre, t.Telefono, t.Correo_Electronico, t.Rol, r.Rol as r
                FROM trabajador t, rol r
                WHERE t.Rol = r.id AND t.Rol > 2 ";
                $resultado = $conexion->query($consulta);              
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $fila['Cedula']; ?></td>
                <td> <?php echo $fila['Nombre']; ?></td>
                <td> <?php echo $fila['Telefono']; ?></td>
                <td> <?php echo $fila['Correo_Electronico']; ?></td>
                <td> <?php echo $fila['r']; ?></td>
                <td>
                    <a href="editarTrabajador.php?id=<?php echo $fila['Codigo']; ?>&rol=<?php echo $fila['Rol']; ?>">
                        <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                <td>
                    <a href="Trabajador/Eli_Trabajador.php?id=<?php echo $fila['Codigo']; ?>">
                        <img src="../IMAGENES/trash.png" alt="Borrar" style="height:40px"></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <!--Fin tabla-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>


</html>