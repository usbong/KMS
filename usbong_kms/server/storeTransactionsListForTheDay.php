<?php
/*
  Copyright 2019 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20190805
  @date updated: 20190811

  Given:
  1) List with the details of the transactions for the day

  Output:
  1) Automatically connect to the database (DB) and store the transactions in the DB  
*/
	// connect to the database
	include('usbong-kms-connect.php');

	$mysqli->set_charset("utf8");
			
    if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
            printf("Current character set: %s\n", $mysqli->character_set_name());
    }

	$data = json_decode(file_get_contents('php://input'), true);
//	print_r($data);
//	echo "hello".$data["myKey"];
	
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_description`) VALUES ('usbong');"))
	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_description`) VALUES ('".$data["myKey"]."');"))
	{
	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}
		
	// close database connection
	$mysqli->close();
?>