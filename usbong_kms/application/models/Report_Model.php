<?php 
class Report_Model extends CI_Model
{
	public function insertReport($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		
		//edited by Mike, 20200722
		//note: this is due to the following removed function is not available in PHP 5.3
		//$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		$addedDateTimeStamp = date('Y-m-d H:i:s');

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

		//edited by Mike, 20200722
		//note: this is due to the following removed function is not available in PHP 5.3
		//$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		$addedDateTimeStamp = date('Y-m-d H:i:s');


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
		//edited by Mike, 20200722
		//note: this is due to the following removed function is not available in PHP 5.3
		//$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		$addedDateTimeStamp = date('Y-m-d H:i:s');

/*
		//added by Mike, 20190722; edited by Mike, 20191025
//		$row = $this->doesReportTypeExistViaReportTypeName($param);
//		$row = $this->getReportTypeExistViaReportTypeName($param);
		$reportTypeId = $this->getReportTypeIdViaReportTypeName($param);
		if ($reportTypeId == False) {			
			return False; //edited by Mike, 20190722
		}
*/

		//added by Mike, 20210316
		if (!isset($param["patientId"])) {
			$param["patientId"]=0;
		}

/*	//removed by Mike, 20231014
		//added by Mike, 20210317
		if ((!isset($param["transactionId"])) or ($param["transactionId"]==0)){
			$param["transactionId"]=-1;
		}
*/

		$data = array(

					'image_filename' => $param['outputFileLocation'],
					
/*	//removed by Mike, 20231014
					'transaction_id' => $param["transactionId"], //1
*/

					//added by Mike, 20210316
					'patient_id' => $param["patientId"], //1

//					'added_datetime_stamp' => $addedDateTimeStamp
					
				);
		//edited by Mike, 20231016
		//$this->db->insert('image', $data);
		$this->db->insert('imagev2', $data);
		
		return $this->db->insert_id();		
	}	
	
	//added by Mike, 20220115
	public function insertReportAudio($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		//edited by Mike, 20200722
		//note: this is due to the following removed function is not available in PHP 5.3
		//$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		$addedDateTimeStamp = date('Y-m-d H:i:s');

/*
		//added by Mike, 20190722; edited by Mike, 20191025
//		$row = $this->doesReportTypeExistViaReportTypeName($param);
//		$row = $this->getReportTypeExistViaReportTypeName($param);
		$reportTypeId = $this->getReportTypeIdViaReportTypeName($param);
		if ($reportTypeId == False) {			
			return False; //edited by Mike, 20190722
		}
*/

		//added by Mike, 20210316
		if (!isset($param["patientId"])) {
			$param["patientId"]=0;
		}

		//added by Mike, 20210317
		if ((!isset($param["transactionId"])) or ($param["transactionId"]==0)){
			$param["transactionId"]=-1;
		}


		$data = array(

					'audio_filename' => $param['outputFileLocation'],
					'transaction_id' => $param["transactionId"], //1

					//added by Mike, 20210316
					'patient_id' => $param["patientId"], //1

//					'added_datetime_stamp' => $addedDateTimeStamp
					
				);
		
		$this->db->insert('audio', $data);
		
		return $this->db->insert_id();		
	}	


	//added by Mike, 20191025
	public function insertReportFromEachLocation($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		//edited by Mike, 20200722
		//note: this is due to the following removed function is not available in PHP 5.3
		//$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		$addedDateTimeStamp = date('Y-m-d H:i:s');

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

	//added by Mike, 20210115; edited by Mike, 20210117
	public function getPatientPreviousVisitBeforeToday($param) {
		//$this->db->select('MAX(added_datetime_stamp)');
		$this->db->select('added_datetime_stamp');
		
		$this->db->where('patient_id=',$param['patient_id']);
		$this->db->order_by('added_datetime_stamp', 'DESC');//DESC');
		$this->db->limit(1,1); //get the second transaction
//		$this->db->distinct();

		$query = $this->db->get('transaction');

//		$row = $query->row();		
		$rowArray = $query->result_array();

//		if ($row == null) {					
		if ($rowArray == null) {			
			return False;
		}

//		return $row;		
//		return $rowArray;
		return $rowArray[0]['added_datetime_stamp'];

	}

	//added by Mike, 20210117
	public function getPatientWaitDoneElapsedTime($param) {
		//$this->db->select('MAX(added_datetime_stamp)');
		$this->db->select('added_datetime_stamp');
		
		$this->db->where('patient_id=',$param['patient_id']);

		//added by Mike, 20210218; edited by Mike, 20210219
		$this->db->where('transaction_date=',date("m/d/Y")); //date("m-d-Y")

		$this->db->order_by('added_datetime_stamp', 'DESC');//DESC');
		$this->db->limit(1,0); //get the first transaction
//		$this->db->distinct();

		$this->db->where('notes=',"IN-QUEUE; PAID");
	
		$query = $this->db->get('transaction');

//		$row = $query->row();		
		$rowArray = $query->result_array();

//		if ($row == null) {					
		if ($rowArray == null) {			
			return False;
		}

//		return $row;		
//		return $rowArray;
		return $rowArray[0]['added_datetime_stamp'];
	}


	//added by Mike, 20200529; edited by Mike, 20201127
//	public function getPatientQueueReportForTheDay()
	public function getPatientQueueReportForTheDay($param)
	{
		//date_default_timezone_set('Asia/Hong_Kong');
		//edited by Mike, 20201003
/*		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t3.medical_doctor_name, t3.medical_doctor_id');
*/
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.added_datetime_stamp, t3.medical_doctor_name, t3.medical_doctor_id');
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->distinct('t1.patient_name');

		//$this->db->where('t2.added_datetime_stamp=',date("Y-m-d H:i:s"));
				
//		$this->db->where('t2.transaction_date',date("m/d/Y"));
//		$this->db->where('t2.transaction_date',date("Y-m-d"));

///DATE("m/d/Y", strtotime($value['transaction_date']));
		
		//echo date("Y-m-d");
//		echo date("m/d/Y");

		//added by Mike, 20200601; edited by Mike, 20200606
		//TO-DO: -reverify: this
		//removed by Mike, 20210122
//		$this->db->group_by('t2.patient_id');

		//$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id and t.transaction_date=t2.transaction_date)',NULL,FALSE);

/* //removed by Mike, 20210122
		//edited by Mike, 20200607
		//$this->db->select_max('t2.added_datetime_stamp');
		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=t2.transaction_date and t.patient_id=t2.patient_id)',NULL,FALSE);
*/
		
		//edited by Mike, 20210115
		$this->db->where('t2.transaction_date',date("m/d/Y"));
		//$this->db->where('t2.transaction_date!=',date("m/d/Y"));

		//added by Mike, 20200601
		//TO-DO: -reverify: this
		$this->db->where('t1.patient_id!=',0);
		//added by Mike, 20210123
		$this->db->where('t1.patient_id!=',-1);

		//removed by Mike, 20200601
/*		$this->db->where('t2.fee!=',0);
*/
		//added by Mike, 20200601
//		$this->db->not_like('t2.notes',"NC");
		
//		$this->db->and_where('t2.notes!=',0);

		//removed by Mike, 20200601
/*
		$this->db->or_where('t2.fee=',0);
		$this->db->where('t2.notes',"IN-QUEUE; UNPAID");
*/


//		$this->db->or_where('t2.fee=',0);
//		$this->db->where('t2.notes!=',"NC; PAID");
		
		//added by Mike, 202005029
		$this->db->where('t1.patient_name!=', 'NONE');

		//added by Mike, 20210217
		$this->db->where('t1.patient_id!=', 3543); //NONE, WALA
		$this->db->where('t1.patient_id!=', 3559); //WALK-IN, WALA
		$this->db->where('t1.patient_id!=', -1); //CANCELLED


		//added by Mike, 20201127
		if ($param==0) { //info desk page
			//added by Mike, 20201031; edited by Mike, 20210128
/*
			//includes NON-MED
			//no need to add % when using CodeIgniter 3's not_like(...) command
			$this->db->not_like('t2.notes',"MED ONLY");

			//added by Mike, 20201127
			$this->db->not_like('t2.notes',"MEDICINE ONLY");
			
			//added by Mike, 20201114
			$this->db->not_like('t2.notes',"SNACK ONLY");
*/
			$this->db->not_like('t2.notes',"ONLY");

			$this->db->group_by('t2.patient_id');
			$this->db->group_by('t2.notes');

			//added by Mike, 20211209
			$this->db->where('t2.item_id=',0);

			//added by Mike, 20210218
			//note: removes multiple transactions (without "ONLY of the same patient)
			//edited by Mike, 20211209; edited again by Mike, 20211215
			//at present, delete previous of the multiple transactions 
			//without keyword, "ONLY", e.g. Professional Fee
//			$this->db->where('t2.added_datetime_stamp = (SELECT MIN(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=t2.transaction_date and t.patient_id=t2.patient_id)',NULL,FALSE);
			$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=t2.transaction_date and t.patient_id=t2.patient_id)',NULL,FALSE);

		}
		//added by Mike, 20210122
		else {
			$this->db->group_by('t2.patient_id');

			$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=t2.transaction_date and t.patient_id=t2.patient_id)',NULL,FALSE);
		}


//		$this->db->like('t2.notes', "NEW; NONE YET");
//		$this->db->order_by('t2.transaction_id', 'ASC');//ASC');


		//removed by Mike, 20201021
		//added by Mike, 20201022
		//Note: This is so that the medical_doctor_id whose value is 0, i.e. "ANY",
		//is not always before the list of patients classified to be 
		//medical_doctor_id 1, i.e. DR. PEDRO
//		$this->db->order_by('t3.medical_doctor_id', 'ASC');//ASC');
		
		//added by Mike, 20200530; edited by Mike, 20200530
		$this->db->order_by('t2.transaction_id', 'ASC');//DESC');
//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//');


/* 		//removed by Mike, 20200601
		$this->db->group_by('t1.patient_id');
*/
		//$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');

//		$row = $query->row();		
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
	
	//added by Mike, 20210728
	public function getXrayForTheDay() {
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.x_ray_fee, t2.medical_doctor_id, t3.medical_doctor_name'); 
		
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

		//removed by Mike, 20210902
		//$this->db->distinct('t1.patient_name');
				
		//added by Mike, 20200324
		$this->db->where('t2.transaction_date=',date("m/d/Y"));
//		$this->db->where('t2.transaction_date=',"07/31/2021");

		$this->db->where('t2.x_ray_fee!=',0);
		//removed by Mike, 20210902
//		$this->db->where('t2.transaction_quantity!=',0);

		//added by Mike, 20240517
		//TODO: -verify this;
		//if has "TRANSACTION" added official receipt via PLUS button in acknowledgment form page
		$this->db->not_like('t2.notes',"TRANSACTION");
		
		//added by Mike, 20210902
		$this->db->group_by('t1.patient_id');


//		$this->db->order_by('t2.transaction_id', 'ASC');
		$this->db->order_by('t2.medical_doctor_id', 'ASC');

		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		return $rowArray;
	}
	
	//added by Mike, 20210729
	public function getLabForTheDay() {
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.lab_fee, t2.medical_doctor_id, t3.medical_doctor_name'); 
		
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

		$this->db->distinct('t1.patient_name');
				
		$this->db->where('t2.transaction_date=',date("m/d/Y"));

		$this->db->where('t2.lab_fee!=',0);
		$this->db->where('t2.transaction_quantity!=',0);

//		$this->db->order_by('t2.transaction_id', 'ASC');
		$this->db->order_by('t2.medical_doctor_id', 'ASC');

		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}

		return $rowArray;
	}
	
	//added by Mike, 20200908; edited by Mike, 20220119
	public function getReceiptNumber($transactionId) {
//		echo $transactionId."<br/>";
		
		$this->db->select('receipt_type_id, receipt_number');

		$this->db->where('transaction_id=',$transactionId);		
		
		//added by Mike, 20220119
		//note: This is due to entered value may be zero 
		//with Dr. Honesto who uses MOSC Official Receipt
		$this->db->where('receipt_number!=',0);

		$query = $this->db->get('receipt');
	
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {					
			return False;
		}
		
//		echo $rowArray[0]['receipt_number']."<br/>";
		
		return $rowArray[0]['receipt_number'];
	}
	
	//added by Mike, 20200322; edited by Mike, 20200906
	public function getPayslipForTheDayWeb($param)
	{	
		//max(report_id) error
		//echo "dito".$row->report_id;

//select max(`report_id`) from `report`
//select max(`report_id`) from `report` where `report_filename` like '%PETER%' 
		//edited by Mike, 20200906

		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name'); //, t2.treatment_diagnosis');

/*
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name,  t4.receipt_type_id, t4.receipt_number');
*/
		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');

/*		//removed by Mike, 20200908
		//added by Mike, 20200906
		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');
*/

		//edited by Mike, 20200601
		//$this->db->distinct('t1.patient_name');
		$this->db->group_by('t1.patient_id');
		
//		$this->db->where('t2.report_id=',$row->report_id);
		
		//added by Mike, 20200324; edited by Mike, 20200607
		//TO-DO: -add: instructions for unit member to quickly set date

		//edited by Mike, 20221110
		$this->db->where('t2.transaction_date=',date("m/d/Y"));	
//		$this->db->where('t2.transaction_date=',"09/28/2020");
//		$this->db->where('t2.transaction_date=',"11/09/2022");

		//added by Mike, 20250505
		$this->db->where('t2.transaction_quantity!=',0);

		//added by Mike, 20200601
		//$this->db->where('t2.fee!=',0);
		//$this->db->and_not_like('t2.notes',"NC");
		$this->db->where('t2.notes!=',"IN-QUEUE; PAID");
		
		//added by Mike, 20200828
		$this->db->where('t2.ip_address_id!=',"");
		$this->db->where('t2.machine_address_id!=',"");

		$this->db->like('t3.medical_doctor_name', $param['medicalDoctorName']);

		//added by Mike, 20201031
		//includes NON-MED
		//no need to add % when using CodeIgniter 3's not_like(...) command
		//edited by Mike, 20201106
//		$this->db->not_like('t2.notes',"MED ONLY");		
		//removed by Mike, 20221021;
		//reminder: there exists "MED CERT";
		//TO-DO: -verify: OUTPUT
		//$this->db->not_like('t2.notes',"MED");		
		$this->db->not_like('t2.notes',"ONLY");
		
		//added by Mike, 20201106
		$this->db->not_like('t2.notes',"SSS");
		$this->db->not_like('t2.notes',"SNACK ONLY");

//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');
		$this->db->order_by('t2.transaction_id', 'ASC');//ASC');

		//$this->db->limit(8);//1);
		
		$query = $this->db->get('patient');

//		$row = $query->row();		
		$rowArray = $query->result_array();
	
		//added by Mike, 20221108
		//echo "dito: ".$rowArray[0]["patient_id"];	
		
		if ($rowArray == null) {		
			return False; //edited by Mike, 20190722
		}
		
//		echo "report_id: ".$rowArray[0]['report_id'];
		
/*		return $row->report_description;
*/
//		return $rowArray[0]['report_description'];

		return $rowArray;
	}


	//added by Mike, 20200425; edited by Mike, 20200721
	//TO-DO: -reverify: this
	public function getReceiptReportForTheMonthPAS($param) 
	{
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_quantity, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t3.medical_doctor_id'); //, t4.receipt_number, t4.receipt_id'); //, t2.treatment_diagnosis');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
//		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');

		$this->db->where('t2.transaction_quantity!=',0);

		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));

		$this->db->group_by('t2.transaction_id');		

		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		echo "count: ".count($rowArray)."<br/>";
/*
		//removed by Mike, 20200721
		//TO-DO: -reverify this
		foreach ($rowArray as &$rowValue) {
			//identify the receipt number for the PAS item purchase
			$iCurrentTransactionId = $rowValue['transaction_id'];

			$iMaxTransactionCount = $rowValue['transaction_quantity'];
			$iCurrentTransactionCount = 1;

				echo "max: ".$iMaxTransactionCount."<br/>";


			while ($iCurrentTransactionCount < $iMaxTransactionCount) {			
				echo "current: ".$iCurrentTransactionCount."<br/>";
				echo $iCurrentTransactionId."<br/>";

				$this->db->select('t1.receipt_number, t1.receipt_id, t2.item_id');
				$this->db->from('receipt as t1');
				$this->db->join('transaction as t2', 't1.transaction_id = t2.transaction_id', 'LEFT');

				$this->db->where('t2.transaction_id',$iCurrentTransactionId);
				//$this->db->where('t2.item_id!=',0);

				$query = $this->db->get('receipt');

				$itemTransactionRowArray = $query->result_array();
				
				//added by Mike, 20200617
				if ($itemTransactionRowArray == null) {			
					//edited by Mike, 20200721
					//return False;
					$iCurrentTransactionCount = $iCurrentTransactionCount + 1;
					continue;
				}
		
				if ($itemTransactionRowArray[0]['item_id']!=0) {
					$rowValue['item_id'] = $itemTransactionRowArray[0]['item_id'];
					$rowValue['receipt_number'] = $itemTransactionRowArray[0]['receipt_number'];
				}

				$iCurrentTransactionId = $iCurrentTransactionId - 1;
				$iCurrentTransactionCount = $iCurrentTransactionCount + 1;				
			}
			unset($rowValue);			
		}
		
		return $rowArray;
*/
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
	
		array_push($outputArray, $rowArray[0]);
		$bIsFound = False;
		
		foreach ($rowArray as $rowValue) {
			$bIsFound = False;			
			foreach ($outputArray as &$outputRowValue) {
				if ($outputRowValue['receipt_number'] == $rowValue['receipt_number']) {
					$bIsFound = True;

					if ($outputRowValue['receipt_id'] < $rowValue['receipt_id']) {
						$outputRowValue = $rowValue;
						unset($outputRowValue);
						break;
					}
				}
			}			
			
			if (!$bIsFound) {				
				array_push($outputArray, $rowValue);
			}
		}
				
		return $outputArray;

	}

	//added by Mike, 20200425; edited by Mike, 20200721
	//TO-DO: -reverify: this
	public function getReceiptReportForTheMonthPASPrev($param) 
	{
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_quantity, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t3.medical_doctor_id'); //, t4.receipt_number, t4.receipt_id'); //, t2.treatment_diagnosis');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
//		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');

		$this->db->where('t2.transaction_quantity!=',0);

		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));

		$this->db->group_by('t2.transaction_id');		

		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False;
		}
		
		echo "count: ".count($rowArray)."<br/>";

		foreach ($rowArray as &$rowValue) {
			//identify the receipt number for the PAS item purchase
			$iCurrentTransactionId = $rowValue['transaction_id'];

			$iMaxTransactionCount = $rowValue['transaction_quantity'];
			$iCurrentTransactionCount = 1;

				echo "current: ".$iCurrentTransactionCount."<br/>";
				echo "max: ".$iMaxTransactionCount."<br/>";


			while ($iCurrentTransactionCount < $iMaxTransactionCount) {			
				echo $rowValue['transaction_id']."<br/>";

				$this->db->select('t1.receipt_number, t1.receipt_id, t2.item_id');
				$this->db->from('receipt as t1');
				$this->db->join('transaction as t2', 't1.transaction_id = t2.transaction_id', 'LEFT');

				$this->db->where('t2.transaction_id',$iCurrentTransactionId);
				//$this->db->where('t2.item_id!=',0);

				$query = $this->db->get('receipt');

				$itemTransactionRowArray = $query->result_array();
				
				//added by Mike, 20200617
				if ($itemTransactionRowArray == null) {			
					//edited by Mike, 20200721
					//return False;
					continue;
				}
		
				if ($itemTransactionRowArray[0]['item_id']!=0) {
					$rowValue['item_id'] = $itemTransactionRowArray[0]['item_id'];					
					$rowValue['receipt_number'] = $itemTransactionRowArray[0]['receipt_number'];					

				}

				$iCurrentTransactionId = $iCurrentTransactionId - 1;
				$iCurrentTransactionCount = $iCurrentTransactionCount + 1;
			}
			unset($rowValue);			
		}
		
		return $rowArray;
/*		
		$outputArray = [];

		array_push($outputArray, $rowArray[0]);
		$bIsFound = False;
		
		foreach ($rowArray as $rowValue) {
			$bIsFound = False;			
			foreach ($outputArray as &$outputRowValue) {
				if ($outputRowValue['receipt_number'] == $rowValue['receipt_number']) {
					$bIsFound = True;

					if ($outputRowValue['receipt_id'] < $rowValue['receipt_id']) {
						$outputRowValue = $rowValue;
						unset($outputRowValue);
						break;
					}
				}
			}			
			
			if (!$bIsFound) {				
				array_push($outputArray, $rowValue);
			}
		}
				
		return $outputArray;
*/
	}

	//added by Mike, 20200425; edited by Mike, 20200723
	public function getReceiptReportForTheMonth($param) 
	{
/*		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name'); //, t2.treatment_diagnosis');
*/		
		//edited by Mike, 20200610
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t3.medical_doctor_id, t4.receipt_number, t4.receipt_id'); //, t2.treatment_diagnosis');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');
				
		if (strtoupper($param["receiptTypeName"])=="MOSC") {
			//MOSC
			$this->db->where('t4.receipt_type_id=',1);
		}
		else if (strtoupper($param["receiptTypeName"])=="PAS") {
			//PAS
			//added by Mike, 20200423
			$this->db->where('t4.receipt_type_id=',2);
		}		
		else {
			$this->db->where('t4.receipt_type_id=',3);
		}

		$this->db->where('t4.receipt_number!=',0);					

		//added by Mike, 20210105
		if (!isset($param["yearNum"])) {
			$param["yearNum"] = date("Y");
//			echo $param["yearNum"];
		}

		//edited by Mike, 20210105
		if ($param["yearNum"] < 2021) {
			//edited by Mike, 20200721
			if ($param["monthNum"]<="06") {		
			  $this->db->group_by('t4.receipt_id');		
			}
			else { //get the earliest transaction that use the receipt number			
				//edited by Mike, 20200723
				$this->db->group_by('t4.receipt_id');		
	//			$this->db->where('t4.receipt_id = (SELECT MAX(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number and t.transaction_id=t2.transaction_id)',NULL,FALSE);

				//removed by Mike, 20200723
				//$this->db->where('t4.receipt_id = (SELECT MIN(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number)',NULL,FALSE);
				//removed by Mike, 20200723			
				//$this->db->where('t4.receipt_id = (SELECT MIN(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number and t.transaction_id=t2.transaction_id)',NULL,FALSE);
			}
		}
		else {
			$this->db->group_by('t4.receipt_id');		
		}

/*		//TO-DO: -update: keyphrase, "currentMonthNum", to "nextMonthNum"
		echo $param["monthNum"]."<br/>";		
		echo $param["currentMonthNum"]."<br/>";
*/
		//edited by Mike, 20201224
/*		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));
*/

		//added by Mike, 20201225
		$nextMonthNum = ""; //note: if not set, KMS shall notify Unit member with error message
		if (isset($param["currentMonthNum"]) and ($param["currentMonthNum"]!==0)) {
			$nextMonthNum = $param["currentMonthNum"];
		}

		if (isset($param["nextMonthNum"]) and ($param["nextMonthNum"]!==0)) {
			$nextMonthNum = $param["nextMonthNum"];
		}
		
		//edited by Mike, 20201225
/*		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
*/
		//note: STR_TO_DATE output format: YYYY-mm-dd
		//edited by Mike, 20210105
//		$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') >=",date('Y')."-".$param["monthNum"]."-01");
		$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') >=",$param["yearNum"]."-".$param["monthNum"]."-01");

		if ($param["monthNum"]=="12") {			
			//echo date('Y', strtotime('+1 year'));
			//echo $param["currentMonthNum"]."/01/".date('Y', strtotime('+1 year'));
			
			//note: STR_TO_DATE output format: YYYY-mm-dd
//			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <","2021-01-01");

			//edited by Mike, 20201225
//			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",date('Y', strtotime('+1 year'))."-".$param["currentMonthNum"]."-01");

			//edited by Mike, 20210105
//			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",date('Y', strtotime('+1 year'))."-".$nextMonthNum."-01");
			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",($param["yearNum"]+1)."-".$nextMonthNum."-01");

		}
		else {
			//edited by Mike, 20201225
/*	$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));
*/	
			//note: STR_TO_DATE output format: YYYY-mm-dd
			//edited by Mike, 20201225
//			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",date("Y")."-".$param["currentMonthNum"]."-01");
			//edited by Mike, 20210105
//			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",date("Y")."-".$nextMonthNum."-01");
			$this->db->where("STR_TO_DATE(t2.transaction_date, '%m/%d/%Y') <",$param["yearNum"]."-".$nextMonthNum."-01");

		}

		//edited by Mike, 20200426
		$this->db->order_by('t4.receipt_number', 'ASC');//ASC');
		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		//edited by Mike, 20200610
		//return $rowArray;		
		
		//echo "count: ".count($rowArray);
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		array_push($outputArray, $rowArray[0]);
		$bIsFound = False;
		
		foreach ($rowArray as $rowValue) {
			$bIsFound = False;			
			foreach ($outputArray as &$outputRowValue) {
				if ($outputRowValue['receipt_number'] == $rowValue['receipt_number']) {
					$bIsFound = True;
					
					//edited by Mike, 20200723
//					if ($outputRowValue['receipt_id'] < $rowValue['receipt_id']) {
					if ($outputRowValue['transaction_id'] < $rowValue['transaction_id']) {
						$outputRowValue = $rowValue;
						unset($outputRowValue);
						break;
					}
				}
			}			
			
			if (!$bIsFound) {				
				array_push($outputArray, $rowValue);
			}
		}
		
		return $outputArray;
	}

	//added by Mike, 20200425; edited by Mike, 20200723
	public function getReceiptReportForTheMonthPrevMemoryProblem($param) 
	{
/*		
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name'); //, t2.treatment_diagnosis');
*/		
		//edited by Mike, 20200610
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t3.medical_doctor_id, t4.receipt_number, t4.receipt_id'); //, t2.treatment_diagnosis');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');

		//Reference: https://stackoverflow.com/questions/34917060/getting-the-recent-row-by-join-group-by;
		//last accessed: 20200422
		//answer by: Disha V. on 20160121
		//edited by: Community on 20170523

//		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id)',NULL,FALSE);

		//removed by Mike, 20200509
/*		
		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id and t.transaction_date=t2.transaction_date)',NULL,FALSE);
*/


//		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.patient_id=t2.patient_id and t.transaction_date=t2.transaction_date and t2.medical_doctor_id =2)',NULL,FALSE);

//		$this->db->where('t2.fee!=',0);
		
		//added by Mike, 20200422
		//TO-DO: -update: this
		//added by Mike, 20200423
//		$this->db->like('t3.medical_doctor_name',$param["medicalDoctorName"]); 
				
		if (strtoupper($param["receiptTypeName"])=="MOSC") {
			//MOSC
			$this->db->where('t4.receipt_type_id=',1);
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

		$this->db->where('t4.receipt_number!=',0);					

		//added by Mike, 20200423
//		$this->db->like('t3.medical_doctor_name',$param["medicalDoctorName"]); 
//		$this->db->or_like('t3.medical_doctor_id',0); 
		
		//added by Mike, 20200324
/*		$this->db->where('t2.transaction_date=',date("m/d/Y"));
*/

//		$this->db->group_by('t1.patient_name');
//		$this->db->group_by('t2.transaction_date');
//		$this->db->group_by('t2.added_datetime_stamp');

		//edited by Mike, 20200509
/*		$this->db->group_by('t2.transaction_id');
*/
		//edited by Mike, 20200610
		//note: get the newest transaction that use the receipt number
		//$this->db->group_by('t4.receipt_id');
/*		$this->db->group_by('t4.receipt_number');		
*/

		//edited by Mike, 20200721
		if ($param["monthNum"]<="06") {		
		  $this->db->group_by('t4.receipt_id');		
		}
		else { //get the earliest transaction that use the receipt number			
			//edited by Mike, 20200723
			//$this->db->where('t4.receipt_id = (SELECT MIN(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number)',NULL,FALSE);
			$this->db->where('t4.receipt_id = (SELECT MIN(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number and t.transaction_id=t2.transaction_id)',NULL,FALSE);
		}
		
//		$this->db->where('t2.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM transaction as t WHERE t.transaction_date=t2.transaction_date and t.transaction_id=t2.transaction_id)',NULL,FALSE);
		

/*
		$this->db->group_by('t2.report_id');
		$this->db->distinct('t2.report_id');

		$this->db->group_by('t6.report_filename');
*/


//		$this->db->like('t2.transaction_date',date("m/d/Y"));
//		$this->db->like('t2.transaction_date',date("Y-m"));
		//edited by Mike, 20200505
		
//		$this->db->like('t2.transaction_date',date("m"));
//		$this->db->like('t2.transaction_date',"04/01/2020");//date("m")-1);
/*
		$this->db->where('t2.transaction_date>=',"04/01/2020");
		$this->db->where('t2.transaction_date<',"05/01/2020");
*/
		//TO-DO: -update: transaction_date to date format not text
//		echo "previousMonthNum: ".$param["previousMonthNum"];
/*		echo "currentMonthNum: ".$param["currentMonthNum"];
		echo "monthNum: ".$param["monthNum"];
*/
		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));

//		$this->db->like('t2.transaction_date',date("Y"));

//		$this->db->order_by('t2.added_datetime_stamp', 'DESC');//ASC');
		//edited by Mike, 20200423
//		$this->db->order_by('t2.added_datetime_stamp', 'ASC');//ASC');
//		$this->db->order_by('t2.transaction_date', 'ASC');//ASC');

		//edited by Mike, 20200426
		$this->db->order_by('t4.receipt_number', 'ASC');//ASC');
		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		//edited by Mike, 20200610
		//return $rowArray;		
		
		//echo "count: ".count($rowArray);
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		array_push($outputArray, $rowArray[0]);
		$bIsFound = False;
		
		foreach ($rowArray as $rowValue) {
			$bIsFound = False;			
			foreach ($outputArray as &$outputRowValue) {
				if ($outputRowValue['receipt_number'] == $rowValue['receipt_number']) {
					$bIsFound = True;

					if ($outputRowValue['receipt_id'] < $rowValue['receipt_id']) {
						$outputRowValue = $rowValue;
						unset($outputRowValue);
						break;
					}
				}
			}			
			
			if (!$bIsFound) {				
				array_push($outputArray, $rowValue);
			}
		}
		
		return $outputArray;
	}

	//added by Mike, 20200420; edited by Mike, 20200421
	//TO-DO: -update: this
	public function getReceiptReportForTheMonthPrev($param) 
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

	//added by Mike, 20200722
	public function getReceiptReportForTheDay($param) 
	{
		$this->db->select('t1.patient_name, t1.patient_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.notes, t2.x_ray_fee, t2.lab_fee, t2.med_fee, t2.pas_fee, t2.transaction_type_name, t2.treatment_type_name, t3.medical_doctor_name, t3.medical_doctor_id, t4.receipt_number, t4.receipt_id'); //, t2.treatment_diagnosis');

		$this->db->from('patient as t1');
		$this->db->join('transaction as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->join('receipt as t4', 't2.transaction_id = t4.transaction_id', 'LEFT');

		if (strtoupper($param["receiptTypeName"])=="MOSC") {
			//MOSC
			$this->db->where('t4.receipt_type_id=',1);
		}
		else if (strtoupper($param["receiptTypeName"])=="PAS") {
			//PAS
			//edited by Mike, 20201012
			//TO-DO: -reverify: this
			$this->db->where('t4.receipt_type_id=',2);
			//$this->db->where('t4.receipt_type_id=',1);
		}		
		else {
			$this->db->where('t4.receipt_type_id=',3);
		}

		$this->db->where('t4.receipt_number!=',0);					

		//TO-DO: -update: for January
		//edited by Mike, 20200722
		//if ($param["monthNum"]<="06") {
		if ($param["currentMonthNum"]<="06") {		
		  $this->db->group_by('t4.receipt_id');		
		}
		else { //get the earliest transaction that use the receipt number						
			//edited by Mike, 20200723
			$this->db->group_by('t4.receipt_id');		

			//edited by Mike, 20200723; removed by Mike, 20200723
			//$this->db->where('t4.receipt_id = (SELECT MIN(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number)',NULL,FALSE);
//			$this->db->where('t4.receipt_id = (SELECT MIN(t.receipt_id) FROM receipt as t WHERE t.receipt_number=t4.receipt_number and t.transaction_id=t2.transaction_id)',NULL,FALSE);
		}

/*		//edited by Mike, 20200722
		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));
*/
		$this->db->where('t2.transaction_date=',date("m/d/Y")); //date today

		$this->db->order_by('t4.receipt_number', 'ASC');//ASC');
		
		$query = $this->db->get('patient');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		//echo "count: ".count($rowArray);
		
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		array_push($outputArray, $rowArray[0]);
		$bIsFound = False;
		
		foreach ($rowArray as $rowValue) {
			$bIsFound = False;			
			foreach ($outputArray as &$outputRowValue) {
				if ($outputRowValue['receipt_number'] == $rowValue['receipt_number']) {
					$bIsFound = True;

					//edited by Mike, 20200723
//					if ($outputRowValue['receipt_id'] < $rowValue['receipt_id']) {
					if ($outputRowValue['transaction_id'] < $rowValue['transaction_id']) {
						$outputRowValue = $rowValue;
						unset($outputRowValue);
						break;
					}
				}
			}			
			
			if (!$bIsFound) {				
				array_push($outputArray, $rowValue);
			}
		}
		
		return $outputArray;
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

//		$this->db->group_by('t1.patient_name');
//		$this->db->group_by('t2.transaction_date');
//		$this->db->group_by('t2.added_datetime_stamp');
		$this->db->group_by('t2.transaction_id');

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
	//added by Mike, 20200412; edited by Mike, 20200926
	public function getPurchasedItemTransactionsForTheDay($itemTypeId) 
	{	
		$rowArray = $this->getMedicineTransactionsForTheDayAsterisk();

		//edited by Mike, 20200926
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t3.receipt_id');
//edited by Mike, 20210222
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes, t3.receipt_id, t3.receipt_number');
		
		//edited by Mike, 20211203
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes, t3.receipt_id, t3.receipt_number, t3.receipt_type_id');
		if ($itemTypeId==2) { //non-med item
			$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes, t3.receipt_id, t3.receipt_number, t3.receipt_type_id');
		}
		else {
			$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes');
		}
		
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

		//edited by Mike, 20211203
		//reminder: deleting excess JOIN COMMANDS causes noticeable speed-up in execution
		if ($itemTypeId==2) { //non-med item
			$this->db->join('receipt as t3', 't2.transaction_id = t3.transaction_id', 'LEFT'); //added by Mike, 20200430
		}

		$this->db->distinct('t1.item_name');

		$this->db->where('t1.item_type_id', $itemTypeId);
		
		//added by Mike, 20200909; removed by Mike, 20210910
//		$this->db->where('t1.item_name!=', "MINORSET");
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0);

		//added by Mike, 20211203
		$this->db->where('t1.is_hidden=', 0);

//		$this->db->where('t1.item_id', $itemId);
		//edited by Mike, 20200607
		//TO-DO: -add: instructions for unit member to quickly set the date
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
//		$this->db->where('t2.transaction_date', "12/02/2021");//ASC');		

		$this->db->like('t2.notes', "PAID");

		//added by Mike, 20200727
		$this->db->not_like('t2.notes', "UNPAID");

		//edited by Mike, 20200403
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {			
	//			echo "value: ".$value['item_id']."<br/>";
				$this->db->where('t1.item_id !=', $value['item_id']);		
			}
		}
		
		//added by Mike, 20210222
		$this->db->group_by('t2.transaction_id');

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
		
		//added by Mike, 20200926
		$iCurrentItemId = -1;
		$iItemQuantity = 0;
		$dItemTotalFee = 0;
		
		//added by Mike, 20200913
		$dItemTotalVATAmount = 0;
				
		//added by Mike, 20200912
		$iCurrentItemReceiptNumber = -1;
		
		//unify transactions whose item_id's are equal
		//TO-DO: -add: this
		//and receipt number's are of equal status, i.e. >0, or zero (0) for non-med items
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		//added by Mike, 20210218
		$sameItemOutputArray = array();
		
		$currentValue = "";
		
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {

				//added by Mike, 20200923
				$dItemTotalVATAmount = 0;
			
//				echo "iCurrentItemId: ".$iCurrentItemId." : ".$value['item_name']." : ".$value['fee_quantity']."<br/>";
//				echo "iCurrentItemId: ".$iCurrentItemId."<br/>";

				//edited by Mike, 20200912
				//TO-DO: -update: this
				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id'])) {
//				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id']) && $iCurrentItemReceiptNumber) {
//					echo "push<br/>";

					//removed by Mike, 20210218
/*					array_push($outputArray, $currentValue);
					
					$iItemQuantity = 0;
					$dItemTotalFee = 0;
*/					
					$iCurrentItemId=$value['item_id'];
				}
				//added by Mike, 20200912
				//note: identify non-med item
				else {
/*
					if ($iCurrentItemReceiptNumber!=-1) { //with VAT
						echo "dito".$iCurrentItemReceiptNumber;
					}
*/					

/* //removed by Mike, 20210218
					//added by Mike, 20210218
					$iItemQuantity = 0;
					$dItemTotalFee = 0;
*/
				}

				//added by Mike, 20210218
				$iItemQuantity = 0;
				$dItemTotalFee = 0;


				//quantity
				if ($value['fee_quantity']==0) {
					$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
				}
				else {
					$iQuantity =  $value['fee_quantity'];
				}

				$iItemQuantity = $iItemQuantity + $iQuantity;
				
				//total
				$dItemTotalFee = $dItemTotalFee + $value['fee'];

				//added by Mike, 20200913
				if ($itemTypeId==2) { //non-med item								
					//edited by Mike, 20200916
/*				
					if ($value['receipt_id']==0) {
						$dAddedVATAmount = 0;
					}
					else {
						$dAddedVATAmount = $value['fee'] - ($value['fee'] / ( 1 + 0.12));

						$dItemTotalVATAmount = $dItemTotalVATAmount + $dAddedVATAmount;
					}
*/					
					if ($value['receipt_id']==0) {
						$dAddedVATAmount = 0;
					}								
					//added by Mike, 20210222
					else if ($value['receipt_type_id']!=2) {
						$dAddedVATAmount = 0;
					}
					else {
												
//						echo ">>".$value['item_name'];
						
						//edited by Mike, 20200916
						//+added: SC/PWD IN ITEM NOTES
						//echo $value['notes'];
						//edited by Mike, 20201222
//						if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
						if (strpos($value['notes'],"DISCOUNTED")!==false) {
							//computation equal with "WI"
							$dAddedVATAmount = $value['fee'] - ($value['fee'] / ( 1 + 0.12));
							$dItemTotalVATAmount = $dItemTotalVATAmount + $dAddedVATAmount;							
						}
						else if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
							$dAddedVATAmount = 0;
						}
						else {
							$dAddedVATAmount = $value['fee'] - ($value['fee'] / ( 1 + 0.12));
							$dItemTotalVATAmount = $dItemTotalVATAmount + $dAddedVATAmount;
						}
					}		
				}
				
//				$dItemTotalVATAmount = $dItemTotalVATAmount + $value['fee'];
//				echo "iItemQuantity: " .$iItemQuantity."; ";
				
				$value['fee_quantity'] = $iItemQuantity;
				$value['fee'] = $dItemTotalFee;				

				//added by Mike, 20200913				
				$value['vat_amount_paid'] = $dItemTotalVATAmount;


				$iCurrentItemId=$value['item_id'];
				
				//added by Mike, 20200912; edited by Mike, 20211203
				//$iCurrentItemReceiptNumber=$value['receipt_number'];
				$iCurrentItemReceiptNumber="";
				if ($itemTypeId==2) { //non-med item
					$iCurrentItemReceiptNumber=$value['receipt_number'];
				}

				
				$currentValue = $value;
		
//				echo "value: ".$value['item_id']."<br/>";

				//added by Mike, 20210218
				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id'])) {
				}
				else {
					array_push($sameItemOutputArray, $currentValue);
				}
			}

			//edited by Mike, 20210218
//			array_push($outputArray, $currentValue);
			foreach ($sameItemOutputArray as $value) {
				array_push($outputArray, $value);
			}		
		}
		
		//edited by Mike, 20200506
//		return $rowArray;
		return $outputArray;
	}	

	//added by Mike, 20200506
	public function getPurchasedItemTransactionsForTheDayUnified($itemTypeId) 
	{	
		$rowArray = $this->getMedicineTransactionsForTheDayAsterisk();
		
		//edited by Mike, 20200912
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t3.receipt_id');
		//edited by Mike, 20200916
//		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t3.receipt_id, t3.receipt_number');

		//edited by Mike, 20211203
		//$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes, t3.receipt_id, t3.receipt_number');

		if ($itemTypeId==2) { //non-med item
			$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes, t3.receipt_id, t3.receipt_number, t3.receipt_type_id');
		}
		else {
			$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t2.notes');
		}


		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');

		if ($itemTypeId==2) { //non-med item
			$this->db->join('receipt as t3', 't2.transaction_id = t3.transaction_id', 'LEFT'); //added by Mike, 20200430
		}

		$this->db->distinct('t1.item_name');
		
		$this->db->where('t1.item_type_id', $itemTypeId);

		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0);

		//added by Mike, 20211203
		$this->db->where('t1.is_hidden=', 0);

//		$this->db->where('t1.item_id', $itemId);
		//edited by Mike, 20200607
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
//		$this->db->where('t2.transaction_date', "12/03/2021");		

		$this->db->like('t2.notes', "PAID");

		//added by Mike, 20200727
		$this->db->not_like('t2.notes', "UNPAID");

		//edited by Mike, 20200403
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {			
				//edited by Mike, 20201123
	//			echo "value: ".$value['item_id']."<br/>";
				$this->db->where('t1.item_id !=', $value['item_id']);		
			}
		}

		//added by Mike, 20200912				
		//		$this->db->where('t3.receipt_id !=', $value['receipt_id']);		
		//$this->db->group_by('t3.receipt_id');

		//added by Mike, 20200923; edited by Mike, 20201109
		//$this->db->where('t1.item_name !=', "MINORSET");		
		$this->db->not_like('t1.item_name', "MINORSET");		

		
		//added by Mike, 20200506
//		$this->db->group_by('t1.item_name');

		//edited by Mike, 20200506
//		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');
		$this->db->order_by('t1.item_name`', 'ASC'); //'DESC');//ASC');

		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		//added by Mike, 20200506
		$iCurrentItemId = -1;
		$iItemQuantity = 0;
		$dItemTotalFee = 0;
		
		//added by Mike, 20200913
		$dItemTotalVATAmount = 0;
				
		//added by Mike, 20200912
		$iCurrentItemReceiptNumber = -1;
		
		//unify transactions whose item_id's are equal
		//TO-DO: -add: this
		//and receipt number's are of equal status, i.e. >0, or zero (0) for non-med items
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		$currentValue = "";
		
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {

				//added by Mike, 20200923
				$dItemTotalVATAmount = 0;
			
//				echo "iCurrentItemId: ".$iCurrentItemId." : ".$value['item_name']." : ".$value['fee_quantity']."<br/>";
//				echo "iCurrentItemId: ".$iCurrentItemId."<br/>";

				//edited by Mike, 20200912
				//TO-DO: -update: this
				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id'])) {
//				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id']) && $iCurrentItemReceiptNumber) {
//					echo "push<br/>";
					array_push($outputArray, $currentValue);
					
					$iItemQuantity = 0;
					$dItemTotalFee = 0;
					
					$iCurrentItemId=$value['item_id'];
				}
				//added by Mike, 20200912
				//note: identify non-med item
				else {
/*
					if ($iCurrentItemReceiptNumber!=-1) { //with VAT
						echo "dito".$iCurrentItemReceiptNumber;
					}
*/					
				}

				//quantity
				if ($value['fee_quantity']==0) {
					$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
				}
				else {
					$iQuantity =  $value['fee_quantity'];
				}

				$iItemQuantity = $iItemQuantity + $iQuantity;
				
				//total
				$dItemTotalFee = $dItemTotalFee + $value['fee'];

				//added by Mike, 20200913
				if ($itemTypeId==2) { //non-med item								
					//edited by Mike, 20200916
/*				
					if ($value['receipt_id']==0) {
						$dAddedVATAmount = 0;
					}
					else {
						$dAddedVATAmount = $value['fee'] - ($value['fee'] / ( 1 + 0.12));

						$dItemTotalVATAmount = $dItemTotalVATAmount + $dAddedVATAmount;
					}
*/					
					if ($value['receipt_id']==0) {
						$dAddedVATAmount = 0;
					}								
					else {
												
//						echo ">>".$value['item_name'];
						
						//edited by Mike, 20200916
						//+added: SC/PWD IN ITEM NOTES
						//echo $value['notes'];
						//edited by Mike, 20201222
//						if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
						if (strpos($value['notes'],"DISCOUNTED")!==false) {
							$dAddedVATAmount = $value['fee'] - ($value['fee'] / ( 1 + 0.12));
							$dItemTotalVATAmount = $dItemTotalVATAmount + $dAddedVATAmount;
						}
						else if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
							$dAddedVATAmount = 0;
//						echo ">>>>".$dAddedVATAmount;
						}
						else {
							$dAddedVATAmount = $value['fee'] - ($value['fee'] / ( 1 + 0.12));
							$dItemTotalVATAmount = $dItemTotalVATAmount + $dAddedVATAmount;
						
						//removed by Mike, 20201003
//						echo ">>>>".$dAddedVATAmount;
							
						}
					}		
				}
				
//				$dItemTotalVATAmount = $dItemTotalVATAmount + $value['fee'];
//				echo "iItemQuantity: " .$iItemQuantity."; ";
				
				$value['fee_quantity'] = $iItemQuantity;
				$value['fee'] = $dItemTotalFee;				

				//added by Mike, 20200913				
				$value['vat_amount_paid'] = $dItemTotalVATAmount;

				$iCurrentItemId=$value['item_id'];
				
				//added by Mike, 20200912; edited by Mike, 20211203
				//$iCurrentItemReceiptNumber=$value['receipt_number'];
				$iCurrentItemReceiptNumber="";
				if ($itemTypeId==2) { //non-med item
					$iCurrentItemReceiptNumber=$value['receipt_number'];
				}
				
				$currentValue = $value;
		
//				echo "value: ".$value['item_id']."<br/>";
			}

			array_push($outputArray, $currentValue);
		}
		
		//edited by Mike, 20200506
//		return $rowArray;
		return $outputArray;
	}	
	
	//added by Mike, 20240629
/*
	SELECT item_id, item_name, item_price FROM item WHERE is_hidden != 1 AND item_type_id = 1 ORDER BY item_total_sold DESC;

	// --
	
	SELECT item_id, item_name, item_price FROM item WHERE is_hidden != 1 AND item_type_id = 1 ORDER BY item_name ASC;
*/	
	public function getItemPriceList($itemTypeId) 
	{	
		$this->db->select('t1.item_id, t1.item_name, t1.item_price');		

		$this->db->from('item as t1');

		//$this->db->distinct('t1.item_name');
		$this->db->distinct('t1.item_id');
		
		$this->db->where('t1.item_type_id', $itemTypeId);
		$this->db->where('t1.is_hidden', 0); //not hidden
		$this->db->where('t1.item_id!=', 0);

//		$this->db->order_by('t1.item_total_sold`', 'DESC');
		$this->db->order_by('t1.item_name`', 'ASC');
		
		//$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		return $rowArray;
		//return $outputArray;
	}
	
	//TO-DO: -update: this
	//added by Mike, 20200520
	public function getPurchasedItemTransactionsForTheDayUnifiedAll($itemTypeId) 
	{	
		//removed by Mike, 20200520
//		$rowArray = $this->getMedicineTransactionsForTheDayAsterisk();

		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity, t3.receipt_id');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->join('receipt as t3', 't2.transaction_id = t3.transaction_id', 'LEFT'); //added by Mike, 20200430

		$this->db->distinct('t1.item_name');

		$this->db->where('t1.item_type_id', $itemTypeId);

		$this->db->where('t2.transaction_id!=', "-1");

//		$this->db->where('t1.item_id', $itemId);

//		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
/*
	$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/01/".date("Y"));
*/

		$param["monthNum"] = "04";
		$param["currentMonthNum"] = "04";

		$this->db->where('t2.transaction_date>=',$param["monthNum"]."/01/".date("Y"));
		$this->db->where('t2.transaction_date<',$param["currentMonthNum"]."/30/".date("Y"));


		$this->db->like('t2.notes', "PAID");
		
		//removed by Mike, 20200520
/*
		//edited by Mike, 20200403
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {			
	//			echo "value: ".$value['item_id']."<br/>";
				$this->db->where('t1.item_id !=', $value['item_id']);		
			}
		}
*/		
		//added by Mike, 20200506
//		$this->db->group_by('t1.item_name');

		//edited by Mike, 20200506
//		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');

		//edited by Mike, 20200520
		$this->db->order_by('t1.item_name`', 'ASC'); //'DESC');//ASC');
/*		
		$this->db->order_by('t2.transaction_date`', 'ASC'); //'DESC');//ASC');
*/
		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		//added by Mike, 20200506
		$iCurrentItemId = -1;
		$iItemQuantity = 0;
		$dItemTotalFee = 0;
		
		//unify transactions whose item_id are equal
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		$currentValue = "";
		
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {
							
//				echo "iCurrentItemId: ".$iCurrentItemId." : ".$value['item_name']." : ".$value['fee_quantity']."<br/>";
//				echo "iCurrentItemId: ".$iCurrentItemId."<br/>";

				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id'])) {					
//					echo "push<br/>";

					array_push($outputArray, $currentValue);
					
					$iItemQuantity = 0;
					$dItemTotalFee = 0;
					
					$iCurrentItemId=$value['item_id'];
				}

				//quantity
				if ($value['fee_quantity']==0) {
					$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
				}
				else {
					$iQuantity =  $value['fee_quantity'];
				}

				$iItemQuantity = $iItemQuantity + $iQuantity;
				
				//total
				$dItemTotalFee = $dItemTotalFee + $value['fee'];

//				echo "iItemQuantity: " .$iItemQuantity."; ";
				
				$value['fee_quantity'] = $iItemQuantity;
				$value['fee'] = $dItemTotalFee;				

				$iCurrentItemId=$value['item_id'];
				$currentValue = $value;
		
//				echo "value: ".$value['item_id']."<br/>";
			}

			array_push($outputArray, $currentValue);
		}
		
		//edited by Mike, 20200506
//		return $rowArray;
		return $outputArray;
	}

	//added by Mike, 20210216
	public function getRequestedLabTransactionsForTheDay() 
	{	
		$this->db->select('t1.patient_id, t1.lab_service_notes, t4.lab_service_item_name, t2.patient_name, t3.medical_doctor_name');
		$this->db->from('lab_service as t1');
		$this->db->join('patient as t2', 't1.patient_id = t2.patient_id', 'LEFT');
		$this->db->join('medical_doctor as t3', 't2.medical_doctor_id = t3.medical_doctor_id', 'LEFT');
		$this->db->join('lab_service_item as t4', 't1.lab_service_item_id = t4.lab_service_item_id', 'LEFT');

//		$this->db->distinct('t1.item_name');

//		$this->db->where('t1.item_id', $itemId);
		$this->db->where('t1.lab_service_date', date("Y-m-d"));		

/* //removed by Mike, 20210216
		//edited by Mike, 20200403
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {			
	//			echo "value: ".$value['item_id']."<br/>";
				$this->db->where('t1.item_id !=', $value['item_id']);		
			}
		}
*/
		$this->db->group_by('t4.lab_service_item_id');

		$this->db->order_by('t1.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');
//		$this->db->order_by('t1.added_datetime_stamp`', 'DESC'); //'DESC');//ASC');

		$this->db->where('t1.added_datetime_stamp = (SELECT MAX(t.added_datetime_stamp) FROM lab_service as t WHERE t.lab_service_date=t1.lab_service_date and t.lab_service_item_id=t1.lab_service_item_id)',NULL,FALSE);


		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('lab_service');

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
		//edited by Mike, 20200607
		//TO-DO: -add: instructions for unit member to quickly set the date
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
		//$this->db->where('t2.transaction_date', "06/06/2020");//ASC');		

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

	//added by Mike, 20200507
	//Glucosamine Sulphate 1500mg and Calcium + Vitamin D only
	public function getMedicineTransactionsForTheDayAsteriskUnified() 
	{	
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.transaction_id, t2.transaction_date, t2.fee, t2.fee_quantity');
		$this->db->from('item as t1');
		$this->db->join('transaction as t2', 't1.item_id = t2.item_id', 'LEFT');
		$this->db->distinct('t1.item_name');

//		$this->db->where('t1.item_id', $itemId);		
		//edited by Mike, 20200607
		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
		//$this->db->where('t2.transaction_date', "06/06/2020");		
	
		$this->db->like('t2.notes', "PAID");
		$this->db->like('t1.item_name', "*");
	
		//edited by Mike, 20200507
		//$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');
		$this->db->order_by('t1.item_name`', 'ASC'); //'DESC');//ASC');

		//added by Mike, 20200401
//		$this->db->limit(8);
		
		$query = $this->db->get('item');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		//added by Mike, 20200506
		$iCurrentItemId = -1;
		$iItemQuantity = 0;
		$dItemTotalFee = 0;
		
		//unify transactions whose item_id are equal
		//edited by Mike, 20200723
		//note: this is due to the following removed function is not available in PHP 5.3
		//$outputArray = [];
		$outputArray = array();
		
		$currentValue = "";
		
		if ($rowArray!=False) { //if value exists in array
			foreach ($rowArray as $value) {
			
//				echo "iCurrentItemId: ".$iCurrentItemId." : ".$value['item_name']." : ".$value['fee_quantity']."<br/>";
//				echo "iCurrentItemId: ".$iCurrentItemId."<br/>";

				if (($iCurrentItemId!=-1) && ($iCurrentItemId!=$value['item_id'])) {					
//					echo "push<br/>";

					array_push($outputArray, $currentValue);
					
					$iItemQuantity = 0;
					$dItemTotalFee = 0;
					
					$iCurrentItemId=$value['item_id'];
				}

				//quantity
				if ($value['fee_quantity']==0) {
					$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
				}
				else {
					$iQuantity =  $value['fee_quantity'];
				}

				$iItemQuantity = $iItemQuantity + $iQuantity;
				
				//total
				$dItemTotalFee = $dItemTotalFee + $value['fee'];

//				echo "iItemQuantity: " .$iItemQuantity."; ";
				
				$value['fee_quantity'] = $iItemQuantity;
				$value['fee'] = $dItemTotalFee;				

				$iCurrentItemId=$value['item_id'];
				$currentValue = $value;
		
//				echo "value: ".$value['item_id']."<br/>";
			}

			array_push($outputArray, $currentValue);
		}
		
		//edited by Mike, 20200507
//		return $rowArray;
		return $outputArray;
	}	

	//added by Mike, 20200502
	public function getMedicineExpiredPrev() 
	{	
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t1.item_name');
		//TO-DO: -update: this
		$this->db->group_by('t2.expiration_date');

		$this->db->where('t1.item_name!=', "NONE");
		
		//added by Mike, 20200901
		//TO-DO: -update: system to not use "UPDATED" keyword
		$this->db->not_like('t1.item_name', "*");

		//added by Mike, 20200901
		$this->db->where('t2.expiration_date!=', "NONE");

		$this->db->where('t1.item_type_id', 1); //1 = Medicine
		
//		$this->db->where('t2.quantity_in_stock', 0); //1 = Medicine

		//added by Mike, 20200502
		//items that are expired only
		$this->db->where('t2.quantity_in_stock!=', 0); //1 = Medicine

		//edited by Mike, 20200901
		//$this->db->where('t2.expiration_date<=', date("Y-m-d")); //1 = Medicine
		$this->db->where('t2.expiration_date<=', date("Y-m-d", strtotime(date("Y-m-d")."+2 Months")));
		//1 = Medicine

/*
		$this->db->and_where('t1.item_type_id', 1); //1 = Medicine

		getItemAvailableQuantityInStock($itemTypeId, $itemId);
*/
//		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
//		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	//added by Mike, 20200901
	public function getMedicineExpired() 
	{	
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t2.inventory_id');
		

		$this->db->where('t1.item_name!=', "NONE");
		
		//added by Mike, 20200901
		//TO-DO: -update: system to not use "UPDATED" keyword
		$this->db->not_like('t1.item_name', "*");

		//added by Mike, 20200901
		$this->db->where('t2.expiration_date!=', "NONE");
		
		//added by Mike, 20200521
		$this->db->where('t1.item_id!=', 0); //0 = NONE

		$this->db->where('t1.item_type_id', 1); //1 = Medicine

//		$this->db->like('t1.item_name', $param['nameParam']);
				
		//items that are expired only
		$this->db->where('t2.quantity_in_stock!=', 0); //1 = Medicine

		$this->db->where('t2.expiration_date<=', date("Y-m-d", strtotime(date("Y-m-d")."+2 Months")));
		//1 = Medicine
		
		//added by Mike, 20200607
		$this->db->order_by('t1.item_name', 'ASC');
		$this->db->order_by('t2.inventory_id', 'ASC'); //we do this for cases with equal expiration dates
		
		$this->db->order_by('t2.expiration_date', 'ASC');//ASC');
		
		$query = $this->db->get('item');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	//added by Mike, 20200427
	public function getMedicineOutOfStock() 
	{	
		$this->db->select('t1.item_name, t1.item_price, t1.item_id, t2.quantity_in_stock, t2.expiration_date');

		$this->db->from('item as t1');
		$this->db->join('inventory as t2', 't1.item_id = t2.item_id', 'LEFT');

		$this->db->group_by('t1.item_name');

		//TO-DO: -update: this
		$this->db->group_by('t2.expiration_date');

		$this->db->where('t1.item_name!=', "NONE");

		$this->db->where('t1.item_type_id', 1); //1 = Medicine
		
//		$this->db->where('t2.quantity_in_stock', 0); //1 = Medicine

/*
		//added by Mike, 20200502
		//items that are expired only
		$this->db->where('t2.quantity_in_stock!=', 0); //1 = Medicine
		$this->db->where('t2.expiration_date<=', date("Y-m-d")); //1 = Medicine
*/

/*
		$this->db->and_where('t1.item_type_id', 1); //1 = Medicine

		getItemAvailableQuantityInStock($itemTypeId, $itemId);
*/
//		$this->db->like('t1.item_name', $param['nameParam']);
//		$this->db->order_by('t2.expiration_date', 'DESC');//ASC');
//		$this->db->limit(8);//1);
		
		$query = $this->db->get('item');

//		$row = $query->row();		
		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}
		
		return $rowArray;
	}	

	//added by Mike, 20200501; edited by Mike, 20200503
	public function getSoldNonMedicine($param) 
	{	
		$this->db->select('t1.transaction_id, t1.transaction_date, t1.fee, t1.fee_quantity, t1.notes, t1.x_ray_fee, t1.lab_fee, t1.med_fee, t1.pas_fee, t1.transaction_type_name, t1.treatment_type_name, t2.item_id, t2.item_name, t2.item_price'); //, t4.receipt_number'); //, t2.treatment_diagnosis');

		$this->db->from('transaction as t1');
		$this->db->join('item as t2', 't1.item_id = t2.item_id', 'LEFT');

		//Reference: https://stackoverflow.com/questions/34917060/getting-the-recent-row-by-join-group-by;
		//last accessed: 20200422
		//answer by: Disha V. on 20160121
		//edited by: Community on 20170523

		$this->db->where('t2.item_name!=', "NONE");
		$this->db->where('t2.item_type_id', 2); //2 = Non-medicine; 1 = Medicine

		$this->db->distinct('t2.item_name');

		$this->db->like('t1.notes', "PAID");
		$this->db->where('t1.notes!=', "UNPAID"); //added by Mike, 20200501


		$this->db->group_by('t1.transaction_id');

		//edited by Mike, 20200502
//		$this->db->like('t2.transaction_date',date("m")-1); //edited by Mike, 20200501
		//note: parameter is the month in numbers, e.g. 04 for April
		$this->db->like('t1.transaction_date',$param."/"); //edited by Mike, 20200502
//		$this->db->like('t2.transaction_date',"04/"); //edited by Mike, 20200502

		$this->db->order_by('t1.transaction_date', 'ASC');
		
		$query = $this->db->get('transaction');

		$rowArray = $query->result_array();
		
		if ($rowArray == null) {			
			return False; //edited by Mike, 20190722
		}

		return $rowArray;		
	}	

	//added by Mike, 20200502
	public function getPriceNonMedicine() 
	{	
		//TO-DO: -update: this
		$this->db->select('item_name, item_price'); 
		$this->db->where('item_name!=', "NONE");
		$this->db->where('item_type_id', 2); //2 = Non-medicine; 1 = Medicine


//		$this->db->distinct('t1.item_name');

//		$this->db->where('t1.item_type_id', $itemTypeId);

//		$this->db->where('t2.transaction_date', date("m/d/Y"));//ASC');		
/*
		$this->db->like('t2.notes', "PAID");
		$this->db->where('t2.notes!=', "UNPAID"); //added by Mike, 20200501
*/
		//edited by Mike, 20200401
//		$this->db->order_by('t2.added_datetime_stamp`', 'ASC'); //'DESC');//ASC');


//		$this->db->group_by('t2.transaction_id');

		//edited by Mike, 20200502
//		$this->db->like('t2.transaction_date',date("m")-1); //edited by Mike, 20200501
		//note: parameter is the month in numbers, e.g. 04 for April
/*
		$this->db->like('t2.transaction_date',$param."/"); //edited by Mike, 20200502
*/
//		$this->db->like('t2.transaction_date',"04/"); //edited by Mike, 20200502

		//edited by Mike, 20200426
//		$this->db->order_by('t4.receipt_number', 'ASC');//ASC');

/*		$this->db->order_by('t2.transaction_date', 'ASC');
*/

		$this->db->order_by('item_name', 'ASC');
		
		$query = $this->db->get('item');

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
	
	//added by Mike, 20201201
	//note: use with $iQuantity = $iQuantity - $value['item_total_sold'];
	//where $iQuantity = item total in stock
	public function getTotalQuantitySoldPerItem() {		

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
			$itemId=$itemId+1;
			
			//added by Mike, 20201215
			//TO-DO: -add: auto-insert in computer database
		}		
		//------------------------------------
	}
}
?>