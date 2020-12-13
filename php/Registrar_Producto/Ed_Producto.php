<?php
    $codigo = $_POST['id'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $nombre = $_POST['nombreP'];
    $descripcion = $_POST['descripcion'];
    $especie = $_POST['cboEspecie'];
    $categoria = $_POST['cboCategoria'];
    $cantidad = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $pro = $_POST['proveedor'];
    require("../conexion.php");
    //Vacios o no seleccionados y negativos
    if ($codigo!= null && $nombre != null && $descripcion != null && $categoria != -1 && $especie != -1 && $cantidad >=0 && $precio_compra >=0 && $precio_venta >=0 && $pro !=-1) {
        $sql="SELECT * FROM producto WHERE Codigo ='$codigo'";
        $resultado=$conexion->query($sql);
        $con=$resultado->num_rows;
        //No exista ya el codigo
            if($con>1){
                echo'<script type="text/javascript">
                alert("Ya existe este código.");
                window.location.href="../Producto.php";
                </script>';
            }else{
                if($imagen==false ){
                    //No modifica la imagen
                    $query = "UPDATE producto SET Nombre_Producto='$nombre', Descripcion='$descripcion',Especie='$especie',Categoria='$categoria',Cantidad='$cantidad',Precio_Compra='$precio_compra',Precio_Venta='$precio_venta', proveedor ='$pro'
                    WHERE Codigo='$codigo'";
                }else{
                    //Modifica la imagen
                    $query = "UPDATE producto SET Imagen= '$imagen', Nombre_Producto='$nombre', Descripcion='$descripcion',Especie='$especie',Categoria='$categoria',Cantidad='$cantidad',Precio_Compra='$precio_compra',Precio_Venta='$precio_venta', proveedor ='$pro'
                    WHERE Codigo='$codigo'";
                }
                
                if($saberBD=$conexion->query($query)){
                    echo'<script type="text/javascript">
                    alert("Se actualizó producto exitosamente.");
                    window.location.href="../Producto.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se actualizó producto.");
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