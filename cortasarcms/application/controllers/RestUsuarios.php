<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestUsuarios
 * @Author Aldo Marañon Andrade
 */
class RestUsuarios extends REST_Controller {

    function __construct() {
		parent::__construct();

		$this->load->model("Model_usuarios", "usuarios");
	}

    /***
     * REST: Alta de usuario
     * URL: /RestUsuarios/nuevoUsuario?nombre=aldo&apellidos=marañon andradé&telefono=5531224198&email=isc.aldo@hotmail.com&password=aldoma&idPerfil=1
     * RETURN SUCCESS: status, message, idUsuario
     * RETURN ERROR: status, message
     */
    function nuevoUsuario_get() {
        $reg["nombre"] = $this->get('nombre');
        $reg["apellidos"] = $this->get('apellidos');
        $reg["telefono"] = $this->get('telefono');
        $reg["email"] = $this->get('email');
        $reg["password"] =  sha1(md5($this->get('password')));
        $reg["idPerfil"] = $this->get('idPerfil');

        //Checando que el email no existe en la BD
        $email = $this->usuarios->getUserByEmail($reg["email"]);
        if (!$email) {
            $this->db->insert("usuarios", $reg);
            $idUsuario = $this->db->insert_id();
            $response = array("status"=>"success", "message"=>"Usuario creado correctamente", "idUsuario"=>$idUsuario);
        }
        else {
            $response = array("status"=>"error_email", "message"=>"El correo ".$reg["email"]." ya existe en la bd");
        }

        $this->response($response);
    }

    /***
     * REST: Obtener usuario
     * URL: /RestUsuarios/obtenerUsuario?idUsuario=1
     * RETURN SUCCESS: status, usuario[],
     * RETURN ERROR: status, message
     */
    function obtenerUsuario_get() {
        $idUsuario = $this->get("idUsuario");

        $q = $this->db->get_where("usuarios", array("id"=>$idUsuario));
        $usuario = $q->row();

        if (isset($usuario))
            $response = array("status" => "success", "usuario"=>$usuario);
        else
            $response = array("status"=>"error", "message"=>"No se encontro el usuario");

        $this->response($response);
    }

    /***
     * REST: Obtener usuario
     * URL: /RestUsuarios/obtenerTodosUsuarios
     * RETURN SUCCESS: status, usuarios[],
     * RETURN ERROR: status, message
     */
    function obtenerTodosUsuarios_get() {
        $q = $this->db->get("usuarios");
        $usuarios = $q->result();

        if (isset($usuarios))
            $response = array("status" => "success", "usuarios"=>$usuarios);
        else
            $response = array("status"=>"error", "message"=>"No se encontro el usuario");

        $this->response($response);
    }

    /***
     * REST: Listado de perfiles
     * URL: /RestUsuarios/getPerfiles
     * RETURN SUCCESS: status, message, idUsuario
     * RETURN ERROR: status, message
     */
    function getPerfiles_get() {
        $query = $this->db->get('perfiles');
        $this->response($query->result());
    }

    /***
     * REST: Actualización de usuario
     * URL: /RestUsuarios/updateUsuario?idUsuario=1&nombre=aldo2&apellidos=marañon andradé2&telefono=15531224198&email=1isc.aldo@hotmail.com&idPerfil=2&activo=0
     * RETURN: status, message
     */
    function updateUsuario_get() {
        $idUsuario = $this->get('idUsuario');
        $reg["nombre"] = $this->get('nombre');
        $reg["apellidos"] = $this->get('apellidos');
        $reg["telefono"] = $this->get('telefono');
        $reg["email"] = $this->get('email');
        $reg["idPerfil"] = $this->get('idPerfil');
        $reg["activo"] = $this->get('activo');

        $this->db->db_debug = FALSE;

        $this->db->where('id', $idUsuario);
        $this->db->update('usuarios', $reg);

        $error = $this->db->error();
        if ($error["code"] == 0)
            $response = array("status"=>"success", "message"=>"Usuario actualizado correctamente");
        else
            $response = array("status"=>"error", "message"=>$error);

        $this->db->db_debug = TRUE;
        $this->response($response);
    }

    /***
     * REST: Actualizacion de password para usuarios
     * URL: /RestUsuarios/sendNewPasswordUsuario?email=isc.aldo@hotmail.com
     * RETURN: status, message
     */
    function sendNewPasswordUsuario_get() {
        $email = $this->get('email');

        $usuario = $this->usuarios->getUserByEmail($email);
        if ($usuario) {
            $password ="cortasar".rand(1000, 9000);
            $newPassword = sha1(md5($password));

            $this->db->where('email', $email);
            $this->db->update('usuarios', array("password"=>$newPassword));

            $message = "<b>CORTASAR CMS</b><br><br>Usuario: $email<br><br>Su nueva contraseña es: $password<br><br>Cualquier duda acerca de su cuanta contacte al administrador.";
            $this->generallib->sendEmail($message, 'isc.aldo@gmail.com', 'Administrador Cortasar CMS', $email, 'Restaurar password, Cortasar CMS');

            $response = array("status"=>"success", "message"=>"Se envio el nuevo password a su cuenta de correo, por favir verifique su buzon de entrada");
        }
        else {
            $response = array("status"=>"error", "message"=>"no se encontro el correo ".$email." en la bd");
        }

        $this->response($response);
    }

    /***
     * REST: Elimina un usuario
     * URL: /RestUsuarios/eliminarUsuario?idUsuario=43
     * RETURN: status, message
     */
    function eliminarUsuario_get() {
        $idUsuario = $this->get('idUsuario');
        $usuario = $this->usuarios->getUserById($idUsuario);
        if ($usuario) {
            $this->db->delete('usuarios', array('id' => $usuario->id));
            $response = array("status"=>"success", "message"=>"El usuario ".$usuario->nombre." se eliminó correctamente");
        }
        else
            $response = array("status"=>"error", "message"=>"No se encontro al usuario en la BD");

        $this->response($response);
    }
}
