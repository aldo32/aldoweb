<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller
{
    var $userSession;

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->userSession = $this->session->userdata("usuario");
    }

    public function index()
    {
        $data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');

        $this->load->view("secciones/secciones_view", $data);
    }

    function showSection() {
        $idSeccion = $this->input->post("idSection");
        $titulo = "";
        $descripcion="";
        $activo="1";

        if ($idSeccion != "") {
            $q = $this->db->get_where("secciones", array("seccion"=>$idSeccion));
            $seccion = $q->row();

            if (isset($seccion)) {
                $titulo = $seccion->titulo;
                $descripcion = $seccion->descripcion;
                $activo = $seccion->activo;
            }

            ?>
            <!-- CKeditor -->
            <script src="<?php echo base_url()?>resources/ckeditor/ckeditor.js" type="text/javascript"></script>

            <script>
            $(document).ready(function() {
                //$("#descripcion").wysihtml5();
                //CKEDITOR.replace('descripcionSeccion');
            });
            </script>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Titulo</label>
                    <?php echo form_input(array('name'=>'titulo','id'=>'titulo', 'class'=>'form-control input-sm', 'value' =>set_value('titulo', $titulo)));?>
                </div>
                <div class="form-group col-md-12">
                    <label>Descripción</label>
                    <textarea style="" name="descripcionSeccion" id="descripcionSeccion" placeholder="Escriba la descrición"><?php  ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Activo&nbsp;&nbsp;</label>
                    Si&nbsp;&nbsp;
                    <input type="radio" name="activo" value="1" <?php if ($activo == 1) { echo "checked"; }  ?>  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    No&nbsp;&nbsp;
                    <input type="radio" name="activo" value="0" <?php if ($activo == 0) { echo "checked"; }  ?>  />
                </div>
            </div>

            <button class="btn btn-primary" id="saveSection" type="button">Guardar</button>
            <?php
        }
        else echo "";

    }

    function getSection() {
        $data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');

        $idSeccion = $this->input->post("seccion");

        $q = $this->db->get_where("secciones", array("seccion"=>$idSeccion));
        $seccion = $q->row();

        if (isset($seccion))
            $data["seccion"] = $seccion;
        else
            $data["seccion"] = "";

        $this->load->view("secciones/secciones_view", $data);
    }

    function saveSection() {
        $idSeccion = $this->input->post("seccion");
        $titulo = $this->input->post("titulo");
        $descripcion = $this->input->post("descripcion", false);
        $activo = $this->input->post("activo");

        $q = $this->db->get_where("secciones", array("seccion"=>$idSeccion));
        $seccion = $q->row();

        if (isset($seccion)) {
            //update
            $sql = "UPDATE secciones SET titulo='".$titulo."', descripcion='".$descripcion."', activo=$activo WHERE id = $seccion->id AND seccion=$idSeccion";
            $q = $this->db->query($sql);
        }
        else {
            //insert
            $register["seccion"] = $idSeccion;
            $register["titulo"] = $titulo;
            $register["descripcion"] = $descripcion;
            $register["activo"] = $activo;

            $this->db->insert("secciones", $register);
        }

        $data = $this->general();
        $data["alert"] = array("type"=>"error", "image"=>"ban", "message"=>"Se actualizo correctamente la sección");

        $idSeccion = $this->input->post("seccion");

        $q = $this->db->get_where("secciones", array("seccion"=>$idSeccion));
        $seccion = $q->row();

        if (isset($seccion))
            $data["seccion"] = $seccion;
        else
            $data["seccion"] = "";

        $this->load->view("secciones/secciones_view", $data);
    }


    function general() {
        $config['usuario'] = $this->userSession;
        $config['page'] = "secciones";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);
        $data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

        $options = array(""=>"Seleccione una opción para continuar", "1"=>"Por que invertir", "2"=>"Quienes somos", "3"=>"Misión y visión");
        $data["comboSecciones"] = $options;

        return $data;
    }
}