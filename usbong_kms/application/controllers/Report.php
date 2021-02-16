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
				
				//edited by Mike, 20200722
				//note: this is due to the following removed function is not available in PHP 5.3				
				//$data['addedDateTimeStamp'] = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
				$data['addedDateTimeStamp'] = date('Y-m-d H:i:s');


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

	//added by Mike, 20200701
	public function storeReportImageOnly()
	{				
		$this->load->view('storeReportImageOnly');
	}

	//added by Mike, 20200722
	public function viewReceiptReportForTheDay()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //Clinic

		//added by Mike, 20200505
		//TO-DO: -update: for January
		$previousMonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
//		$previousPreviousMonth = mktime(0, 0, 0, date("m")-2, date("d"), date("Y"));
		$currentMonth = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

//		echo date("m", $previousMonth); 

		$data["monthNum"] = date("m", $previousMonth);
		$data["currentMonthNum"] = date("m", $currentMonth);

////		echo "monthNum: ".$data["monthNum"];
////		echo "currentMonthNum: ".$data["currentMonthNum"];
		
		$data["result"] = $this->Report_Model->getReceiptReportForTheDay($data);
		
		$data["reportType"] = "reportToday";

		$this->load->view('viewReceiptReportMOSC', $data);
	}

	//added by Mike, 20200420; edited by Mike, 20200722
	public function viewReceiptReport()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //Clinic

		//added by Mike, 20200505
		$previousMonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
//		$previousPreviousMonth = mktime(0, 0, 0, date("m")-2, date("d"), date("Y"));
		$currentMonth = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

//		echo date("m", $previousMonth); 

		$data["monthNum"] = date("m", $previousMonth);
		$data["currentMonthNum"] = date("m", $currentMonth);
/*
		echo "monthNum: ".$data["monthNum"];
		echo "currentMonthNum: ".$data["currentMonthNum"];
*/		
		//added by Mike, 20210105
		if ($data["currentMonthNum"]==1) {
			$data["yearNum"] = date("Y")-1;		
			//echo $data["yearNum"];		
		}
		else {
			$data["yearNum"] = date("Y");		
		}
		
		$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);

		$this->load->view('viewReceiptReportMOSC', $data);
	}

	//added by Mike, 20210105
	public function viewReceiptReportForMonthYear($monthNum, $yearNum)
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //Clinic
		
		//added by Mike, 20210105
		$data["yearNum"] = $yearNum;		
		//echo $data["yearNum"];		
						
		$data["monthNum"] = $monthNum;
		$data["nextMonthNum"] = $data["monthNum"]+1;

		//added by Mike, 20200722
		if ($data["nextMonthNum"]>=13) {
			$data["nextMonthNum"] = 1;
		}

		if (strlen($data["monthNum"])==1) {
			$data["monthNum"] = "0".$data["monthNum"];
		}

		if (strlen($data["nextMonthNum"])==1) {
			$data["nextMonthNum"]= "0".$data["nextMonthNum"];
		}		
/*
		echo "monthNum: ".$data["monthNum"];
		echo "currentMonthNum: ".$data["currentMonthNum"];
*/		
//		$data['monthNum'] = $monthNum;

		$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);

		$this->load->view('viewReceiptReportMOSC', $data);
	}

	//added by Mike, 20200505; edited by Mike, 20210105
	public function viewReceiptReportFor($monthNum)
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //Clinic
						
		$data["monthNum"] = $monthNum;
		$data["nextMonthNum"] = $data["monthNum"]+1;

		//added by Mike, 20200722
		if ($data["nextMonthNum"]>=13) {
			$data["nextMonthNum"] = 1;
		}

		if (strlen($data["monthNum"])==1) {
			$data["monthNum"] = "0".$data["monthNum"];
		}

		if (strlen($data["nextMonthNum"])==1) {
			$data["nextMonthNum"]= "0".$data["nextMonthNum"];
		}		
/*
		echo "monthNum: ".$data["monthNum"];
		echo "currentMonthNum: ".$data["currentMonthNum"];
*/		
//		$data['monthNum'] = $monthNum;

		$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);

		$this->load->view('viewReceiptReportMOSC', $data);
	}

	//added by Mike, 20200505; edited by Mike, 20210105
	public function viewReceiptReportForPrevPrev($monthNum)
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "MOSC"; //Clinic
						
		$data["monthNum"] = $monthNum;
		$data["currentMonthNum"] = $data["monthNum"]+1;

		//added by Mike, 20200722
		if ($data["currentMonthNum"]>=13) {
			$data["currentMonthNum"] = 1;
		}

		if (strlen($data["monthNum"])==1) {
			$data["monthNum"] = "0".$data["monthNum"];
		}

		if (strlen($data["currentMonthNum"])==1) {
			$data["currentMonthNum"]= "0".$data["currentMonthNum"];
		}		
/*
		echo "monthNum: ".$data["monthNum"];
		echo "currentMonthNum: ".$data["currentMonthNum"];
*/		
//		$data['monthNum'] = $monthNum;

		$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);

		$this->load->view('viewReceiptReportMOSC', $data);
	}

	//added by Mike, 20200429; edited by Mike, 20200708
	public function viewReceiptReportPAS()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "PAS"; //Clinic
		
		//added by Mike, 20200505
		$previousMonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
//		$previousPreviousMonth = mktime(0, 0, 0, date("m")-2, date("d"), date("Y"));
		$currentMonth = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

//		echo date("m", $previousMonth); 

		$data["monthNum"] = date("m", $previousMonth);
		$data["currentMonthNum"] = date("m", $currentMonth);

		//added by Mike, 20210105
		if ($data["currentMonthNum"]==1) {
			$data["yearNum"] = date("Y")-1;		
			//echo $data["yearNum"];		
		}
		else {
			$data["yearNum"] = date("Y");		
		}
		
		//edited by Mike, 20200708
//		if ($data["monthNum"]<="05") {
		if ($data["monthNum"]<="06") {
			$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);
		}
		//TO-DO: -reverify
		else {
			//edited by Mike, 20200722
//			$data["result"] = $this->Report_Model->getReceiptReportForTheMonthPAS($data);
			$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);
		}

		$this->load->view('viewReceiptReportPAS', $data);
	}

	//added by Mike, 20210105
	public function viewReceiptReportPASForMonthYear($monthNum, $yearNum)
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "PAS"; //Clinic

		//added by Mike, 20210105
		$data["yearNum"] = $yearNum;		
		//echo $data["yearNum"];

		$data["monthNum"] = $monthNum;
		$data["currentMonthNum"] = $data["monthNum"]+1;

		//added by Mike, 20200722
		if ($data["currentMonthNum"]>=13) {
			$data["currentMonthNum"] = 1;
		}
		
		if (strlen($data["monthNum"])==1) {
			$data["monthNum"] = "0".$data["monthNum"];
		}

		if (strlen($data["currentMonthNum"])==1) {
			$data["currentMonthNum"]= "0".$data["currentMonthNum"];
		}		
		
		//edited by Mike, 20200702
//		if ($data["monthNum"]<="05") {
		if ($data["monthNum"]<="06") {
			$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);
		}
		else {
			//edited by Mike, 20200721
//			$data["result"] = $this->Report_Model->getReceiptReportForTheMonthPAS($data);
			$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);
		}

		$this->load->view('viewReceiptReportPAS', $data);
	}

	//added by Mike, 20200505
	public function viewReceiptReportPASFor($monthNum)
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "PAS"; //Clinic

		$data["monthNum"] = $monthNum;
		$data["currentMonthNum"] = $data["monthNum"]+1;

		//added by Mike, 20200722
		if ($data["currentMonthNum"]>=13) {
			$data["currentMonthNum"] = 1;
		}
		
		if (strlen($data["monthNum"])==1) {
			$data["monthNum"] = "0".$data["monthNum"];
		}

		if (strlen($data["currentMonthNum"])==1) {
			$data["currentMonthNum"]= "0".$data["currentMonthNum"];
		}		
		
		//edited by Mike, 20200702
//		if ($data["monthNum"]<="05") {
		if ($data["monthNum"]<="06") {
			$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);
		}
		else {
			//edited by Mike, 20200721
//			$data["result"] = $this->Report_Model->getReceiptReportForTheMonthPAS($data);
			$data["result"] = $this->Report_Model->getReceiptReportForTheMonth($data);
		}

		$this->load->view('viewReceiptReportPAS', $data);
	}

	//added by Mike, 20200722
	public function viewReceiptReportPASForTheDay()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PEDRO"; //medical doctor keyword in report filename

		$data["receiptTypeName"] = "PAS"; //Clinic

		//added by Mike, 20200505
		//TO-DO: -update: for January
		$previousMonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
//		$previousPreviousMonth = mktime(0, 0, 0, date("m")-2, date("d"), date("Y"));
		$currentMonth = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

//		echo date("m", $previousMonth); 

		$data["monthNum"] = date("m", $previousMonth);
		$data["currentMonthNum"] = date("m", $currentMonth);

////		echo "monthNum: ".$data["monthNum"];
////		echo "currentMonthNum: ".$data["currentMonthNum"];
		
		$data["result"] = $this->Report_Model->getReceiptReportForTheDay($data);
		
		$data["reportType"] = "reportToday";

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

	//added by Mike, 20200518
	public function viewPayslipWeb()
	{				
		$this->load->model('Report_Model');

		$data["medicalDoctorName"] = "PETER"; //medical doctor keyword in report filename

		$data["result"] = $this->Report_Model->getPayslipForTheDayWeb($data);//, $member_id);

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

	//added by Mike, 20200518; edited by Mike, 20200704
	public function viewPayslipWebFor($medicalDoctorName)
	{		
		//added by Mike, 20200704
		if (strpos(strtoupper($medicalDoctorName), "PETER")!==false) {			
			//verify day of the week
			if ((strpos(strtoupper(date("l")),"SATURDAY"))!==false) {
//				$this->viewPayslipWebFor("GRACIA");
				echo "<script>
						window.open('".site_url()."/report/viewPayslipWebFor/Gracia');
					  </script>";			
			}
			else if ((strpos(strtoupper(date("l")),"MONDAY"))!==false) {
				echo "<script>
						window.open('".site_url()."/report/viewPayslipWebFor/Chastity');
					  </script>";			
			}
			else if (((strpos(strtoupper(date("l")),"TUESDAY"))!==false) or ((strpos(strtoupper(date("l")),"THURSDAY"))!==false)){
				echo "<script>
						window.open('".site_url()."/report/viewPayslipWebFor/Rodil');
					  </script>";			
			}
			else if (((strpos(strtoupper(date("l")),"WEDNESDAY"))!==false) or ((strpos(strtoupper(date("l")),"FRIDAY"))!==false)){
				echo "<script>
						window.open('".site_url()."/report/viewPayslipWebFor/Honesto');
					  </script>";			
			}
		}

/*	
		$this->load->model('Browse_Model');
		$data["medicalDoctorName"] = $this->Report_Model->getMedicalDoctorIdViaName	 //medical doctor keyword in report filename
*/
				
		$this->load->model('Report_Model');

//		$data["medicalDoctorName"] = "PETER"; //medical doctor keyword in report filename
		$data["medicalDoctorName"] = $medicalDoctorName; //medical doctor keyword in report filename

		$data["result"] = $this->Report_Model->getPayslipForTheDayWeb($data);

		//added by Mike, 20200908
		//TO-DO: -reverify: this with cart list that includes med and non-med items
		
		//added by Mike, 20200910
		//identify newest transactionId
		$this->db->select_max('transaction_id');
		$query = $this->db->get('transaction');
		$row = $query->row();
		
		$iTransactionIdMax = $row->transaction_id;
		
		//added by Mike, 20201007
		$iTransactionQuantity = 0;
		
//		echo "max".$iTransactionIdMax;

		if (strpos(strtoupper($medicalDoctorName), "HONESTO")!==false) {
			if (is_array($data["result"])) {
				foreach ($data["result"] as &$value) {
					//edited by Mike, 20200910
					//note: we do +1 to get the transactionId for the MOSC OR from the receipt table
/*					$transactionId = $value['transaction_id']+1;
					echo $transactionId."<br/>";
*/					
					//edited by Mike, 20210113
					//TO-DO: -reverify: this
	//				$iTransactionId = $value['transaction_id']+1;
					$iTransactionId = $value['transaction_id'];

					//identify transaction with the combined fees
//					while ($transactionId==0) {
					do {
//						echo $iTransactionId."<br/>";

						$this->db->select('transaction_quantity');
						$this->db->where('transaction_id',$iTransactionId);
						$query = $this->db->get('transaction');
						$row = $query->row();

						$iTransactionId = $iTransactionId + 1;
						
						//this is due to the transaction count can skip
						$transactionQuantity = -1;
						
						if (isset($row)) {
							$iTransactionQuantity = $row->transaction_quantity;
						}
						
						if ($iTransactionId>=$iTransactionIdMax) {							
							break;
						}						
					}
					while ($iTransactionQuantity <= 0);

//						echo $iTransactionId."<br/>";
					//edited by Mike, 20201127
//					$iTransactionId = $iTransactionId -1;
					//note: if last transaction in database
					//we use >= to be equal with the "break" command of while ($iTransactionQuantity <= 0);
					if ($iTransactionId>=$iTransactionIdMax) {
					}
					else {
						$iTransactionId = $iTransactionId -1;
					}

					$value['receipt_number'] = $this->Report_Model->getReceiptNumber($iTransactionId);
				}
				unset($value);
			}
		}

//		$this->load->view('viewPayslip', $data);

		if (strtoupper($data["medicalDoctorName"])=="PEDRO") {
			$this->load->view('viewPayslipMOSC', $data);
		}
		else {
			$this->load->view('viewPayslip', $data);
		}
	}

	//added by Mike, 20200518
	public function viewPayslipWebForPrev($medicalDoctorName)
	{		
/*	
		$this->load->model('Browse_Model');
		$data["medicalDoctorName"] = $this->Report_Model->getMedicalDoctorIdViaName	 //medical doctor keyword in report filename
*/
				
		$this->load->model('Report_Model');

//		$data["medicalDoctorName"] = "PETER"; //medical doctor keyword in report filename
		$data["medicalDoctorName"] = $medicalDoctorName; //medical doctor keyword in report filename

		$data["result"] = $this->Report_Model->getPayslipForTheDayWeb($data);

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

	//added by Mike, 20200507
	public function viewReportNonMedicineUnified()
	{
		$this->load->model('Report_Model');
		
		$itemTypeId = 2; //2 = Non-medicine

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDayUnified($itemTypeId);

		$this->load->view('viewReportNonMedicineUnified', $data);
	}

	//added by Mike, 20200507
	public function viewReportNonMedicineUnifiedAll()
	{
		$this->load->model('Report_Model');
		
		$itemTypeId = 2; //2 = Non-medicine

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDayUnifiedAll($itemTypeId);
/*
		//added by Mike, 20200520
		$startTransactionDate = date("Y-m-d");
		$endTransactionDate = date("Y-m-d");		
		
		if ($data["result"]!=False) { //if value exists in array
			foreach ($data["result"] as $value) {				
				//added by Mike, 20200520
				$currentTransactionDate = strtotime($value['transaction_date']);
				

				if (($startTransactionDate == 0) or ($startTransactionDate > $currentTransactionDate)) {
					$startTransactionDate = $currentTransactionDate;
				}

				if ($endTransactionDate < $currentTransactionDate) {
					$endTransactionDate = $currentTransactionDate;
				}
			}
		}

		$data["startTransactionDate"] = DATE("Y-m-d", $startTransactionDate);
		$data["endTransactionDate"] = DATE("Y-m-d", $endTransactionDate);
*/

		$data["startTransactionDate"] = 0; //DATE("Y-m-d", $startTransactionDate);
		$data["endTransactionDate"] = 0; //DATE("Y-m-d", $endTransactionDate);

		$this->load->view('viewReportNonMedicineUnifiedAll', $data);
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

	//added by Mike, 20200506
	public function viewReportMedicineUnified()
	{
		$this->load->model('Report_Model');
/*
		$data["result"] = $this->Report_Model->getMedicineTransactionsForTheDay();

//		//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
//		$data["resultAsterisk"] = $this->Report_Model->getMedicineTransactionsForTheDayAsterisk();

		$this->load->view('viewReportMedicine', $data);
*/
		$itemTypeId = 1; //1 = Medicine

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDayUnified($itemTypeId);

		$this->load->view('viewReportMedicineUnified', $data);
	}

	//added by Mike, 20200402
	//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
	public function viewReportMedicineAsterisk()
	{
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getMedicineTransactionsForTheDayAsterisk();

		$this->load->view('viewReportMedicineAsterisk', $data);
	}

	//added by Mike, 20200507
	//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
	public function viewReportMedicineAsteriskUnified()
	{
		$this->load->model('Report_Model');

		$data["result"] = $this->Report_Model->getMedicineTransactionsForTheDayAsteriskUnified();

		$this->load->view('viewReportMedicineAsteriskUnified', $data);
	}

	//added by Mike, 20201127
	public function viewReportSnack()
	{
		$this->load->model('Report_Model');
		$itemTypeId = 3; //3 = Snack

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDay($itemTypeId);

		$this->load->view('viewReportSnack', $data);
	}

	//added by Mike, 20201127
	public function viewReportSnackUnified()
	{
		$this->load->model('Report_Model');
		$itemTypeId = 3; //3 = Snack

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDayUnified($itemTypeId);

		$this->load->view('viewReportSnackUnified', $data);
	}

	//added by Mike, 20210216
	public function viewReportLabRequest()
	{
/* //TO-DO: -update: this		
		$this->load->model('Report_Model');
		$itemTypeId = 3; //3 = Snack

		$data["result"] = $this->Report_Model->getPurchasedItemTransactionsForTheDay($itemTypeId);
*/

		$this->load->view('viewReportLabRequest');//, $data);
	}
	
	//added by Mike, 20200427; edited by Mike, 20200515
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

				echo $data['rawResult'][$iCount]['item_name']." : ".$data['rawResult'][$iCount]['quantity_in_stock']."<br/>";

				$itemId = $data['rawResult'][$iCount]['item_id'];
				$resultQuantityInStockNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);

				//added by Mike, 20200427; edited by Mike, 20200515
/*				if ($data['rawResult'][$iCount]['quantity_in_stock']==0) {
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

*/

				if ($data['rawResult'][$iCount]['quantity_in_stock']==0) {
//					$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];

	//				if ($data['rawResult'][$iCount]['quantity_in_stock']-$resultQuantityInStockNow <=0) {
					if (($data['rawResult'][$iCount]['quantity_in_stock']!=-1) and ($resultQuantityInStockNow <=0)) {
						$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];
						$data['result'][$iCountOutputResult]['quantity_in_stock'] = 0;
					}
				}
				//edited by Mike, 20200515
				else {
					//added by Mike, 20200427
					if (($data['rawResult'][$iCount]['expiration_date'] <= date("Y-m-d")) and ($data['rawResult'][$iCount]['expiration_date'] != 0)) {
						$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];
					}
				}
							
				$iCountOutputResult = $iCountOutputResult + 1;				
				$iCount = $iCount + 1;
			}
		}

		$this->load->view('viewReportMedicineOutOfStock', $data);
	}

	//added by Mike, 20200502
	public function viewReportMedicineExpired()
	{
//		$data['nameParam'] = $_POST['nameParam']; //added by Mike, 20170616
	
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
	
		$this->load->model('Report_Model');
		$this->load->model('Browse_Model');
	
//		$data['rawResult'] = $this->Report_Model->getMedicineExpired();//$data);
		$data['result'] = $this->Report_Model->getMedicineExpired();//$data);

//		$data['result'] = $this->Report_Model->getMedicineOutOfStock();//$data);

		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		$itemId = -1;

		$remainingItemNow = 0;

		$iCountOutputResult = 0;
				
/*
		if ($data['rawResult'] == True) {
			foreach ($data['rawResult'] as $value) {
*/				
		if ($data['result'] == True) {
			foreach ($data['result'] as $value) {
				//edited by Mike, 20200901
				//$itemId = $value['item_id'];
				if ($itemId==$value['item_id']) {
					$bIsSameItemId = true;
				}
				else {
					$itemId = $value['item_id'];
					$bIsSameItemId = false;
				}
					
//				echo "itemId: " . $itemId;
/*				
				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); //"0";
*/				

				//added by Mike, 20200417
				//note: sell first the item that is nearest to the expiration date using now as the reference date and time stamp				
				//edited by Mike, 20200422
//				if ($iCount==0) {
				if (!$bIsSameItemId) {	

					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); //"0";				
					
					//edited by Mike, 20200527
//					$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
															
					if ($remainingItemNow < 0) {
						
						$data['result'][$iCount]['resultQuantityInStockNow'] = 0;						
						
//						$remainingPaidItem = $remainingPaidItem - $data['result'][$iCount]['resultQuantityInStockNow'];
					}
					else {
						$data['result'][$iCount]['resultQuantityInStockNow'] = $remainingItemNow;
					}
					
//					$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
				}
				else {
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					

					if ($remainingItemNow < 0) { //already negative
						if ($data['result'][$iCount]['quantity_in_stock'] + $remainingItemNow < 0) {
							$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
							
							$remainingItemNow = $data['result'][$iCount]['quantity_in_stock'] + $remainingItemNow;
						}
						else {
							$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] + $remainingItemNow;					

							//TO-DO: -reverify: again for cases with multiple additional stock items
							//added by Mike, 20200522
							$remainingItemNow = 0;
						}
					}
					else {
						$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					
					}
				}
/*				
				if (strpos(strtoupper($value['item_name']),"HYALONE")) {
					echo "dito".$remainingItemNow;
				}
*/

//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;

/*
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
					//edited by Mike, 20200901
					//$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount];
					echo $resultQuantityInStockNow;
					//$data['result'][$iCountOutputResult] = $data['rawResult'][$iCount]-$resultQuantityInStockNow;
				}
							
				$iCountOutputResult = $iCountOutputResult + 1;				
				$iCount = $iCount + 1;
*/			
			}
		}
		
		//----------------------------------------
		//added by Mike, 20200901			
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		if ($data['result'] == true) {
			foreach ($data['result'] as $value) {				
				if ($value['resultQuantityInStockNow'] != 0) {
					array_push($outputArray, $value);
				}
			}
		}
			
/*		
//TO-DO: add: in non-medicine items
		//added by Mike, 20200522
		$itemId = -1;
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		//TO-DO: -reverify: this
		//TO-DO: -add: in non-med
		//added by Mike, 20200811
		$iSameItemCount = 0;
		$bHasNoneZeroQuantity = false;

		if ($data['result'] == true) {
			foreach ($data['result'] as $value) {				
			
//				echo $value['item_name'];
			
				//$itemId = $value['item_id'];
				if ($itemId==$value['item_id']) {
					$bIsSameItemId = true;
				}
				else {
					$itemId = $value['item_id'];
					$bIsSameItemId = false;
				}
				
				if ($bIsSameItemId) {
					//edited by Mike, 20200527
					//note: include in results medicine items that are zero in quantity in stock
					//TO-DO: -re-verify: this
//					if ($value['resultQuantityInStockNow'] == 0) {
				
					//edited by Mike, 20200530; removed by Mike, 20200811
					//array_push($outputArray, $value);
					//Note: We show only one (1) transaction of the same item whose in-stock count is 0.
					//This is to make the output list shorter.
					//The list is ordered by expiration date.
					if (!$bHasNoneZeroQuantity) {
						if ($iSameItemCount == ($iSameItemTotalCount - 1)) { //if last item in the list of same items
							array_push($outputArray, $value);
						}
					}
					else {
						array_push($outputArray, $value);
					}

					$iSameItemCount = $iSameItemCount + 1;

				}
				//added by Mike, 20200522
				else {
					//identify if there are more than 1 transaction of the same item in the list
					$iSameItemTotalCount = -1; //0; //edited by Mike, 20200826
					$bHasNoneZeroQuantity = false;
					foreach ($data['result'] as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							$iSameItemTotalCount = $iSameItemTotalCount + 1;
							
							if ($outputValue['resultQuantityInStockNow']!=0) {
								$bHasNoneZeroQuantity = true;		
							}							
						}
					}
					
//					echo $iSameItemCount;
					
					if ($iSameItemTotalCount>1) {							
						if ($value['resultQuantityInStockNow']!=0) {
							array_push($outputArray, $value);						
						}									
					}
					else {
						//array_push($outputArray, $value);						

						if ($iSameItemTotalCount==1) {
							//edited by Mike, 20200812
							if (strpos($value['item_name'],"*")!==false) {
									array_push($outputArray, $value);
							}	
							else {
								if ($value['resultQuantityInStockNow']!=0) {
									array_push($outputArray, $value);
								}
							}
						}
						//added by Mike, 20200826
						//if $iSameItemTotalCount==0
						else {
							array_push($outputArray, $value);
						}
					}

					$iSameItemCount = 1;			
				}
			}
		}
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['result'] = [];
		$data['result'] = array();
		
		$data['result'] = $outputArray;		
*/

		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['result'] = [];
		$data['result'] = array();
		
		$data['result'] = $outputArray;		

		$this->load->view('viewReportMedicineExpired', $data);
	}

	//added by Mike, 20200502
	//+updated: to automatically use the previous month
	public function viewReportSalesNonMedicine()
	{
//		$data['nameParam'] = $_POST['nameParam']; //added by Mike, 20170616
	
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
	
		$this->load->model('Report_Model');
	
		//edited by Mike, 20200502
		$previousMonth = mktime(0, 0, 0, date("m")-1, date("d"), date("Y"));
//		echo date("m", $previousMonth); 
//		$data['result'] = $this->Report_Model->getSoldNonMedicine(null); 
		$data['result'] = $this->Report_Model->getSoldNonMedicine(date("m", $previousMonth)); 
	
		$this->load->view('viewReportSalesNonMedicine', $data);
	}

	//added by Mike, 20200501
	public function viewReportSalesNonMedicineFor($monthNum)
	{
//		$data['nameParam'] = $_POST['nameParam']; //added by Mike, 20170616
	
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
	
		$this->load->model('Report_Model');
	
		if (strlen($monthNum)==1) {
			$monthNum = "0".$monthNum;
		}
		
		$data['monthNum'] = $monthNum;
		$data['result'] = $this->Report_Model->getSoldNonMedicine($monthNum);		$this->load->view('viewReportSalesNonMedicine', $data);
	}

	//added by Mike, 20200502
	public function viewReportPriceNonMedicine()
	{	
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
	
		$this->load->model('Report_Model');
	
		$data['result'] = $this->Report_Model->getPriceNonMedicine(); 
	
		$this->load->view('viewReportPriceNonMedicine', $data);
	}

	//added by Mike, 20201201
	public function viewReportTotalQuantitySoldPerItem()
	{
		$this->load->model('Report_Model');
		$data["result"] = $this->Report_Model->getTotalQuantitySoldPerItem();		
		echo "***NOTHING FOLLOWS***";
		
		//TO-DO: -add: this
//		$this->load->view('viewReportSnack', $data);
	}


	//added by Mike, 20200529
	//TO-DO: -add: viewPatientQueue
//	public function viewPatientReportUnpaid()
	public function viewReportPatientQueue()
	{
		$this->load->model('Report_Model');

//		$data["result"] = $this->Report_Model->getPatientReportUnpaidForTheDay();
		//edited by Mike, 20201127
//		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay(0); //info desk page

//		echo "count: ".count($data["result"]);
//		echo $data["result"][0]['transaction_id'];
		
		//do not include transactions whose fee = 0 and notes = "IN-QUEUE; PAID"
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputResult = [];
		$outputResult = array();
				
		//edited by Mike, 20200602
		if ($data["result"]!=False) {
//		if ((isset($data["result"])) and (count($data["result"])>1)) {
			foreach ($data["result"] as $value) {
				if (($value['fee']==0) and ($value['notes']=="IN-QUEUE; PAID")) {
				}
				//added by Mike, 20200602
				//medical_doctor_name = "NEW; NONE YET"
				else if (($value['medical_doctor_id']==0) and ($value['notes']=="IN-QUEUE; PAID")) {
				}
				else {
					//added by Mike, 20201022
					if ($value['medical_doctor_id']==0) {
						$value['medical_doctor_id']=1;
					}					
					//added by Mike, 20210115; edited by Mike, 20210117
					//add patient's previous_visit
					$value['previous_visit'] = $this->Report_Model->getPatientPreviousVisitBeforeToday($value);

					//added by Mike, 20210117
					$value['start_datetime_stamp'] = $this->Report_Model->getPatientWaitDoneElapsedTime($value);

					array_push($outputResult, $value);
				}				
			}

			//added by Mike, 20201022
			//TO-DO: -reverify: these
			$transactionIdColumn = array_column($outputResult, 'transaction_id');
			$medicalDoctorIdColumn = array_column($outputResult, 'medical_doctor_id');
			array_multisort($medicalDoctorIdColumn, SORT_ASC, $transactionIdColumn, SORT_ASC, $outputResult);

			$data["result"]  = $outputResult;
		}
			
		$this->load->view('viewReportPatientQueue', $data);
	}

	//added by Mike, 20200826
	public function viewReportPatientQueueAccounting()
	{
		$this->load->model('Report_Model');

//		$data["result"] = $this->Report_Model->getPatientReportUnpaidForTheDay();
		//edited by Mike, 20201127
		//$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay(1); //1 = accounting page

//		echo "count: ".count($data["result"]);
//		echo $data["result"][0]['transaction_id'];
		
		//do not include transactions whose fee = 0 and notes = "IN-QUEUE; PAID"
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputResult = [];
		$outputResult = array();
		
		//edited by Mike, 20200602
		if ($data["result"]!=False) {
//		if ((isset($data["result"])) and (count($data["result"])>1)) {
			foreach ($data["result"] as $value) {
				if (($value['fee']==0) and ($value['notes']=="IN-QUEUE; PAID")) {
				}
				//added by Mike, 20200602
				//medical_doctor_name = "NEW; NONE YET"
				else if (($value['medical_doctor_id']==0) and ($value['notes']=="IN-QUEUE; PAID")) {
				}
				else {
					//added by Mike, 20201022
					if ($value['medical_doctor_id']==0) {
						$value['medical_doctor_id']=1;
					}

					//added by Mike, 20210118
					//add patient's previous_visit
					$value['previous_visit'] = $this->Report_Model->getPatientPreviousVisitBeforeToday($value);

					//added by Mike, 20210118
					$value['start_datetime_stamp'] = $this->Report_Model->getPatientWaitDoneElapsedTime($value);
					
					array_push($outputResult, $value);
				}
			}
			
			//added by Mike, 20201022
			//TO-DO: -reverify: these
			$transactionIdColumn = array_column($outputResult, 'transaction_id');
			$medicalDoctorIdColumn = array_column($outputResult, 'medical_doctor_id');
			array_multisort($medicalDoctorIdColumn, SORT_ASC, $transactionIdColumn, SORT_ASC, $outputResult);
			
			$data["result"]  = $outputResult;
		}
		
		$this->load->view('viewReportPatientQueueAccounting', $data);
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
	
	//added by Mike, 20200707; edited by Mike, 20201127
	public function viewAllSummaryReportsForTheDayUnified()
	{	
		echo "<script>
//				window.open('viewReportMedicineUnified','_blank');
				window.open('".base_url()."/server/getSalesReportsForTheDay.php');	
				window.open('viewpayslipwebfor/Peter','_blank');
				window.open('viewpayslipwebfor/Pedro','_blank');
				
				//edited by Mike, 20201127
//				window.open('viewReportNonMedicineUnified','_blank');
				window.open('viewReportNonMedicineUnified','_blank');

				window.open('viewReportMedicineAsteriskUnified','_blank');
				window.open('viewReceiptReportForTheDay','_blank');
				window.open('viewReceiptReportPASForTheDay','_blank');

				//added by Mike, 20201127
				window.open('viewReportSnackUnified','_blank');

			</script>";	

		//note: the web address remains ".../viewAllSummaryReportsForTheDay"
		$this->viewReportMedicineUnified();
		
//		redirect(base_url()."/server/getSalesReportsForTheDay.php");			  
	}


	//added by Mike, 20200707; edited by Mike, 20200723
	public function viewAllSummaryReportsForTheDay()
	{	
		echo "<script>
//				window.open('viewReportMedicine','_blank');
				window.open('".base_url()."/server/getSalesReportsForTheDay.php');	
				window.open('viewpayslipwebfor/Peter','_blank');
				window.open('viewpayslipwebfor/Pedro','_blank');
				window.open('viewReportNonMedicine','_blank');
				window.open('viewReportMedicineAsterisk','_blank');
				window.open('viewReceiptReportForTheDay','_blank');
				window.open('viewReceiptReportPASForTheDay','_blank');

//added by Mike, 20201127
				window.open('viewReportSnack','_blank');

			</script>";	

		//note: the web address remains ".../viewAllSummaryReportsForTheDay"
		$this->viewReportMedicine();
		
//		redirect(base_url()."/server/getSalesReportsForTheDay.php");			  
	}
	
	//added by Mike, 20200821
	public function viewWebAddressList()
	{

		//session_start();
		$this->load->library('session');

		//added by Mike, 20200820; edited by Mike, 20200821
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		$machineAddress = "";

		//note: output is blank if Windows Machine
		//We use this set of instructions with Linux Machines
		//Reference: https://stackoverflow.com/questions/1420381/how-can-i-get-the-mac-and-the-ip-address-of-a-connected-client-in-php;
		//last accessed: 20200820
		//answer by: Paul Dixon, 20090914T0848
		#run the external command, break output into lines
		$arp=`arp -a $ipAddress`;
		$lines=explode("\n", $arp);

		#look for the output line describing our IP address
		foreach($lines as $line)
		{
		   $cols=preg_split('/\s+/', trim($line));
		   if ($cols[0]==$ipAddress)
		   {
			   $machineAddress=$cols[1];
//			   echo $macAddress;
		   }
		}

/*		$_SESSION["client_ip_address"] = $ipAddress;
		$_SESSION["client_machine_address"] = $machineAddress;
*/
		$newdata = array(
			'client_ip_address'  => $ipAddress,
			'client_machine_address'     => $machineAddress
		);
			
		$this->session->set_userdata($newdata);			

//		echo $_SESSION["client_ip_address"];
//		echo $_SESSION["client_machine_address"];
		
		//TO-DO: -use: stored session values
		//TO-DO: -reverify: this		
	
		$this->load->view('viewWebAddressList');
	}	
}