<?php

class Usuario_model extends CI_Model { 
	public function __construct() {
		parent::__construct();
	}
	public function usuario_por_nickname_password($rut, $password){

		$this->db->select('usuario.id_persona, persona.nickname');
		$this->db->from('usuario');
		$this->db->join('persona', 'persona.rut = usuario.id_persona');
		$this->db->where('usuario.id_persona', $rut);
		$this->db->where('usuario.password', $password);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function perfil($id_persona){
		$this->db->select('rut, dv, nickname, persona.nombre as nombre, apellido_paterno, apellido_materno,correo, sexo.nombre as sexo');
		$this->db->from('persona');
		$this->db->join('sexo', 'persona.sexo = sexo.id');
		$this->db->where('rut',$id_persona);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
	public function editar_perfil($id_persona,$data){
		$this->db->where('rut',$id_persona);
		$this->db->update('persona',$data);
		return true;
	}
	public function isBanned($rut){
		$this->db->select('status');
		$this->db->from('persona');
		$this->db->where('rut', $rut);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		if($resultado->status == 2){
			return true; 
		} else {
			return false;
		}
	}
	

}
?>