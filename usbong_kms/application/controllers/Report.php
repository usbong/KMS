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
		
		//removed by Mike, 20191025
/*		
		$data["memberNameParam"] = $_POST["memberNameParam"];
		$data["memberId"] = $this->Account_Model->autoRegisterAccount($data);
*/
		//edited by Mike, 20191025		
		$data["reportTypeNameParam"] = $_POST["reportTypeNameParam"];
//		$data["reportTypeId"] = $_POST["reportTypeIdParam"];
		
		$data["reportTypeId"] = $this->Report_Model->getReportTypeIdViaReportTypeName($data);

//		if ($data["reportTypeId"] == 3) { //Incident Report
		switch ($data["reportTypeId"]) {
			//TO-DO: -update: 3, 4.. with name constant 
			case 3: //Incident Report
				$data["memberNameParam"] = $_POST["memberNameParam"];
				$data["memberId"] = $this->Account_Model->autoRegisterAccount($data);

		//		while ($count <= 10) {
				while ($count <= 5) {
					$data["reportAnswerParam"] = $_POST[$field.$count];		
					$data["reportItemId"] = $count;

					$data["is_success"] = $this->Report_Model->insertReport($data);//, $member_id);

					$count++;
				}
				break;
			case 4: //Reports from All Locations
					$data["memberId"] = 1;
					$data["reportItemId"] = $count; //1

//					$data["reportAnswerParam"] = $_FILES['reportParamUploadFiles']['name'];
					$fileCount = count($_FILES['reportParamUploadFiles']['name']);
//					echo "File count: ".$fileCount;
					
//				    $fileContents = "";
				   
					for($i=0;$i<$fileCount;$i++)
					{
						//get the contents of each file
//						$fileContents = file_get_contents($_FILES['reportParamUploadFiles']['tmp_name'][$i]);
						$data["reportAnswerParam"] = file_get_contents($_FILES['reportParamUploadFiles']['tmp_name'][$i]);
						
						//echo "File contents: ".$fileContents."<br/>";

						$data["is_success"] = $this->Report_Model->insertReportFromEachLocation($data);
					}
					
//					$data["is_success"] = $this->Report_Model->insertReportsFromAllLocations($data);//, $member_id);
				break;				
		}
						
		//added by Mike, 20190722
		if ($data["is_success"]) {
			echo "<script>
					alert('You have successfully submitted your report. Thank you. Peace.');
					window.location.href='".base_url()."';
				  </script>";			
		}			
		else {
			echo "<script>
					alert('PROBLEM: Your report is unclassified. We have automatically filed an incident report with the system administrator. We shall notify you of our analysis and the corresponding action to resolve it. Thank you. Peace.');
					window.location.href='".base_url()."';
				  </script>";			
		}
	}
	
	//added by Mike, 20191025
	public function storeReportsForTheDayFromAllLocations()
	{
		$this->load->view('storeReportsForTheDayFromAllLocations');
	}
}
