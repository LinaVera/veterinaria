<?php
    $cliente= $_POST['cliente'];
    $total = $_POST['total'];
    //hora y fecha
    date_default_timezone_set("America/Bogota");
    $fecha = date("Y-m-d");
    $hora = date("H:i");
    require("../conexion.php");
    //empleado
    session_start();
    $empleado = $_SESSION['codigo'];

    if($cliente !=null){
        //buscar cliente
        $sql="SELECT * FROM usuario WHERE Cedula = '$cliente'";
        $resultado=$conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        $idC=$fila['Codigo'];
        $con=$resultado->num_rows;
            if($con>0){
            //hacer factura
            $sql="INSERT INTO factura_producto(`Usuario`,`Total`,`Trabajador`,`Fecha`,`hora`) 
            VALUES ('$idC','$total','$empleado', '$fecha' , '$hora')";
            if($saberBD=$conexion->query($sql)){
                //obtener ultimo registro
                $sqll="SELECT id FROM factura_producto ORDER BY id DESC limit 1";
                $resultadol = $conexion->query($sqll);
                $fila = $resultadol->fetch_assoc();
                $id=$fila['id'];
                //cambiar detalle
                $sql = "UPDATE detalle SET Factura ='$id' WHERE Factura IS NULL ";
                if($saberBD=$conexion->query($sql)){
                    echo'<script type="text/javascript">
                    alert("Compra registrada");
                    window.location.href="../Venta.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("Detalle NO actualizado");
                    window.location.href="../Venta.php";
                    </script>';
                }
                echo'<script type="text/javascript">
                    alert("Compra registrada");
                    window.location.href="../Venta.php";
                    </script>';
            }else{
                echo'<script type="text/javascript">
                alert("Compra NO registrada");
                window.location.href="../Venta.php";
                </script>';
            }
        }else{
            echo'<script type="text/javascript">
            alert("Usuario no registrado");
            window.location.href="../Venta.php";
            </script>';
        }
    }else{
        echo'<script type="text/javascript">
        alert("Campos invalidos");
        window.location.href="../Venta.php";
        </script>';
    }    
?>