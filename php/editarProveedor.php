<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
  ?>
    <div id="servi">
        <div class="Conte-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>Registro de proveedor</h1>
            <!--Formulario-->
            <form action="Proveedor/Ed_Proveedor.php" method="POST">
            <?php
                        $consulta = "SELECT * FROM proveedor1 WHERE id='$did'";
                        $resultado = $conexion->query($consulta);
                        $fila = $resultado->fetch_assoc();
                    ?>
                    <input type="hidden" name="id" value="<?php echo $did?>">
                <label for="nit">NIT</label>
                <input type="text" name="nit" value="<?php echo $fila['NIT']; ?>">
                <label for="representante">Nombre</label>
                <input type="text" name="representante" value="<?php echo $fila['Representante']; ?>">
                <label for="Empresa">Nombre de la empresa</label>
                <input type="text" name="empresa" value="<?php echo $fila['empresa']; ?>">
                <label for="direccion">Direccion de la empresa</label>
                <input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>">
                <label for="dep">Departamentos de Colombia</label>
                <select name="departamento" style="width:100%;">
                            <option value="-1">Seleccione categoria</option>
                            <?php
                                require("conexion.php");
                                $consulta = "SELECT cp.departamento as r, p.departamento, cp.id_departamento  FROM proveedor1 p, departamentos cp WHERE p.id='$did' ";
                                
                                $resultado = $conexion->query($consulta);
                                while ($fila = $resultado->fetch_assoc()) {
                                    if($fila['id_departamento'] == $fila['departamento']){
                                        ?>
                            <option selected="true" value="<?php echo $fila['id_departamento']; ?>">
                                <?php echo $fila['r']; ?></option>
                            <?php
                                    }else{
                            ?>
                            <option value="<?php echo $fila['id_departamento']; ?>"><?php echo $fila['r']; ?>
                            </option>
                            <?php
                        }
                                }
                            ?>
                        </select>
                <br> <br>
                
                <button type="submit" id="guardar" class="btn btn-primary">Guardar cambios</button>
                    <button> <a href="Proveedor.php" title="Cerrar">Regresar</a></button>
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