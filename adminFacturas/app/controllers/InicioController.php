<?php
use Illuminate\Support\Facades\View;
class InicioController extends BaseController {	

	public function __construct() {	
		parent::__construct();
		View::share('section', 'inicio');
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
					b.deleted_at IS NULL AND
				    b.iduser = ?
				    ORDER BY b.created_at
    	"; 
		$bills = DB::select($sql, array(Auth::user()->iduser));	
		
		return View::make("inicio/index")->with('alert', $alert)->with('bills', $bills);
	}
	
	function eliminarFactura($idbill) {
		$bill = Bill::find($idbill); 
		
		if (count($bill) >= 1) {
			if (file_exists($bill->urlpdf)) { unlink($bill->urlpdf); }
			if (file_exists($bill->urlxml)) { unlink($bill->urlxml); }
			
			$bill->delete();
			
			$alert = '<div style="font-weight: bold; color: orange; font-size: 22px;">Se eliminó correctamente el registro</div>';
			return Redirect::to('inicio')->with('alert', $alert);
		}
		else {
			$alert = '<div style="font-weight: bold; color: yellow; font-size: 22px;">No se encontro el registro</div>';
			return Redirect::to('inicio')->with('alert', $alert);
		}
	}
}
