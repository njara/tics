<?php

class Alumno_model extends CI_Model { 
	public function __construct() {
		parent::__construct();
	}
	public function alumnos_empresa($rut_empresa){

		$this->db->select('curso.id, alumno.nombre as alumno, alumno.apellido_paterno as alumno_apellido_paterno,alumno.apellido_materno as alumno_apellido_materno,, rut, dv, correo, curso.nombre as curso_nombre');
		$this->db->from('orden_de_compra');
		$this->db->join('curso', 'curso.id = id_curso');
		$this->db->join('curso_tiene_alumnos', 'curso_tiene_alumnos.id_curso = curso.id');
		$this->db->join('persona as alumno', 'alumno.rut = id_alumno');
		$this->db->where('id_empresa', $rut_empresa);
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
	}

	public function select_alumnos($id_persona){

		$this->db->select('persona.rut, dv, nickname, persona.nombre as nombre, apellido_paterno, apellido_materno,correo, sexo.nombre as sexo, empresa.nombre as empresa, cargo_en_la_empresa');
		$this->db->from('persona');
		$this->db->join('sexo', 'persona.sexo = sexo.id');
		$this->db->join('empresa', 'empresa.id_contacto = persona.rut');
		$this->db->join('persona_es_contacto', 'persona_es_contacto.id_rut = persona.rut');
		$this->db->where('persona.rut',$id_persona);

		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
	public function update_perfil($id_persona,$data,$cargo){
		$this->db->where('rut',$id_persona);
		$this->db->update('persona',$data);

		$this->db->where('id_rut',$id_persona);
		$this->db->update('persona_es_contacto',$cargo);
		return true;
	}
}
?>