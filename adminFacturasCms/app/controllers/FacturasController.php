<?php

class FacturasController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$alert = Session::get('alert');
		$sql="
				SELECT
					u.iduser AS iduser,
				    c.idcompany AS idcompany,
				    r.idrol AS idrol,
				    b.idbill AS idbill,
				    CONCAT(u.name,' ',u.lastname) AS username,
				    u.email AS email,
				    c.name AS company,
				    r.name AS rol,
				    b.urlpdf AS urlpdf,
				    b.urlxml AS urlxml,
				    b.message AS message,
					b.created_at AS created_at
				FROM
				    users u, bills b, company c, roles r
				WHERE
				    b.iduser = u.iduser AND
				    b.idcompany = c.idcompany AND
				    b.idrol = r.idrol AND
					b.deleted_at IS NULL				    
				    ORDER BY b.created_at
    	";
		$bills = DB::select($sql);
		
		return View::make('facturas/index')->with('bills', $bills)->with('alert', $alert);
	}
	
	function eliminarFactura($idbill) {		
		$bill = Bill::find($idbill);		
	
		if (count($bill) >= 1) {
			if (file_exists($bill->urlpdf)) { unlink($bill->urlpdf); }
			if (file_exists($bill->urlxml)) { unlink($bill->urlxml); }
				
			$bill->delete();
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La factura se elimino con éxito </div>';
			return Redirect::to('facturas')->with('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
			return Redirect::to('facturas')->with('alert', $alert);
		}
	}

	function getDownload($idbill, $type){		
		$bill = Bill::find($idbill);
		
		if ($type == "pdf") {
			$file= public_path()."/../../adminFacturas/public/".$bill->urlpdf;
			$headers = array('Content-Type: application/pdf');
			return Response::download($file, "iduser_".$bill->iduser."_archivo.pdf", $headers);
		}

		if ($type == "xml") {
			$file= public_path()."/../../adminFacturas/public/".$bill->urlxml;
			$headers = array('Content-Type: application/xml');
			return Response::download($file, "iduser_".$bill->iduser.'_archivo.xml', $headers);
		}
		
	}
}
