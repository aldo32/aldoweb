<?php
class Model_directorios extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getDirectoryById($id) {
        $sql = "SELECT * FROM directorio WHERE id = $id";
        $q = $this->db->query($sql);

        return $q->row();
    }
}