<?php
/*
  Copyright 2019~2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20190805
  @date updated: 20200513

  Given:
  1) List with the details of the queue for the day at the Marikina Orthopedic Specialty Clinic (MOSC) Headquarters

  Output:
  1) Automatically connect to the database (DB) and store the queue in the DB  
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

//	echo "report_filename: " .$data["report_filename"];
//	echo "report_type_id: " .$data["report_type_id"];
//	$data["report_item_id"] = 1;
//	$data["member_id"] = 3;

//	$data["report_filename"] = "hello";
//	$data["report_type_id"] = 2;
		
	if ($result = $mysqli->query("INSERT INTO `report` (`report_type_id`, `report_filename`, `report_description`) VALUES ('".$data["report_type_id"]."', '".$data["report_filename"]."', '".json_encode($data)."');"))
	{		
		$reportId = $mysqli->insert_id;

		echo "reportId: " .$reportId;

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