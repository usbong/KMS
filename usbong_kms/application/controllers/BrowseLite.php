<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrowseLite extends CI_Controller { //MY_Controller {

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

		$this->load->view('browseLite', $data);

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
				
		$this->load->view('browseLite', $data);

/*		
		//--------------------------------------------
		$this->load->view('templates/footer');	
*/		
	}
	
	//added by Mike, 20200817
	public function searchNonMedicineLite()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchNonMedicineLite', $data);
	}
	
	//added by Mike, 20200817; TO-DO: -update: this to use newest version of confirmMedicine in Browse.php Controller file
	public function confirmNonMedicineLite()
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

		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();

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
		
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$data['result'] = [];
		$data['result'] = array();
		
		$data['result'] = $outputArray;
		
		$this->load->view('searchNonMedicineLite', $data);
	}
	
}
