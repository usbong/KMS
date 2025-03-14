<!--
  Copyright 2020~2025 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20250109
  @date updated: 20250109
  @website address: http://www.usbong.ph
-->

<?php
	// connect to the database
	//include('usbong-kms-connect.php');
	
	include __DIR__ . '/../../server/usbong-kms-connect.php';
	$mysqli->set_charset("utf8");	
	date_default_timezone_set('Asia/Hong_Kong');
	
//OK
//echo "HALLO";


//edited by Mike, 20250314
$ipAddress = $_SERVER['REMOTE_ADDR'];

//TODO: -reverify: this
//------------------------------
if (isset($_SESSION["client_ip_address"]) && (isset($_SESSION["client_machine_address"]))) {

	//$ipAddress = $_SERVER['REMOTE_ADDR'];
	$machineAddress = "";

	if (strpos($ipAddress, "::")!==false) {
		$ipAddress = "SERVER ADDRESS";
		
		$machineAddress = "SERVER MACHINE ADDRESS";

		//echo "<font color='#FF0000'><b>Please set as default in the Computer Server Browser,<br/>the Computer Server Internet Protocol (IP) Address<br/>that is not \"localhost\".<br/><br/></b></font>";
	}

	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { //Windows machine
		$rawMachineAddressInput =  exec('getmac');
		$machineAddress = explode(" ", $rawMachineAddressInput)[0];
	}
	else {
		//TO-DO: -reverify: this set of instructions due receives server machine address, not client machine address
		//note: output is blank if Windows Machine
		//We use this set of instructions with Linux Machines
		//Reference: https://stackoverflow.com/questions/1420381/how-can-i-get-the-mac-and-the-ip-address-of-a-connected-client-in-php;
		//last accessed: 20200820
		//answer by: Paul Dixon, 20090914T0848
		#run the external command, break output into lines
		$arp=`arp -n $ipAddress`; //`arp -a $ipAddress`;
		$lines=explode("\n", $arp);

		#look for the output line describing our IP address
		foreach($lines as $line)
		{
		   $cols=preg_split('/\s+/', trim($line));
		   if ($cols[0]==$ipAddress)
		   {
			   $machineAddress=$cols[1];
		   }
		}
	}

	//CI not yet loaded
	//Undefined property: CI_Loader::$session
	//$this->session->set_userdata('client_ip_address', $ipAddress);
	//$this->session->set_userdata('client_machine_address', $machineAddress);
	
	$_SESSION["client_ip_address"] = $ipAddress;
	$_SESSION["client_machine_address"] = $machineAddress;
}
//------------------------------


/*
if ((strpos($ipAddress, "127.0.0.1")!==false) ||
	(strpos($ipAddress, "192.168.11.10")!==false) ||
	(strpos($ipAddress, "SERVER ADDRESS")!==false)
	) {

	echo "ACCESS PROHIBITED";
	
	//return;
	exit();
}
*/

$bIsAccessProhibited=true;

if ($allowedInboundIPResultArray = $mysqli->query("select security_inbound from security")) {

	if ($allowedInboundIPResultArray->num_rows > 0) {
	
		//shall check each row
		foreach ($allowedInboundIPResultArray as $value) {
			if (strpos($ipAddress, $value['security_inbound'])!==false) {
				//OK
				$bIsAccessProhibited=false;
				break;
			}
		}
	}
	
	//echo ">>>>>>>>>".$bIsAccessProhibited."<br/><br/>";

	if ($bIsAccessProhibited) { //false is empty
		
		//for debug only
		//echo $ipAddress." ";
		
		echo "ACCESS PROHIBITED";
		
		//return;
		exit();
	}
}
?>