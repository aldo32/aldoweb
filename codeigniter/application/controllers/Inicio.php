<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "core/MY_LayoutCore.php";

class Inicio extends MY_LayoutCore {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data["title_page"] = "home";
        $this->data["nombre"] = "Aldo";

        $this->content = "inicio_view";
        $this->generalLayout();
    }
}
