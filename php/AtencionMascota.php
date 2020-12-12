<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atencion mascotas</title>
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
                <label for="Id_servicio">Servicio</label>
                <select style="width:100%; height:30px;" name="servicio">
                    <option value="0">Seleccione servicio</option>
                    <?php
                     $min = array("00", 30);
                     $hora=array(7,8,9,10,11,14,15,16,17);

                        require("conexion.php");
                        $consulta = "SELECT * FROM servicios";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre_Servicio']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>
                <label for="Id_Mascota">Mascota</label>
                <select style="width:100%; height:30px;" name="mascota">
                    <option value="0">Seleccione mascota</option>
                    <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM mascota";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['NombreMascota']; ?></option>
                    <?php
                        }
                     ?>
                </select>
                <label for="fecha">Fecha de atencion</label>
                <input type="date" name="fecha" placeholder="Fecha">

                <label for="fecha">Hora de atencion</label>
                <select name="hora">
                    <option value="0">Seleccione</option>
                    <!--Horario de 7:00-11:30 -- 14:00 - 17:30 -->
                    <?php
                        foreach($hora as $pos=>$hor){
                            ?>
                    <option value="<?php echo $hor?>"><?php echo $hor?></option>
                    <?php
                        }
                        ?>
                </select>
                <select name="minutos">
                    <option value="-1">Seleccione</option>
                    <!--Horario de atencion por servicio, cada 30min 
                ALTER TABLE `atencion_a_la_mascota` ADD `hora` TIME NOT NULL AFTER `Fecha`;
                -->
                    <?php
                        foreach($min as $pos=>$minu){
                            ?>
                    <option value="<?php echo $minu?>"><?php echo  $minu?></option>
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
                <th>Código del registro</th>
                <th>Servicio</th>
                <th>Mascota</th>
                <th>Fecha de atención</th>
                <th>Hora de atención</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

            <?php                                   
                require("conexion.php");
                $consulta = "SELECT am.Codigo, am.Fecha, am.hora, s.Nombre_Servicio, m.NombreMascota FROM atencion_a_la_mascota am, servicios s, mascota m WHERE m.Codigo= am.Cod_Mascota AND s.Codigo=am.Cod_Servicio ORDER BY am.Codigo ASC";
                $resultado = $conexion->query($consulta);
              
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $fila['Codigo']; ?></td>
                <td> <?php echo $fila['Nombre_Servicio']; ?></td>
                <td> <?php echo $fila['NombreMascota']; ?></td>
                <td> <?php echo $fila['Fecha']; ?></td>
                <td> <?php echo $fila['hora']; ?></td>
                <td>
                    <a href="editarAM.php?id=<?php echo $fila['Codigo']; ?>" >
                        <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
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