<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link href="<?= base_url()?>css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>css/cabecera.css">
    <link rel="stylesheet" href="<?= base_url()?>css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
      

  </head>
  <body><div class="space30"></div>
  <!-- Content -->
  <div class="content">
    <!-- Site -->
    <div class="container site">

      <div class="row">
        <div class="span12">
          <!-- Header -->
          <div class="row">
            <!-- Logo Container -->
            <div class="span5 logo">
              <a href="/es/"><img src="img/image.jpg" alt="Constructora Umaña"></a>
            </div>
            <!-- Logo Container End -->
            <!-- Social Icons -->
            <div class="span4 social-top hidden-phone">
              <a href="" class="social-network linkedin" target="_blank"></a>
            </div>
            <!-- Social Icons End -->
            <div class="span3">
              <!-- Search Container -->
              <div class="search-box">
                <!-- Search Icon -->
                <a href="#" class="search-icon" onclick="preSearch(1); return false;"><i class="icon-search"></i></a>
                <!-- Search Input -->
                <input class="search" name="" value="" placeholder="Buscar" onkeyup="preSearch(2);">
              </div>
              <!-- Search Container End -->
            </div>
          </div>


    <div class="content">


      <nav class="navbar">
      <!-- Menu -->
      <ul class="nav">
        <!-- Menu Item -->
        <li><a href='<?php echo base_url()."index.php"; ?>'  title="Inicio">Inicio</a></li>
    <!-- Menu End -->
      </nav>
    </div>
    <!-- Navigation End -->
    <div class="row space10"></div>
    <div class="row">
      <div class="span12">

        <h1 class="animate__animated animate__backInLeft">Ingrese a Nuestros servicios</h1>
      </div>
    </div>

    <div class="row">

      <div id ="login">

        <?php

        echo form_open('Main/login_action');

        echo validation_errors(); ?>
      <!-- Declaramos los input para usuario y contraseña-->
      <label for="" class = "Login">Cedula:</label>
      <input class="form-control" type="input" id = "cedulaR" name="cedulaR" /><br />
      <label for="" class = "Login">Contraseña</label>
      <input class="form-control" type="password" id = "password" name="password" /><br />

      <input class="form-control  btn btn-dark" type="submit" id = "LoginSesion" name="submit" value="Iniciar Sesion" />
       <!-- Declaramos el link para redireccionarme a el registro-->
      <a href='<?php echo base_url()."index.php/Main/registro"; ?>' id ="registro">Registrarse</a>


      </div>

    </div>

  </div>
</div>



  </body>
</html>
