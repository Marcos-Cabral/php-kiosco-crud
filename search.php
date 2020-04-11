<?php include("includes/header.php")?>
<?php include("includes/footer.php")?>
   
   <div class="container my-5">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <div class="form-group">
                                <select name="producto" class="form-control">
                                    <option value="0">Seleccione producto:</option>
                                    <?php
                                        include("db.php");

                                        $query="SELECT * FROM productos";
                                        $query_cat= mysqli_query($conn,$query);
                                        
                                        while($valores = mysqli_fetch_array($query_cat)){
                                            echo '<option name="producto" value="'.$valores[id].'">'.$valores[nombre].'</option>';
                                        }

                                    ?>
                                </select>
                                <div class="form-group my-5">
                                    <input type="number" name="cantidad" placeholder="Ingrese cantidad" class="form-control" autofocus>
                                </div>
                </div>
             <input class="btn btn-primary my-2" type="submit" name="submit" value="Buscar producto"><br>
        
        </form>
        <?php   
                    if(isset($_POST['submit'])){
                        $id = $_POST['producto'];
                        $cantidad=$_POST['cantidad'];
                        $registros = $conn->query("SELECT * FROM productos WHERE id = $id");
                        
                                    
                        while($row= mysqli_fetch_array($registros)){ ?>
                           
                               <?php echo $row['id']?>
                               <?php echo $row['nombre']?>    
                               <?php echo $cantidad?>  
                         <?php                    
                        } 
                    }?>
            
       
    </div>
