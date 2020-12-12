<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM proveedor WHERE id='$id'";
    $saberBD=$conexion->query($saber);
    if($saberBD){
        echo'<script type="text/javascript">
        alert("Se eliminó proveedor exitosamente.");
        window.location.href="../Proveedor.php";
        </script>'; 
   }else{
        echo'<script type="text/javascript">
        alert("Error, no se eliminó proveedor");
        window.location.href="../Proveedor.php";
        </script>';
   }
?>