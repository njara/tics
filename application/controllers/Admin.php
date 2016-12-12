<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Admin extends CI_Controller {

   public function __construct() {
      parent::__construct();
   }

   public function iniciar_sesion() {
      $data = array();
      $data['error'] = $this->session->flashdata('error');
      $this->load->view('admin/iniciar_sesion', $data);
   }

   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $rut = $this->input->post('rut');
         $password = $this->input->post('password');
         $this->load->model('admin_model');
         $usuario = $this->admin_model->usuario_por_nickname_password($rut, $password);
         if ($usuario) {
          

            $tipo = $this->admin_model->es_admin($rut);


            if($tipo) {

               $cursos = $this->admin_model->obtener_cursos();


               $usuario_data = array(
               'id_persona' => $usuario->id_persona,
               'nickname_show' => $usuario->nickname,
               'logueado' => TRUE,
               'cursos' => $cursos
               );
            

               $this->session->set_userdata($usuario_data);
               $this->load->view('admin/logueado', $usuario_data);
            } else {

               $this->session->set_flashdata('error', 'El usuario no es ADMINISTRADOR.');
               redirect('index.php/admin/iniciar_sesion');
            }
            

            
         } else {
            $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
            redirect('index.php/admin/iniciar_sesion');
         }
      } else {
         $this->iniciar_sesion();
      }
   }

   public function logueado() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['nickname_show'] = $this->session->userdata('nickname_show');
         $this->load->view('admin/logueado', $data);
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }

   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
         );
      $this->session->set_userdata($usuario_data);
      redirect('index.php/admin/iniciar_sesion');
   }

   public function mostrar_perfil() {
       if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('admin_model');
         $id_persona = $this->session->userdata('id_persona');
         $perfil = $this->admin_model->perfil($id_persona);
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
            $this->load->view('admin/mostrar_perfil',$data);
         }
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }

   public function editar_perfil() {
      if($this->session->userdata('logueado')){
         if (!$this->input->post()) {
            $this->load->model('admin_model');
            $id_persona = $this->session->userdata('id_persona');
            $perfil = $this->admin_model->perfil($id_persona);
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
               
               $this->load->view('admin/editar_perfil',$data);
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
            $this->load->model('admin_model');
            $usuario = $this->admin_model->editar_perfil($id_persona, $data);
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            redirect('index.php/admin/mostrar_perfil');
         }
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }
   public function mostrar_orden_compra() {
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('admin_model');
         $id_persona = $this->session->userdata('id_persona');
         $empresa_rut = $this->session->userdata('empresa_rut');
         $ordenes_compra = $this->admin_model->orden_compra();
         if ($ordenes_compra) {
            $data = array();
            $data['ordenes_de_compra'] = $ordenes_compra; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['error'] = "";
            $this->load->view('admin/mostrar_orden_compra',$data);
         }
         else{
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $empresa_rut."error";
            $data['error'] = "No posee Ordenes de Compra.";
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            $this->load->view('admin/mostrar_orden_compra',$data);
         }
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }

   public function mostrar_alumnos() {
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('admin_model');
         $id_persona = $this->session->userdata('id_persona');
         
         $alumnos = $this->admin_model->alumnos();
         if ($alumnos) {
            $data = array();
            $data['alumnos'] = $alumnos; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['error'] = "";
            $this->load->view('admin/mostrar_alumnos_empresa',$data);
         }
         else{
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            
            $data['error'] = "No posee Alumnos.";
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            $this->load->view('admin/mostrar_alumnos_empresa',$data);
         }
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }
   public function mostrar_empresas(){
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('admin_model');
         $id_persona = $this->session->userdata('id_persona');
         
         $empresas = $this->admin_model->empresas();
         if ($empresas) {
            $data = array();
            $data['empresas'] = $empresas; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['error'] = "";
            $this->load->view('admin/mostrar_empresas',$data);
         }
         else{
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            
            $data['error'] = "No posee Alumnos.";
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            $this->load->view('admin/mostrar_empresas',$data);
         }
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }
    public function mostrar_usuarios(){
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('admin_model');
         $id_persona = $this->session->userdata('id_persona');
         
         $usuarios = $this->admin_model->usuarios();
         if ($usuarios) {
            $data = array();
            $data['usuarios'] = $usuarios; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $data['error'] = "";
            $this->load->view('admin/mostrar_usuarios',$data);
         }
         else{
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            
            $data['error'] = "No posee Usuarios.";
            $this->session->set_flashdata('mensaje', 'Perfil Editado con Exito!');
            $this->load->view('admin/mostrar_usuarios',$data);
         }
      }else{
         redirect('index.php/admin/iniciar_sesion');
      }
   }
   public function status(){
       if ($this->input->post()) {
         $rut = $this->input->post('rut');
         $this->load->model('admin_model');
         $status = $this->admin_model->isBanned($rut);
         if($status) {
            $this->admin_model->unban($rut);
         } else {
            $this->admin_model->ban($rut);
            
         }
         redirect('index.php/admin/mostrar_usuarios');
         
      } else {
         $this->iniciar_sesion();
      }
   }
}
?>