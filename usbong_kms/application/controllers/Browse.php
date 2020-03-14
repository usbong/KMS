<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends CI_Controller { //MY_Controller {

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
//	public function search()//$param)
	public function index()
	{
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616

/*
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeaderWith($data);
		//--------------------------------------------
		$this->load->view('templates/right_side_bar');
		//--------------------------------------------
*/

/*		
		$this->load->model('Search_Model');
		$data['result'] = $this->Search_Model->getSearchResult($this->input->get('param'));//$param);

		//added by Mike, 20170825
		$customer_id = $this->session->userdata('customer_id');

		if ($customer_id==null) {
			$customer_id=-1;
		}
*/
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('browse', $data);

/*		
		//--------------------------------------------
		$this->load->view('templates/footer');	
*/		
	}
	
	public function confirm()
	{
		$data['nameParam'] = $_POST["nameParam"]; //added by Mike, 20170616
/*
		if (!isset($_POST["nameParam"])) { //$data['nameParam'])) {
			redirect('browse');
		}
*/

/*
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeaderWith($data);
		//--------------------------------------------
		$this->load->view('templates/right_side_bar');
		//--------------------------------------------
*/

/*		
		$this->load->model('Search_Model');
		$data['result'] = $this->Search_Model->getSearchResult($this->input->get('param'));//$param);

		//added by Mike, 20170825
		$customer_id = $this->session->userdata('customer_id');

		if ($customer_id==null) {
			$customer_id=-1;
		}
*/
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
	
/*	
		$searchData = array(
				'customer_id' => $customer_id,
				'searched_item' => $this->input->get('param'),
				'added_datetime_stamp' => $dateTimeStamp
		);
*/	
//		$this->Browse_Model->getNamesListViaName($searchData);


		$this->load->model('Browse_Model');
/*
		$searchData = array(
				'searched_item' => $data['nameParam']
		);
		$data = $this->Browse_Model->getNamesListViaName($searchData);
*/

/*		$data['result'] = $this->Browse_Model->getNamesListViaName($data);
*/
	
		$data['result'] = $this->Browse_Model->getDetailsListViaName($data);

/*		
		//TO-DO: -add: get only name strings from array 
		foreach ($data as $value) {
//			echo $value['report_description'];			
			echo $value['patient_name'];
			
			echo "<br/><br/>";
		}
*/
/*
		foreach ($data as $value) {
			echo $value['report_description'];
			echo "<br/><br/>";
		}
*/
		
//		echo $data[2]['report_description'];
				
		$this->load->view('browse', $data);

/*		
		//--------------------------------------------
		$this->load->view('templates/footer');	
*/		
	}
}
