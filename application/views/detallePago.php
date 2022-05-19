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

        <h2>Sobre detalles</h2>
      </div>
    </div>

    <div class="row">


      <div class="bitacora">

        <h1>Detalles de pago</h1>

        <?php

        echo form_open('Main/agregarDetallePago');

        echo validation_errors(); ?>
          <label>ID de pago: </label>
          <br>
          <input class="form-control" type="input" id = "idPago" name="idPago" /><br />
          <label>ID Presupuesto</label>
          <br>
          <input class="form-control" type="input" id = "idPresupuesto" name="idPresupuesto" /><br />
          <label>Descripcion: </label>
          <br>
        <input class="form-control" type="input" id = "descripcion" name="descripcion" /><br />

          <label>Monto Total: </label>
        <br>
          <input class="form-control" type="input" id = "montoTotal" name="montoTotal" /><br />
          <label>Monto a deber: </label>
          <br>
          <input class="form-control" type="input" id = "montoDeber" name="montoDeber" /><br />
           <label>Fecha Registro: </label>
          <br>
            <input class="form-control" type="date" id = "fechaRegistro" name="fechaRegistro" /><br />

        <input class="form-control  btn btn-dark" type="submit" id = "nuevoProyecto" name="submit" value="Agregar" />

        </form>
      </div>
       <!-- Declaramos el link para redireccionarme a el registro-->



    </div>

  </div>
</div>



  </body>
</html>
