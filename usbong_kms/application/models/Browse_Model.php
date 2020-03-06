<?php 
class Browse_Model extends CI_Model
{
	public function getNamesListViaName($param) 
	{		
//		echo "reportTypeNameParam: ".$param['reportTypeNameParam'];
	
		$this->db->select('report_description');
//		$this->db->where('report_description', $param['name']);
		$query = $this->db->get('report');
		$row = $query->row();
		
		if ($row == null) {			
			return False; //edited by Mike, 20190722
		}
		
		//$reportTypeId = $row->report_type_id;
		//return $row;
		return $row->report_description;
	}	
}
?>
