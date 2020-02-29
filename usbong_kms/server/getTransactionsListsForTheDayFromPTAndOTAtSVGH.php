<?php
/*
  Copyright 2019~2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20190813
  @date updated: 20200229

  Given:
  1) Existing reports with the transactions for the day in the database (DB)

  Output:
  1) Automatically connect to the DB and get the reports with the newest transactions for the day from the DB
  --> Afterwards, automatically send them to the requesting computer client as text adhering to the JSON format
*/
	// connect to the database
	include('usbong-kms-connect.php');

	$mysqli->set_charset("utf8");
/*			
    if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
            printf("Current character set: %s\n", $mysqli->character_set_name());
    }
*/	
	date_default_timezone_set('Asia/Hong_Kong');

	//automatically get the reports with the newest transactions for the day from the database (DB)
//	if ($result = $mysqli->query("SELECT * FROM `payslip` WHERE CAST(`added_datetime_stamp` AS DATE) = CAST('2019-08-12' AS DATE)"))
/*
	if ($result = $mysqli->query("SELECT * FROM `payslip` WHERE CAST(`added_datetime_stamp` AS DATE) = CAST(NOW() AS DATE)"))
*/		
/*
	if ($result = $mysqli->query("SELECT * FROM `report` WHERE CAST(`added_datetime_stamp` AS DATE) = CAST(NOW() AS DATE)"))
*/		
//	if ($result = $mysqli->query("SELECT * FROM `report` ORDER BY `added_datetime_stamp` DESC LIMIT 1"))
	if ($resultNewestDateTimeStamp = $mysqli->query("SELECT `added_datetime_stamp` FROM `report` ORDER BY `added_datetime_stamp` DESC LIMIT 1"))
	{
		
		//if there are reports
		if ($resultNewestDateTimeStamp->num_rows > 0)
		{	
			$sResultNewestAddedDateTimeStamp = $resultNewestDateTimeStamp->fetch_object()->added_datetime_stamp;

			if ($result = $mysqli->query("SELECT * FROM `report` WHERE `added_datetime_stamp` ='".$sResultNewestAddedDateTimeStamp."'")) {

				$responses = array();
			
				while ($row = $result->fetch_object())
				{
					$jsonResponse = array(
							"report_id" => $row->report_id,
							"report_type_id" => $row->report_type_id,
							"report_description" => $row->report_description,
							"added_datetime_stamp" => $row->added_datetime_stamp
					);
					$responses[] = $jsonResponse;
					
				}
				echo json_encode($responses);
			}
		}
		//if there are no reports in the database, display an alert message
		else
		{
//				$dateToday = (new DateTime())->format('Y-m-d');

			echo "No Reports in the database!";
		}				
	}
	//show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}
		
	//close database connection
	$mysqli->close();
?>