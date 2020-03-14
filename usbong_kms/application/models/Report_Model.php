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

}
?>
