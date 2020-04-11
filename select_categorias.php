<div class="form-group">
                            <select name="categoria" class="form-control">
                                <option value="0">Seleccione categoria:</option>
                                <?php
                                    $query="SELECT * FROM categoria";
                                    $query_cat= mysqli_query($conn,$query);

                                    while($valores = mysqli_fetch_array($query_cat)){
                                        echo '<option name="categoria" value="'.$valores[id].'">'.$valores[nombre].'</option>';
                                    }

                                ?>
                            </select>
                        </div>