<?php
 $nit= $_POST['nit'];
 $id= $_POST['id'];
 $representante = $_POST['representante'];
 $empresa = $_POST['empresa'];
 $depa= $_POST['departamento'];
 $direccion= $_POST['direccion'];
 $categoria= $_POST['categoria'];
 require("../conexion.php");
 if($nit !=null && $representante != null && $empresa != null && $depa != -1 && $categoria != -1){
    $sql="SELECT * FROM proveedor WHERE NIT='$nit'";
    $resultado=$conexion->query($sql);
    $con=$resultado->num_rows;
    //No exista ya el codigo
        if($con>1){
            echo'<script type="text/javascript">
            alert("Ya existe proovedor.");
            window.location.href="../Proveedor.php";
            </script>';
        }else{
                $saber="UPDATE proveedor SET NIT='$nit', Representante = '$representante', empresa = '$empresa', direccion = '$direccion', departamento = '$depa', categoria = '$categoria' WHERE id = '$id'";
                if($saberBD=$conexion->query($saber)){
                    echo'<script type="text/javascript">
                    alert("Se actualizó proveedor exitosamente.");
                    window.location.href="../Proveedor.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Error, no se actualizó proveedor.");
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