<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domicilio</title>
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
            <h1>ATENCIÓN A LA MASCOTA</h1>
            <h1><?php echo $fecha=date("Y-m-d");?></h1>
            <?php date_default_timezone_set("America/Bogota");?>
            <h1><?php echo $hora=date("H:i");?></h1>
            <!--Formulario-->
            <form action="AtencionMascota/R_AtencioMascota.php" method="POST">
                <div>
                <label for="producto">Productos:</label>
                    <select name="producto" style="width:100%">
                        <option value="-1">Seleccione producto</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT * FROM producto";
                            $resultado = $conexion->query($consulta);
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre_Producto']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <br> <br>
                <div>
                <label for="cant">Cantidad:</label>
                <input type="numbre" name="cant" placeholder="Digite las unidades del producto.">
                </div>

                <input type="submit" value="Añadir">
            </form>
            <!--Fin formulario-->
        </div>
    </div>
    <!--Tabla-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Eliminar</th>
            </tr>

            <?php                                   
                require("conexion.php");
                $consulta = "SELECT d.Cantidad, p.Nombre_Producto, d.Precio FROM detalle d, producto p WHERE d.Factura IS NULL AND d.Producto = p.Codigo ";
                $resultado = $conexion->query($consulta);
              
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $fila['Nombre_Producto']; ?></td>
                <td> <?php echo $fila['Cantidad']; ?></td>
                <td> <?php echo $fila['Precio']; ?></td>
                <td>
                    <a href="AtencionMascota/Eli_AtencionMascota.php?id=<?php echo $fila['Codigo']; ?>">
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