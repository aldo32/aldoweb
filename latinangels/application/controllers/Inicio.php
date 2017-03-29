<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "core/MY_LayoutCore.php";

class Inicio extends MY_LayoutCore {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["language"])) $_SESSION["language"] = "spanish";
        $this->lang->load("text", $_SESSION["language"]);
    }

    public function index() {
        $this->data["title_page"] = $this->lang->line('menu_home');
        $this->data["language"] = $_SESSION["language"];
        $this->data["menu"] = "inicio";

        $this->content = "inicio_view";
        $this->generalLayout();
    }

    public function vervideo() {
        $this->data["title_page"] = $this->lang->line('ver_video');
        $this->data["language"] = $_SESSION["language"];
        $this->data["menu"] = "inicio";

        $this->content = "vervideo_view";
        $this->generalLayout();
    }

    public function videos() {
        $this->data["title_page"] = $this->lang->line('menu_videos360');
        $this->data["language"] = $_SESSION["language"];
        $this->data["menu"] = "videos360";

        $this->content = "videos360_view";
        $this->generalLayout();
    }

    public function fotos() {
        $this->data["title_page"] = $this->lang->line('menu_fotos360');
        $this->data["language"] = $_SESSION["language"];
        $this->data["menu"] = "fotos360";

        $this->content = "fotos360_view";
        $this->generalLayout();
    }

    public function travel() {
        $this->data["title_page"] = $this->lang->line('menu_travel');
        $this->data["language"] = $_SESSION["language"];
        $this->data["menu"] = "travel";

        $this->content = "travel_view";
        $this->generalLayout();
    }

    public function lenceria() {
        $this->data["title_page"] = $this->lang->line('menu_lenceria');
        $this->data["language"] = $_SESSION["language"];
        $this->data["menu"] = "lenceria";

        $this->content = "lenceria2_view";
        $this->generalLayout();
    }

    public function setLanguage() {
        $language = $_GET["language"];
        $request = $_GET["request"];

        if ($language != "spanish" && $language != "english" && $language != "portugues") {
            $language = "spanish";
        }

        $_SESSION["language"] = $language;

        redirect($request);
    }
}
