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


      <nav class="navbar">
      <!-- Menu -->
      <ul class="nav">
        <!-- Menu Item -->
        <li><a href='<?php echo base_url()."index.php"; ?>'  title="Inicio">Inicio</a></li>

        <li><a href='<?php echo base_url()."index.php/main/proyecto"; ?>'  title="Proyecto">Proyecto</a></li>
        <li><a >Facturación</a>
              <!-- Submenu -->
                <ul>
                  <!-- Submenu Item -->
                  <li><a href='<?php echo base_url()."index.php/main/pagoPendiente"; ?>' title="Bitacora">Recibos</a></li>
                  <li><a href='<?php echo base_url()."index.php/main/factura"; ?>' title="Comentario">Facturas</a></li>
                </ul>
                <!-- End Submenu -->
        </li>

        <?php
        if($info['tipo']=='Admin' || $info['tipo']=='Empleado'){
        ?>
        <li><a href='<?php echo base_url()."index.php/main/moduloProyecto"; ?>'  title="ProyectoNuevo">Nuevo Proyecto</a></li>
        <li><a href='<?php echo base_url()."index.php/main/nuevaBitacora"; ?>'  title="nuevaBitacora">Nueva Bitacora</a></li>
        <?php
         }
        ?>
        <li><a title="Reportes">Reportes</a>
                <!-- Submenu -->
                <ul>
                  <!-- Submenu Item -->
                  <li><a href='<?php echo base_url()."index.php/main/reporteBitacora"; ?>' title="Bitacora">Bitacora</a></li>
                  <li><a href='<?php echo base_url()."index.php/main/reporteComentario"; ?>' title="Comentario">Comentario</a></li>
                </ul>
                <!-- End Submenu -->
              </li>
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

        <h2>Bienvenido: <?php echo $info['tipo'] ?></h2>
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

              <form class="" action="modiPersona" method="post">
                <?php   echo validation_errors(); ?>
                <!-- Declaramos los input para usuario y contraseña-->
                <label for="" class = "Datos">Cedula:</label>
                <input class="form-control" type="input" id = "cedula" name="cedula" maxlength="10" value="<?php echo $info['cedula'] ?>" /><br />
                <label for="" class = "Datos">Nombre:</label>
                <input class="form-control" type="input" id = "nombre" name="nombre" value= "<?php echo $info['nombrePersona'] ?>" /><br />
                <label for="" class = "Datos">Primer Apellido</label>
                <input class="form-control" type="input" id = "priApellido" name="priApellido" value="<?php echo $info['apellido'] ?>" /><br />

                <label for="" class = "Datos">Segundo Apellido</label>
                <input class="form-control" type="input" id = "seApellido" name="seApellido" value="<?php echo $info['apellido2'] ?>" /><br />
          </div>
</div>

        <div class="span3">
          <div class="row">

            <div class="row">
            <div class="span12">
              <h2>Contacto Usuario</h2>
            </div>
          </div>


                <!-- Declaramos los input para usuario y contraseña-->

                <label for="" class = "Datos">Telefono:</label>
                <input class="form-control" type="input" id = "telefono" name="telefono" value="<?php echo $info['telefono'] ?>" /><br />
                <label for="" class = "Datos">Celular:</label>
                <input class="form-control" type="input" id = "celular" name="celular" value="<?php echo $info['celular'] ?>" /><br />
                <label for="" class = "Datos">Correo</label>
                <input class="form-control" type="input" id = "correo" name="correo" value="<?php echo $info['correo'] ?>" /><br />
              
                <input class="form-control  btn btn-dark" type="submit" id = "Modificar" name="submit" value="Modificar" />

          </form>
          </div>
        </div>

  </body>
</html>
