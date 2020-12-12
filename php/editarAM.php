<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar atencion mascotas</title>
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
    $min = array("00", 30);
    $hora=array(7,8,9,10,11,14,15,16,17);
    $did=$_REQUEST['id'];
?>
    <!--Editar-->
    <div id="servi">
        <div class="Conte-inputs">
            <h3>Editar registro de atención mascota</h3>
            <!--From editar-->
            <form action="AtencionMascota/Ed_AtencioMascota.php" method="POST" autocomplete="off">
                <div class="ModalCuerpo">
                <input type="hidden" name="id" value="<?php echo $did?>">
                    <label for="Id_servicio">Servicio</label>
                    <select style="width:100%" name="servicio">
                        <option value="0">Seleccione</option>
                        <?php
                                require("conexion.php");
                                $consulta = "SELECT s.Codigo, s.Nombre_Servicio, am.Cod_Servicio FROM servicios s, atencion_a_la_mascota am WHERE am.Codigo='$did' ";                                
                                $resultado = $conexion->query($consulta);
                                while ($fila = $resultado->fetch_assoc()) {
                                    if($fila['Cod_Servicio']==$fila['Codigo']){
                                        ?>
                        <option selected="true" value="<?php echo $fila['Codigo']; ?>">
                            <?php echo $fila['Nombre_Servicio']; ?></option>
                            <?php
                                    }else{
                            ?>
                        <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre_Servicio']; ?></option>
                        <?php
                        }
                                }
                            ?>
                    </select>
                    <label for="Id_Mascota">Mascota</label>
                    <select style="width:100%" name="mascota">
                        <option value="0">Seleccione</option>
                        <?php
                                require("conexion.php");
                                $consulta = "SELECT m.Codigo, m.NombreMascota, am.Cod_Mascota FROM mascota m, atencion_a_la_mascota am WHERE am.Codigo='$did' ";
                                $resultado = $conexion->query($consulta);
                                while ($fila = $resultado->fetch_assoc()) {
                                    if($fila['Cod_Mascota']==$fila['Codigo']){
                            ?>
                        <option selected="true" value="<?php echo $fila['Codigo']; ?>">
                            <?php echo $fila['NombreMascota']; ?></option>
                        <?php
                         }else{
                            ?>
                        <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['NombreMascota']; ?>
                        </option>
                        <?php
                         }
                                }
                            ?>
                    </select>
                    <?php
                            require("conexion.php");
                            $consulta = "SELECT Fecha FROM atencion_a_la_mascota WHERE Codigo='$did'";
                            $resultado = $conexion->query($consulta);
                            $fila = $resultado->fetch_assoc();
                    ?>
                    <label for="fecha">Fecha de atencion</label>
                    <br>
                    <input type="date" name="fecha" placeholder="Fecha" value="<?php echo $fila['Fecha']; ?>">

                    <br><br>
                    <?php
                   
                    ?>
                    <label for="fecha">Hora de atencion</label>
                    <select name="hora">
                        <option value="0">Seleccione</option>
                        <!-- SELECT TIME_FORMAT(hora,'%H') AS Hora FROM atencion_a_la_mascota-->
                        <?php
                         require("conexion.php");                    
                        $consulta="SELECT TIME_FORMAT(hora,'%H') AS Horas FROM atencion_a_la_mascota WHERE Codigo='$did' ";
                        $resultado = $conexion->query($consulta);
                         $fila = $resultado->fetch_assoc();
                        foreach($hora as $pos=>$hor){
                            if($fila['Horas']==$hor){
                                ?>
                        <option selected="true" value="<?php echo $hor?>"><?php echo $hor?></option>
                        <?php
                            }else{
                                ?>
                        <option value="<?php echo $hor?>"><?php echo $hor?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <select name="minutos">
                        <option value="-1">Seleccione</option>
                        <!---->
                        <?php
                        require("conexion.php");                    
                        $consulta="SELECT TIME_FORMAT(hora,'%i') AS Minutos FROM atencion_a_la_mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                         $fila = $resultado->fetch_assoc();
                        foreach($min as $pos=>$minu){
                            if($fila['Minutos']==$minu){
                                ?>
                        <option selected="true" value="<?php echo $minu?>"><?php echo $minu?></option>
                        <?php
                            }else{
                                ?>
                        <option value="<?php echo $minu?>"><?php echo $minu?></option>
                        <?php
                            }
                            
                        }
                        ?>
                    </select>
                    <br> <br>

                </div>
                <div class="modalFooter">
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="AtencionMascota.php" title="Regresar">Regresar</a></button>
                </div>
            </form>
            <!--Fin form editar-->
        </div>
    </div>
    </div>
    </div>
    <!--Fin editar-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>
</html>