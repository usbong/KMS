<?php 
class Report_Model extends CI_Model
{
	public function insertReport($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

		//added by Mike, 20190722; edited by Mike, 20191025
//		$row = $this->doesReportTypeExistViaReportTypeName($param);
//		$row = $this->getReportTypeExistViaReportTypeName($param);
		$reportTypeId = $this->getReportTypeIdViaReportTypeName($param);

		if ($reportTypeId == False) {			
			return False; //edited by Mike, 20190722
		}

/*		
		if ($row == null) {			
			return False; //edited by Mike, 20190722
		}
		
		$reportTypeId = $row->report_type_id;
*/

		$data = array(
					'member_id' => $param['memberId'],
//					'report_type_id' => $param['reportTypeId'],
					'report_type_id' => $reportTypeId,
					'report_item_id' => $param['reportItemId'],
					'report_answer' => $param['reportAnswerParam'],
					'added_datetime_stamp' => $addedDateTimeStamp
				);
		
		$this->db->insert('report', $data);
		
		return $this->db->insert_id();		
	}	
	
	//added by Mike, 20191025
	public function insertReportsFromAllLocations($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

		//added by Mike, 20190722; edited by Mike, 20191025
//		$row = $this->doesReportTypeExistViaReportTypeName($param);
//		$row = $this->getReportTypeExistViaReportTypeName($param);
		$reportTypeId = $this->getReportTypeIdViaReportTypeName($param);

		if ($reportTypeId == False) {			
			return False; //edited by Mike, 20190722
		}

/*		
		if ($row == null) {			
			return False; //edited by Mike, 20190722
		}
		
		$reportTypeId = $row->report_type_id;
*/
		$data = array(
					'member_id' => $param['memberId'],
//					'report_type_id' => $param['reportTypeId'],
					'report_type_id' => $reportTypeId,
					'report_item_id' => $param['reportItemId'],
					'report_answer' => $param['reportAnswerParam'],
					'added_datetime_stamp' => $addedDateTimeStamp
				);
		
		$this->db->insert('report', $data);
		
		return $this->db->insert_id();		
	}	

	//added by Mike, 20200313
	public function insertReportImage($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

/*
		//added by Mike, 20190722; edited by Mike, 20191025
//		$row = $this->doesReportTypeExistViaReportTypeName($param);
//		$row = $this->getReportTypeExistViaReportTypeName($param);
		$reportTypeId = $this->getReportTypeIdViaReportTypeName($param);
		if ($reportTypeId == False) {			
			return False; //edited by Mike, 20190722
		}
*/

		$data = array(

					'image_filename' => $param['outputFileLocation'],
					'transaction_id' => $param["transactionId"], //1
//					'added_datetime_stamp' => $addedDateTimeStamp
				);
		
		$this->db->insert('image', $data);
		
		return $this->db->insert_id();		
	}	

	//added by Mike, 20191025
	public function insertReportFromEachLocation($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

		//added by Mike, 20190722; edited by Mike, 20191025
		$reportTypeId = $this->getReportTypeIdViaReportTypeName($param);

		if ($reportTypeId == False) {			
			return False; //edited by Mike, 20190722
		}

		$data = array(
					'member_id' => $param['memberId'],
//					'report_type_id' => $param['reportTypeId'],
					'report_type_id' => $reportTypeId,
					'report_item_id' => $param['reportItemId'],
					'report_answer' => $param['reportAnswerParam'],
					'added_datetime_stamp' => $addedDateTimeStamp
				);
		
		$this->db->insert('report', $data);
		
		return $this->db->insert_id();		
	}	
	
	//added by Mike, 20190720; edited by Mike, 20191025
//	public function doesReportTypeExistViaReportTypeName($param) 
	public function getReportTypeIdViaReportTypeName($param) 
	{		
//		echo "reportTypeNameParam: ".$param['reportTypeNameParam'];
	
		$this->db->select('report_type_id');
		$this->db->where('report_type_name', $param['reportTypeNameParam']);
		$query = $this->db->get('report_type');
		$row = $query->row();
		
		if ($row == null) {			
			return False; //edited by Mike, 20190722
		}
		
		//$reportTypeId = $row->report_type_id;
		//return $row;
		return $row->report_type_id;
	}	
	
	//added by Mike, 20200313
	public function getAllReportImages()//$param) 
	{			
		$this->db->select('image_filename');
//		$this->db->where('report_type_name', $param['reportTypeNameParam']);
		$query = $this->db->get('image');
		$rowArray = $query->result_array();

		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		return $rowArray;
	}	

	//added by Mike, 20200313
	public function getReportImageViaTransacionId($param) 
	{			
		$this->db->select('image_filename');
//		$this->db->where('report_type_name', $param['reportTypeNameParam']);
		$this->db->where('transaction_id', $param);
		$query = $this->db->get('image');
		$rowArray = $query->result_array();

		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		return $rowArray;
	}	

	//added by Mike, 20200322; edited by Mike, 20200408
	public function getPayslipForTheDay($param) 
	{	
		$this->db->select('report_id'); //, t2.treatment_diagnosis');
		$this->db->like('report_filename', $param['medicalDoctorName']);
		$this->db->like('added_datetime_stamp',date("Y-m-d"));
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get('report');

		$row = $query->row();
		
		if ($row == null) {			
			return False; //edited by Mike, 20190722
		}		
		
		//max(report_id) error
		//echo "dito".$row->report_id;

//select max(`report_id`) from `report`
//select max(`report_id`) from `report` where `report_filename` like '%PETER%' 

		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name'); //, t2.treatment_diagnosis');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->distinct('t1.patient_name');
		
		$this->db->where('t2.report_id=',$row->report_id);
		
		//added by Mike, 20200324
		$this->db->where('t2.transaction_date=',date("m/d/Y"));

		$this->db->like('t3.medical_doctor_name', $param['medicalDoctorName']);
//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');
		$this->db->order_by('t2.transaction_id', 'ASC');//ASC');

		//$this->db->limit(8);//1);
		
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

	//added by Mike, 20200420; edited by Mike, 20200421
	//TO-DO: -update: this
	public function getReceiptReportForTheMonth($param) 
	{
/*		//removed by Mike, 20200421		
		$this->db->select('report_id'); //, t2.treatment_diagnosis');
//		$this->db->like('report_filename', $param['medicalDoctorName']);
//		$this->db->like('added_datetime_stamp',date("Y-m-d"));
		$this->db->order_by('added_datetime_stamp', 'DESC');
		
		//TO-DO: -update: this to auto-identify the limit number value
		//note: the number value is based on the total number of variations in the report_filename
		//example: we use 2 if there are only two (2) report filenames with a unique keyword, i.e. 1) "SYSON, PEDRO" and 2) "SYSON, PETER"
		$this->db->limit(4);

//		$this->db->group_by('report_filename');
		$query = $this->db->get('report');
		
//		$row = $query->row();
//		
//		if ($row == null) {			
//			return False; //edited by Mike, 20190722
//		}		

		$reportRowArray = $query->result_array();
		
		if ($reportRowArray == null) {
			return False; //edited by Mike, 20190722
		}	
*/		
		//max(report_id) error
		//echo "dito".$row->report_id;

//select max(`report_id`) from `report`
//select max(`report_id`) from `report` where `report_filename` like '%PETER%' 


		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t4.receipt_type_id, t4.receipt_number'); //, t2.treatment_diagnosis');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');
		$this->db->join('receipt_type as t5', 't4.receipt_type_id = t5.receipt_type_id', 'LEFT');

/*
		$this->db->distinct('t1.patient_name');
		
		$this->db->where('t2.report_id=',$row->report_id);
*/		
		//added by Mike, 20200324
/*		$this->db->where('t2.transaction_date=',date("m/d/Y"));
*/
		$this->db->group_by('t1.patient_name');
/*
		$this->db->group_by('t2.report_id');
		$this->db->distinct('t2.report_id');

		$this->db->group_by('t6.report_filename');
*/
/*		//removed by Mike, 20200421
		foreach ($reportRowArray as $value) {
			$this->db->or_where('t2.report_id=',$value['report_id']);					
		}
*/


		//added by Mike, 20200421
		$this->db->where('t4.receipt_number!=',0);					
//		$this->db->where('t4.receipt_number=',0);					


//		$this->db->like('t2.transaction_date',date("m/d/Y"));
		$this->db->like('t2.transaction_date',date("m"));


		$this->db->like('t5.receipt_type_name', $param['receiptTypeName']);

//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');
		$this->db->order_by('t2.transaction_id', 'ASC');//ASC');
//		$this->db->order_by('t2.transaction_id', 'DESC');//ASC');

		//$this->db->limit(8);//1)
		
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

	//added by Mike, 20200421; added by Mike, 20200422
	public function getReportForTheMonth($param) 
	{
/*		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name'); //, t2.treatment_diagnosis');
*/		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t4.receipt_number'); //, t2.treatment_diagnosis');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');

		//Reference: https://stackoverflow.com/questions/34917060/getting-the-recent-row-by-join-group-by;
		//last accessed: 20200422
		//answer by: Disha V. on 20160121
		//edited by: Community on 20170523

//		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id)',NULL,FALSE);

		//edited by Mike, 20200422
		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id and t.transaction_date=t2.transaction_date)',NULL,FALSE);

//		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id and t.transaction_date=t2.transaction_date and t2.medical_doctor_id =2)',NULL,FALSE);

//		$this->db->where('t2.fee!=',0);
		
		//added by Mike, 20200422
		//TO-DO: -update: this
		//added by Mike, 20200423
//		$this->db->like('t3.medical_doctor_name',$param["medicalDoctorName"]); 
		
		if (strtoupper($param["receiptTypeName"])=="MOSC") {
			//MOSC
//			$this->db->where('t4.receipt_type_id=',1);
//			$this->db->where('t3.medical_doctor_id=',1); 
//			$this->db->or_where('t3.medical_doctor_id=',0); 
			
			//added by Mike, 20200423; removed by Mike, 20200424
//            $this->db->where("(t3.medical_doctor_name LIKE '%".$param["medicalDoctorName"]."%' OR t3.medical_doctor_id=0)", NULL, FALSE); 		
		}
		else if (strtoupper($param["receiptTypeName"])=="PAS") {
			//PAS
			//added by Mike, 20200423
			$this->db->where('t4.receipt_type_id=',2);
		}		
		else {
//			$this->db->like('t3.medical_doctor_name', $param["medicalDoctorName"]);		
			$this->db->where('t4.receipt_type_id=',3);
			//removed by Mike, 20200423
//			$this->db->like('t3.medical_doctor_name',$param["medicalDoctorName"]); //"PETER");
		}

		//added by Mike, 20200423
//		$this->db->like('t3.medical_doctor_name',$param["medicalDoctorName"]); 
//		$this->db->or_like('t3.medical_doctor_id',0); 
		
		//added by Mike, 20200324
/*		$this->db->where('t2.transaction_date=',date("m/d/Y"));
*/
		$this->db->group_by('t1.patient_name');
/*
		$this->db->group_by('t2.report_id');
		$this->db->distinct('t2.report_id');

		$this->db->group_by('t6.report_filename');
*/


//		$this->db->like('t2.transaction_date',date("m/d/Y"));
//		$this->db->like('t2.transaction_date',date("Y-m"));
		$this->db->like('t2.transaction_date',date("m"));
//		$this->db->like('t2.transaction_date',date("Y"));

//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');
		//edited by Mike, 20200423
//		$this->db->order_by('t2.added_datetime_stamp', 'ASC');//ASC');
		$this->db->order_by('t2.transaction_date', 'ASC');//ASC');
		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		return $rowArray;
	}

	//added by Mike, 20200322; edited by Mike, 20200408
	public function getPayslipForTheDayPrev($param) 
	{	
		$this->db->select('report_id'); //, t2.treatment_diagnosis');
		$this->db->like('report_filename', $param['medicalDoctorName']);
		$this->db->like('added_datetime_stamp',date("Y-m-d"));
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get('report');

		$row = $query->row();
		
		if ($row == null) {			
			return False; //edited by Mike, 20190722
		}		
		
		//max(report_id) error
		//echo "dito".$row->report_id;

//select max(`report_id`) from `report`
//select max(`report_id`) from `report` where `report_filename` like '%PETER%' 

		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name'); //, t2.treatment_diagnosis');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->distinct('t1.patient_name');
		$this->db->where('t2.report_id=',$row->report_id);
		
		//added by Mike, 20200324
		$this->db->where('t2.transaction_date=',date("m/d/Y"));

		$this->db->like('t3.medical_doctor_name', $param['medicalDoctorName']);
//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');
		$this->db->order_by('t2.transaction_id', 'ASC');//ASC');

		//$this->db->limit(8);//1);
		
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

	
/*
	//added by Mike, 20200402
	public function getMedicineTransactionsForTheDay() 
	{	
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
		$this->db->like('t2.notes', "PAID");
		
		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');

		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	
*/
	//added by Mike, 20200412; edited by Mike, 20200415
	public function getPurchasedItemTransactionsForTheDay($itemTypeId) 
	{	
		$rowArray = $this->getMedicineTransactionsForTheDayAsterisk();

		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

		$this->db->where('t1.item_type_id', $itemTypeId);

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
		$this->db->like('t2.notes', "PAID");

		//edited by Mike, 20200403
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {			
	//			echo "value: ".$value['item_id']."<br/>";
				$this->db->where('t1.item_id !=', $value['item_id']);		
			}
		}

		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');

		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	


	//added by Mike, 20200402
	public function getMedicineTransactionsForTheDay() 
	{	
		$rowArray = $this->getMedicineTransactionsForTheDayAsterisk();

		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
		$this->db->like('t2.notes', "PAID");

		//edited by Mike, 20200403
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {			
	//			echo "value: ".$value['item_id']."<br/>";
				$this->db->where('t1.item_id !=', $value['item_id']);		
			}
		}

		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');

		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	//added by Mike, 20200402
	//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
	public function getMedicineTransactionsForTheDayAsterisk() 
	{	
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
		$this->db->like('t2.notes', "PAID");
		$this->db->like('t1.item_name', "*");
	
		//edited by Mike, 20200401
		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');

		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	
	
	//added by Mike, 20191110
	public function getListOfAllReportsFromAllLocations()//$param)
	{			
//		date_default_timezone_set('Asia/Hong_Kong');
//		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');		

/*		
		$this->db->select('report_answer, report_item_id');
		$this->db->where('report_type_id BETWEEN 3 AND 4'); //3 = "MOSC HQ"
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get('report');
		return $query->result_array();		
*/

		$this->db->select('t1.report_answer, t1.report_item_id, t2.member_last_name, t2.member_first_name');
		$this->db->from('report as t1');
		$this->db->join('member as t2', 't1.member_id = t2.member_id', 'LEFT');
		$this->db->where('t1.report_type_id BETWEEN 3 AND 4'); //3 = "MOSC HQ"
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');
//		$this->db->order_by('t1.added_datetime_stamp', 'DESC');
//		$this->db->order_by('t1.report_item_id', 'ASC');		
//		$this->db->order_by('t1.added_datetime_stamp DESC, t1.report_item_id ASC');
		// Produces: ORDER BY `title` DESC, `name` ASC

		$query = $this->db->get();
		
		return $query->result_array();
	}		
}
?>