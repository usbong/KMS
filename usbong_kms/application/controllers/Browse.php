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

	//added by Mike, 20200328
	public function searchNonMedicine()
	{		
		$data['param'] = $this->input->get('param'); //added by Mike, 20170616
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->view('searchNonMedicine', $data);
	}

	public function confirmNonMedicine()
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

		//added by Mike, 20200417
		$itemTypeId = 1; //1 = Medicine
		$iCount = 0;
		
		if ($data['result'] == True) {
			foreach ($data['result'] as $value) {
				$itemId = $value['item_id'];
					
	//			echo "itemId: " . $itemId;
/*				
				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); //"0";
*/				
				//added by Mike, 20200417
				//note: sell first the item that is nearest to the expiration date using now as the reference date and time stamp
				if ($iCount==0) {
					$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId); //"0";				
				}
				else {
					$data['result'][$iCount]['resultQuantityInStockNow'] = $data['result'][$iCount]['quantity_in_stock'] ;					
				}
				
//				$data['result'][$iCount]['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $value['expiration_date']); //"0";

				//['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
				
				$iCount = $iCount + 1;
			}
		}
		
		$this->load->view('searchMedicine', $data);
	}

	//added by Mike, 20200328; edited by Mike, 20200407
	public function viewItemMedicine($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 1; //1 = Medicine
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200417
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
//		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId, $data['result'][0]['expiration_date']);
	
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

	//added by Mike, 20200411
	public function viewItemNonMedicine($itemId)
	{
//		$data['nameParam'] = $_POST[nameParam];
		
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');

		$this->load->model('Browse_Model');

		$itemTypeId = 2;
	
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
	
		$this->load->view('viewItemNonMedicine', $data);
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

		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);
		
		//TO-DO: -update this
		//$this->load->view('viewItemNonMedicine', $data);

		if ($itemTypeId=="1") {
			$this->load->view('viewItemMedicine', $data);
		}
		else { //example: 2
			$this->load->view('viewItemNonMedicine', $data);
		}
	}

	//added by Mike, 20200411
	public function deleteTransactionItemPurchase($itemTypeId, $itemId, $transactionId)
	{
/*
		echo itemId: .$itemId;
*/		
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

		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId,$itemId);

		if ($itemTypeId==1) {
			$this->load->view('viewItemMedicine', $data);
		}
		else {
			$this->load->view('viewItemNonMedicine', $data);
		}
	}
	
	//added by Mike, 20200411
	public function payTransactionItemPurchase($itemTypeId, $itemId)
	{
/*
		echo itemId: .$itemId;
*/		
		$data['itemId'] = $itemId;
//		$data['transactionId'] = $transactionId;
				
		date_default_timezone_set('Asia/Hong_Kong');
		$dateTimeStamp = date('Y/m/d H:i:s');
		
		$data['transactionDate'] = date('m/d/Y');
		
		$this->load->model('Browse_Model');
	
//		$data['result'] = $this->Browse_Model->getMedicineDetailsListViaName($data);

		$this->Browse_Model->payTransactionItemPurchase();
				
		$data['result'] = $this->Browse_Model->getItemDetailsList($itemTypeId, $itemId);

		//added by Mike, 20200406
		$data['resultPaid'] = $this->Browse_Model->getPaidItemDetailsList($itemTypeId, $itemId);

		$data['cartListResult'] = $this->Browse_Model->getItemDetailsListViaNotesUnpaid();

		//added by Mike, 20200406; edited by Mike, 20200407
		$data['resultQuantityInStockNow'] = $this->Browse_Model->getItemAvailableQuantityInStock($itemTypeId, $itemId);

		if ($itemTypeId==1) {
			$this->load->view('viewItemMedicine', $data);
		}
		else {
			$this->load->view('viewItemNonMedicine', $data);
		}
	}		
}