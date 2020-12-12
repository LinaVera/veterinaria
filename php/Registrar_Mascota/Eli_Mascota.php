<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM mascota WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
    if($saberBD){
        echo'<script type="text/javascript">
        alert("Se eliminó mascota exitosamente.");
        window.location.href="../Mascota.php";
        </script>'; 
   }else{
        echo'<script type="text/javascript">
        alert("Error, no se eliminó mascota, actualmente tiene servicio asignado.");
        window.location.href="../Mascota.php";
        </script>';
   }
?>