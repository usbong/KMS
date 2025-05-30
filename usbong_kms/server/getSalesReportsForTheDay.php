<?php
/*
  Copyright 2020~2025 USBONG
  
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200521
  @date updated: 20250531; from 20250528
  @website address: www.usbong.ph
  
  Input:
  1) Sales reports for the day in the database (DB)
  
  Output:
  1) Automatically connect to the DB and get the sales reports for the day from the DB
  --> Afterwards, write the reports as .txt text in the computer server's set location
  
  Note:
  1) Command: getSalesReportForTheDay.php
    --> output includes: MED and NON-MED ONLY in total
    --> Example:
    --> [{"iFeeTotalCount":1200,"iQuantityTotalCount":4,"iNetFeeTotalCount":1200,"iDexaQuantityTotalCount":0,"iPrivateQuantityTotalCount":0,"iNoChargeQuantityTotalCount":0,"iMedOnlyQuantityTotalCount":1,"iNonMedOnlyQuantityTotalCount":0}]
    --> iQuantityTotalCount = 4
	--> Additional Note:
	--> 1.1) Command: http://mosc-accounting/usbong_kms/index.php/report/viewpayslipwebfor/Pedro
	--> output does not include: MED and NON-MED ONLY in total
    --> iQuantityTotalCount = 3
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

	//edited by Mike, 20220823
	//note: update: base directory location
	//identify if WINDOWS file directory system 		
	//edited by Mike, 20231003
	//$fileBasePath = "G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\\";	
	//edited by Mike, 20240108
	//$fileBasePath = "D:\MOSC\KMS\output\informationDesk\cashier\\";
	$fileBasePath = "C:\MOSC\KMS\output\informationDesk\cashier\\";
	
//	echo $fileBasePath;
	
	if (strpos(dirname(__FILE__), ':\\') !== false) { //WINDOWS file directory system
	}
	else {
		//edited by Mike, 20231003
		//TODO: -add: auto-update this
		//$fileBasePath = "/home/unit_member/MOSC/output/informationDesk/cashier/";
		$fileBasePath = "/home/unit_member/Documents/halimbawa/KMS/output/informationDesk/cashier/";		
	}
							
	
/*	
	//added by Mike, 20200524
//	$fileBasePath = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\";
	//edited by Mike, 20220823
//	$fileBasePath = "G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\\";
	
	//added by Mike, 20210323
	$fileBasePath = "/home/unit_member/MOSC/output/informationDesk/cashier/";
*/


	//added by Mike, 20200902; edited by Mike, 20221003
	//$sDateToday = date("Y-m-d");
/*	
	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")."-1 Day"));
	$sDateTodayTransactionFormat = date("m/d/Y", strtotime(date("Y-m-d")."-1 Day"));
*/	

	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")));
	$sDateTodayTransactionFormat = date("m/d/Y", strtotime(date("Y-m-d")));
	
	//added by Mike, 20200524
	$responses = [];

	//added by Mike, 20200819
	$iMinorsetQuantityTotalCount = 0;
	
	//medical doctor; SYSON, PEDRO
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, x_ray_fee, lab_fee, med_fee, pas_fee, notes, transaction_id, patient_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='1' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' and transaction_quantity!=0"))

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
			
			//added by Mike, 20201027
			$iMedOnlyQuantityTotalCount = 0;	
			//added by Mike, 20201031
			$iNonMedOnlyQuantityTotalCount = 0;	

//echo "---";

			foreach ($selectedMedicalDoctorResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				//removed by Mike, 20200711
/*				if ($value['fee'] !== "0.00") {
*/	
					//echo $value['patient_id']."; ".$value['fee']."<br/>";

					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];

					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];
					
					//added by Mike, 20201027; edited by Mike, 20201031
					//note: order/sequence is important
					//if not NC and NET FEE=0, X-RAY=0, LAB=0, MINOR SET=0					
					if ((!strpos($value['notes'],"NC")!==false) and ($value['fee']==0) and ($value['x_ray_fee']==0) and ($value['lab_fee']==0)) {
						//med_fee not 0
						if ($value['med_fee']!=0) { //edited by Mike, 20201031
							$iMedOnlyQuantityTotalCount = $iMedOnlyQuantityTotalCount + 1;
						}
						//pas_fee not 0
						if ($value['pas_fee']!=0) { //edited by Mike, 20201031
							$iNonMedOnlyQuantityTotalCount = $iNonMedOnlyQuantityTotalCount + 1;
						}
					}
					else {
						//added by Mike, 20201106
						//TO-DO: -update: this due to variation in keywords, e.g. "MEDICINE"
						//TO-DO: -update: this due to include snack items
						//note: at present, SQL query does not include these items in the result
						if (strpos($value['notes'],"NON-MED ONLY")!==false) {
							$iNonMedOnlyQuantityTotalCount = $iNonMedOnlyQuantityTotalCount + 1;
						}
						else if (strpos($value['notes'],"MED ONLY")!==false) {
							$iMedOnlyQuantityTotalCount = $iMedOnlyQuantityTotalCount + 1;
						}
					}
					
					//edited by Mike, 20201019
					if (strpos($value['notes'],"PRIVATE")!==false) {
						//removed by Mike, 20201019
						//do not include for DR. PEDRO transaction
//						$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
						
						//added by Mike, 20200531
						$iPrivateQuantityTotalCount = $iPrivateQuantityTotalCount + 1;						
					}

					if (strpos($value['notes'],"NC")!==false) {
						$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
					}
					else if (strpos($value['notes'],"NO CHARGE")!==false) {
						$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
					}

/*					//edited by Mike, 20200825
					//added by Mike, 20200819
					if (strpos($value['notes'],"MINORSET")!==false) {
						$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;
						
						$iFeeTotalCount = $iFeeTotalCount - 500;
						$iQuantityTotalCount = $iQuantityTotalCount - 1;
					}
*/
					if (strpos($value['notes'],"MINORSET")!==false) {
						//edited by Mike, 20201202
						//$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;						
					
						if (strpos($value['notes'],"MINORSETX2")!==false) {
							$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 2;						
						}
						else {
							$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;						
						}						
					}
					
/*				}					
*/
			}

			//write as .txt file
			$jsonResponse = array(
					"iFeeTotalCount" => $iFeeTotalCount,
					"iQuantityTotalCount" => $iQuantityTotalCount,
					"iNetFeeTotalCount" => $iFeeTotalCount, //$iNetFeeTotalCount //added by Mike, 20200530; edited by Mike, 20200531

					//added by Mike, 20200531
					"iDexaQuantityTotalCount" => $iDexaQuantityTotalCount,
					"iPrivateQuantityTotalCount" => $iPrivateQuantityTotalCount,
					"iNoChargeQuantityTotalCount" => $iNoChargeQuantityTotalCount,
					
					//added by Mike, 20201027
					"iMedOnlyQuantityTotalCount" => $iMedOnlyQuantityTotalCount,
					//added by Mike, 20201031
					"iNonMedOnlyQuantityTotalCount" => $iNonMedOnlyQuantityTotalCount		
			);
			$responses[] = $jsonResponse;
			
			$outputReportMedicalDoctor = json_encode($responses);
							
			echo $outputReportMedicalDoctor;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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

	echo "<br/>";

	$responses = [];
	

	//x-ray
	if ($selectedXRayResultArray = $mysqli->query("select x_ray_fee from transaction where transaction_date='".$sDateTodayTransactionFormat."' and x_ray_fee!='0' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' group by patient_id"))
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
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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

	//added by Mike, 20200522
	echo "<br/>";

	//added by Mike, 20200522
	$responses = [];
	

	//added by Mike, 20200521; edited by Mike, 20200706
	if ($selectedMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.notes NOT Like '%UNPAID%' and t2.transaction_quantity='0' and t1.item_name!='MINORSET'"))
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
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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
	
	//non-medicine
	if ($selectedNonMedicineResultArray = $mysqli->query("select distinct t1.item_name, t2.transaction_id, t2.fee, t2.fee_quantity, t2.notes from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.transaction_quantity='0' and t1.item_name !='MINORSET' group by t2.transaction_id"))
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
				//edited by Mike, 20210222
//				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."'"))
				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."' and t1.receipt_type_id='2'"))
				{
					if ($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) {
/*						//edited by Mike, 20200916						
						$iFeeTotalCount = $iFeeTotalCount + ($value['fee']/(1 + 0.12));
						$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
*/						

						//TO-DO: -ADD: SC/PWD IN ITEM NOTES
						//echo $value['notes'];
						//edited by Mike, 20201222
//						if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
						if (strpos($value['notes'],"DISCOUNTED")!==false) {
							//computation equal with "WI"
							$iFeeTotalCount = $iFeeTotalCount + ($value['fee']/(1 + 0.12));
						}
						else if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
							$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
						}
						else {
							$iFeeTotalCount = $iFeeTotalCount + ($value['fee']/(1 + 0.12));
						}

						$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];

						//added by Mike, 20200812
						//Reference: https://www.php.net/number_format;
						//last accessed: 20200812
						//Note: Rounding Rules
						//input: 60.00000000000006
						//output: 60.00
						//input: 60.005
						//output: 60.01
						//input: 60.004
						//output: 60.00
						$iFeeTotalCount = floatval(number_format($iFeeTotalCount, 2, '.', ''));
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
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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
		
	//lab
	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".$sDateTodayTransactionFormat."' and lab_fee!='0' and ip_address_id!='' and machine_address_id!='' group by patient_id"))
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
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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


	//added by Mike, 20200614
	echo "<br/>";

	//added by Mike, 20201104
	$responses = [];
	

	//added by Mike, 20201104
	if ($selectedSnackResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=3 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.transaction_quantity='0'"))
	{
		//added by Mike, 20200524
		echo "--<br />";
		//edited by Mike, 20201105
		if ($selectedSnackResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedMedicineResultArray->num_rows == 1) {
				echo "Snack transaction for the day.<br /><br />";
			}
			else {
				echo "Snack transactions for the day.<br /><br />";
			}

//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;				

			foreach ($selectedSnackResultArray as $value) {
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
			
			$outputReportSnack = json_encode($responses);
							
			echo $outputReportSnack;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicine".$sDateToday.".txt";
			$file = $fileBasePath."snack".$sDateToday.".txt";
			
			file_put_contents($file, $outputReportSnack, LOCK_EX);				
		}
		else {
			echo "There are no Snack item transactions for the day.";
		}
	}	
	
	//added by Mike, 20200522
	echo "<br/>";


	//added by Mike, 20200614
	$responses = [];
	
	//added by Mike, 20200614
	//TO-DO: re-verify: this
	//get all the medical doctors in the list
	if ($selectedMedicalDoctorList = $mysqli->query("select medical_doctor_id, medical_doctor_name from medical_doctor where medical_doctor_id>3")) //3 is SUMMARY
	{
		foreach ($selectedMedicalDoctorList as $listValue) {
			//added by Mike, 20200713
			$responses = [];

			if ($selectedMedicalDoctorResultArray = $mysqli->query("select patient_id, fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='".$listValue['medical_doctor_id']."' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' and transaction_quantity!=0 order by transaction_id ASC")) {
			
/*		//note; added by Mike, 20211022
		$this->db->not_like('t2.notes',"MED");
		$this->db->not_like('t2.notes',"ONLY");
		
		//added by Mike, 20201106
		$this->db->not_like('t2.notes',"SSS");
		$this->db->not_like('t2.notes',"SNACK ONLY");
		$this->db->order_by('t2.transaction_id', 'ASC');
*/

				echo "--<br />";

				if ($selectedMedicalDoctorResultArray->num_rows > 0) {				

//					echo "Dr. Honesto patient count: ".$selectedMedicalDoctorResultArray->num_rows."<br/>";

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

					//added by Mike, 20201217
//					$iTransactionQuantity = 0;

					foreach ($selectedMedicalDoctorResultArray as $value) {
						//added by Mike, 20240927
						$iCurrExtraFeeValue=0;

						
		//				if (strpos($value['item_name'], "*") === false) {
						//removed by Mike, 20200712
/*	
						if ($value['fee'] !== "0.00") {
*/					
							//edited by Mike, 20211108
//							echo "patient_id: ".$value['patient_id']." <br/>";


							$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
							$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];

							if (strpos($value['notes'],"PRIVATE")!==false) {
								//edited by Mike, 20201026
								//$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
								
								$myNetFeeValue=$value['fee'];
								
								//added by Mike, 20200531
								$iPrivateQuantityTotalCount = $iPrivateQuantityTotalCount + 1;
								
								//edited by Mike, 20250528
								//note: no +DEXA with other medical doctors beside Dr Peter
							}
							//added by Mike, 20201026
							else {
								//TO-DO: -reverify: this
								//edited by Mike, 20200910
								//$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee']*0.70;
								$myNetFeeValue = $value['fee']*0.70;
							}							
							
							
							//edited by Mike, 20220815
							if (strpos($listValue['medical_doctor_name'],"HONESTO")!==false) {
							//edited by Mike, 20230530
/*
							if ((strpos($listValue['medical_doctor_name'],"HONESTO")!==false) or
								(strpos($listValue['medical_doctor_name'],"CHASTITY")!==false)) {
*/
//										echo $value['notes'];
//										echo $value['transaction_id'];
								//TO-DO: -update: this
								//$transactionId = $value['transaction_id'] + 1;
								//edited by Mike, 20201127
								//edited by Mike, 20211023
//								$iTransactionId = $value['transaction_id'] + 1;
								$iTransactionId = $value['transaction_id'];
								
								//removed by Mike, 20201003
//								echo $iTransactionId;
								
								//added by Mike, 20201127
								//--------------------------------------------------
			//						echo $iTransactionId."<br/>";

									//added by Mike, 20200910
									//identify newest transactionId
									$iTransactionIdMax = -1;

									if ($rowTransactionIdMaxArray = $mysqli->query("select max(transaction_id) As transactionIdMax from transaction")) {
										if ($rowTransactionIdMaxArray->num_rows > 0) {
											$iTransactionIdMax = mysqli_fetch_array($rowTransactionIdMaxArray)[0]; //'transactionIdMax'];
										}
									}				
									// show an error if there is an issue with the database query
									else
									{
										echo "Error: " . $mysqli->error;
									}									

//										echo "iTransactionIdMax: ".$iTransactionIdMax."<br/>";

//removed by Mike, 20211023; transaction with combine fee now already has transaction_quantity value
/*									
				//identify transaction with the combined fees
				//					while ($transactionId==0) {
									do {
										echo "iTransactionId: ".$iTransactionId." : ";
										
										if ($rowTransactionQuantityArray = $mysqli->query("select transaction_quantity from transaction where transaction_id='".$iTransactionId."'")) {
											
//echo ">>><br/>";											
											if ($rowTransactionQuantityArray->num_rows > 0) {												
												$iTransactionId = $iTransactionId + 1;
echo "hallo<br/>";
												//echo "iTransactionId: ".$iTransactionId;
												
												//this is due to the transaction count can skip
												$iTransactionQuantity = -1;
												if (isset($rowTransactionQuantityArray)) {
//													$iTransactionQuantity = $rowTransactionQuantityArray->transaction_quantity;
													$iTransactionQuantity = mysqli_fetch_array($rowTransactionQuantityArray)[0];
												}
												//note: if last transaction in database
												//we use >= to be equal with the "break" command of while ($iTransactionQuantity <= 0);												
												if ($iTransactionId>=$iTransactionIdMax) {
													break;
												}						
												
												
//												echo "iTransactionId: ".($iTransactionId-1)." : ";
												echo "iTransactionQuantity: ".$iTransactionQuantity."<br/>";
											}
											//added by Mike, 20201217
											else {
												//added by Mike, 20211023
	echo "DITO<br/>";
												//if next transaction was deleted; 
												//verify previous transaction's quantity if NOT zero
												//i.e. combined transaction
												break;
//												$iTransactionId=$iTransactionId+1;
											}
										}
										// show an error if there is an issue with the database query
										else
										{
											echo "Error: " . $mysqli->error;
										}
									}
									while ($iTransactionQuantity <= 0);								
								//--------------------------------------------------
								
								//added by Mike, 20201216; edited by Mike, 20210120
								//$iTransactionId = $iTransactionId -1;
								if ($iTransactionId>=$iTransactionIdMax) {
									$iTransactionId = $iTransactionIdMax;
								}
								else {
									$iTransactionId = $iTransactionId -1;
								}									
*/

								//edited by Mike, 20201127
								//if ($receiptArray = $mysqli->query("select receipt_type_id, receipt_number from receipt where transaction_id='".$transactionId."'")) {
//									echo $iTransactionId;
								if ($receiptArray = $mysqli->query("select receipt_type_id, receipt_number from receipt where transaction_id='".$iTransactionId."'")) {
									$receiptArrayRowValue = mysqli_fetch_assoc($receiptArray);

/*
//removed by Mike, 20221110
//TO-DO: -reverify: 2022-11-07
									echo "iTransactionId: ".$iTransactionId."<br/>";
//									echo "patient name: ".$value['patient_name']."<br/>";
									echo "fee: ".$value['fee']."<br/>";
									echo "receipt number: ".$receiptArrayRowValue['receipt_number']."<br/>";
*/									
									//edited by Mike, 20221110
//									if($receiptArrayRowValue) {
									if (isset($receiptArrayRowValue)) {
										if ($receiptArrayRowValue['receipt_number']!=0) {
											//TODO: -reverify: this if Private
											$myNetFeeValue = $value['fee']*0.70 - $value['fee']*.12;
										}
									}

									// free result set
									mysqli_free_result($receiptArray);											
								}
								// show an error if there is an issue with the database query
								else
								{
									echo "Error: " . $mysqli->error;
								}
							}									
							
							if (strpos($value['notes'],"NC")!==false) {
									$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
							}
							else if (strpos($value['notes'],"NO CHARGE")!==false) {
									$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
							}
							else {
								//edited by Mike, 20240927; from 20230530
								if (strpos($listValue['medical_doctor_name'],"HONESTO")!==false) {
									
									//note: with Dr Honesto's case, his med cert payment is included in the 70/30 sharing with MOSC
									if ($receiptArray = $mysqli->query("select receipt_type_id, receipt_number from receipt where transaction_id='".$value['transaction_id']."'")) {
										$receiptArrayRowValue = mysqli_fetch_assoc($receiptArray);
										
										//echo "dito: ".$value['transaction_id'];
										
										if($receiptArrayRowValue) {
											$myNetFeeValue = $value['fee']*0.70 - $value['fee']*.12;
										}
										// free result set
										mysqli_free_result($receiptArray);											
									}
									// show an error if there is an issue with the database query
									else
									{
										echo "Error: " . $mysqli->error;
									}									
								}
								else {
							
									//removed by Mike, 20240927
									//$iCurrExtraFeeValue=0;

									if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT")!==false) {
										//edited by Mike, 20241029
										if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT0")!==false) {
											$iCurrExtraFeeValue = 0;
										}									
										else if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3")!==false) {
											if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3X2")!==false) {
												//$iNetFeeTotalCount = $iNetFeeTotalCount + (300*2)*.30;
												
												$iCurrExtraFeeValue+=300*2;
											}
											//added by Mike, 20250219
											else if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3X3")!==false) {
												$iCurrExtraFeeValue+=300*3;
											}
											else {
												//$iNetFeeTotalCount = $iNetFeeTotalCount + 300*.30;
																						
												$iCurrExtraFeeValue+=300;
											}
										}
										else {	
											if ((strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERTX2")!==false) ||
												(strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT2X2")!==false)) {
												//$iNetFeeTotalCount = $iNetFeeTotalCount + (200*2)*.30;
																																								$iCurrExtraFeeValue+=200*2;
											}
											//added by Mike, 20250219
											else if ((strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERTX3")!==false) ||
												(strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT2X3")!==false)) {
												$iCurrExtraFeeValue+=200*3;
											}
											else {
												//$iNetFeeTotalCount = $iNetFeeTotalCount + 200*.30;
												
												$iCurrExtraFeeValue+=200;										
											}
										}
									}
									
									//added by Mike, 20250528
									//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-$iCurrExtraFeeValue)*0.70+$iCurrExtraFeeValue;								
								}

								//$iNetFeeTotalCount = $iNetFeeTotalCount + $myNetFeeValue;	

								//edited by Mike, 20250528
								//note variation with Dr Peter's due to medical doctor includes special case with Dr Honesto
								if (strpos($value['notes'],"PRIVATE")!==false) {
									$iNetFeeTotalCount = $iNetFeeTotalCount + $myNetFeeValue;	
								}
								else {
									$iNetFeeTotalCount = $iNetFeeTotalCount + ($iCurrExtraFeeValue*.30) + $myNetFeeValue;	
								}
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-$iCurrExtraFeeValue)*0.70+$iCurrExtraFeeValue;								
								//echo $value['patient_name'].": ".$myNetFeeValue."<br/>";

															
								if (strpos($value['notes'],"MINORSET")!==false) {
									$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;						
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
					
					//removed by Mike, 20200902
					//$sDateToday = date("Y-m-d");

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

	//added by Mike, 20200524
	$responses = [];
	
	//medical doctor; SYSON, PETER
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='2' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' and transaction_quantity!=0"))
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
				//removed by Mike, 20200712
/*	
				if ($value['fee'] !== "0.00") {
*/					

					//echo $value['fee']."<br/>";

					//edited by Mike, 20200530

					$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
					$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];

					if (strpos($value['notes'],"PRIVATE")!==false) {
						//removed by Mike, 20200829
						//$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
						
						//added by Mike, 20200531
						$iPrivateQuantityTotalCount = $iPrivateQuantityTotalCount + 1;
						
						//TO-DO: -reverify: if +DEXA
						//added by Mike, 20200829
						if (strpos($value['notes'],"DEXA")!==false) {
							//edited by Mike, 20210122
/*
							$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
							
							//added by Mike, 20200531
							$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
*/

							//max dexa: 2
/* //edited by Mike, 20210313							
							if (strpos(strtoupper($value['notes']), "DEXA2")!==false) {
								$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-1000)*0.70 + 1000;									
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 2;
							}
							else {
								$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
								//added by Mike, 20200531
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
							}
*/
							//edited by Mike, 20240518
							//if (strpos(strtoupper($value['notes']), "DEXA2")!==false) {
							if ((strpos(strtoupper($value['notes']), "DEXA2")!==false) ||
								(strpos(strtoupper($value['notes']), "DEXAX2")!==false)){								
								$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];

								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 2;
							}
							//added by Mike, 20240907
							else if ((strpos(strtoupper($value['notes']), "DEXA3")!==false) ||
								(strpos(strtoupper($value['notes']), "DEXAX3")!==false)){								
								$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];

								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 3;
							}
							else if ((strpos(strtoupper($value['notes']), "DEXA4")!==false) ||
								(strpos(strtoupper($value['notes']), "DEXAX4")!==false)){								
								$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];

								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 4;
							}							
							else {
								$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
								
								//added by Mike, 20200531
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
							}							

						}
						else {
							$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
						}
					}
					else {
/*	//edited by Mike, 20240829
						//edited by Mike, 20200829
						if (strpos($value['notes'],"DEXA")!==false) {
							//max dexa: 2
							//edited by Mike, 20240518
							//if (strpos(strtoupper($value['notes']), "DEXA2")!==false) {
							if ((strpos(strtoupper($value['notes']), "DEXA2")!==false) ||
							    (strpos(strtoupper($value['notes']), "DEXAX2")!==false)){
								$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-1000)*0.70 + 1000;									
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 2;
							}
							else {
								$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
								
								//added by Mike, 20200531
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
							}

						}
						//added by Mike, 20240404
						else if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT")!==false) {
							//edited by Mike, 20240501
							//DR PETER MEDCERT; updated from 200PHP to 300PHP;
							//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200)*.70+200;

							//edited by Mike, 20240506
							//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300)*.70+300;
							if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3")!==false) {
								//edited by Mike, 20240510
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300)*.70+300;
								if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3X2")!==false) {
									$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300*2)*.70+300*2;
								}
								else {
									$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300)*.70+300;
								}
							}
							else {	
								//edited by Mike, 20240510
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200)*.70+200;
								if ((strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERTX2")!==false) ||
									(strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT2X2")!==false)) {
									$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200*2)*.70+200*2;
								}
								else {
									$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200)*.70+200;
								}
							}
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
*/						

	//re-added by Mike, 20250527; from 20250522; TODO: -reverify: this
						$iCurrExtraFeeValue=0;

						//edited by Mike, 20200829
						if (strpos($value['notes'],"DEXA")!==false) {
							//max dexa: 2
							//edited by Mike, 20240518
							//if (strpos(strtoupper($value['notes']), "DEXA2")!==false) {
							if ((strpos(strtoupper($value['notes']), "DEXA2")!==false) ||
							    (strpos(strtoupper($value['notes']), "DEXAX2")!==false)){
								
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-1000)*0.70 + 1000;									
								
								$iCurrExtraFeeValue+=1000;
								
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 2;
							}
							//added by Mike, 20240907
							else if ((strpos(strtoupper($value['notes']), "DEXA3")!==false) ||
								(strpos(strtoupper($value['notes']), "DEXAX3")!==false)){								
								
								$iCurrExtraFeeValue+=1500;

								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 3;
							}
							else if ((strpos(strtoupper($value['notes']), "DEXA4")!==false) ||
								(strpos(strtoupper($value['notes']), "DEXAX4")!==false)){								
								$iCurrExtraFeeValue+=2000;

								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 4;
							}										
							else {
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
								
								$iCurrExtraFeeValue+=500;
								
								//added by Mike, 20200531
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
							}

						}
						
						if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT")!==false) {
							//edited by Mike, 20240501
							//DR PETER MEDCERT; updated from 200PHP to 300PHP;
							//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200)*.70+200;

							//edited by Mike, 20240506
							//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300)*.70+300;
							
							//edited by Mike, 20241029
							if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT0")!==false) {
								$iCurrExtraFeeValue = 0;
							}
							else if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3")!==false) {
								//edited by Mike, 20240510
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300)*.70+300;
								if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3X2")!==false) {
									//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300*2)*.70+300*2;
									
									$iCurrExtraFeeValue+=300*2;
								}
								//added by Mike, 20250219
								else if (strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT3X3")!==false) {
									$iCurrExtraFeeValue+=300*3;
								}
								else {
									//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-300)*.70+300;
									
									$iCurrExtraFeeValue+=300;
								}
							}
							else {	
								//edited by Mike, 20240510
								//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200)*.70+200;
								if ((strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERTX2")!==false) ||
									(strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT2X2")!==false)) {
									//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200*2)*.70+200*2;
									
									$iCurrExtraFeeValue+=200*2;
								}
								//added by Mike, 20250219
								else if ((strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERTX3")!==false) ||
									(strpos(str_replace(" ","",strtoupper($value['notes'])), "MEDCERT2X3")!==false)) {
									$iCurrExtraFeeValue+=200*3;
								}								
								else {
									//$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-200)*.70+200;
									
									$iCurrExtraFeeValue+=200;
								}
							}
						}						

					    ////echo "iCurrExtraFeeValue: ".$iCurrExtraFeeValue."<br/>";

						
						if (strpos($value['notes'],"NC")!==false) {
							$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
						}
						else if (strpos($value['notes'],"NO CHARGE")!==false) {
							$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
						}
/*						
						else {
							$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee']*0.70;
						}	
*/
						//edited by Mike, 20250527; from 20250522
						//due to med cert3; not private;
						//TODO: -reverify this
						
						$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-$iCurrExtraFeeValue)*0.70+$iCurrExtraFeeValue;
						
						//$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee']*0.70;

					    //echo "iNetFeeTotalCount: ".$iNetFeeTotalCount."<br/>";
					}
										
					if (strpos($value['notes'],"MINORSET")!==false) {
						$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;						
					}					
/*				}	
*/				
			}
			
/*	//removed by Mike, 20250522								
					echo "iFeeTotalCount: ".$iFeeTotalCount."<br/>";
					echo "iQuantityTotalCount: ".$iQuantityTotalCount."<br/>";
					echo "iNetFeeTotalCount: ".$iNetFeeTotalCount."<br/>";
*/

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
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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

	//added by Mike, 20200522
	echo "<br/>";

	//added by Mike, 20200522
	$responses = [];
	
	//medicine asterisk, i.e. Glucosamine Sulphate and Calcium with Vitamin D
	if ($selectedMedicineAsteriskResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.transaction_quantity='0'"))
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
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

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

	
	//added by Mike, 20200708
	echo "<br/>";

	//added by Mike, 20200709	
	$responses = [];


	//Value-Added Tax VAT for Non-medicine items
	if ($selectedNonMedicineResultArray = $mysqli->query("select t1.item_name, t2.transaction_id, t2.fee, t2.fee_quantity, t2.notes from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID' and t2.transaction_quantity='0'"))
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedNonMedicineResultArray->num_rows > 0) {
			//added by Mike, 20200524
			if ($selectedNonMedicineResultArray->num_rows == 1) {
				echo "VAT for Non-medicine transaction for the day.<br /><br />";
			}
			else {
				echo "VAT for Non-medicine transactions for the day.<br /><br />";
			}

//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;

			foreach ($selectedNonMedicineResultArray as $value) {
				//identify non-medicine item transaction if with VAT
				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."' and t1.receipt_type_id='2'"))
				{
/*
					echo $value['item_name'];
					echo "dito".$value['transaction_id']."<br/>";
*/
					if ($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) {						
						//edited by Mike, 20201223
						if (strpos($value['notes'],"DISCOUNTED")!==false) {
							//added by Mike, 20210301							
							$iFeeTotalCount = $iFeeTotalCount + ($value['fee'] - ($value['fee']/(1 + 0.12)));
							$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];							
						}
						else if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
						}
						else {

//added by Mike, 20210116
//note: if PAS OR# not yet added to KMS after transaction, add by hand 12% to all non-med items 
//ECHO $iFeeTotalCount."<BR/>";

							$iFeeTotalCount = $iFeeTotalCount + ($value['fee'] - ($value['fee']/(1 + 0.12)));
							$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];

//added by Mike, 20210116
//ECHO $iFeeTotalCount."<BR/>";

/*	//removed by Mike, 20210104
						echo $value['item_name'];
						echo "dito".$value['transaction_id']."<br/>";
*/

							//Note: fee_quantity can be 6, albeit in cash register, it is 1
							//This is due to several non-med items are combined into 1 transaction in Cash Register
							//TO-DO: -update: this
	//echo "fee_quantity: ".$value['fee_quantity'];
							
	/*						//removed by Mike, 20200708
							$iFeeTotalCount = $iFeeTotalCount + ($value['fee']/(1 + 0.12));
							$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
*/
						}
						
						//added by Mike, 20200812; added by Mike, 20210301
						//Reference: https://www.php.net/number_format;
						//last accessed: 20200812
						//Rounding Rules
						//input: 60.00000000000006
						//output: 60.00
						//input: 60.005
						//output: 60.01
						//input: 60.004
						//output: 60.00
						$iFeeTotalCount = floatval(number_format($iFeeTotalCount, 2, '.', ''));
						
					}
					//removed by Mike, 20200708
/*					else {
						$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
						$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
					}
*/					
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
			
			$outputReportVATForNonMedicine = json_encode($responses);
							
			echo $outputReportVATForNonMedicine;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");

			//update the file location accordingly
			//edited by Mike, 20200524
			//note: \\nonMedicine due to \n is new line
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\nonMedicine".$sDateToday.".txt";
			$file = $fileBasePath."VATForNonMedicine".$sDateToday.".txt";

			file_put_contents($file, $outputReportVATForNonMedicine, LOCK_EX);				
		}
		else {
			echo "There are no VAT for Non-medicine item transactions for the day.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																


	//added by Mike, 20200819
	//Minorset
	echo "<br />";

	$responses = [];

	//added by Mike, 20200524
	echo "--<br />";

	//edited by Mike, 20200825
	if ($iMinorsetQuantityTotalCount == 0) {
		echo "There are no Minorset transactions for the day.<br /><br />";
	}
	else {
		if ($iMinorsetQuantityTotalCount == 1) {
			echo "Minorset transaction for the day.<br /><br />";
		}
		else {
			echo "Minorset transactions for the day.<br /><br />";
		}
		
		$iMinorsetFeeTotalCount = $iMinorsetQuantityTotalCount*500;
		//write as .txt file
		$jsonResponse = array(
				"iFeeTotalCount" => $iMinorsetFeeTotalCount,
				"iQuantityTotalCount" => $iMinorsetQuantityTotalCount,
				"iNetFeeTotalCount" => $iMinorsetFeeTotalCount
		);
		$responses[] = $jsonResponse;
		
		$outputReportMinorset = json_encode($responses);
		
		echo $outputReportMinorset;

		//removed by Mike, 20200902
		//$sDateToday = date("Y-m-d");

		//update the file location accordingly
		//edited by Mike, 20200524
		//note: \\nonMedicine due to \n is new line
		//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\nonMedicine".$sDateToday.".txt";
		$file = $fileBasePath."Minorset".$sDateToday.".txt";

		file_put_contents($file, $outputReportMinorset, LOCK_EX);				
	}
	//echo $outputReportMinorset;
	
	//close database connection
	$mysqli->close();
?>
