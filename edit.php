<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="SELECT * FROM productos WHERE id=$id";

        $resultado= mysqli_query($conn,$query);

        if(mysqli_num_rows($resultado) == 1){

            $row=mysqli_fetch_array($resultado);
            $nombre=$row['nombre'];
            $precio=$row['precio'];
            $costo=$row['costo'];
            $cantidad_stock=$row['cantidad_stock'];
            $categoria=$row['categoria'];
        }

    }

    if(isset($_POST['editar'])){
        $id=$_GET['id'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $costo=$_POST['costo'];
        $cantidad_stock=$_POST['cantidad']; 

        $query="UPDATE productos set nombre='$nombre', precio='$precio',costo='$costo',cantidad_stock='$cantidad_stock' WHERE id=$id";

        $resultado=mysqli_query($conn,$query);

        if(!$resultado){
            die('query error');
        }

        $_SESSION['msg']="Producto editado";
        $_SESSION['color']="warning";

        header("Location: index.php");

    }
/* como no tengo vista para esta funcion voy a crear una vista donde salga el mismo cuadrado con la informacion anterior del producto */
?>

<?php include("includes/header.php")?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" value="<?php echo $nombre?>" placeholder="Actualiza el nombre" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                        <label for="nombre">Precio</label>
                            <input type="number" name="precio" value="<?php echo $precio?>" placeholder="Actualiza el precio" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                        <label for="nombre">Costo</label>
                            <input type="number" name="costo" value="<?php echo $costo?>" placeholder="Ingrese costo del producto" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                        <label for="nombre">Cantidad actual</label>
                            <input type="number" name="cantidad" value="<?php echo $cantidad_stock?>" placeholder="Ingrese cantidad del producto" class="form-control" autofocus>
                        </div>                        

                        <button class="btn btn-success btn-block" name="editar">
                            Editar
                        </button>                
                    </form>     
                </div>
            </div>
        </div>

    </div>


<?php include("includes/footer.php")?>
