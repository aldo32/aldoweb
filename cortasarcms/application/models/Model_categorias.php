<?php
class Model_categorias extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getCategorias() {
        $sql = "SELECT * FROM categorias";

        $q=$this->db->query($sql);
        if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;

			$q->free_result();
			return $data;
		}
	}

    function getSubCategorias() {
        $sql = "SELECT *, (SELECT nombre FROM categorias WHERE id=subcategorias.idCategoria) AS nombreCategoria FROM subcategorias";

        $q=$this->db->query($sql);
        if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;

			$q->free_result();
			return $data;
		}
	}

    function getComboCategorias() {
        $sql = "SELECT * FROM categorias";

        $q=$this->db->query($sql);
        $options["-1"] = "Seleccione una categoria";
        if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;

			$q->free_result();
			return $options;
		}
    }

	function getComboSubCategorias() {
        $sql = "SELECT * FROM subcategorias";

        $q=$this->db->query($sql);
        $options["-1"] = "Seleccione una subcategoria";
        if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;

			$q->free_result();
			return $options;
		}
    }

    function getCategoriaById($id, $type) {
        $table = ($type == "cat") ? "categorias" : "subcategorias";

        $sql = "SELECT * FROM $table WHERE id=?";

        $q=$this->db->query($sql, array($id));
        return ($q->num_rows() > 0) ? $q->row() : false;
    }

	function deleteCategory($id, $type) {
		$table = ($type == "cat") ? "categorias" : "subcategorias";

		if ($type == "cat") {
			//TO DO Agregar la busque de tramites asociados a la categoria tambien
			$sql = "SELECT * FROM subcategorias WHERE idCategoria = $id LIMIT 1";
			$q=$this->db->query($sql);
			if ($q->num_rows() > 0) {
				return FALSE;
			}
			else {
				$sql = "DELETE FROM $table WHERE id=?";
				$q=$this->db->query($sql, array($id));

				return TRUE;
			}
		}

		if ($type != "cat") {
			//TO DO Agregar la busque de tramites asociados a la categoria tambien
			$sql = "SELECT * FROM tramites WHERE idSubCategoria = $id LIMIT 1";
			$q=$this->db->query($sql);
			if ($q->num_rows() > 0) {
				return FALSE;
			}
			else {
				$sql = "DELETE FROM $table WHERE id=?";
				$q=$this->db->query($sql, array($id));

				return TRUE;
			}
		}
	}
}
