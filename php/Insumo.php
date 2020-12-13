<?php
 $codigo = $_POST['codigo2'];
 $cant= $_POST['cant'];
 require("conexion.php");
 if ($codigo != 0 && $cant >0) {
     $sql= "SELECT pr.id, p.Precio_Compra * '$cant' as r FROM Producto p, proveedor1 pr WHERE p.proveedor = pr.id AND p.Codigo = '$codigo'";
     $resultadol = $conexion->query($sql);
     if($fila = $resultadol->fetch_assoc()){
       $provee = $fila['id'];
       $precio= $fila['r'];
       
       $sql="INSERT INTO insumo(`Producto`,`Proveedor`,`Precio`,`Cantidad`) VALUES ('$codigo','$provee','$precio','$cant')";
        if($saberBD=$conexion->query($sql)){
            echo'<script type="text/javascript">
            alert("Se realizó pedido. Total: '.$precio.'");
            window.location.href="inventario.php";
            </script>';
        }else{
            echo'<script type="text/javascript">
            alert("Error, no se realizó pedido.");
            window.location.href="inventario.php";
            </script>';           
        }  
    }else{
        echo'<script type="text/javascript">
        alert("Error producto no existe");
        window.location.href="inventario.php";
        </script>';  
    }
 }
 else{
    echo'<script type="text/javascript">
    alert("Campos invalidos");
    window.location.href="inventario.php";
    </script>';
}
?>