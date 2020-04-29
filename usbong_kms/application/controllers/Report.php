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
		//added by Mike, 20191119
		if (isset($_SESSION['jsonResponses'])) {
//		if (empty($_POST["reportTypeNameParam"])) {
			unset($_SESSION['jsonResponses']);

			redirect(base_url()); //Report page
		}
	
		$responses = array(); //added by Mike, 20191120
	
		$this->load->model('Report_Model');
		$this->load->model('Account_Model');

		$field = "reportParam";
		$count = 1;

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

				//added by Mike, 20191118
				$responses = array($data["memberNameParam"], $data["memberId"]);

				//added by Mike, 20191119
				date_default_timezone_set('Asia/Hong_Kong');
				$data['addedDateTimeStamp'] = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

		//		while ($count <= 10) {
				while ($count <= 5) {
					$data["reportAnswerParam"] = $_POST[$field.$count];		
					$data["reportItemId"] = $count;

					$data["is_success"] = $this->Report_Model->insertReport($data);//, $member_id);

					//+fixed: 1 second lag by count 3
					//example: counts 1 and 2: 10:52:49
					//counts 3 until 5: 10:52:50
					//where: hour:minutes:seconds 
					$responses[] = $data["is_success"];

					$count++;
				}
			
				//added by Mike, 20191118
				//echo json_encode($responses);				
				break;
			case 4: //Reports from All Locations
				$data["memberId"] = 1;
				$data["reportItemId"] = $count; //1

				$fileCount = count($_FILES['reportParamUploadFiles']['name']);
								   
				for($i=0;$i<$fileCount;$i++)
				{
					//get the contents of each file
					$data["reportAnswerParam"] = file_get_contents($_FILES['reportParamUploadFiles']['tmp_name'][$i]);
					
					//echo "File contents: ".$fileContents."<br/>";

					$data["is_success"] = $this->Report_Model->insertReportFromEachLocation($data);
				}
				break;				
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

					//added by Mike, 20191123
					$outputFolder = "pictures"; //note: this folder already exists
					$outputFilename = $_FILES['reportParamUploadFiles']['name'][$i]; //.png
					//$outputFile = "image.png";
					
					//echo "File contents: ".$data["reportAnswerParam"]."<br/>";

					$data["outputFileLocation"] = $outputFolder."/".$outputFilename;

					//file_put_contents($outputFolder."/".$outputFilename, $data["reportAnswerParam"]);										

					file_put_contents($data["outputFileLocation"], $data["reportAnswerParam"]);										
//					$data["is_success"] = $this->Report_Model->insertReportFromEachLocation($data);

					$data["is_success"] = $this->Report_Model->insertReportImage($data);

				}				
				break;				

		}

		//added by Mike, 20191119
		$_POST = array();
								
		//added by Mike, 20190722; edited by Mike, 20191120
//		if ($data["is_success"]) {									
		if (!empty($data["is_success"])) {									
			if (!empty($responses)) {
				$_SESSION['jsonResponses'] = json_encode($responses);
								
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');					
						window.location.href='".site_url('report/autoGenerateQRCodeImage/')."';
					  </script>";			
			}
			else {
				echo "<script>
						alert('You have successfully submitted your report. Thank you. Peace.');
						window.location.href='".base_url()."';
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
	
	//added by Mike, 20191025
	public function storeReportsForTheDayFromAllLocations()
	{
		$this->load->view('storeReportsForTheDayFromAllLocations');
	}

	//added by Mike, 20191120; edited by Mike, 20200314
//	public function storeReportImage()
	public function storeReportImage($nameId)
	{				
		$this->load->model('Browse_Model');	
	
		$data['result'] = $this->Browse_Model->getDetailsListViaId($nameId);
	
		$this->load->view('storeReportImage', $data);
	}

	//added by Mike, 20200314
	public function viewReportImage($nameId, $transactionId)
	{				
		$this->load->model('Browse_Model');	
		$this->load->model('Report_Model');	
	
		$data['result'] = $this->Browse_Model->getDetailsListViaId($nameId);
		$data["imageResult"] = $this->Report_Model->getReportImageViaTransacionId($transactionId);

		$this->load->view('viewReportImage', $data);
	}

	//added by Mike, 20200420; edited by Mike, 20200425
	public function viewReceiptReport()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //Clinic

		$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);//, $member_id);

		$this->load->view('viewReceiptReportMOSC', $data);
	}

	//added by Mike, 20200429
	public function viewReceiptReportPAS()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "PAS"; //Clinic

		$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);//, $member_id);

		$this->load->view('viewReceiptReportPAS', $data);
	}

	//added by Mike, 20200421; edited by Mike, 20200423
	public function viewReport()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //"Clinic"; //MOSC

		$data["result"] = $this->Report_Model->getReportForTheMonth($data);//, $member_id);

		$this->load->view('viewReportMOSC', $data);
	}

	public function viewReportFor($param)
	{				
		$this->load->model('Report_Model');

//		$data["medicalDoctorName"] = "PETER"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MEDICAL DOCTOR NAME"; //"Clinic"; //MOSC

		$data["medicalDoctorName"] = $param;

		$data["result"] = $this->Report_Model->getReportForTheMonth($data);//, $member_id);

		//edited by Mike, 20200422
		$this->load->view('viewReport', $data);
	}

	//added by Mike, 20200322
	public function viewPayslip()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PETER"; //medical doctor keyword in report filename

		$data["result"] = $this->Report_Model->getPayslipForTheDay($data);//, $member_id);

		$this->load->view('viewPayslip', $data);
	}

	//added by Mike, 20200322; edited by Mike, 20200408
	public function viewPayslipFor($medicalDoctorName)
	{		
/*	
		$this->load->model('Browse_Model');
		$data["medicalDoctorName"] = $this->Report_Model->getMedicalDoctorIdViaName	 //medical doctor keyword in report filename
*/
				
		$this->load->model('Report_Model');

//		$data["medicalDoctorName"] = "PETER"; //medical doctor keyword in report filename
		$data["medicalDoctorName"] = $medicalDoctorName; //medical doctor keyword in report filename

		$data["result"] = $this->Report_Model->getPayslipForTheDay($data);

//		$this->load->view('viewPayslip', $data);

		if (strtoupper($data["medicalDoctorName"])=="PEDRO") {
			$this->load->view('viewPayslipMOSC', $data);
		}
		else {
			$this->load->view('viewPayslip', $data);
		}
	}

	//added by Mike, 20200412
	public function viewReportNonMedicine()
	{
		$this->load->model('Report_Model');
		
		$itemTypeId = 2; //2 = Non-medicine

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDay($itemTypeId);

		$this->load->view('viewReportNonMedicine', $data);
	}

	//added by Mike, 20200402; edited by Mike, 20200412
	public function viewReportMedicine()
	{
		$this->load->model('Report_Model');
/*
		$data["result"] = $this->Report_Model->getMedicineTransactionsForTheDay();

//		//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
//		$data["resultAsterisk"] = $this->Report_Model->getMedicineTransactionsForTheDayAsterisk();

		$this->load->view('viewReportMedicine', $data);
*/
		$itemTypeId = 1; //1 = Medicine

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDay($itemTypeId);

		$this->load->view('viewReportMedicine', $data);
	}

	//added by Mike, 20200402
	//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
	public function viewReportMedicineAsterisk()
	{
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getMedicineTransactionsForTheDayAsterisk();

		$this->load->view('viewReportMedicineAsterisk', $data);
	}
	
	//added by Mike, 20200427
	public function viewReportMedicineOutOfStock()
	{
//		$data['nameParam'] = $_POST['nameParam']; //added by Mike, 20170616
	
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
	
		$this->load->model('Report_Model');
		$this->load->model('Browse_Model');
	
		$data['rawResult'] = $this->Report_Model->getMedicineOutOfStock();//$data);

//		$data['result'] = $this->Report_Model->getMedicineOutOfStock();//$data);

		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		$itemId = -1;

		$iCountOutputResult = 0;
		
		if ($data['rawResult'] == True) {
			foreach ($data['rawResult'] as $value) {

				$itemId = $data['rawResult'][$iCount]['item_id'];
				$resultQuantityInStockNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);

				//added by Mike, 20200427
				if ($data['rawResult'][$iCount]['quantity_in_stock']==0) {
					$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];
				}
				
//				if ($data['rawResult'][$iCount]['quantity_in_stock']-$resultQuantityInStockNow <=0) {
				if (($data['rawResult'][$iCount]['quantity_in_stock']!=-1) and ($resultQuantityInStockNow <=0)) {
					$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];
					$data['result'][$iCountOutputResult]['quantity_in_stock'] = 0;
				}

				//added by Mike, 20200427
				if (($data['rawResult'][$iCount]['expiration_date'] <= date("Y-m-d")) and ($data['rawResult'][$iCount]['expiration_date'] != 0)) {
					$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];
				}
							
				$iCountOutputResult = $iCountOutputResult + 1;				
				$iCount = $iCount + 1;
			}
		}

		$this->load->view('viewReportMedicineOutOfStock', $data);
	}


	//added by Mike, 20191110
	public function viewListOfAllReportsFromAllLocations()
	{
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getListOfAllReportsFromAllLocations();//$data);//, $member_id);

		$this->load->view('viewListOfAllReportsFromAllLocations', $data);
	}
	
	//added by Mike, 20191120
	public function viewListOfAllReportsFromSVGH()
	{
		$this->load->model('Report_Model');

		//note that this function outputs the correct result when used in the correct location, i.e. St. Vincent General Hospital (SVGH)
		//TO-DO: -update: this to not use the function, "getListOfAllReportsFromAllLocations()"
		$data["result"] = $this->Report_Model->getListOfAllReportsFromAllLocations();

		$this->load->view('viewListOfAllReportsFromSVGH', $data);
	}
	
	//added by Mike, 20191122
	public function viewListOfAllReportsFromSLHCC()
	{
		$this->load->model('Report_Model');

		//note that this function outputs the correct result when used in the correct location, i.e. Sta. Lucia Health Care Centre
		//TO-DO: -update: this to not use the function, "getListOfAllReportsFromAllLocations()"
		$data["result"] = $this->Report_Model->getListOfAllReportsFromAllLocations();

		$this->load->view('viewListOfAllReportsFromSLHCC', $data);
	}

	//added by Mike, 20200313
	public function viewAllReportImages()
	{
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getAllReportImages();

		$this->load->view('viewAllReportImages', $data);
	}

}