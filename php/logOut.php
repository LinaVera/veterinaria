<?php
    session_start();
    session_destroy();
    echo'<script type="text/javascript">
    alert("Sesion cerrada exitosamente.");
    window.location.href="../index.html";
    </script>';
   
?>