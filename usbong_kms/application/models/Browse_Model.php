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
		//added by Mike, 20210212
		//TO-DO: -add: sex, age, etc
		//edited by Mike, 20210616
//		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t3.medical_doctor_name, t3.medical_doctor_id');

/* //edited by Mike, 20210721
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.notes, t3.medical_doctor_name, t3.medical_doctor_id');
		

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

		$this->db->group_by('t2.added_datetime_stamp');
*/

		//TO-DO: -reverify: this

/*		//removed by Mike, 20210723
		//added by Mike, 20210721
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.notes');
*/
		
		//TO-DO: update: due to patient name has keywords "NONE" and/or "WALA"
		//reminder: we use "NONE, WALA" for transactions
		//whose patient_id is not certain
		if ((strpos(strtoupper($param['nameParam']),"NONE")!==false)
			or (strpos(strtoupper($param['nameParam']),"WALA")!==false)) {
			//added by Mike, 20210723
			$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.notes, t2.medical_doctor_id');
					
			$this->db->from('patient as t1');
			$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
			
			//edited by Mike, 20210723
//			$this->db->group_by('t2.added_datetime_stamp');
			$this->db->group_by('t1.patient_id');
				
			$this->db->where('t1.patient_id =', 0); //"NONE" patient_id=0			
			
			//added by Mike, 20210723
			$this->db->where('t2.item_id =', 0);			
		}
		else {
			//added by Mike, 20210723
			$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.notes, t2.medical_doctor_id, t3.medical_doctor_name');

			$this->db->from('patient as t1');
			$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
			$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

			//added by Mike, 20210723
			//TO-DO: -add: max for same patient_id

			$this->db->group_by('t2.added_datetime_stamp');

			$this->db->like('t1.patient_name', $param['nameParam']);

			//added by Mike, 20210616; edited by Mike, 20210723
			//note: due to add in output only last visit 
			//for service transaction, e.g. Consultation
			
			//note: output shall not include patients who buy item ONLY
			//example: med item only
			
//			$this->db->not_like('t2.notes', "ONLY");

			//note: added combined total transaction 2020-06-11 onwards
			//removed by Mike, 20210619
			//TO-DO: -reverify: this action
	//		$this->db->where('t2.transaction_quantity !=', 0); 
			
			//added by Mike, 20200427
			$this->db->where('t1.patient_name !=', "CANCELLED");

			//added by Mike, 20200529
			$this->db->where('t1.patient_name !=', "NONE");
		}
		
		//edited by Mike, 20200527
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
			//added by Mike, 20210723			
			//if patient name is "NONE", et cetera; 
			//previously, combined transactions did need 
			//to have a set medical_doctor_id
			//backward compatible
			//TO-DO: -reverify: this
			if ($row["patient_id"]==0) {
			}
			else {
				if ($row["medical_doctor_id"]==0) { //NONE; not patient, "NONE, WALA"
					//edited by Mike, 20210723
					//continue
					if (strpos($row["notes"], "IN-QUEUE")!==false) {
					}
					else {
						continue;
					}
				}
			}
						
			if ($patientId==$row["patient_id"]) {				

				//added by Mike, 20210723
				if ($bIsSamePatientId) {
					continue;
				}							
						
				$bIsSamePatientId = true;

				$prevRowOfSamePatient = array_pop($outputArray);
				
				//TO-DO: -reverify: this
				
				if (strpos($prevRowOfSamePatient["notes"],"ONLY") !==false) { //ANY
					array_push($outputArray, $row);
				}
				else {
					array_push($outputArray, $prevRowOfSamePatient);
				}
				
/*	//removed by Mike, 20210723
				//added by Mike, 20210719; edited by Mike, 20210720
				//TO-DO: -reverify: this
				$prevRowOfSamePatient = array_pop($outputArray);
				
				//edited by Mike, 20210721
//				if ($prevRowOfSamePatient["medical_doctor_id"]==0) { //ANY
				if (!isset($prevRowOfSamePatient["medical_doctor_id"]) or ($prevRowOfSamePatient["medical_doctor_id"]==0)) { //ANY

					array_pop($outputArray);
					array_push($outputArray, $row);
				}
				else {
					array_push($outputArray, $prevRowOfSamePatient);
				}
*/				
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

	//added by Mike, 20210209
	public function getNewestPatientDetailsListViaId($param) 
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
		
		//edited by Mike, 20210209
//		$this->db->like('t1.patient_name', $param['nameParam']);
		$this->db->where('t1.patient_id', $param['idParam']);
		
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
	
	//edited by Mike, 20200411; edited by Mike, 20200819
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
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.quantity_in_stock, t2.expiration_date');

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
	
//removed by Mike, 20210207
//		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
		
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');

//removed by Mike, 20210207
//		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');
		//added by Mike, 20210207
		//we use added_datetime_stamp due to select medicine items may be bought,
		//albeit not based on nearest expiration date
		//due to excess patient waiting time to find item
		$this->db->order_by('t2.added_datetime_stamp', 'ASC');//ASC');


		//edited by Mike, 20200709
//		$this->db->limit(8);//1);
		//removed by Mike, 20200819
//		$this->db->limit(14);
		
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

	//added by Mike, 20201104
	public function getSnackDetailsListViaName($param) 
	{
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t2.inventory_id');
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		$this->db->where('t1.item_type_id', 3); //3 = snack//2 = Non-medicine

		$this->db->like('t1.item_name', $param['nameParam']);
		
		//added by Mike, 20200607
		$this->db->order_by('t1.item_name', 'ASC');
//removed by Mike, 20210207
//		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
		
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
//removed by Mike, 20210207
//		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');

//added by Mike, 20210207
		//we use added_datetime_stamp due to select medicine items may be bought,
		//albeit not based on nearest expiration date
		//due to excess patient waiting time to find item
		$this->db->order_by('t2.added_datetime_stamp', 'ASC');//ASC');

		//edited by Mike, 20200709
//		$this->db->limit(8);//1);
		//removed by Mike, 20200819
//		$this->db->limit(14);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
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
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.quantity_in_stock, t2.expiration_date');

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
	//TO-DO: -use: getItemDetailsListViaId(...)
	public function getMedicineDetailsListViaId($param) 
	{		
		//edited by Mike, 20210110
		//$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.quantity_in_stock, t2.expiration_date');

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

	//added by Mike, 20210110
	public function getItemDetailsListViaId($param) 
	{		
	
		//edited by Mike, 20210110
		//$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t2.inventory_id');
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		$this->db->where('t1.item_type_id', $param['itemTypeId']); //1); //1 = Medicine

		//edited by Mike, 20200604
		$this->db->where('t1.item_id', $param['itemId']);

		//added by Mike, 20200607
//		$this->db->order_by('t1.item_name', 'ASC');
		//$this->db->order_by('t2.added_datetime_stamp', 'ASC'); //we do this for cases with equal expiration dates

//removed by Mike, 20210207
//		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
				
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');

		//removed by Mike, 20210207
//		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');		

		//added by Mike, 20210207
		//we use added_datetime_stamp due to select medicine items may be bought,
		//albeit not based on nearest expiration date
		//due to excess patient waiting time to find item
		$this->db->order_by('t2.added_datetime_stamp', 'ASC');//ASC');

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
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.quantity_in_stock, t2.expiration_date');
 
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

//removed by Mike, 20210207
//		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
				
		//added by Mike, 20200527
		//$this->db->order_by('t2.expiration_date', 'DESC');//ASC');

		//removed by Mike, 20210207
//		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');

		//added by Mike, 20210207
		//we use added_datetime_stamp due to select medicine items may be bought,
		//albeit not based on nearest expiration date
		//due to excess patient waiting time to find item
		$this->db->order_by('t2.added_datetime_stamp', 'ASC');//ASC');

		//edited by Mike, 20200811
		//$this->db->limit(8);//1);
//		$this->db->limit(10);//1); //removed by Mike, 20200811
		
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
	//updated instructions to NOT execute the following action:
	//if we delete the patient health service transaction, all the medicine and non-medicne items included in the cart after payment are also deleted
	public function deleteTransactionServicePurchase($param) 
	{			
/*		//edited by Mike, 20200616
        $this->db->where('transaction_id',$param['transactionId']);
        $this->db->delete('transaction');
*/

		//added by Mike, 20201210
		//-----
		//note: transactions added at Information Desk using another IP address
		//machine address not yet successfully identified
		//part 0		
		$data = array(
					'notes' => "IN-QUEUE; UNPAID" //"PAID"
				);

		$this->db->where('notes',"IN-QUEUE; PAID");
		$this->db->where('patient_id', $param['patientId']);
		$this->db->update('transaction', $data);
		//-----


		$iTransactionId = $param['transactionId'];

		$this->db->select('transaction_quantity');
		$this->db->where('transaction_id',$iTransactionId);
		$query = $this->db->get('transaction');
		$row = $query->row();

		//edited by Mike, 20201115
		//$transactionQuantity = $row->transaction_quantity;
		if (isset($row->transaction_quantity)) {
			$transactionQuantity = $row->transaction_quantity;
		}
		//if the transaction has already been deleted in another web page
		else {
			return;
		}

		if ($transactionQuantity==0) {
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('transaction');
			
			//added by Mike, 20201120
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('receipt');
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
				//----
				$this->db->where('item_id',0);
				$this->db->delete('transaction');

				//added by Mike, 20201120
				$this->db->where('transaction_id',$iTransactionId);
				$this->db->delete('receipt');

				//added by Mike, 20201210
				$this->db->select('notes');
				$this->db->where('transaction_id',$iTransactionId);
				$this->db->where('item_id!=',0);
				$query = $this->db->get('transaction');
				$itemTransactionRow = $query->row();
				
				if (isset($itemTransactionRow->notes)) {
					//added by Mike, 20201212
					$classification="";
					
					//edited by Mike, 20201224
/*					if ((strpos($itemTransactionRow->notes,"SC")!==false) 
						and (strpos($itemTransactionRow->notes,"DISCOUNTED")!==true)) {
*/
					if (strpos($itemTransactionRow->notes,"DISCOUNTED")!==false) {
						$classification = "DISCOUNTED; ";
					}
					else if (strpos($itemTransactionRow->notes,"SC")!==false) {
						$classification = "SC; ";
					}
					else if (strpos($itemTransactionRow->notes,"PWD")!==false) {
						$classification = "PWD; ";
					}
				
					$updatedNotes = str_replace($classification,"",$itemTransactionRow->notes);

					$data = array(
							'notes' => $updatedNotes
						);

					$this->db->where('transaction_id',$iTransactionId);
					$this->db->update('transaction', $data);
				}
				//----


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
	//added by Mike, 20210302
	//TO-DO: -delete: excess instructions
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

			//added by Mike, 20210422
			if ($iCount==0) {
				$this->db->select('patient_id');
				$this->db->where('transaction_id',$param['transactionId']);
				$query = $this->db->get('transaction');
				$rowArray = $query->result_array();

				if (count($rowArray)!=0) {				
					$patientId=$rowArray[0]['patient_id'];
				}
			}

			//edited by Mike, 20210302
//			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee');
			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee, t1.item_id');

			$this->db->from('transaction as t1');
			$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
			$this->db->join('item_type as t3', 't2.item_type_id = t3.item_type_id', 'LEFT');
			$this->db->where('t1.transaction_id',$param['transactionId']);
			
			//added by Mike, 20210422
			$this->db->where('t1.patient_id',$patientId);
			
			$query = $this->db->get('transaction');
			$rowArray = $query->result_array();
						
			//edited by Mike, 20200626
			if (count($rowArray)!=0) {
				//edited by Mike, 20210302
//				if ($rowArray[0]['patient_id']!=0) {
				//note: since 2021-03 all transactions include patient_id
				//identify if patient transaction	
				if ($rowArray[0]['item_id']==0){
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

						//TO-DO: -reverify: this
						//added by Mike, 20210302
						//note: We use another receipt for PAS fees,
						//i.e. from non-med items,
						//added by Mike, 20201012
						if ($rowArray[0]['pas_fee']!=0) { 
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
		
		foreach ($outputArray as $dataValue) {
			$this->db->insert('receipt', $dataValue);
		}		
	}	

	
	//added by Mike, 20200508; edited by Mike, 20200710
	//add: to receipt each transaction 
	//added by Mike, 20210302
	//TO-DO: -delete: excess instructions
	public function addTransactionPaidReceiptOK($param) 
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

			//edited by Mike, 20210302
//			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee');
			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee, t1.item_id');

			$this->db->from('transaction as t1');
			$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
			$this->db->join('item_type as t3', 't2.item_type_id = t3.item_type_id', 'LEFT');
			$this->db->where('t1.transaction_id',$param['transactionId']);
			$query = $this->db->get('transaction');
			$rowArray = $query->result_array();
						
			//edited by Mike, 20200626
			if (count($rowArray)!=0) {
				//edited by Mike, 20210302
//				if ($rowArray[0]['patient_id']!=0) {
				//note: since 2021-03 all transactions include patient_id
				//identify if patient transaction	
				if ($rowArray[0]['item_id']==0){
					
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

						//TO-DO: -reverify: this
						//added by Mike, 20201012
						if ($rowArray[0]['pas_fee']!=0) { 
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
					//removed by Mike, 20210302
/*					
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
*/						
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
	
	//added by Mike, 20200508; edited by Mike, 20200710
	//add: to receipt each transaction 
	public function addTransactionPaidReceiptBuggy($param) 
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
			//edited by Mike, 20210301
//			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee');
			$this->db->select('t1.patient_id, t3.item_type_id, t1.med_fee, t1.pas_fee, t1.item_id');
			
			$this->db->from('transaction as t1');
			$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
			$this->db->join('item_type as t3', 't2.item_type_id = t3.item_type_id', 'LEFT');
			$this->db->where('t1.transaction_id',$param['transactionId']);
			$query = $this->db->get('transaction');
			$rowArray = $query->result_array();
						
			//edited by Mike, 20200626
			if (count($rowArray)!=0) {
				//identify if patient transaction
				//note: since 2021-03; all transactions include patient_id
				if ($rowArray[0]['patient_id']!=0) {
					//we automatically set the transaction with all the fees to be MOSC Receipt
					//TO-DO: -update: this to verify if there is x_ray_fee and lab_fee
					if (($param['medicalDoctorId']==1) or ($iCount==0)) { //SYSON, PEDRO
						//edited by Mike, 20210301
						$param['receiptTypeId'] = 1; //1 = MOSC Receipt; 2 = PAS Receipt

						$data = array(
							'receipt_type_id' => $param['receiptTypeId'],
							'transaction_id' => $param['transactionId'],
							'receipt_number' => $param['receiptNumberMOSC']
						);				

						//edited by Mike, 20200710
						//$this->db->insert('receipt', $data);
						array_push($outputArray, $data);

						//TO-DO: -reverify: this
/* //removed by Mike, 20210301						
						//added by Mike, 20201012
						if ($rowArray[0]['pas_fee']!=0) { 
							//NON-MEDICINE
							$param['receiptNumber'] = $param['receiptNumberPAS'];

							//edited by Mike, 20210301							
//							if ($param['receiptNumber']!=0) {
							if (($param['receiptNumber']!=0) and ($rowArray[0]['item_id']!=0)){
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
*/						
					}
					//edited by Mike, 20210301
//					else { //not SYSON, PEDRO //if ($data['medicalDoctorId']!=1) { //not SYSON, PEDRO
					else if ($param['medicalDoctorId']>1) {//not SYSON, PEDRO
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
					else if ($param['medicalDoctorId']==0) {//item						
						//added by Mike, 20200721
						if ($rowArray[0]['med_fee']!=0) { 
							//removed by Mike, 20200721; added by Mike, 20210301
							//MEDICINE	
							if (($param['receiptNumber']!=0) and ($rowArray[0]['item_id']!=0)){
								$param['receiptTypeId'] = 1; //1 = MOSC Receipt
								$data = array(
									'receipt_type_id' => $param['receiptTypeId'],
									'transaction_id' => $param['transactionId'],
									'receipt_number' => $param['receiptNumberMOSC']
								);				
								array_push($outputArray, $data);						
							}
						}
						else if ($rowArray[0]['pas_fee']!=0) { 
							//NON-MEDICINE
							$param['receiptNumber'] = $param['receiptNumberPAS'];

							//edited by Mike, 20210301							
	//						if ($param['receiptNumber']!=0) {
							if (($param['receiptNumber']!=0) and ($rowArray[0]['item_id']!=0)){
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
					
/* //removed by Mike, 20210301				
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

						//edited by Mike, 20210301							
//						if ($param['receiptNumber']!=0) {
						if (($param['receiptNumber']!=0) and ($rowArray[0]['item_id']!=0)){
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
*/										
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

	//added by Mike, 20200517; edited by Mike, 20200821
	public function addTransactionServicePurchase($param) 
	{	
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			//$this->session->set_flashdata('data', $data);
			//redirect('account/login');
			//window.open('".base_url()."/server/viewWebAddressList.php');		
			redirect('report/viewWebAddressList');
		}

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
					'notes' => $sNotesValue,
					//added by Mike, 20200821
					'ip_address_id' => $ipAddress,
					'machine_address_id' => $machineAddress
				);

		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
	}	

	//added by Mike, 20200330; edited by Mike, 20200703
	public function addTransactionItemPurchase($param) 
	{		
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			//$this->session->set_flashdata('data', $data);
			//redirect('account/login');
			//window.open('".base_url()."/server/viewWebAddressList.php');		
			redirect('report/viewWebAddressList');
		}


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
		$snackFee = 0; //added by Mike, 20201212
		
		//added by Mike, 20200703
		if ($row->item_type_id==1) { //medicine
			$medFee = $param['quantity'] * $param['fee'];
		}
		//edited by Mike, 20201212
		else if ($row->item_type_id==2) { //non-medicine
			$nonMedFee = $param['quantity'] * $param['fee'];
		}		
		else { //snack
			$snackFee = $param['quantity'] * $param['fee'];
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
					'pas_fee' => $nonMedFee,
					//added by Mike, 20201212
					'snack_fee' => $snackFee,
					//added by Mike, 20200821
					'ip_address_id' => $ipAddress,
					'machine_address_id' => $machineAddress
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
	//edited by Mike, 20200831
	//TO-DO: -reverify: this
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

			//added by Mike, 20201120
			$this->db->where('transaction_id',$iTransactionId);
			$this->db->delete('receipt');			
		}
		else {
			//TO-DO: -identify: transaction with all items and services in the cart
			//note: the transaction quantity is not 0
//			$iTransactionId = $param['transactionId'];

			//edited by Mike, 20200819
			//$transactionDate = $row->transaction_date;
			if (!isset($row)) {
				//computer has already deleted the item
				//case: unit member deletes an already deleted item
				//but is shown on the browser due to the computer 
				//does not automatically refresh the page
				return;
			}
			else {
				$transactionDate = $row->transaction_date;
			}

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
			$updatedSnackFee = 0; //added by Mike, 20201212

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

				//added by Mike, 20201120
				$this->db->where('transaction_id',$iTransactionId);
				$this->db->delete('receipt');			
			}
			else {			
				$iCount = 0;
						
				while ($iCount < $transactionQuantity) {
/*					echo "count: ".$iCount." : ";
					echo "transactionId: ".$iTransactionId."<br/>";
*/
					//20200629
					//identify if transaction is classified as medicine or non-medicine
					//edited by Mike, 20210110
//					$this->db->select('t1.item_id, t2.item_type_id, t1.med_fee, t1.pas_fee');
					$this->db->select('t1.item_id, t2.item_type_id, t1.med_fee, t1.pas_fee, t1.snack_fee');

					$this->db->from('transaction as t1');	
					$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');		
					$this->db->where('t1.transaction_id', $iTransactionId);
					$query = $this->db->get('transaction');
					$row = $query->row();

					//edited by Mike, 20200630
					if (isset($row)) {		
						//edited by Mike, 20200831
						//if ($row->item_id!=0) {
						if (($row->item_id!=0) and ($row->item_id==$param['itemId'])){
							$updatedTransactionQuantity = $updatedTransactionQuantity - 1;
							
							if ($row->item_type_id==1) {
								//edited by Mike, 20200831
								//$updatedMedFee = 0;
								$updatedMedFee = $updatedMedFee - $row->med_fee;		
							}
							else if ($row->item_type_id==2) {
								//edited by Mike, 20200831
								//$updatedNonMedFee = 0;
								$updatedNonMedFee = $updatedNonMedFee - $row->pas_fee;	
							}			
							//added by Mike, 20201212
							else if ($row->item_type_id==3) {
								//edited by Mike, 20200831
								//$updatedNonMedFee = 0;
								$updatedSnackFee = $updatedSnackFee - $row->snack_fee;	
							}			
						}
					}
														
					$this->db->where('transaction_id',$iTransactionId);

					//edited by Mike, 20200629
					//removed by Mike, 20210216; 
					//we now add the patient_id in each purchased item transaction
//					$this->db->where('patient_id',0);
					
					//added by Mike, 20200629
	//				$this->db->where('item_id',0);
					
					//added by Mike, 20200831
					$this->db->where('item_id',$param['itemId']);

/*					ECHO "DELETE".$iTransactionId;										
					ECHO "DELETE_PARAM_ITEM_ID".$param['itemId'];										
*/
					$this->db->delete('transaction');

					//added by Mike, 20201120
/*					ECHO "DELETE".$iTransactionId;
*/
					$this->db->where('transaction_id',$iTransactionId);
					$this->db->delete('receipt');			


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
						'pas_fee' => $updatedNonMedFee,
						//added by Mike, 20201212
						'snack_fee' => $updatedSnackFee						
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

	//added by Mike, 20201026
	//add new transaction with the total for each item type
	public function addVATBeforePayTransactionItemPurchase($patientId) 
	{			
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			redirect('report/viewWebAddressList');
		}
		
		//added by Mike, 20200916
		//identify patient classification, e.g. SC, PWD
		$this->db->select('notes');
		$this->db->where('patient_id', $patientId);
		$this->db->where('transaction_date', date('m/d/Y'));
		
		//added by Mike, 20210226
		//get the newest transaction
		//removed by Mike, 20210226
//		$this->db->where('added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=transaction_date and t.patient_id=patient_id)',NULL,FALSE);
		$this->db->order_by('added_datetime_stamp', 'DESC');//ASC');
		
		$query = $this->db->get('transaction');		
		$patientTransactionRowArray = $query->result_array();

		$classification = "";
		
		//edited by Mike, 20201210
//		if (strpos($patientTransactionRowArray[0]['notes'],"SC")!==false) {
	//edited by Mike, 20201224
/*		if ((strpos($patientTransactionRowArray[0]['notes'],"SC")!==false)
			and (strpos($patientTransactionRowArray[0]['notes'],"DISCOUNTED")!==true)) {
*/
		if (strpos($patientTransactionRowArray[0]['notes'],"DISCOUNTED")!==false) {
		}
		else if (strpos($patientTransactionRowArray[0]['notes'],"SC")!==false) {
			$classification = "SC; ";
		}
		else if (strpos($patientTransactionRowArray[0]['notes'],"PWD")!==false) {
			$classification = "PWD; ";
		}
//removed by Mike, 20210214
//echo $classification;

		//added by Mike, 20201027
		if (($classification=="SC; ") or ($classification=="PWD; ")) {			
			echo "<font color='#FF0000'><b>PAALALA: NO VAT FOR PATIENTS CLASSIFIED AS SC and PWD. </b></font><br/>";

//			return null;
			return "noVAT";			
		}

/*		
		echo "patientTransactionRowArray[0]['notes']: ".$patientTransactionRowArray[0]['notes'];
		echo "classification: ".$classification;
*/		
		//added by Mike, 20200605
		//part 1
		//edited by Mike, 20201026
//		$this->db->select('t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->select('t1.transaction_id, t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->from('transaction as t1');
		$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.notes', "UNPAID");
		$this->db->where('t1.transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('t1.ip_address_id', $ipAddress);
		$this->db->where('t1.machine_address_id', $machineAddress);
				
		$this->db->group_by('t1.transaction_id');
		$query = $this->db->get('transaction');
		$rowArray = $query->result_array();

		$totalFeeMedicine = 0;
		$totalFeeNonMedicine = 0;

		//added by Mike, 20200610
		//echo "count: ".count($rowArray);
		$transactionQuantity = count($rowArray)+1; //start at 1
		
		
		//edited by Mike, 20201026
//		foreach ($rowArray as $rowValue) {
		foreach ($rowArray as &$rowValue) {

			//note: add VAT for non-medicine item only
			
			if ($rowValue['item_type_id']==1) { //medicine
				//removed by Mike, 20201026
				//$totalFeeMedicine = $totalFeeMedicine + $rowValue['fee'];								
			}
			//added by Mike, 20201104
			else if ($rowValue['item_type_id']==3) { //snack
			}
			else {
				//non-medicine item
				//add 12% VAT
				$rowValue['fee'] = $rowValue['fee'] + $rowValue['fee']*0.12;
				
				//removed by Mike, 20201027
//				echo "transaction_id:".$rowValue['transaction_id'];
				
				//removed by Mike, 20201026
				//$totalFeeNonMedicine = $totalFeeNonMedicine + $rowValue['fee'];

				//added by Mike, 20201026
				$data = array(				
							'fee' => $rowValue['fee'],
							'pas_fee' => $rowValue['fee'],
						);
/*
				$this->db->where('notes',"UNPAID");
				$this->db->where('transaction_date', date('m/d/Y'));
				//added by Mike, 20200821
				$this->db->where('ip_address_id', $ipAddress);
				$this->db->where('machine_address_id', $machineAddress);
*/
				$this->db->where('transaction_id', $rowValue['transaction_id']);

				$this->db->update('transaction', $data);


			}		
/*			echo "totalFeeMedicine: ".$totalFeeMedicine."<br/>";
			echo "totalFeeNonMedicine: ".$totalFeeNonMedicine."<br/>";
			echo ">";
*/			
		}
		//added by Mike, 20201026
		unset($rowValue);
		
/*		echo ">>>";
		echo "totalFeeMedicine: ".$totalFeeMedicine."<br/>";
		echo "totalFeeNonMedicine: ".$totalFeeNonMedicine."<br/>";
*/
		
/* //removed by Mike, 20201026		
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
					//edited by Mike, 20200916
//					'notes' => "PAID",
					'notes' => $classification."PAID",
					'transaction_quantity' => $transactionQuantity, //edited by Mike, 20200610
					//added by Mike, 20200821
					'ip_address_id' => $ipAddress,
					'machine_address_id' => $machineAddress
				);

		$this->db->insert('transaction', $data);
		$outputTransactionId = $this->db->insert_id();

		//part 2
		$data = array(
					//edited by Mike, 20200916
//					'notes' => "PAID",
					'notes' => $classification."PAID",
				);

        $this->db->where('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

        $this->db->update('transaction', $data);
		
		//edited by Mike, 20200610
		//return $outputTransactionId;
		//edited by Mike, 20200616
//		$this->db->select('transaction_id, fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->select('transaction_id, fee, x_ray_fee, lab_fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->where('transaction_id', $outputTransactionId);
		//added by Mike, 20200821
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

		$query = $this->db->get('transaction');		
		$rowArray = $query->result_array();
*/

		return $rowArray[0];
	}	

	//added by Mike, 20201027
	//add new transaction with the total for each item type
	public function lessVATBeforePayTransactionItemPurchase($patientId) 
	{			
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			redirect('report/viewWebAddressList');
		}
		
		//added by Mike, 20200916
		//identify patient classification, e.g. SC, PWD
		$this->db->select('notes');
		$this->db->where('patient_id', $patientId);
		$this->db->where('transaction_date', date('m/d/Y'));
		
		//added by Mike, 20210226
		//get the newest transaction
		$this->db->order_by('added_datetime_stamp', 'DESC');//ASC');
		
		$query = $this->db->get('transaction');		
		$patientTransactionRowArray = $query->result_array();

		$classification = "";

		//added by Mike, 20201122
		if (count($patientTransactionRowArray)!=0) {			
			if (strpos($patientTransactionRowArray[0]['notes'],"SC")!==false) {
				$classification = "SC; ";
			}
			else if (strpos($patientTransactionRowArray[0]['notes'],"PWD")!==false) {
				$classification = "PWD; ";
			}

			//added by Mike, 20201027
			if (($classification=="SC; ") or ($classification=="PWD; ")) {			
				echo "<font color='#FF0000'><b>PAALALA: NO VAT FOR PATIENTS CLASSIFIED AS SC and PWD. </b></font><br/>";

	//			return null;
				return "noVAT";
			}
		}
		
/*		
		echo "patientTransactionRowArray[0]['notes']: ".$patientTransactionRowArray[0]['notes'];
		echo "classification: ".$classification;
*/		
		//added by Mike, 20200605
		//part 1
		//edited by Mike, 20201026
//		$this->db->select('t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->select('t1.transaction_id, t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->from('transaction as t1');
		$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.notes', "UNPAID");
		$this->db->where('t1.transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('t1.ip_address_id', $ipAddress);
		$this->db->where('t1.machine_address_id', $machineAddress);
				
		$this->db->group_by('t1.transaction_id');
		$query = $this->db->get('transaction');
		$rowArray = $query->result_array();

		$totalFeeMedicine = 0;
		$totalFeeNonMedicine = 0;

		//added by Mike, 20200610
		//echo "count: ".count($rowArray);
		$transactionQuantity = count($rowArray)+1; //start at 1
		
		
		//edited by Mike, 20201026
//		foreach ($rowArray as $rowValue) {
		foreach ($rowArray as &$rowValue) {

			//note: add VAT for non-medicine item only
			
			if ($rowValue['item_type_id']==1) { //medicine
				//removed by Mike, 20201026
				//$totalFeeMedicine = $totalFeeMedicine + $rowValue['fee'];								
			}
			//added by Mike, 20201104
			else if ($rowValue['item_type_id']==3) { //snack
			}
			else {
				//non-medicine item
				//less 12% VAT
				//note: algebra; variables = containers whose value inside may vary
				$rowValue['fee'] = $rowValue['fee'] / (1 + 0.12);
				
				//removed by Mike, 20201027
//				echo "transaction_id:".$rowValue['transaction_id'];
				
				//removed by Mike, 20201026
				//$totalFeeNonMedicine = $totalFeeNonMedicine + $rowValue['fee'];

				//added by Mike, 20201026
				$data = array(
							'fee' => $rowValue['fee'],
							'pas_fee' => $rowValue['fee'],
						);
/*
				$this->db->where('notes',"UNPAID");
				$this->db->where('transaction_date', date('m/d/Y'));
				//added by Mike, 20200821
				$this->db->where('ip_address_id', $ipAddress);
				$this->db->where('machine_address_id', $machineAddress);
*/
				$this->db->where('transaction_id', $rowValue['transaction_id']);

				$this->db->update('transaction', $data);


			}		
/*			echo "totalFeeMedicine: ".$totalFeeMedicine."<br/>";
			echo "totalFeeNonMedicine: ".$totalFeeNonMedicine."<br/>";
			echo ">";
*/			
		}
		//added by Mike, 20201026
		unset($rowValue);
		
		//edited by Mike, 2020116
		//return $rowArray[0];
		if (isset($rowArray[0])) {
			return $rowArray[0];
		}
		
		return null;		
	}	


	//added by Mike, 20200411; edited by Mike, 20200916
	//add new transaction with the total for each item type
	public function payTransactionItemPurchase($patientId) 
	{			
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			redirect('report/viewWebAddressList');
		}
		
		//added by Mike, 20200916
		//identify patient classification, e.g. SC, PWD
		$this->db->select('notes');
		$this->db->where('patient_id', $patientId);
		$this->db->where('transaction_date', date('m/d/Y'));

		//added by Mike, 20210302
		//get the newest transaction
		$this->db->order_by('added_datetime_stamp', 'DESC');//ASC');
		
		//added by Mike, 20201210
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

		$query = $this->db->get('transaction');		
		$patientTransactionRowArray = $query->result_array();

		$classification = "";
		
		//added by Mike, 20201027
		if (isset($patientTransactionRowArray[0])) {
			//edited by Mike, 20201224
			//if (strpos($patientTransactionRowArray[0]['notes'],"SC")!==false) {
			if (strpos($patientTransactionRowArray[0]['notes'],"DISCOUNTED")!==false) {
				//TO-DO: verify: if set $classification = "DISCOUNTED; " is necessary
				$classification = "DISCOUNTED; ";
			}
			else if (strpos($patientTransactionRowArray[0]['notes'],"SC")!==false) {
				$classification = "SC; ";
			}
			else if (strpos($patientTransactionRowArray[0]['notes'],"PWD")!==false) {
				$classification = "PWD; ";
			}
		}

/*		
		echo "patientTransactionRowArray[0]['notes']: ".$patientTransactionRowArray[0]['notes'];
		echo "classification: ".$classification;
*/		
		//added by Mike, 20200605
		//part 1
		$this->db->select('t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->from('transaction as t1');
		$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.notes', "UNPAID");
		$this->db->where('t1.transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('t1.ip_address_id', $ipAddress);
		$this->db->where('t1.machine_address_id', $machineAddress);
				
		$this->db->group_by('t1.transaction_id');
		$query = $this->db->get('transaction');
		$rowArray = $query->result_array();

		$totalFeeMedicine = 0;
		$totalFeeNonMedicine = 0;
		//added by Mike, 20201212
		$totalFeeSnack = 0;
		
		//added by Mike, 20200610
		//echo "count: ".count($rowArray);
		$transactionQuantity = count($rowArray)+1; //start at 1

		foreach ($rowArray as $rowValue) {
			if ($rowValue['item_type_id']==1) { //medicine
				$totalFeeMedicine = $totalFeeMedicine + $rowValue['fee'];								
			}
			//edited by Mike, 20201212
			else if ($rowValue['item_type_id']==2) { //non-medicine
				$totalFeeNonMedicine = $totalFeeNonMedicine + $rowValue['fee'];
			}		
			else {
				$totalFeeSnack = $totalFeeSnack + $rowValue['fee'];
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
					'snack_fee' => $totalFeeSnack, //added by Mike, 20201212
					'transaction_type_name' => "CASH",
					'report_id' => 0,
					//edited by Mike, 20200916
//					'notes' => "PAID",
					'notes' => $classification."PAID",
					'transaction_quantity' => $transactionQuantity, //edited by Mike, 20200610
					//added by Mike, 20200821
					'ip_address_id' => $ipAddress,
					'machine_address_id' => $machineAddress
				);

		$this->db->insert('transaction', $data);
		$outputTransactionId = $this->db->insert_id();

		//part 2
		$data = array(
					//edited by Mike, 20200916
//					'notes' => "PAID",
					'notes' => $classification."PAID",


					//added by Mike, 20210214
					'patient_id' => $patientId //TO-DO: -reverify: this
				);

        $this->db->where('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

        $this->db->update('transaction', $data);
		
		//edited by Mike, 20200610
		//return $outputTransactionId;
		//edited by Mike, 20200616
//		$this->db->select('transaction_id, fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		//edited by Mike, 20201212
//		$this->db->select('transaction_id, fee, x_ray_fee, lab_fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		//edited by Mike, 20210122
//		$this->db->select('transaction_id, fee, x_ray_fee, lab_fee, pas_fee, med_fee, snack_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->select('transaction_id, fee, x_ray_fee, lab_fee, pas_fee, med_fee, snack_fee, medical_doctor_id, fee_quantity, transaction_quantity, notes');

		$this->db->where('transaction_id', $outputTransactionId);
		//added by Mike, 20200821
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

		$query = $this->db->get('transaction');		
		$rowArray = $query->result_array();

		return $rowArray[0];
	}	


	//added by Mike, 20200411; edited by Mike, 20200821
	//add new transaction with the total for each item type
	public function payTransactionItemPurchasePrev() 
	{			
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			redirect('report/viewWebAddressList');
		}
		
		//added by Mike, 20200605
		//part 1
		$this->db->select('t1.fee, t2.item_type_id'); //, item_quantity');
		$this->db->from('transaction as t1');	
		$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');		
		$this->db->where('t1.notes', "UNPAID");
		$this->db->where('t1.transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('t1.ip_address_id', $ipAddress);
		$this->db->where('t1.machine_address_id', $machineAddress);
				
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
					'transaction_quantity' => $transactionQuantity, //edited by Mike, 20200610
					//added by Mike, 20200821
					'ip_address_id' => $ipAddress,
					'machine_address_id' => $machineAddress
				);

		$this->db->insert('transaction', $data);
		$outputTransactionId = $this->db->insert_id();

		//part 2
		$data = array(
					'notes' => "PAID",
				);

        $this->db->where('notes',"UNPAID");
		$this->db->where('transaction_date', date('m/d/Y'));
		//added by Mike, 20200821
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

        $this->db->update('transaction', $data);
		
		//edited by Mike, 20200610
		//return $outputTransactionId;
		//edited by Mike, 20200616
//		$this->db->select('transaction_id, fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->select('transaction_id, fee, x_ray_fee, lab_fee, pas_fee, med_fee, medical_doctor_id, fee_quantity, transaction_quantity');
		$this->db->where('transaction_id', $outputTransactionId);
		//added by Mike, 20200821
		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);

		$query = $this->db->get('transaction');		
		$rowArray = $query->result_array();

		return $rowArray[0];
	}	

	//added by Mike, 20200519; edited by Mike, 20200611
	//note: reverify: delete transaction whose fee = 0 and notes = "IN-QUEUE; PAID"
	//TO-DO: -delete: "AndItem" in function name
	public function payTransactionServiceAndItemPurchase($param)//$outputTransactionId)
	{			
		//added by Mike, 20200821
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");
		
//		if (($ipAddress=="") and ($machineAddress=="")) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
			redirect('report/viewWebAddressList');
		}
		
		//added by Mike, 20201105; removed by Mike, 20201105
//		echo "patientId".$param['patientId'];
		
		//added by Mike, 20201210; removed by Mike, 20210122
		//note: transactions added at Information Desk using another IP address
		//machine address not yet successfully identified
		//part 0		
/*		
		$data = array(
					'notes' => "IN-QUEUE; PAID" //"PAID"
				);

		$this->db->where('notes',"IN-QUEUE; UNPAID");
		$this->db->where('patient_id', $param['patientId']);
		$this->db->update('transaction', $data);
*/
		
		//edited by Mike, 20200605
//		$this->db->select('notes, transaction_id');
		//edited by Mike, 20210122
//		$this->db->select('notes, transaction_id, fee, fee_quantity, x_ray_fee, lab_fee, medical_doctor_id, patient_id');
		//edited by Mike, 20210127
//		$this->db->select('notes, transaction_id, fee, fee_quantity, x_ray_fee, lab_fee, medical_doctor_id, patient_id, item_id');
		$this->db->select('notes, transaction_id, fee, fee_quantity, x_ray_fee, lab_fee, medical_doctor_id, patient_id, item_id, med_fee, pas_fee, snack_fee');
        
		$this->db->like('notes',"UNPAID");
		
		$this->db->where('transaction_date', date('m/d/Y'));
		
		//added by Mike, 20200608
		$this->db->where('patient_id', $param['patientId']);

		//added by Mike, 20200821
		//removed by Mike, 20200821
/*		$this->db->where('ip_address_id', $ipAddress);
		$this->db->where('machine_address_id', $machineAddress);
*/		
		$query = $this->db->get('transaction');	
	
		$rowArray = $query->result_array();

		//added by Mike, 20200611
		//echo "count: ".count($rowArray);
		//$transactionQuantity = count($rowArray)+1; //start at 1
		$transactionQuantity = $param['outputTransaction']['transaction_quantity'] + count($rowArray); //start at 1

		//added by Mike, 20200607
		$outputTransaction = null;

		//added by Mike, 20210122
		//---
		//note: transactions added at Information Desk using another IP address
		//machine address not yet successfully identified
		//part 0
		$bHasPaidForServiceTransaction=false;
				
		//edited by Mike, 20210128		
//		foreach ($rowArray as $rowValue) {
		foreach ($rowArray as &$rowValue) {
			//added by Mike, 20210128
			if (strpos($rowValue['notes'],"IN-QUEUE")!==false) {
			}
			else {
				//added by Mike, 20210127
				if (($rowValue['fee']==0) and ($rowValue['x_ray_fee']==0) and ($rowValue['lab_fee']==0)){
					//added by Mike, 20210129
					if (strpos($rowValue['notes'],"NC;")!==false) {
					}					
					else if (strpos($rowValue['notes'], "ONLY")!==false) {
					}
					else {
						//edited by Mike, 20210128
						$rowValue['notes']=$rowValue['notes']."; ONLY";
					}
				}
			}
//--
			//identify transactions that are snack only, non-med only, and med only
			//we use "ONLY" keyword
			if (strpos($rowValue['notes'],"ONLY")!==false) {
			}
			else {
				if (strpos($rowValue['notes'],"IN-QUEUE")!==false) {
					//removed by Mike, 20210127
/*					
					if ($rowValue['item_id']!=0) {
						$bHasPaidForServiceTransaction=true;
					}
*/
				}
				//added by Mike, 20210127
				else {
					if ($rowValue['item_id']==0) {
						$bHasPaidForServiceTransaction=true;
					}
				}
			}
		}
		//added by Mike, 20210128
		unset($rowValue);

		if ($bHasPaidForServiceTransaction) {
			$data = array(
						'notes' => "IN-QUEUE; PAID" //"PAID"
					);

			$this->db->where('notes',"IN-QUEUE; UNPAID");
			$this->db->where('patient_id', $param['patientId']);
			$this->db->update('transaction', $data);
		}
		//TO-DO: -reverify: transaction_quantity due to "IN-QUEUE; PAID"
		//value may be 3, albeit not in the adjacent sequence in list
		//---
		
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
			
			//added by Mike, 20201210
			$this->db->where('ip_address_id', $ipAddress);
			$this->db->where('machine_address_id', $machineAddress);

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
						//added by Mike, 20200821
						'ip_address_id' => $ipAddress,
						'machine_address_id' => $machineAddress
					);
			
			//added by Mike, 20200605			
			$this->db->where('transaction_id', $param['outputTransactionId']); //$outputTransactionId);

			//added by Mike, 20200821
			$this->db->where('ip_address_id', $ipAddress);
			$this->db->where('machine_address_id', $machineAddress);

			$this->db->update('transaction', $dataOutputTransaction);			
			
			//edited by Mike, 20200721
//			$this->db->select('med_fee, pas_fee, x_ray_fee, lab_fee, transaction_id, medical_doctor_id, transaction_quantity');
			//edited by Mike, 20210128
//			$this->db->select('fee, med_fee, pas_fee, x_ray_fee, lab_fee, transaction_id, medical_doctor_id, transaction_quantity');
			$this->db->select('fee, med_fee, pas_fee, snack_fee, x_ray_fee, lab_fee, transaction_id, medical_doctor_id, transaction_quantity, notes');

			$this->db->where('transaction_id', $param['outputTransactionId']); //$outputTransactionId);

			//added by Mike, 20200821
			$this->db->where('ip_address_id', $ipAddress);
			$this->db->where('machine_address_id', $machineAddress);

			$query = $this->db->get('transaction');				
//			$row = $query->row();			
			$rowArray = $query->result_array();
			
			$outputTransaction = $rowArray[0];
		}

		//added by Mike, 20210128
		//part 3
		//--
				//added by Mike, 20210127
				if (($outputTransaction['fee']==0) and ($outputTransaction['x_ray_fee']==0) and ($outputTransaction['lab_fee']==0)){
										
					$updatedValue=$outputTransaction['notes'];
					
					//if auto-added "ONLY" keyword
					if (strpos($outputTransaction['notes'], "; ONLY")!==false) {
						//if not equal
						if (strcmp(strval($outputTransaction['med_fee']),"0.00")!==0) {
							$updatedValue = str_replace("ONLY","MED ONLY",$updatedValue);	
						}
//removed by Mike, 20210129
//					echo ">> ".$updatedValue."<br/>";

//		echo "NON-MED FEE: ".$outputTransaction['pas_fee']."<br/>";

						//if not equal
						if (strcmp(strval($outputTransaction['pas_fee']),"0.00")!==0) {
							$updatedValue = str_replace("ONLY","NON-MED ONLY",$updatedValue);
						}
						
						//if not equal
						if (strcmp(strval($outputTransaction['snack_fee']),"0.00")!==0) {
							$updatedValue = str_replace("ONLY","SNACK ONLY",$updatedValue);
						}
					}
				}
			//--

			if (strpos($updatedValue,"MED NON-MED")!==false) {
				$updatedValue = str_replace("MED NON-MED", "MED, NON-MED", $updatedValue);
			}

			if (strpos($updatedValue,"MED SNACK")!==false) {
				$updatedValue = str_replace("MED SNACK", "MED, SNACK", $updatedValue);
			}
		
			$data = array(
						'notes' => $updatedValue //"PAID"
					);

			$this->db->where('transaction_id', $outputTransaction['transaction_id']);
			$this->db->update('transaction', $data);
	
			//note: patient transaction (not combined) only has "ONLY" in its notes
		
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


	//added by Mike, 20210212
	public function addLabTransactionServicePurchase($param) 
	{		
		//TO-DO: -add: patient birthday to auto-compute age
		//TO-DO: -add: update medical_doctor_id during transaction payment

		$data = array(
			'sex_id' => $param['selectSexNameParam'],
			'age' => $param['inputAgeNameParam'],
			'age_unit' => $param['selectAgeUnitNameParam'],
			'medical_doctor_id' => $param['selectMedicalDoctorNameParam']
		);

		$this->db->where('patient_id',$param['patientIdNameParam']);
		$this->db->update('patient', $data);
		
		//added by Mike, 20210216
		for ($iInputCheckBoxCount=0; $iInputCheckBoxCount<$param['iInputCheckBoxCountMax']; $iInputCheckBoxCount++) {
			//note: execute +1 to inputCheckBox count in database 
			if (isset($param['inputCheckBox'.$iInputCheckBoxCount])) {
				//echo $param['inputCheckBox'.$iInputCheckBoxCount];
				
				if (strpos($param['inputCheckBox'.$iInputCheckBoxCount],"on")!==false) {
					$data = array(
						'lab_service_item_id' => $iInputCheckBoxCount+1,
						'patient_id' => $param['patientIdNameParam'],
						'lab_service_date' => date("Y-m-d"),
					);
					$this->db->insert('lab_service', $data);			
					//return $this->db->insert_id();
				}
			}
		}

		//added by Mike, 20210216
		//auto-add "OTHERS:" non-blank text value, even if checkBox not ticked
		if (isset($param['inputTextOthersAnswerNameParam'])) {
			if (strlen(trim($param['inputTextOthersAnswerNameParam']))==0) {
			}
			else {
				$data = array(
					'lab_service_notes' => $param['inputTextOthersAnswerNameParam']
				);
								
				$this->db->where('patient_id',$param['patientIdNameParam']);
				$this->db->where('lab_service_item_id',35); //"OTHERS:" value in lab_service_item table
				$this->db->where('lab_service_date', date("Y-m-d"));				
				$this->db->update('lab_service', $data);

//				$this->db->insert('lab_service', $data);			
				//return $this->db->insert_id();
			}
		}
	}	

	//added by Mike, 20200529
	public function addPatientName($param) 
	{		
		//added by Mike, 20201214
		//verify if patient name already exists
		//TO-DO: -add: notify Unit member if similar patient names already exist
		$this->db->select('patient_name, patient_id');
		$this->db->where('patient_name', $param['nameParam']);
		$query = $this->db->get('patient');	
		
		$rowArray = $query->result_array();
		
		if (isset($rowArray) and (count($rowArray)>0)) {
			//TO-DO: -add: this in view
			//echo "PATIENT NAME ALREADY EXISTS IN COMPUTER DATABASE!";
			
			return $rowArray[0]['patient_id'];
		}
		else {
			$data = array(
						'patient_name' => $param['nameParam']
					);

			$this->db->insert('patient', $data);			
			return $this->db->insert_id();
		}
/*		//edited by Mike, 20201214	
		$data = array(
					'patient_name' => $param['nameParam']
				);

		$this->db->insert('patient', $data);
		return $this->db->insert_id();
*/		
	}	

	//added by Mike, 20200529; edited by Mike, 20200530
	public function addNewTransactionForPatient($param) 
	{			
		//edited by Mike, 20201218
		//$this->db->select('transaction_id, patient_id');
		$this->db->select('transaction_id, patient_id, notes');

		//edited by Mike, 20200602
//        $this->db->where('notes',"IN-QUEUE; UNPAID");
		//these are @information desk
		//we do not anymore add a new transaction for the patient after payment
		//in addition, we do not add a new transactions for the patient that already has an unpaid transaction for the day
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
/*		//edited by Mike, 20201218		
		else {
			return False;
		}
*/		
		else {
			foreach ($rowArray as $rowValue) {
				//"MED ONLY", "MEDICINE ONLY", "SNACK ONLY"
				if (strpos($rowValue['notes'], "ONLY")!==false) {
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
			}
			
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

	//added by Mike, 20210629
	public function getCashierList() {
		$this->db->select('cashier_id, cashier_name');
		
		$query = $this->db->get('cashier');	
		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
	
//		echo $rowArray[0]["cashier_id"]." : ".$rowArray[0]["cashier_name"];

		return $rowArray;
	}


	//TO-DO: -reverify: this
	//consider eliminating excess steps
	public function getDetailsListViaIdPrevV20210723T1453($nameId) 
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

		//edited by Mike, 20210723
//		$this->db->group_by('t2.added_datetime_stamp`', 'DESC');//ASC');
		$this->db->group_by('t1.patient_id`', 'DESC');//ASC');

		//$this->db->group_by('t2.transaction_date`', 'DESC');//ASC');
		
		$query = $this->db->get('patient');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	public function getDetailsListViaId($nameId) 
	{		
		//edited by Mike, 20200541
		$this->db->select('t1.patient_name, t1.patient_id, t3.medical_doctor_id, t3.medical_doctor_name');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

		$this->db->where('t1.patient_id', $nameId);		

		//edited by Mike, 20210723
		$this->db->group_by('t1.patient_id`', 'DESC');//ASC');

		
		$query = $this->db->get('patient');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	//added by Mike, 20210306
	public function getDetailsListViaIdIndexCard($nameId) 
	{		
		//edited by Mike, 20200541
//		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.added_datetime_stamp, t3.medical_doctor_id, t3.medical_doctor_name');
		//edited by Mike, 20210319
//		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.added_datetime_stamp, t2.medical_doctor_id, t3.medical_doctor_name, t1.sex_id, t1.age, t1.age_unit');

		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.added_datetime_stamp, t2.medical_doctor_id, t3.medical_doctor_name, t1.sex_id, t1.age, t1.age_unit, t1.pwd_senior_id, t1.civil_status_id, t1.occupation, t1.birthday, t1.contact_number, t1.location_address, t1.barangay_address, t1.postal_address, t1.province_city_ph_address');

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

	
	//added by Mike, 20210212
	//TO-DO: -reverify: this
	//consider eliminating excess steps
	public function getDetailsListViaIdLabUnit($nameId) 
	{		
		//edited by Mike, 20200541
//		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.added_datetime_stamp, t3.medical_doctor_id, t3.medical_doctor_name');
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.transaction_type_name, t2.treatment_type_name, t2.treatment_diagnosis, t2.added_datetime_stamp, t2.medical_doctor_id, t3.medical_doctor_name, t1.sex_id, t1.age, t1.age_unit');

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
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date, t4.medical_doctor_name, t4.medical_doctor_id, t5.patient_name, t5.patient_id');
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.transaction_id, t2.transaction_date, t2.fee, t3.quantity_in_stock, t3.expiration_date, t4.medical_doctor_name, t4.medical_doctor_id, t5.patient_name, t5.patient_id');
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.transaction_id, t2.transaction_date, t2.fee, t4.medical_doctor_name, t4.medical_doctor_id, t5.patient_name, t5.patient_id');
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_total_sold');

		$this->db->from('item as t1');

		//removed by Mike, 20210110
//		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
//		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
/*
		$this->db->join('medical_doctor as t4', 't2.medical_doctor_id = t4.medical_doctor_id', 'LEFT');
		$this->db->join('patient as t5', 't2.patient_id = t5.patient_id', 'LEFT');
*/
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		//removed by Mike, 20210110
//		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

//		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200501


		$this->db->where('t1.item_id', $itemId);

		//TO-DO: -add: auto-identify item_type
		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine


		//edited by Mike, 20200401; removed by Mike, 20210110
//		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

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

		//added by Mike, 20210723
		$this->db->where('t3.medical_doctor_id!=',0);


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


	//added by Mike, 20210626
	//edited by Mike, 20210720
//	public function getPaidPatientDetailsListForTheDayNoItemFee($medicalDoctorId, $patientId) 
	public function getPaidPatientDetailsListForTheDayNoItemFee($medicalDoctorId, $patientId,$transactionDate) 
	{			
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.x_ray_fee, t2.lab_fee, t2.notes, t2.added_datetime_stamp, t3.medical_doctor_id, t3.medical_doctor_name');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

		$this->db->distinct('t1.patient_name');
		
		$this->db->where('t2.transaction_quantity!=',0);
		$this->db->where('t2.notes!=', 'UNPAID');
		$this->db->where('t1.patient_id', $patientId);

		//removed by Mike, 20210720
//		$this->db->not_like('t2.notes', "ONLY");
		
		//edited by Mike, 20210720
//		$this->db->where('t2.transaction_date',date("m/d/Y"));
		$this->db->where('t2.transaction_date',date("m/d/Y", strtotime($transactionDate)));
				
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
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
		//edited by Mike, 20210110
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.added_datetime_stamp, t3.quantity_in_stock, t3.expiration_date');
		//edited by Mike, 20210619
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.added_datetime_stamp');
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.added_datetime_stamp, t2.patient_id, t3.patient_name');

		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		//added by Mike, 20210619
		$this->db->join('patient as t3', 't2.patient_id = t3.patient_id', 'LEFT');

		//removed by Mike, 20210110
		//excess join commands cause delay; 
		//example: med item: ACECLOFENAC (DICLOTOL) 100mg 
		//23seconds (prev) --> 15seconds (now)
//		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406
		
		//edited by Mike, 20200923
//		$this->db->where('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->like('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->not_like('t2.notes', "UNPAID");

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

	//added by Mike, 20210314
	public function getPaidItemDetailsListForPatient($itemTypeId, $patientId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.added_datetime_stamp');

		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		//removed by Mike, 20210110
		//excess join commands cause delay; 
		//example: med item: ACECLOFENAC (DICLOTOL) 100mg 
		//23seconds (prev) --> 15seconds (now)
//		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406
		
		//edited by Mike, 20200923
//		$this->db->where('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->like('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->not_like('t2.notes', "UNPAID");

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine

		//added by Mike, 20210314
		$this->db->where('t2.patient_id', $patientId);
		$this->db->where('t1.item_id!=', -1);
		$this->db->where('t2.item_id!=', 0);

		$this->db->where('t2.fee!=', 0);

		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');

		$this->db->limit(8);
		
		$query = $this->db->get('item');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		return $rowArray;
	}		


	//added by Mike, 20210626; edited by Mike, 20210720
//	public function getPaidItemDetailsListForPatientForTheDay($itemTypeId, $patientId) 
	public function getPaidItemDetailsListForPatientForTheDay($itemTypeId, $patientId, $transactionDate) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.added_datetime_stamp');

		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		//removed by Mike, 20210110
		//excess join commands cause delay; 
		//example: med item: ACECLOFENAC (DICLOTOL) 100mg 
		//23seconds (prev) --> 15seconds (now)
//		$this->db->join('inventory as t3', 't1.item_id = t3.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406
		
		//edited by Mike, 20200923
//		$this->db->where('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->like('t2.notes', 'PAID'); //TO-DO: -update: to not include UNPAID if we use like(...)
		$this->db->not_like('t2.notes', "UNPAID");

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine

		//added by Mike, 20210314
		$this->db->where('t2.patient_id', $patientId);
		$this->db->where('t1.item_id!=', -1);
		$this->db->where('t2.item_id!=', 0);

		$this->db->where('t2.fee!=', 0);

		//added by Mike, 20210626; edited by Mike, 20210720
//		$this->db->where('t2.transaction_date', date('m/d/Y'));
		$this->db->where('t2.transaction_date', date('m/d/Y', strtotime($transactionDate)));
		
		$query = $this->db->get('item');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		return $rowArray;
	}		

	//added by Mike, 20210316
	public function getIndexCardImageListForPatient($patientId) 
    {		
		//edited by Mike, 20210630
//		$this->db->select('transaction_id, image_filename');
		$this->db->select('transaction_id, image_filename, image_id');

		$this->db->where('patient_id', $patientId); //2 = Non-medicine

		$this->db->order_by('added_datetime_stamp`', 'DESC');//ASC');

		//removed by Mike, 20210528
//		$this->db->limit(8);
		
		$query = $this->db->get('image');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		return $rowArray;
	}		

	//added by Mike, 20210630
	public function deleteIndexCardImageViaId($iIndexCardImageId) {
		$this->db->select('image_filename');
		$this->db->where('image_id', $iIndexCardImageId); 
		$query = $this->db->get('image');
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		unlink($rowArray[0]['image_filename']);  //deletes file in system folder

		//deletes image file transaction row in MySQL DB
		$this->db->where('image_id',$iIndexCardImageId);
		$this->db->delete('image');
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

	//added by Mike, 20200519; edited by Mike, 20200821
	public function getServiceAndItemDetailsListViaNotesUnpaid() 
	{		
		//added by Mike, 20200821
/*		
		if(!isset($_SESSION)) 
		{ 		
			session_start();
		}
*/		
		//TO-DO: -reverify: this
		$this->load->library("session");
		
//		$ipAddress = $_SESSION["client_ip_address"];
//		$machineAddress = $_SESSION["client_machine_address"];

		//added by Mike, 20201010
		//TO-DO: -reverify: if can be removed
		$ipAddress = $this->session->userdata("client_ip_address");
		$machineAddress = $this->session->userdata("client_machine_address");

//		$_SESSION["client_ip_address"] = $ipAddress;
//		$_SESSION["client_machine_address"] = $machineAddress;
		
/*		echo "ipAddress: ".$ipAddress."<br/>";
		echo "machineAddress: ".$machineAddress."<br/>";
*/				
//		if (($ipAddress=="") and ($machineAddress=="")) {
//		if (!isset($ipAddress) and !isset($machineAddress)) {
		//added by Mike, 20200821
		//note: $machineAddress not yet set for Windows Machine
		//edited by Mike, 20201013
		//TO-DO: -reverify: this
//		if (!isset($ipAddress)) {
		if (!isset($ipAddress) and !isset($machineAddress)) {
//			session_destroy;			
			//redirect(base_url()."/server/viewWebAddressList.php");		
			redirect('report/viewWebAddressList');			
		}
	
		//edited by Mike, 20201115
/*		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_type_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.x_ray_fee, t2.lab_fee, t2.fee_quantity, t2.notes, t3.patient_name, t3.patient_id');
*/
		//edited by Mike, 20210110
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_type_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.x_ray_fee, t2.lab_fee, t2.fee_quantity, t2.notes, t2.medical_doctor_id, t3.patient_name, t3.patient_id');
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t1.item_type_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.x_ray_fee, t2.lab_fee, t2.fee_quantity, t2.notes, t2.medical_doctor_id, t2.patient_id');

		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		//removed by Mike, 20210110; added again by Mike, 20210110
		$this->db->join('patient as t3', 't2.patient_id = t3.patient_id', 'LEFT');
		//added by Mike, 20210110
//		$this->db->where('t2.patient_id!=', 0);

		$this->db->group_by('t2.added_datetime_stamp'); //added by Mike, 20200407
		
		$this->db->where('t2.transaction_date', date('m/d/Y'));//ASC');
//		$this->db->where('t1.item_type_id', $itemTypeId); //2 = Non-medicine
		$this->db->like('t2.notes', "UNPAID");
		
		//added by Mike, 202005029
		$this->db->not_like('t2.notes', "IN-QUEUE");
	
		//added by Mike, 20200821		
		$this->db->where('t2.ip_address_id', $ipAddress);		
		$this->db->where('t2.machine_address_id', $machineAddress);
	
		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'DESC');//ASC');		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		
		//removed by Mike, 20200826
		//return $rowArray;
				
		//added by Mike, 20200826; edited by Mike, 20201105
		//------------------------------
		//TO-DO: -remove: this set of instructions due to use of "get" keyword in command/method
		//verify if the MINORSET non-med item exists in the list
		$hasMinorSetInCartList=false;
		foreach ($rowArray as $row) {
			if (strtoupper($row['item_name'])=="MINORSET") {
				$hasMinorSetInCartList = true;
			}
		}
		
		//verify if the keyword MINORSET exists in the Notes of the patient transaction
		if ($hasMinorSetInCartList) {
			foreach ($rowArray as &$row) {
				if ($row['patient_id']>0) {
					if (strpos(strtoupper($row['notes']),"MINORSET")!==false) {
					}
					else {
						$row['notes'] = $row['notes']."; MINORSET";
					}					
					$data = array(
						'notes' => $row['notes']
					);

					$this->db->where('patient_id',$row['patient_id']);
					//added by Mike, 20201105
					$this->db->where('transaction_id',$row['transaction_id']);

					$this->db->where('transaction_date', date('m/d/Y'));				
					$this->db->update('transaction', $data);
				}
			}
			unset($row);
		}
		else {
			foreach ($rowArray as &$row) {
				if ($row['patient_id']>0) {
					if (strpos(strtoupper($row['notes']),"MINORSET")!==false) {
						$row['notes'] = str_replace("; MINORSET", "", $row['notes']);
						$row['notes'] = str_replace("MINORSET; ", "", $row['notes']);
					}
					else {
					}
										
					$data = array(
						'notes' => $row['notes']
					);

					$this->db->where('patient_id',$row['patient_id']);
					//added by Mike, 20201105
					$this->db->where('transaction_id',$row['transaction_id']);
					
					$this->db->where('transaction_date', date('m/d/Y'));				
					$this->db->update('transaction', $data);
				}
			}
			unset($row);
		}		
		//------------------------------
	
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
	//TO-DO: -add: multiple inventory transactions of the same item
	/*
					if (strpos(strtoupper($row->item_name),"HYALONE")) {
					echo "dito".$iQuantity;
				}
	*/
	//edited by Mike, 20210110
//	public function getItemAvailableQuantityInStock($itemTypeId, $itemId)
	public function getItemAvailableQuantityInStock($itemValue)
//	public function getItemAvailableQuantityInStock($itemTypeId, $itemId, $expirationDate)
	{			
/*	//removed by Mike, 20210110
		//edited by Mike, 20201202
//		$this->db->select('t2.quantity_in_stock, t1.item_name');
		$this->db->select('t2.quantity_in_stock, t1.item_name, t1.item_total_sold');

		$this->db->from('item as t1');
		
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_type_id', $itemTypeId); //2); //2 = Non-medicine

		$query = $this->db->get('item');

		$row = $query->row();
*/
		
		//TO-DO: -add: use multiple inventory transactions of the same item
/*
		echo $row->item_name;
		echo "qty".$row->quantity_in_stock;
		echo "<br/>";
*/
		$iQuantity = 0;
		//added by Mike, 20200411; edited by Mike, 20210110
/*		if (isset($row->quantity_in_stock)) {
			$iQuantity = $row->quantity_in_stock;

		}
*/
		if (isset($itemValue['quantity_in_stock'])) {
			$iQuantity = $itemValue['quantity_in_stock'];
		}
		//added by Mike, 20200414
		else {			
			//edited by Mike, 20200527
			return -1;//-9999;//-1; //9999;
		}
				
		if ($iQuantity==0) {
			return 0;
		}
		
		//noted by Mike, 20201201
		//use $iQuantity = $iQuantity - $value['item_total_sold'];
		//note: where $iQuantity = item total in stock
		//added by Mike, 20201202
/*		
		echo $row->item_name."<br/>";
		echo $row->item_total_sold."<br/>";
		echo "iQuantity: ".$iQuantity."<br/>--<br/>";
*/
		//edited by Mike, 20210110
//		$iQuantity = $iQuantity - $row->item_total_sold;
		$iQuantity = $iQuantity - $itemValue['item_total_sold'];
		
		//------------------------------------		
		//edited by Mike, 20201202
		//$this->db->select('t1.item_price, t2.fee');
		//edited by Mike, 20200901
		$this->db->select('t1.item_name, t1.item_price, t2.fee, t2.fee_quantity');
		$this->db->from('item as t1');

//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
		$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		
		//edited by Mike, 20210110
//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.item_id', $itemValue['item_id']);

		//edited by Mike, 20200625
		//note: we include transactions in the cart list, albeit unpaid
		//$this->db->where('t2.notes', "PAID");
		$this->db->like('t2.notes', "PAID");
		//TO-DO: -update: the total item sold list every start of the day
//		$this->db->where('t2.transaction_date =', "12/02/2020");
//		echo strtoupper(date("m/d/Y"));
		$this->db->where('t2.transaction_date =', strtoupper(date("m/d/Y")));

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

			//edited by Mike, 20200901
			//$iQuantity = $iQuantity - $value['fee_quantity'];
			$iQuantity = $iQuantity - $value['fee_quantity'];
		}
		
//		echo "<br/>".$value['item_name'];
//		echo $iQuantity."<br/>";
		//-------------------------------------------


/*	//removed by Mike, 20201202
		//------------------------------------		
		//edited by Mike, 20200617
		//$this->db->select('t1.item_price, t2.fee');
		//edited by Mike, 20200901
		$this->db->select('t1.item_name, t1.item_price, t2.fee, t2.fee_quantity');
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

			//edited by Mike, 20200901
			//$iQuantity = $iQuantity - $value['fee_quantity'];
			$iQuantity = $iQuantity - $value['fee_quantity'];

		}
		
//		echo "<br/>".$value['item_name'];
//		echo $iQuantity."<br/>";
		
		//------------------------------------
*/		
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
		
//		echo $iQuantity;
		
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
			
//			echo "<br/>".$iQuantity;
		}

		return $iQuantity;
	}
	
	//added by Mike, 20201216
	//note: use with $iQuantity = $iQuantity - $value['item_total_sold'];
	//where $iQuantity = item total in stock
	public function updateTotalQuantitySoldPerItem() {		

		//identify newest transactionId
		$this->db->select_max('item_id');
		$query = $this->db->get('item');
		$row = $query->row();		
		$iItemIdMax = $row->item_id;

		$itemId=0;		
		
		while ($itemId<$iItemIdMax) {
			$iTotalQuantitySold=0;

/*			echo "item_id: ".$itemId.";";
*/
			//$this->db->select('t1.item_price, t2.fee');
			//edited by Mike, 20200901
			$this->db->select('t1.item_name, t1.item_price, t2.fee, t2.fee_quantity, t2.transaction_id');
			$this->db->from('item as t1');

	//		$this->db->group_by('t1.item_id'); //added by Mike, 20200406
			$this->db->group_by('t2.transaction_id'); //added by Mike, 20200406

			$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

			$this->db->where('t1.item_id', $itemId);
			//edited by Mike, 20200625
			//note: we include transactions in the cart list, albeit unpaid
			//$this->db->where('t2.notes', "PAID");
			$this->db->like('t2.notes', "PAID");
			//edited by Mike, 20210114
//			$this->db->where('t2.transaction_date >=', "04/06/2020"); //i.e., MONDAY
			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') >=","2020-04-06");


			//added by Mike, 20201215; edited by Mike, 20210114
//			$this->db->where('t2.transaction_date <', date("m/d/Y")); //i.e., date today
//			$this->db->where('t2.transaction_date <', "01/13/2021"); //i.e., date today
			//note: STR_TO_DATE output format: YYYY-mm-dd
			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",date("Y-m-d"));



			$query = $this->db->get('item');

	//		$row = $query->row();		
			$rowArray = $query->result_array();
/*
			echo "count: ".count($rowArray);
			echo "transaction_id: ";
*/
			//TO-DO: -update: this
			if ($rowArray == null) {
				$itemId=$itemId+1;
				continue;
			}
			
			foreach ($rowArray as $value) {	
				//edited by Mike, 20200422
	//			$iQuantity = $iQuantity - $value['fee']/$value['item_price'];

				//edited by Mike, 20200617
	//			$iQuantity = $iQuantity - floor($value['fee']/$value['item_price']*100/100);

				//edited by Mike, 20200901
				//$iQuantity = $iQuantity - $value['fee_quantity'];
				//edited by Mike, 20201202
	//			$iQuantity = $iQuantity - $value['fee_quantity'];
				
//				echo $value['transaction_id'].";";
				$iTotalQuantitySold = $iTotalQuantitySold + $value['fee_quantity'];

			}
/*			
			echo "<br/>".$value['item_name']." : ";
			echo $iTotalQuantitySold." : ";
*/
			//UPDATE item SET item_total_sold=2 WHERE item_id=1			
			echo "UPDATE item SET item_total_sold=".$iTotalQuantitySold." WHERE item_id=".$itemId.";<br/>";
			
			//added by Mike, 20201216
			//auto-insert in computer database
			$data = array(
						'item_total_sold' => $iTotalQuantitySold			
					);
			$this->db->where('item_id',$itemId);
			$this->db->update('item', $data);		
			
			$itemId=$itemId+1;			
		}		
		//------------------------------------
	}

	//added by Mike, 20210319
	public function updateIndexCardForm($param) {
		//TO-DO: -add: these in patient table structure
/*		
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

		$data['inputTextProvinceCityPhAddressIdNameParam'] = strtoupper(trim($_POST['inputTextProvinceCityPhAddressIdNameParam']));
*/			

		$data = array(
			'sex_id' => $param['selectSexNameParam'],
			'age' => $param['inputAgeNameParam'],
			'age_unit' => $param['selectAgeUnitNameParam'],
			'medical_doctor_id' => $param['selectMedicalDoctorNameParam'],
			//added by Mike, 20210319
			'pwd_senior_id' => $param['inputTextPwdSeniorIdNameParam'],
			'civil_status_id' => $param['selectCivilStatusNameParam'],
			'occupation' => $param['inputTextOccupationIdNameParam'],		
			'birthday' => $param['inputTextBirthdayIdNameParam'],
			'contact_number' => $param['inputTextContactNumberIdNameParam'],
			'location_address' => $param['inputTextLocationAddressIdNameParam'],
			'barangay_address' => $param['inputTextBarangayAddressIdNameParam'],
			'postal_address' => $param['inputTextPostalAddressIdNameParam'],	
			'province_city_ph_address' => $param['inputTextProvinceCityPhAddressIdNameParam']			
		);

		$this->db->where('patient_id',$param['patientIdNameParam']);
		$this->db->update('patient', $data);
	}	
}
?>