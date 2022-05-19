<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        //Se declaran las llamadas al modelo y librerias a utilizar
              parent::__construct();
             $this->load->model('mdl_usuarios');
             $this->load->model('mdl_proyectos');
              $this->load->helper('url_helper');
              $this->load->library("session");
              $this->load->helper("url");
              $this->load->helper('form');
              $this->load->helper('security');
              $this->load->library('form_validation');
    }

    public function index()
    {
        //Llamada al metodo login
        $this->inicio();
    }

    public function inicio()
    {
        //Abrir la vista de inicio
        $this->load->view('main');
    }

    public function login()
    {
        //Abrir la vista de registrar
        $this->load->view('login');
    }
    public function proyecto()
    {
        //Abrir la vista de registro de los proyectos

        $this->load->view('proyecto');
    }
    public function clienteJuri()
    {
      //Abrir la vista de cliente juridico

        $this->load->view('clienteJuridico');
    }
    public function bitacora()
    {
        //Abrir la vista de registro de cambios del pryecto

        $this->load->view('bitacora');
    }
    public function nuevoProyecto()
    {
        //Abrir la vista de registrar
        $this->load->view('nuevoProyecto');
    }
    public function sistema()
    {
      //Regresar al modulo del usuario
        $this->load->view('sistema');
    }
    public function nuevaBitacora()
    {
      //Abrir la vista para agregar un registro nuevo a la bitacora
        $this->load->view('nuevaBitacora');
    }
    public function reporte()
    {
      //Regresar al modulo del usuario
        $this->load->view('reporte');
    }
    // vista de detalle de pagos
    public function detallePago()
    {

        $this->load->view('detallePago');
    }
    public function pago()
    {
      $this->load->view('Pagos');
    }
    public function pagoPendiente()
    {
      $this->load->view('facturación/pagoPendiente');
    }
    public function reporteBitacora()
    {
      $this->load->view('reporteBitacora');
    }
    public function reporteComentario()
    {
      $this->load->view('reporteComentario');
    }
    public function factura()
    {
      $this->load->view('facturación/factura');
    }
    public function facturaPDF()
    {
      $this->load->view('facturaPDF');
    }
    public function comentarios($id=false)
    {
    //abrir la vista para agregar un nuevo comentario
    	$item['idBitacora']=$id;

      $this->load->view('comentarios',$item);

    }
    //vetana Usuarios
    public function usuarios()
    {
     $this->load->view('generarUsuario');
    }
    //ventana agregarPersona
    public function agregarPersona()
    {
      $this->load->view('agregarPersona');
    }

  //validaciones para desloguearse
  public function login_action()
  {
      //Funcion para verificar si el correo y usuario existen en la base de datos llamando el modelo y comparandolo con el correo que es unico

      $this->load->helper('security');
      $this->load->library('form_validation');
// el callback_validation llama la fincion validation para confirmar los validation_errors
      $this->form_validation->set_rules('cedulaR', 'Cedula:', 'required|trim|xss_clean|callback_validation');
      $this->form_validation->set_rules('password', 'Password:', 'required|trim');

      if ($this->form_validation->run())
       {
              $cedulaCopi = $this->input->post('cedulaR');
              $this->validacionSeccion($cedulaCopi);
              //Carga la vista donde se verifica el tipo de usuario
              $this->load->view('proyecto');
      }
      else
      {
          $this->load->view('login');
      }
  }
  public function validation()
  {
      $this->load->model('mdl_usuarios');

      if ($this->mdl_usuarios->log_in_correctly())
      {
          return true;
      }
      else
      {
          $this->form_validation->set_message('validation', 'Incorrecto correo/contraseña.');
          return false;
      }
  }

  public function validacionSeccion($cedula)
  {
              $data = $this->mdl_usuarios->get_user($cedula);

              //Se utiliza para hacer las validaciones con respecto al usuario
              $tipo['tipo']= $data['tipo'];
              //Se obtiene los datos basicos del usuario
              $datoUsuario = $this->mdl_usuarios->get_persona($data['cedula']);

              //Se verifica que exista una cedula juridica para habilitar la opcion al usuario
              $veriCliente['verificar'] = $this->mdl_usuarios->get_veriCliente($data['cedula']);
              $this->session->set_userdata($datoUsuario);
              $this->session->set_userdata($tipo);
             $this->session->set_userdata($veriCliente);

  }

  public function modiPersona()
    {
      $this->mdl_usuarios->modificarPersona($this->input->post('cedula'),
          $this->input->post('nombre'),
          $this->input->post('priApellido'),
          $this->input->post('seApellido'),
          $this->input->post('telefono'),
          $this->input->post('celular'),
          $this->input->post('correo'));

      $cedulaCopi = $this->input->post('cedula');
      $this->validacionSeccion($cedulaCopi);
      $this->load->view('sistema');
    }

    public function modiContacto()
    {
      $this->mdl_usuarios->modificarContacto($this->input->post('telefono'),
          $this->input->post('celular'),
          $this->input->post('correo'));

      $cedulaCopi = $this->input->post('cedula');
      $this->validacionSeccion($cedulaCopi);
      $this->load->view('sistema');
    }

    public function consultaBitacora()
    {
      $dato['idProyecto'] = $this->input->post('proyecto');
      $this->session->set_userdata($dato);
      $this->load->view('bitacora');
    }

    public function agregarProyecto()
    {
      $this->mdl_proyectos->agregarProyecto($this->input->post('nombreProyecto'),
                                            $this->input->post('descripcion'),
                                            $this->input->post('costoTotal'),
                                            $this->input->post('fechaInicio'),
                                            $this->input->post('fechaFinal'),
                                            $this->input->post('avanceFinanciero'),
                                            $this->input->post('compePlazo'),
                                            $this->input->post('fechaModificacion'),
                                            $this->input->post('usuario'));

      $this->load->view('proyecto');
    }

    public function agregarP()
    {
      $this->mdl_usuarios->agregarPersona($this->input->post('cedula'),
                                            $this->input->post('nombre'),
                                            $this->input->post('priApellido'),
                                            $this->input->post('seApellido'),
                                            $this->input->post('telefono'),
                                            $this->input->post('celular'),
                                            $this->input->post('correo'));


      $this->load->view('agregarPersona');
}

    
        public function crearUsuario()
        {
        //  $this->load->helper('security');
        //  $this->load->library('form_validation');
        //  $this->form_validation->set_rules('cedulaU', 'Cedula:', 'required|trim|xss_clean|callback_existe');
    //if ($this->form_validation->run()){

          $this->mdl_usuarios->crearUsuario($this->input->post('cedulaU'),
                                                $this->input->post('password'),
                                                $this->input->post('tipoUsuario'));

            $this->load->view('generarUsuario');
        // }else {
      //      $this->load->view('generarUsuario');}

        }
        //valida el usuario tenga un registro en tbl_persona
        public function existe()
        {
          $this->load->model('mdl_usuarios');
              if($this->mdl_usuarios->personaExiste()){
                $this->form_validation->set_message('existe', 'Exito');
                return true;
              }
              else{
                $this->form_validation->set_message('existe', 'Error de cedula.');
                return false;
            }
        }
    public function agregarBitacora()
    {
      $this->mdl_proyectos->agregarBitacora($this->input->post('fechaModi'),
                                            $this->input->post('idProyecto'),
                                            $this->input->post('detalleCambio'),
                                            $this->load->view('nuevaBitacora'));
    }

    public function agregarComentario()
    {
      $this->mdl_proyectos->agregarComentario($this->input->post('fechaRegis'),$this->input->post('Comentario'),$this->input->post('idBitacora'));
      $this->load->view('proyecto');
    }
    public function correoUsuario()
    {

     $result =$this->mdl_proyectos->correo($this->input->post('nombre'),$this->input->post('idProyecto'),$this->input->post('emailUsuario'),$this->input->post('emailEmpleado'),$this->input->post('message'));
      $this->load->view('proyecto',$result);
    }

    // Ventana de opciones
    public function opciones($id=false)
  {
      $item['idProyecto']=$id;

      $this->load->view('opciones',$item);
  }
  // Ventana de enviarCorreo
    public function enviarCorreo($id=false)
  {
      $item['idProyecto']=$id;

      $this->load->view('correo/EnviarCorreo',$item);
  }
  
  // vista del proyecto
  public function modiProyecto($id=false)
{
    $item['Proyecto']= $this->mdl_proyectos->getDataProyecto($id);
    $this->load->view('modiProyecto',$item);
}
// Permite modificar un proyecto
public function modificarProyecto()
{
  $this->mdl_proyectos->modiProyecto($this->input->post('nombreProyecto'),
                                        $this->input->post('descripcion'),
                                        $this->input->post('costoTotal'),
                                        $this->input->post('fechaInicio'),
                                        $this->input->post('fechaFinal'),
                                        $this->input->post('avanceFinanciero'),
                                        $this->input->post('compePlazo'),
                                        $this->input->post('fechaModificacion'),
                                        $this->input->post('usuario'));

  $this->load->view('proyecto');
}
//elimina unicamente el acceso del usuario del sistema
public function eliminarUsuario()
{
  $this->mdl_usuarios->eliminarUsuario($this->input->post('cedula'));
  return redirect(proyecto());
}
// eliminar una persona del registro
public function eliminarP()
{
  $this->load->view('eliminarUsuario');
}
// vista para la pagina recibo
public function reciboProyecto($id=false)
{
  $item['Proyecto']= $this->mdl_proyectos->getDataProyecto($id);
  $this->load->view('crearRecibos',$item);
}

//Crea un recibo
public function crearRecibo()
{
  $this->mdl_proyectos->crearRecibo($this->input->post('cedulaUsuario'),
                                        $this->input->post('idProyecto'),
                                        $this->input->post('montoPago'),
                                        $this->input->post('fecha'),
                                        $this->input->post('mes'),);

  return redirect(base_url()."index.php/main/proyecto");
}
//La vista a cobro
public function cobroRecibo()
{
  // code...
  $this->load->view('cobroRecibo');
}
//Realiza el proceso de pago
public function pagoRecibo()
{
  $this->mdl_proyectos->pagoRecibo($this->input->post('idRecibo'),
                                        $this->input->post('montoPago'),
                                        $this->input->post('fechaPago'),);

  return redirect(base_url()."index.php/main/proyecto");
}
public function agregarDetallePago()
{
  $this->mdl_proyectos->agregarDetallePago($this->input->post('idPago'),
                                        $this->input->post('idPresupuesto'),
                                        $this->input->post('descripcion'),
                                        $this->input->post('montoTotal'),
                                        $this->input->post('montoDeber'),
                                        $this->input->post('fechaRegistro'),);

  $this->load->view('nuevoProyecto');
}
}
?>
