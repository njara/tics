<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Empresa extends CI_Controller {

   public function __construct() {
      parent::__construct();
   }

   public function iniciar_sesion() {
      $data = array();
      $data['error'] = $this->session->flashdata('error');
      $this->load->view('empresa/iniciar_sesion', $data);
   }

   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $rut = $this->input->post('rut');
         $password = $this->input->post('password');
         $this->load->model('empresa_model');
         $usuario = $this->empresa_model->empresa_por_rut_password($rut, $password);
         if ($usuario) {
            $usuario_data = array(
               'id_persona' => $usuario->id_persona,
               'nickname_show' => $usuario->nickname,
               'empresa_rut' => $usuario->empresa_rut,
               'logueado' => TRUE
               );
            $this->session->set_userdata($usuario_data);
            redirect('index.php/empresa/logueado');
         } else {
            $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
            redirect('index.php/empresa/iniciar_sesion');
         }
      } else {
         $this->iniciar_sesion();
      }
   }

   public function logueado() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['nickname_show'] = $this->session->userdata('nickname_show');
         $this->load->view('empresa/logueado', $data);
      }else{
         redirect('index.php/empresa/iniciar_sesion');
      }
   }

   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
         );
      $this->session->set_userdata($usuario_data);
      redirect('index.php/empresa/iniciar_sesion');
   }

   public function mostrar_perfil() {
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('empresa_model');
         $id_persona = $this->session->userdata('id_persona');
         $perfil = $this->empresa_model->select_perfil($id_persona);
         if ($perfil) {
            $data = array();
            $data['rut'] = $perfil->rut; 
            $data['nickname'] = $perfil->nickname;
            $data['dv'] = $perfil->dv; 
            $data['nombre'] = $perfil->nombre; 
            $data['empresa'] = $perfil->empresa; 
            $data['cargo_en_la_empresa'] = $perfil->cargo_en_la_empresa; 
            $data['apellido_paterno'] = $perfil->apellido_paterno; 
            $data['apellido_materno'] = $perfil->apellido_materno; 
            $data['correo'] = $perfil->correo; 
            $data['sexo'] = $perfil->sexo; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $this->load->view('empresa/mostrar_perfil',$data);
         }
      }else{
         redirect('index.php/empresa/iniciar_sesion');
      }
   }

   public function editar_perfil() {
      if($this->session->userdata('logueado')){
         if (!$this->input->post()) {
            $this->load->model('empresa_model');
            $id_persona = $this->session->userdata('id_persona');
            $perfil = $this->empresa_model->select_perfil($id_persona);
            if ($perfil) {
               $data = array();
               $data['rut'] = $perfil->rut; 
               $data['nickname'] = $perfil->nickname;
               $data['dv'] = $perfil->dv; 
               $data['nombre'] = $perfil->nombre; 
               $data['apellido_paterno'] = $perfil->apellido_paterno; 
               $data['apellido_materno'] = $perfil->apellido_materno; 
               $data['correo'] = $perfil->correo; 
               $data['cargo_en_la_empresa'] = $perfil->cargo_en_la_empresa; 
               $data['empresa'] = $perfil->empresa; 
               $data['nickname_show'] = $this->session->userdata('nickname_show');
               
               $this->load->view('empresa/editar_perfil',$data);
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
            $cargo = array();
            $cargo['cargo_en_la_empresa']=$this->input->post('cargo_en_la_empresa');
            $this->session->set_userdata('nickname_show', $data['nickname']);
            $this->load->model('empresa_model');
            $usuario = $this->empresa_model->update_perfil($id_persona, $data, $cargo);
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            redirect('index.php/empresa/mostrar_perfil');
         }
      }else{
         redirect('index.php/empresa/iniciar_sesion');
      }
   }
   public function mostrar_orden_compra() {
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('ordencompra_model');
         $id_persona = $this->session->userdata('id_persona');
         $empresa_rut = $this->session->userdata('empresa_rut');
         $ordenes_compra = $this->ordencompra_model->orden_compra($empresa_rut);
         if ($ordenes_compra) {
            $data = array();
            $data['ordenes_de_compra'] = $ordenes_compra; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['error'] = "";
            $this->load->view('empresa/mostrar_orden_compra',$data);
         }
         else{
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $empresa_rut."error";
            $data['error'] = "No posee Ordenes de Compra.";
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            $this->load->view('empresa/mostrar_orden_compra',$data);
         }
      }else{
         redirect('index.php/empresa/iniciar_sesion');
      }
   }

   public function mostrar_alumnos() {
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('alumno_model');
         $id_persona = $this->session->userdata('id_persona');
         $empresa_rut = $this->session->userdata('empresa_rut');
         $alumnos = $this->alumno_model->alumnos_empresa($empresa_rut);
         if ($alumnos) {
            $data = array();
            $data['alumnos'] = $alumnos; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['error'] = "";
            $this->load->view('empresa/mostrar_alumnos_empresa',$data);
         }
         else{
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $empresa_rut."error";
            $data['error'] = "No posee Ordenes de Compra.";
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            $this->load->view('empresa/mostrar_alumnos_empresa',$data);
         }
      }else{
         redirect('index.php/empresa/iniciar_sesion');
      }
   }
   public function mostrar_datos_empresa() {
   if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
      $this->load->model('empresa_model');
      $id_persona = $this->session->userdata('id_persona');
      $empresa_rut = $this->session->userdata('empresa_rut');
      $datos = $this->empresa_model->empresa_por_rut_empresa($empresa_rut);
      if ($datos) {
         $data = array();
         $data['datos'] = $datos; 
         $data['nickname_show'] = $this->session->userdata('nickname_show');
         $data['mensaje'] = $this->session->flashdata('mensaje');
         $data['error'] = "";
         $this->load->view('empresa/mostrar_datos_empresa',$data);
      }
      else{
         $data['nickname_show'] = $this->session->userdata('nickname_show');
         $data['mensaje'] = $empresa_rut."error";
         $data['error'] = "No posee Ordenes de Compra.";
         $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
         $this->load->view('empresa/mostrar_datos_empresa',$data);
      }
   }else{
      redirect('index.php/empresa/iniciar_sesion');
   }
}
}
?>