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
            <h1>DOMICILIO</h1>
            <h1><?php echo $fecha=date("Y-m-d");?></h1>
            <?php date_default_timezone_set("America/Bogota");?>
            <h1><?php echo $hora=date("H:i");?></h1>
            <!--Formulario-->
            <form action="Domicilio/R_Domicilio.php" method="POST">
                <div>
                <label for="fac">Facturas:</label>
                    <select name="fac" style="width:100%;  height:30px;">
                        <option value="-1">Seleccione factura:</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT * FROM factura_producto WHERE fecha >= '$hora'";
                            $resultado = $conexion->query($consulta);
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $fila['id']; ?>"><?php echo $fila['id']; ?> ~ <?php echo $fila['Fecha']; ?> - <?php echo $fila['hora']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <br>
                <label for="dep">Departamentos de Colombia</label>
                <select style="width:100%; height:30px;" name="departamento">
                    <option value="-1">Seleccione departamento de la empresa</option>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM departamentos";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $fila['id_departamento']; ?>"><?php echo $fila['departamento']; ?></option>
                    <?php
                        }
                     ?>
                </select>
                <br><br>
                <div>
                <label for="dir">Dirección:</label>
                <input type="text" name="dir" placeholder="Digite dirección del usuario.">
                </div>
                <div>
                <label for="ad">Adicional:</label>
                <input type="text" value="0" name="ad" placeholder="Digite adicional, si es necesario." default="0">
                </div>

                <input type="submit" value="Realizar domicilio">
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