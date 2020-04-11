<?php 

include("db.php");

    if(isset($_GET['id'])){

        $id=$_GET['id'];

        $query="DELETE FROM productos WHERE id=$id";

        $resultado= mysqli_query($conn, $query);

        if(!$resultado){ 
            die("Query failed in delete");
        }
        $_SESSION['msg']="Producto eliminado correctamente";
        $_SESSION['color']="danger";

        header("Location: index.php");
    }


?>