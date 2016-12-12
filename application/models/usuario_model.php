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

	public function crear_perfil($perfil,$usuario,$data){
		$this->db->insert('persona',$perfil);
		$this->db->insert('usuario',$usuario);
		$this->db->insert('persona_es_alumno',$data);
		return true;
	}

	public function marcar_sesion_valida($id_persona,$data){
		$this->db->where('rut',$id_persona);
		$this->db->update('persona',$data);
		return true;
	}

}
?>