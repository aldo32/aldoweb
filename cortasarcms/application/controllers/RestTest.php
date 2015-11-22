<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestTest extends CI_Controller
{

    var $usuarioSession;

    function __construct() {
        parent::__construct();
    }

    public function iniciarTramite() {
        $mimeTtpe1 = finfo_file(finfo_open(FILEINFO_MIME_TYPE), "./uploads/tramites/correos/doc1.docx");
        $mimeTtpe2 = finfo_file(finfo_open(FILEINFO_MIME_TYPE), "./uploads/tramites/correos/doc2.docx");
        $mimeTtpe3 = finfo_file(finfo_open(FILEINFO_MIME_TYPE), "./uploads/tramites/correos/doc2.docx");

        $params["files[0]"] = new CURLFile("./uploads/tramites/correos/doc1.docx", $mimeTtpe1, "doc1.docx");
        $params["files[1]"] = new CURLFile("./uploads/tramites/correos/doc2.docx", $mimeTtpe2, "doc2.docx");
        $params["files[2]"] = new CURLFile("./uploads/tramites/correos/doc3.docx", $mimeTtpe3, "doc3.docx");
        $params["idTramite"] = 3;


        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/cortasarcms/RestTramites/inicio?aldo=aldo');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_UPLOAD, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params);

        $buffer = curl_exec($curl_handle);
        $error = curl_error($curl_handle);

        curl_close($curl_handle);

        $result = json_decode($buffer);
        print_r($result);
        echo "<br>";
        print_r($error);
    }

    function pruebas() {
        $mimeTtpe1 = finfo_file(finfo_open(FILEINFO_MIME_TYPE), "./uploads/tramites/correos/doc1.docx");
        $params = array(
            "idTramite"=>"3",
            "email"=>"isc.aldo@gmail.com",
            "upload[0]"=> new CurlFile('C:/Git/aldoweb/cortasarcms/uploads/tramites/correos/doc1.docx', $mimeTtpe1, 'doc1.docx'),
            "upload[1]"=> new CurlFile('C:/Git/aldoweb/cortasarcms/uploads/tramites/correos/doc1.docx', $mimeTtpe1, 'doc1.docx'),
            "upload[2]"=> new CurlFile('C:/Git/aldoweb/cortasarcms/uploads/tramites/correos/doc1.docx', $mimeTtpe1, 'doc1.docx'),
        );

        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/cortasarcms/RestTramites/iniciarTramite');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $params);

        $buffer = curl_exec($curl_handle);
        $error = curl_error($curl_handle);

        $result = json_decode($buffer);
        print_r($result);
        echo "<br>";
        print_r($error);
    }
}