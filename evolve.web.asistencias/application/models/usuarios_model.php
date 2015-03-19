<?php 
class usuarios_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function login($user, $password) {
		$sql="SELECT * FROM usuarios WHERE usuario=? AND password=? AND activo=? limit 1";
		$q=$this->db->query($sql, array($user, $password, 1));
		
		return ($q->num_rows() > 0) ? $q->row() : false;		
	}
	
	function getAllUsers() {
		$sql="SELECT *, (SELECT nombre FROM horarios WHERE id=u.idHorario) AS horario FROM usuarios u ORDER BY u.nombre ASC";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
				
			$q->free_result();
			return $data;
		}
	}
	
	function checkUser($id) {
		$sql="SELECT * FROM usuarios WHERE id=?";
		$q=$this->db->query($sql, array($id));
		
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function usuariosPorGrupo($idGrupo, $idEtapa) {
		$sql="
			SELECT
			    u.id AS idUsuario,
				u.nombre AS nombreUsuario,
				egu.idGrupo AS idGrupo,
				g.nombre AS nombreGrupo
			FROM
				usuarios u,
				grupos g,
				gruposetapasusuarios egu
			WHERE
				u.id = egu.idUsuario AND
				g.id = egu.idGrupo AND
				egu.idGrupo = ? AND
				egu.idEtapa = ?
				ORDER BY u.nombre		
		";
		$q=$this->db->query($sql, array($idGrupo, $idEtapa));
			
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
	
	function chekUserInGruposEtapasUsuarios($idEtapa, $idGrupo, $idUsuario) {
		$sql="SELECT *, (SELECT nombre from usuarios WHERE id=gruposetapasusuarios.idUsuario) AS nombreUsuario FROM gruposetapasusuarios WHERE idEtapa=? AND idGrupo=? AND idUsuario=?";
		$q=$this->db->query($sql, array($idEtapa, $idGrupo, $idUsuario));
		
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function getPermisionsUser($idUsusario) {
		$sql="SELECT *, (SELECT nombre FROM permisos WHERE idPermiso=permisosusuarios.idPermiso) AS nombrePermiso FROM permisosusuarios ORDER BY permisosusuarios.fecha ASC";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
	
	function getComboPermisos() {
		$sql="SELECT * FROM permisos";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			$options[-1]="Seleccione un permiso";
		
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;
		
			$q->free_result();
			return $options;
		}
	}
	
	function checkPermisoUsuario($id) {
		$sql="SELECT * FROM permisosusuarios WHERE id=?";
		$q=$this->db->query($sql, array($id));
		
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
}	