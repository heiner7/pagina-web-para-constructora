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
        <!-- Menu Item -->
        <li><a href='<?php echo base_url()."index.php"; ?>'  title="Inicio">Inicio</a></li>
        <li><a href='<?php echo base_url()."index.php/main/sistema"; ?>'  title="Inicio">Usuario</a></li>
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

        <form class="" action="agregarBitacora" method="post">            
          <label>Fecha de modificación: </label>
        <br>
          <input class="form-control" type="date" id = "fechaModi" name="fechaModi" /><br />
          
           <label>Identificador del proyecto: </label>
          <br>
            <input class="form-control" type="number" id = "idProyecto" name="idProyecto" /><br />

             <label>Detalle de cambios: </label>
          <br>
            <input class="form-control" type="input" id = "detalleCambio" name="detalleCambio" /><br />

          
        <input class="form-control  btn btn-dark" type="submit" id = "nuevaBitacora" name="submit" value="Agregar" />

        </form>
      </div>
       <!-- Declaramos el link para redireccionarme a el registro-->



    </div>

  </div>
</div>



  </body>
</html>
