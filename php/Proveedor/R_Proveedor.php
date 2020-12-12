<?php
 $nit= $_POST['nit'];
 $representante = $_POST['representante'];
 $empresa = $_POST['empresa'];
 $depa= $_POST['departamento'];
 $direccion= $_POST['direccion'];
 require("../conexion.php");
 if($nit !=null && $representante != null && $empresa != null && $depa != -1 ){
    $sql="SELECT * FROM proveedor WHERE NIT='$nit'";
    $resultado=$conexion->query($sql);
    $con=$resultado->num_rows;
    //No exista ya el codigo
        if($con>0){
            echo'<script type="text/javascript">
            alert("Ya existe proovedor.");
            window.location.href="../Proveedor.php";
            </script>';
        }else{
            $saber="INSERT INTO proveedor(`NIT`, `Representante`,`empresa`,`direccion`,`departamento`) VALUES('$nit', '$representante' ,'$empresa', '$direccion','$depa')";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se registró proveedor exitosamente.");
                    window.location.href="../Proveedor.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se registró proveedor.");
                    window.location.href="../Proveedor.php";
                    </script>';  
                }
        }

 }else{
    echo'<script type="text/javascript">
    alert("Campos invalidos");
    window.location.href="../Proveedor.php";
    </script>';

 }
?>