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
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>

                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>

                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
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