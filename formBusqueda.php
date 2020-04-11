
<?php include("includes/header.php");?>
<div class="container p-4 my-4">
    <h2>Busca el producto por nombre</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group my">
            <input class="form-control" type="text" name="name" placeholder="Ingresa el nombre del producto a buscar">
        </div>
    
    <input class="btn btn-primary my-2" type="submit" name="submit" value="Buscar producto"><br>
    
    </form>


    <table class="table table-bordered my-5">
       
            <thead>
                <tr>   
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Costo</th>
                    <th>Stock</th>                      
                </tr>
            </thead>
            <tbody>
                <?php   
                    if(isset($_POST['submit'])){
                        include("db.php");
                        $name = $_POST['name'];
                        $registros = $conn->query("SELECT * FROM productos WHERE nombre like '%$name%'");
                        
                                    
                        while($row= mysqli_fetch_array($registros)){ ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['precio']?></td>                                        
                                <td><?php echo $row['costo']?></td>
                                <td><?php echo $row['cantidad_stock']?></td>     
                            </tr>                               
                         <?php                    
                        } 
                    }?>
        </tbody>
                    
    </table>

</div>

<?php include('includes/footer.php')?>