<?php 

include("db.php");

      
        $eliminar_ventas="TRUNCATE TABLE detalle_venta";

        $resultado= mysqli_query($conn, $eliminar_ventas);

        if($resultado){
            echo 'ventas del prod eliminado  ';
      } 
        

        $_SESSION['msg']="Producto eliminado correctamente";
        $_SESSION['color']="danger";

        header("Location: venta-detalle.php");    


?>