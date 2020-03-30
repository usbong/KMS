<?php 
class Browse_Model extends CI_Model
{
	public function getNamesListViaName($param) 
	{		
//		echo "reportTypeNameParam: ".$param['reportTypeNameParam'];
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
		
//		echo "report_id: ".$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];

		return $rowArray;
	}	

	public function getDetailsListViaName($param) 
	{		
//		echo "reportTypeNameParam: ".$param['reportTypeNameParam'];
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
		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
		$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');


//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
//		echo "report_id: ".$rowArray[0]['report_id'];
		
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
		$this->db->select('item_name, item_price, ,item_id');

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
		
//		echo "report_id: ".$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];
		
		return $rowArray;
	}	

	//added by Mike, 20200330
	public function addTransactionMedicinePurchase($param) 
	{		
		$this->db->select('item_price');
		$this->db->where('item_id', $param['itemId']);
		$query = $this->db->get('item');
		$row = $query->row();
	
		$data = array(
					'patient_id' => -1,
					'item_id' => $param['itemId'],
					'transaction_date' => $param['transactionDate'],
					'medical_doctor_id' => -1,
					'fee' => $param['quantity'] * $row->item_price,
					'transaction_type_name' => "CASH",
					'report_id' => -1
				);
			
		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
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

	//added by Mike, 20200328; edited by Mike, 20200330
	public function getMedicineDetailsListViaItemId($itemId) 
	{		
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');
//		$this->db->like('t1.patient_name', $param['nameParam']);
		$this->db->where('t1.item_id', $itemId);		
//		$this->db->where('t2.transaction_date!=', 0);		

		$this->db->order_by('t2.transaction_date', 'DESC');//ASC');
//		$this->db->limit(1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}		
}
?>
