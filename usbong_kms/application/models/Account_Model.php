<?php 
class Account_Model extends CI_Model
{
	public function autoRegisterAccount($param)
	{		
		date_default_timezone_set('Asia/Hong_Kong');
		$loggedInDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');				
				
		//TO-DO: -update: member type		
		//TO-DO: -update: default password

		//added by Mike, 20190720		
		$row = $this->doesMemberAccountExistViaPatientName($param);

		if ($row !== null) {
			return $row->member_id;
		}
		else {					
			//added by Mike, 20190720
			$memberNameArray = explode(',', $param['memberNameParam']);
			$lastName = trim($memberNameArray[0]);
			$firstName = trim($memberNameArray[1]);
			
			$data = array(
						'member_last_name' => $lastName,
						'member_first_name' => $firstName,
						'member_type' => 2,
						'member_password' => password_hash($param['memberNameParam'], PASSWORD_DEFAULT),
						'last_logged_in_datetime_stamp' => $loggedInDateTimeStamp								
					);
			
			$this->db->insert('member', $data);
	/*		
			$data = array(
					'customer_first_name' => $param['memberNameParam'],
					'customer_last_name' => $param['lastNameParam'],
					'customer_email_address' => $param['emailAddressParam'],
					'customer_password' => password_hash($param['passwordParam'], PASSWORD_DEFAULT),
					'last_logged_in_datetime_stamp' => $loggedInDateTimeStamp								
			);
					
			$this->db->insert('customer', $data);
	*/		
			return $this->db->insert_id();
		}
	}
	
	//added by Mike, 20190720
	public function doesMemberAccountExistViaPatientName($param) 
	{
		$memberNameArray = explode(',', $param['memberNameParam']);
		$lastName = trim($memberNameArray[0]);
		$firstName = trim($memberNameArray[1]);
		
		$this->db->select('member_id');
		$this->db->where('member_last_name', $lastName);
		$this->db->where('member_first_name', $firstName);
		$query = $this->db->get('member');
		$row = $query->row();
		return $row;
	}
}
?>