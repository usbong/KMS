<?php
/*
  Copyright 2019~2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20190805
  @date updated: 20200322

  Given:
  1) List with the details of the transactions for the day at the Marikina Orthopedic Specialty Clinic (MOSC) Headquarters

  Output:
  1) Automatically connect to the database (DB) and store the transactions in the DB  
//  2) Automatically request the Computer Server to download the stored data from the DB and store as .txt files in the correct location
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
	
/*
	if ($result = $mysqli->query("INSERT INTO `report` (`report_description`) VALUES ('usbong');"))
*/
/*  //use this if location is SVGH
	if ($result = $mysqli->query("INSERT INTO `report` (`report_type_id`, `report_filename`, `report_description`, `member_id`, `report_item_id`) VALUES ('".$data["report_type_id"]."', '".$data["report_filename"]."', '".json_encode($data)."', '3', '10');"))		
	{
*/		
	if ($result = $mysqli->query("INSERT INTO `report` (`report_type_id`, `report_filename`, `report_description`) VALUES ('".$data["report_type_id"]."', '".$data["report_filename"]."', '".json_encode($data)."');"))
	{
		
		$reportId = $mysqli->insert_id;
		
		//TO-DO: -update: this to include further action by Computer Server after receiving and storing data into the database
/*		
			private static final int INPUT_PATIENT_NAME_COLUMN_MOSC_HQ = 2; //column C
			private static final int INPUT_FEE_COLUMN_MOSC_HQ = 3; //column D	

			//these are for transactions we classify as for Syson, Pedro
			private static final int INPUT_X_RAY_COLUMN_MOSC_HQ_PEDRO = 3; //column E, Syson, Pedro

			//these are for the rest of the medical doctors
			private static final int INPUT_NOTES_COLUMN_MOSC_HQ = 6; //column G	
			private static final int INPUT_X_RAY_COLUMN_MOSC_HQ = 7; //column H
*/		

//			echo $reportDescription;
			$iTotal = $data["iTotal"];
			
			for ($i=0; $i<$iTotal; $i++) {
				$patientName = $data["i".$i]["2"];

				$patientId = null;

				//TO-DO: -verify if patient name already exists
				if ($selectedResult = $mysqli->query("SELECT `patient_id` FROM `patient` WHERE `patient_name` = '".$patientName."';"))	{
//					$patientId = $selectedResult;

					if ($selectedResult->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
						$row = mysqli_fetch_array($selectedResult);
						$patientId = $row["patient_id"];
					}
				}
				// show an error if there is an issue with the database query
				else
				{
					echo "Error: " . $mysqli->error;
				}

				if (!isset($patientId)) {
					if ($insertedResult = $mysqli->query("INSERT INTO `patient` (`patient_name`) VALUES ('".$patientName."');"))	{						
						$patientId = $mysqli->insert_id;
					}
					else
					{
						echo "Error: " . $mysqli->error;
					}
				}

				$reportFilenameArray = explode("\\",$data["report_filename"]);				
				$medicalDoctorName = str_replace(".txt", "", $reportFilenameArray[array_key_last($reportFilenameArray)]);

				//verify if medical doctor name already exists
				if ($selectedResult = $mysqli->query("SELECT `medical_doctor_id` FROM `medical_doctor` WHERE `medical_doctor_name` = '".$medicalDoctorName."';"))	{
//					$patientId = $selectedResult;

					if ($selectedResult->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
						$row = mysqli_fetch_array($selectedResult);
						$medicalDoctorId = $row["medical_doctor_id"];
					}
				}
				// show an error if there is an issue with the database query
				else
				{
					echo "Error: " . $mysqli->error;
				}

				if (!isset($medicalDoctorId)) {
					if ($insertedResult = $mysqli->query("INSERT INTO `medical_doctor` (`medical_doctor_name`) VALUES ('".$medicalDoctorName."');"))	{						
						$medicalDoctorId = $mysqli->insert_id;
					}
					else
					{
						echo "Error: " . $mysqli->error;
					}
				}
				
/*
				if ($insertedResult = $mysqli->query("INSERT INTO `patient` (`patient_name`) VALUES ('".$patientName."');"))	{
					
					$patientId = $mysqli->insert_id;
*/	
					//TO-DO: -update: this to use the correct transaction_type_id
					//TO-DO: -update: this to use the correct fee column index for in-pt					
/*
					if ($transactionInsertedResult = $mysqli->query("INSERT INTO `transaction` (`patient_id`, `transaction_date`, `fee`, `transaction_type_name`, `treatment_type_name`, `treatment_diagnosis`) VALUES ('".$patientId."', '".$data["i".$i]["0"]."', '".$data["i".$i]["17"]."', '".$data["i".$i]["transactionType"]."', '".$data["i".$i]["treatmentType"]."', '".$data["i".$i]["treatmentDiagnosis"]."');"))	
*/						
/*
					if ($transactionInsertedResult = $mysqli->query("INSERT INTO `transaction` (`patient_id`, `transaction_date`, `fee`, `transaction_type_name`) VALUES ('".$patientId."', '".$data["i".$i]["0"]."', '".$data["i".$i]["3"]."', '".$data["i".$i]["transactionType"]."');"))	
*/						
/*
					if ($transactionInsertedResult = $mysqli->query("INSERT INTO `transaction` (`patient_id`, `transaction_date`, `fee`, `transaction_type_name`, `medical_doctor_id`, `report_id`) VALUES ('".$patientId."', '".$data["i".$i]["0"]."', '".$data["i".$i]["3"]."', '".$data["i".$i]["transactionType"]."', '".$medicalDoctorId."', '".$reportId."');"))	
*/
					if ($transactionInsertedResult = $mysqli->query("INSERT INTO `transaction` (`patient_id`, `transaction_date`, `fee`, `transaction_type_name`, `medical_doctor_id`, `report_id`) VALUES ('".$patientId."', '".$data["i".$i]["0"]."', '".$data["i".$i]["3"]."', '".$data["i".$i]["transactionType"]."', '".$medicalDoctorId."', '".$reportId."');"))	
				
					{
					}
					// show an error if there is an issue with the database query
					else
					{
							echo "Error: " . $mysqli->error;
					}																
			}				

		//Example: download from the database the uploaded data and store as .txt files in the correct location
		//added by Mike, 20190902; edited by Mike, 20200227
		//update the file locations, e.g. batch file, accordingly		
		//computer server
/*
		exec('C:\Windows\System32\cmd.exe /C START C:\Usbong\unit\"add-on software"\generatePTAndOTReportForTheDay_Download.bat');				
*/				
	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}
		
	// close database connection
	$mysqli->close();
?>