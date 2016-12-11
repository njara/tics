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

   public function iniciar_sesion_admin() {
      $data = array();
      $data['error'] = $this->session->flashdata('error');
      $this->load->view('usuarios/iniciar_sesion_admin', $data);
   }

   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $rut = $this->input->post('rut');
         $password = $this->input->post('password');
         $this->load->model('usuario_model');
         $usuario = $this->usuario_model->usuario_por_nickname_password($rut, $password);
         if ($usuario) {
            $usuario_data = array(
               'id_persona' => $usuario->id_persona,
               'nickname_show' => $usuario->nickname,
               'logueado' => TRUE
               );
            $this->session->set_userdata($usuario_data);

            redirect('index.php/usuarios/logueado');
            
         } else {
            $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
            redirect('index.php/usuarios/iniciar_sesion');
         }
      } else {
         $this->iniciar_sesion();
      }
   }

    public function iniciar_sesion_admin_post() {
      if ($this->input->post()) {
         $rut = $this->input->post('rut');
         $password = $this->input->post('password');
         $this->load->model('usuario_model');
         $usuario = $this->usuario_model->usuario_por_nickname_password($rut, $password);
         if ($usuario) {
            $usuario_data = array(
               'id_persona' => $usuario->id_persona,
               'nickname_show' => $usuario->nickname,
               'logueado' => TRUE
               );
            $this->session->set_userdata($usuario_data);

            $tipo = $this->usuario_model->es_admin($rut);
            if($tipo) {

               redirect('index.php/usuarios/logueado_admin');
            } else {
               $this->session->set_flashdata('error', 'El usuario no es ADMINISTRADOR.');
               redirect('index.php/usuarios/iniciar_sesion_admin');
            }
            

            
         } else {
            $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
            redirect('index.php/usuarios/iniciar_sesion_admin');
         }
      } else {
         $this->iniciar_sesion();
      }
   }

   public function logueado() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['nickname_show'] = $this->session->userdata('nickname_show');
         $this->load->view('usuarios/logueado', $data);
      }else{
         redirect('index.php/usuarios/iniciar_sesion');
      }
   }

    public function logueado_admin() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['nickname_show'] = $this->session->userdata('nickname_show');
         $this->load->view('usuarios/admin_logueado', $data);
      }else{
         redirect('index.php/usuarios/iniciar_sesion');
      }
   }

   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
         );
      $this->session->set_userdata($usuario_data);
      redirect('index.php/usuarios/iniciar_sesion');
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
}
?>