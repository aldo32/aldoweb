<?php
include 'services/Services.php';
include 'dto/Worker.php';

if ($_POST) {
    $opcion = $_POST["opcion"];
} else if ($_GET) {
    $opcion = $_GET["opcion"];
} else { $opcion = "index"; }

$controller = new WorkerController($opcion);

class WorkerController {
    public $worker;
    public $services;

    public function __construct($opcion) {
        $this->worker = new Worker();
        $this->services = new Services();

        switch ($opcion) {
            case 'index':
                $this->index();
                break;
            case 'save':
                $this->sendDataWorker();
            break;
        }
    }

    function index() {
        $departments = $this->getComboDepartments();
        exit();
        require_once 'view/worker_form.php';
    }

    function sendDataWorker() {
        $model = new ModelWorker();

        $this->worker->setName($_POST["name"]);
        $this->worker->setNameDepartment($_POST["nameJob"]);

        $model->saveWorker($this->worker);
    }

    function getComboDepartments() {
        $this->services->openDB();
        $res = mysql_query("SELECT * FROM departments ORDER BY name ASC");

        $departments = array();
        while ( ($obj = mysql_fetch_object($res)) != NULL ) {
            print_r($obj);
            exit();
            $contacts[] = $obj;
        }
    }
}