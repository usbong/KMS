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
		//edited by Mike, 20200530
		//we use this at MOSC
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t3.medical_doctor_name, t3.medical_doctor_id');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

//		$this->db->distinct('t1.patient_name');
//		$this->db->group_by('t1.patient_name');
		$this->db->group_by('t2.added_datetime_stamp');

		$this->db->like('t1.patient_name', $param['nameParam']);
		
		//added by Mike, 20200427
		$this->db->where('t1.patient_name !=', "CANCELLED");

		//added by Mike, 20200529
		$this->db->where('t1.patient_name !=', "NONE");

		//edited by Mike, 20200527
//		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
		$this->db->order_by('t1.patient_name', 'ASC');

		//removed by Mike, 20200527
//		$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');


//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
	
		//added by Mike, 20200522
		//get only the patient transaction whose transaction date is the newest
		//note that if the patient consulted with multiple medical doctors,
		//the patient name will appear multiple times for each medical doctor
		$outputArray = array();

		$patientId = -1;
		$bIsSamePatientId = false;

		foreach($rowArray as $row) {			 
			if ($patientId==$row["patient_id"]) {
				$bIsSamePatientId = true;
			}
			else {
				$patientId = $row["patient_id"];
				$bIsSamePatientId = false;
			}
			
			//edited by Mike, 20200601
			//re-verify: this
			if (!$bIsSamePatientId) {
				array_push($outputArray, $row);
			}
/*
			if ($bIsSamePatientId) {

			else {
				
				if (in_array($row,$outputArray)) {
				}
				else {
					array_push($outputArray, $row);
				}
			}
*/
		}		
	
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];

//		return $rowArray;
		return $outputArray;
	}	

	public function getNewestPatientDetailsListViaName($param) 
	{		
		//we use this at MOSC
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t3.medical_doctor_name, t3.medical_doctor_id');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

//		$this->db->distinct('t1.patient_name');
//		$this->db->group_by('t1.patient_name');
		$this->db->group_by('t2.added_datetime_stamp');

//		$this->db->group_by('t1.patient_id');

		$this->db->like('t1.patient_name', $param['nameParam']);
		
		//added by Mike, 20200427
		$this->db->where('t1.patient_name !=', "CANCELLED");

		//added by Mike, 20200529
		$this->db->where('t1.patient_name !=', "NONE");

		//edited by Mike, 20200527
//		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
//		$this->db->order_by('t1.patient_name', 'ASC'); //ASC
		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');

		//removed by Mike, 20200527
//		$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');


//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
	
		//added by Mike, 20200522
		//get only the patient transaction whose transaction date is the newest
		//note that if the patient consulted with multiple medical doctors,
		//the patient name will appear multiple times for each medical doctor
		$outputArray = array();

		$patientId = -1;
		$bIsSamePatientId = false;

		foreach($rowArray as $row) {			 
			if ($patientId==$row["patient_id"]) {
				$bIsSamePatientId = true;
			}
			else {
				$patientId = $row["patient_id"];
				$bIsSamePatientId = false;
			}
			
			//edited by Mike, 20200601
			
			if (!$bIsSamePatientId) {
				array_push($outputArray, $row);
			}

		}		
	
//		echo report_id: .$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];

//		return $rowArray;
		return $outputArray;
	}	

	//edited by Mike, 20200411; edited by Mike, 20200615
	public function getNonMedicineDetailsListViaName($param) 
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

		//TO-DO: -re-verify: if we can remove
//		$this->db->group_by('t1.item_name');
		
		//edited by Mike, 20200501
		//re-edited by Mike, 20200527
		//TO-DO: -re-verify due to new inventory stock
		//re-verify: simply update quantity_in_stock for new item stock that have the same expiration date 
		//note: -re-verify: if this solves the issue with inventory items that use the same added_timestamp, i.e. 2020-04-06 08:40:44
//		$this->db->group_by('t2.expiration_date'); //added by Mike, 20200406
//		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200406
		$this->db->group_by('t2.inventory_id');
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		$this->db->where('t1.item_type_id', 2); //2 = Non-medicine

		$this->db->like('t1.item_name', $param['nameParam']);
		
		//added by Mike, 20200607
		$this->db->order_by('t1.item_name', 'ASC');
		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
		
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');

		//edited by Mike, 20200709
//		$this->db->limit(8);//1);
		$this->db->limit(14);
		
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

	//edited by Mike, 20200615
	public function getNonMedicineDetailsListViaNamePrev($param) 
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

	//added by Mike, 20200615
	public function getNonMedicineDetailsListViaId($param) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t2.inventory_id');
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		//$this->db->where('t1.item_type_id', 1); //1 = Medicine
		$this->db->where('t1.item_type_id', 2); //2 = Non-medicine

		//edited by Mike, 20200604
		$this->db->where('t1.item_id', $param['itemId']);

		//added by Mike, 20200607
//		$this->db->order_by('t1.item_name', 'ASC');
		//$this->db->order_by('t2.added_datetime_stamp', 'ASC'); //we do this for cases with equal expiration dates
		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
				
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');

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

	//added by Mike, 20200603
	public function getMedicineDetailsListViaId($param) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t2.inventory_id');
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		$this->db->where('t1.item_type_id', 1); //1 = Medicine

		//edited by Mike, 20200604
		$this->db->where('t1.item_id', $param['itemId']);

		//added by Mike, 20200607
//		$this->db->order_by('t1.item_name', 'ASC');
		//$this->db->order_by('t2.added_datetime_stamp', 'ASC'); //we do this for cases with equal expiration dates
		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
				
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');

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

		//TO-DO: -re-verify: if we can remove
//		$this->db->group_by('t1.item_name');
		
		//edited by Mike, 20200501
		//re-edited by Mike, 20200527
		//TO-DO: -re-verify due to new inventory stock
		//re-verify: simply update quantity_in_stock for new item stock that have the same expiration date 
		//note: -re-verify: if this solves the issue with inventory items that use the same added_timestamp, i.e. 2020-04-06 08:40:44
//		$this->db->group_by('t2.expiration_date'); //added by Mike, 20200406
//		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200406
		$this->db->group_by('t2.inventory_id');
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		$this->db->where('t1.item_type_id', 1); //1 = Medicine

		$this->db->like('t1.item_name', $param['nameParam']);
		
		//added by Mike, 20200607
		$this->db->order_by('t1.item_name', 'ASC');
		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
		
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');

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

	//added by Mike, 20200517; edited by Mike, 20200629
	//updated instructions to not execute the following action:
	//if we delete the patient health service transaction, all the medicine and non-medicne items included in the cart after payment are also deleted
	public function deleteTransactionServicePurchase($param) 
	{			
/*		//edited by Mike, 20200616
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/

		$iTransactionId = $param['transactionId'];

		$this->db->select('transaction_quantity');
		$this->db->where('transaction_id',$iTransactionId);
		$query = $this->db->get('transaction');
		$row = $query->row();

		$transactionQuantity = $row->transaction_quantity;

		if ($transactionQuantity==0) {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');
		}
		else {			
			$iCount = 0;
			
			while ($iCount < $transactionQuantity) {
//				echo "count: ".$iCount." : ";
//				echo "transactionId: ".$iTransactionId."<br/>";
				
				$this->db->where('transaction_id',$iTransactionId);

				//removed by Mike, 20200626
//				$this->db->where('patient_id!=',0);
				
				//added by Mike, 20200629
				$this->db->where('item_id',0);

				$this->db->delete('transaction');

				//added by Mike, 20200629					
				$iTransactionId = $iTransactionId - 1;
				
				if ($iTransactionId<0) {
					break;
				}
					
				//edited by Mike, 20200626
				//$iCount = $iCount + 1;
				//this is due to the transactionId can skip in the count
				$this->db->select('transaction_id');
				$this->db->where('transaction_id',$iTransactionId);
				$query = $this->db->get('transaction');
				$row = $query->row();

				if (isset($row)) {
					//edited by Mike, 20200703
//					if (count($row)!=0) {
//					if (mysqli_num_rows($row)!=0) {
					if (count((array)$row)!=0) {
						$iCount = $iCount + 1;
					}
				}
				else {
					//edited by Mike, 20200629
					//break;
					if ($iCount < $transactionQuantity) {
					}
					else {
						break;
					}
				}

				//removed by Mike, 20200629
				//$iTransactionId = $iTransactionId - 1;
				
			}
		}
		//TO-DO: -reverify: if necessary to add a transaction for all the remaining items in cart
/*
		//added by Mike, 20200629
		$data = array(
					'transaction_quantity' => "2"
				);

        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->update('transaction', $data);
*/


/*		//removed by Mike, 20200611		
		//added by Mike, 20200608
		//delete all transactions of the patient for the day
		//this is due to the computer server adding a new transaction that combines all the patient's purchases
        $this->db->where('patient_id',$param['patientId']);
        $this->db->where('transaction_date',$param['transactionDate']);
        $this->db->delete('transaction');		
*/		
	}	

	//added by Mike, 20200517; edited by Mike, 20200616
	//note: if we delete the patient health service transaction, all the medicine and non-medicne items included in the cart after payment are also deleted
	public function deleteTransactionServicePurchasePrev($param) 
	{			
/*		//edited by Mike, 20200616
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/

		$iTransactionId = $param['transactionId'];

		$this->db->select('transaction_quantity');
		$this->db->where('transaction_id',$iTransactionId);
		$query = $this->db->get('transaction');
		$row = $query->row();

		$transactionQuantity = $row->transaction_quantity;

		if ($transactionQuantity==0) {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');
		}
		else {			
			$iCount = 0;
			while ($iCount < $transactionQuantity) {			
				$this->db->where('transaction_id',$iTransactionId);
				$this->db->where('patient_id!=',0);
				$this->db->delete('transaction');
							
				$iCount = $iCount + 1;
				$iTransactionId = $iTransactionId - 1;
			}
		}

/*		//removed by Mike, 20200611		
		//added by Mike, 20200608
		//delete all transactions of the patient for the day
		//this is due to the computer server adding a new transaction that combines all the patient's purchases
        $this->db->where('patient_id',$param['patientId']);
        $this->db->where('transaction_date',$param['transactionDate']);
        $this->db->delete('transaction');		
*/		
	}	

/*  //removed by Mike, 20200624
	//added by Mike, 20200331
	public function deleteTransactionMedicinePurchase($param) 
	{			
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
	}	
*/
	//added by Mike, 20200530; edited by Mike, 20200608
	//-reverify: if not include delete of already paid patient transaction
	public function deleteTransactionFromPatient($param) 
	{
		//added by Mike, 20200608
        $this->db->select('patient_id');
        $this->db->where('transaction_id',$param['transactionId']);
        $query = $this->db->get('transaction');
		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
				
		
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');

		//added by Mike, 20200608
		//delete all transactions of the patient for the day
		//this is due to the computer server adding a new transaction that combines all the patient's purchases
        $this->db->where('patient_id',$rowArray[0]['patient_id']);
        $this->db->where('transaction_date',$param['transactionDate']);
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

	//added by Mike, 20200508; edited by Mike, 20200710
	//add: to receipt each transaction 
	public function addTransactionPaidReceipt($param) 
	{
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		//echo "transactionQuantity: ".$param['transactionQuantity'];

		$iCount = 0;
		//edited by Mike, 20200611
//		while ($iCount <= $param['transactionQuantity']) {			
		while ($iCount < $param['transactionQuantity']) {
/*		
			echo "iCount: ".$iCount;
			echo "iTransactionId: ".$param['transactionId']."<br/>";
*/		
			//edited by Mike, 20200721
//			$this->db->select('t1.patient_id, t3.item_type_id');
			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee');
			$this->db->from('transaction as t1');
			$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
			$this->db->join('item_type as t3', 't2.item_type_id = t3.item_type_id', 'LEFT');
			$this->db->where('t1.transaction_id',$param['transactionId']);
			$query = $this->db->get('transaction');
			$rowArray = $query->result_array();
						
			//edited by Mike, 20200626
			if (count($rowArray)!=0) {
				//identify if patient transaction
				if ($rowArray[0]['patient_id']!=0) {															
	//			if ((isset($rowArray[0]['patient_id'])) and ($rowArray[0]['patient_id']!=0)) {
					//edited by Mike, 20200611
	//				if ($param['medicalDoctorId']==1) { //SYSON, PEDRO
					//we automatically set the transaction with all the fees to be MOSC Receipt
					//TO-DO: -update: this to verify if there is x_ray_fee and lab_fee
					if (($param['medicalDoctorId']==1) or ($iCount==0)) { //SYSON, PEDRO
						$param['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMOSC']
						);				

						//edited by Mike, 20200710
						//$this->db->insert('receipt', $data);
						array_push($outputArray, $data);
					}
					else { //not SYSON, PEDRO //if ($data['medicalDoctorId']!=1) { //not SYSON, PEDRO
						$param['receiptTypeId'] = 3;

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMedicalDoctor']
						);				

						//edited by Mike, 20200710
						//$this->db->insert('receipt', $data);
						array_push($outputArray, $data);
					}								
					
					//added by Mike, 20200721
					if ($rowArray[0]['med_fee']!=0) { 
					//removed by Mike, 20200721
/*					
					//MEDICINE															
						$param['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMOSC']
						);				

						array_push($outputArray, $data);						
*/						
					}
					else if ($rowArray[0]['pas_fee']!=0) { 
					//NON-MEDICINE
						$param['receiptNumber'] = $param['receiptNumberPAS'];
						
						if ($param['receiptNumber']!=0) {
							$param['receiptTypeId'] = 2;

							$data = array(
								'receipt_type_id' => $param['receiptTypeId'],
								'transaction_id' => $param['transactionId'],
								'receipt_number' => $param['receiptNumberPAS']
							);				

							//edited by Mike, 20200710
							//$this->db->insert('receipt', $data);
							array_push($outputArray, $data);
						}
					}					
				}
				//identify item type
				else {
					if ($rowArray[0]['item_type_id']==1) { //MEDICINE															
						$param['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMOSC']
						);				

						//edited by Mike, 20200710
						//$this->db->insert('receipt', $data);
						array_push($outputArray, $data);						
					}
					else { //NON-MEDICINE
						$param['receiptNumber'] = $param['receiptNumberPAS'];
						
						if ($param['receiptNumber']!=0) {
							$param['receiptTypeId'] = 2;

							$data = array(
								'receipt_type_id' => $param['receiptTypeId'],
								'transaction_id' => $param['transactionId'],
								'receipt_number' => $param['receiptNumberPAS']
							);				

							//edited by Mike, 20200710
							//$this->db->insert('receipt', $data);
							array_push($outputArray, $data);
						}
					}
				}
			}
	
			$iCount = $iCount + 1;			
			//edited by Mike, 20200611
			//$param['transactionId'] = $param['transactionId'] - 1;
			$param['transactionId'] = (int)$param['transactionId'] - 1;
		}
/*	
		$data = array(
					'receipt_type_id' => $param['receiptTypeId'],
					'transaction_id' => $param['transactionId'],
					'receipt_number' => $param['receiptNumber']
				);

		$this->db->insert('receipt', $data);
//		return $this->db->insert_id();
*/

		//$outputArrayCount = count($outputArray)		
		
		foreach ($outputArray as $dataValue) {
			$this->db->insert('receipt', $dataValue);
		}		
	}	

	//added by Mike, 20200508; edited by Mike, 20200610
	//add: to receipt each transaction 
	public function addTransactionPaidReceiptPrevReversedError($param) 
	{
		//echo "transactionQuantity: ".$param['transactionQuantity'];

		$iCount = 0;
		//edited by Mike, 20200611
//		while ($iCount <= $param['transactionQuantity']) {			
		while ($iCount < $param['transactionQuantity']) {
/*		
			echo "iCount: ".$iCount;
			echo "iTransactionId: ".$param['transactionId']."<br/>";
*/		
			$this->db->select('t1.patient_id, t3.item_type_id');
			$this->db->from('transaction as t1');
			$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
			$this->db->join('item_type as t3', 't2.item_type_id = t3.item_type_id', 'LEFT');
			$this->db->where('t1.transaction_id',$param['transactionId']);
			$query = $this->db->get('transaction');
			$rowArray = $query->result_array();
						
			//edited by Mike, 20200626
			if (count($rowArray)!=0) {
				//identify if patient transaction
				if ($rowArray[0]['patient_id']!=0) {															
	//			if ((isset($rowArray[0]['patient_id'])) and ($rowArray[0]['patient_id']!=0)) {
					//edited by Mike, 20200611
	//				if ($param['medicalDoctorId']==1) { //SYSON, PEDRO
					//we automatically set the transaction with all the fees to be MOSC Receipt
					//TO-DO: -update: this to verify if there is x_ray_fee and lab_fee
					if (($param['medicalDoctorId']==1) or ($iCount==0)) { //SYSON, PEDRO
						$param['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMOSC']
						);				

						$this->db->insert('receipt', $data);
					}
					else { //not SYSON, PEDRO //if ($data['medicalDoctorId']!=1) { //not SYSON, PEDRO
						$param['receiptTypeId'] = 3;

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMedicalDoctor']
						);				

						$this->db->insert('receipt', $data);
					}								
				}
				//identify item type
				else {
					if ($rowArray[0]['item_type_id']==1) { //MEDICINE															
						$param['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMOSC']
						);				

						$this->db->insert('receipt', $data);
					}
					else { //NON-MEDICINE
						$param['receiptNumber'] = $param['receiptNumberPAS'];
						
						if ($param['receiptNumber']!=0) {
							$param['receiptTypeId'] = 2;

							$data = array(
								'receipt_type_id' => $param['receiptTypeId'],
								'transaction_id' => $param['transactionId'],
								'receipt_number' => $param['receiptNumberPAS']
							);				

							$this->db->insert('receipt', $data);
						}
					}
				}
			}
	
			$iCount = $iCount + 1;			
			//edited by Mike, 20200611
			//$param['transactionId'] = $param['transactionId'] - 1;
			$param['transactionId'] = (int)$param['transactionId'] - 1;
		}
/*	
		$data = array(
					'receipt_type_id' => $param['receiptTypeId'],
					'transaction_id' => $param['transactionId'],
					'receipt_number' => $param['receiptNumber']
				);

		$this->db->insert('receipt', $data);
//		return $this->db->insert_id();
*/
	}	


	public function addTransactionPaidReceiptPrev($param) 
	{				
		$data = array(
					'receipt_type_id' => $param['receiptTypeId'],
					'transaction_id' => $param['transactionId'],
					'receipt_number' => $param['receiptNumber']
				);

		$this->db->insert('receipt', $data);
		return $this->db->insert_id();

	}	

	//added by Mike, 20200517
	public function addTransactionServicePurchase($param) 
	{	
		$sNotesValue = "";

		//we do not include 0, i.e. WI
		if ($param['classification'] == "1") { //SC			
			$sNotesValue = "SC; ";
			
			$param['notes'] = str_replace("NONE; ","",$param['notes']);
		}
		else if ($param['classification'] == "2") { //PWD			
			$sNotesValue = "PWD; ";
			
			$param['notes'] = str_replace("NONE; ","",$param['notes']);
		}
		
		//edited by Mike, 20200519
//		if ($param['notes']=="") {
		if (($param['notes']=="") && ($sNotesValue=="")){
//			$sNotesValue = $sNotesValue;//."NONE";
			$sNotesValue = "NONE";
		}
		else {			
			$sNotesValue = $sNotesValue.$param['notes'];
//			$sNotesValue = $sNotesValue.str_replace("NONE","",$param['notes']);
		}
						
		$data = array(
					'patient_id' => $param['patientId'],
					'item_id' => 0,
					'transaction_date' => $param['transactionDate'],
					'medical_doctor_id' => $param['medicalDoctorId'],
					'fee' => $param['professionalFee'],
					'fee_quantity' => 0,
					'x_ray_fee' => $param['xRayFee'],
					'lab_fee' => $param['labFee'],
					'transaction_type_name' => "CASH",
					'report_id' => 0,
					'notes' => $sNotesValue
				);

		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
	}	

	//added by Mike, 20200330; edited by Mike, 20200703
	public function addTransactionItemPurchase($param) 
	{		
		$this->db->select('item_price, item_type_id');
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
		$medFee = 0;
		$nonMedFee = 0;
		
		//added by Mike, 20200703
		if ($row->item_type_id==1) { //medicine
			$medFee = $param['quantity'] * $param['fee'];
		}
		else { //non-medicine
			$nonMedFee = $param['quantity'] * $param['fee'];
		}
		
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
					'notes' => "UNPAID",
					//added by Mike, 20200703
					'med_fee' => $medFee,
					'pas_fee' => $nonMedFee				
				);

		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
	}	

	//added by Mike, 20200330; edited by Mike, 20200703
	public function addTransactionItemPurchasePrev($param) 
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
	
	//added by Mike, 20200331; edited by Mike, 20200624
	//note: if we delete the patient health service transaction, all the medicine and non-medicne items included in the cart after payment are also deleted
	//TO-DO: -reverify: this
	public function deleteTransactionItemPurchaseAllInCart($param) 
	{			
/*		//removed by Mike, 20200624	
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/
		$iTransactionId = $param['transactionId'];
		$transactionQuantity = 0;

		//identify earliest transactionId
		$this->db->select_min('transaction_id');
		$query = $this->db->get('transaction');
		$row = $query->row();
		
		$iTransactionIdMin = $row->transaction_id;

		//added by Mike, 20200625
		//identify the first transactionId in the cart list if item was purchased with other items/services
		//part 1
		do {
			$iTransactionId = $iTransactionId - 1;
			
			$this->db->select('transaction_quantity');
			$this->db->where('transaction_id',$iTransactionId);
			$query = $this->db->get('transaction');
			$row = $query->row();

			//edited by Mike, 20200625
			if (isset($row->transaction_quantity)) {
				$transactionQuantity = $row->transaction_quantity;
			}
			//edited by Mike, 20200626
			else { 
				//break;

				if ($iTransactionId < $iTransactionIdMin) {
					break;
				}
				else {
					continue;
				}					
			}

		}
		//edited by Mike, 20200626
//		while ($transactionQuantity==0);
		while (($transactionQuantity==0)or ($iTransactionId<=0));

		//added by Mike, 20200626
		//part 2
		//get the transactionId of the transaction whose transactionQuantity is 0
		//we do this due to transactionId's may skip, i.e. not counted by simply adding 1
		//identify the first transactionId in the cart list if item was purchased with other items/services		
		$transactionQuantity=0;

		//identify newest transactionId
		$this->db->select_max('transaction_id');
		$query = $this->db->get('transaction');
		$row = $query->row();
		
		$iTransactionIdMax = $row->transaction_id;
		
		echo "max".$iTransactionIdMax;

		do {
			$iTransactionId = $iTransactionId + 1;
			
			echo "id".$iTransactionId;

			$this->db->select('transaction_quantity');
			$this->db->where('transaction_id',$iTransactionId);
			$query = $this->db->get('transaction');
			$row = $query->row();

			//edited by Mike, 20200625
			if (isset($row->transaction_quantity)) {
				$transactionQuantity = $row->transaction_quantity;
			}
			//edited by Mike, 20200626
			else { 			
				//break;
				$transactionQuantity = -1;
				
				if ($iTransactionId > $iTransactionIdMax) {
					break;
				}
				else {
					continue;
				}
			}
		}
		//edited by Mike, 20200626
		while (($transactionQuantity!=0) and ($iTransactionId<$iTransactionIdMax));

		echo "qty: ".$transactionQuantity.": hallo".$iTransactionId;

		do {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');
						
			$iTransactionId = $iTransactionId + 1;
			
			$this->db->select('transaction_quantity');
			$this->db->where('transaction_id',$iTransactionId);
			$query = $this->db->get('transaction');
			$row = $query->row();

			//edited by Mike, 20200625
			if (isset($row->transaction_quantity)) {
				$transactionQuantity = $row->transaction_quantity;
			}
			//edited by Mike, 20200626
			else {
				//break;
				$transactionQuantity = -1;
				
				if ($iTransactionId > $iTransactionIdMax) {
					break;
				}
				else {
					continue;
				}
			}

		}
		//edited by Mike, 20200626
//		while ($transactionQuantity==0);
//		while (($transactionQuantity==0)||($iTransactionId<=0));
		while (($transactionQuantity!=0) and ($iTransactionId<$iTransactionIdMax));

		//delete the transaction whose transactionQuantity != 0
		$this->db->where('transaction_id',$iTransactionId);
		$this->db->delete('transaction');
	}	

	//added by Mike, 20200625
	public function deleteTransactionItemPurchasePrev($param) 
	{			
/*		//removed by Mike, 20200624	
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/
		$iTransactionId = $param['transactionId'];
		$transactionQuantity = 0;

		do {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');
						
			$iTransactionId = $iTransactionId + 1;
			
			$this->db->select('transaction_quantity');
			$this->db->where('transaction_id',$iTransactionId);
			$query = $this->db->get('transaction');
			$row = $query->row();

			//edited by Mike, 20200625
			if (isset($row->transaction_quantity)) {
				$transactionQuantity = $row->transaction_quantity;
			}
			else {
				break;
			}
		}
		while ($transactionQuantity==0);	

		//delete the transaction whose transactionQuantity != 0
		$this->db->where('transaction_id',$iTransactionId);
		$this->db->delete('transaction');
	}	
/*	//removed by Mike, 20200630
	public function deleteTransactionItemPurchase($param) 
	{			
		$this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
	}	
*/
	//edited by Mike, 20200705
	//TO-DO: -reverify: transaction if same item purchased multiple times
	//-add: delete transaction cart if all fees = 0
	public function deleteTransactionItemPurchase($param) 
	{			
/*      $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/

		$iTransactionId = $param['transactionId'];

		$this->db->select('transaction_date, notes');
		$this->db->where('transaction_id',$iTransactionId);
		$query = $this->db->get('transaction');
		$row = $query->row();
		
		//edited by Mike, 20200704
		//if ($row->notes=="UNPAID") {
		if ((isset($row)) and ($row->notes=="UNPAID")) {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');			
		}
		else {
			//TO-DO: -identify: transaction with all items and services in the cart
			//note: the transaction quantity is not 0
//			$iTransactionId = $param['transactionId'];

			$transactionDate = $row->transaction_date;

			$this->db->select_max('transaction_id');
			$this->db->where('transaction_date',$transactionDate);
			$query = $this->db->get('transaction');
			$rowTransaction = $query->row();
			
			$iTransactionIdMax = $rowTransaction->transaction_id;
			//removed by Mike, 20200701
//			echo "iTransactionIdMax: ".$iTransactionIdMax;

			do {
				$this->db->select('transaction_id, transaction_quantity, med_fee, pas_fee');
				$this->db->where('transaction_id',$iTransactionId);
				$query = $this->db->get('transaction');
				$row = $query->row();

				//$transactionQuantity = $row->transaction_quantity;

				if (isset($row)) {
					$iTransactionId = $row->transaction_id;				
					$transactionQuantity = $row->transaction_quantity;
				}
				else {
					//break;
					if ($iTransactionId < $iTransactionIdMax) {
					}
					else {
						break;
					}
				}
				
				$iTransactionId = $iTransactionId + 1;
			}
			while ($transactionQuantity==0);

/*			echo "iTransactionId: ".$iTransactionId;
*/
			//edited by Mike, 20200630
//			$iTransactionId = $iTransactionId - 1;
			$iTransactionIdCart = $iTransactionId - 1;
			
	/*		
			$this->db->select('transaction_quantity, med_fee, pas_fee');
			$this->db->where('transaction_id',$iTransactionId);
			$query = $this->db->get('transaction');
			$row = $query->row();

			$transactionQuantity = $row->transaction_quantity;
	*/
	
			//added by Mike, 20200629
			$updatedTransactionQuantity = $transactionQuantity;
			//edited by Mike, 20200709
/*			$updatedMedFee = $row->med_fee;
			$updatedNonMedFee = $row->pas_fee;
*/
			$updatedMedFee = 0;
			$updatedNonMedFee = 0;
			
			if (isset($row->med_fee)) {
				$updatedMedFee = $row->med_fee;
			}
			if (isset($row->pas_fee)) {
				$updatedNonMedFee = $row->pas_fee;
			}

			$iTransactionId = $param['transactionId'];

			if ($transactionQuantity==0) {
				$this->db->where('transaction_id',$iTransactionId);
				$this->db->delete('transaction');
			}
			else {			
				$iCount = 0;
						
				while ($iCount < $transactionQuantity) {
/*					echo "count: ".$iCount." : ";
					echo "transactionId: ".$iTransactionId."<br/>";
*/
					//20200629
					//identify if transaction is classified as medicine or non-medicine
					$this->db->select('t1.item_id, t2.item_type_id');
					$this->db->from('transaction as t1');	
					$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');		
					$this->db->where('t1.transaction_id', $iTransactionId);
					$query = $this->db->get('transaction');
					$row = $query->row();

					//edited by Mike, 20200630
					if (isset($row)) {					
						if ($row->item_id!=0) {
							$updatedTransactionQuantity = $updatedTransactionQuantity - 1;
							
							if ($row->item_type_id==1) {
								$updatedMedFee = 0;
							}
							else if ($row->item_type_id==2) {
								$updatedNonMedFee = 0;
							}			
						}
					}
														
					$this->db->where('transaction_id',$iTransactionId);

					//edited by Mike, 20200629
					$this->db->where('patient_id',0);
					
					//added by Mike, 20200629
	//				$this->db->where('item_id',0);

					$this->db->delete('transaction');

					//added by Mike, 20200629					
					$iTransactionId = $iTransactionId - 1;
					
					if ($iTransactionId<0) {
						break;
					}

					//edited by Mike, 20200626
					//$iCount = $iCount + 1;
					//this is due to the transactionId can skip in the count
					$this->db->select('transaction_id');
					$this->db->where('transaction_id',$iTransactionId);
					$query = $this->db->get('transaction');
					$row = $query->row();

					if (isset($row)) {
						//edited by Mike, 20200705
//						if (count($row)!=0) {
						if (count((array)$row)!=0) {
							$iCount = $iCount + 1;
						}
					}
					else {
						//edited by Mike, 20200629
						//break;
						if ($iCount < $transactionQuantity) {
						}
						else {
							break;
						}
					}

					//removed by Mike, 20200629
					//$iTransactionId = $iTransactionId - 1;
					
				}
			}

			//added by Mike, 20200629
			//update: transaction with all the items in the cart
			$data = array(
						'transaction_quantity' => $updatedTransactionQuantity,
						'med_fee' => $updatedMedFee,
						'pas_fee' => $updatedNonMedFee
					);

			//removed by Mike, 20200701
			//echo "transactionId: ".$param['transactionId'];
			//echo "iTransactionIdCart: ".$iTransactionIdCart;
			
			//edited by Mike, 20200630
//			$this->db->where('transaction_id',$iTransactionIdMax);
			$this->db->where('transaction_id',$iTransactionIdCart);
			$this->db->update('transaction', $data);		

			//added by Mike, 20200630
			//TO-DO: -delete transaction if all fee values are zero
		}
	}	

	//edited by Mike, 20200629
	public function deleteTransactionItemPurchaseReverify($param) 
	{			
/*      $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/

		//TO-DO: -identify: transaction with all items and services in the cart
		//note: the transaction quantity is not 0
		$iTransactionId = $param['transactionId'];

		$this->db->select('transaction_quantity, med_fee, pas_fee');
		$this->db->where('transaction_id',$iTransactionId);
		$query = $this->db->get('transaction');
		$row = $query->row();

		$transactionQuantity = $row->transaction_quantity;

		//added by Mike, 20200629
		$updatedTransactionQuantity = $transactionQuantity;
		$updatedMedFee = $row->med_fee;
		$updatedNonMedFee = $row->pas_fee;			

		if ($transactionQuantity==0) {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');
		}
		else {			
			$iCount = 0;
					
			while ($iCount < $transactionQuantity) {
//				echo "count: ".$iCount." : ";
//				echo "transactionId: ".$iTransactionId."<br/>";

				//20200629
				//identify if transaction is classified as medicine or non-medicine
				$this->db->select('t1.item_id, t2.item_type_id');
				$this->db->from('transaction as t1');	
				$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');		
				$this->db->where('t1.transaction_id', $iTransactionId);
				$query = $this->db->get('transaction');
				$row = $query->row();
				
				if ($row->item_id!=0) {
					$updatedTransactionQuantity = $updatedTransactionQuantity - 1;
					
					if ($row->item_type_id==1) {
						$updatedMedFee = 0;
					}
					else if ($row->item_type_id==2) {
						$updatedNonMedFee = 0;
					}			
				}
								
				
				$this->db->where('transaction_id',$iTransactionId);

				//edited by Mike, 20200629
				$this->db->where('patient_id',0);
				
				//added by Mike, 20200629
//				$this->db->where('item_id',0);

				$this->db->delete('transaction');

				//added by Mike, 20200629					
				$iTransactionId = $iTransactionId - 1;
				
				if ($iTransactionId<0) {
					break;
				}
					
				//edited by Mike, 20200626
				//$iCount = $iCount + 1;
				//this is due to the transactionId can skip in the count
				$this->db->select('transaction_id');
				$this->db->where('transaction_id',$iTransactionId);
				$query = $this->db->get('transaction');
				$row = $query->row();

				if (isset($row)) {
					if (count($row)!=0) {
						$iCount = $iCount + 1;
					}
				}
				else {
					//edited by Mike, 20200629
					//break;
					if ($iCount < $transactionQuantity) {
					}
					else {
						break;
					}
				}

				//removed by Mike, 20200629
				//$iTransactionId = $iTransactionId - 1;
				
			}
		}

		//added by Mike, 20200629
		//update: transaction with all the items in the cart
		$data = array(
					'transaction_quantity' => $updatedTransactionQuantity,
					'med_fee' => $updatedMedFee,
					'pas_fee' => $updatedNonMedFee
				);

		echo "transactionId: ".$param['transactionId'];
		
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->update('transaction', $data);		
	}	

	//added by Mike, 20200411; edited by Mike, 20200608
	//add new transaction with the total for each item type
	public function payTransactionItemPurchase() 
	{			
		//added by Mike, 20200605
		//part 1
		$this->db->select('t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->from('transaction as t1');	
		$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');		
		$this->db->where('t1.notes', "UNPAID");
		$this->db->where('t1.transaction_date', date('m/d/Y'));
		$this->db->group_by('t1.transaction_id');
		$query = $this->db->get('transaction');
		$rowArray = $query->result_array();

		$totalFeeMedicine = 0;
		$totalFeeNonMedicine = 0;

		//added by Mike, 20200610
		//echo "count: ".count($rowArray);
		$transactionQuantity = count($rowArray)+1; //start at 1

		foreach ($rowArray as $rowValue) {
			if ($rowValue['item_type_id']==1) { //medicine
				$totalFeeMedicine = $totalFeeMedicine + $rowValue['fee'];								
			}
			else {
				$totalFeeNonMedicine = $totalFeeNonMedicine + $rowValue['fee'];
			}		
/*			echo "totalFeeMedicine: ".$totalFeeMedicine."<br/>";
			echo "totalFeeNonMedicine: ".$totalFeeNonMedicine."<br/>";
			echo ">";
*/			
		}
/*		echo ">>>";
		echo "totalFeeMedicine: ".$totalFeeMedicine."<br/>";
		echo "totalFeeNonMedicine: ".$totalFeeNonMedicine."<br/>";
*/
		
		$data = array(
					'patient_id' => 0,
					'item_id' => 0,
					'transaction_date' => date('m/d/Y'),
					'medical_doctor_id' => 0,
					'fee' => 0,
					'med_fee' => $totalFeeMedicine,
					'pas_fee' => $totalFeeNonMedicine,
					'transaction_type_name' => "CASH",
					'report_id' => 0,
					'notes' => "PAID",
					'transaction_quantity' => $transactionQuantity //edited by Mike, 20200610
				);

		$this->db->insert('transaction', $data);
		$outputTransactionId = $this->db->insert_id();

		//part 2
		$data = array(
					'notes' => "PAID",
				);

        $this->db->where('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
        $this->db->update('transaction', $data);
		
		//edited by Mike, 20200610
		//return $outputTransactionId;
		//edited by Mike, 20200616
//		$this->db->select('transaction_id, fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->select('transaction_id, fee, x_ray_fee, lab_fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->where('transaction_id', $outputTransactionId);
		$query = $this->db->get('transaction');		
		$rowArray = $query->result_array();

		return $rowArray[0];
	}	

	//added by Mike, 20200519; edited by Mike, 20200611
	//note: reverify: delete transaction whose fee = 0 and notes = "IN-QUEUE; PAID"
	//TO-DO: -delete: "AndItem" in function name
	public function payTransactionServiceAndItemPurchase($param)//$outputTransactionId)
	{			
		//edited by Mike, 20200605
//		$this->db->select('notes, transaction_id');
		$this->db->select('notes, transaction_id, fee, fee_quantity, x_ray_fee, lab_fee, medical_doctor_id, patient_id');
        $this->db->like('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
		
		//added by Mike, 20200608
		$this->db->where('patient_id', $param['patientId']);

		$query = $this->db->get('transaction');	
		
		$rowArray = $query->result_array();

		//added by Mike, 20200611
		//echo "count: ".count($rowArray);
		//$transactionQuantity = count($rowArray)+1; //start at 1
		$transactionQuantity = $param['outputTransaction']['transaction_quantity'] + count($rowArray); //start at 1

		//added by Mike, 20200607
		$outputTransaction = null;

		foreach ($rowArray as $rowValue) {
			//part 1
			$updatedValue = str_replace("UNPAID","PAID",$rowValue['notes']);
			
			$data = array(
						'notes' => $updatedValue //"PAID"
					);

			$this->db->like('notes',"UNPAID");
			//edited by Mike, 20200530
			//$this->db->where('transaction_date', date('m/d/Y'));
			$this->db->where('transaction_id', $rowValue['transaction_id']);
			$this->db->update('transaction', $data);
			
			//added by Mike, 20200605
			//part 2
			$dataOutputTransaction = array(
						'patient_id' => $rowValue['patient_id'],
						'item_id' => 0,
						'medical_doctor_id' => $rowValue['medical_doctor_id'],
						'fee' => $rowValue['fee'],
						'fee_quantity' => $rowValue['fee_quantity'],					
						'x_ray_fee' => $rowValue['x_ray_fee'],
						'lab_fee' => $rowValue['lab_fee'],
						'transaction_type_name' => "CASH",
						'report_id' => 0,
						'notes' => $updatedValue, //"PAID"
						'transaction_quantity' => $transactionQuantity, //edited by Mike, 20200611
					);
			
			//added by Mike, 20200605
			
			$this->db->where('transaction_id', $param['outputTransactionId']); //$outputTransactionId);
			$this->db->update('transaction', $dataOutputTransaction);			
			
			//added by Mike, 20200606
			//$this->db->select('notes, transaction_id, fee, fee_quantity, x_ray_fee, lab_fee, med_fee, pas_fee, medical_doctor_id, patient_id');
			//edited by Mike, 20200607
			//$this->db->select('med_fee, pas_fee, transaction_id');
			//edited by Mike, 20200609
			//$this->db->select('med_fee, pas_fee, transaction_id, medical_doctor_id');

			//edited by Mike, 20200721
//			$this->db->select('med_fee, pas_fee, x_ray_fee, lab_fee, transaction_id, medical_doctor_id, transaction_quantity');
			$this->db->select('fee, med_fee, pas_fee, x_ray_fee, lab_fee, transaction_id, medical_doctor_id, transaction_quantity');
			$this->db->where('transaction_id', $param['outputTransactionId']); //$outputTransactionId);
			$query = $this->db->get('transaction');				
//			$row = $query->row();			
			$rowArray = $query->result_array();
			
			$outputTransaction = $rowArray[0];
		}
		
		return $outputTransaction; //$rowArray[0];

/*
		$data = array(
					'notes' => "PAID"
				);

        $this->db->like('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
        $this->db->update('transaction', $data);
*/		
	}	

	//added by Mike, 20200519; edited by Mike, 20200605
	//note: reverify: delete transaction whose fee = 0 and notes = "IN-QUEUE; PAID"
	public function payTransactionServiceAndItemPurchasePrev() 
	{			
		$this->db->select('notes, transaction_id');
        $this->db->like('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));

		$query = $this->db->get('transaction');	
		
		$rowArray = $query->result_array();

		foreach ($rowArray as $rowValue) {
			$updatedValue = str_replace("UNPAID","PAID",$rowValue['notes']);

			
			$data = array(
						'notes' => $updatedValue //"PAID"
					);

			$this->db->like('notes',"UNPAID");
			//edited by Mike, 20200530
			//$this->db->where('transaction_date', date('m/d/Y'));
			$this->db->where('transaction_id', $rowValue['transaction_id']);
			$this->db->update('transaction', $data);
		}
/*
		$data = array(
					'notes' => "PAID"
				);

        $this->db->like('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
        $this->db->update('transaction', $data);
*/		
	}	

	//added by Mike, 20200529
	public function addPatientName($param) 
	{		
		$data = array(
					'patient_name' => $param['nameParam']
				);

		$this->db->insert('patient', $data);
		return $this->db->insert_id();
	}	

	//added by Mike, 20200529; edited by Mike, 20200530
	public function addNewTransactionForPatient($param) 
	{			
		$this->db->select('transaction_id, patient_id');
		//edited by Mike, 20200602
//        $this->db->where('notes',"IN-QUEUE; UNPAID");
		//these are @information desk
		//we do not anymore add a new transaction for the patient after payment
		//in addition, we do not add a new transactions for the apatient that already has an unpaid transaction for the day
        $this->db->like('notes',"PAID"); 

		$this->db->where('transaction_date', date('m/d/Y'));
		$this->db->where('patient_id', $param['patientId']);

		$query = $this->db->get('transaction');	
		
		$rowArray = $query->result_array();

//		foreach ($rowArray as $rowValue) {
//		}
		
		//TO-DO: -reverify: this				
		if (count($rowArray)==0) {
			$data = array(						
						'patient_id' => $param['patientId'],
						'item_id' => 0,
						'transaction_date' => date('m/d/Y'),
						'report_id' => 0,
						'medical_doctor_id' => $param['medicalDoctorId'],						
						'notes' => "IN-QUEUE; UNPAID"
					);

			$this->db->insert('transaction', $data);
			return $this->db->insert_id();
		}
		else {
			return False;
		}
	}	
	
	public function getMedicalDoctorList() {
		$this->db->select('medical_doctor_id, medical_doctor_name');
		
		//removed by Mike, 20200523
//		$this->db->where('medical_doctor_id !=', 0); //ANY
//		$this->db->where('medical_doctor_id !=', 3); //SUMMARY

		$query = $this->db->get('medical_doctor');	
		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
	
//		echo $rowArray[0]["medical_doctor_id"]." : ".$rowArray[0]["medical_doctor_name"];

		return $rowArray;
	}

	//TO-DO: -reverify: this
	//consider eliminating excess steps
	public function getDetailsListViaId($nameId) 
	{		
		//edited by Mike, 20200541
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.added_datetime_stamp, t3.medical_doctor_id, t3.medical_doctor_name');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

//		$this->db->distinct('t1.patient_name');
//		$this->db->like('t1.patient_name', $param['nameParam']);
		$this->db->where('t1.patient_id', $nameId);		

		//added by Mike, 20200523
//		$this->db->order_by('t2.transaction_date`', 'DESC');//ASC');
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		//added by Mike, 20200529; edited by Mike, 20200606
		$this->db->group_by('t2.added_datetime_stamp`', 'DESC');//ASC');
		//$this->db->group_by('t2.transaction_date`', 'DESC');//ASC');
		
		$query = $this->db->get('patient');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	public function getDetailsListViaIdPrev($nameId) 
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
	public function getItemDetailsListPrev($itemTypeId, $itemId) 
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

	//added by Mike, 20200328; edited by Mike, 20200603
	public function getItemDetailsListBuggy($itemTypeId, $itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date, t4.medical_doctor_name, t4.medical_doctor_id, t5.patient_name, t5.patient_id');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->join('medical_doctor as t4', 't2.medical_doctor_id = t4.medical_doctor_id', 'LEFT');
		$this->db->join('patient as t5', 't2.patient_id = t5.patient_id', 'LEFT');

		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

//		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200501


		$this->db->where('t1.item_id', $itemId);

		//TO-DO: -add: auto-identify item_type
		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine

		//edited by Mike, 20200603
		//$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');
		$this->db->order_by('t3.added_datetime_stamp`', 'DESC');//ASC');

		//added by Mike, 20200401; removed by Mike, 20200603
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();

		foreach ($rowArray as $value) {
			echo $value['quantity_in_stock'];
		}
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200328; edited by Mike, 20200519
	public function getItemDetailsList($itemTypeId, $itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date, t4.medical_doctor_name, t4.medical_doctor_id, t5.patient_name, t5.patient_id');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->join('medical_doctor as t4', 't2.medical_doctor_id = t4.medical_doctor_id', 'LEFT');
		$this->db->join('patient as t5', 't2.patient_id = t5.patient_id', 'LEFT');

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

	//added by Mike, 20200517
	public function getPaidPatientDetailsList($medicalDoctorId, $patientId) 
	{		
/* //removed by Mike, 20200608
		//added by Mike, 20200606	
		$this->db->select_max('added_datetime_stamp');
		$this->db->where('patient_id', $patientId);
		$this->db->where('notes!=', 'UNPAID');
		$this->db->where('transaction_date=', date('m/d/Y'));
		$this->db->order_by('added_datetime_stamp`', 'DESC');
		$query = $this->db->get('transaction');
		$rowOutputMaxArray = $query->result_array();
*/
	
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.x_ray_fee, t2.lab_fee, t2.notes, t2.added_datetime_stamp, t3.medical_doctor_id, t3.medical_doctor_name');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

		$this->db->distinct('t1.patient_name');
		
		//edited by Mike, 20200606
		//$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406
		
		//removed by Mike, 20200611
/*
		$this->db->group_by('t2.transaction_date');		
*/
		//$this->db->group_by('t2.added_datetime_stamp');
		//$this->db->select_max('t2.added_datetime_stamp');
/*    
		$this->db->where('t2.added_datetime_stamp',$rowOutputMaxArray[0]['added_datetime_stamp']);
*/
		
		//added by Mike, 20200611
		$this->db->where('t2.transaction_quantity!=',0);

		//removed by Mike, 20200611
/*
		//edited by Mike, 20200608
		//$this->db->select_max('t2.added_datetime_stamp');
		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=t2.transaction_date and t.patient_id=t2.patient_id)',NULL,FALSE);
*/
//		$this->db->where('t2.transaction_date',date("m/d/Y"));


		//edited by Mike, 20200519
		//TO-DO: -update: this
		$this->db->where('t2.notes!=', 'UNPAID');
/*		$this->db->like('t2.notes', 'PAID');
		$this->db->or_like('t2.notes', '; PAID');
*/
		$this->db->where('t1.patient_id', $patientId);

/*		//removed by Mike, 20200523
		//this is due to a patient may consult with multiple medical doctors
		$this->db->where('t3.medical_doctor_id', $medicalDoctorId);
*/
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		$this->db->limit(8);
		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		//added by Mike, 20200519
		//delete in the array, rows with notes whose value includes the keyword, "UNPAID"
		//array_pop($stack);
/*		foreach ($rowArray as $rowValue) {
			if (strpos(strtoupper($rowValue['notes']),"UNPAID")!==false) {
				//TO-DO: -update: this
				if (($key = array_search($rowValue, $rowArray)) !== false) {
					unset($rowArray[$key]);
				}
//				unset($rowValue);
			}
		}
*/


		foreach ($rowArray as $key => $rowValue) {
			if (strpos(strtoupper($rowValue['notes']),"UNPAID")!==false) {
//				if (($key = array_search($rowValue, $rowArray)) !== false) {
					unset($rowArray[$key]);
//				}
//				unset($rowValue);
			}
		}
		
		return $rowArray;
	}		

	//added by Mike, 20200406; edited by Mike, 20200507
	//note: items that are added a day or so after the transaction date would be shown in the view item page's history as a transaction on the day it was added
	//To correct its transaction date, we update its added datetime stamp to the transaction date with time 0.
	public function getPaidItemDetailsList($itemTypeId, $itemId) 
	{		
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t3.quantity_in_stock, t3.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.added_datetime_stamp, t3.quantity_in_stock, t3.expiration_date');
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

	//added by Mike, 20200328; edited by Mike, 20200519
	public function getItemDetailsListViaNotesUnpaid() 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_type_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity');
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

	//added by Mike, 20200519
	public function getServiceAndItemDetailsListViaNotesUnpaid() 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_type_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.x_ray_fee, t2.lab_fee, t2.fee_quantity, t3.patient_name, t3.patient_id');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('patient as t3', 't2.patient_id = t3.patient_id', 'LEFT');

		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200407
		
		$this->db->where('t2.transaction_date', date('m/d/Y'));//ASC');
//		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine
		$this->db->like('t2.notes', "UNPAID");
		
		//added by Mike, 202005029
		$this->db->not_like('t2.notes', "IN-QUEUE");
		
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

	//added by Mike, 20200406; edited by Mike, 20200603
	//OK in viewItemMedicine for available quantity in stock
	//TO-DO: -re-verify
	public function getItemAvailableQuantityInStockBuggy($itemTypeId, $itemId)
//	public function getItemAvailableQuantityInStock($itemTypeId, $itemId, $expirationDate)
	{		
		$this->db->select('t2.quantity_in_stock, t1.item_name');
		$this->db->from('item as t1');
		
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2); //2 = Non-medicine

		$query = $this->db->get('item');

//		$row = $query->row();
		
		$inventoryRowArray = $query->result_array();	
		
/*
		echo $row->item_name;
		echo "qty".$row->quantity_in_stock;
*/		
		$iQuantity = 0;
		//added by Mike, 20200411
//		if (isset($row->quantity_in_stock)) {
		if (isset($inventoryRowArray[0]['quantity_in_stock'])) {
//			$iQuantity = $row->quantity_in_stock;
			$iQuantity = $inventoryRowArray[0]['quantity_in_stock'];
		}
		//added by Mike, 20200414
		else {
			//edited by Mike, 20200527
			return -1;//-9999;//-1; //9999;
		}
				
		if ($iQuantity==0) {
			return 0;
		}
		
		echo "iQuantity: ".$iQuantity;
		
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
		
		$iInventoryCount = 0;
		
		$inventoryRowArray[$iInventoryCount]['quantity_in_stock'] = $iQuantity;
		
		foreach ($rowArray as $value) {
/*echo ">>";
echo "now: ".$iQuantity;

echo "bought:".floor($value['fee']/$value['item_price']*100/100)."<br/>";
*/
			//edited by Mike, 20200422
//			$iQuantity = $iQuantity - $value['fee']/$value['item_price'];
			$iQuantity = $iQuantity - floor($value['fee']/$value['item_price']*100/100);

/*			echo "result loob: ".$iQuantity;
*/			
			$inventoryRowArray[$iInventoryCount]['quantity_in_stock'] = $iQuantity;

/*			echo "remaining: ".$inventoryRowArray[$iInventoryCount]['quantity_in_stock'];
*/
			if ($inventoryRowArray[$iInventoryCount]['quantity_in_stock'] < 0) {
/*echo ">>>>";
*/
				$iInventoryCount = $iInventoryCount + 1;

				if ($iInventoryCount<=count($inventoryRowArray)) {
					$iQuantity = $inventoryRowArray[$iInventoryCount]['quantity_in_stock'];
					
/*					echo "add:".$iQuantity;
*/
					$iQuantity = $iQuantity - floor($value['fee']/$value['item_price']*100/100);					
				}
//				if ($inventoryRowArray[$iInventoryCount-1]['quantity_in_stock'] < 0) {
//					$inventoryRowArray[$iInventoryCount]['quantity_in_stock'] = $inventoryRowArray[$iInventoryCount]['quantity_in_stock'] - $inventoryRowArray[$iInventoryCount-1]['quantity_in_stock'];
//				}
			}
						
//			echo "<br/>".$iQuantity;
		}

		return $iQuantity;
	}
	
	//added by Mike, 20200406; edited by Mike, 20200603
	public function getItemAvailableQuantityInStock($itemTypeId, $itemId)
//	public function getItemAvailableQuantityInStock($itemTypeId, $itemId, $expirationDate)
	{			
		$this->db->select('t2.quantity_in_stock, t1.item_name');
		$this->db->from('item as t1');
		
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2); //2 = Non-medicine

		$query = $this->db->get('item');

		$row = $query->row();
/*
		echo $row->item_name;
		echo "qty".$row->quantity_in_stock;
*/		

		$iQuantity = 0;
		//added by Mike, 20200411
		if (isset($row->quantity_in_stock)) {
			$iQuantity = $row->quantity_in_stock;
		}
		//added by Mike, 20200414
		else {
			//edited by Mike, 20200527
			return -1;//-9999;//-1; //9999;
		}
				
		if ($iQuantity==0) {
			return 0;
		}
		
		//edited by Mike, 20200617
		//$this->db->select('t1.item_price, t2.fee');
		$this->db->select('t1.item_price, t2.fee, t2.fee_quantity');
		$this->db->from('item as t1');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->where('t1.item_id', $itemId);
		//edited by Mike, 20200625
		//note: we include transactions in the cart list, albeit unpaid
		//$this->db->where('t2.notes', "PAID");
		$this->db->like('t2.notes', "PAID");
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

			//edited by Mike, 20200617
//			$iQuantity = $iQuantity - floor($value['fee']/$value['item_price']*100/100);

			$iQuantity = $iQuantity - $value['fee_quantity'];
		}
		
		return $iQuantity;
	}

	//added by Mike, 20200406; edited by Mike, 20200603
	public function getItemAvailableQuantityInStockPrev($itemTypeId, $itemId)
//	public function getItemAvailableQuantityInStock($itemTypeId, $itemId, $expirationDate)
	{		
		$this->db->select('t2.quantity_in_stock, t1.item_name');
		$this->db->from('item as t1');
		
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2); //2 = Non-medicine


		$query = $this->db->get('item');

		$row = $query->row();		
/*
		echo $row->item_name;
		echo "qty".$row->quantity_in_stock;
*/		
		$iQuantity = 0;
		//added by Mike, 20200411
		if (isset($row->quantity_in_stock)) {
			$iQuantity = $row->quantity_in_stock;
		}
		//added by Mike, 20200414
		else {
			//edited by Mike, 20200527
			return -1;//-9999;//-1; //9999;
		}
				
		if ($iQuantity==0) {
			return 0;
		}
		
		echo $iQuantity;
		
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
			
			echo "<br/>".$iQuantity;
		}

		return $iQuantity;
	}

}
?>