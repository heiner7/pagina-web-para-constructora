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
      <link href="<?= base_url()?>css/botonEstilos.css" rel="stylesheet">

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
        <?php
        if($info['tipo']=='Admin'){
        ?>
        <li><a href='<?php echo base_url()."index.php/main/sistema"; ?>'  title="Inicio">Usuario</a></li>
        <li><a href='<?php echo base_url()."index.php/main/nuevoProyecto"; ?>'  title="Inicio">Nuevo Proyecto</a></li>

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
    <div class="row space10"> <label><?php echo $idProyecto ?></label>
  </div>
    <div class="row">
      <div class="span12" id="selecion_btn">
        <div class="board_btn">


        <div class="container_btn">
          <img class="imagen_btn" src="https://i.pinimg.com/originals/6d/88/b8/6d88b8e6cf81ed9d67d0e2b8abd4b5cd.jpg">
          <button role="link" onclick='location.href="<?php echo site_url('Main/modiProyecto/'.$idProyecto); ?>"' class="btn_opciones">Modificar</button>

        </div>

        <div class="container_btn">
          <img class="imagen_btn" src="https://i.pinimg.com/originals/6d/88/b8/6d88b8e6cf81ed9d67d0e2b8abd4b5cd.jpg" >
          <button role="link" onclick='location.href="<?php echo site_url('Main/reciboProyecto/'.$idProyecto); ?>"' class="btn_opciones">Recibo</button>

        </div>

        </div>
      </div>
    </div>


  </div>
</div>



  </body>
</html>
