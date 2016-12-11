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
	public function obtener_tipo($rut) {
		$this->db->select('usuario_es_tipo_usuario.id_tipo_usuario');
		$this->db->from('usuario_es_tipo_usuario');
		$this->db->where('usuario_es_tipo_usuario.id_usuario', $rut);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
	public function es_admin($rut){
		$this->db->select('usuario_es_tipo_usuario.id_tipo_usuario');
		$this->db->from('usuario_es_tipo_usuario');
		$this->db->join('usuario', 'usuario_es_tipo_usuario.id_usuario = usuario.id');
		$this->db->where('usuario.id_persona', $rut);
		$this->db->where('usuario_es_tipo_usuario.id_tipo_usuario', 1);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		if($resultado->id_tipo_usuario == 1){
			return true; 
		} else {
			return false;
		}
		
	}
	public function obtener_cursos() {
		$this->db->select('curso.nombre as name');
		$this->db->from('curso');
		$consulta = $this->db->get();
		return $consulta->result_array();
	}

}
?>