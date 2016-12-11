<?php

class OrdenCompra_model extends CI_Model { 
	public function __construct() {
		parent::__construct();
	}
	public function orden_compra($rut_empresa){

		$this->db->select('id_curso, curso.nombre as curso_nombre, ejecutivo.nombre as ejecutivo, gestor.nombre as gestor, valor_curso');
		$this->db->join('curso', 'curso.id = id_curso');
		$this->db->join('persona as ejecutivo', 'ejecutivo.rut = id_ejecutivo');
		$this->db->join('persona as gestor', 'gestor.rut = id_gestor');
		$this->db->from('orden_de_compra');
		$this->db->where('id_empresa', $rut_empresa);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
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