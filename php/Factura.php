<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
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
    <!--Tabla de facturas-->
    <div id="table">

        <table class="table" id="tabla">
            <tr>
                <th colspan="8">Tabla de facturas de antención a la mascota</th>
            </tr>
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Empleado</th>
                <th>Mascota</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Venta</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $sql="SELECT a.id_facturaP, a.id_cliente, a.id_mascota, a.Fecha, a.hora, a.id_empleado, a.id_servicio, a.precio, 
                m.NombreMascota, 
                s.Nombre_Servicio, 
                u.Nombre, t.Nombre as t
                FROM factura_atencion a, mascota m, servicios s, usuario u, trabajador t 
                WHERE a.id_cliente = u.Codigo AND a.id_mascota= m.Codigo AND a.id_empleado = t.Codigo AND a.id_servicio = s.Codigo  ORDER BY Fecha DESC";
                $resultado = $conexion->query($sql);
                while($fila=$resultado->fetch_assoc()){
            ?>
            <tr class="t<?php echo $fila['id_factura']; ?>">
                <td> <?php echo $fila['id_facturaP']; ?></td>
                <td> <?php echo $fila['Fecha']; ?></td>
                <td> <?php echo $fila['hora']; ?></td>

                <td> <?php echo $fila['t']; ?></td>
                <td> <?php echo $fila['NombreMascota']; ?></td>
                <td> <?php echo $fila['Nombre']; ?></td>
                <td> <?php echo $fila['Nombre_Servicio']; ?></td>
                <td> <?php echo number_format($fila['precio'],2); ?></td>
            </tr>

            <?php
                }
         ?>
        </table>
    </div>
    <!--Fin tabla de facturas-->
    <div>
        <?php
    $sql="SELECT SUM(Precio) as precio FROM factura_atencion";
    $resultadol = $conexion->query($sql);
    $fila = $resultadol->fetch_assoc();
    ?>
        <h1>Total: <?php echo number_format($fila['precio'],2);?></h1>
    </div>

</body>

</html>