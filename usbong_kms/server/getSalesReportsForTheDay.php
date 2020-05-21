<?php
/*
  Copyright 2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20200521
  @date updated: 20200521

  Input:
  1) Sales reports for the day in the database (DB)

  Output:
  1) Automatically connect to the DB and get the sales reports for the day from the DB
  --> Afterwards, write the reports as .txt text in the computer server's set location
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


	//added by Mike, 20200521
	//TO-DO: -add: non-medicine
	//TO-DO: -add: medicine asterisk, i.e. Glucosamine Sulphate and Calcium with Vitamin D
	if ($selectedMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID'"))
	{
		if ($selectedMedicineResultArray->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedMedicineResultArray as $value) {
				if (strpos($value['item_name'], "*") === false) {
					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount
			);
			$responses[] = $jsonResponse;
			
			$outputReportMedicine = json_encode($responses);
							
			echo $outputReportMedicine;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			$sDateToday = date("Y-m-d");

			//update the file location accordingly
			$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicine".$sDateToday.".txt";

			file_put_contents($file, $outputReportMedicine, LOCK_EX);				
		}

	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																
	
		
	//close database connection
	$mysqli->close();
?>