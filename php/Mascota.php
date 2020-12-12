<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar mascota</title>
    <link rel="icon" href="../IMAGENES/icon1.png">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/formulario.js"></script>
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
    <div id="masco">
        <div class="Contenedor-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>REGISTRO MASCOTA</h1>
            <!-- formulario -->
            <form action="Registrar_Mascota/R_Mascota.php" method="POST">
                <label for="Codigo">Codigo</label>
                <input type="text" name="Codigo" placeholder="Codigo">
                <label for="Nombre Mascota">Nombre Mascota</label>
                <input type="text" name="Nombre" placeholder="Nombre">
                <label for="Especie">Especie</label>
                <div>
                    <select name="cboEspecie" style="width:100%">
                        <option value="-1">Seleccionar</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div><br>
                <label for="Edad">Edad</label>
                <input type="number" name="Edad_Mascota" placeholder="Edad">
                <label for="Sexo">Sexo</label>
                <div>
                    <select name="cboSexo" style="width:100%">
                        <option value="-1">Seleccionar</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <label for="Dueño">Dueño</label>
               
                    <select name="cboDuenio" style="width:50%">
                        <option value="-1">Seleccione usuario</option>
                        <?php
                            require("conexion.php");
                            $consulta = "SELECT * FROM usuario WHERE Rol= 3 ";
                            $resultado = $conexion->query($consulta);
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $fila['Codigo']; ?>"><?php echo $fila['Nombre']; ?></option>
                        <?php
                            }
                        ?>
                    </select>  
                    <a onclick="duenio();"  style="cursor:pointer; background-color:#4B088A;">Nuevo usuario</a>
                    <p id="duenio"></p>
                    <input type="submit" value="REGISTRAR">
            </form>
        </div>
    </div>
    <br><br>
    <!--Tabla-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Codigo</th>
                <th>Nombre Mascota</th>
                <th>Especie</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Nombre Dueño</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT u.Nombre, m.Codigo, m.NombreMascota, m.Especie, m.Edad, m.Sexo FROM mascota m, usuario u WHERE m.usuario= u.Codigo ";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
          <td> <?php echo $fila['Codigo']; ?></td>
                <td> <?php echo $fila['NombreMascota']; ?></td>
                <td> <?php echo $fila['Especie']; ?></td>
                <td> <?php echo $fila['Edad']; ?></td>
                <td> <?php echo $fila['Sexo']; ?></td>
                <td> <?php echo $fila['Nombre']; ?></td>
                <td>
                    <a href="editarMascota.php?id=<?php echo $fila['Codigo']; ?>">
                    <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                 <td><a href="Registrar_Mascota/Eli_Mascota.php?id=<?php echo $fila['Codigo']; ?>">
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
    <script src="../js/formulario.js"></script>
</body>
</html>