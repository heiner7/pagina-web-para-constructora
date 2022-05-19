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
      <li><a href='<?php echo base_url()."index.php"; ?>'  title="Inicio">Inicio</a></li>
      <?php
      if($info['tipo']=='Admin'){
      ?>
    
      <li><a href='<?php echo base_url()."index.php/main/proyecto"; ?>'  title="Proyecto">Proyecto</a></li>
      <li><a href='<?php echo base_url()."index.php/main/sistema"; ?>'  title="Inicio">Usuario</a></li>
      <?php
       }
      ?>
      <?php
      if($info['verificar']==true && $info['tipo']!='Admin'){
      ?>
      <li><a href='<?php echo base_url()."index.php/main/clienteJuri"; ?>'  title="ClienteJuridico">Cliente Juridico</a></li>
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

        <h2>Ingrese a Nuestros servicios</h2>
      </div>
    </div>

    <div class="row">


      <div class="bitacora">

        <h1>Ingrese datos del proyecto</h1>

        <?php

        echo form_open('Main/agregarProyecto');

        echo validation_errors(); ?>
          <label>Nombre del proyecto: </label>
          <br>
          <input class="form-control" type="input" id = "nombreProyecto" name="nombreProyecto" /><br />
          <label>Descripcion</label>
          <br>
          <input class="form-control" type="input" id = "descripcion" name="descripcion" /><br />
          <label>Costo total del proyecto: </label>
          <br>
        <input class="form-control" type="input" id = "costoTotal" name="costoTotal" /><br />

          <label>Fecha de inicio: </label>
        <br>
          <input class="form-control" type="date" id = "fechaInicio" name="fechaInicio" /><br />
          <label>Fecha final: </label>
          <br>
          <input class="form-control" type="date" id = "fechaFinal" name="fechaFinal" /><br />
           <label>Avance financiero: </label>
          <br>
            <input class="form-control" type="input" id = "avanceFinanciero" name="avanceFinanciero" /><br />
             <label>Compesación de plazo: </label>
          <br>
            <input class="form-control" type="input" id = "compePlazo" name="compePlazo" /><br />

<!-- Los datos siguientes deben ir ocultos -->
          <label>Fecha de modificación: </label>
          <br>
          <input class="form-control" type="date" id = "fechaModificacion" name="fechaModificacion" /><br />
          <label>Agregado para: </label><br>
          <input class="form-control" type="number" id = "usuario" name="usuario" /><br />
          <br>
        <input class="form-control  btn btn-dark" type="submit" id = "nuevoProyecto" name="submit" value="Agregar" />

        
      </div>
       <!-- Declaramos el link para redireccionarme a el registro-->



    </div>

  </div>
</div>



  </body>
</html>
