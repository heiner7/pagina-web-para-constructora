<?php if(!empty($this->session))
{
  if($this->session->flashdata("success"))
  {
    echo "<div class='alert alert-success' role='alert'>". $this->session->flashdata("success")."</div>";
  }
}

$info=$this->session->all_userdata();
echo validation_errors();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>


    <link href="<?= base_url()?>css/estilos.css" rel="stylesheet">
      <link href="<?= base_url()?>css/styles.css" rel="stylesheet">
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
              <a href="https://www.linkedin.com/company/9203862?trk=tyah&amp;trkInfo=tarId%3A1418144732580%2Ctas%3AConstructora%20Navarro%20y%20Aviles%2Cidx%3A1-1-1" class="social-network linkedin" target="_blank"></a>
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
        <?php
        if($info['tipo']=='Admin' || $info['tipo']=='Empleado'){

        ?>
        <li><a href='<?php echo base_url()."index.php/main/proyecto"; ?>'  title="Proyecto">Proyecto</a></li>
        
        <?php
         }
        ?>

    <!-- Menu End -->
      </nav>
    </div>
    <!-- Navigation End -->
    <div class="row space10"></div>
    <div class="row">
      <div class="span12">

        <h2>Bienvenido: <?php echo $info['tipo'] ?></h2>
      </div>
    </div>


  </div>
</div>


<div class="span3">
          <div class="row">

            <div class="row">
            <div class="span12">
              <h2>Datos Usuario</h2>
            </div>
          </div>


                <?php


                echo form_open('Main/crearUsuario');
                      echo validation_errors(); ?>
                <!-- Declaramos los input para usuario y contraseña-->
                <label for="" class = "Datos">Cedula:</label>
                <input class="form-control" type="input" id = "cedulaU" name="cedulaU" maxlength="10"/><br />
                <label for="" class = "Datos">Contraseña:</label>
                <input class="form-control" type="input" id = "password" name="password"  /><br />
                <br>
                <select name="tipoUsuario" id="tipoUsuario">
                  <?php
                    if($info['tipo']=='Admin'){
                  ?>
                      <option value="Empleado">Empleado</option>
                      <option value="ClienteJuridico">ClienteJuridico</option>
                  <?php
                    }
                  ?>
                  <?php
                    if($info['tipo']=='Empleado'){
                  ?>
                      <option value="Usuario">Usuario</option>
                      <option value="ClienteJuridico">ClienteJuridico</option>
                  <?php
                    }
                  ?>
                </select>
                <input class="form-control  btn btn-dark" type="submit" id = "Crear" name="submit" value="Crear" />








          </div>
        </div>
      </div>
    </div>


  </body>
</html>
