<?php 
class Report_Model extends CI_Model
{
	public function insertReport($param)
	{			
		date_default_timezone_set('Asia/Hong_Kong');
		$addedDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');

		//TO-DO: -update: member identification and report type id		
		$data = array(
					'member_id' => 1,//$memberId,
					'report_type_id' => 1,//$param['reportTypeIdParam'],
					'report_item_id' => $param['reportItemId'],
					'report_answer' => $param['reportAnswerParam'],
					'added_datetime_stamp' => $addedDateTimeStamp
				);
		
		$this->db->insert('report', $data);
		
		return $this->db->insert_id();		
	}	
}
?>