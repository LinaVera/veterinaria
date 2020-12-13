<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="icon" href="../IMAGENES/icon1.png">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/formulario.js"></script>
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
                    <a class="view__noreinfo" href="#exampleModal"  onclick="dato(<?php echo $fila['Codigo'];?>)">
                    <img src="../IMAGENES/service.png" alt="Editar" style="height:40px"></a>
                </td>
            </tr>
            <?php
                }
         ?>
        </table>
    </div>

    <!--Fin tabla de productos-->
     <!--Modal-->
     <div class="openClick" id="exampleModal">
        <div class="cajaModal efecto">
            <a href="#close" title="Cerrar" class="close">X</a>
            <h3>Editar registro de atención mascota</h3>
            <!--Form modal-->
            <form action="Insumo.php" method="POST">
            <div class="ModalCuerpo">
                <p id="espacio"></p>
                <label for="Nombre Mascota">Cantidad a pedir del producto:</label> <br> <br>
                <input style="width:100%" type="number" name="cant" placeholder="Digite unidades del producto">
                <br> <br> <br>
                    <button type="submit" id="guardar" class="btn btn-primary">Realizar pedido</button>
                    <button> <a href="#close" title="Cerrar">Cerrar</a></button>
                </div>
            </form>
            <!--Fin form modal-->
        </div>
    </div>
    <!--Fin modal-->
    <script src="../js/formulario.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
</body>
</html>