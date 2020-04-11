<?php
    include("db.php");
    
    if(isset($_POST['guardar'])){
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $costo=$_POST['costo'];
        $cantidad=$_POST['cantidad'];
        $categoria=$_POST['categoria'];

        $query="INSERT INTO productos (nombre, precio,costo,cantidad_stock,categoria) VALUES ('$nombre', '$precio','$costo','$cantidad','$categoria')";

        $resultado=mysqli_query($conn,$query);

        if(!$resultado){
            die('query error');
        }

        $_SESSION['msg']='Producto guardado correctamente';
        $_SESSION['color']='success';

        header("Location: index.php");

    }


?>