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
<html>
<head>
    <title>Correo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap2.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/animate.css">
</head>
<body style="background-color: #7e7e7e">

    <?php
        $post= $this->mdl_proyectos->get_proyectos($idProyecto);
        $correoUsua = $this->mdl_usuarios->get_persona($post['cedula']);
    ?>

<div class="row">
<div class="col-sm-6 col-sm-offset-3">
    <div class="well" style="margin-top: 10%;">
    <h3>Enviar un mensaje</h3>
    <?php
          echo form_open('Main/correoUsuario');
                      echo validation_errors(); ?>
    
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="name" class="h4">Nombre del Empleado</label>
                <input type="text" class="form-control" id="name" name="nombre" value= "<?php echo $info['nombrePersona']?>" readonly required data-error="NEW ERROR MESSAGE">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6">
                <label for="idProyecto" class="h4">Identificador Proyecto</label>
                <input type="text" class="form-control" id="idProyecto" name= "idProyecto" value="<?php echo $idProyecto ?>" readonly required data-error="NEW ERROR MESSAGE">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6">
                <label for="emailUsuario" class="h4">Email del usuario</label>
                <input type="emailUsuario" class="form-control" id="emailUsuario" name= "emailUsuario" value="<?php echo $correoUsua['correo'] ?>" readonly="" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6">
                <label for="emailEmpleado" class="h4">Email del Empleado</label>
                <input type="emailEmpleado" class="form-control" id="emailEmpleado" name= "emailEmpleado" value="<?php echo $info['correo'] ?>" readonly="" required>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="h4 ">Mensaje</label>
            <textarea name= "message" id="message" class="form-control" rows="5" placeholder="Digite su mensaje" required></textarea>
            <div class="help-block with-errors"></div>
        </div>
        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
        <div id="msgSubmit" class="h3 text-center hidden"></div>
        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-left " onclick="window.history.back();">Regresar</button>
        <div id="msgSubmit" class="h3 text-center hidden"></div>
        <div class="clearfix"></div>
    
    </div>
</div>
</div>
</body>
<script  type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/validator.min.js"></script>
<script type="text/javascript" src="js/form-scripts.js"></script>
</html>
