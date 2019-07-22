<?php 
class Report_Model extends CI_Model
{
	public function insertReport($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

		//added by Mike, 20190722
		$row = $this->doesReportTypeExistViaReportTypeName($param);
		
		if ($row == null) {			
			return null;
		}
		
		$reportTypeId = $row->report_type_id;

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
	
	//added by Mike, 20190720
	public function doesReportTypeExistViaReportTypeName($param) 
	{		
		$this->db->select('report_type_id');
		$this->db->where('report_type_name', $param['reportTypeNameParam']);
		$query = $this->db->get('report_type');
		$row = $query->row();
		return $row;
	}
}
?>