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
    <div id="regis">
        <div class="Contene-inputs">
            <img class="avatar" src="../IMAGENES/icon2.jpg" alt="Error al cargar la imagen">
            <h1>REGISTRO PRODUCTO</h1>
            <!--Formulario-->
            <form action="Registrar_Producto/R_Producto.php" method="POST" enctype='multipart/form-data'>
                
                <input type="submit" value="REGISTRAR">
            </form>
            <!--Fin formulario-->
        </div>
    </div>
    <!--Tabla de productos-->
    <div id="table">
        <table class="table">
            <tr>
                <th>Código</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th style="width:380px">Descripción</th>
                <th>Especie</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $consulta = "SELECT * FROM producto p, categoria_producto cp WHERE p.Categoria= cp.CodigoC";
                $resultado = $conexion->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {                    
            ?>
            <tr>
                <td> <?php echo $fila['Codigo']; ?></td>
                
                <td> <?php echo $fila['Nombre_Producto']; ?></td>
                <td> <?php echo $fila['Descripcion']; ?></td>
                <td> <?php echo $fila['Especie']; ?></td>
                <td> <?php echo $fila['Nombre_Categoria']; ?></td>
                <td> <?php echo $fila['Cantidad']; ?></td>
                <td> <?php echo number_format($fila['Precio_Compra'],2); ?></td>
                <td> <?php echo $fila['Precio_Venta']; ?></td>
                <td>

                    <a  href="editarProducto.php?id=<?php echo $fila['Codigo']; ?>">
                        <img src="../IMAGENES/edit.png" alt="Editar" style="height:40px"></a>
                </td>
                <td>
                    <a href="Registrar_Producto/Eli_Producto.php?id=<?php echo $fila['Codigo']; ?>">
                        <img src="../IMAGENES/trash.png" alt="Borrar" style="height:40px"></a>
                </td>
            </tr>
            <?php
                }
         ?>
        </table>
    </div>
    <!--Fin tabla de productos-->
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>
</body>
</html>