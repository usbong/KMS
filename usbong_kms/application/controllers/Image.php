<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller { //MY_Controller {

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
	 
//	public function confirm()
	public function confirm($transactionId)
	{	
		//added by Mike, 20191119
		if (isset($_SESSION['jsonResponses'])) {
//		if (empty($_POST["reportTypeNameParam"])) {
			unset($_SESSION['jsonResponses']);

			redirect(base_url()); //Report page
		}
	
		$responses = array(); //added by Mike, 20191120
		//TO-DO: -update: this
//		$this->load->model('Image_Model');
		$this->load->model('Report_Model');
//		$this->load->model('Account_Model');

		$field = "reportParam";
		$count = 1;

		//edited by Mike, 20191025		
		$data["reportTypeNameParam"] = $_POST["reportTypeNameParam"];
//		$data["reportTypeId"] = $_POST["reportTypeIdParam"];
		
		$data["reportTypeId"] = $this->Report_Model->getReportTypeIdViaReportTypeName($data);

//		if ($data["reportTypeId"] == 3) { //Incident Report
		switch ($data["reportTypeId"]) {
			//TO-DO: -update: 3, 4.. with name constant 
			case 5: //Report Image
				$data["memberId"] = 1;
				$data["reportItemId"] = $count; //1

				//TO-DO: -add: store the QR Code image file location in the database				
				//TO-DO: -add: store the contents, i.e. Report details, of the QR Code image file in the database				
				//TO-DO: -update: this
				$data["is_success"] = "Report Image";
				
				$fileCount = count($_FILES['reportParamUploadFiles']['name']);
								   
				for($i=0;$i<$fileCount;$i++)
				{
					//get the contents of each file
					$data["reportAnswerParam"] = file_get_contents($_FILES['reportParamUploadFiles']['tmp_name'][$i]);

					//added by Mike, 20191123; edited by Mike, 20200314
//					$outputFolder = "pictures"; //note: this folder already exists
					$outputFolder = "assets"; //note: this folder already exists	

					$outputFilename = $_FILES['reportParamUploadFiles']['name'][$i]; //.png
					//$outputFile = "image.png";
					
					//echo "File contents: ".$data["reportAnswerParam"]."<br/>";

					$data["outputFileLocation"] = $outputFolder."/".$transactionId."-".$outputFilename;
					
					//update filename if it already exists
					$iCountFilename = 1;
					while (file_exists($data["outputFileLocation"])) {
						$data["outputFileLocation"] = str_replace(".", "(".$iCountFilename.").",$data["outputFileLocation"]);
					}
					
					//added by Mike, 20200314
					$data["transactionId"] = $transactionId;

					//file_put_contents($outputFolder."/".$outputFilename, $data["reportAnswerParam"]);										

					file_put_contents($data["outputFileLocation"], $data["reportAnswerParam"]);										
//					$data["is_success"] = $this->Report_Model->insertReportFromEachLocation($data);

					$data["is_success"] = $this->Report_Model->insertReportImage($data);

				}				
				break;				
		}

		//added by Mike, 20191119
		$_POST = array();
								
		//added by Mike, 20190722; edited by Mike, 20200313
//		if ($data["is_success"]) {									
		if (!empty($data["is_success"])) {									
			if (!empty($responses)) {
				$_SESSION['jsonResponses'] = json_encode($responses);
/*								
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');					
						window.location.href='".site_url('report/autoGenerateQRCodeImage/')."';
					  </script>";			
*/					  
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("browse")."';
					  </script>";			

			}
			else {
/*				
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".base_url()."';
					  </script>";			
*/					  
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("browse")."';
					  </script>";			
			}			
		}			
		else {
			//TO-DO: -add: instructions to automatically file the unclassified incident report
			echo "<script>
					alert('PROBLEM: Your report is unclassified. We have automatically filed an incident report with the system administrator. We shall notify you of our analysis and the corresponding action to resolve it. Thank you. Peace.');
					window.location.href='".base_url()."';
				  </script>";			
		}
	}

	//added by Mike, 20210316
	public function confirmStoreIndexCardImage($transactionId, $patientId)
	{	
		//added by Mike, 20191119
		if (isset($_SESSION['jsonResponses'])) {
//		if (empty($_POST["reportTypeNameParam"])) {
			unset($_SESSION['jsonResponses']);

			redirect(base_url()); //Report page
		}
	
		$responses = array(); //added by Mike, 20191120
		//TO-DO: -update: this
//		$this->load->model('Image_Model');
		$this->load->model('Report_Model');
//		$this->load->model('Account_Model');

		$field = "reportParam";
		$count = 1;

		//edited by Mike, 20191025		
		$data["reportTypeNameParam"] = $_POST["reportTypeNameParam"];
//		$data["reportTypeId"] = $_POST["reportTypeIdParam"];
		
		$data["reportTypeId"] = $this->Report_Model->getReportTypeIdViaReportTypeName($data);

//		if ($data["reportTypeId"] == 3) { //Incident Report
		switch ($data["reportTypeId"]) {
			//TO-DO: -update: 3, 4.. with name constant 
			case 5: //Report Image
				$data["memberId"] = 1;
				$data["reportItemId"] = $count; //1

				//TO-DO: -add: store the QR Code image file location in the database				
				//TO-DO: -add: store the contents, i.e. Report details, of the QR Code image file in the database				
				//TO-DO: -update: this
				$data["is_success"] = "Report Image";
				
				$fileCount = count($_FILES['reportParamUploadFiles']['name']);
								   
				for($i=0;$i<$fileCount;$i++)
				{
					//get the contents of each file
					$data["reportAnswerParam"] = file_get_contents($_FILES['reportParamUploadFiles']['tmp_name'][$i]);

					//added by Mike, 20191123; edited by Mike, 20200314
//					$outputFolder = "pictures"; //note: this folder already exists
					//edited by Mike, 20210316
//					$outputFolder = "assets"; //note: this folder already exists	
					$outputFolder = "larawan"; //note: this folder already exists	

					$outputFilename = $_FILES['reportParamUploadFiles']['name'][$i]; //.png
					//$outputFile = "image.png";
					
					//echo "File contents: ".$data["reportAnswerParam"]."<br/>";

					//TO-DO: -add: create new folder
					//edited by Mike, 20210316
//					$data["outputFileLocation"] = $outputFolder."/".$transactionId."-".$outputFilename;
					$data["outputFileLocation"] = $outputFolder."/".$patientId."-".$outputFilename;
					
					//update filename if it already exists
					$iCountFilename = 1;
					while (file_exists($data["outputFileLocation"])) {
						$data["outputFileLocation"] = str_replace(".", "(".$iCountFilename.").",$data["outputFileLocation"]);
					}
					
					//added by Mike, 20200314
					$data["transactionId"] = $transactionId;

					//file_put_contents($outputFolder."/".$outputFilename, $data["reportAnswerParam"]);										

					file_put_contents($data["outputFileLocation"], $data["reportAnswerParam"]);										
//					$data["is_success"] = $this->Report_Model->insertReportFromEachLocation($data);

					$data["is_success"] = $this->Report_Model->insertReportImage($data);

				}				
				break;				
		}

		//added by Mike, 20191119
		$_POST = array();
								
		//added by Mike, 20190722; edited by Mike, 20200313
//		if ($data["is_success"]) {									
		if (!empty($data["is_success"])) {									
			if (!empty($responses)) {
				$_SESSION['jsonResponses'] = json_encode($responses);
/*								
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');					
						window.location.href='".site_url('report/autoGenerateQRCodeImage/')."';
					  </script>";			
*/					  
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("browse/viewPatientIndexCard/".$patientId)."';
					  </script>";			

			}
			else {
/*				
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".base_url()."';
					  </script>";			
*/					  
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("browse/viewPatientIndexCard/".$patientId)."';
					  </script>";			
			}			
		}			
		else {
			//TO-DO: -add: instructions to automatically file the unclassified incident report
			echo "<script>
					alert('PROBLEM: Your report is unclassified. We have automatically filed an incident report with the system administrator. We shall notify you of our analysis and the corresponding action to resolve it. Thank you. Peace.');
					window.location.href='".base_url()."';
				  </script>";			
		}
	}
	

	
	public function confirmStoreImageOnly($transactionId)
	{	
		if (isset($_SESSION['jsonResponses'])) {
			unset($_SESSION['jsonResponses']);

			redirect(base_url()); //Report page
		}
	
		$responses = array();
		$this->load->model('Report_Model');

		$field = "reportParam";
		$count = 1;

		$data["reportTypeNameParam"] = $_POST["reportTypeNameParam"];		
		$data["reportTypeId"] = $this->Report_Model->getReportTypeIdViaReportTypeName($data);

		//added by Mike, 20200701
		$data["transactionId"] = $transactionId;

		switch ($data["reportTypeId"]) {
			//TO-DO: -update: 3, 4.. with name constant 
			case 5: //Report Image
				$data["memberId"] = 1;
				$data["reportItemId"] = $count; //1

				//TO-DO: -add: store the QR Code image file location in the database				
				//TO-DO: -add: store the contents, i.e. Report details, of the QR Code image file in the database				
				//TO-DO: -update: this
				$data["is_success"] = "Report Image";
				
				$fileCount = count($_FILES['reportParamUploadFiles']['name']);
								   
				for($i=0;$i<$fileCount;$i++)
				{
					//get the contents of each file
					$data["reportAnswerParam"] = file_get_contents($_FILES['reportParamUploadFiles']['tmp_name'][$i]);

					$outputFolder = "photographs"; //note: this folder already exists
					//$outputFolder = "assets"; //note: this folder already exists	

					$outputFilename = $_FILES['reportParamUploadFiles']['name'][$i]; //.png
					//$outputFile = "image.png";
					
					//echo "File contents: ".$data["reportAnswerParam"]."<br/>";

					$data["outputFileLocation"] = $outputFolder."/".$transactionId."-".$outputFilename;
					
					//update filename if it already exists
					$iCountFilename = 1;
					while (file_exists($data["outputFileLocation"])) {
						$data["outputFileLocation"] = str_replace(".", "(".$iCountFilename.").",$data["outputFileLocation"]);
					}
					

					//file_put_contents($outputFolder."/".$outputFilename, $data["reportAnswerParam"]);
					file_put_contents($data["outputFileLocation"], $data["reportAnswerParam"]);										

					$data["is_success"] = $this->Report_Model->insertReportImage($data);
					//note: there is no transaction_id = 0
					$data["is_success"] = True; //added by Mike, 20200701
				}				
				break;				
		}

		//added by Mike, 20191119
		$_POST = array();
								
		//added by Mike, 20190722; edited by Mike, 20200313
//		if ($data["is_success"]) {									
		if (!empty($data["is_success"])) {									
			if (!empty($responses)) {
				$_SESSION['jsonResponses'] = json_encode($responses);
/*								
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');					
						window.location.href='".site_url('report/autoGenerateQRCodeImage/')."';
					  </script>";			
*/					  
				//edited by Mike, 20200701
/*
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("browse")."';
					  </script>";			
*/
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("report/storeReportImageOnly")."';
					  </script>";			

			}
			else {
/*				
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".base_url()."';
					  </script>";			
*/					  
				//edited by Mike, 20200701
/*
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("browse")."';
					  </script>";			
*/					  
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".site_url("report/storeReportImageOnly")."';
					  </script>";			

			}			
		}			
		else {
			//TO-DO: -add: instructions to automatically file the unclassified incident report
			echo "<script>
					alert('PROBLEM: Your report is unclassified. We have automatically filed an incident report with the system administrator. We shall notify you of our analysis and the corresponding action to resolve it. Thank you. Peace.');
					window.location.href='".base_url()."';
				  </script>";			

		}
	}

/*  //TO-DO: -update: this
	//added by Mike, 20191117; edited by Mike, 20191118
	public function autoGenerateQRCodeImage()//$param)
	{				
		$this->load->library('QRcode');

		//note by Mike, 20191116: object instance, i.e. "qrcode", must be lower case
//		$this->qrcode->png('the quick brown');
		$this->qrcode->png($_SESSION['jsonResponses']);
		
		//added by Mike, 20191119		
		//unset($_SESSION['jsonResponses']);

		//added by Mike, 20191119
		//redirect(base_url()); //Report page
	}
*/
	
/*  //TO-DO: -update: this
	//added by Mike, 20191120
	public function storeReportImage()
	{
		$this->load->view('storeReportImage');
	}
*/

/*  //TO-DO: -update: this
	//added by Mike, 20200313
	public function viewAllReportImages()
	{
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getAllReportImages();

		$this->load->view('viewAllReportImages', $data);
	}
*/

	//added by Mike, 20200828
	public function viewReportImageOnly()
	{
/*
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getAllReportImages();

		$this->load->view('viewAllReportImages', $data);
*/
		$this->load->view('viewReportImageOnly');
	}
}