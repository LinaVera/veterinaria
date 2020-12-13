<?php
    $id=$_REQUEST['id'];
    $cant= $_REQUEST['cant'];
    $pro= $_REQUEST['pro'];
    require("../conexion.php");
    $saber="DELETE FROM detalle WHERE id='$id'";
    $saberBD=$conexion->query($saber);
    if($saberBD){
        $sql = "UPDATE producto SET Cantidad = Cantidad + '$cant' WHERE Codigo = '$pro' ";
        $saberBD=$conexion->query($sql);
        echo'<script type="text/javascript">
            alert("Se eliminó producto");
            window.location.href="../Venta.php";
            </script>';
    }else{
        echo'<script type="text/javascript">
            alert("No se eliminó priducto");
            window.location.href="../Venta.php";
            </script>';
    }
?>