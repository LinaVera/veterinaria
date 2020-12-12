<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM usuario WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
    if($saberBD){
        echo'<script type="text/javascript">
        alert("Se eliminó Usuario exitosamente.");
        window.location.href="../Usuario.php";
        </script>'; 
   }else{
        echo'<script type="text/javascript">
        alert("Error, no se eliminó Usuario, actualmente tiene servicio asignado.");
        window.location.href="../Usuario.php";
        </script>';
   }
?>