<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class OrdenCompra extends CI_Controller {

   public function __construct() {
      parent::__construct();
   }

   public function mostrar_orden_compra() {
      if($this->session->userdata('logueado') && $this->session->userdata('id_persona')){
         $this->load->model('ordencompra_model');
         $id_persona = $this->session->userdata('id_persona');
         $empresa_rut = $this->session->userdata('empresa_rut');
         $orden_compra = $this->ordencompra_model->orden_compra($empresa_rut);
         if ($orden_compra) {
            $data = array();
            $data['id_curso'] = $orden_compra->id_curso; 
            $data['curso_nombre'] = $orden_compra->curso_nombre;
            $data['ejecutivo'] = $orden_compra->ejecutivo; 
            $data['gestor'] = $orden_compra->gestor; 
            $data['valor_curso'] = $orden_compra->valor_curso; 
            $data['nickname_show'] = $this->session->userdata('nickname_show');
            $data['mensaje'] = $this->session->flashdata('mensaje');
            $this->load->view('empresa/mostrar_orden_compra',$data);
         }
         else{
            $data['mensaje'] = $this->session->flashdata('mensaje',"error");
            $this->load->view('empresa/mostrar_orden_compra',$data);
         }
      }else{
         redirect('index.php/empresa/iniciar_sesion');
      }
   }
}
?>