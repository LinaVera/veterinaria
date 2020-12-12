<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS GATOS</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../IMAGENES/icon1.png">
</head>

<body>
    <div class="logo_main">
        <a href="../index.html">
            <img src="../IMAGENES/img3.png" alt="Logo" width="550px" height="170px">
        </a>
    </div>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="../IMAGENES/men.png" alt="Error al cargar la imagen" width="40" height="40">
        </label>
        <nav class="menu" id="menu">
            <ul>
            <li><a href="../index.html">INICIO</a></li>
                <li><a href="../html/View_Productos.html">PRODUCTOS</a></li>
                <li><a href="../html/View_Servicios.html">SERVICIOS</a></li>
                <li><a href="../html/View_Datos.html">DATOS CURIOSOS</a></li>
                <li><a href="../html/View_Informacion.html">NOSOTROS</a> </li> 

            </ul>
        </nav>
    </header>
    <div class="categoria" style="float:left; display:block;">
        <?php
            require("conexion.php");
            $consulta = "SELECT * FROM categoria_producto";
            $resultado = $conexion->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
        ?>
        <a href="#c<?php echo $fila['CodigoC']; ?>"><?php echo $fila['Nombre_Categoria']; ?></a>
        <br>
        <?php
            }
        ?>
    </div>
    <div id="progatos">
        <section id="pro">
            <div class="conta">
                <?php
                        require("conexion.php");
                        $consulta = "SELECT * FROM producto WHERE Especie='Gato' ORDER BY Categoria ASC";
                        $resultado = $conexion->query($consulta);
                        while ($fila = $resultado->fetch_assoc()) {
                            if($fila['Categoria']==1){
                                ?>
                <ul class="list-image" id="c1">
                    <li>
                        <h1>Concentrado</h1>
                        <div class="conta_img" style="text-align:center;">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?>
                            <div class="info__image">
                                <p class="name__im"><?php echo $fila['Nombre_Producto']; ?></p>
                            </div>
                        </div>
                        <p>Precio: <?php echo $fila['Precio_Venta']; ?> COP</p>
                        <div style="display:none" id="obj<?php echo $fila['Nombre_Producto']; ?>">
                            <p style="width:380px"> <?php echo $fila['Descripcion']; ?></p>
                        </div>
                        <a
                            href="javascript:document.getElementById('obj<?php echo $fila['Nombre_Producto']; ?>').style.display='block';void0">Mostrar
                            descripción</a>
                        <br>
                        <button disabled>Comprar </button>
                    </li>
                    <?php
                            }elseif($fila['Categoria']==2){
                                ?>
                    <ul class="list-image" id="c2">
                        <li>
                            <h1>Antibiotico</h1>
                            <div class="conta_img" style="text-align:center;">
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?>
                                <div class="info__image">
                                    <p class="name__im"><?php echo $fila['Nombre_Producto']; ?></p>
                                </div>
                            </div>
                            <p>Precio: <?php echo $fila['Precio_Venta']; ?> COP</p>
                            <div style="display:none" id="obj<?php echo $fila['Nombre_Producto']; ?>">
                                <p style="width:380px"> <?php echo $fila['Descripcion']; ?></p>
                            </div>
                            <a
                                href="javascript:document.getElementById('obj<?php echo $fila['Nombre_Producto']; ?>').style.display='block';void0">Mostrar
                                descripción</a>
                            <br>
                            <button disabled>Comprar </button>
                        </li>
                        <?php

                            }elseif($fila['Categoria']==3){
                                ?>
                        <ul class="list-image" id="c3">

                            <li>
                                <h1>Desparasitante</h1>
                                <div class="conta_img" style="text-align:center;">
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?>
                                    <div class="info__image">
                                        <p class="name__im"><?php echo $fila['Nombre_Producto']; ?></p>
                                    </div>
                                </div>
                                <p>Precio: <?php echo $fila['Precio_Venta']; ?> COP</p>
                                <div style="display:none" id="obj<?php echo $fila['Nombre_Producto']; ?>">
                                    <p style="width:380px"> <?php echo $fila['Descripcion']; ?></p>
                                </div>
                                <a
                                    href="javascript:document.getElementById('obj<?php echo $fila['Nombre_Producto']; ?>').style.display='block';void0">Mostrar
                                    descripción</a>
                                <br>
                                <button disabled>Comprar </button>
                            </li>
                            <?php
                            }elseif($fila['Categoria']==4){
                                ?>
                            <ul class="list-image" id="c4">

                                <li>
                                    <h1>Multivitaminico</h1>
                                    <div class="conta_img" style="text-align:center;">
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($fila["Imagen"]).'"/>';?>
                                        <div class="info__image">
                                            <p class="name__im"><?php echo $fila['Nombre_Producto']; ?></p>
                                        </div>
                                    </div>
                                    <p>Precio: <?php echo $fila['Precio_Venta']; ?> COP</p>
                                    <div style="display:none" id="obj<?php echo $fila['Nombre_Producto']; ?>">
                                        <p style="width:380px"> <?php echo $fila['Descripcion']; ?></p>
                                    </div>
                                    <a
                                        href="javascript:document.getElementById('obj<?php echo $fila['Nombre_Producto']; ?>').style.display='block';void0">Mostrar
                                        descripción</a>
                                    <br>
                                    <button disabled>Comprar </button>
                                </li>
                                <?php

                            }
                        }
                    ?>
                            </ul>
            </div>
        </section>
    </div>
    <footer>
        <p>
            AMAMOS A TUS MASCOTAS
        </p>
    </footer>

</body>

</html>