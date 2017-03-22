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

/**
 * Class GeneraCore
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Controllers
 * @author   Aldo Marañon <amaranon@kichink.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
class MY_LayoutCore extends CI_Controller
{
    var $template  = array();
    var $data      = array();
    var $content = "";

    /**
     * Method to create general layout
     *
     * @return mixed
     */
    public function generalLayout()
    {
        //data to template index
        $this->template['title'] = $this->data['title_page'];

        //load views with params data
        $this->template['includes'] = $this->load->view('layout/includes', "", true);
        $this->template['header'] = $this->load->view('layout/header', "", true);
        $this->template['menu'] = $this->load->view('layout/menu', "", true);
        $this->template['content'] = $this->load->view($this->content, $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer', "", true);

        $this->load->view('layout/index', $this->template);
    }
}
