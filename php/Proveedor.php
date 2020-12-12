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
  ?>
    <div id="servi">
        <div class="Conte-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>Registro de proveedor</h1>
            <!--Formulario-->
            <form action="Proveedor/R_Proveedor.php" method="POST">

                <label for="nit">NIT</label>
                <input type="text" name="nit" placeholder="NIT de la empresa">
                <label for="representante">Nombre</label>
                <input type="text" name="representante" placeholder="Nombre y apellido del representante">
                <label for="Empresa">Nombre de la empresa</label>
                <input type="text" name="empresa" placeholder="Nombre de la empresa">
                <label for="direccion">Direccion de la empresa</label>
                <input type="text" name="direccion" placeholder="Dirección de la empresa">
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
                <th>NIT</th>
                <th>Empresa</th>
                <th>Nombre del representante</th>
                <th>Dirección</th>
                <th>Departamento</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT p.id, p.NIT, p.Representante, p.empresa, p.direccion, d.departamento FROM proveedor p, departamentos d WHERE p.departamento = d.id_departamento";
                $resultado = $conexion->query($consulta);              
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td> <?php echo $fila['NIT']; ?></td>
                <td> <?php echo $fila['empresa']; ?></td>
                <td> <?php echo $fila['Representante']; ?></td>
                <td> <?php echo $fila['direccion']; ?></td>
                <td> <?php echo $fila['departamento']; ?></td>
                <td>
                    <a href="editarProveedor.php?id=<?php echo $fila['id']; ?>" >
                        <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                <td>
                    <a href="Proveedor/Eli_Proveedor.php?id=<?php echo $fila['id']; ?>">
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