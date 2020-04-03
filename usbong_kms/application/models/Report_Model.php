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

	//added by Mike, 20200322
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