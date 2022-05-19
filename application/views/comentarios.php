<!DOCTYPE html>
<html>
<head>
    <title>Enviar comentario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap2.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/animate.css">

</head>
<body style="background-color: #7e7e7e">
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
    <div class="well" style="margin-top: 10%;">
    <h3>Enviar un mensaje</h3>
    <?php
          echo form_open('Main/agregarComentario');
                      echo validation_errors(); ?>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="idBitacora" class="h4">Identificador</label>
                <input type="number" class="form-control" id="idBitacora" name="idBitacora" value="<?php echo $idBitacora ?>" readonly="">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-sm-6">
                <label for="fechaRegis" class="h4">Fecha Registro</label>
                <input type="date" class="form-control" id="fechaRegis" name="fechaRegis" placeholder="" required>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="Comentario" class="h4 ">Mensaje</label>
            <textarea name="Comentario" id="Comentario" class="form-control" rows="5" placeholder="Digite su comentario" required></textarea>
            <div class="help-block with-errors"></div>
        </div>
        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Enviar</button>
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