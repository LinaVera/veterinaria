<?php
    $fac = $_POST['fac'];
    $dep = $_POST['departamento'];
    $dir = $_POST['dir'];
    $ad = $_POST['ad'];
    //hora y fecha
    date_default_timezone_set("America/Bogota");
    $fecha = date("Y-m-d");
    $hora = date("H:i");
    require("../conexion.php");

    if ($fac != -1 && $dep != -1 && $dir != null && $ad >=0) {
        $sql="SELECT d.precio, fp.Usuario FROM departamentos d, factura_producto fp 
        WHERE d.id_departamento = '$dep' AND fp.id = '$fac'";
        $resultado=$conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        $idU=$fila['Usuario'];
        $precio=$fila['precio'] + $ad;
        $sql="INSERT INTO domicilio(`Factura`,`Usuario`,`Departamento`,`direccion`,`precio`,`Fecha`,`hora`) 
            VALUES ('$fac','$idU','$dep', '$dir', '$precio', '$fecha' , '$hora')";
            if($saberBD=$conexion->query($sql)){
                echo'<script type="text/javascript">
                alert("Domicilio registrado. Valor a pagar: '.$precio.'");
                window.location.href="../Domicilio.php";
                </script>';
            }else{
                echo'<script type="text/javascript">
                alert("Domicilio no registrado");
                window.location.href="../Domicilio.php";
                </script>';
            }
    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Domicilio.php";
        </script>';
    }
?>