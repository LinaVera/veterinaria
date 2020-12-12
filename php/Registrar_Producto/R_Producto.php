<?php
    $codigo = $_POST['codigo'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $nombre = $_POST['nombreP'];
    $descripcion = $_POST['descripcion'];
    $especie = $_POST['cboEspecie'];
    $categoria = $_POST['cboCategoria'];
    $cantidad = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    require("../conexion.php");
    //Vacios o no seleccionados y negativos
    if ($codigo!= null &&  $imagen != false && $nombre != null && $descripcion != null && $categoria != -1 && $especie != -1 && $cantidad >=0 && $precio_compra >=0 && $precio_venta >=0) {
        $sql="SELECT * FROM producto WHERE Codigo='$codigo'";
        $resultado=$conexion->query($sql);
        $con=$resultado->num_rows;
        //No exista ya el codigo
            if($con>0){
                echo'<script type="text/javascript">
                alert("Ya existe este código.");
                window.location.href="../Producto.php";
                </script>';
            }else{
                $saber="INSERT INTO producto(`Codigo`, `Imagen`, `Nombre_Producto`, `Descripcion`,`Especie`,`Categoria`,`Cantidad`,`Precio_Compra`,`Precio_Venta`)  
                VALUES('$codigo', '$imagen', '$nombre','$descripcion','$especie','$categoria','$cantidad','$precio_compra','$precio_venta')";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se registró producto exitosamente.");
                    window.location.href="../Producto.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se registró producto.");
                    window.location.href="../Producto.php";
                    </script>';           
                }   
            }         
    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Producto.php";
        </script>';
    }
?>