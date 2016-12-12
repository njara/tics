<?php

class Admin_model extends CI_Model { 
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
	public function alumnos(){
		$this->db->select('curso.id, alumno.nombre as alumno, alumno.apellido_paterno as alumno_apellido_paterno,alumno.apellido_materno as alumno_apellido_materno,, rut, dv, correo, curso.nombre as curso_nombre');
		$this->db->from('orden_de_compra');
		$this->db->join('curso', 'curso.id = id_curso');
		$this->db->join('curso_tiene_alumnos', 'curso_tiene_alumnos.id_curso = curso.id');
		$this->db->join('persona as alumno', 'alumno.rut = id_alumno');
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
	}
	public function orden_compra() {
		$this->db->select('empresa.nombre as empresa, orden_de_compra.id as id, curso.nombre as curso_nombre, ejecutivo.nombre as ejecutivo, ejecutivo.apellido_paterno as ejecutivo_apellido_paterno,  gestor.nombre as gestor, gestor.apellido_paterno as gestor_apellido_paterno,valor_curso');
		$this->db->from('orden_de_compra');
		$this->db->join('curso', 'curso.id = id_curso');
		$this->db->join('persona as ejecutivo', 'ejecutivo.rut = id_ejecutivo');
		$this->db->join('persona as gestor', 'gestor.rut = id_gestor');
		$this->db->join('empresa', 'empresa.rut = id_empresa');
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
	}
	public function empresas(){
		$this->db->select('rut, nombre, id_contacto, telefono');
		$this->db->from('empresa');
		
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
	}

	public function usuarios(){
		$this->db->select('persona.rut, persona.nombre, persona.nickname, persona.status');
		$this->db->from('usuario');
		$this->db->join('persona','usuario.id_persona = persona.rut');
		
		$consulta = $this->db->get();
		$resultado = $consulta->result_array();
		return $resultado;
	}
	public function ban($rut){
		$sql = "UPDATE persona SET status= 2  WHERE rut = ".$rut;
 		$this->db->query($sql);
		
	}
	public function unban($rut){
		$sql = "UPDATE persona SET status= 1  WHERE rut = ".$rut;
 		$this->db->query($sql);
		
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