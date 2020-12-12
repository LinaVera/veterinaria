<?php
date_default_timezone_set("America/Bogota");
$id= $_POST['id'];
$servicio = $_POST['servicio'];
$mascota = $_POST['mascota'];
$fecha = $_POST['fecha'];
$hora=$_POST['hora'];
$min=$_POST['minutos'];
$horaT=$hora.":".$min;
$fechaAc= date("Y-m-d");

if($servicio!=0 && $mascota!=0 && $fecha!=null && $hora!=0 && $min!=-1){
    require("../conexion.php");
    if($fecha < $fechaAc){
        echo'<script type="text/javascript">
        alert("Fecha invalida");
        window.location.href="../AtencionMascota.php";
        </script>';
    }else{
        $sql="SELECT * FROM atencion_a_la_mascota WHERE Cod_Servicio='$servicio' AND Fecha='$fecha' AND hora='$horaT' AND Codigo!='$id'";
        $resultado=$conexion->query($sql);
        $con=$resultado->num_rows;
        if($con>0){
            echo'<script type="text/javascript">
            alert("Este servicio ya esta reservado.");
            window.location.href="../AtencionMascota.php";
            </script>';
        }else{
            $sql="UPDATE atencion_a_la_mascota SET Cod_Servicio='$servicio', Cod_Mascota ='$mascota', Fecha='$fecha', hora='$horaT' WHERE Codigo='$id'";
            if($saberBD=$conexion->query($sql)){
                echo'<script type="text/javascript">
                alert("Se actualizó atención exitosamente.");
                window.location.href="../AtencionMascota.php";
                </script>';
            }else{
                echo'<script type="text/javascript">
                alert("Error, no se actualizó atención.");
                window.location.href="../AtencionMascota.php";
                </script>';           
            }   
        }
    }
}else{
    echo'<script type="text/javascript">
            alert("Campos invalidos");
            window.location.href="../AtencionMascota.php";
            </script>';
}
?>

