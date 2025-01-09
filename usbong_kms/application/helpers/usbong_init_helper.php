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

$ipAddress = $_SERVER['REMOTE_ADDR'];

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