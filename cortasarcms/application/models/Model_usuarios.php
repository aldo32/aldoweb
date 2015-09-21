<?php
class Model_usuarios extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function login($email, $password) {
		$sql="SELECT u.id AS idUsuario, u.nombre AS nombre, u.apellidos AS apellidos, u.email AS email, p.nombre AS perfil, p.id AS idPerfil FROM usuarios u, perfiles p WHERE u.idPerfil=p.id AND u.email=? AND u.password=?";
		$q=$this->db->query($sql, array($email, $password));

		return ($q->num_rows() > 0) ? $q->row() : false;
	}

	function getComboPerfiles() {
		$sql="SELECT * FROM perfiles";
		$q=$this->db->query($sql);

		if ($q->num_rows() > 0)
		{
			$options["-1"] = "Seleccione un perfil";
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;

			$q->free_result();
			return $options;
		}
	}

	function getUserById($id) {
		$sql="SELECT * FROM usuarios WHERE id=?";
		$q=$this->db->query($sql, array($id));

		return ($q->num_rows() > 0) ? $q->row() : false;
	}
}
