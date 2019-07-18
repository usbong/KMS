<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller { //MY_Controller {

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
	 
	public function confirm()
	{				
/*		$customer_id = $this->session->userdata('customer_id');

		if (!isset($customer_id)) {
			redirect('account/login'); //home page
		}
	
		$fields = array('productNameParam', 'productLinkParam', 'productTypeParam', 'quantityParam', 'totalBudgetParam', 'commentsParam');
		
		foreach ($fields as $field)
		{
			$data[$field] = $_POST[$field];
		}
*/

/*
		$field = "reportParam";
//		while ($i = 1; $i <= 10; $i++) {
		$count = 0; 
		while ($count < 10) {
			$data[$field.$count] = $_POST[$field.$count];			
			$count++;
		}
		
		$this->load->model('Report_Model');
		$data["is_success"] = $this->Report_Model->insertReport($data);//, $member_id);
*/
		$this->load->model('Report_Model');
		$this->load->model('Account_Model');

		$field = "reportParam";
		$count = 1;
		
		$data["memberNameParam"] = $_POST["memberNameParam"];
		$data["memberId"] = $this->Account_Model->autoRegisterAccount($data);
		
		while ($count <= 10) {
			$data["reportAnswerParam"] = $_POST[$field.$count];		
			$data["reportItemId"] = $count;

			$data["is_success"] = $this->Report_Model->insertReport($data);//, $member_id);

			$count++;
		}
				
		$this->session->set_flashdata('data', $data);

/*		
		//from application/core/MY_Controller
		$this::initStyle();
		$this::initHeader();
		//--------------------------------------------
		
		$this->load->library('session');
		$this->load->library('form_validation');
								
		$this->load->view('request');
		
		//--------------------------------------------
		$this->load->view('templates/footer');
*/		

		//edited by Mike, 20190717

/*		$this->load->view('report');
*/		
//		redirect('');			
		
		echo "<script>
				alert('You have successfully submitted your report. Thank you. Peace.');
				window.location.href='".base_url()."';
			  </script>";			
	}
}
