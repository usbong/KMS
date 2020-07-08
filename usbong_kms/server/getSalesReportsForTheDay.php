<?php
/*
  Copyright 2020 Usbong Social Systems, Inc.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  @author: Michael Syson
  @date created: 20200521
  @date updated: 20200708
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

	//added by Mike, 20200521; edited by Mike, 20200706
//	if ($selectedMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID'"))
	if ($selectedMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID' and t2.transaction_quantity='0'"))
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedMedicineResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedMedicineResultArray->num_rows == 1) {
				echo "Medicine transaction for the day.<br /><br />";
			}
			else {
				echo "Medicine transactions for the day.<br /><br />";
			}

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
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount //$iNetFeeTotalCount //added by Mike, 20200530					
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
	echo "<br/>";

	//added by Mike, 20200522
	$responses = [];
	
	//medicine asterisk, i.e. Glucosamine Sulphate and Calcium with Vitamin D
	//edited by Mike, 20200706
//	if ($selectedMedicineAsteriskResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID'"))
	if ($selectedMedicineAsteriskResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID' and t2.transaction_quantity='0'"))
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedMedicineAsteriskResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedMedicineResultArray->num_rows == 1) {
				echo "Medicine (Asterisk), i.e. Glucosamine Sulphate and Calcium with Vitamin D, transaction for the day.<br /><br />";
			}
			else {
				echo "Medicine (Asterisk), i.e. Glucosamine Sulphate and Calcium with Vitamin D, transactions for the day.<br /><br />";
			}

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
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount //$iNetFeeTotalCount //added by Mike, 20200530					
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
	echo "<br/>";

	//added by Mike, 20200522
	$responses = [];
	
	//non-medicine
	//edited by Mike, 20200706
//	if ($selectedNonMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID'"))
	//edited by Mike, 20200708
//if ($selectedNonMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID' and t2.transaction_quantity='0'"))
	if ($selectedNonMedicineResultArray = $mysqli->query("select t1.item_name, t2.transaction_id, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".date('m/d/Y')."' and t2.notes like 'PAID' and t2.transaction_quantity='0'"))
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedNonMedicineResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedNonMedicineResultArray->num_rows == 1) {
				echo "Non-medicine transaction for the day.<br /><br />";
			}
			else {
				echo "Non-medicine transactions for the day.<br /><br />";
			}


//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;

			foreach ($selectedNonMedicineResultArray as $value) {
				//added by Mike, 20200708
				//identify non-medicine item transaction if with VAT
				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."'"))
				{
					if ($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) {
						$iFeeTotalCount = $iFeeTotalCount + ($value['fee']/(1 + 0.12));
						$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
					}
					else {
						$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
						$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
					}
				}
				// show an error if there is an issue with the database query
				else
				{
						echo "Error: " . $mysqli->error;
				}																
				
/*
//				if (strpos($value['item_name'], "*") === false) {
					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
//				}					
*/
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount //$iNetFeeTotalCount //added by Mike, 20200530					
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
	echo "<br/>";

	//added by Mike, 20200523
	$responses = [];
	
	//x-ray
//	if ($selectedXRayResultArray = $mysqli->query("select x_ray_fee from transaction where transaction_date='".date('m/d/Y')."' and x_ray_fee!='0'"))
	//edited by Mike, 20200706
//	if ($selectedXRayResultArray = $mysqli->query("select x_ray_fee from transaction where transaction_date='".date('m/d/Y')."' and x_ray_fee!='0' and transaction_quantity='0'"))
	//NOTE: the "group by" command gets the earliest transaction entered, not the newest
	if ($selectedXRayResultArray = $mysqli->query("select x_ray_fee from transaction where transaction_date='".date('m/d/Y')."' and x_ray_fee!='0' and transaction_quantity='0' group by patient_id"))
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedXRayResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedXRayResultArray->num_rows == 1) {
				echo "X-Ray transaction for the day.<br /><br />";
			}
			else {
				echo "X-Ray transactions for the day.<br /><br />";
			}

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
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount //$iNetFeeTotalCount //added by Mike, 20200530					
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
	echo "<br/>";

	//added by Mike, 20200523
	$responses = [];
	
	//lab
//	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".date('m/d/Y')."'"))
	//edited by Mike, 20200706
//	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".date('m/d/Y')."' and lab_fee!='0' and transaction_quantity='0'"))
	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".date('m/d/Y')."' and lab_fee!='0' and transaction_quantity='0' group by patient_id"))
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedLabResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedLabResultArray->num_rows == 1) {
				echo "Laboratory transaction for the day.<br /><br />";
			}
			else {
				echo "Laboratory transactions for the day.<br /><br />";
			}

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
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount //$iNetFeeTotalCount //added by Mike, 20200530					
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
	echo "<br/>";

	//added by Mike, 20200524
	$responses = [];
	
	//medical doctor; SYSON, PEDRO
	//edited by Mike, 20200706
//	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id=1 and transaction_quantity='0'"))	
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id=1 and transaction_quantity='0' group by patient_id"))		
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedMedicalDoctorResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedMedicalDoctorResultArray->num_rows == 1) {
				echo "SYSON, PEDRO's transaction for the day.<br /><br />";
			}
			else {
				echo "SYSON, PEDRO's transactions for the day.<br /><br />";
			}

//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			$iNetFeeTotalCount = 0; //added by Mike, 20200530
			$iDexaQuantityTotalCount = 0; //added by Mike, 20200531
			$iPrivateQuantityTotalCount = 0; //added by Mike, 20200531
			$iNoChargeQuantityTotalCount = 0; //added by Mike, 20200531

			foreach ($selectedMedicalDoctorResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				if ($value['fee'] !== "0.00") {
					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];


					if (strpos($value['notes'],"NC")!==false) {
						$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
					}
					else if (strpos($value['notes'],"NO CHARGE")!==false) {
						$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
					}
				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount, //$iNetFeeTotalCount //added by Mike, 20200530; edited by Mike, 20200531

					//added by Mike, 20200531
					"iDexaQuantityTotalCount" => $iDexaQuantityTotalCount,
					"iPrivateQuantityTotalCount" => $iPrivateQuantityTotalCount,
					"iNoChargeQuantityTotalCount" => $iNoChargeQuantityTotalCount
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

	//added by Mike, 20200524
	echo "<br/>";

	//added by Mike, 20200524
	$responses = [];
	
	//medical doctor; SYSON, PETER
	//edited by Mike, 20200530
//	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id=2"))	
	//edited by Mike, 20200706
	//if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id=2 and transaction_quantity='0'"))	
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id=2 and transaction_quantity='0' group by patient_id"))	
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedMedicalDoctorResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedMedicalDoctorResultArray->num_rows == 1) {
				echo "SYSON, PETER's transaction for the day.<br /><br />";
			}
			else {
				echo "SYSON, PETER's transactions for the day.<br /><br />";
			}

//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			$iNetFeeTotalCount = 0; //added by Mike, 20200530
			$iDexaQuantityTotalCount = 0; //added by Mike, 20200531
			$iPrivateQuantityTotalCount = 0; //added by Mike, 20200531
			$iNoChargeQuantityTotalCount = 0; //added by Mike, 20200531

			foreach ($selectedMedicalDoctorResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				if ($value['fee'] !== "0.00") {
					//edited by Mike, 20200530

					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];

					if (strpos($value['notes'],"PRIVATE")!==false) {
						$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
						
						//added by Mike, 20200531
						$iPrivateQuantityTotalCount = $iPrivateQuantityTotalCount + 1;
						
						//TO-DO: -update: if +DEXA
					}
					else {
						if (strpos($value['notes'],"DEXA")!==false) {
							$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
							
							//added by Mike, 20200531
							$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
						}
						else if (strpos($value['notes'],"NC")!==false) {
							$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
						}
						else if (strpos($value['notes'],"NO CHARGE")!==false) {
							$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
						}
						else {
							$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee']*0.70;
						}
					}
				}					
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iNetFeeTotalCount,
					
					//added by Mike, 20200531
					"iDexaQuantityTotalCount" => $iDexaQuantityTotalCount,
					"iPrivateQuantityTotalCount" => $iPrivateQuantityTotalCount,
					"iNoChargeQuantityTotalCount" => $iNoChargeQuantityTotalCount
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
			$file = $fileBasePath."SYSON,PETER".$sDateToday.".txt";

			file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				
		}
		else {
			echo "There are no SYSON, PETER transactions for the day.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

	//added by Mike, 20200614
	echo "<br/>";

	//added by Mike, 20200614
	$responses = [];
	
	//added by Mike, 20200614
	//TO-DO: re-verify: this
	//get all the medical doctors in the list
	if ($selectedMedicalDoctorList = $mysqli->query("select medical_doctor_id, medical_doctor_name from medical_doctor where medical_doctor_id>3")) //3 is SUMMARY
	{
		foreach ($selectedMedicalDoctorList as $listValue) {
			//edited by Mike, 20200706
//			if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id='".$listValue['medical_doctor_id']."' and transaction_quantity='0'"))
			if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes from transaction where transaction_date='".date('m/d/Y')."' and fee!='0' and medical_doctor_id='".$listValue['medical_doctor_id']."' and transaction_quantity='0' group by patient_id"))
			{
				echo "--<br />";

				if ($selectedMedicalDoctorResultArray->num_rows > 0) {
					//added by Mike, 20200524
					if ($selectedMedicalDoctorResultArray->num_rows == 1) {
						echo strtoupper($listValue['medical_doctor_name'])."'s transaction for the day.<br /><br />";
					}
					else {
						echo strtoupper($listValue['medical_doctor_name'])."'s transactions for the day.<br /><br />";
					}

					//count total
					$iFeeTotalCount = 0;				
					$iQuantityTotalCount = 0;				

					$iNetFeeTotalCount = 0; //added by Mike, 20200530
					$iDexaQuantityTotalCount = 0; //added by Mike, 20200531
					$iPrivateQuantityTotalCount = 0; //added by Mike, 20200531
					$iNoChargeQuantityTotalCount = 0; //added by Mike, 20200531

					foreach ($selectedMedicalDoctorResultArray as $value) {
		//				if (strpos($value['item_name'], "*") === false) {
						if ($value['fee'] !== "0.00") {
							//edited by Mike, 20200530

							$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
							$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];

							if (strpos($value['notes'],"PRIVATE")!==false) {
								$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
								
								//added by Mike, 20200531
								$iPrivateQuantityTotalCount = $iPrivateQuantityTotalCount + 1;
								
								//TO-DO: -update: if +DEXA
							}
							else {
								if (strpos($value['notes'],"DEXA")!==false) {
									$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
									
									//added by Mike, 20200531
									$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
								}
								else if (strpos($value['notes'],"NC")!==false) {
									$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
								}
								else if (strpos($value['notes'],"NO CHARGE")!==false) {
									$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
								}
								else {
									$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee']*0.70;
								}
							}
						}					
					}

					//write as .txt file
					$jsonResponse = array(
							"iFeeTotalCount" => $iFeeTotalCount,
							"iQuantityTotalCount" => $iQuantityTotalCount,
							"iNetFeeTotalCount" => $iNetFeeTotalCount,
							
							//added by Mike, 20200531
							"iDexaQuantityTotalCount" => $iDexaQuantityTotalCount,
							"iPrivateQuantityTotalCount" => $iPrivateQuantityTotalCount,
							"iNoChargeQuantityTotalCount" => $iNoChargeQuantityTotalCount
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
					//$file = $fileBasePath."SYSON,PETER".$sDateToday.".txt";
					//edited by Mike, 20200614
					$file = $fileBasePath.strtoupper(str_replace(" ","",$listValue['medical_doctor_name'])).$sDateToday.".txt";

					file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				
				}
				else {
					echo "There are no ".strtoupper($listValue['medical_doctor_name'])." transactions for the day.";
				}
			}		
			// show an error if there is an issue with the database query
			else
			{
					echo "Error: " . $mysqli->error;
			}
			
			//added by Mike, 20200615
			echo "<br/>";
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