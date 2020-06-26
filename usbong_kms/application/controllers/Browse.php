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

		$this->load->model('Browse_Model');
		
		//edited by Mike, 20200602
		//$data['result'] = $this->Browse_Model->getDetailsListViaName($data);
		$data['result'] = $this->Browse_Model->getNewestPatientDetailsListViaName($data);

		$this->load->view('searchPatient', $data);
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
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchPatientInformationDesk');
		}
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');
		
		//added by Mike, 20200530
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
	
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

	//edited by Mike, 20200615
	public function confirmNonMedicine()
	{
		//edited by Mike, 20200615
/*		
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
*/			
		
		$data['nameParam'] = $_POST['nameParam'];
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchNonMedicine');
		}
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

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
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
										
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
		$outputArray = [];

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
		
		$data['result'] = [];
		$data['result'] = $outputArray;
		
		$this->load->view('searchNonMedicine', $data);
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
	public function confirmMedicine()
	{
		$data['nameParam'] = $_POST['nameParam'];
		
		//added by Mike, 20200328
		if (!isset($data['nameParam'])) {
			redirect('browse/searchMedicine');
		}
		
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
					
					//edited by Mike, 20200527
//					$remainingPaidItem = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
										
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
		$outputArray = [];

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
		
		$data['result'] = [];
		$data['result'] = $outputArray;
		
		$this->load->view('searchMedicine', $data);
	}

	//added by Mike, 20200328; edited by Mike, 20200501
	public function viewItemMedicine($itemId)
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
			
		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];
		
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);
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
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
										
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
		$outputArray = [];

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
		
		$data['resultItem'] = [];
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
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 
										
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
		$outputArray = [];

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
		
		$data['resultItem'] = [];
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
		
		$outputArray = []; //added by Mike, 20200527
		
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
					$remainingItemNow = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); 


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
				
		$medicalDoctorId = $data['result'][0]['medical_doctor_id'];
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);
		
		//added by Mike, 20200601; removed by Mike, 20200608
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

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
		$this->load->view('viewPatient', $data);
	}
	

	//added by Mike, 20200411; edited by Mike, 20200615
	public function viewItemNonMedicine($itemId)
	{		
//		$data['nameParam'] = $_POST[nameParam];
		
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
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		//added by Mike, 20200501; edited by Mike, 20200604
		$data['itemTypeId'] = $itemTypeId;
		$data['itemId'] = $itemId;
		//$data['itemName'] = $data['resultQuantityInStockNow']['item_name'];
		
		$data['resultItem'] = $this->Browse_Model->getNonMedicineDetailsListViaId($data);
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
		$data['notes'] = $notes."; "."UNPAID";
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');

		$this->Browse_Model->addTransactionServicePurchase($data);

		//edited by Mike, 20200407
		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);

		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//added by Mike, 202005019
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();
		
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

		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();

		//edited by Mike, 20200601
		//this is so that we do not add excess transactions
		//$this->load->view('viewReportPatientQueue', $data);
		redirect('report/viewReportPatientQueue');
	
	}

	//added by Mike, 20200529
	public function addPatientNameInformationDesk()
	{
		$data['patientLastNameParam'] = $_POST['patientLastNameParam'];
		$data['patientFirstNameParam'] = $_POST['patientFirstNameParam'];

		//TO-DO: -update: this
		//$data['medicalDoctorIdParam'] = $_POST['medicalDoctorIdParam'];
		$data['medicalDoctorIdParam'] = 1; //SYSON, PEDRO (DEFAULT)
				
		if (!isset($data['patientLastNameParam'])) {
			redirect('report/report/viewReportPatientQueue');
		}

		if (!isset($data['patientFirstNameParam'])) {
			redirect('report/report/viewReportPatientQueue');
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
	
	//added by Mike, 20200411; edited by Mike, 20200414
//	public function addTransactionItemPurchase($itemId,$quantity)
//	public function addTransactionItemPurchase($itemTypeId, $itemId, $quantity)
	public function addTransactionItemPurchase($itemTypeId, $itemId, $quantity, $fee)
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
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);
//		$data['transactionId'] = $this->Browse_Model->addTransactionMedicinePurchase($data);

		$this->Browse_Model->addTransactionItemPurchase($data);
		
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200601; removed by Mike, 20200602
//		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);
		
		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
		
		//TO-DO: -update this
		//$this->load->view('viewItemNonMedicine', $data);

		//added by Mike, 20200501; edited by Mike, 20200603
		$data['resultItem'] = $this->Browse_Model->getMedicineDetailsListViaId($data);		
		$data['resultItem'] = $this->getResultItemQuantity($data);

		if ($itemTypeId=="1") {
			$this->load->view('viewItemMedicine', $data);
		}
		else { //example: 2
			$this->load->view('viewItemNonMedicine', $data);
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
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		$this->Browse_Model->deleteTransactionServicePurchase($data);

		$data['medicalDoctorList'] = $this->Browse_Model->getMedicalDoctorList();
		$data['result'] = $this->Browse_Model->getDetailsListViaId($patientId);
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//added by Mike, 202005019
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
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		$this->Browse_Model->deleteTransactionItemPurchase($data);
		
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
		
		$data["result"] = $this->Report_Model->getPatientQueueReportForTheDay();

		$this->load->view('viewReportPatientQueue', $data);
	}
	
	//added by Mike, 20200411; edited by Mike, 20200608
	public function payTransactionItemPurchase($itemTypeId, $itemId, $patientId)
	{
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

		$data['outputTransaction'] = $this->Browse_Model->payTransactionItemPurchase();
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

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

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

		//edited by Mike, 20200508; edited by Mike, 20200509
		if ($itemTypeId==1) {
//			$this->load->view('viewItemMedicine', $data);
			$this->load->view('viewItemMedicinePaidReceipt', $data);
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

		//edited by Mike, 20200605
		//$this->Browse_Model->payTransactionItemPurchase();
		//$this->Browse_Model->payTransactionServiceAndItemPurchase();
		
		//removed by Mike, 20200609
		//$outputTransactionId = $this->Browse_Model->payTransactionItemPurchase();
		
		//edited by Mike, 20200606
		//$this->Browse_Model->payTransactionServiceAndItemPurchase($outputTransactionId);
		
		//edited by Mike, 20200608
		//$data['outputTransaction'] = $this->Browse_Model->payTransactionServiceAndItemPurchase($outputTransactionId);
		
		$data['outputTransaction'] = $this->Browse_Model->payTransactionItemPurchase();
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
						
		$medicalDoctorId = $data['result'][0]['medical_doctor_id'];
		$data['resultPaid'] = $this->Browse_Model->getPaidPatientDetailsList($medicalDoctorId, $patientId);

		//added by Mike, 20200601
		$data['resultPaid'] = $this->getElapsedTime($data['resultPaid']);

		//edited by Mike, 202005019
//		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();
		$data['cartListResult'] = $this->Browse_Model->getServiceAndItemDetailsListViaNotesUnpaid();

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
		$outputResult = [];
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
		$outputResult = [];
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
}