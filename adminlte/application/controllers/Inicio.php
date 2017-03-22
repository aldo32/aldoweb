<?php
/**
 * Validating basepath
 *
 * PHP version 5
 *
 * @category Validating
 * @package  Controllers
 * @author   Aldo Marañon <amaranon@kichink.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "core/GeneralCore.php";

/**
 * Class Inicio
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Controllers
 * @author   Aldo Marañon <amaranon@kichink.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
class Inicio extends GeneralCore
{

    /**
     * Inicio constructor.
     */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    /**
     * Method index
     *
     * @return mixed
     */
    public function index()
    {
        $this->data["title_page"] = "home";
        $this->data["nombre"] = "Titulo";

        $this->content = "home/home_view";
        $this->generalLayout();
    }

    /**
     * Method test
     *
     * @return mixed
     */
    function test()
    {
        $this->data["title_page"] = "test";
        $this->data["nombre"] = "OK";

        $this->content = "home/home_view";
        $this->generalLayout();
    }
}
