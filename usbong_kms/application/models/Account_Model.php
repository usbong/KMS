<?php 
class Account_Model extends CI_Model
{
	public function autoRegisterAccount($param)
	{		
		date_default_timezone_set('Asia/Hong_Kong');
		$loggedInDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');				
				
		//TO-DO: -update: patient name to properly be inserted in the last name and first name columns of the member table
		//TO-DO: -update: member type		
		//TO-DO: -update: default password
		$data = array(
					'member_first_name' => $param['memberNameParam'],
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
?>