<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
class Usuarios extends CI_Controller {

 public function __construct() {
  parent::__construct();
}

public function iniciar_sesion() {
  $data = array();
  $data['error'] = $this->session->flashdata('error');
  $this->load->view('usuarios/iniciar_sesion', $data);
}

public function iniciar_sesion_post() {
  if ($this->input->post()) {
   $rut = $this->input->post('rut');
   $password = $this->input->post('password');
   $this->load->model('usuario_model');
   $usuario = $this->usuario_model->usuario_por_nickname_password($rut, $password);
   if ($usuario) {
    if($this->usuario_model->isBanned($rut)){
     $this->session->set_flashdata('error', 'El usuario está suspendido.');
     redirect('index.php/usuarios/iniciar_sesion');
   }  else {
     $datos = array();
     $datos['ultima_sesion'] = date("Y-m-d H:i:s"); 
     $this->usuario_model->marcar_sesion_valida($rut, $datos);
     $usuario_data = array(
      'id_persona' => $usuario->id_persona,
      'nickname_show' => $usuario->nickname,
      'logueado' => TRUE
      );
     $this->session->set_userdata($usuario_data);
     redirect('index.php/usuarios/logueado');
   }
 } else {
  $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
  redirect('index.php/usuarios/iniciar_sesion');
}
} else {
 $this->iniciar_sesion();
}
}

public function logueado() {
  if($this->session->userdata('logueado')){
   $data = array();
   $data['nickname_show'] = $this->session->userdata('nickname_show');
   $data['id_persona'] = $this->session->userdata('id_persona');
   $this->load->view('usuarios/logueado', $data);
 }else{
   redirect('index.php/usuarios/iniciar_sesion');
 }
}

public function cerrar_sesion() {
  $usuario_data = array(
   'logueado' => FALSE
   );
  $this->session->set_userdata($usuario_data);
  $this->session->sess_destroy();
  redirect('index.php/');
}

public function mostrar_perfil() {
  if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
   $this->load->model('usuario_model');
   $id_persona = $this->session->userdata('id_persona');
   $perfil = $this->usuario_model->perfil($id_persona);
   if ($perfil) {
    $data = array();
    $data['rut'] = $perfil->rut; 
    $data['nickname'] = $perfil->nickname;
    $data['dv'] = $perfil->dv; 
    $data['nombre'] = $perfil->nombre; 
    $data['apellido_paterno'] = $perfil->apellido_paterno; 
    $data['apellido_materno'] = $perfil->apellido_materno; 
    $data['correo'] = $perfil->correo; 
    $data['sexo'] = $perfil->sexo; 
    $data['nickname_show'] = $this->session->userdata('nickname_show');
    $data['mensaje'] = $this->session->flashdata('mensaje');
    $this->load->view('usuarios/mostrar_perfil',$data);
  }
}else{
 redirect('index.php/usuarios/iniciar_sesion');
}
}

public function editar_perfil() {
  if($this->session->userdata('logueado')){
   if (!$this->input->post()) {
    $this->load->model('usuario_model');
    $id_persona = $this->session->userdata('id_persona');
    $perfil = $this->usuario_model->perfil($id_persona);
    if ($perfil) {
     $data = array();
     $data['rut'] = $perfil->rut; 
     $data['nickname'] = $perfil->nickname;
     $data['dv'] = $perfil->dv; 
     $data['nombre'] = $perfil->nombre; 
     $data['apellido_paterno'] = $perfil->apellido_paterno; 
     $data['apellido_materno'] = $perfil->apellido_materno; 
     $data['correo'] = $perfil->correo; 
     $data['nickname_show'] = $this->session->userdata('nickname_show');

     $this->load->view('usuarios/editar_perfil',$data);
   }
 }else{
  $data = array();
  $id_persona = $this->session->userdata('id_persona');
  $data['nickname']=$this->input->post('nickname');
  $data['nombre']=$this->input->post('nombre');
  $data['nickname']=$this->input->post('nickname');
  $this->session->userdata('nickname');
  $data['apellido_paterno']=$this->input->post('apellido_paterno');
  $data['apellido_materno']=$this->input->post('apellido_materno');
  $data['correo']=$this->input->post('correo');
  $data['sexo']=$this->input->post('sexo');
  $data['nickname'] =$this->input->post('nickname');
  $this->session->set_userdata('nickname_show', $data['nickname']);
  $this->load->model('usuario_model');
  $usuario = $this->usuario_model->editar_perfil($id_persona, $data);
  $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
  redirect('index.php/usuarios/mostrar_perfil');
}
}else{
 redirect('index.php/usuarios/iniciar_sesion');
}
}

public function registro_usuario() {
  if (!$this->input->post()) {
   $this->load->model('usuario_model');
   $data = array();
   $this->load->view('usuarios/registro_usuario',$data);

 }else{
   $data = array();

   $data['nickname']=$this->input->post('nickname');
   $data['rut']=$this->input->post('rut');
   $data['nombre']=$this->input->post('nombre');
   $data['apellido_paterno']=$this->input->post('apellido_paterno');
   $data['apellido_materno']=$this->input->post('apellido_materno');
   $data['sexo']=$this->input->post('sexo');
   $data['correo']=$this->input->post('correo');
   $data['fecha_registro']=date("Y-m-d H:i:s");
   $data['avatar']="Default";
   $data['status']="1";

   $data2 = array();
   $data2['id_persona'] = $this->input->post('rut');
   $data2['dv'] = "1";
   $data2['password'] = $this->input->post('password');

   $data3 = array();
   $data3['id_rut'] = $this->input->post('rut');
   $data3['numero_credencial'] = "123".$this->input->post('rut');

   $this->load->model('usuario_model');
   $usuario = $this->usuario_model->crear_perfil($data,$data2,$data3);
   $this->session->set_flashdata('mensaje', 'Perfil Creado con Éxito!');
   redirect('index.php/usuarios/iniciar_sesion');
 }
}
function show_form(){
  $data = array();
  $this->load->view('usuarios/upload_view', $data);
}

function cargar_archivo() {
$id_persona = $this->session->userdata('id_persona');;
  $mi_archivo = 'mi_archivo';
  $config['upload_path'] = "uploads/";
  $config['file_name'] = $id_persona;
  $config['allowed_types'] = "*";
  $config['max_size'] = "50000";
  $config['max_width'] = "2000";
  $config['max_height'] = "2000";

  $this->load->library('upload', $config);

  if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
   $data['uploadError'] = $this->upload->display_errors();
   echo $this->upload->display_errors();
   return;
 }

$this->upload->data();
 $data['avatar'] = $id_persona;
 
 $this->load->model('usuario_model');
 $this->usuario_model->agregar_imagen($id_persona, $data);
 redirect('index.php/usuarios/logueado');
}
}
?>