<?php

class Empresa_model extends CI_Model { 
	public function __construct() {
		parent::__construct();
	}
	public function empresa_por_rut_password($rut, $password){

		$this->db->select('usuario.id_persona, persona.nickname, empresa.rut as empresa_rut');
		$this->db->from('usuario');
		$this->db->join('persona', 'persona.rut = usuario.id_persona');
		$this->db->join('empresa', 'empresa.id_contacto = usuario.id_persona');
		$this->db->join('persona_es_contacto', 'persona_es_contacto.id_rut = usuario.id_persona');
		$this->db->where('usuario.id_persona', $rut);
		$this->db->where('usuario.password', $password);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function empresa_por_rut_empresa($rut_empresa){

		$this->db->select('rut, empresa.nombre, direccion_comercial, comuna.nombre as comuna_nombre, ciudad.nombre as ciudad_nombre, telefono, giro_comercial.nombre as giro_nombre');
		$this->db->from('empresa');
		$this->db->join('giro_comercial', 'giro_comercial.id = id_giro_comercial');
		$this->db->join('comuna', 'comuna.id = id_comuna');
		$this->db->join('ciudad', 'ciudad.id = comuna.id_ciudad');
		$this->db->where('rut', $rut_empresa);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}

	public function select_perfil($id_persona){
		$this->db->select('persona.rut, dv, nickname, persona.nombre as nombre, apellido_paterno, apellido_materno,correo, sexo.nombre as sexo, empresa.nombre as empresa, cargo_en_la_empresa, empresa.rut as empresa_rut');
		$this->db->from('persona');
		$this->db->join('sexo', 'persona.sexo = sexo.id');
		$this->db->join('empresa', 'empresa.id_contacto = persona.rut');
		$this->db->join('persona_es_contacto', 'persona_es_contacto.id_rut = persona.rut');
		$this->db->where('persona.rut',$id_persona);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
	public function update_perfil($id_persona, $data, $cargo){
		$this->db->where('rut',$id_persona);
		$this->db->update('persona',$data);

		$this->db->where('id_rut',$id_persona);
		$this->db->update('persona_es_contacto',$cargo);
		return true;
	}

	public function get_alumnos($id_persona, $cargo){

		$this->db->where('rut',$id_persona);
		$this->db->update('persona',$data);

		$this->db->where('id_rut',$id_persona);
		$this->db->update('persona_es_contacto',$cargo);
		return true;
	}

	public function marcar_sesion_valida($id_persona,$data){
		$this->db->where('rut',$id_persona);
		$this->db->update('persona',$data);
		return true;
	}
}
?>