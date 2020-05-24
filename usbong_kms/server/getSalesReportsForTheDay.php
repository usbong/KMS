<?php
/*
  Copyright 2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20200521
  @date updated: 20200524

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

	//added by Mike, 20200524
	$fileBasePath = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\";

	//added by Mike, 20200521
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
			//edited by Mike, 20200524
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicine".$sDateToday.".txt";
			$file = $fileBasePath."medicine".$sDateToday.".txt";
			
			file_put_contents($file, $outputReportMedicine, LOCK_EX);				
		}
		else {
			echo "There are no Medicine item transactions for the day.";
		}
	}

	//added by Mike, 20200522
	echo "<br/><br/>";

	//added by Mike, 20200522
	$responses = [];
	
	//medicine asterisk, i.e. Glucosamine Sulphate and Calcium with Vitamin D
	if ($selectedMedicineAsteriskResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID'"))
	{
		if ($selectedMedicineAsteriskResultArray->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedMedicineAsteriskResultArray as $value) {
				if (strpos($value['item_name'], "*") === false) {
				}
				else {
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
			
			$outputReportMedicineAsterisk = json_encode($responses);
							
			echo $outputReportMedicineAsterisk;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicineAsterisk".$sDateToday.".txt";
			$file = $fileBasePath."medicineAsterisk".$sDateToday.".txt";

			file_put_contents($file, $outputReportMedicineAsterisk, LOCK_EX);				
		}
		else {
			echo "There are no Medicine item (Asterisk), i.e. Glucosamine Sulphate and Calcium with Vitamin D,  transactions for the day.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																
	
	
	//added by Mike, 20200522
	echo "<br/><br/>";

	//added by Mike, 20200522
	$responses = [];
	
	//non-medicine
	if ($selectedNonMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID'"))
	{
		if ($selectedNonMedicineResultArray->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedNonMedicineResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
//				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount
			);
			$responses[] = $jsonResponse;
			
			$outputReportNonMedicine = json_encode($responses);
							
			echo $outputReportNonMedicine;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//note: \\nonMedicine due to \n is new line
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\nonMedicine".$sDateToday.".txt";
			$file = $fileBasePath."nonMedicine".$sDateToday.".txt";

			file_put_contents($file, $outputReportNonMedicine, LOCK_EX);				
		}
		else {
			echo "There are no Non-medicine item transactions for the day.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																
	
	//added by Mike, 20200523
	echo "<br/><br/>";

	//added by Mike, 20200523
	$responses = [];
	
	//x-ray
	if ($selectedXRayResultArray = $mysqli->query("select x_ray_fee from transaction where transaction_date='".date('m/d/Y')."' and x_ray_fee!='0'"))
	{
		if ($selectedXRayResultArray->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedXRayResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				if ($value['x_ray_fee'] !== "0.00") {
					$iFeeTotalCount = $iFeeTotalCount + $value['x_ray_fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];
				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount
			);
			$responses[] = $jsonResponse;
			
			$outputReportXRay = json_encode($responses);
							
			echo $outputReportXRay;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//note: \\nonMedicine due to \n is new line
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\xRay".$sDateToday.".txt";
			$file = $fileBasePath."xRay".$sDateToday.".txt";

			file_put_contents($file, $outputReportXRay, LOCK_EX);				
		}
		else {
			echo "There are no X-Ray item transactions for the day.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																


	//added by Mike, 20200523
	echo "<br/><br/>";

	//added by Mike, 20200523
	$responses = [];
	
	//lab
//	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".date('m/d/Y')."'"))
	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".date('m/d/Y')."' and lab_fee!='0'"))
	{
		if ($selectedLabResultArray->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedLabResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				if ($value['lab_fee'] !== "0.00") {
					$iFeeTotalCount = $iFeeTotalCount + $value['lab_fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];
				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount
			);
			$responses[] = $jsonResponse;
			
			$outputReportLab = json_encode($responses);
							
			echo $outputReportLab;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//note: \\nonMedicine due to \n is new line
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\lab".$sDateToday.".txt";
			$file = $fileBasePath."lab".$sDateToday.".txt";

			file_put_contents($file, $outputReportLab, LOCK_EX);				
		}
		else {
			echo "There are no Lab, i.e. Laboratory, item transactions for the day.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																


	//added by Mike, 20200524
	echo "<br/><br/>";

	//added by Mike, 20200524
	$responses = [];
	
	//medical doctor; SYSON, PEDRO
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id=1"))	
	{
		if ($selectedMedicalDoctorResultArray->num_rows > 0) {
//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedMedicalDoctorResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				if ($value['fee'] !== "0.00") {
					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];
				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount
			);
			$responses[] = $jsonResponse;
			
			$outputReportMedicalDoctor = json_encode($responses);
							
			echo $outputReportMedicalDoctor;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//note: \\nonMedicine due to \n is new line
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\xRay".$sDateToday.".txt";
			$file = $fileBasePath."SYSON,PEDRO".$sDateToday.".txt";

			file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				
		}
		else {
			echo "There are no SYSON, PEDRO transactions for the day.";
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