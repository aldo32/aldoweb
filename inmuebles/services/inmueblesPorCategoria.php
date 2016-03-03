<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include 'Config/Conexion.php';

$response = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $result = new Conexion();
    $categoria = $_POST['categoria'];

    switch ($categoria) {
        case 1:
            $tabla = "casas";
            $id_field = "idcasa";
            $tipo_inmueble = 1;
            break;
        case 2:
            $tabla = "bodegas";
            $id_field = "idbodega";
            $tipo_inmueble = 4;
            break;
        case 3:
            $tabla = "departamentos";
            $id_field = "iddepartamentos";
            $tipo_inmueble = 3;
            break;
        case 4:
            $tabla = "locales";
            $id_field = "idlocal";
            $tipo_inmueble = 6;
            break;
        case 5:
            $tabla = "nave_industrial";
            $id_field = "idnave_industrial";
            $tipo_inmueble = 7;
            break;
        case 6:
            $tabla = "oficinas";
            $id_field = "idoficina";
            $tipo_inmueble = 5;
            break;
        case 7:
            $tabla = "rancho";
            $id_field = "idrancho";
            $tipo_inmueble = 8;
            break;
        case 8:
            $tabla = "terrenos";
            $id_field = "idterrenos";
            $tipo_inmueble = 2;
            break;
    }
    $respuesta = $result->getResult("SELECT * FROM " . $tabla);

    if($respuesta) {
        while($row = mysql_fetch_array($respuesta)) {
            $query = "SELECT * FROM images WHERE idcasa = " . $row[0] . ";";
            $respuestaImg = $result->getResult($query);
            $urlImg = "";
            if($respuestaImg) {
                $rowImg = mysql_fetch_array($respuestaImg);
                $urlImg = "http://www.sicksadworld.com.mx/prueba_3/administrador/assets/uploads/" . $rowImg[2];
            }

            $arr = array('img_banner' => $urlImg, 'id_inmueble' => $row[0], 'tipo' => $row['venta_renta'], 'precio' => $row['precio'], 'tipo_inmueble' => $tipo_inmueble, 'latitud' => $row['direccion_latitud'], 'longitud' => $row['direccion_longitud'], 'ciudad' => $row['direccion_municipio'], 'descripcion'=>$row['descripcion'], 'direccion_calle'=>$row['direccion_calle'], 'venta_renta'=>$row['venta_renta'], 'recamaras'=>$row['recamaras'], 'banos'=>$row['banos'], 'terreno_m2'=>$row['terreno_m2'], 'precio'=>$row['precio']);
            array_push($response, $arr);
        }
    }
    $arrayInmuebles = array('inmuebles' => $response , 'idError' => '0', 'mensajeError' => 'success');
    echo json_encode($arrayInmuebles, JSON_UNESCAPED_UNICODE);
}