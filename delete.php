<?php 

include("db.php");

    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $query_buscar="select * from detalle_venta where id_prod=$id";
        
        $eliminar_ventas="DELETE FROM detalle_venta WHERE id_prod=$id";

        $resultado= mysqli_query($conn, $eliminar_ventas);

        if($resultado){
            echo 'ventas del prod eliminado  ';
           
            $eliminar_prod="DELETE FROM productos WHERE id=$id";
            $eliminado =mysqli_query($conn,$eliminar_prod);
           
            if($eliminado){
                echo 'prod elminado';
            }
        } 
        

        $_SESSION['msg']="Producto eliminado correctamente";
        $_SESSION['color']="danger";

        header("Location: index.php");
    }


?>