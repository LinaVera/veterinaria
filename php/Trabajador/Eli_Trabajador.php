<?php
    $id=$_REQUEST['id'];
    require("../conexion.php");
    $saber="DELETE FROM trabajador WHERE Codigo='$id'";
    $saberBD=$conexion->query($saber);
    if($saberBD){
        echo'<script type="text/javascript">
        alert("Se eliminó trabajador exitosamente.");
        window.location.href="../Trabajador.php";
        </script>'; 
   }else{
        echo'<script type="text/javascript">
        alert("Error, no se eliminó trabajador");
        window.location.href="../Trabajador.php";
        </script>';
   }
?>