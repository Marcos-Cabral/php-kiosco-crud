<?php include("db.php") ?>
<?php include("includes/header.php")?>
    

    <div class="container p-4 my-4">
        <h2>Añadir Producto</h2>
        <div class="row my-3">
           <div class="col-md-4">

                <?php if(isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-<?= $_SESSION['color']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['msg']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>


                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" placeholder="Ingrese nombre del producto" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" name="precio" placeholder="Ingrese precio del producto" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" name="costo" placeholder="Ingrese costo del producto" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="number" name="cantidad" placeholder="Ingrese cantidad del producto" class="form-control" autofocus>
                        </div>
                        <?php include("select_categorias.php")?>
                        <input type="submit" name="guardar" value="Guardar producto" class="btn btn-primary">                    
                    </form>                
                </div>
           </div>

           <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Costo</th>
                                <th>Stock</th>    
                                <th style="width:114px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <?php
                                $query="SELECT * FROM productos";
                                $resultado= mysqli_query($conn,$query);

                                while($row= mysqli_fetch_array($resultado)){ ?>
                                    <tr>
                                        <td><?php echo $row['nombre']?></td>
                                        <td><?php echo $row['precio']?></td>
                                        <td><?php echo $row['costo']?></td>
                                        <td><?php echo $row['cantidad_stock']?></td>
                                        <td>
                                            <a href="edit.php?id= <?php echo $row['id'] ?> " class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id= <?php echo $row['id'] ?> " class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }?>
                        </tbody>
                    
                    </table>
           </div>
        
        </div>
    
    
    </div>




<?php include("includes/footer.php")?>