<?php
    $producto = $_POST['producto'];
    $cant = $_POST['cant'];
    require("../conexion.php");
    if($producto != -1 && $cant > 0){
        $sql="SELECT  Precio_Venta FROM producto WHERE Codigo = '$producto' AND Cantidad >= '$cant'";
        $resultadol = $conexion->query($sql);
        if($fila = $resultadol->fetch_assoc()){
            $precio = $fila['Precio_Venta'] * $cant;
            $sql="INSERT INTO detalle(`Producto`,`cantidad`,`precio`,`Factura`) VALUES ('$producto','$cant','$precio',NULL)";
            if($saberBD=$conexion->query($sql)){
                $sql = "UPDATE producto SET Cantidad = Cantidad - '$cant' WHERE Codigo = '$producto' ";
                $saberBD=$conexion->query($sql);
                echo'<script type="text/javascript">
                alert("Agregrado");
                window.location.href="../Venta.php";
                </script>';
            }
        }else{
            echo'<script type="text/javascript">
            alert("No agregado, si stock");
            window.location.href="../Venta.php";
            </script>';
        }

    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Venta.php";
        </script>';
    }
?>