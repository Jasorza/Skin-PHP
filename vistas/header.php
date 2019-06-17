<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>SkinCol | Dashboard</title>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../public/css/mdb.min.css">
  <link rel="stylesheet" href="../public/css/style.min.css">
  <!--<link rel="stylesheet" href="css/estilos.css" />-->
  <link rel="shortcut icon" type="" href="../public/favicon.ico" />
  <!-- DATATABLES-->
  <link rel="stylesheet" type="text/css" href="../public/DataTables/datatables.min.css"/>
</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="index.html" target="_blank">
          <img src="../public/img/Logo Skin Black.png" style="width:150px" alt="">
        </a>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav nav.pills mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="proveedor.php" >Proveedores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="facturainsumos.php">Facturas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#" >Ventas</a>
            </li>
          </ul>

          <!-- Right -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

             <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"> 
                    <i class="fas fa-user"> </i> <?php echo $_SESSION["nombres"] ?> 
                  </span>  
               </a>
                <ul class="dropdown-menu">
                    <li class="user-header" >
                      <p>
                        Desarrollador de Software
                        <small><i class="fa fa-youtube-play" aria-hidden="true"></i>www.youtube.com</small>
                      </p>
                    </li>

                    <li class="user-footer">
                      <div class="pull-right"> 
                        <a href="../ajax/usuario.php?op=salir" class="btn btn danger-color">Cerrar Sesión</a>
                      </div>
                    </li>
                </ul>
              </li>
              <!-- /User Account: style can be found in dropdown.less -->
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
  </header>

