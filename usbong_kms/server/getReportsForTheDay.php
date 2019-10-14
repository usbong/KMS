<?php
/*
  Copyright 2019 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20191014
  @date updated: 20191014

  Given:
  1) Existing reports for the day in the database (DB)

  Output:
  1) Automatically connect to the DB and get the reports for the day from the DB
  --> Afterwards, automatically send them to the requesting computer client as text adhering to the JSON format.
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

	//automatically get the reports for the day from the database (DB)
//	if ($result = $mysqli->query("SELECT * FROM `payslip` WHERE CAST(`added_datetime_stamp` AS DATE) = CAST('2019-08-12' AS DATE)"))
	if ($result = $mysqli->query("SELECT `report`.*, `member`.member_last_name, `member`.member_first_name, `report_type`.report_type_name FROM `report`, `member`, `report_type` WHERE CAST(`added_datetime_stamp` AS DATE) = CAST(NOW() AS DATE) and `report`.member_id = `member`.member_id and `report`.report_type_id = `report_type`.report_type_id"))
	{
		//if there are reports
		if ($result->num_rows > 0)
		{
			$responses = array();
		
			while ($row = $result->fetch_object())
			{
				$jsonResponse = array(
						"report_id" => $row->report_id,
						"report_type_id" => $row->report_type_id,
						"report_item_id" => $row->report_item_id,
						"member_id" => $row->member_id,
						"report_answer" => $row->report_answer,
						"added_datetime_stamp" => $row->added_datetime_stamp,
						"member_last_name" => $row->member_last_name,
						"member_first_name" => $row->member_first_name,
						"report_type_name " => $row->report_type_name
				);
				$responses[] = $jsonResponse;
				
			}
			echo json_encode($responses);
		}
		//if there are no reports in the database, display an alert message
		else
		{
			$dateToday = (new DateTime())->format('Y-m-d');

			echo "No reports in the database for today, ".$dateToday."!";
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