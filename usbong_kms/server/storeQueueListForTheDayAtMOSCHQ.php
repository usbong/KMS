<?php
/*
  Copyright 2019~2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20190805
  @date updated: 20200518

  Given:
  1) List with the details of the queue for the day at the Marikina Orthopedic Specialty Clinic (MOSC) Headquarters

  Output:
  1) Automatically connect to the database (DB) and store the patient names that do not yet exist in the DB  
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
		
	if ($result = $mysqli->query("INSERT INTO `report` (`report_type_id`, `report_filename`, `report_description`) VALUES ('".$data["report_type_id"]."', '".$data["report_filename"]."', '".json_encode($data)."');"))
	{		
		$reportId = $mysqli->insert_id;

		//update the file location accordingly
		$sDateToday = date("Y-m-d");

		$file = "D:\Usbong\MOSC\Forms\Information Desk\output\informationDesk\libreOfficeOutput" . "\Patients".$sDateToday.".csv";

        file_put_contents($file, $data["report_description"], LOCK_EX);

		$patientsQueueListArray = [];
		
		//delete the ending \n
		$sReportDescription = substr($data["report_description"],0,-1);	

		//auto-identify max column count
		$sCellValueArray = explode(",", $sReportDescription); //explode("\t", $fileContents);
		$iCountColumn = 0;
		$iMaxCountColumn = 0;
		
		foreach ($sCellValueArray as $sCellValue) {		
			if (strpos($sCellValue,"\n")!==false) {
				$iMaxCountColumn = $iCountColumn + 1;
				break;
			}
			else {
				$iCountColumn = $iCountColumn + 1;
			}
		}
			
		$bHasFinishedTableHeaderRow = false;
		$iCountColumn = 0;
		
		$sReportDescription = str_replace("\n", ",", $sReportDescription);
		
		//CSV = comma separated values
		$inputCSVReportArray = str_getcsv($sReportDescription, ",");
		
		foreach ($inputCSVReportArray as $value) {
			if (($value!="") && (!is_numeric($value)) && ($value!="DATE") && ($value!="COUNT")) {
				array_push($patientsQueueListArray,$value);
			}
		}

		$patientsQueueListTotalCount = count($patientsQueueListArray);

		for ($i=0; $i<$patientsQueueListTotalCount; $i++) {
				$patientName = $patientsQueueListArray[$i];

				$patientId = null;
				
				//verify if patient name already exists
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