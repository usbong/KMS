<?php
/*
  Copyright 2019~2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20190805
  @date updated: 20200317

  Given:
  1) Patient name

  Output:
  1) Automatically connect to the database (DB) and query if patient name exists in the DB  
  --> The computer servers sends as output to the Web Browser the patient ID, i.e. identification
  
  Note
  1) Sample Web Browser Address to use this command:
  --> http://localhost/usbong_kms/server/selectPatientIdentificationViaPatientNameFromDB.php
*/
	// connect to the database
	include('usbong-kms-connect.php');

	$mysqli->set_charset("utf8");
			
    if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
            printf("Current character set: %s\n", $mysqli->character_set_name());
    }


/*	$iTotal = $data["iTotal"];
*/
/*			
	for ($i=0; $i<$iTotal; $i++) {
		$patientName = $data["i".$i]["1"];
*/
		$patientName = "Manual, Miguel"; //sample patient name
		
		$patientId = null;

		//verify if patient name already exists
		if ($selectedResult = $mysqli->query("SELECT `patient_id` FROM `patient` WHERE `patient_name` = '".$patientName."';"))	{

			if ($selectedResult->num_rows > 0) {
				$row = mysqli_fetch_array($selectedResult);
				$patientId = $row["patient_id"];
				
				echo "patientId: ".$patientId;
			}
		}
		// show an error if there is an issue with the database query
		else
		{
			echo "Error: " . $mysqli->error;
		}

		if (!isset($patientId)) {
			echo "<br/><br/>Patient name does not exist in database storage.";
		}
/*		
	}				
*/	
	// close database connection
	$mysqli->close();
?>