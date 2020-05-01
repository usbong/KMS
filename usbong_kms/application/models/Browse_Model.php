<?php 
class Browse_Model extends CI_Model
{
	public function getNamesListViaName($param) 
	{		
//		echo reportTypeNameParam: .$param['reportTypeNameParam'];
/*	
		$this->db->select('report_description, report_id');
//		$this->db->where('report_description', $param['name']);		
		$this->db->order_by('added_datetime_stamp`', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('report');
*/
		$this->db->select('patient_name', 'patient_id');
		$this->db->distinct('patient_name');
		$this->db->like('patient_name', $param['nameParam']);
//		$this->db->order_by('added_datetime_stamp`', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];

		return $rowArray;
	}	

	public function getDetailsListViaName($param) 
	{		
//		echo reportTypeNameParam: .$param['reportTypeNameParam'];
/*	
		$this->db->select('report_description, report_id');
//		$this->db->where('report_description', $param['name']);		
		$this->db->order_by('added_datetime_stamp`', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('report');
*/
/*
		$this->db->select('patient_name', 'patient_id');
		$this->db->distinct('patient_name');
		$this->db->like('patient_name', $param['nameParam']);
//		$this->db->order_by('added_datetime_stamp`', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');
*/

/*
		$this->db->select('t1.transaction_date, t1.fee, t1.transaction_type_name, t2.patient_name');
		$this->db->from('transaction as t1');
		$this->db->join('patient as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->distinct('t2.patient_name');
		$this->db->like('patient_name', $param['nameParam']);
		$this->db->order_by('t1.transaction_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('transaction');
*/

/*		$this->db->select('t1.patient_name, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis');
*/
/*
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis');
*/
		//we use this at MOSC
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t3.medical_doctor_name');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

//		$this->db->distinct('t1.patient_name');
		$this->db->group_by('t1.patient_name');

		$this->db->like('t1.patient_name', $param['nameParam']);
		
		//added by Mike, 20200427
		$this->db->where('t1.patient_name !=', "CANCELLED");

		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');


//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];

		return $rowArray;
	}	

	//edited by Mike, 20200411
	public function getNonMedicineDetailsListViaName($param) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
/*
		$this->db->select('t1.item_name, t1.item_price, t1.item_id');
*/
		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t1.item_name');
		$this->db->group_by('t2.expiration_date'); //added by Mike, 20200406

		$this->db->where('t1.item_type_id', 2); //2 = Non-medicine; 1 = Medicine

		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
//		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];
		
		return $rowArray;
	}	

	//added by Mike, 20200328
	public function getMedicineDetailsListViaName($param) 
	{		
		//we use this at MOSC
/*		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t3.medical_doctor_name');
*/
/*
		$this->db->select('t1.item_name, t1.item_price');
		$this->db->from('item as t1');
//		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
//		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
//		$this->db->distinct('t1.patient_name');
		$this->db->group_by('t1.item_name');
		$this->db->where('t1.item_type_id', 1); //1 = Medicine
		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');
*/
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

//		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
//		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

//		$this->db->distinct('t1.patient_name');
		$this->db->group_by('t1.item_name');
		//edited by Mike, 20200501
//		$this->db->group_by('t2.expiration_date'); //added by Mike, 20200406
		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200406

		$this->db->where('t1.item_type_id', 1); //1 = Medicine

		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];
		
		return $rowArray;
	}	

	//added by Mike, 20200328; 20200406
	public function getMedicineDetailsListViaNamePrev($param) 
	{		
		//we use this at MOSC
/*		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t3.medical_doctor_name');
*/
/*
		$this->db->select('t1.item_name, t1.item_price');
		$this->db->from('item as t1');
//		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
//		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
//		$this->db->distinct('t1.patient_name');
		$this->db->group_by('t1.item_name');
		$this->db->where('t1.item_type_id', 1); //1 = Medicine
		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');
*/
		$this->db->select('item_name, item_price, item_id');

//		$this->db->from('item as t1');
//		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
//		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

//		$this->db->distinct('t1.patient_name');
		$this->db->group_by('item_name');

		$this->db->where('item_type_id', 1); //1 = Medicine

		$this->db->like('item_name', $param['nameParam']);
//		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];
		
		return $rowArray;
	}	

/*  //removed by Mike, 20200411
	//added by Mike, 20200330
	public function addTransactionMedicinePurchase($param) 
	{		
		$this->db->select('item_price');
		$this->db->where('item_id', $param['itemId']);
		$query = $this->db->get('item');
		$row = $query->row();

		$data = array(
					'patient_id' => 0,
					'item_id' => $param['itemId'],
					'transaction_date' => $param['transactionDate'],
					'medical_doctor_id' => 0,
					'fee' => $param['quantity'] * $row->item_price,
					'transaction_type_name' => "CASH",
					'report_id' => 0,
					'notes' => "UNPAID"
				);

		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
	}	
*/
	//added by Mike, 20200331
	public function deleteTransactionMedicinePurchase($param) 
	{			
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
	}	

	//added by Mike, 20200401
	public function payTransactionMedicinePurchase() 
	{			
		$data = array(
					'notes' => "PAID"
				);

        $this->db->where('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
        $this->db->update('transaction', $data);
	}	

	//edited by Mike, 20200411
	public function getItemDetailsListViaName($param) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
/*
		$this->db->select('t1.item_name, t1.item_price, t1.item_id');
*/
		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t1.item_name');
		$this->db->group_by('t2.expiration_date'); //added by Mike, 20200406

		$this->db->where('t1.item_type_id', 2); //2 = Non-medicine; 1 = Medicine

		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
//		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];
		
		return $rowArray;
	}	

	//added by Mike, 20200330; edited by Mike, 20200414
	public function addTransactionItemPurchase($param) 
	{		
		$this->db->select('item_price');
		$this->db->where('item_id', $param['itemId']);
		$query = $this->db->get('item');
		$row = $query->row();
/*	
		$data = array(
					'patient_id' => -1,
					'item_id' => $param['itemId'],
					'transaction_date' => $param['transactionDate'],
					'medical_doctor_id' => -1,
					'fee' => $param['quantity'] * $row->item_price,
					'transaction_type_name' => CASH,
					'report_id' => -1,
					'notes' => UNPAID
				);
*/			
		$data = array(
					'patient_id' => 0,
					'item_id' => $param['itemId'],
					'transaction_date' => $param['transactionDate'],
					'medical_doctor_id' => 0,
//					'fee' => $param['quantity'] * $row->item_price,
					'fee' => $param['quantity'] * $param['fee'], //edited by Mike, 20200414
					'fee_quantity' => $param['quantity'], //edited by Mike, 20200415					
					'transaction_type_name' => "CASH",
					'report_id' => 0,
					'notes' => "UNPAID"
				);

		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
	}	

	//added by Mike, 20200331; edited by Mike, 20200411
	public function deleteTransactionItemPurchase($param) 
	{			
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
	}	

	//added by Mike, 20200411
	public function payTransactionItemPurchase() 
	{			
		$data = array(
					'notes' => "PAID"
				);

        $this->db->where('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
        $this->db->update('transaction', $data);
	}	

	public function getDetailsListViaId($nameId) 
	{		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
//		$this->db->distinct('t1.patient_name');
//		$this->db->like('t1.patient_name', $param['nameParam']);
		$this->db->where('t1.patient_id', $nameId);		
		
		$query = $this->db->get('patient');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	//added by Mike, 20200406
	public function getPaidMedicineDetailsList($itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->where('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->where('t1.item_id', $itemId);

		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		$this->db->limit(8);
		
		$query = $this->db->get('item');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200406; edited by Mike, 20200407
	public function getMedicineAvailableQuantityInStockItemId($itemId)
	{
		$this->db->select('t2.quantity_in_stock');
		$this->db->from('item as t1');
		
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.item_id', $itemId);

		$query = $this->db->get('item');

		$row = $query->row();		
		
		$iQuantity = $row->quantity_in_stock;
				
		if ($iQuantity==0) {
			return 0;
		}
		
		$this->db->select('t1.item_price, t2.fee');
		$this->db->from('item as t1');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t2.notes', "PAID");
		$this->db->where('t2.transaction_date >=', "04/06/2020"); //i.e., MONDAY

		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return $iQuantity;
//			return False; //edited by Mike, 20190722
		}
		
		foreach ($rowArray as $value) {	
			$iQuantity = $iQuantity - $value['fee']/$value['item_price'];
		}

		return $iQuantity;
	}

	//added by Mike, 20200328; edited by Mike, 20200406
	public function getMedicineDetailsList($itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->where('t1.item_id', $itemId);

		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		//added by Mike, 20200401
		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200328; edited by Mike, 20200406
	public function getMedicineDetailsListViaItemIdPrev($itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');
//		$this->db->like('t1.patient_name', $param['nameParam']);

		$this->db->where('t1.item_id', $itemId);

/*
		$this->db->where('t2.transaction_date', date(m/d/Y));//ASC');
*/		
//		$this->db->where('t2.transaction_date!=', 0);		

/*
		//added by Mike, 20200401
		$this->db->where('t2.transaction_date', date(m/d/Y));
*/

/*
		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
*/		
		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		//added by Mike, 20200401
		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		
	
	//added by Mike, 20200328; edited by Mike, 20200407
	public function getMedicineDetailsListViaNotesUnpaid() 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200407
		
		$this->db->where('t2.transaction_date', date('m/d/Y'));//ASC');
		$this->db->like('t2.notes', "UNPAID");
		
		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		

/*
	//added by Mike, 20200408
	public function getMedicalDoctorIdViaName($param) 
	{
		$this->db->select('medical_doctor_name', 'medical_doctor_id');
//		$this->db->distinct('medical_doctor_name');
		$this->db->like('medical_doctor_name', $param['nameParam']);

		$row = $query->row();		

		return $row;
	}	
*/

	//added by Mike, 20200328; edited by Mike, 20200501
	public function getItemDetailsList($itemTypeId, $itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

//		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200501


		$this->db->where('t1.item_id', $itemId);

		//TO-DO: -add: auto-identify item_type
		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine


		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		//added by Mike, 20200401
		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200406; edited by Mike, 20200415
	public function getPaidItemDetailsList($itemTypeId, $itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t3.quantity_in_stock, t3.expiration_date');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->where('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine

		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		$this->db->limit(8);
		
		$query = $this->db->get('item');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200328; edited by Mike, 20200415
	public function getItemDetailsListViaNotesUnpaid() 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200407
		
		$this->db->where('t2.transaction_date', date('m/d/Y'));//ASC');
//		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine
		$this->db->like('t2.notes', "UNPAID");
		
		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200406; edited by Mike, 20200501
	public function getItemAvailableQuantityInStock($itemTypeId, $itemId)
//	public function getItemAvailableQuantityInStock($itemTypeId, $itemId, $expirationDate)
	{
		$this->db->select('t2.quantity_in_stock');
		$this->db->from('item as t1');
		
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2); //2 = Non-medicine


		$query = $this->db->get('item');

		$row = $query->row();		
		
		$iQuantity = 0;
		//added by Mike, 20200411
		if (isset($row->quantity_in_stock)) {
			$iQuantity = $row->quantity_in_stock;
		}
		//added by Mike, 20200414
		else {
			return -1; //9999;
		}
				
		if ($iQuantity==0) {
			return 0;
		}
		
		$this->db->select('t1.item_price, t2.fee');
		$this->db->from('item as t1');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t2.notes', "PAID");
		$this->db->where('t2.transaction_date >=', "04/06/2020"); //i.e., MONDAY

		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return $iQuantity;
//			return False; //edited by Mike, 20190722
		}
		
		foreach ($rowArray as $value) {	
			//edited by Mike, 20200422
//			$iQuantity = $iQuantity - $value['fee']/$value['item_price'];
			$iQuantity = $iQuantity - floor($value['fee']/$value['item_price']*100/100);
		}

		return $iQuantity;
	}
}
?>