<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM atencion_a_la_mascota WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
   if($saberBD){
        echo'<script type="text/javascript">
        alert("Se eliminó atención exitosamente.");
        window.location.href="../AtencionMascota.php";
        </script>'; 
   }else{
        echo'<script type="text/javascript">
        alert("Error, no se eliminó atención.");
        window.location.href="../AtencionMascota.php";
        </script>';
   }
?>