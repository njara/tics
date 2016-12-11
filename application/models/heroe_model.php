<?php

class Heroe_Model extends CI_Model
{
	 public function __construct()
    {
        parent::__construct();
    }
    
	public function getAll(){
		$query = $this->db->query('SELECT h.nombre_heroe as Nombre, h.historia as Historia, p.nombre as Poder, h.historia, cate.nombre as Categoria from heroe h LEFT JOIN comic c ON h.id = c.id_heroe_protagonista LEFT JOIN saga s ON c.id_saga = s.id LEFT JOIN heroe_tiene_poder hp ON h.id = hp.id_heroe LEFT JOIN poder p ON hp.id_poder = p.id LEFT JOIN categorizar categ ON h.id = categ.id_personaje LEFT JOIN categoria cate ON categ.id_categoria = cate.id');

	//	$result = $this->db->get ('heroe');
		$heroes = $query->result();
		return $heroes;		
	}
	public function getAllDetail(){
		$query = $this->db->query('SELECT h.nombre_heroe as Nombre, h.nombre_civil as NombreCivil, h.historia as Historia, p.nombre as Poder, c.nombre as Comic, c.fecha_publicacion as FechaDePublicacion, s.nombre as Saga, cate.nombre as Categoria,IF(ISNULL(peli.nombre), "---", peli.nombre) as Pelicula, IF(ISNULL(peli.fecha_estreno), "---", peli.fecha_estreno) as FechaEstreno, IF(ISNULL(peli.reacaudacion), "---", peli.reacaudacion) as Recaudacion from heroe h LEFT JOIN empresa e ON h.id_empresa = e.id LEFT JOIN comic c ON h.id = c.id_heroe_protagonista LEFT JOIN saga s ON c.id_saga = s.id LEFT JOIN heroe_tiene_poder hp ON h.id = hp.id_heroe LEFT JOIN poder p ON hp.id_poder = p.id LEFT JOIN categorizar categ ON h.id = categ.id_personaje LEFT JOIN categoria cate ON categ.id_categoria = cate.id LEFT JOIN personaje_de_pelicula pp ON h.id = pp.id_heroe LEFT JOIN pelicula peli ON pp.id_pelicula = peli.id');

	//	$result = $this->db->get ('heroe');
		$heroes = $query->result();
		return $heroes;		
	}
}
?>