<?php

/**
 *
 */
class Mdl_Usuarios extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}

		public function get_persona($cedula = FALSE)
	{
			 $query = $this->db->get_where('tbl_persona', array('cedula' => $cedula));
			 return $query->row_array();
	 }
	 public function get_veriCliente($cedula = FALSE)
	{

		$this->db->where('cedula', $cedula);

			 $query = $this->db->get('tbl_clienteJuri');

	 		if ($query->num_rows() == 1)
	 		{
	 				return true;
	 		}
	 		else
	 		{
	 				return false;
	 		}
	 }
	 public function get_cliente($cedula = FALSE)
 	{
 //Si el dato correo es falso devuelve todos los usuarios
 	if ($cedula === FALSE)
 	 {
 			 $query = $this->db->get('tbl_clienteJuri');
 			 return $query->result_array();
 	 }

 	 $query = $this->db->get_where('tbl_clienteJuri', array('cedula' => $cedula));
 	 return $query->result_array();
 	}
	 public function get_user($cedula = FALSE)
 	{
 //Si el dato correo es falso devuelve todos los usuarios
 	if ($cedula === FALSE)
 	 {
 			 $query = $this->db->get('tbl_usuarios');
 			 return $query->result_array();
 	 }

 	 $query = $this->db->get_where('tbl_usuarios', array('cedula' => $cedula));
 	 return $query->row_array();
 	}



//confirma el usuario que se loguea
	 public function log_in_correctly()
	 {
	 		//Hace la sentencia de obtener el cedula y password que sean iguales a los input de la tabla informacion
	 		$this->db->where('cedula', $this->input->post('cedulaR'));
	 		$this->db->where('password', $this->input->post('password'));
	 		$query = $this->db->get('tbl_usuarios');

	 		if ($query->num_rows() == 1)
	 		{
	 				return true;
	 		}
	 		else
	 		{
	 				return false;
	 		}
	 }
	 //ingresar un nuevo usuario
	 public function crearUsuario($cedula,$password,$tipo)
	{
	 $this->load->helper('url');
	 	//EL primer campo en el array declara al nombre que tiene el campo en la base y el siguientes se refiere
		// al campo del texto que se envie por el formulario
	 		$data= array(
						'cedula' => $cedula,
						'password' => $password,
						'tipo' => $tipo,

	 		);

			 return $this->db->insert('tbl_usuarios', $data);
		}
public function personaExiste()
{
	$this->db->where('cedula', $this->input->post('cedulaU'));
	$this->db->get('tbl_persona');
	$query = $this->db->get('tbl_persona');

	if ($query->num_rows() == 1)
	{
			return true;
		}
		else
		{
		return false;
		}
	}


		public function modificarPersona($cedula=false,$nombre,$priApe,$seApe,$telefono,$celular,$correo)
		{
		$this->load->helper('url');
		 //EL primer campo en el array declara al nombre que tiene el campo en la base y el siguientes se refiere
		 // al campo del texto que se envie por el formulario
			 $data= array(

						 'nombrePersona' => $nombre,
						 'apellido' => $priApe,
						 'apellido2' => $seApe,
						 'telefono' => $telefono,
						 'celular' => $celular,
						 'correo' => $correo,

			 );
			 	//$info=$this->session->all_userdata();
 				$this->db->where('cedula', $cedula);
 				return   $this->db->update('tbl_persona', $data);


			}


			//metodo que agrega empleados /usuarios al sistema

			public function agregarPersona($cedula,$nombre,$apellido,$apellido2,$telefono,$celular,$correo)
		 {
			$this->load->helper('url');

				 $data= array(
							 'cedula' => $cedula,
							 'nombrePersona' => $nombre,
							 'apellido' => $apellido,
							 'apellido2' => $apellido2,
							 'telefono' => $telefono,
							 'celular' => $celular,
							 'correo' => $correo
				 );
					return $this->db->insert('tbl_persona', $data);
			 }
			 public function eliminarUsuario($cedula=false)
			 {
				 $this->db->where('cedula',$cedula);
					$this->db->delete('tbl_persona');
					$this->db->where('cedula',$cedula);
					$this->db->delete('tbl_usuarios');
			 }
}

 ?>
