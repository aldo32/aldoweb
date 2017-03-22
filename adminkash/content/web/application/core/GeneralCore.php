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
class GeneralCore extends CI_Controller
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
        $this->template['title'] = $this->data['title_page'];
        $this->template['includes'] = $this->load->view('layout/includes_view', $this->data, true);
        $this->template['header'] = $this->load->view('layout/header_view', $this->data, true);
        $this->template['sidebar'] = $this->load->view('layout/sidebar_view', $this->data, true);
        $this->template['content'] = $this->load->view($this->content, $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer_view', $this->data, true);
        $this->template['config'] = $this->load->view('layout/config_view', $this->data, true);

        $this->load->view('layout/general_layout', $this->template);
    }
}