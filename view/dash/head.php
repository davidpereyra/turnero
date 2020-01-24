<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="?c=usuario&a=InicioDash" class="logo"><b>COC<span>UCCI</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
       <p>Menu Superior</p>
        <!--  notification end -->
      </div>

      
      <div class="top-menu">
      
        <ul class="nav pull-right top-menu">
          <li>
         <form name="logout" action="?c=usuario&a=Logout" method="post">
            <input type="hidden" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>">
            <!-- btn btn-primary btn-lg btn-block btnFuncion--> 
            <button class="btn btn-success" name="nombreUsuario" value="<?php echo $_SESSION['usuario'];?>" type="submit" >
            Salir
            </button>
          </form>  
              <!--
         <a class="logout" type="button" href="?c=usuario&a=Logout">Salir</a> 
          -->
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->


