<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="assets/img/logo_cocucci.png" class="w-75" alt="Logo"> </span><br/>
<!--                        <span class="logo_title mt-5"> Login Dashboard </span>-->
<!--            <h1>--><?php //echo $message?><!--</h1>-->

        </div>
        <div class="card-body">
            <form action="?c=usuario&a=ValidarLogin" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="nombreUsuario" class="form-control" placeholder="Usuario" required>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="passUsuario" class="form-control" placeholder="Password" required>
                </div>

                <!-- Selecciona Sector
                <div class="form-group">
                    <div class="input-group-prepend">
                        <! --<label for="inputState">Sector &nbsp &nbsp </label>-- >
                        <span class="input-group-text"><i class="fab fa-stripe-s"></i></span>
                            <select required id="selectSector" class="form-control">
                                <option value="" placeholder="Seleccione Sector" selected></option>
                                <option value="Comercial">Comercial</option>
                                <option value="Caja">Caja</option>
                                <option value="Administración">Administración</option>
                            </select>
                    </div>
                    
                </div>-->


                <div class="form-group">
                    <div class="input-group-prepend">
                        <!--<label for="inputState">Sector &nbsp &nbsp </label>-->
                        <span class="input-group-text"><i class="fas fa-stop-circle"></i></span>
                            <select required name="selectPuesto" class="form-control">
                                <option value="" placeholder="Seleccione Puesto" selected></option>
                                <option value="1">Puesto 1</option>
                                <option value="2">Puesto 2</option>
                                <option value="3">Puesto 3</option>
                                <option value="4">Puesto 4</option>
                                <option value="5">Puesto 5</option>
                                <option value="6">Puesto 6</option>
                                <option value="7">Puesto 7</option>
                                <option value="8">Puesto 8</option>
                                <option value="9">Puesto 9</option>
                                <option value="10">Puesto 10</option>

                                <option value="11">Puesto 11</option>
                                <option value="12">Puesto 12</option>
                                <option value="13">Puesto 13</option>
                                <option value="14">Puesto 14</option>
                                <option value="15">Puesto 15</option>
                                <option value="16">Puesto 16</option>
                                <option value="17">Puesto 17</option>
                                <option value="18">Puesto 18</option>
                                <option value="19">Puesto 19</option>
                                <option value="20">Puesto 20</option>

                                <option value="21">Puesto 21</option>
                                <option value="22">Puesto 22</option>
                                <option value="23">Puesto 23</option>
                                <option value="24">Puesto 24</option>
                                <option value="25">Puesto 25</option>
                                <option value="26">Puesto 26</option>
                                <option value="27">Puesto 27</option>
                                <option value="28">Puesto 28</option>
                                <option value="29">Puesto 29</option>
                                <option value="30">Puesto 30</option>

                                <option value="31">Puesto 31</option>
                                <option value="32">Puesto 32</option>
                                <option value="33">Puesto 33</option>
                                <option value="34">Puesto 34</option>
                                <option value="35">Puesto 35</option>
                                <option value="36">Puesto 36</option>
                                <option value="37">Puesto 37</option>
                                <option value="38">Puesto 38</option>
                                <option value="39">Puesto 39</option>
                                <option value="40">Puesto 40</option>
                            </select>
                    </div>
                    
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>


                <!--             select                      -->
               
<!--             select                      -->








            </form>
        </div>
    </div>
</div>