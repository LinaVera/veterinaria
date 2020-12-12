<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="icon" href="../IMAGENES/icon1.png">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.more').live("click", function() {
            var ID = $(this).attr("id");
            if (ID) {
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "ultimoID=" + ID,
                    cache: false,
                    success: function(html) {
                        $("table#tabla").append(html);
                        $("#more" + ID).remove();
                    }
                });
            } else {
                $(".morebox").html('No hay mas resultados');

            }
            return false;
        });
    });
    </script>
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
    <!--Tabla de productos-->
    <div id="table">

        <table class="table" id="tabla">
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
                <th>Acción</th>
            </tr>
            <?php                                   
                require("conexion.php");
                $sql="SELECT * FROM producto p, categoria_producto cp WHERE p.Categoria = cp.CodigoC ORDER BY Codigo ASC LIMIT 6";
                $resultado = $conexion->query($sql);
                while($fila=$resultado->fetch_assoc()){
                    $ultimoID=$fila['Codigo'];
            ?>
            <tr class="t<?php echo $fila['Cantidad']; ?>">
                <td> <?php echo $fila['Codigo']; ?></td>
                <td> <?php echo '<img style="width:180px" src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?>
                </td>
                <td> <?php echo $fila['Nombre_Producto']; ?></td>
                <td> <?php echo $fila['Descripcion']; ?></td>
                <td> <?php echo $fila['Especie']; ?></td>
                <td> <?php echo $fila['Nombre_Categoria']; ?></td>
                <td> <?php echo $fila['Cantidad']; ?></td>
                <td> <?php echo number_format($fila['Precio_Compra'],2); ?></td>
                <td> <?php echo number_format($fila['Precio_Venta'],2); ?></td>
                <td>
                    <a href="editarMascota.php?id=<?php echo $fila['Codigo']; ?>">
                    <img src="../IMAGENES/service.png" alt="Editar" style="height:40px"></a>
                </td>
            </tr>
          
            <?php
                }
         ?>
        </table>
        <!---Mostrar TODOS-->

        <div id="more<?php echo $ultimoID; ?>" class="morebox">
            <button
                style="background-color:#BE81F7; height: 50px; margin-left: auto; display:block; margin-right: auto;">
                <a href="#" class="more" id="<?php echo $ultimoID; ?>">Mostrar todos los productos</a></button>
        </div>

        <!--Fin de Mostrar TODOS-->
    </div>

    <!--Fin tabla de productos-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
</body>
</html>