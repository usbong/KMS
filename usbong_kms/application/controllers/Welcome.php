<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//added by Mike, 20190725
		$this->load->library('QRcode');

		//note by Mike, 20190725: object instance, i.e. "qrcode", must be lower case
		$this->qrcode->png('the quick brown');
		
		//note by Mike, 20190725: escape the apostrophe character, i.e. "'", by replacing it with "\'" in the encrypted input text		
		//$this->qrcode->png('Salted...');
		
		//edited by Mike, 20190714
		//$this->load->view('welcome_message');
		
		//removed by Mike, 20190725
		//$this->load->view('report');
	}
}
