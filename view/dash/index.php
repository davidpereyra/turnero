<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="assets/img/logo_cocucci.png" class="w-75" alt="Logo"> </span><br/>
<!--                        <span class="logo_title mt-5"> Login Dashboard </span>-->
<!--            <h1>--><?php //echo $message?><!--</h1>-->

        </div>
        <div class="card-body">
            <form action="?c=usuario&a=ValidarLogin" method="post">
                <!-- Usuario -->
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="nombreUsuario" class="form-control" placeholder="Usuario" required>
                </div>
                <!-- Pass -->
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="passUsuario" class="form-control" placeholder="Password" required>
                </div>
                <!-- Puesto -->
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-stop-circle"></i></span>
                            <select required name="selectPuesto" class="form-control" placeholder="Seleccione Puesto">
                                <option value="" placeholder="Seleccione Puesto" selected></option>
                                
                                    <?php                                    
                                    for ($i = 0; $i <= 35; $i++) {
                                    ?>
                                        <option value="<?php print $i;?>">
                                            Puesto <?php  echo $i;}?>
                                        </option>
                            </select>
                    </div>
                    
                </div>

                <?php 
       
                    if( isset($_GET["msg"]) ){
                        $msg = $_GET['msg'];
                        
                ?>




                <div class="alert alert-danger" role="alert">
                    <button class="close" data-dismiss="alert">
                        <span>
                           &times;
                        </span>
                    </button>
                    
                    <strong>Error: </strong>
                    <?php 
                                        
                        echo $msg;
                        
                    ?>
                </div>
                <?php 
                    }
                ?>



                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>
            </form>
        </div>
    </div>
</div>