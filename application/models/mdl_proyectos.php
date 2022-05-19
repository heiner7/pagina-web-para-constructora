<?php

/**
 *
 */
class Mdl_Proyectos extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}


	 // obtiene los datos del proyecto de acuerdo su id
public function get_proyectos($idProyecto='')
{
	$query = $this->db->get_where('tbl_proyecto', array('idProyecto' => $idProyecto));
	return $query->row_array();
}
   public function agregarProyecto($nombre,$descripcion,$costoTotal,$fechaInicio,$fechaFinal,$avanceFinan,$compePlazo,$fechaEntrega,$cliente)
  {
   $this->load->helper('url');
      $data= array(
            //'idProyecto' => $this->input->post('idProyecto'),
            'nombreProyecto' => $nombre,
            'descriProyecto' => $descripcion,
            'costoTotal' => $costoTotal,
						'fechaInicio' => $fechaInicio,
						'fechaFinal' => $fechaFinal,
						'avanFinanciero' => $avanceFinan,
						'compePlazo' => $compePlazo,
						'fechaEntregaActual' => $fechaEntrega,
						'cedula' => $cliente,

      );
       return $this->db->insert('tbl_proyecto', $data);


    }
 public function modiProyecto($nombre,$descripcion,$costoTotal,$fechaInicio,$fechaFinal,$avanceFinan,$compePlazo,$fechaEntrega,$cliente=null)
 {
	    $this->load->helper('url');
	 $data= array(
				 //'idProyecto' => $this->input->post('idProyecto'),
				 'nombreProyecto' => $nombre,
				 'descriProyecto' => $descripcion,
				 'costoTotal' => $costoTotal,
				 'fechaInicio' => $fechaInicio,
				 'fechaFinal' => $fechaFinal,
				 'avanFinanciero' => $avanceFinan,
				 'compePlazo' => $compePlazo,
				 'fechaEntregaActual' => $fechaEntrega,
	 );
		$this->db->where('cedula',$cliente);
		return $this->db->update('tbl_proyecto', $data);
 }
    public function agregarBitacora($fechaModi,$idProyecto,$detalleCambio)
    {
    	$data= array(
            //'idProyecto' => $this->input->post('idProyecto'),
            'fechaModificacion' => $fechaModi,
            'idProyecto' => $idProyecto,
            'detalleDeCambios' => $detalleCambio,

      );
       return $this->db->insert('tbl_bitacora', $data);
    }
    public function agregarComentario($fechaRegis,$comentario,$idBitacora)
    {
    	$data= array(
    		'idBitacora' => $idBitacora,
    		'comentario' => $comentario,
            'fechaRegistro' => $fechaRegis,

      );
       return $this->db->insert('tbl_comentario', $data);
    }

    public function correo($name,$idProyecto,$emailUsuario,$emailEmpleado,$message)
    {
    	$proyecto = $this->mdl_proyectos->get_proyectos($idProyecto);
    		$result="";
			require 'phpmailer/PHPMailerAutoload.php';
		    $mail = new PHPMailer;
		    $mail->isSMTP();
		    $mail->Host='smtp.gmail.com';
		    $mail->Port=587;
		    $mail->SMTPAuth=true;
		    $mail->SMTPSecure='tls';
		    $mail->Username='correo';
		    $mail->Password='contra';

		    
		    $mail->addAddress($emailUsuario);
		    $mail->addReplyTo($emailEmpleado,$name);

		    $Body = "";
			$Body .= "Nombre del empleado: ";
			$Body .= $name."<br>";
			$Body .= "\n";
			$Body .= "Email del empleado: ";
			$Body .= $emailEmpleado."<br>";
			$Body .= "\n";
			$Body .= "Nombre del proyecto: ";
			$Body .= $proyecto['nombreProyecto']."<br>";
			$Body .= "\n";
			$Body .= "Mensaje: "."<br>";
			$Body .= $message;
			$Body .= "\n";

		    $mail->isHTML(true);
		    $mail->Subject='Enviado por Constructora Umaña';
		    $mail->Body= $Body;
		    if(!$mail->send()){
        $result="Algo esta mal, por favor inténtelo de nuevo.";
    }
    else{
        $result="Gracias  por contactarnos, espera la respuesta!";
    }

    }

// funcion obtine el proyecto por la cedula del usuario
    public function get_proyectoUsu($cedula = FALSE)
	{
	//Si el dato correo es falso devuelve todos los usuarios
	if ($cedula === FALSE)
	 {
	     $query = $this->db->get('tbl_proyecto');
	     return $query->result_array();
	 }

	 $query = $this->db->get_where('tbl_proyecto', array('cedula' => $cedula));
	 return $query->result_array();
	}

	public function get_bitacora($idCedula = FALSE)
	{
	//Si el dato correo es falso devuelve todos los usuarios
	if ($idCedula === FALSE)
	 {
	     $query = $this->db->get('tbl_bitacora');
	     return $query->result_array();
	 }

	 $consulta = "select * from tbl_bitacora INNER JOIN tbl_proyecto ON tbl_bitacora.idProyecto = tbl_proyecto.idProyecto where cedula = $idCedula";
	 $query = $this->db->query($consulta);
	 return $query->result_array();
	}

	public function obtenerComentario($idCedula = FALSE)
	{
	//Si el dato correo es falso devuelve todos los usuarios
	if ($idCedula === FALSE)
	 {
	     $consulta = "select c.idBitacora,c.comentario,c.fechaRegistro,pr.nombreProyecto from tbl_comentario c JOIN tbl_bitacora b ON c.idBitacora = b.idBitacora JOIN tbl_proyecto pr ON b.idProyecto = pr.idProyecto";
	 	 $query = $this->db->query($consulta);
	     return $query->result_array();
	 }

	 $consulta = "select c.idBitacora,p.nombreProyecto,c.comentario,c.fechaRegistro from tbl_proyecto p INNER JOIN tbl_bitacora b ON p.idProyecto = b.idProyecto JOIN tbl_comentario c ON b.idBitacora = c.idBitacora  where p.cedula = $idCedula";
	 $query = $this->db->query($consulta);
	 return $query->result_array();
	}
	
	public function crearRecibo($cedula,$idProyecto,$monto,$fechaVencimiento,$mes)
	{
		$data= array(
					'cedulaUsuario' => $cedula,
					'idProyecto' => $idProyecto,
					'montoPagar' => $monto,
					'fechaVencimiento' => $fechaVencimiento,
					'mesCancelar' => $mes,
					'estado' => "A",


		);
		 return $this->db->insert('tbl_recibo', $data);
	}

	public function pagoRecibo($idRecibo,$monto,$fecha)
	{
		$data= array(

					'idRecibo' => $idRecibo,
					'montoPagado' => $monto,
					'fechaPago' => $fecha,
					'estado' => "A",
				);
		 return $this->db->insert('tbl_pago', $data);
	}

	public function get_pago($idCedula = FALSE)
	{
		$consulta = "select r.montoPagar,r.fechaVencimiento,r.mesCancelar,r.estado,p.nombreProyecto from tbl_recibo r INNER JOIN tbl_proyecto p ON r.idProyecto=p.idProyecto where cedulaUsuario = $idCedula";
	 $query = $this->db->query($consulta);
	 return $query->result_array();
	}

	public function get_factura($idCedula)
	{
		$consulta = "select r.idRecibo,pe.nombrePersona,pe.apellido,pe.apellido2,r.cedulaUsuario,r.mesCancelar,d.montoTotal,d.montoDeber,d.fechaRegistro,r.idProyecto,d.descripcion,pr.saldo,d.idDetallePago from tbl_detallePago d JOIN tbl_pago pa ON d.idPago=pa.idPago JOIN tbl_recibo r ON pa.idRecibo=r.idRecibo JOIN tbl_persona pe ON r.cedulaUsuario=pe.cedula JOIN tbl_presupuesto pr ON r.cedulaUsuario=pr.cedula where pe.cedula = $idCedula";
	 $query = $this->db->query($consulta);
	 return $query->result_array();
	}

	public function get_facturaPDF($idDetallePago)
	{
		$consulta = "select r.idRecibo,pe.nombrePersona,pe.apellido,pe.apellido2,r.cedulaUsuario,r.mesCancelar,d.montoTotal,d.montoDeber,d.fechaRegistro,r.idProyecto,d.descripcion,pr.saldo,d.idDetallePago from tbl_detallePago d JOIN tbl_pago pa ON d.idPago=pa.idPago JOIN tbl_recibo r ON pa.idRecibo=r.idRecibo JOIN tbl_persona pe ON r.cedulaUsuario=pe.cedula JOIN tbl_presupuesto pr ON r.cedulaUsuario=pr.cedula where d.idDetallePago = $idDetallePago";
	 $query = $this->db->query($consulta);
	 return $query->row_array();
	}


	// para detalles de pago
	public function agregarDetallePago($idPago,$idPresupuesto,$descripcion,$montoTotal,$montoDeber,$fechaRegistro)
	{
		$data= array(
					'idPago' => $cedula,
					'idPresupuesto' => $idProyecto,
					'descripcion' => $monto,
					'montoTotal' => $fechaVencimiento,
					'montoDeber' => $mes,
					'fechaRegistro' =>$fechaRegistro,
					'estado'=>"A",);
		 return $this->db->insert('tbl_detallePago', $data);
	}
}

 ?>
