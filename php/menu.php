<?php

session_start();
$rol = $_SESSION['rol'];
if($rol==1){//Es 
?>
<header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="../IMAGENES/men.png" alt="Error al cargar la imagen" width="40" height="40">
        </label>
        <nav class="menu" id="menu">
            <ul>
                <li><a href="inventario.php">INVENTARIO</a></li>
                <li><a href="Insumos.php">Insumos</a></li><!--Accion de mostrar por categoria los proveedores-->
                <li><a href="Trabajador.php">Trabajadores</a></li>
                <li><a href="Proveedor.php">Proveedores</a></li>
                <li><a href="AtencionMascota.php">Ventas</a></li><!--Todas las facturas, tanto de productos como de mascotas-->
                <li><a href="logOut.php">CERRAR SESION</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="../IMAGENES/men.png" alt="Error al cargar la imagen" width="40" height="40">
        </label>
        <nav class="menu" id="menu">
            <ul>
            <li><a href="AtencionMascota.php">Atención a la mascota</a></li>
                <li><a href="Mascota.php">Mascota</a></li>
                <li><a href="Producto.php">Producto</a></li>
                <li><a href="Usuario.php">Usuario</a></li>
                <li><a href="AtencionMascota.php">Compra</a></li>
                <li><a href="Domicilio.php">Domicilio</a></li>
            </ul>
        </nav>
    </header>
<?php
}else if($rol==2){//Es empleado, puede realizar facturas, registrar domiciliarios, mascotas, atencion, productos.
?>
<header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="../IMAGENES/men.png" alt="Error al cargar la imagen" width="40" height="40">
        </label>
        <nav class="menu" id="menu">
            <ul>
            <li><a href="AtencionMascota.php">Atención a la mascota</a></li>
                <li><a href="Mascota.php">Mascota</a></li>
                <li><a href="Producto.php">Producto</a></li>
                <li><a href="Usuario.php">Usuario</a></li>
                <li><a href="AtencionMascota.php">Compra</a></li>
                <li><a href="Domicilio.php">Domicilio</a></li>
                <li><a href="logOut.php">CERRAR SESION</a></li>
            </ul>
        </nav>
    </header>
<?php
}
?>
