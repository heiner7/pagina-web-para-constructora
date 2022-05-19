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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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



      <nav class="navbar">
      <!-- Menu -->
      <ul class="nav">
        <!-- Menu Item -->
        <li><a href='<?php echo base_url()."index.php"; ?>'  title="Inicio">Inicio</a></li>
        <li><a href='<?php echo base_url()."index.php/main/proyecto"; ?>'  title="Inicio">Proyecto</a></li>
        <li><a >Facturación</a>
              <!-- Submenu -->
                <ul>
                  <!-- Submenu Item -->
                  <li><a href='<?php echo base_url()."index.php/main/pagoPendiente"; ?>' title="Bitacora">Recibos</a></li>
                  <li><a href='<?php echo base_url()."index.php/main/factura"; ?>' title="Comentario">Facturas</a></li>
                </ul>
                <!-- End Submenu -->
        </li>
        <li><a href='<?php echo base_url()."index.php/main/sistema"; ?>'  title="Inicio">Perfil</a></li>
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
        if($info['tipo']=='Admin' || $info['tipo']=='Empleado'){
        ?>

        <li><a href='<?php echo base_url()."index.php/main/nuevoProyecto"; ?>'  title="Inicio">Nuevo Proyecto</a></li>

        <li><a href='<?php echo base_url()."index.php/main/usuarios"; ?>'  title="Inicio">Usuarios</a></li>
        <li><a href='<?php echo base_url()."index.php/main/agregarPersona"; ?>'  title="Inicio">Agregar persona</a></li>

        <li><a href='<?php echo base_url()."index.php/main/eliminarP"; ?>'  title="Inicio">Eliminar Usuario</a></li>
        <li><a href='<?php echo base_url()."index.php/main/cobroRecibo"; ?>'  title="Inicio">Cobro</a></li>
        <li><a href='<?php echo base_url()."index.php/main/detallePago"; ?>'  title="Inicio">Detalle de pago</a></li>


        <?php
         }
        ?>
        <?php
        if($info['verificar']==true && $info['tipo']=='clienteJuridico'){
        ?>
        <li><a href='<?php echo base_url()."index.php/main/clienteJuri"; ?>'  title="ClienteJuridico">Cliente Juridico</a></li>
        <?php
      }
      ?>
    <!-- Menu End -->


    </ul>
      </nav>

<div style="width:1150px; height: 350px;overflow-y: auto;">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption><label>Pagos</label></caption>
				<thead>
					<tr>
						<th scope="col">identificador Recibo</th>
						<th scope="col">Nombre usuario</th>
						<th scope="col">Cédula</th>
						<th scope="col">Identificador Proyecto</th>

						<th scope="col">Monto total</th>
						<th scope="col">Monto a deber</th>
						<th scope="col">Mes pagado</th>
						<th scope="col">Fecha registro</th>
						<th scope="col">Descripción</th>
						<th scope="col">Presupuesto</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$post= $this->mdl_proyectos->get_factura($info['cedula']);

						foreach ($post as $key) {
					?>
						<tr>
					   <td scope="row"><?php echo $key['idRecibo']; ?></td>
                       <td><?php echo $key['nombrePersona'],' ', $key['apellido'],' ', $key['apellido2']; ?></td>
                       <td><?php echo $key['cedulaUsuario'];?></td>
                       <td><?php echo $key['idProyecto'];?></td>
                       <td><?php echo $key['montoTotal'];?></td>
                       <td><?php echo $key['montoDeber'];?></td>
                       <td><?php echo $key['mesCancelar'];?></td>
                       <td><?php echo $key['fechaRegistro'];?></td>
                       <td><?php echo $key['descripcion'];?></td>
                       <td><?php echo $key['saldo'];?></td>
                       <td>
                       		<a href="facturaPDF?idDetallePago=<?php echo $key['idDetallePago']; ?>" class="btn btn-danger btn-sm" TARGET=”_blank”>
							Reporte <span class="glyphicon glyphicon-list-alt"></span>
						</a>
                       </td>
                      </tr>	

					<?php
         			 }
            		?>
				</tbody>	
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>

  </body>
</html>
