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

		//edited by Mike, 20200407
		$data['nameParam'] = $_POST['nameParam']; //added by Mike, 20170616
/*
		if (!isset($_POST[nameParam])) { //$data['nameParam'])) {
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
			
			echo <br/><br/>;
		}
*/
/*
		foreach ($data as $value) {
			echo $value['report_description'];
			echo <br/><br/>;
		}
*/
		
//		echo $data[2]['report_description'];
				
		$this->load->view('browse', $data);

/*		
		//--------------------------------------------
		$this->load->view('templates/footer');	
*/		
	}

	//added by Mike, 20200517
	public function searchPatient()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchPatient', $data);
	}

	//added by Mike, 20200517
	public function confirmPatient()
	{
		//edited by Mike, 20200407
		$data['nameParam'] = $_POST['nameParam'];
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchPatient');
		}
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		//added by Mike, 20201010
		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

		$this->load->model('Browse_Model');

		//edited by Mike, 20200602
		//$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

		$this->load->view('searchPatient', $data);
	}

	//added by Mike, 20210209
	public function searchPatientLabUnit()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchPatientLabUnit', $data);
	}

	//added by Mike, 20200517
//	public function confirmPatientLabUnit()
	public function confirmPatientLabUnit($param)
	{
		$data['nameParam'] = $_POST['nameParam'];

		if (!isset($data['nameParam'])) {
			redirect('browse/searchPatientLabUnit');
		}

/* //removed by Mike, 20210209	
		//$data['nameParam'] = $_POST['nameParam'];

		//added by Mike, 20210209
		if ($param!="0") {
			$data['idParam'] = $param;
		}
		else {
			$data['nameParam'] = $_POST['nameParam'];
			
			if (!isset($data['nameParam'])) {
				redirect('browse/searchPatientLabUnit');
			}
		}
*/		
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

		$this->load->model('Browse_Model');
		
		//edited by Mike, 20200602
		//$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
		//TO-DO: -update: this
		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

/* //removed by Mike, 20210209
//		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

		if (isset($data['idParam'])) {
			$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaId($data);

			$this->load->view('viewLabRequestForm', $data);

		}
		else {
			$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

			$this->load->view('searchPatientLabUnit', $data);
		}
*/		

		$this->load->view('searchPatientLabUnit', $data);
	}

	//added by Mike, 20210210
	//TO-DO: -update: database
	//TO-DO: -update: this	
	public function confirmLabRequestForm()
	{
		//TO-DO: -add: the rest
		//echo "DITO: ".$_POST['inputTextLocationAddressName'];
		//echo "DITO: ".$_POST['inputCheckBoxName'];

//added by Mike, 20210212
//		echo "PATIENT ID PARAM: ".$_POST['patientIdNameParam'];
		$data['patientIdNameParam'] = $_POST['patientIdNameParam'];


		//TO-DO: -add: patient birthday to auto-compute age
		//note: the following are required parameters
/*		
		echo "SEX PARAM: ".$_POST['selectSexNameParam'];
		echo "MD PARAM: ".$_POST['selectMedicalDoctorNameParam'];
		echo "AGE PARAM: ".$_POST['inputAgeNameParam'];
		echo "AGE UNIT PARAM: ".$_POST['selectAgeUnitNameParam'];
*/
		
		$data['selectMedicalDoctorNameParam'] = $_POST['selectMedicalDoctorNameParam'];
		$data['selectSexNameParam'] = $_POST['selectSexNameParam'];
		$data['inputAgeNameParam'] = $_POST['inputAgeNameParam'];
		$data['selectAgeUnitNameParam'] = $_POST['selectAgeUnitNameParam'];

		//TO-DO: -add: checkbox answers
		//edited by Mike, 20210216
//		echo "OTHERS ANSWER PARAM: ".$_POST['inputTextOthersAnswerName'];
		if (isset($_POST['inputTextOthersAnswerNameParam'])) {
			$data['inputTextOthersAnswerNameParam'] = $_POST['inputTextOthersAnswerNameParam'];
			
//			echo "dito".$data['inputTextOthersAnswerNameParam'];
		}
		
		//TO-DO: -add: auto-count
/*	//edited by Mike, 20210211
		$data['inputCheckBox0'] = "";
		$data['inputCheckBox1'] = "";
		$data['inputCheckBox2'] = "";

		if (isset($_POST['inputCheckBox0'])) {
			$data['inputCheckBox0'] = $_POST['inputCheckBox0'];

			echo "DITO: ".$data['inputCheckBox0'];
		}

		if (isset($_POST['inputCheckBox1'])) {
			$data['inputCheckBox1'] = $_POST['inputCheckBox1'];

			echo "DITO: ".$data['inputCheckBox1'];
		}

		if (isset($_POST['inputCheckBox2'])) {
			$data['inputCheckBox2'] = $_POST['inputCheckBox2'];

			echo "DITO: ".$data['inputCheckBox2'];
		}
*/
		$iInputCheckBoxCount=0;
		$iInputCheckBoxCountMax=40;
		
		//added by Mike, 20210216
		$data['iInputCheckBoxCountMax']=$iInputCheckBoxCountMax;
		
		for ($iInputCheckBoxCount=0; $iInputCheckBoxCount<$iInputCheckBoxCountMax; $iInputCheckBoxCount++) {
			$data['inputCheckBox'.$iInputCheckBoxCount] = "";			

			//added by Mike, 20210212
			//note: execute +1 to inputCheckBox count in database 
			if (isset($_POST['inputCheckBox'.$iInputCheckBoxCount])) {
				$data['inputCheckBox'.$iInputCheckBoxCount] = $_POST['inputCheckBox'.$iInputCheckBoxCount];

//removed by Mike, 20210212
//				echo "DITO: ".$data['inputCheckBox'.$iInputCheckBoxCount].": ".$iInputCheckBoxCount."<br/>";
			}
		}
			
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

		$this->load->model('Browse_Model');

		//added by Mike, 20210212
		$this->Browse_Model->addLabTransactionServicePurchase($data);

		
/*		//removed by Mike, 20210211
		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);
*/

/* //removed by Mike, 20210209
//		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

		if (isset($data['idParam'])) {
			$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaId($data);

			$this->load->view('viewLabRequestForm', $data);

		}
		else {
			$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

			$this->load->view('searchPatientLabUnit', $data);
		}
*/		

		//removed by Mike, 20210211; added by Mike, 20210216
		$this->load->view('searchPatientLabUnit', $data);

	}



	//added by Mike, 20210318; edited by Mike, 20210407
//	public function confirmUpdateIndexCardForm($patientId)
	public function confirmUpdateIndexCardForm($patientId, $bFoldImageListValue)
	{
		//TO-DO: -add: the rest
		//echo "DITO: ".$_POST['inputTextLocationAddressName'];
		//echo "DITO: ".$_POST['inputCheckBoxName'];

//added by Mike, 20210212
//		echo "PATIENT ID PARAM: ".$_POST['patientIdNameParam'];

/* //edited by Mike, 20230413
		//edited by Mike, 20220721
		//$data['patientIdNameParam'] = $_POST['patientIdNameParam'];
		if (!isset($_POST["patientIdNameParam"])) {
			redirect('browse/searchPatient');			
		}

		//added by Mike, 20220722
		$data['patientIdNameParam'] = $_POST['patientIdNameParam'];
*/
		$data['patientIdNameParam'] = $patientId;


		//TO-DO: -add: patient birthday to auto-compute age
		//note: the following are required parameters
/*		
		echo "SEX PARAM: ".$_POST['selectSexNameParam'];
		echo "MD PARAM: ".$_POST['selectMedicalDoctorNameParam'];
		echo "AGE PARAM: ".$_POST['inputAgeNameParam'];
		echo "AGE UNIT PARAM: ".$_POST['selectAgeUnitNameParam'];
*/
		
		$data['selectMedicalDoctorNameParam'] = strtoupper(trim($_POST['selectMedicalDoctorNameParam']));
		$data['selectSexNameParam'] = strtoupper(trim($_POST['selectSexNameParam']));
		$data['inputAgeNameParam'] = strtoupper(trim($_POST['inputAgeNameParam']));
		$data['selectAgeUnitNameParam'] = strtoupper(trim($_POST['selectAgeUnitNameParam']));

		//added by Mike, 20210318
//		echo "PWD/SENIOR PARAM: ".$_POST['inputTextPwdSeniorIdNameParam'];
		$data['inputTextPwdSeniorIdNameParam'] = strtoupper(trim($_POST['inputTextPwdSeniorIdNameParam']));

//		echo "CIVIL STATUS PARAM: ".$_POST['selectCivilStatusNameParam'];
		$data['selectCivilStatusNameParam'] = strtoupper(trim($_POST['selectCivilStatusNameParam']));

//		echo "OCCUPATION PARAM: ".$_POST['inputTextOccupationIdNameParam'];
		$data['inputTextOccupationIdNameParam'] = strtoupper(trim($_POST['inputTextOccupationIdNameParam']));

//		echo "BIRTHDAY PARAM: ".$_POST['inputTextBirthdayIdNameParam'];
		$data['inputTextBirthdayIdNameParam'] = strtoupper(trim($_POST['inputTextBirthdayIdNameParam']));

//		echo "CONTACT# PARAM: ".$_POST['inputTextContactNumberIdNameParam'];
		$data['inputTextContactNumberIdNameParam'] = strtoupper(trim($_POST['inputTextContactNumberIdNameParam']));

//		echo "ADDRESS LOCATION PARAM: ".$_POST['inputTextLocationAddressIdNameParam'];
		$data['inputTextLocationAddressIdNameParam'] = strtoupper(trim($_POST['inputTextLocationAddressIdNameParam']));
		
//		echo "ADDRESS BARANGAY PARAM: ".$_POST['inputTextBarangayAddressIdNameParam'];
		$data['inputTextBarangayAddressIdNameParam'] = strtoupper(trim($_POST['inputTextBarangayAddressIdNameParam']));
		
//		echo "ADDRESS POSTAL PARAM: ".$_POST['inputTextPostalAddressIdNameParam'];
		$data['inputTextPostalAddressIdNameParam'] = strtoupper(trim($_POST['inputTextPostalAddressIdNameParam']));

//		echo "ADDRESS PROVINCE CITY PH PARAM: ".$_POST['inputTextProvinceCityPhAddressIdNameParam'];
		$data['inputTextProvinceCityPhAddressIdNameParam'] = strtoupper(trim($_POST['inputTextProvinceCityPhAddressIdNameParam']));
			
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

		$this->load->model('Browse_Model');

		//added by Mike, 20210319
		$this->Browse_Model->updateIndexCardForm($data);

		//removed by Mike, 20210211; added by Mike, 20210216
//		$this->load->view('viewPatientIndexCard', $data);
		
		//edited by Mike, 20210407		
//		$this->viewPatientIndexCard($patientId);
		$this->viewPatientIndexCard($patientId,0);
	}


	//added by Mike, 20200529
	public function searchPatientInformationDesk()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchPatientInformationDesk', $data);
	}

	//added by Mike, 20200529; edited by Mike, 20200530
	public function confirmPatientInformationDesk()
	{
		$data['nameParam'] = $_POST['nameParam'];
				
		//added by Mike, 20210730
		if (!isset($data['nameParam'])) {
			redirect('report/viewReportPatientQueue');
		}
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
		
		//added by Mike, 20200530
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
	
//			echo $data['medicalDoctorList'][0]['medical_doctor_name'];

		//edited by Mike, 20200601
		//$data['result'] = $this->Browse_Model->getDetailsListViaName($data);		
		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);		

		$this->load->view('searchPatientInformationDesk', $data);
	}

	//added by Mike, 20200328
	public function searchNonMedicine()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchNonMedicine', $data);
	}

	//added by Mike, 20201104
	public function searchSnack()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchSnack', $data);
	}

	//edited by Mike, 20200615
	public function confirmNonMedicine()
	{				
		//edited by Mike, 20230131	
		//TO-DO: -add: show only a smaller set if letter count is only 1

//		$data['nameParam'] = $_POST['nameParam'];
		if (!isset($_POST['nameParam'])) {
			//added by Mike, 20200328
			redirect('browse/searchNonMedicine');
		}
		else {
			$data['nameParam'] = $_POST['nameParam'];
		}

		//added by Mike, 20200912
		$data['nameParam'] = trim($data['nameParam']);

/* //removed by Mike, 20230131		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchNonMedicine');
		}
*/		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		//added by Mike, 20201010
		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

		$this->load->model('Browse_Model');
	
		$data['result'] = $this->Browse_Model->getNonMedicineDetailsListViaName($data);

//		echo "count: ".count($data['result']);

		//added by Mike, 20200417; edited by Mike, 20200615
		//$itemTypeId = 1; //1 = Medicine
		$itemTypeId = 2; //2 = Non-medicine
		$iCount = 0;
		$itemId = -1;

		//edited by Mike, 20200527
		$remainingItemNow = 0;
//		$remainingPaidItem = 0; //added by Mike, 20200501
		
		if ($data['result'] == True) {
			foreach ($data['result'] as $value) {				
				//edited by Mike, 20200422
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
					//edited by Mike, 20210110
//					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($value); 
										
//					echo $remainingItemNow;	
					
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
				
//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;
			}
		}

		//TO-DO: add: in non-medicine items
		//added by Mike, 20200522
		$itemId = -1;

		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();

		//TO-DO: -reverify: this
		//added by Mike, 20200821
		$iSameItemCount = 0;
		$bHasNoneZeroQuantity = false;

		if ($data['result'] == True) {
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
/*					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
	
					echo $value['item_name'];
					}
					
					else {
						array_push($outputArray, $value);						
					}
*/						
					//edited by Mike, 20200530; removed by Mike, 20200821
					array_push($outputArray, $value);
					//Note: We show only one (1) transaction of the same item whose in-stock count is 0.
					//This is to make the output list shorter.
					//The list is ordered by expiration date.
/*					//TO-DO: -add: this with correct non-medicine inventory count
					if (!$bHasNoneZeroQuantity) {
						if ($iSameItemCount == ($iSameItemTotalCount - 1)) { //if last item in the list of same items
							array_push($outputArray, $value);
						}
					}
					else {
						array_push($outputArray, $value);
					}

					$iSameItemCount = $iSameItemCount + 1;
*/					
				}
				//added by Mike, 20200522; edited by Mike, 20200821
				else {
/*					//TO-DO: -add: this with correct non-medicine inventory count
					
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
*/

					array_push($outputArray, $value);						

					//delete the items with zero in-stock value if there exists another set of such item in the inventory
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							if ($outputValue['resultQuantityInStockNow'] == 0) {
								$outputValue = $value;
							}
						}						
					}
					unset($outputValue);
/*					
					//TO-DO: -reverify: this if still necessary
					//delete the items with zero in-stock value if there exists another set of such item in the inventory
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							if ($outputValue['resultQuantityInStockNow'] == 0) {
								$outputValue = $value;								
							}
						}						
					}
					unset($outputValue);
*/					
				}
			}
		}
		
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['result'] = [];
		$data['result'] = array();
		
		$data['result'] = $outputArray;
		
		$this->load->view('searchNonMedicine', $data);
	}

	//added by Mike, 20201104
	//TO-DO: -add: parameter for itemTypeId
	//TO-DO: -reverify: set of instructions
	//edited by Mike, 20200615
	public function confirmSnack()
	{		
		$data['nameParam'] = $_POST['nameParam'];

		//added by Mike, 20200912
		$data['nameParam'] = trim($data['nameParam']);
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchSnack');
		}
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		//added by Mike, 20201010
		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

		$this->load->model('Browse_Model');
		
		//edited by Mike, 20201104
		//$data['result'] = $this->Browse_Model->getNonMedicineDetailsListViaName($data);
		$data['result'] = $this->Browse_Model->getSnackDetailsListViaName($data);


//		echo "count: ".count($data['result']);

		//added by Mike, 20200417; edited by Mike, 20200615
		//$itemTypeId = 1; //1 = Medicine
//		$itemTypeId = 2; //2 = Non-medicine
		$itemTypeId = 3; //3 = Snack
		$iCount = 0;
		$itemId = -1;

		//edited by Mike, 20200527
		$remainingItemNow = 0;
//		$remainingPaidItem = 0; //added by Mike, 20200501
		
		if ($data['result'] == True) {
			foreach ($data['result'] as $value) {				
				//edited by Mike, 20200422
				//$itemId = $value['item_id'];
				if ($itemId==$value['item_id']) {
					$bIsSameItemId = true;
				}
				else {
					$itemId = $value['item_id'];
					$bIsSameItemId = false;
				}
					
//				echo "itemId: " . $itemId;

				//added by Mike, 20200417
				//note: sell first the item that is nearest to the expiration date using now as the reference date and time stamp				
				//edited by Mike, 20200422
//				if ($iCount==0) {
				if (!$bIsSameItemId) {	

					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); //"0";				
					
					//edited by Mike, 20200527
//					$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					//edited by Mike, 20210110
					//$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($value); 
										
//					echo $remainingItemNow;	
					
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
				
//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;
			}
		}

		//TO-DO: add: in non-medicine items
		//added by Mike, 20200522
		$itemId = -1;

		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();

		//TO-DO: -reverify: this
		//added by Mike, 20200821
		$iSameItemCount = 0;
		$bHasNoneZeroQuantity = false;

		if ($data['result'] == True) {
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
/*					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
	
					echo $value['item_name'];
					}
					
					else {
						array_push($outputArray, $value);						
					}
*/						
					//edited by Mike, 20200530; removed by Mike, 20200821
					array_push($outputArray, $value);
					//Note: We show only one (1) transaction of the same item whose in-stock count is 0.
					//This is to make the output list shorter.
					//The list is ordered by expiration date.
/*					//TO-DO: -add: this with correct non-medicine inventory count
					if (!$bHasNoneZeroQuantity) {
						if ($iSameItemCount == ($iSameItemTotalCount - 1)) { //if last item in the list of same items
							array_push($outputArray, $value);
						}
					}
					else {
						array_push($outputArray, $value);
					}

					$iSameItemCount = $iSameItemCount + 1;
*/					
				}
				//added by Mike, 20200522; edited by Mike, 20200821
				else {
					array_push($outputArray, $value);						

					//delete the items with zero in-stock value if there exists another set of such item in the inventory
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							if ($outputValue['resultQuantityInStockNow'] == 0) {
								$outputValue = $value;
							}
						}						
					}
					unset($outputValue);
				}
			}
		}
		
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['result'] = [];
		$data['result'] = array();
		
		$data['result'] = $outputArray;
		
		$this->load->view('searchSnack', $data);
	}

	public function confirmNonMedicinePrev()
	{
		//edited by Mike, 20200407
		$data['nameParam'] = $_POST['nameParam'];
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchNonMedicine');
		}
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
	
		$data['result'] = $this->Browse_Model->getNonMedicineDetailsListViaName($data);

		$this->load->view('searchNonMedicine', $data);
	}
	
	//added by Mike, 20200328
	public function searchMedicine()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchMedicine', $data);
	}

	//added by Mike, 20200328; edited by Mike, 20200417
	//added by Mike, 20210218
	//use sort asc with added_datetime_stamp
	//update added_datetime_stamp value due to select medicine items sold,
	//albeit not the nearest to expire
	public function confirmMedicine()
	{
		$data['nameParam'] = $_POST['nameParam'];
		
		//added by Mike, 20200912
		$data['nameParam'] = trim($data['nameParam']);

		//added by Mike, 20201010
		if (!isset($data['nameParam'])) {
			redirect('browse/searchMedicine');
		}

		//added by Mike, 20201010
		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
		//added by Mike, 20201010
/*		echo "ipAddress: ".$ipAddress."<br/>";
		echo "machineAddress: ".$machineAddress."<br/>";
*/
		
/*		//removed by Mike, 20201013
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchMedicine');
		}
*/		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
	
		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

//		echo "count: ".count($data['result']);

		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		$itemId = -1;

		//edited by Mike, 20200527
		$remainingItemNow = 0;
//		$remainingPaidItem = 0; //added by Mike, 20200501
		
		if ($data['result'] == True) {
			foreach ($data['result'] as $value) {				
				//edited by Mike, 20200422
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
					
					//edited by Mike, 20210110
//					$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($value); 

//					echo "new>".$data['result'][$iCount]['quantity_in_stock'].": remainingNow:".$remainingItemNow."<br/>";
//echo "hallo".$data['result'][$iCount]['expiration_date'].":".$remainingItemNow."<br/>";
										
					
					if ($remainingItemNow < 0) {
						
						$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
						
//						$remainingPaidItem = $remainingPaidItem - $data['result'][$iCount]['resultQuantityInStockNow'];

						//added by Mike, 20210218
						//$remainingItemNow = $data['result'][$iCount]['quantity_in_stock'] + $remainingItemNow;

					}
					else {
						$data['result'][$iCount]['resultQuantityInStockNow'] = $remainingItemNow;
					}
					
//					$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
				}
				else {
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					

//echo "dito".$data['result'][$iCount]['expiration_date'].":".$remainingItemNow."<br/>";
//					echo ">".$data['result'][$iCount]['quantity_in_stock'].": remainingNow:".$remainingItemNow."<br/>";

					if ($remainingItemNow < 0) { //already negative

//					echo ">".$data['result'][$iCount]['quantity_in_stock'].": remainingNow:".$remainingItemNow."<br/>";
				
						if ($data['result'][$iCount]['quantity_in_stock'] + $remainingItemNow < 0) {
							
//							echo ">>>";
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

//echo "dito".$data['result'][$iCount]['expiration_date'].":".$remainingItemNow."<br/>";
	
				}
				
//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;
			}
		}

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
/*					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
	
					echo $value['item_name'];
					}
					
					else {
						array_push($outputArray, $value);						
					}
*/						
					//edited by Mike, 20200530; removed by Mike, 20200811
					//array_push($outputArray, $value);
					//Note: We show only one (1) transaction of the same item whose in-stock count is 0.
					//This is to make the output list shorter.
					//The list is ordered by expiration date.
					if (!$bHasNoneZeroQuantity) {
						//edited by Mike, 20210211
//						if ($iSameItemCount == ($iSameItemTotalCount - 1)) { //if last item in the list of same items
						if ($iSameItemCount == ($iSameItemTotalCount)) { //if last item in the list of same items
							array_push($outputArray, $value);
						}
					}
					else {
						//edited by Mike, 20201204
//						array_push($outputArray, $value);
						
						//TO-DO: -identify: remaining quantity of in-stock item
						//still reaches item's last entry in the inventory list
						//if not, no need to add in displayed list
						//additional note: 
						//observation: displayed list includes 3 or more of same item in inventory list,
						//cause: delivered in-stock items excess; increased in returned for exchange items, etc
						//TO-DO: -update: this
						//edited by Mike, 20201219
/*						if ($iSameItemTotalCount<=2) {
							array_push($outputArray, $value);
						}
						else if ($iSameItemTotalCount<=3) {
							if (($iSameItemCount == ($iSameItemTotalCount))) {//if last item in the list of same items
							}
							else {
								array_push($outputArray, $value);
							}
						}
*/
	//added by Mike, 20210218						
	//TO-DO: -reverify: this
						if ($iSameItemTotalCount<=3) {
							array_push($outputArray, $value);
						}
						else if ($iSameItemTotalCount>3) {
							if (($iSameItemCount == ($iSameItemTotalCount)) or //if last item in the list of same items
								($iSameItemCount == ($iSameItemTotalCount - 1))){  //if second to the last item in the list of same items
								array_push($outputArray, $value);
							
////							echo $iSameItemCount.": ".$value['item_name']." : ".$value['resultQuantityInStockNow']."<br/>";
////							array_push($outputArray, $value);
							}
							//added by Mike, 20210207
							else {
								//echo $value['resultQuantityInStockNow']."<br/>";
								if ($value['resultQuantityInStockNow']!=0) {
									array_push($outputArray, $value);
								}
							}
						}
						else {
							array_push($outputArray, $value);
						}												
	//added by Mike, 20210218						
	//array_push($outputArray, $value);

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

/*					
					//TO-DO: -reverify: this if still necessary
					//delete the items with zero in-stock value if there exists another set of such item in the inventory
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							if ($outputValue['resultQuantityInStockNow'] == 0) {
								$outputValue = $value;								
							}
						}						
					}
					unset($outputValue);
*/					
				}
			}
		}

		//edited by Mike, 20201204
/*		//TO-DO: -reverify: remove excess zero quantity in list
//		foreach ($data['result'] as $value) {				
		foreach ($outputArray as $value) {				
			echo $value['item_name']." : ".$value['resultQuantityInStockNow']."<br/>";
		}
*/				
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['result'] = [];
		$data['result'] = array();
		
		$data['result'] = $outputArray;
		
		$this->load->view('searchMedicine', $data);
	}

	//added by Mike, 20200328; edited by Mike, 20220518; from 20200501
	public function viewItemMedicine($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 1; //1 = Medicine
		$data['itemTypeId'] = $itemTypeId; //added by Mike, 20200615

		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
		
		//added by Mike, 20200406; removed by Mike, 20220518
//		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
			
		//added by Mike, 20200406; edited by Mike, 20200407; edited again by Mike, 20210110		
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);
		//added by Mike, 20210123
		//TO-DO: -reverify: if necessary
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($data);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];

		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);

		//echo $data['resultItem'][0]['is_hidden'];
		$data['is_hidden'] = $data['resultItem'][0]['is_hidden'];

		$data['resultItem'] = $this->getResultItemQuantity($data);		

		
		//edited by Mike, 20200608
		//$data['itemName'] = $data['resultItem'][0]['item_name'];
		$data['itemName'] = $data['result'][0]['item_name'];
		

/*		
		foreach ($data['resultItem'] as $value) {
			echo "dito".$value['resultQuantityInStockNow']."<br/>";
			echo "dito".$value['quantity_in_stock']."<br/>";
		}
*/
		$this->load->view('viewItemMedicine', $data);
	}
	
	//added by Mike, 20220518
	public function viewItemMedicineWithItemPurchasedHistory($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 1; //1 = Medicine
		$data['itemTypeId'] = $itemTypeId; //added by Mike, 20200615

		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
		
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
			
		//added by Mike, 20200406; edited by Mike, 20200407; edited again by Mike, 20210110		
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);
		//added by Mike, 20210123
		//TO-DO: -reverify: if necessary
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($data);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];

		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);

		$data['resultItem'] = $this->getResultItemQuantity($data);		
		
		//edited by Mike, 20200608
		//$data['itemName'] = $data['resultItem'][0]['item_name'];
		$data['itemName'] = $data['result'][0]['item_name'];
		

/*		
		foreach ($data['resultItem'] as $value) {
			echo "dito".$value['resultQuantityInStockNow']."<br/>";
			echo "dito".$value['quantity_in_stock']."<br/>";
		}
*/
		$this->load->view('viewItemMedicineWithItemPurchasedHistory', $data);
	}	

	//added by Mike, 20200328; edited by Mike, 20200603
	public function viewItemMedicineOK($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 1; //1 = Medicine
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
			
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200603
//		$data['resultItem'] = $this->getResultItemQuantity($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//--------------------------------------
		//added by Mike, 20200603

		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		$itemId = -1;

		//edited by Mike, 20200527
		$remainingItemNow = 0;
//		$remainingPaidItem = 0; //added by Mike, 20200501
		
		if ($data['resultItem'] == True) {
			foreach ($data['resultItem'] as $value) {				
				//edited by Mike, 20200422
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
					//edited by Mike, 20210110
//					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($value); 
										
//					echo $remainingItemNow;	
					
					if ($remainingItemNow < 0) {
						
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
						
//						$remainingPaidItem = $remainingPaidItem - $data['result'][$iCount]['resultQuantityInStockNow'];
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $remainingItemNow;
					}
					
//					$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
				}
				else {
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					

					if ($remainingItemNow < 0) { //already negative
						if ($data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow < 0) {
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
							
							$remainingItemNow = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow;
						}
						else {
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow;					

							//TO-DO: -reverify: again for cases with multiple additional stock items
							//added by Mike, 20200522
							$remainingItemNow = 0;
						}
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] ;					
					}
				}
				
//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;
			}
		}

		//TO-DO: add: in non-medicine items
		//added by Mike, 20200522
		$itemId = -1;
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();

		if ($data['resultItem'] == True) {
			foreach ($data['resultItem'] as $value) {				
			
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
/*					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
	
					echo $value['item_name'];
					}
					
					else {
						array_push($outputArray, $value);						
					}
*/						
					//edited by Mike, 20200530
					array_push($outputArray, $value);						
					
					//TO-DO: -add: auto-verify if there exists another set of the item in the inventory
					
/*
					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
					}
					else {						
						array_push($outputArray, $value);						
					}
*/
				}
				//added by Mike, 20200522
				else {
					//edited by Mike, 20200530
					
/*
					//edited by Mike, 20200525
//					if ($value['resultQuantityInStockNow'] == 0) {
					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
					}
					else {						
						array_push($outputArray, $value);						
					}
*/
					array_push($outputArray, $value);						

					//delete the items with zero in-stock value if there exists another set of such item in the inventory
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							if ($outputValue['resultQuantityInStockNow'] == 0) {
								$outputValue = $value;
							}
						}						
					}
					unset($outputValue);
				}
			}
		}
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['resultItem'] = [];
		$data['resultItem']= array();
		
		$data['resultItem'] = $outputArray;

		$this->load->view('viewItemMedicine', $data);
	}


	//added by Mike, 20200328; edited by Mike, 20200501
	public function viewItemMedicinePrevProblemWithQuantityInStockNow($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 1; //1 = Medicine
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
			
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200603
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);		
		$data['resultItem'] = $this->getResultItemQuantity($data);

/*
		//edited by Mike, 20200501
		//TO-DO: -update: this
		$data['nameParam'] = $data['result'][0]['item_name'];
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaName($data);
		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		$itemId = -1;
		$remainingPaidItem = 0; //added by Mike, 20200501
		
		if ($data['resultItem'] == True) {
			foreach ($data['resultItem'] as $value) {				
				//edited by Mike, 20200422
				//$itemId = $value['item_id'];
				if ($itemId==$value['item_id']) {
					$bIsSameItemId = true;
				}
				else {
					$itemId = $value['item_id'];
					$bIsSameItemId = false;
				}
					
	//			echo "itemId: " . $itemId;
				//added by Mike, 20200417
				//note: sell first the item that is nearest to the expiration date using now as the reference date and time stamp				
				//edited by Mike, 20200422
//				if ($iCount==0) {
				if (!$bIsSameItemId) {	
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); //"0";				
					
					$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					
					if ($remainingPaidItem < 0) {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $remainingPaidItem;
					}
					
//					$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
				}
				else {
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					
					if ($remainingPaidItem < 0) { //already negative
						if ($data['resultItem'][$iCount]['quantity_in_stock'] + $remainingPaidItem < 0) {
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
							
							$remainingPaidItem = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingPaidItem;
						}
						else {						
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingPaidItem;					
						}
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] ;					
					}
				}
				
				$iCount = $iCount + 1;
			}
		}		
*/
		
		$this->load->view('viewItemMedicine', $data);
	}

	//added by Mike, 20200603; edited by Mike, 20200617
	//TO-DO: -update: this by eliminating excess instructions
	public function getResultItemQuantity($data) {				
		//added by Mike, 20200417
		//edited by Mike, 20200615
//		$itemTypeId = 1; //1 = Medicine
		$itemTypeId = $data['itemTypeId']; //1 = Medicine; 2= Non-medicine
		$iCount = 0;
		$itemId = -1;

		//edited by Mike, 20200527
		$remainingItemNow = 0;
//		$remainingPaidItem = 0; //added by Mike, 20200501
		
		if ($data['resultItem'] == True) {
			foreach ($data['resultItem'] as $value) {				
				//edited by Mike, 20200422
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
					//edited by Mike, 20210110
//					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($value); 
											
//					echo $remainingItemNow;	
					
					if ($remainingItemNow < 0) {
						
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
						
//						$remainingPaidItem = $remainingPaidItem - $data['result'][$iCount]['resultQuantityInStockNow'];
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $remainingItemNow;
					}
					
//					$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
				}
				else {
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					

					if ($remainingItemNow < 0) { //already negative
						if ($data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow < 0) {
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
							
							$remainingItemNow = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow;
						}
						else {
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow;					

							//TO-DO: -reverify: again for cases with multiple additional stock items
							//added by Mike, 20200522
							$remainingItemNow = 0;
						}
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] ;					
					}
				}
				
//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;
			}
		}

		//TO-DO: add: in non-medicine items
		//added by Mike, 20200522
		$itemId = -1;
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();

		if ($data['resultItem'] == True) {
			foreach ($data['resultItem'] as $value) {				
			
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
/*					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
	
					echo $value['item_name'];
					}
					
					else {
						array_push($outputArray, $value);						
					}
*/						
					//TO-DO: -reverify: this
					//edited by Mike, 20200530
					array_push($outputArray, $value);						
/*
					//added by Mike, 20200607
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
//							if ($outputValue['resultQuantityInStockNow'] == 0) {
							if (($outputValue['resultQuantityInStockNow'] == 0) and ($value['resultQuantityInStockNow'] != 0)){
								$outputValue = $value;
								
								echo "value: ".$value['resultQuantityInStockNow'];
							}
						}						
					}
					unset($outputValue);
*/					
					//TO-DO: -add: auto-verify if there exists another set of the item in the inventory
					
/*
					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
					}
					else {						
						array_push($outputArray, $value);						
					}
*/
				}
				//added by Mike, 20200522
				else {
					//edited by Mike, 20200530
					
/*
					//edited by Mike, 20200525
//					if ($value['resultQuantityInStockNow'] == 0) {
					if (($value['resultQuantityInStockNow'] == 0) && (strpos($value['item_name'],"*")===false)) {
//					if ($value['quantity_in_stock'] == 0) {
					}
					else {						
						array_push($outputArray, $value);						
					}
*/

					array_push($outputArray, $value);						

					//delete the items with zero in-stock value if there exists another set of such item in the inventory
					foreach ($outputArray as &$outputValue) {
						if ($outputValue['item_id'] == $value['item_id']) {
							if ($outputValue['resultQuantityInStockNow'] == 0) {
//							if (($outputValue['resultQuantityInStockNow'] == 0) and ($value['resultQuantityInStockNow'] != 0)){
								$outputValue = $value;
								
//								echo "value: ".$value['resultQuantityInStockNow'];
							}
						}						
					}
					unset($outputValue);

				}
/*
				array_push($outputArray, $value);						

				//delete the items with zero in-stock value if there exists another set of such item in the inventory
				foreach ($outputArray as &$outputValue) {
					if ($outputValue['item_id'] == $value['item_id']) {
						if ($outputValue['resultQuantityInStockNow'] == 0) {
							$outputValue = $value;
						}
					}						
				}
				unset($outputValue);
*/
			}
		}
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['resultItem'] = [];
		$data['resultItem'] = array();


/*		//edited by Mike, 20200607
		$data['resultItem'] = $outputArray;
*/		
		foreach ($outputArray as $value) {
			if ($value['resultQuantityInStockNow']==0) {				
			}
			else {
				array_push($data['resultItem'], $value);
			}
		}

		return $data['resultItem'];
	}

	//added by Mike, 20200501; edited by Mike, 20200527
	public function getResultItemQuantityBuggy($data) {
		$data['nameParam'] = $data['result'][0]['item_name'];
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		$itemId = -1;
		$remainingPaidItem = 0; //added by Mike, 20200501
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = []; //added by Mike, 20200527
		$outputArray = array();
		
		if ($data['resultItem'] == True) {
						
			foreach ($data['resultItem'] as $value) {				
				//edited by Mike, 20200422
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
					//$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					//edited by Mike, 20210110
					//$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($value); 

					//edited by Mike, 20200528
//					if ($remainingItemNow < 0) {
					if (strpos($data['resultItem'][$iCount]['item_name'],"*")!==false) {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
						
						array_push($outputArray, $data['resultItem'][$iCount]);
					}
					else if ($remainingItemNow < 0) {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
						//do not add in output array

						//added by Mike, 20200530
						//TO-DO: -update: this
						$remainingItemNow = $data['resultItem'][$iCount]['quantity_in_stock']-$remainingItemNow;//0;					
					}
					else {
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $remainingItemNow;
							
						//added by Mike, 20200527
						//edited by Mike, 20200530
						//TO-DO: -add: auto-identify if there exists another set of the item in the inventory
//						if ($remainingItemNow!=0) {
							array_push($outputArray, $data['resultItem'][$iCount]);
//						}
					}
					
//					$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
				}
				else {					
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					

					if ($remainingItemNow < 0) { //already negative
						if ($data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow < 0) {
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = 0;
							
							$remainingItemNow = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow;
						}
						else {						
							$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] + $remainingItemNow;					

							//added by Mike, 20200527
							array_push($outputArray, $data['resultItem'][$iCount]);
						}
					}
					else {						
						$data['resultItem'][$iCount]['resultQuantityInStockNow'] = $data['resultItem'][$iCount]['quantity_in_stock'] ;
						
						//edited by Mike, 20200530

						//added by Mike, 20200527
//						if ($remainingItemNow!=0) {
//							array_push($outputArray, $data['resultItem'][$iCount]);
//						}

						//added by Mike, 20200601
						//TO-DO: -re-verify: for medicine items, e.g. alendra, aldren
						array_push($outputArray, $data['resultItem'][$iCount]);

						//delete the items with zero in-stock value if there exists another set of such item in the inventory
						foreach ($outputArray as &$outputValue) {							
							if ($outputValue['item_id'] == $data['resultItem'][$iCount]['item_id']) {
								if ($outputValue['resultQuantityInStockNow'] == 0) {
									$outputValue = $data['resultItem'][$iCount];
								}
							}						
						}
						unset($outputValue);
					}
				}	
	
				$iCount = $iCount + 1;
			}
		}		

		//edited by Mike, 20200527
//		return $data['resultItem'];
		return $outputArray;
	}

	//added by Mike, 20200328; edited by Mike, 20200407
	public function viewItemMedicinePrev($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 1; //1 = Medicine
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

		//edited by Mike, 20200501
		//TO-DO: -update: this

		//added by Mike, 20200406; edited by Mike, 20200501
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);

		$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
					
		if ($remainingPaidItem < 0) {
			$data['resultQuantityInStockNow'] = 0;
		}
		else {
			$data['resultQuantityInStockNow'] = $remainingPaidItem;
		}

		//TO-DO: -update: this
/*
				}
				else {
					//edited by Mike, 20200501
					//$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					
					if ($remainingPaidItem < 0) { //already negative
						if ($data['result'][$iCount]['quantity_in_stock'] + $remainingPaidItem < 0) {
							$data['result'][$iCount]['resultQuantityInStockNow'] = 0;
							
							$remainingPaidItem = $data['result'][$iCount]['quantity_in_stock'] + $remainingPaidItem;
						}
						else {						
							$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] + $remainingPaidItem;					
						}
*/
	
		$this->load->view('viewItemMedicine', $data);
	}

/*	//removed by Mike, 20200411
	//added by Mike, 20200328; edited by Mike, 20200407
	public function viewItemMedicine($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		$this->load->model('Browse_Model');
	
		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaItemId($itemId);
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidMedicineDetailsListViaItemId($itemId);
		$data['cartListResult'] = $this->Browse_Model->getMedicineDetailsListViaNotesUnpaid();
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getMedicineAvailableQuantityInStockItemId($itemId);
	
		$this->load->view('viewItemMedicine', $data);
	}
*/

/*	
	//added by Mike, 20200330; edited by Mike, 20200407
	public function addTransactionMedicinePurchase($itemId,$quantity)
	{
		$data['itemId'] = $itemId;
		$data['quantity'] = $quantity;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);
//		$data['transactionId'] = $this->Browse_Model->addTransactionMedicinePurchase($data);
		$this->Browse_Model->addTransactionMedicinePurchase($data);
		
		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaItemId($itemId);
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidMedicineDetailsListViaItemId($itemId);
		$data['cartListResult'] = $this->Browse_Model->getMedicineDetailsListViaNotesUnpaid();
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getMedicineAvailableQuantityInStockItemId($itemId);
		$this->load->view('viewItemMedicine', $data);
	}
*/

/*	//removed by Mike, 20200411
	//added by Mike, 20200331; edited by Mike, 20200407
	public function deleteTransactionMedicinePurchase($itemId, $transactionId)
	{
		$data['itemId'] = $itemId;
		$data['transactionId'] = $transactionId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);
		$this->Browse_Model->deleteTransactionMedicinePurchase($data);
		
		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaItemId($itemId);
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidMedicineDetailsListViaItemId($itemId);
		$data['cartListResult'] = $this->Browse_Model->getMedicineDetailsListViaNotesUnpaid();
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getMedicineAvailableQuantityInStockItemId($itemId);
		$this->load->view('viewItemMedicine', $data);
	}
*/

/*	//removed by Mike, 20200411	
	//added by Mike, 20200401; edited by Mike, 20200407
	public function payTransactionMedicinePurchase($itemId)
	{
		$data['itemId'] = $itemId;
//		$data['transactionId'] = $transactionId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);
		$this->Browse_Model->payTransactionMedicinePurchase();
		
		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaItemId($itemId);
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidMedicineDetailsListViaItemId($itemId);
		$data['cartListResult'] = $this->Browse_Model->getMedicineDetailsListViaNotesUnpaid();
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getMedicineAvailableQuantityInStockItemId($itemId);
		$this->load->view('viewItemMedicine', $data);
	}
*/	
	//---------------------------------------
	
	//added by Mike, 20200517
	public function viewPatient($patientId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		//edited by Mike, 20200407
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
		
		//added by Mike, 20210906
//		echo $data['result'][0]['medical_doctor_id'];

		//removed by Mike, 20211203
		$medicalDoctorId = $data['result'][0]['medical_doctor_id'];		
		$data['medicalDoctorId'] = $medicalDoctorId;

//		echo $medicalDoctorId;
			
		//TO-DO: -reverify: this action; due to transactions with patient_id=0 is over 10,000
		//reminder: item transactions also use patient_id 0
		//reminder: use "NONE, WALA", instead of "NONE" for transactions 
		//whose patient_id is not certain
		//edited by Mike, 20220219
//		if (($patientId==0) || ($patientId==3543)){ //if patient name is "NONE", et cetera
		//edited by Mike, 20220624
		//NONE v2; already noticeable DELAY with TOTAL 659 count in TRANSACTIONS table (with 91,478 count)
		//TO-DO: -update: this
//		if (($patientId==0) || ($patientId==3543) || ($patientId==11682)){ //if patient name is "NONE", et cetera; 11682 "NONE, WALA v2";
//		if (($patientId==0) || ($patientId==3543) || ($patientId==11682)){ //if patient name is "NONE", et cetera; 11682 "NONE, WALA v2";

		//edited by Mike, 20221007
		/*
			if (($patientId==0) || ($patientId==3543) || //if patient name is "NONE", et cetera; 
		    ($patientId==11682) || ($patientId==14177)){ //11682 "NONE, WALA v2"; 14177 "NONE, WALA v3"
		*/
		//noticeable DELAY in execution: "NONE, WALA v3"
		//531 TOTAL IN TRANSACTIONS DB TABLE (with 85566 transactions)
			if (($patientId==0) || ($patientId==3543) || //if patient name is "NONE", et cetera; 
		    ($patientId==11682) || ($patientId==14177) ||  //11682 "NONE, WALA v2"; 14177 "NONE, WALA v3"
			//edited by Mike, 20230119
//			($patientId==16186)){ //"NONE, WALA v4"
			//"NONE, WALA v4" or v5
			($patientId==16186) || ($patientId==17904)){ 
			
		//noticeable delay in execution with 3543,
		//with @patientId used in transactions: 1053 total, Query took 0.0800 seconds.

//echo "hallo".$patientId;

			$data['resultPaid']=null;
			$data['cartListResult']=null;
			//edited by Mike, 20211204
//			$data['result'][0]['medical_doctor_name'] = "";			
			$data['result'][0]['medical_doctor_id'] = "1"; //DR. PEDRO			

	//		echo $medicalDoctorId;
		}
		else {
			//TO-DO: -update: function instructions due to $medicalDoctorId not used as input
			//removed by Mike, 20220517
			//objective: speed-up system
//			$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

			$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
		}

		//added by Mike, 20210724; edited by Mike, 20210906
//		echo ">>".$medicalDoctorId;
//		echo ">>".$data['resultPaid'][0]['medical_doctor_id'];
//		$data['result'][0]['medical_doctor_id']=$data['resultPaid'][0]['medical_doctor_id'];				
		//removed by Mike, 20210906
//		$medicalDoctorId=$data['resultPaid'][0]['medical_doctor_id'];

		$this->load->view('viewPatient', $data);
	}
	
	//added by Mike, 20200517; edited by Mike, 20210320
//	public function viewPatientIndexCard($patientId)
	public function viewPatientIndexCard($patientId, $bFoldImageListValue)	
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
		
/*	//removed by Mike, 20210306
		//edited by Mike, 20200407
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
				
		$medicalDoctorId = $data['result'][0]['medical_doctor_id'];
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);
		
		//added by Mike, 20200601; removed by Mike, 20200608
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
*/

		//TO-DO: -update: this
/*
		$itemTypeId = 2;
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsLpdist($itemTypeId, $itemId);
		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
*/	

		//added by Mike, 20210209
		$this->load->model('Browse_Model');
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();

		$data['result'] = $this->Browse_Model->getDetailsListViaIdIndexCard($patientId);

		//added by Mike, 20210707
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($data['result'][0]['medical_doctor_id'], $patientId);

		//added by Mike, 20221102
		$data['patientId'] = $patientId;

		//added by Mike, 20210314
		$data['resultPaidMedItem'] = $this->Browse_Model->getPaidItemDetailsListForPatient(1, $patientId); //1 = MED ITEM

		//added by Mike, 20210315
		$data['resultPaidNonMedItem'] = $this->Browse_Model->getPaidItemDetailsListForPatient(2, $patientId); //2 = NON-MED ITEM

		//added by Mike, 20210514
		$data['resultPaidSnackItem'] = $this->Browse_Model->getPaidItemDetailsListForPatient(3, $patientId); //3 = SNACK ITEM

		//added by Mike, 20210316
		$data['resultIndexCardImageList'] = $this->Browse_Model->getIndexCardImageListForPatient($patientId);

		//added by Mike, 20210320
		$data['bFoldImageListValue'] = $bFoldImageListValue;

/*
		echo "HALLO: ".$data['result'][0]["medical_doctor_id"]."<br/><br/>";
		echo "transactionID: ".$data['result'][0]["transaction_id"]."<br/><br/>";
		echo "TranMDID: ".$data['result'][0]["TranMDID"]."<br/><br/>";
*/
		//edited by Mike, 20230413; from 20230410
		if ($data['result'][0]["medical_doctor_id"]!=$data['result'][0]["TranMDID"]) {
			$data['bIsSetMDIdNotTranMDId']=true;
			$data['tranMedicalDoctorName']=$data['result'][0]["medical_doctor_name"];
			$data['selectMedicalDoctorNameParam']=$data['tranMedicalDoctorName'];
		}

		$data['result'][0]["medical_doctor_id"]=$data['result'][0]["TranMDID"];

	
		//echo "HALLO: ".$data['result'][0]["patient_id"]."<br/><br/>";
		
		//edited by Mike, 20230410; 20230410
		//added by Mike, 20220526
		if (!isset($data['result'][0]["medical_doctor_id"])) {
			//redirect('browse/searchPatient');
			$data['idParam']=$patientId;
			$data['result']=$this->Browse_Model->getNewestPatientDetailsListViaId($data);
			
			//note: no transaction, so entered this branch;
			//echo "HALLO".$data['result'][0]["TranMDID"];
		}
		
		$this->load->view('viewPatientIndexCard', $data);
	}
	
	//added by Mike, 20210630
	public function deletePatientIndexCard($patientId, $iIndexCardImageId)	
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$this->Browse_Model->deleteIndexCardImageViaId($iIndexCardImageId);
		
		$this->viewPatientIndexCard($patientId, 0); //$bFoldImageListValue
	}
	
	//added by Mike, 20210626; edited by Mike, 20210720
	//TO-DO: -reuse: parts to auto-generate page to enter Official Receipt numbers
//	public function viewAcknowledgmentForm($patientId)	
	public function viewAcknowledgmentForm($patientId, $transactionDate)	
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
		
		//added by Mike, 20210629
		$data['cashierList'] = $this->Browse_Model->getCashierList();

		
		$data['result'] = $this->Browse_Model->getDetailsListViaIdIndexCard($patientId);

		//added by Mike, 20210626
//		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($data['result'][0]['medical_doctor_id'], $patientId);

		//edited by Mike, 20210720
		//$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsListForTheDayNoItemFee($data['result'][0]['medical_doctor_id'], $patientId);

		//removed by Mike, 20210720
//		$transactionDate = date("m/d/Y", strtotime("07/19/2021"));
//		$transactionDate = date("m/d/Y");


//echo ">>>transactionDate: ".$transactionDate;
		$transactionDate = str_replace("-","/",$transactionDate);

		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsListForTheDayNoItemFee($data['result'][0]['medical_doctor_id'], $patientId, $transactionDate);

		//added by Mike, 20230514
		$data['bIsMultiTransaction']=false;

		//note: faster for human to understand,
		//albeit uses additional access to DB;
		$data['bIsMultiTransaction']=$this->Browse_Model->getIsMultiTransaction($patientId, $transactionDate);

//echo $data['resultPaid'][0]['patient_name'];
//echo $data['resultPaid'][0]['transaction_id'];
//echo $data['resultPaid'][1]['transaction_id'];

		//added by Mike, 20210314; edited by Mike, 20210720		
		//$data['resultPaidMedItem'] = $this->Browse_Model->getPaidItemDetailsListForPatientForTheDay(1, $patientId); //1 = MED ITEM
		$data['resultPaidMedItem'] = $this->Browse_Model->getPaidItemDetailsListForPatientForTheDay(1, $patientId, $transactionDate); //1 = MED ITEM

		//added by Mike, 20210315; edited by Mike, 20210720
//		$data['resultPaidNonMedItem'] = $this->Browse_Model->getPaidItemDetailsListForPatientForTheDay(2, $patientId); //2 = NON-MED ITEM
		$data['resultPaidNonMedItem'] = $this->Browse_Model->getPaidItemDetailsListForPatientForTheDay(2, $patientId, $transactionDate); //2 = NON-MED ITEM

		//added by Mike, 20210514; edited by Mike, 20210720
//		$data['resultPaidSnackItem'] = $this->Browse_Model->getPaidItemDetailsListForPatientForTheDay(3, $patientId); //3 = SNACK ITEM
		$data['resultPaidSnackItem'] = $this->Browse_Model->getPaidItemDetailsListForPatientForTheDay(3, $patientId, $transactionDate); //3 = SNACK ITEM
		
		//removed by Mike, 20230515; added by Mike, 20230515
/*		
		//echo $data['resultPaidMedItem'][0]['transaction_id'];
		
		if ($data['resultPaid'][0]['fee']!=0) {
			if (isset($data['resultPaidMedItem'][0])) {
				
				//added by Mike, 20230515
				if (isset($data['resultPaid'][0]['med_fee'])&&($data['resultPaid'][0]['med_fee']==0)) {
					//echo $data['resultPaidMedItem'][0]['transaction_id'];
					if ($data['resultPaid'][0]['transaction_id']!=$data['resultPaidMedItem'][0]['transaction_id']) {
						$data['bIsMultiTransaction']=true;
					}
				}
			}

			if (isset($data['resultPaidNonMedItem'][0])) {
				//added by Mike, 20230515
				if (isset($data['resultPaid'][0]['pas_fee'])&&($data['resultPaid'][0]['pas_fee']==0)) {
					if ($data['resultPaid'][0]['transaction_id']!=$data['resultPaidNonMedItem'][0]['transaction_id']) {
						$data['bIsMultiTransaction']=true;
					}
				}
			}

			if (isset($data['resultPaidSnackItem'][0])) {
				//added by Mike, 20230515
				if (isset($data['resultPaid'][0]['snack_fee'])&&($data['resultPaid'][0]['snack_fee']==0)) {
					if ($data['resultPaid'][0]['transaction_id']!=$data['resultPaidSnackItem'][0]['transaction_id']) {
						$data['bIsMultiTransaction']=true;
					}
				}
			}
		}
*/

		$this->load->view('viewAcknowledgmentForm', $data);		
	}


	//added by Mike, 20200411; edited by Mike, 20200615
	//edited by Mike, 20201027
//	public function viewItemNonMedicine($itemId)
	public function viewItemNonMedicine($param)
	{		
//		$data['nameParam'] = $_POST[nameParam];

		//added by Mike, 20201027
		if (isset($param['itemId'])) {
			$itemId=$param['itemId'];
			$data['addedVAT']=$param['addedVAT']; //TRUE
		}
		else {
			$itemId=$param;			
		}
		
		//added by Mike, 20201115
		if (isset($_SESSION["addedVAT"])) {
			$data['addedVAT']=$_SESSION["addedVAT"]; //TRUE			
		}
	
		//edited by Mike, 20201027
		$data['noVAT'] = false;		
		//removed by Mike, 20201115
//		$this->session->set_userdata('noVAT', False);

//		if (isset($param['noVAT'])) {
		if (isset($param['outputTransaction']) and ($param['outputTransaction']=="noVAT")) {
//			$data['noVAT']=$param['noVAT'];	
			$data['noVAT']=$param['outputTransaction'];				
			
			//added by Mike, 20201115
			$data['noVAT'] = True;
			$this->session->set_userdata('noVAT', True);
		}
		//added by Mike, 20201115
		else {
			if (isset($_SESSION["noVAT"]) and ($_SESSION["noVAT"]==True)) {
				$data['noVAT'] = True;		
				$this->session->set_userdata('noVAT', True);
			}			
		}
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		//$itemTypeId = 1; //1 = Medicine
		//edited by Mike, 20200615
		$itemTypeId = 2; //2 = Non-medicine
		$data['itemTypeId'] = $itemTypeId;
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
				
		//added by Mike, 20200406; removed by Mike, 20220720
//		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
						
		//added by Mike, 20200406; edited by Mike, 20200407
		//edited by Mike, 20210110
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($data['result']);
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($data);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];
		
		
		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getNonMedicineDetailsListViaId($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);
		
		$data['resultItem'] = $this->getResultItemQuantity($data);
		
		//edited by Mike, 20200608
		//$data['itemName'] = $data['resultItem'][0]['item_name'];
		$data['itemName'] = $data['result'][0]['item_name'];	

/*		
		foreach ($data['resultItem'] as $value) {
			echo "dito".$value['resultQuantityInStockNow']."<br/>";
			echo "dito".$value['quantity_in_stock']."<br/>";
		}
*/
		$this->load->view('viewItemNonMedicine', $data);
	}

	//added by Mike, 20200411; edited by Mike, 20200615
	//edited by Mike, 20201027
//	public function viewItemNonMedicine($itemId)
	public function viewItemNonMedicineWithItemPurchasedHistory($param)
	{		
//		$data['nameParam'] = $_POST[nameParam];

		//added by Mike, 20201027
		if (isset($param['itemId'])) {
			$itemId=$param['itemId'];
			$data['addedVAT']=$param['addedVAT']; //TRUE
		}
		else {
			$itemId=$param;			
		}
		
		//added by Mike, 20201115
		if (isset($_SESSION["addedVAT"])) {
			$data['addedVAT']=$_SESSION["addedVAT"]; //TRUE			
		}
	
		//edited by Mike, 20201027
		$data['noVAT'] = false;		
		//removed by Mike, 20201115
//		$this->session->set_userdata('noVAT', False);

//		if (isset($param['noVAT'])) {
		if (isset($param['outputTransaction']) and ($param['outputTransaction']=="noVAT")) {
//			$data['noVAT']=$param['noVAT'];	
			$data['noVAT']=$param['outputTransaction'];				
			
			//added by Mike, 20201115
			$data['noVAT'] = True;
			$this->session->set_userdata('noVAT', True);
		}
		//added by Mike, 20201115
		else {
			if (isset($_SESSION["noVAT"]) and ($_SESSION["noVAT"]==True)) {
				$data['noVAT'] = True;		
				$this->session->set_userdata('noVAT', True);
			}			
		}
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		//$itemTypeId = 1; //1 = Medicine
		//edited by Mike, 20200615
		$itemTypeId = 2; //2 = Non-medicine
		$data['itemTypeId'] = $itemTypeId;
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
				
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
						
		//added by Mike, 20200406; edited by Mike, 20200407
		//edited by Mike, 20210110
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($data['result']);
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($data);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];
		
		
		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getNonMedicineDetailsListViaId($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);
		
		$data['resultItem'] = $this->getResultItemQuantity($data);
		
		//edited by Mike, 20200608
		//$data['itemName'] = $data['resultItem'][0]['item_name'];
		$data['itemName'] = $data['result'][0]['item_name'];	

/*		
		foreach ($data['resultItem'] as $value) {
			echo "dito".$value['resultQuantityInStockNow']."<br/>";
			echo "dito".$value['quantity_in_stock']."<br/>";
		}
*/
		$this->load->view('viewItemNonMedicineWithItemPurchasedHistory', $data);
	}


	//added by Mike, 20201104; edited by Mike, 20220625
	public function viewItemSnackWithItemPurchasedHistory($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 3; //3 = snack//1 = Medicine
		$data['itemTypeId'] = $itemTypeId; //added by Mike, 20200615

		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
		
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
			
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];
		
		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);
		$data['resultItem'] = $this->getResultItemQuantity($data);
		
		//edited by Mike, 20200608
		//$data['itemName'] = $data['resultItem'][0]['item_name'];
		$data['itemName'] = $data['result'][0]['item_name'];
		

/*		
		foreach ($data['resultItem'] as $value) {
			echo "dito".$value['resultQuantityInStockNow']."<br/>";
			echo "dito".$value['quantity_in_stock']."<br/>";
		}
*/

		//edited by Mike, 20230128
		//$this->load->view('viewItemSnack', $data);
		$this->load->view('viewItemSnackWithItemPurchasedHistory', $data);
	}


	//added by Mike, 20201104
	public function viewItemSnack($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 3; //3 = snack//1 = Medicine
		$data['itemTypeId'] = $itemTypeId; //added by Mike, 20200615

		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
		
		//added by Mike, 20200406; removed by Mike, 20220625
		//TO-DO: -update: computer instructions to speed-up this up in viewItemSnackWithItemPurchasedHistory(...)
		//$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

			//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
			
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];
		
/* //removed by Mike, 20230128		
		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);
		$data['resultItem'] = $this->getResultItemQuantity($data);
*/
		
		//edited by Mike, 20200608
		//$data['itemName'] = $data['resultItem'][0]['item_name'];
		$data['itemName'] = $data['result'][0]['item_name'];
		

/*		
		foreach ($data['resultItem'] as $value) {
			echo "dito".$value['resultQuantityInStockNow']."<br/>";
			echo "dito".$value['quantity_in_stock']."<br/>";
		}
*/
		$this->load->view('viewItemSnack', $data);
	}
	
	//added by Mike, 20200411; edited by Mike, 20200615
	public function viewItemNonMedicinePrev($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 2;
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);
		
		//edited by Mike, 20200519
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
	
		$this->load->view('viewItemNonMedicine', $data);
	}

	//added by Mike, 20200411; edited by Mike, 20200517
	public function addTransactionServicePurchase($medicalDoctorId, $patientId, $professionalFee, $xRayFee, $labFee, $classification, $notes)
	{		
		$data['medicalDoctorId'] = $medicalDoctorId;
		$data['patientId'] = $patientId;
		$data['professionalFee'] = $professionalFee;
		$data['xRayFee'] = $xRayFee;
		$data['labFee'] = $labFee;
		$data['classification'] = $classification;

		//edited by Mike, 20200620
		//note: "U" is capital letter
		$notes = str_replace("U003B", ";", $notes); //semicolon
		$notes = str_replace("U002C", ",", $notes); //comma
		$notes = urldecode($notes); //%20 = space, etc		
		
		//added by Mike, 20230110
		//echo $notes;
		//notes: "DISCOUNTE" occurred and have not yet been corrected 8 times; oldest to be @2021-01-21; DB began: 2020-03-24
		//adds: "DISCOUNT" did not exist;
		//adds: technique exists to auto-update spelling error
		//example: via Levenshtein Distance;
		//reference: https://github.com/usbong/SLHCC/blob/e93bda14d0b3f63e6d7eab28f734d228d4d09137/Master%20List/generateDoctorReferralPTTreatmentReportFromMasterList/java/linux/software/generateDoctorReferralPTTreatmentSummaryReportOfTheTotalOfAllInputFilesFromMasterList.java;
		//last accessed: 20230110
		
//		echo ">".$notes;
		
		$notes = str_replace("DISCOUNTE","DISCOUNTED",$notes);
		
		//added by Mike, 20230517
		//notes "DISCOUNTEDD" causes error; not replaced
//		$notes = str_replace("DISCOUNTEDD","DISCOUNTED",$notes);
		$notes = str_replace("COUNTEDD","COUNTED",$notes);

//		echo ">>".$notes;
			
		$data['notes'] = $notes."; "."UNPAID";
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');

		//added by Mike, 20201122
		if (isset($_SESSION["addedVAT"])) {
			$data['addedVAT']=$_SESSION["addedVAT"];
			if (isset($data['addedVAT']) and ($data['addedVAT'])) {				
				$data['outputTransaction'] = $this->Browse_Model->lessVATBeforePayTransactionItemPurchase($patientId);

				//execute these due to select patients classified as SC, i.e. "Senior Citizens"
				$this->session->unset_userdata('addedVAT');
				$data['addedVAT'] = False;		
			}
		}
		
		//edited by Mike, 20201105
		$this->Browse_Model->addTransactionServicePurchase($data);
		//echo $this->Browse_Model->addTransactionServicePurchase($data);


		//edited by Mike, 20200407
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);

/* //removed by Mike, 20230309
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);
*/
		//added by Mike, 202005019;
		//TO-DO: reverify: use $patientId instead of join command
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

/*		//removed by Mike, 20230304
		//added by Mike, 20230304
		$data['cartListResult'][0]['patientId'] = $this->Browse_Model->getDetailsListViaId($patientId);	
		////$data['cartListResult'][0]['patientId']
*/	
		//edited by Mike, 20200519
		$this->load->view('viewPatient', $data);
/*		
		$this->load->view('viewPatientPaidReceipt', $data);
*/		
	}
	
	public function addNewTransactionForPatient($patientId, $medicalDoctorId)
	{		
		$data['patientId'] = $patientId;
		$data['medicalDoctorId'] = $medicalDoctorId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
		$this->load->model('Report_Model');

		$this->Browse_Model->addNewTransactionForPatient($data);
		
		//edited by Mike, 20201128
//		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay(0);

		//edited by Mike, 20200601
		//this is so that we do not add excess transactions
		//$this->load->view('viewReportPatientQueue', $data);
		redirect('report/viewReportPatientQueue');
	
	}

	//added by Mike, 20200826
	public function addNewTransactionForPatientAccounting($patientId, $medicalDoctorId)
	{		
		$data['patientId'] = $patientId;
		$data['medicalDoctorId'] = $medicalDoctorId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
				
		$this->load->model('Browse_Model');
		$this->load->model('Report_Model');

		$this->Browse_Model->addNewTransactionForPatient($data);

		//edited by Mike, 20201128
//		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay(1);

		//note: IF a patient first bought an item, e.g. face shield, 
		//AND the Info Desk Unit added the patient in the wait list
		//AND a Unit member from Info Desk or Accounting Unit deletes the patient,
		//all transactions with the patient_id for the day are deleted from the database 
		//the purchased item is not deleted
		//TO-DO: -update: this

		//edited by Mike, 20200601
		//this is so that we do not add excess transactions
		//$this->load->view('viewReportPatientQueue', $data);
		redirect('report/viewReportPatientQueueAccounting');
	
	}
	//added by Mike, 20200529
	public function addPatientNameInformationDesk()
	{
		$data['patientLastNameParam'] = $_POST['patientLastNameParam'];
		$data['patientFirstNameParam'] = $_POST['patientFirstNameParam'];

		//TO-DO: -update: this
		//$data['medicalDoctorIdParam'] = $_POST['medicalDoctorIdParam'];
		//edited by Mike, 20201013
		//$data['medicalDoctorIdParam'] = 1; //SYSON, PEDRO (DEFAULT)
		$data['medicalDoctorIdParam'] = 0; //ANY (DEFAULT)
				
		if (!isset($data['patientLastNameParam'])) {
			redirect('report/viewReportPatientQueue'); //edited by Mike, 20200826
		}

		if (!isset($data['patientFirstNameParam'])) {
			redirect('report/viewReportPatientQueue'); //edited by Mike, 20200826
		}

		$data['nameParam'] = $data['patientLastNameParam'].", ".$data['patientFirstNameParam'];
		$data['nameParam'] = strtoupper($data['nameParam']);
						
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
		$patientId = $this->Browse_Model->addPatientName($data);
		
//		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
/*		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
		$this->load->view('searchPatientInformationDesk', $data);	
*/

		$this->addNewTransactionForPatient($patientId, $data['medicalDoctorIdParam']);

	}

	//added by Mike, 20200826
	public function addPatientNameAccounting()
	{
		$data['patientLastNameParam'] = $_POST['patientLastNameParam'];
		$data['patientFirstNameParam'] = $_POST['patientFirstNameParam'];

		//TO-DO: -update: this
		//$data['medicalDoctorIdParam'] = $_POST['medicalDoctorIdParam'];
		//added by Mike, 20201013
		//$data['medicalDoctorIdParam'] = 1; //SYSON, PEDRO (DEFAULT)
		$data['medicalDoctorIdParam'] = 0; //ANY (DEFAULT)
				
		if (!isset($data['patientLastNameParam'])) {
			redirect('report/viewReportPatientQueueAccounting');
		}

		if (!isset($data['patientFirstNameParam'])) {
			redirect('report/viewReportPatientQueueAccounting');
		}

		$data['nameParam'] = $data['patientLastNameParam'].", ".$data['patientFirstNameParam'];
		$data['nameParam'] = strtoupper($data['nameParam']);
						
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
		$patientId = $this->Browse_Model->addPatientName($data);
		
//		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
/*		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
		$this->load->view('searchPatientInformationDesk', $data);	
*/

		$this->addNewTransactionForPatientAccounting($patientId, $data['medicalDoctorIdParam']);

	}
	
	//added by Mike, 20200529
	public function addPatientName()
	{
		$data['patientLastNameParam'] = $_POST['patientLastNameParam'];
		$data['patientFirstNameParam'] = $_POST['patientFirstNameParam'];
				
		if (!isset($data['patientLastNameParam'])) {
			redirect('browse/searchMedicine');
		}

		if (!isset($data['patientFirstNameParam'])) {
			redirect('browse/searchMedicine');
		}

/* //edited by Mike, 20230328
		//edited by Mike, 20210813
		$data['nameParam'] = trim($data['patientLastNameParam']).", ".trim($data['patientFirstNameParam']);
		$data['nameParam'] = strtoupper($data['nameParam']);
*/
		//notes: update inside BROWSE_MODEL.php
		$data['nameParam'] = $data['patientLastNameParam'].", ".$data['patientFirstNameParam'];
		$data['nameParam'] = strtoupper($data['nameParam']);
						
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
		$patientId = $this->Browse_Model->addPatientName($data);
		
//		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);

		$this->load->view('searchPatient', $data);	
	}

	//added by Mike, 20210209
	public function addPatientNameLabUnit()
	{
		$data['patientLastNameParam'] = $_POST['patientLastNameParam'];
		$data['patientFirstNameParam'] = $_POST['patientFirstNameParam'];

/*	//removed by Mike, 20210209
		if (!isset($data['patientLastNameParam'])) {
			redirect('browse/searchMedicine');
		}

		if (!isset($data['patientFirstNameParam'])) {
			redirect('browse/searchMedicine');
		}
*/

		$data['nameParam'] = $data['patientLastNameParam'].", ".$data['patientFirstNameParam'];
		$data['nameParam'] = strtoupper($data['nameParam']);
						
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
		$patientId = $this->Browse_Model->addPatientName($data);
		
	
//		$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);

		$this->load->view('searchPatientLabUnit', $data);	
	}

	
	//added by Mike, 20200411; edited by Mike, 20200414
//	public function addTransactionItemPurchase($itemId,$quantity)
//	public function addTransactionItemPurchase($itemTypeId, $itemId, $quantity)
	//edited by Mike, 20201115
//	public function addTransactionItemPurchase($itemTypeId, $itemId, $quantity, $fee)
	public function addTransactionItemPurchase($itemTypeId, $itemId, $quantity, $fee, $plusVATId)
	{
/*
		$data['nameParam'] = $_POST[nameParam];
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchMedicine');
		}
*/		
/*
		echo itemId: .$itemId;
		echo quantity: .$quantity;
*/		
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		$data['quantity'] = $quantity;
		$data['fee'] = $fee;

		//added by Mike, 20201115
		if ($plusVATId==1) {
			$data['addedVAT'] = True;
			$this->session->set_userdata('addedVAT', True);
		}
		else {
			//edited by Mike, 20201115
			if (isset($_SESSION["addedVAT"])) {
				$data['addedVAT'] = True;
			}
			else {
				$data['addedVAT'] = False;
				$this->session->unset_userdata('addedVAT');
			}
		}
						
		//added by Mike, 202011115
		if (isset($_SESSION["noVAT"]) and ($_SESSION["noVAT"]==True)) {
			$data['noVAT'] = True;		
			$this->session->set_userdata('noVAT', True);
		}
		else {
			$data['noVAT'] = false;		
			$this->session->set_userdata('noVAT', False);
		}
												
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);
//		$data['transactionId'] = $this->Browse_Model->addTransactionMedicinePurchase($data);

		$this->Browse_Model->addTransactionItemPurchase($data);
		
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

/* //removed by Mike, 20230309
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);
*/

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);
		
		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();

		//added by Mike, 20230228
		//note: getServiceAndItemDetailsListViaNotesUnpaid OK,
		//--> due to:$this->db->where('t2.transaction_date', date('m/d/Y'));
		
		//added by Mike, 20230309
		//TO-DO: -verify: adding patient table to get patient name via JOIN COMMAND only IF  patient has already been added in the CART
		//objective: system speed-up,
		//via eliminate excess JOIN COMMANDS
		
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

/*		//removed by Mike, 20230304
		//added by Mike, 20230304
		$data['cartListResult'][0]['patientId'] = $this->Browse_Model->getDetailsListViaId($data['cartListResult'][0]['patientId']);
*/

		//added by Mike, 20230228
		//note: getItemAvailableQuantityInStock OK,
		//--> due to: $this->db->where('t2.transaction_date =', strtoupper(date("m/d/Y")));

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
		
		//TO-DO: -reverify: remaining DB COMMANDS,
		//--> that cause noticeable DELAY in execution
		
		//TO-DO: -update this
		//$this->load->view('viewItemNonMedicine', $data);

		//added by Mike, 20200501; edited by Mike, 20200603
		//edited by Mike, 20210110
//		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);		
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);
		$data['resultItem'] = $this->getResultItemQuantity($data);

		if ($itemTypeId=="1") {
			$this->load->view('viewItemMedicine', $data);
		}
		//added by Mike, 20201104
		else if ($itemTypeId=="3") {
			$this->load->view('viewItemSnack', $data);
		}	
		else { //example: 2
			//edited by Mike, 20201115
			$this->load->view('viewItemNonMedicine', $data);
/*
			if ($plusVATId==1) {
				$this->load->view('viewItemNonMedicine', $data);
			}
			else {
				$data['addedVAT'] = False;
				if (isset($_SESSION["addedVAT"])) {
					$this->session->unset_userdata('addedVAT');
				}

				//note: needs $patientId
				$this->lessVATBeforePayTransactionItemPurchase(2,

				window.location.href = "<?php echo site_url('browse/lessVATBeforePayTransactionItemPurchase/2/"+itemId+"/"+patientId+"');?>";			
			}
*/
		}
	}

	//added by Mike, 20200517; edited by Mike, 20200616
	public function deleteTransactionServicePurchase($medicalDoctorId, $patientId, $transactionId)
	{
		$data['medicalDoctorId'] = $medicalDoctorId;
		$data['patientId'] = $patientId;
		$data['transactionId'] = $transactionId;

		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');

		$this->load->model('Browse_Model');

		//added by Mike, 20201115
		//note: when we delete patient transaction in Cart List,
		//computer auto-removes all added VAT
		if (isset($_SESSION["addedVAT"])) {
			$data['addedVAT']=$_SESSION["addedVAT"];
			if (isset($data['addedVAT']) and ($data['addedVAT'])) {
				//edited by Mike, 20210226
				
				$data['outputTransaction'] = $this->Browse_Model->lessVATBeforePayTransactionItemPurchase($patientId);

				//execute these due to select patients classified as SC, i.e. "Senior Citizens"
				$this->session->unset_userdata('addedVAT');
				$data['addedVAT'] = False;		
			}
		}
				
		//added by Mike, 20201115
		$this->session->unset_userdata('noVAT');
		$data['noVAT'] = False;

/*		//removed by Mike, 20201122
		//execute these due to select patients classified as SC, i.e. "Senior Citizens"
		$this->session->unset_userdata('addedVAT');
		$data['addedVAT'] = False;		
*/	
		

/*		//removed by Mike, 20201122
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		$this->load->model('Browse_Model');

		//added by Mike, 20201115
		//lessVATBeforePayTransactionItemPurchase($itemTypeId, $itemId, $patientId)		
		$data['outputTransaction'] = $this->Browse_Model->lessVATBeforePayTransactionItemPurchase($patientId);
*/
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);


		//added by Mike, 20230408
		$data['transactionDate'] = $data['transactionDate']."DEL";

		$data['patientIdParam'] = $data['patientId'];
		//TO-DO: -update: medicalDoctorId; due to transaction deleted;
		$data['selectMedicalDoctorIdParam'] = $data['medicalDoctorId'];
		$this->Browse_Model->updateIndexCardFormLite($data);

		$this->Browse_Model->deleteTransactionServicePurchase($data);

		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);

/* //removed by Mike, 20230309		
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);
*/

		//added by Mike, 202005[19]
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

/*		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);
		//added by Mike, 20200501
		$data['resultItem'] = $this->getResultItemQuantity($data);
		if ($itemTypeId==1) {
			$this->load->view('viewItemMedicine', $data);
		}
		else {
			$this->load->view('viewItemNonMedicine', $data);
		}
*/
		$this->load->view('viewPatient', $data);		
		//added by Mike, 20201224
		//note: when Unit member deletes patient transactions from Cart List
		//AND deletes an item, e.g. non-medicine, computer automatically goes
		//to the patient page with patient name, "CANCELLED",
		//so that Unit member can view remaining items in Cart List
		//additional note: multiple items may already exist in the Cart List
	}
	

	//added by Mike, 20200411
	public function deleteTransactionItemPurchase($itemTypeId, $itemId, $transactionId)
	{
/*
		echo itemId: .$itemId;
*/		
		$data['itemTypeId'] = $itemTypeId; //added by Mike, 20200616
		$data['itemId'] = $itemId;
		$data['transactionId'] = $transactionId;
	

		//edited by Mike, 20201115
//		if (isset($_SESSION["addedVAT"])) {
		if (isset($_SESSION["addedVAT"]) and ($_SESSION["addedVAT"]==True)) {
			$data['addedVAT'] = True;
		}
		//added by Mike, 20201115
		else {
			$data['addedVAT'] = False;
			$this->session->unset_userdata('addedVAT');
		}
	
		//edited by Mike, 20201115
		if (isset($_SESSION["noVAT"]) and ($_SESSION["noVAT"]==True)) {
			$data['noVAT'] = True;		
		}
		else {
			$data['noVAT'] = False;		
			$this->session->unset_userdata('noVAT');
		}

		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		$this->Browse_Model->deleteTransactionItemPurchase($data);
		
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId,$itemId);

/* //removed by Mike, 20230309
		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);
*/

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200603
		//edited by Mike, 20210110
		//$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);		
		$data['resultItem'] = $this->Browse_Model->getItemDetailsListViaId($data);		

		$data['resultItem'] = $this->getResultItemQuantity($data);

		if ($itemTypeId==1) {
			$this->load->view('viewItemMedicine', $data);
		}
		//added by Mike, 20201104
		else if ($itemTypeId==3) {
			$this->load->view('viewItemSnack', $data);
		}
		else {
			$this->load->view('viewItemNonMedicine', $data);
		}
	}

	//added by Mike, 20200626
	public function deleteTransactionItemPurchaseAllInCart($itemTypeId, $itemId, $transactionId)
	{
/*
		echo itemId: .$itemId;
*/		
		$data['itemTypeId'] = $itemTypeId; //added by Mike, 20200616
		$data['itemId'] = $itemId;
		$data['transactionId'] = $transactionId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		$this->Browse_Model->deleteTransactionItemPurchaseAllInCart($data);
		
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId,$itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200603
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);		
		$data['resultItem'] = $this->getResultItemQuantity($data);

		if ($itemTypeId==1) {
			$this->load->view('viewItemMedicine', $data);
		}
		else {
			$this->load->view('viewItemNonMedicine', $data);
		}
	}
	
	//added by Mike, 20200530	
	public function deleteTransactionFromPatient($transactionId)
	{
		$data['transactionId'] = $transactionId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
		$this->load->model('Report_Model');
	
		$this->Browse_Model->deleteTransactionFromPatient($data);

		//edited by Mike, 20201128
//		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay(0);

//added by Mike, 20210121
		//-----		
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
		//-----

		$this->load->view('viewReportPatientQueue', $data);
	}

	//added by Mike, 20200826
	public function deleteTransactionFromPatientAccounting($transactionId)
	{
		$data['transactionId'] = $transactionId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
		$this->load->model('Report_Model');
	
		$this->Browse_Model->deleteTransactionFromPatient($data);
		
		//edited by Mike, 20201128
//		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay(1);

		//added by Mike, 20210121
		//-----		
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
		//-----

		$this->load->view('viewReportPatientQueueAccounting', $data);
	}

	//added by Mike, 20201026; edited by Mike, 20201027
	public function addVATBeforePayTransactionItemPurchase($itemTypeId, $itemId, $patientId)
	{
/*		//removed by Mike, 20201114
		//added by Mike, 20201027
		$data['addedVAT'] = True;
		
		//added by Mike, 20201115
		$this->session->set_userdata('addedVAT', True);
*/
				
/*
		echo itemId: .$itemId;
*/		
		$data['itemId'] = $itemId;
//		$data['transactionId'] = $transactionId;
		
		//added by Mike, 20200616
		$data['itemTypeId'] = $itemTypeId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		//edited by Mike, 20200605
		//$this->Browse_Model->payTransactionItemPurchase();
		//$this->Browse_Model->payTransactionServiceAndItemPurchase();
		//edited by Mike, 20200608
		//$outputTransactionId = $this->Browse_Model->payTransactionItemPurchase();

		//note: non-medicine item only			
		$data['outputTransaction'] = $this->Browse_Model->addVATBeforePayTransactionItemPurchase($patientId);
		
		if ($data['outputTransaction']==null) {
			$data['addedVAT']=False;
			//added by Mike, 20201115
			$this->session->unset_userdata('addedVAT');			

			//added by Mike, 20201115
			$data['noVAT']=False;
			$this->session->unset_userdata('noVAT');			
		}
		//added by Mike, 20201115		
		else {
			$data['addedVAT'] = True;			
			$this->session->set_userdata('addedVAT', True);

			//added by Mike, 20201115
			$data['noVAT']=False;
			$this->session->unset_userdata('noVAT');
		}

		
/*		//removed by Mike, 20201027
		$data['noVAT']=False;
		if ($data['outputTransaction']=="noVAT") {
			$data['noVAT']=True;
		}
*/		
		//edited by Mike, 20201027
//		$this->viewItemNonMedicine($itemId);
		$this->viewItemNonMedicine($data);
	}		

	//added by Mike, 20201026; edited by Mike, 20201027
	public function lessVATBeforePayTransactionItemPurchase($itemTypeId, $itemId, $patientId)
	{
		//added by Mike, 20201027
		$data['addedVAT'] = False;

		//added by Mike, 20201115
		if (isset($_SESSION["addedVAT"])) {
			//$data['addedVAT']=False; //$_SESSION["addedVAT"]; //TRUE			
			$this->session->unset_userdata('addedVAT');
		}

		//added by Mike, 202011115
		if (isset($_SESSION["noVAT"]) and ($_SESSION["noVAT"]==True)) {
			$data['noVAT'] = True;		
			$this->session->set_userdata('noVAT', True);
		}
		else {
			$data['noVAT'] = false;		
			$this->session->set_userdata('noVAT', False);
		}

				
/*
		echo itemId: .$itemId;
*/		
		$data['itemId'] = $itemId;
//		$data['transactionId'] = $transactionId;
		
		//added by Mike, 20200616
		$data['itemTypeId'] = $itemTypeId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		//edited by Mike, 20200605
		//$this->Browse_Model->payTransactionItemPurchase();
		//$this->Browse_Model->payTransactionServiceAndItemPurchase();
		//edited by Mike, 20200608
		//$outputTransactionId = $this->Browse_Model->payTransactionItemPurchase();

		//note: non-medicine item only
		//edited by Mike, 20201027
/*			
		$data['outputTransaction'] = $this->Browse_Model->addVATBeforePayTransactionItemPurchase($patientId);
*/		
		$data['outputTransaction'] = $this->Browse_Model->lessVATBeforePayTransactionItemPurchase($patientId);

		//edited by Mike, 20201115
/*		
		if ($data['outputTransaction']==null) {
			$data['addedVAT']=False;
		}
*/
		//removed by Mike, 20201115
/*
		if ($data['outputTransaction']==null) {
			$data['addedVAT']=False;
			//added by Mike, 20201115
			$this->session->unset_userdata('addedVAT');			

			//added by Mike, 20201115
			$data['noVAT']=False;
			$this->session->unset_userdata('noVAT');			
		}
		//added by Mike, 20201115		
		else {
//			$data['addedVAT'] = True;			
//			$this->session->set_userdata('addedVAT', True);

			//added by Mike, 20201115
			$data['noVAT']=False;
			$this->session->unset_userdata('noVAT');
		}
*/

/*		//removed by Mike, 20201027
		$data['noVAT']=False;
		if ($data['outputTransaction']=="noVAT") {
			$data['noVAT']=True;
		}
*/

		//edited by Mike, 20201027
//		$this->viewItemNonMedicine($itemId);
		$this->viewItemNonMedicine($data);
	}		
		
	//added by Mike, 20200411; edited by Mike, 20201210
//	public function payTransactionItemPurchase($itemTypeId, $itemId, $patientId)
	public function payTransactionItemPurchase($itemTypeId, $itemId, $patientId, $medicalDoctorId)
	{
/*
		echo itemId: .$itemId;
*/		
		$data['itemId'] = $itemId;
//		$data['transactionId'] = $transactionId;
		
		//added by Mike, 20200616
		$data['itemTypeId'] = $itemTypeId;
		
		//added by Mike, 20201210
		$data['medicalDoctorId'] = $medicalDoctorId;
		$data['patientId'] = $patientId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		//edited by Mike, 20200605
		//$this->Browse_Model->payTransactionItemPurchase();
		//$this->Browse_Model->payTransactionServiceAndItemPurchase();
		//edited by Mike, 20200608
		//$outputTransactionId = $this->Browse_Model->payTransactionItemPurchase();

		$data['outputTransaction'] = $this->Browse_Model->payTransactionItemPurchase($patientId);
		$outputTransactionId = $data['outputTransaction']['transaction_id'];

		//edited by Mike, 20200608
		//$data['outputTransaction'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($outputTransactionId);

		$data['outputTransactionId'] = $outputTransactionId;
		$data['patientId'] = $patientId;
		//edited by Mike, 20200608
		//$data['outputTransaction'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($data);
		$data['outputTransactionServicePurchase'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($data);
		if (isset($data['outputTransactionServicePurchase'])) {
			$data['outputTransaction'] = $data['outputTransactionServicePurchase'];
		}
		
		//added by Mike, 20200607
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		//$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);
						
		//$medicalDoctorId = $data['result'][0]['medical_doctor_id'];
		$data['medicalDoctorId'] = $data['outputTransaction']['medical_doctor_id']; //$data['result'][0]['medical_doctor_id'];		
		
		if ($data['medicalDoctorId']=="") {
			$data['medicalDoctorId'] = 1; //default value, i.e. SYSON, PEDRO
		}
		//--	

//edited by Mike, 20230201

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

/* //TO-DO: -update: this
$data['outputTransaction']['item_price'] = $data['result'][0]['item_price'];
$data['outputTransaction']['item_name'] = $data['result'][0]['item_name'];
$data['outputTransaction']['item_id'] = $data['result'][0]['item_id'];

		//$data['resultPaid'] = $data['outputTransaction'];
		$data['resultPaid']=[];
		array_push($data['resultPaid'], $data['outputTransaction']);
		
		$data['addedDatetimeStamp'] = $data['outputTransaction']['added_datetime_stamp'];
*/		
		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);

		//added by Mike, 20200501; edited by Mike, 20200603
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);			
		$data['resultItem'] = $this->getResultItemQuantity($data);

		//added by Mike, 20210227
		//execute these due to only select patients classified as SC, i.e. "Senior Citizens"
		//-----
		$this->session->unset_userdata('addedVAT');
		$data['addedVAT'] = False;		
		$this->session->unset_userdata('noVAT');
		$data['noVAT'] = False;		
		//-----

		//edited by Mike, 20200508; edited by Mike, 20200509
		if ($itemTypeId==1) {
//			$this->load->view('viewItemMedicine', $data);
			$this->load->view('viewItemMedicinePaidReceipt', $data);
		}
		//added by Mike, 20201104
		else if ($itemTypeId==3) {
			$this->load->view('viewItemSnackPaidReceipt', $data);
		}
		else {
//			$this->load->view('viewItemNonMedicine', $data);
			$this->load->view('viewItemNonMedicinePaidReceipt', $data);
		}
	}		

	//added by Mike, 20200519
	public function payTransactionServiceAndItemPurchase($medicalDoctorId, $patientId)
	{
		$data['medicalDoctorId'] = $medicalDoctorId;
		$data['patientId'] = $patientId;
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');

		//added by Mike, 20230406; edited by Mike, 20230407
		$data['patientIdParam'] = $data['patientId'];
		$data['selectMedicalDoctorIdParam'] = $data['medicalDoctorId'];	
		$this->Browse_Model->updateIndexCardFormLite($data);

		//edited by Mike, 20200605
		//$this->Browse_Model->payTransactionItemPurchase();
		//$this->Browse_Model->payTransactionServiceAndItemPurchase();
		
		//removed by Mike, 20200609
		//$outputTransactionId = $this->Browse_Model->payTransactionItemPurchase();
		
		//edited by Mike, 20200606
		//$this->Browse_Model->payTransactionServiceAndItemPurchase($outputTransactionId);
		
		//edited by Mike, 20200608
		//$data['outputTransaction'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($outputTransactionId);
		
		//edited by Mike, 20200917
		//$data['outputTransaction'] = $this->Browse_Model->payTransactionItemPurchase();
		$data['outputTransaction'] = $this->Browse_Model->payTransactionItemPurchase($patientId);

		$outputTransactionId = $data['outputTransaction']['transaction_id'];

		$data['outputTransactionId'] = $outputTransactionId;
		$data['patientId'] = $patientId;
		//edited by Mike, 20200608
		//$data['outputTransaction'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($data);
		$data['outputTransactionServicePurchase'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($data);
		if (isset($data['outputTransactionServicePurchase'])) {
			$data['outputTransaction'] = $data['outputTransactionServicePurchase'];
		}
	
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
			
		//removed by Mike, 20210904
		//$medicalDoctorId = $data['result'][0]['medical_doctor_id'];

		//edited by Mike, 20230127
		//$data['resultPaid'] = $data['outputTransaction'];
		$data['resultPaid']=[];
		array_push($data['resultPaid'], $data['outputTransaction']);
		
		$data['addedDatetimeStamp'] = $data['outputTransaction']['added_datetime_stamp'];
		
/* //removed by Mike, 20230127		
//TO-DO: -add: paid for the day only

		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);
*/
		//added by Mike, 20200905
		//TO-DO: -add: get transaction with combined payments
		//to identify if computer needs to show MOSC OR textbox field
		//use med_fee, x_ray_fee, lab_fee

/* //removed by Mike, 20230127
		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
*/

		//added by Mike, 20210227
		//execute these due to only select patients classified as SC, i.e. "Senior Citizens"
		//-----
		$this->session->unset_userdata('addedVAT');
		$data['addedVAT'] = False;		
		$this->session->unset_userdata('noVAT');
		$data['noVAT'] = False;		
		//-----

		//added by Mike, 20210626
/* /removed by Mike, 20210626		
		//auto-generate Acknowledgment Form
//		$data['outputTransaction']
		echo "<script>
				window.open('".site_url()."/report/viewAcknowledgmentForm/".$data['outputTransaction']."/".$medicalDoctorId."/".$patientId');
			  </script>";
*/			  

		$this->load->view('viewPatientPaidReceipt', $data);
	}		

	//added by Mike, 20210830
	//TO-DO: -update: this
	//-add: execute this function when in Acknowledgment Form, link clicked
	public function setOfficialReceiptTransactionServiceAndItemPurchase($medicalDoctorId, $patientId, $transactionId, $isMultiAdded)
	{
		$data['medicalDoctorId'] = $medicalDoctorId;
		$data['patientId'] = $patientId;
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		//edited by Mike, 20210901
//		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');

		//TO-DO: -update: this for cases with multiple transaction id's
		//example: non-med item purchase as another transaction
		//after consultation service purchase transaction
		//edited by Mike, 20210901
		$data['outputTransaction'] = $this->Browse_Model->getTransactionPurchaseDetails($transactionId);
		$data['transactionDate'] = $data['outputTransaction']['transaction_date'];

/*		//TO-DO: -update: this; viewPatientPaidReceipt submit action uses only 1 transactionId
		$data['outputTransactionSet'] = $this->Browse_Model->getTransactionPurchaseDetails($transactionId);

		$data['transactionDate'] = $data['outputTransactionSet'][0]['transaction_date'];
*/
	
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
						
		$medicalDoctorId = $data['result'][0]['medical_doctor_id'];

		//edited by Mike, 20230127
/*		
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);
*/
		//$data['resultPaid'] = $data['outputTransaction'];
		$data['resultPaid']=[];
		array_push($data['resultPaid'], $data['outputTransaction']);
		
		$data['addedDatetimeStamp'] = $data['outputTransaction']['added_datetime_stamp'];

		$data['outputTransactionId'] =$data['outputTransaction']['transaction_id'];

		
/*		//added by Mike, 20210904; //TO-DO: -reverify: this
		$data['resultPaidNonMedItem'] = $this->Browse_Model->getCombinedTransactionPaidItemDetailsListForPatientForTheDay(2, $patientId, $data['transactionDate']); //2 = NON-MED ITEM		

		echo "dito".$data['resultPaidNonMedItem'][0]['transaction_id'];
*/

		//added by Mike, 20210227
		//execute these due to only select patients classified as SC, i.e. "Senior Citizens"
		//-----
		$this->session->unset_userdata('addedVAT');
		$data['addedVAT'] = False;		
		$this->session->unset_userdata('noVAT');
		$data['noVAT'] = False;		
		//-----

		//added by Mike, 20210926
		$data['isMultiAdded'] = false; //default
		$data['isMultiAdded'] = $isMultiAdded;

		$this->load->view('viewPatientPaidReceipt', $data);
	}		
	

	
	//added by Mike, 20200508; edited by Mike, 20200509
//	public function confirmItemMedicinePaidReceipt() //$transactionId, $receiptNumber)
	public function confirmItemMedicinePaidReceiptPrev($itemTypeId)
	{
		//edited by Mike, 20200509
		$data['receiptTypeId'] = $itemTypeId; //1 = MOSC Receipt; 2 = PAS Receipt
//		$data['receiptTypeId'] = 1; //1 = MOSC Receipt
//		$data['receiptNumber'] = $receiptNumber;

		$data['receiptNumber'] = $_POST["officialReceiptNumberParam"];
		$data['transactionId'] = $_POST["transactionIdParam"];

		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');

		$this->Browse_Model->addTransactionPaidReceipt($data);

		//edited by Mike, 20200509
//		$this->load->view('searchMedicine', $data);

		if ($itemTypeId=="1") {
			$this->load->view('searchMedicine', $data);
		}
		else { //example: 2
			$this->load->view('searchNonMedicine', $data);
		}		
		
	}
	
	//edited by Mike, 20200607
//	public function confirmItemMedicinePaidReceipt($medicalDoctorId) //$itemTypeId)
	public function confirmItemPaidReceiptPrev($medicalDoctorId, $itemTypeId)
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		$data['transactionDate'] = date('m/d/Y');

		$data['transactionId'] = $_POST["transactionIdParam"];

		$this->load->model('Browse_Model');

		$data['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt
		
		//edited by Mike, 20200608
		if (isset($_POST["officialReceiptNumberMOSCParam"])) {
			$data['receiptNumber'] = $_POST["officialReceiptNumberMOSCParam"];

			$this->Browse_Model->addTransactionPaidReceipt($data);
		}

		//edited by Mike, 20200608
		if (isset($_POST["officialReceiptNumberMedicalDoctorParam"])) {		
			if ($medicalDoctorId!=1) { //not SYSON, PEDRO
				$data['receiptTypeId'] = 3;


				$data['receiptNumber'] = $_POST["officialReceiptNumberMedicalDoctorParam"];

				$this->Browse_Model->addTransactionPaidReceipt($data);
			}
		}
		
		//added by Mike, 20200606; edited by Mike, 20200608
		//PAS
		if (isset($_POST["officialReceiptNumberPASParam"])) {
			$data['receiptNumber'] = $_POST["officialReceiptNumberPASParam"];
			
			if ($data['receiptNumber']!==0) {
				$data['receiptTypeId'] = 2;

				$this->Browse_Model->addTransactionPaidReceipt($data);
			}
		}

//		$this->load->view('searchMedicine', $data);

		if ($itemTypeId=="1") {
			$this->load->view('searchMedicine', $data);
		}
		else { //example: 2
			$this->load->view('searchNonMedicine', $data);
		}		
	}

	//edited by Mike, 20200610
	public function confirmItemPaidReceipt($medicalDoctorId, $itemTypeId)
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		$data['transactionDate'] = date('m/d/Y');

		$data['transactionId'] = $_POST["transactionIdParam"];
		$data['transactionQuantity'] = $_POST["transactionQuantityParam"]; //added by Mike, 20200610
		$data['medicalDoctorId'] = $medicalDoctorId; //added by Mike, 20200610
		$data['receiptNumberMOSC'] = 0;
		$data['receiptNumberMedicalDoctor'] = 0;
		$data['receiptNumberPAS'] = 0;

		if (isset($_POST["officialReceiptNumberMOSCParam"])) {
			$data['receiptNumberMOSC'] = $_POST["officialReceiptNumberMOSCParam"];			
		}

		if (isset($_POST["officialReceiptNumberMedicalDoctorParam"])) {
			$data['receiptNumberMedicalDoctor'] = $_POST["officialReceiptNumberMedicalDoctorParam"];			
		}

		if (isset($_POST["officialReceiptNumberPASParam"])) {
			$data['receiptNumberPAS'] = $_POST["officialReceiptNumberPASParam"];			
		}
		
		$this->load->model('Browse_Model');
		$this->Browse_Model->addTransactionPaidReceipt($data);

		if ($itemTypeId=="1") {
			$this->load->view('searchMedicine', $data);
		}
		//added by Mike, 20201104
		else if ($itemTypeId=="3") {
			$this->load->view('searchSnack', $data);
		}
		else { //example: 2
			$this->load->view('searchNonMedicine', $data);
		}		
	}


	//added by Mike, 20200517; edited by Mike, 20200610
	//add: receipts for each transaction using the transaction count
	public function confirmPatientPaidReceipt($medicalDoctorId)
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		//added by Mike, 20210926
		$data['isMultiAdded'] = 0;

		if (isset($_POST["isMultiAddedParam"])) {
			$data['isMultiAdded'] = $_POST["isMultiAddedParam"];
		}

		if ($data['isMultiAdded']==1) {
			$data['fee'] = $_POST["PFParam"];
			$data['x_ray_fee'] = $_POST["XrayFeeParam"];
			$data['lab_fee'] = $_POST["LabFeeParam"]; 
			$data['med_fee'] = $_POST["MedFeeParam"];
			$data['non_med_fee'] = $_POST["NonMedFeeParam"];
			$data['snack_fee'] = $_POST["SnackFeeParam"]; 
			$data['addedNote'] = $_POST["AddedNoteParam"]; //added by Mike, 20211008
		}

		//added by Mike, 20210831
		//TO-DO: -add: if transaction NOT today, add for today, 
		//but write in notes the actual transaction date
		//edited by Mike, 20210912
//		$data['transactionDate'] = date('m/d/Y');		
		//edited by Mike, 20220721
		//$data['transactionDate'] = $_POST["transactionDateParam"]; //date('m/d/Y');
		if (!isset($_POST["transactionDateParam"])) {
			redirect('browse/searchPatient');			
		}

		$data['transactionDate'] = $_POST["transactionDateParam"]; //date('m/d/Y');

		$data['transactionId'] = $_POST["transactionIdParam"];
		$data['transactionQuantity'] = $_POST["transactionQuantityParam"]; //added by Mike, 20200610
		$data['medicalDoctorId'] = $medicalDoctorId; //added by Mike, 20200610
		$data['receiptNumberMOSC'] = 0;
		$data['receiptNumberMedicalDoctor'] = 0;
		$data['receiptNumberPAS'] = 0;

		if (isset($_POST["officialReceiptNumberMOSCParam"])) {
			$data['receiptNumberMOSC'] = $_POST["officialReceiptNumberMOSCParam"];
		}

		if (isset($_POST["officialReceiptNumberMedicalDoctorParam"])) {
			$data['receiptNumberMedicalDoctor'] = $_POST["officialReceiptNumberMedicalDoctorParam"];			
		}

		if (isset($_POST["officialReceiptNumberPASParam"])) {
			$data['receiptNumberPAS'] = $_POST["officialReceiptNumberPASParam"];			
		}
				
		$this->load->model('Browse_Model');


		//edited by Mike, 20210912
//		$this->Browse_Model->addTransactionPaidReceipt($data);

		//edited by Mike, 20210926
		if ($data['isMultiAdded']) {
			//note: use with multiple transactions with varying types, 
			//e.g. snack, non-med, med, added as paid on the same date; 

//echo "dito";

			//added by Mike, 20210926
			$this->Browse_Model->addTransactionPaidReceiptOfMultiAddedTransactions($data);
		}
		else {
			if (strpos($data['transactionDate'], date('m/d/Y'))!==false) {
				$this->Browse_Model->addTransactionPaidReceipt($data);
			}
			else {
				$this->Browse_Model->addTransactionPaidReceiptForPreviousDay($data);
			}
		}
		
/*		//added by Mike, 20210904; //TO-DO: -reverify: this
		//note: multiple transactions with varying types, e.g. snack, non-med, med,
		//added as paid on the same date; 
		//auto-written receipt number output NOT yet OK
		$data['transactionId'] = $_POST["combinedTransactionIdNonMedItemParam"];
		
		echo ">>>".$data['transactionId']."<br/>";

		$this->Browse_Model->addTransactionPaidReceipt($data);
*/				
				
		$this->load->view('searchPatient', $data);		
	}
	
	public function confirmPatientPaidReceiptPrev($medicalDoctorId)
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		$data['transactionDate'] = date('m/d/Y');

		$data['transactionId'] = $_POST["transactionIdParam"];

		$this->load->model('Browse_Model');

		$data['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt
		$data['receiptNumber'] = $_POST["officialReceiptNumberMOSCParam"];

		$this->Browse_Model->addTransactionPaidReceipt($data);

		if ($medicalDoctorId!=1) { //not SYSON, PEDRO
			$data['receiptTypeId'] = 3;
		    $data['receiptNumber'] = $_POST["officialReceiptNumberMedicalDoctorParam"];

			$this->Browse_Model->addTransactionPaidReceipt($data);
		}
		
		//added by Mike, 20200606; edited by Mike, 20200608
		//PAS
		if (isset($_POST["officialReceiptNumberPASParam"])) {
			$data['receiptNumber'] = $_POST["officialReceiptNumberPASParam"];
			
			if ($data['receiptNumber']!==0) {
				$data['receiptTypeId'] = 2;

				$this->Browse_Model->addTransactionPaidReceipt($data);
			}
		}

		$this->load->view('searchPatient', $data);		
	}
	
	//added by Mike, 20200531
	//added in the result of the pages with Patient Purchase Service History
	//TO-DO: -reverify: elapsed time output value
	public function getElapsedTime($inputResult) {
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputResult = [];
		$outputResult = array();
		
		$startDateTime = date('Y-m-d H:i:s'); //default = now
//		echo $startDateTime;
//		echo "count: ".count($inputResult);

		//edited by Mike, 20200602
		if ($inputResult == True) {			
			foreach ($inputResult as $value) {
	//			if ($value['transaction_date']==date('m/d/Y')) {
					
					if (strpos(strtoupper($value['notes']), "IN-QUEUE; PAID")!==false) {
						$startDateTime = strtotime($value['added_datetime_stamp']);					
						
	//					echo "startDateTime: ".$startDateTime;
						
						//added by Mike, 20200606
						//TO-DO: -re-verify: this
						array_push($outputResult, $value);

					}
					else {
						$endDateTime = strtotime($value['added_datetime_stamp']);
						
	//					echo "endDateTime: ".$endDateTime;

						//TO-DO: -update: this
//						$value['elapsedTime'] = $endDateTime - $startDateTime;
						
						//echo "elapsedTime: ".date('H:i:s',$value['elapsedTime']);
						
						array_push($outputResult, $value);
					}
	//			}
			}
		}
		
		return $outputResult;		
	}
	
	//added by Mike, 20200531
	//TO-DO: -add: in the result of the pages with Patient Purchase Service History
	public function getElapsedTimePrev($inputResult) {
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputResult = [];
		$outputResult = array();
		
		$startDateTime = date('Y/m/d H:i:s'); //default = now
		echo $startDateTime;
//		echo "count: ".count($inputResult);
			
		foreach ($inputResult as $value) {
//			if ($value['transaction_date']==date('m/d/Y')) {
				
				if (strpos(strtoupper($value['notes']), "IN-QUEUE; PAID")!==false) {
					$startDateTime = $value['added_datetime_stamp'];					
				}
				else {
					$value['elapsedTime'] = $value['added_datetime_stamp'] - $startDateTime;
					
					array_push($outputResult, $value);
				}
//			}
		}
		
//		echo "output count: ".count($outputResult);

		return $outputResult;		
	}
	
	//added by Mike, 20201216
	public function updateTotalQuantitySoldPerItem()
	{
		$this->load->model('Browse_Model');
		$this->Browse_Model->updateTotalQuantitySoldPerItem();	
		
		//echo count($this->Browse_Model->getTransactionsListFromFile());
		
		//echo $this->Browse_Model->getTransactionsListFromFile()[0]["item_total_sold"];

		echo "***NOTHING FOLLOWS***";		
	}

	//added by Mike, 20230408
	public function updatePatientDataBasedOnLastVisit()
	{
		$this->load->model('Browse_Model');
		$this->Browse_Model->updatePatientDataBasedOnLastVisit();		
		echo "***NOTHING FOLLOWS***";		
	}

	
	//added by Mike, 20210206; edited by Mike, 20210209
//	public function viewLabRequestForm()
	public function viewLabRequestForm($patientId) //+added: in searchPatientLabUnit
	{
		//added by Mike, 20210209		
//		$patientId=1; //removed by Mike, 20210209
		
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		//added by Mike, 20210209
		$this->load->model('Browse_Model');
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		//edited by Mike, 20210212
//		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);		
		$data['result'] = $this->Browse_Model->getDetailsListViaIdLabUnit($patientId);

		//edited by Mike, 20210209
		//$this->load->view('viewLabRequestForm');
		$this->load->view('viewLabRequestForm', $data);
	}

	//added by Mike, 20210808
	//TO-DO: -add: in searchPatientLabUnit
	public function viewLabResultsMiscForm($patientId) 
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['medicalTechnologistList'] = $this->Browse_Model->getMedicalTechnologistList();

		$data['result'] = $this->Browse_Model->getDetailsListViaIdLabUnit($patientId);

		$this->load->view('viewLabResultsMiscForm', $data);
	}
}
