<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM producto WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
    if($saberBD){
        echo'<script type="text/javascript">
        alert("Se eliminó producto exitosamente.");
        window.location.href="../Producto.php";
        </script>'; 
   }else{
        echo'<script type="text/javascript">
        alert("Error, no se eliminó producto.");
        window.location.href="../Producto.php";
        </script>';
   }
?>