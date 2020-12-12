<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mascota</title>
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
    $especie =array("Perro", "Gato");
    $sexo =array("Macho", "Hembra");
    $did=$_REQUEST['id'];
?>
    <div id="masco">
        <div class="Contenedor-inputs">
     <!--Editar-->
            <h3>Editar registro de atención mascota</h3>
            <!--Form editar-->
            <form action="Registrar_Mascota/Ed_Mascota.php" method="POST">
            <div class="ModalCuerpo">
                <input type="hidden" name="id" value="<?php echo $did?>">

                <label for="Nombre Mascota">Nombre Mascota</label>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT NombreMascota FROM mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                <input type="text" name="Nombre" value="<?php echo $fila['NombreMascota']; ?>">
                <br>
                
                <label for="Especie">Especie</label>
                    <select name="cboEspecie" style="width:50%">
                        <option value="-1">Seleccionar</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT Especie FROM mascota WHERE Codigo='$did' ";
                            $resultado = $conexion->query($consulta);
                            $fila = $resultado->fetch_assoc();
                            foreach($especie as $pos=>$esp){
                                if($fila['Especie']==$esp){
                                    ?>
                            <option selected="true" value="<?php echo $esp?>"><?php echo $esp?></option>
                            <?php
                                }else{
                                    ?>
                            <option value="<?php echo $esp?>"><?php echo $esp?></option>
                            <?php
                                }
                            }
                            ?>
                    </select>
                <br><br> <br>
                <label for="Edad">Edad</label>
                <?php
                        require("conexion.php");
                        $consulta = "SELECT Edad FROM mascota WHERE Codigo='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                <input type="number" name="Edad_Mascota" value="<?php echo $fila['Edad']; ?>">
                <br><br>
                <label for="Sexo">Sexo</label>
                    <select name="cboSexo" style="width:50%">
                        <option value="-1">Seleccionar</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT Sexo FROM mascota WHERE Codigo='$did' ";
                            $resultado = $conexion->query($consulta);
                            $fila = $resultado->fetch_assoc();
                            foreach($sexo as $pos=>$sex){
                                if($fila['Sexo']==$sex){
                                    ?>
                            <option selected="true" value="<?php echo $sex?>"><?php echo $sex?></option>
                            <?php
                                }else{
                                    ?>
                            <option value="<?php echo $sex?>"><?php echo $sex?></option>
                            <?php
                                }
                            }
                            ?>
                    </select>                
                <br> <br> <br>
                <label for="Dueño">Dueño</label>
                <select name="cboDuenio" style="width:50%">
                        <option value="-1">Seleccionar</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT m.usuario, u.Nombre, u.Codigo FROM mascota m, usuario u WHERE m.Codigo='$did' ";
                            $resultado = $conexion->query($consulta);
                            while ($fila = $resultado->fetch_assoc()) {
                                if($fila['usuario']==$fila['Codigo']){
                                    ?>
                        <option selected="true" value="<?php echo $fila['Codigo']; ?>">
                            <?php echo $fila['Nombre']; ?></option>
                        <?php
                                }else{
                        ?>
                        <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre']; ?>
                        </option>
                        <?php
                    }
                            }
                        ?>
                    </select> 
                <br> <br> <br>
                <div class="modalFooter">
                </div>
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="Mascota.php" title="Cerrar">Regresar</a></button>
                </div>
            </form>
            <!--Fin form editar-->
        </div>
   
    </div>
    <br><br>
    <!--Fin editar-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>
</html>