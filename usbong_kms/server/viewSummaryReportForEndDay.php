<!--
  Copyright 2020~2025 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
 
  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200522
  @date updated: 20250924; from 20250923
  
  Input:
  1) Summary Worksheet with counts and amounts in .csv (comma-separated value) file at the Accounting/Cashier Unit
  Output:
  1) Summary Worksheet (End Day Report) that is viewable on a Computer Web Browser  
  
  Note:
  1) We can reuse this set of instructions with other .csv files that need to be viewable on a Computer Web Browser.
  2) We can auto-generate the .csv files using Microsoft EXCEL and LibreOffice CALC.
	
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewSummaryReportForEndDay.php   
-->
<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
 	<!-- edited by Mike, 20200811 -->
   <!-- <meta charset="utf-8"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Reference: Apache Friends Dashboard index.html -->
    <!-- "Always force latest IE rendering engine or request Chrome Frame" -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <style type="text/css">
	/**/
	                    body
                        {
							font-family: Arial;
							font-size: 12pt;


							width: 860px;
/*							
							transform: scale(0.80);
							transform-origin: 0 0;							
*/							
                        }
						
						div.copyright
						{
							text-align: center;
						}
						
						img.Image-companyLogo {
							max-width: 60%;
							height: auto;
							float: left;
							text-align: center;
							padding-left: 20px;
							padding-top: 10px;
						}

						img.Image-moscLogo {
							max-width: 20%;
							height: auto;
							float: left;
							text-align: center;
						}
						
						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						td.tableHeaderColumn
						{
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;		
							text-align: center;
							font-weight: bold;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}						

						td.columnBorderBottom
						{
							border: 1px dotted #ab9c7d;		
							border-bottom: 4px double black;
							text-align: center;
						}						

						td.columnBorderBottomDotted
						{
							border: 1px dotted #ab9c7d;		
							border-bottom: 2px dotted black;
							text-align: center;
						}						

						td.columnBorderTopBottom
						{
							border: 1px dotted #ab9c7d;		
							border-top: 2px solid black;
							border-bottom: 4px double black;
							text-align: center;
						}						
						
						td.imageColumn
						{
							width: 40%;
							display: inline-block;
						}						

						td.pageNameColumn
						{
							width: 50%;
							display: inline-block;
							text-align: right;
						}												
    /**/
    </style>
    <title>
      Summary Report for the End Day (MOSC)
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
	  </script>
  <body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');

/* //removed by Mike, 20210916	
	//edited by Mike, 20200726
	//$sDateToday = (new DateTime())->format('Y-m-d');
	$sDateToday = Date('Y-m-d');
//	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")."-1 Day"));
*/

	//note: added:additional backslash to be "\\" 
	//Windows 7 Service Pack 1 32-bit Operating System machine
	//XAMPP 1.8.2 [PHP: 5.4.31]
	//edited by Mike, 20210914
//	$filename="C:\\xampp\\htdocs\\usbong_kms\\kasangkapan\\phantomjs-2.1.1-windows\\bin\\templates\\moscReportForTheDayLibreOfficeCalc.csv";

  //edited by Mike, 20230925  
  $filename="C:\\xampp\\htdocs\\usbong_kms\\usbongTemplates\\Cashier\\moscGetSalesReportForEndDayLibreOfficeCalc.csv";

  //note: also correct output; //$filename="C:\\xampp\htdocs\usbong_kms\usbongTemplates\Cashier\moscGetSalesReportForEndDayLibreOfficeCalc.csv";
	
	
	//TO-DO: -add: auto-write values from input files after executing command:  getSalesReportsForTheDay.php 

	//TO-DO: -remove: this
	//added by Mike, 20200524
	//update file location
//	$fileBasePath = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\";
	//edited by Mike, 20230925
	//$fileBasePath = "G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\\";	
	
	$fileBasePath = "D:\MOSC\KMS\output\informationDesk\cashier\\";	


	//TO-DO: -add: execute instructions in getSalesReportsForTheDay.php
	//use auto-computed values


	//TO-DO: -update: this

//-------
//Note: read input files and put inside non-persistent memory, i.e. Random Access Memory (RAM) container

//	$file = $fileBasePath."SYSON,PEDRO".$sDateToday.".txt";
//	$file = $fileBasePath."SYSON,PETER".$sDateToday.".txt";

	$decodedJSONFileArray = array();
	$decodedJSONFileArrayMaxIndex = 16;
	$decodedJSONFileArray[0][0] = "SYSON,PEDRO";
	$decodedJSONFileArray[1][0] = "xRay";
	$decodedJSONFileArray[2][0] = "medicine";
	$decodedJSONFileArray[3][0] = "nonMedicine";
	$decodedJSONFileArray[4][0] = "lab";
	$decodedJSONFileArray[5][0] = "sss";
	$decodedJSONFileArray[6][0] = "minor";
	$decodedJSONFileArray[7][0] = "REJUSO,CHASTITYAMOR";
	$decodedJSONFileArray[8][0] = "ESPINOSA,JHONSEL";
	$decodedJSONFileArray[9][0] = "DELAPAZ,RODIL";
	$decodedJSONFileArray[10][0] = "LASAM,HONESTO";
	$decodedJSONFileArray[11][0] = "BALCE,GRACIACIELO";
	$decodedJSONFileArray[12][0] = "photocopy";
	$decodedJSONFileArray[13][0] = "SYSON,PETER";
	$decodedJSONFileArray[14][0] = "medicineAsterisk";
	$decodedJSONFileArray[15][0] = "VATForNonMedicine";

//-------
//execute: getSalesReportsForTheDay.php

/*	//removed by Mike, 20201018; due to pop-up notification to accept first before page is auto-opened
	//added: instruction in autoScreenCaptureSummaryReportForTheNoonDay.bat
	echo "<script>
			window.open('getSalesReportsForTheDay.php');
		  </script>";			
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
//	$fileBasePath = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\";
	
	//removed by Mike, 20230925
	//$fileBasePath = "G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\\";
	
/*
	//edited by Mike, 20210916; note: use to set date
	//added by Mike, 20200902
	//$sDateToday = date("Y-m-d");
	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")."-2 Day"));
	$sDateTodayTransactionFormat = date("m/d/Y", strtotime(date("Y-m-d")."-2 Day"));
*/	

	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")));
	$sDateTodayTransactionFormat = date("m/d/Y", strtotime(date("Y-m-d")));
	
	//added by Mike, 20200524
	$responses = [];

	//added by Mike, 20200819
	$iMinorsetQuantityTotalCount = 0;
	
	//medical doctor; SYSON, PEDRO
	//edited by Mike, 20250520
	//if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, x_ray_fee, lab_fee, med_fee, pas_fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='1' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' group by patient_id"))
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, x_ray_fee, lab_fee, med_fee, pas_fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='1' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' and transaction_quantity!=0"))
	{
/* //removed by Mike, 20210915		
		//added by Mike, 20200524
		echo "--<br />";
*/
		if ($selectedMedicalDoctorResultArray->num_rows > 0) {

/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedMedicalDoctorResultArray->num_rows == 1) {
				echo "SYSON, PEDRO's transaction for the day.<br /><br />";
			}
			else {
				echo "SYSON, PEDRO's transactions for the day.<br /><br />";
			}
*/			

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

			foreach ($selectedMedicalDoctorResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				//removed by Mike, 20200711
/*				if ($value['fee'] !== "0.00") {
*/	

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
							
//			echo $outputReportMedicalDoctor;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;

/* //removed by Mike, 20210914			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");
			//update the file location accordingly
			//edited by Mike, 20200524
			//note: \\nonMedicine due to \n is new line
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\xRay".$sDateToday.".txt";
			$file = $fileBasePath."SYSON,PEDRO".$sDateToday.".txt";
			file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				
*/
			//TO-DO: -reuse: technique with remaining parts
//			echo ">>>> DITO";

			$decodedJSONFile = json_decode($outputReportMedicalDoctor);					
			$decodedJSONFileArray[0][1] = $decodedJSONFile[0];

//removed by Mike, 20210915			
//			echo $decodedJSONFileArray[0][1]->iFeeTotalCount;			
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no SYSON, PEDRO transactions for the day.";
*/
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																
/* //removed by Mike, 20210915		
	echo "<br/>";
*/
	$responses = [];
	

	//x-ray
	if ($selectedXRayResultArray = $mysqli->query("select x_ray_fee from transaction where transaction_date='".$sDateTodayTransactionFormat."' and x_ray_fee!='0' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' group by patient_id"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/
		if ($selectedXRayResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedXRayResultArray->num_rows == 1) {
				echo "X-Ray transaction for the day.<br /><br />";
			}
			else {
				echo "X-Ray transactions for the day.<br /><br />";
			}
*/			

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
			
/*	//removed by Mike, 20210914							
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
*/			
			$decodedJSONFile = json_decode($outputReportXRay);					
			$decodedJSONFileArray[1][1] = $decodedJSONFile[0];

//removed by Mike, 20210915
//			echo $decodedJSONFileArray[1][1]->iFeeTotalCount;			
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no X-Ray item transactions for the day.";
*/
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
/* //removed by Mike, 20210915				
			echo "Error: " . $mysqli->error;
*/
	}																

/* //removed by Mike, 20210915		
	//added by Mike, 20200522
	echo "<br/>";
*/	

	//added by Mike, 20200522
	$responses = [];
	

	if ($selectedMedicineResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.notes NOT Like '%UNPAID%' and t2.transaction_quantity='0' and t1.item_name!='MINORSET'"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/		

		if ($selectedMedicineResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedMedicineResultArray->num_rows == 1) {
				echo "Medicine transaction for the day.<br /><br />";
			}
			else {
				echo "Medicine transactions for the day.<br /><br />";
			}
*/

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
							
/*	//removed by Mike, 20210914							
			echo $outputReportMedicine;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");
			//update the file location accordingly
			//edited by Mike, 20200524
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicine".$sDateToday.".txt";
			$file = $fileBasePath."medicine".$sDateToday.".txt";
			
			file_put_contents($file, $outputReportMedicine, LOCK_EX);				
*/			
			$decodedJSONFile = json_decode($outputReportMedicine);					
			$decodedJSONFileArray[2][1] = $decodedJSONFile[0];

//removed by Mike, 20210915		
//			echo $decodedJSONFileArray[2][1]->iFeeTotalCount;
		}
		else {
/* //removed by Mike, 20210915		
			echo "There are no Medicine item transactions for the day.";
*/			
		}
	}	

/* //removed by Mike, 20210915			
	//added by Mike, 20200522
	echo "<br/>";
*/	

	//added by Mike, 20200522
	$responses = [];
	
	//non-medicine
	if ($selectedNonMedicineResultArray = $mysqli->query("select distinct t1.item_name, t2.transaction_id, t2.fee, t2.fee_quantity, t2.notes from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.transaction_quantity='0' and t1.item_name !='MINORSET'"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/		

		if ($selectedNonMedicineResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedNonMedicineResultArray->num_rows == 1) {
				echo "Non-medicine transaction for the day.<br /><br />";
			}
			else {
				echo "Non-medicine transactions for the day.<br /><br />";
			}
*/

//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;

			foreach ($selectedNonMedicineResultArray as $value) {	
/*
echo $value['transaction_id']."; ";
echo $value['fee']."<br/>";
*/
//echo $value['fee'];//."<br/>";
//echo "; ".$iFeeTotalCount."<br/>";
			
				//edited by Mike, 20250905; from 20200708
				//identify non-medicine item transaction if with VAT
				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number, t1.receipt_type_id from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."'"))
				{
					//edited by Mike, 20250906
					//TODO: -reverify: this
					$row = $selectedNonMedicineTransactionReceiptResultArray->fetch_assoc(); 
					
					//echo ">>>>".$row['receipt_type_id']."<br/>";

					//edited by Mike, 20250908; from 20250906
					//if ($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) {
					//if (($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) and ($row['receipt_type_id']===2)){
					
					//edited by Mike, 20250924; from 20250923
					//if (($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) and ($row['receipt_number']!==0)){
					
					if (($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) and ($row['receipt_number']!=="0") and ($row['receipt_type_id']==="2")){

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
					//}
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
			
/* //removed by Mike, 20210914							
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
*/
			$decodedJSONFile = json_decode($outputReportNonMedicine);					
			$decodedJSONFileArray[3][1] = $decodedJSONFile[0];

//removed by Mike, 20210915						
//			echo $decodedJSONFileArray[3][1]->iFeeTotalCount;			
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no Non-medicine item transactions for the day.";
*/			
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

/* //removed by Mike, 20210915			
	//added by Mike, 20200523
	echo "<br/>";
*/	

	//added by Mike, 20200523
	$responses = [];
		
	//lab
	//edited by Mike, 20211229
	//TO-DO: -reverify: this
	//note: combined transaction CAN still be deleted
//	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".$sDateTodayTransactionFormat."' and lab_fee!='0' and transaction_quantity!='0' and ip_address_id!='' and machine_address_id!='' group by patient_id"))
	if ($selectedLabResultArray = $mysqli->query("select lab_fee from transaction where transaction_date='".$sDateTodayTransactionFormat."' and lab_fee!='0' and transaction_quantity='0' and ip_address_id!='' and machine_address_id!='' group by patient_id"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/		

		if ($selectedLabResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedLabResultArray->num_rows == 1) {
				echo "Laboratory transaction for the day.<br /><br />";
			}
			else {
				echo "Laboratory transactions for the day.<br /><br />";
			}
*/			

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
							
/* //removed by Mike, 20210914							
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
*/
			$decodedJSONFile = json_decode($outputReportLab);					
			$decodedJSONFileArray[4][1] = $decodedJSONFile[0];

//removed by Mike, 20210915						
//			echo $decodedJSONFileArray[4][1]->iFeeTotalCount;					
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no Lab, i.e. Laboratory, item transactions for the day.";
*/
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

/* //removed by Mike, 20210915		
	//added by Mike, 20200614
	echo "<br/>";
*/

	//added by Mike, 20201104
	$responses = [];
	

	//added by Mike, 20201104
	if ($selectedSnackResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=3 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.transaction_quantity='0'"))
	{
/* //removed by Mike, 20210915		
		//added by Mike, 20200524
		echo "--<br />";
*/		
		//edited by Mike, 20201105
		if ($selectedSnackResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedMedicineResultArray->num_rows == 1) {
				echo "Snack transaction for the day.<br /><br />";
			}
			else {
				echo "Snack transactions for the day.<br /><br />";
			}
*/
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
			
/* //removed by Mike, 20210914							
			echo $outputReportSnack;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");
			//update the file location accordingly
			//edited by Mike, 20200524
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicine".$sDateToday.".txt";
			$file = $fileBasePath."snack".$sDateToday.".txt";
			
			file_put_contents($file, $outputReportSnack, LOCK_EX);				
*/
			$decodedJSONFile = json_decode($outputReportSnack);					
			$decodedJSONFileArray[5][1] = $decodedJSONFile[0];

//removed by Mike, 20210915						
//			echo $decodedJSONFileArray[5][1]->iFeeTotalCount;			
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no Snack item transactions for the day.";
*/
		}
	}	
	
/* //removed by Mike, 20210915			
	//added by Mike, 20200522
	echo "<br/>";
*/

	//added by Mike, 20200614
	$responses = [];
	
	//added by Mike, 20200614
	//TO-DO: re-verify: this
	//get all the medical doctors in the list
	if ($selectedMedicalDoctorList = $mysqli->query("select medical_doctor_id, medical_doctor_name from medical_doctor where medical_doctor_id>3")) //3 is SUMMARY
	{
		//added by Mike, 20210914
		$iMedicalDoctorDecodedJSONFileCount=0;
		
		foreach ($selectedMedicalDoctorList as $listValue) {
			//added by Mike, 20200713
			$responses = [];
			
			//edited by Mike, 20250520
			//if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='".$listValue['medical_doctor_id']."' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' group by patient_id"))
			if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='".$listValue['medical_doctor_id']."' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' and transaction_quantity!=0 order by transaction_id ASC"))
			{
/* //removed by Mike, 20210915						
				echo "--<br />";
*/
				if ($selectedMedicalDoctorResultArray->num_rows > 0) {
/* //removed by Mike, 20210915							
					//added by Mike, 20200524
					if ($selectedMedicalDoctorResultArray->num_rows == 1) {
						echo strtoupper($listValue['medical_doctor_name'])."'s transaction for the day.<br /><br />";
					}
					else {
						echo strtoupper($listValue['medical_doctor_name'])."'s transactions for the day.<br /><br />";
					}
*/
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
		//				if (strpos($value['item_name'], "*") === false) {
						//removed by Mike, 20200712
/*	
						if ($value['fee'] !== "0.00") {
*/					
							//edited by Mike, 20200530

							$iFeeTotalCount = $iFeeTotalCount + $value['fee'];
							$iQuantityTotalCount = $iQuantityTotalCount + 1; //$value['fee_quantity'];

							if (strpos($value['notes'],"PRIVATE")!==false) {
								//edited by Mike, 20201026
								//$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
								
								$myNetFeeValue=$value['fee'];
								
								//added by Mike, 20200531
								$iPrivateQuantityTotalCount = $iPrivateQuantityTotalCount + 1;
								
								//TO-DO: -reverify: if +DEXA
							}
							//added by Mike, 20201026
							else {
								//TO-DO: -reverify: this
								//edited by Mike, 20200910
								//$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee']*0.70;
								$myNetFeeValue = $value['fee']*0.70;
							}								

							if (strpos($listValue['medical_doctor_name'],"HONESTO")!==false) {
//										echo $value['notes'];
//										echo $value['transaction_id'];
								//TO-DO: -update: this
								//$transactionId = $value['transaction_id'] + 1;
								//edited by Mike, 20201127
								$iTransactionId = $value['transaction_id'] + 1;
								
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
									
				//identify transaction with the combined fees
				//					while ($transactionId==0) {
									do {
//										echo "iTransactionId: ".$iTransactionId;
										
										if ($rowTransactionQuantityArray = $mysqli->query("select transaction_quantity from transaction where transaction_id='".$iTransactionId."'")) {
											if ($rowTransactionQuantityArray->num_rows > 0) {												
												$iTransactionId = $iTransactionId + 1;

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
												
												/*if ($iTransactionId>=$iTransactionIdMax) {
												}*//* //removed by Mike, 20201211
												else {
													$iTransactionId = $iTransactionId -1;
												}*/
												
//												echo "iTransactionQuantity: ".$iTransactionQuantity;
											}
											//added by Mike, 20201217
											else {
												break;
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
								
								//added by Mike, 20201216
								$iTransactionId = $iTransactionId -1;

								//edited by Mike, 20201127
								//if ($receiptArray = $mysqli->query("select receipt_type_id, receipt_number from receipt where transaction_id='".$transactionId."'")) {
//									echo $iTransactionId;
								if ($receiptArray = $mysqli->query("select receipt_type_id, receipt_number from receipt where transaction_id='".$iTransactionId."'")) {
									$receiptArrayRowValue = mysqli_fetch_assoc($receiptArray);

//									echo "dito".$receiptArrayRowValue['receipt_number'];

									if($receiptArrayRowValue) {
										if ($receiptArrayRowValue['receipt_number']!=0) {
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

							$iNetFeeTotalCount = $iNetFeeTotalCount + $myNetFeeValue;										
							

								if (strpos($value['notes'],"NC")!==false) {
									$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
								}
								else if (strpos($value['notes'],"NO CHARGE")!==false) {
									$iNoChargeQuantityTotalCount = $iNoChargeQuantityTotalCount + 1;
								}

							//TO-DO: -reverify: this
							if (strpos($value['notes'],"DEXA")!==false) {
								$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
								
								//added by Mike, 20200531
								$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
							}
							
							if (strpos($value['notes'],"MINORSET")!==false) {
								$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;						
							}
							
/*
						}					
*/						
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
					
/*	//removed by Mike, 20210914									
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
*/					
					//note: DR. CHASTITY starts count
//					$iMedicalDoctorDecodedJSONFileCount=0;
					
					if (strpos($listValue['medical_doctor_name'],"CHASTITY")!==false) {
						$iMedicalDoctorDecodedJSONFileCount=7;			
					}
					else {
						//edited by Mike, 20210915
//						$iMedicalDoctorDecodedJSONFileCount++;			
						$iMedicalDoctorDecodedJSONFileCount=$listValue['medical_doctor_id']+4;			

					}
/*					
					echo "listValue: ".$listValue['medical_doctor_id']."<br/>";
					
					echo "iMedicalDoctorDecodedJSONFileCount: ".$iMedicalDoctorDecodedJSONFileCount."<br/>";
*/					
					$decodedJSONFile = json_decode($outputReportMedicalDoctor);					
					$decodedJSONFileArray[$iMedicalDoctorDecodedJSONFileCount][1] = $decodedJSONFile[0];
	
//removed by Mike, 20210915				
//					echo $decodedJSONFileArray[$iMedicalDoctorDecodedJSONFileCount][1]->iFeeTotalCount;
				}
				else {
/* //removed by Mike, 20210915							
					echo "There are no ".strtoupper($listValue['medical_doctor_name'])." transactions for the day.";
*/
				}
			}		
			// show an error if there is an issue with the database query
			else
			{
					echo "Error: " . $mysqli->error;
			}

/* //removed by Mike, 20210915					
			//added by Mike, 20200615
			echo "<br/>";
*/			
		}
	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																


	//removed by Mike, 20200708
	//added by Mike, 20200524
	//echo "<br/>";

	//added by Mike, 20200524
	$responses = [];
	
	//medical doctor; SYSON, PETER
	//edited by Mike, 20250520
	//if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='2' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' group by patient_id"))
	if ($selectedMedicalDoctorResultArray = $mysqli->query("select fee, notes, transaction_id from transaction where transaction_date='".$sDateTodayTransactionFormat."' and medical_doctor_id='2' and notes!='IN-QUEUE; PAID' and ip_address_id!='' and machine_address_id!='' and notes NOT Like '%ONLY%' and transaction_quantity!=0"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/		

		if ($selectedMedicalDoctorResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedMedicalDoctorResultArray->num_rows == 1) {
				echo "SYSON, PETER's transaction for the day.<br /><br />";
			}
			else {
				echo "SYSON, PETER's transactions for the day.<br /><br />";
			}
*/			

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
							$iNetFeeTotalCount = $iNetFeeTotalCount + ($value['fee']-500)*0.70 + 500;
							
							//added by Mike, 20200531
							$iDexaQuantityTotalCount = $iDexaQuantityTotalCount + 1;
						}
						else {
							$iNetFeeTotalCount = $iNetFeeTotalCount + $value['fee'];
						}
					}
					else {
						//edited by Mike, 20200829
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
										
					if (strpos($value['notes'],"MINORSET")!==false) {
						$iMinorsetQuantityTotalCount = $iMinorsetQuantityTotalCount + 1;						
					}					
/*				}	
*/				
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

/*	//removed by Mike, 20210914														
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
*/			
			$decodedJSONFile = json_decode($outputReportMedicalDoctor);					
			$decodedJSONFileArray[13][1] = $decodedJSONFile[0];

//removed by Mike, 20210915						
//			echo $decodedJSONFileArray[$iMedicalDoctorDecodedJSONFileCount][1]->iFeeTotalCount;

		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no SYSON, PETER transactions for the day.";
*/
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

/* //removed by Mike, 20210915		
	//added by Mike, 20200522
	echo "<br/>";
*/	

	//added by Mike, 20200522
	$responses = [];
	
	//medicine asterisk, i.e. Glucosamine Sulphate and Calcium with Vitamin D
	if ($selectedMedicineAsteriskResultArray = $mysqli->query("select t1.item_name, t2.fee, t2.fee_quantity from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=1 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID%' and t2.transaction_quantity='0'"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/		

		if ($selectedMedicineAsteriskResultArray->num_rows > 0) {
/* //removed by Mike, 20210915			
			//added by Mike, 20200524
			if ($selectedMedicineResultArray->num_rows == 1) {
				echo "Medicine (Asterisk), i.e. Glucosamine Sulphate and Calcium with Vitamin D, transaction for the day.<br /><br />";
			}
			else {
				echo "Medicine (Asterisk), i.e. Glucosamine Sulphate and Calcium with Vitamin D, transactions for the day.<br /><br />";
			}
*/			

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
			
/* //removed by Mike, 20210914							
			echo $outputReportMedicineAsterisk;
							
//				$outputReportMedicine = "FEE:".$iFeeTotalCount."; "."QTY:".$iQuantityTotalCount;
			
			//removed by Mike, 20200902
			//$sDateToday = date("Y-m-d");
			//update the file location accordingly
			//edited by Mike, 20200524
			//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\medicineAsterisk".$sDateToday.".txt";
			$file = $fileBasePath."medicineAsterisk".$sDateToday.".txt";
			file_put_contents($file, $outputReportMedicineAsterisk, LOCK_EX);
*/			
			$decodedJSONFile = json_decode($outputReportMedicineAsterisk);					
			$decodedJSONFileArray[14][1] = $decodedJSONFile[0];

//removed by Mike, 20210915						
//			echo $decodedJSONFileArray[14][1]->iFeeTotalCount;
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no Medicine item (Asterisk), i.e. Glucosamine Sulphate and Calcium with Vitamin D,  transactions for the day.";
*/
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

/* //removed by Mike, 20210915			
	//added by Mike, 20200708
	echo "<br/>";
*/	

	//added by Mike, 20200709	
	$responses = [];

	if ($selectedNonMedicineResultArray = $mysqli->query("select t1.item_name, t2.transaction_id, t2.fee, t2.fee_quantity, t2.notes from item as t1 left join transaction as t2 on t1.item_id = t2.item_id where t1.item_type_id=2 and t1.item_id!=0 and t2.transaction_date='".$sDateTodayTransactionFormat."' and t2.notes like '%PAID' and t2.transaction_quantity='0'"))
	{
/* //removed by Mike, 20210915				
		//added by Mike, 20200524
		echo "--<br />";
*/		

		if ($selectedNonMedicineResultArray->num_rows > 0) {
/* //removed by Mike, 20210915					
			//added by Mike, 20200524
			if ($selectedNonMedicineResultArray->num_rows == 1) {
				echo "VAT for Non-medicine transaction for the day.<br /><br />";
			}
			else {
				echo "VAT for Non-medicine transactions for the day.<br /><br />";
			}
*/			

//						$row = $selectedResult->fetch_array();
			//count total
			$iFeeTotalCount = 0;				
			$iQuantityTotalCount = 0;

			foreach ($selectedNonMedicineResultArray as $value) {
/*				//edited by Mike, 20250923; from 20201120
				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."'"))
				{
*/
				if ($selectedNonMedicineTransactionReceiptResultArray = $mysqli->query("select t1.receipt_number, t1.receipt_type_id from receipt as t1 left join transaction as t2 on t1.transaction_id = t2.transaction_id where t2.transaction_id='".$value['transaction_id']."'"))
				{
/*					
					echo $value['item_name']."<br/>";
					echo "dito".$value['transaction_id']."<br/>";
*/
					$row = $selectedNonMedicineTransactionReceiptResultArray->fetch_assoc();
/*					
					echo ">>>>".$row['receipt_type_id']."<br/>";
					echo ">>>>".$row['receipt_number']."<br/>";
					echo ">>>>".$selectedNonMedicineTransactionReceiptResultArray->num_rows."<br/>";
*/					

					//edited by Mike, 20250924; from 20250923
					//if ($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) {						
					if (($selectedNonMedicineTransactionReceiptResultArray->num_rows > 0) and ($row['receipt_number']!=="0") and ($row['receipt_type_id']==="2")){
						
						//echo ">>>>DITO!";
						
						//edited by Mike, 20201223
						if (strpos($value['notes'],"DISCOUNTED")!==false) {
						}
						else if ((strpos($value['notes'],"SC")!==false) or (strpos($value['notes'],"PWD")!==false)) {
						}
						else {
							$iFeeTotalCount = $iFeeTotalCount + ($value['fee'] - ($value['fee']/(1 + 0.12)));
							$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];

/*	//removed by Mike, 20210104
						echo $value['item_name'];
						echo "dito".$value['transaction_id']."<br/>";
*/
							//Note: fee_quantity can be 6, albeit in cash register, it is 1
							//This is due to several non-med items are combined into 1 transaction in Cash Register
							//TO-DO: -update: this
	//echo "fee_quantity: ".$value['fee_quantity'];

							//added by Mike, 20200812
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
							
	/*						//removed by Mike, 20200708
							$iFeeTotalCount = $iFeeTotalCount + ($value['fee']/(1 + 0.12));
							$iQuantityTotalCount = $iQuantityTotalCount + $value['fee_quantity'];
*/
						}
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

/* //removed by Mike, 20210914							
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
*/			
			$decodedJSONFile = json_decode($outputReportVATForNonMedicine);					
			$decodedJSONFileArray[15][1] = $decodedJSONFile[0];
	
//removed by Mike, 20210915				
//			echo $decodedJSONFileArray[15][1]->iFeeTotalCount;
		}
		else {
/* //removed by Mike, 20210915					
			echo "There are no VAT for Non-medicine item transactions for the day.";
*/
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

/* //removed by Mike, 20210915		
	//added by Mike, 20200819
	//Minorset
	echo "<br />";
*/	

	$responses = [];

/* //removed by Mike, 20210915		
	//added by Mike, 20200524
	echo "--<br />";
*/

	//edited by Mike, 20200825
	if ($iMinorsetQuantityTotalCount == 0) {
/* //removed by Mike, 20210915		
		echo "There are no Minorset transactions for the day.<br /><br />";
*/
	}
	else {
/* //removed by Mike, 20210915				
		if ($iMinorsetQuantityTotalCount == 1) {
			echo "Minorset transaction for the day.<br /><br />";
		}
		else {
			echo "Minorset transactions for the day.<br /><br />";
		}
*/		
		$iMinorsetFeeTotalCount = $iMinorsetQuantityTotalCount*500;
		//write as .txt file
		$jsonResponse = array(
				"iFeeTotalCount" => $iMinorsetFeeTotalCount,
				"iQuantityTotalCount" => $iMinorsetQuantityTotalCount,
				"iNetFeeTotalCount" => $iMinorsetFeeTotalCount
		);
		$responses[] = $jsonResponse;
		
		$outputReportMinorset = json_encode($responses);
		
/*	//removed by Mike, 20210914		
		echo $outputReportMinorset;
		//removed by Mike, 20200902
		//$sDateToday = date("Y-m-d");
		//update the file location accordingly
		//edited by Mike, 20200524
		//note: \\nonMedicine due to \n is new line
		//$file = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\nonMedicine".$sDateToday.".txt";
		$file = $fileBasePath."Minorset".$sDateToday.".txt";
		file_put_contents($file, $outputReportMinorset, LOCK_EX);				
*/
		$decodedJSONFile = json_decode($outputReportMinorset);					
		//edited by Mike, 20210916
		$decodedJSONFileArray[6][1] = $decodedJSONFile[0];

//removed by Mike, 20210915					
//		echo $decodedJSONFileArray[16][1]->iFeeTotalCount;	
	}
	//echo $outputReportMinorset;
	
	//close database connection
	$mysqli->close();


//------------------------------------------------
	
	//added by Mike, 20201021
	$pfTotal = 0;
	
//	$decodedJSONFileArray[0]
	
//edited by Mike, 20201018
//file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				
//$output = file_get_contents($file);
//echo $output;
/*
	if (file_exists($file)) {
		$inputJSONFile = file_get_contents($file);
		echo $inputJSONFile;
		
		$decodedJSONFile = json_decode($inputJSONFile);
				
		foreach($decodedJSONFile as $key=>$value){
			//print_r($value);							
			echo $value->iFeeTotalCount;			
		}
	}
*/
	//TO-DO: -update: this
	$iDexaQuantityTotalCount=0;
	$iPrivateQuantityTotalCount=0;
	$iNoChargeQuantityTotalCount=0;
	
	$iCount=0;
	while ($iCount<$decodedJSONFileArrayMaxIndex) {

/*	//removed by Mike, 20210914
		//$file = $fileBasePath."SYSON,PEDRO".$sDateToday.".txt";
		$file = $fileBasePath.$decodedJSONFileArray[$iCount][0].$sDateToday.".txt";
		if (file_exists($file)) {
			$inputJSONFile = file_get_contents($file);
//			echo $inputJSONFile;
			
			//note: output is an array container with 1 value, i.e. JSON string 
			$decodedJSONFile = json_decode($inputJSONFile);		
//			echo $decodedJSONFile[0]->iFeeTotalCount;
			$decodedJSONFileArray[$iCount][1] = $decodedJSONFile[0];
//			echo $decodedJSONFileArray[$iCount][1]->iFeeTotalCount;
			//added by Mike, 20201019
			if (isset($decodedJSONFileArray[$iCount][1]->iDexaQuantityTotalCount)) {
				$iDexaQuantityTotalCount=$iDexaQuantityTotalCount+$decodedJSONFileArray[$iCount][1]->iDexaQuantityTotalCount;
			}
			if (isset($decodedJSONFileArray[$iCount][1]->iPrivateQuantityTotalCount)) {
				$iPrivateQuantityTotalCount=$iPrivateQuantityTotalCount+$decodedJSONFileArray[$iCount][1]->iPrivateQuantityTotalCount;
			}
			if (isset($decodedJSONFileArray[$iCount][1]->iNoChargeQuantityTotalCount)) {
				$iNoChargeQuantityTotalCount=$iNoChargeQuantityTotalCount+$decodedJSONFileArray[$iCount][1]->iNoChargeQuantityTotalCount;
			}			
		}
*/		
		$iCount++;
	}

/*
	$file = $fileBasePath."SYSON,PEDRO".$sDateToday.".txt";
	if (file_exists($file)) {
		$inputJSONFile = file_get_contents($file);
		echo $inputJSONFile;
		
		//note: output is an array container with 1 value, i.e. JSON string 
		$decodedJSONFileSysonPedro = json_decode($inputJSONFile);		
		echo $decodedJSONFileSysonPedro[0]->iFeeTotalCount;
		$decodedJSONFileArray[0] = $decodedJSONFileSysonPedro[0];
		echo $decodedJSONFileArray[0]->iFeeTotalCount;
	}
*/

	//TO-DO: -add: the rest
	//TO-DO: -add: count in left portion

//------------------------------------------------
	//removed by Mike, 20210915
//	echo "<br/>";
	echo "<table>";
				
	//TO-DO: -add: auto-identify and update date format to use YYYY-MM-DD
	
	echo '<tr class="row">';

	ini_set('auto_detect_line_endings', true);

	//echo ">>>>>> ".$filename;
	
	//added by Mike, 20200523
	if (!file_exists($filename)) {
		//add the day of the week
		//edited by Mike, 20200726
		//$sDateToday = (new DateTime())->format('Y-m-d, l');
		$sDateToday = Date('Y-m-d, l');

		echo $filename;

		echo "There are no transactions for the day, ".$sDateToday.".";
	}
	else {
		//Reference: https://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php;
		//answer by: thenetimp, 20120204T0730
		//edited by: thenetimp, 20170823T1704

		$iRowCount = -1; //we later add 1 to make start value zero (0)
		//if (($handle = fopen("test.csv", "r")) !== FALSE) {
		if (($handle = fopen($filename, "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data) -1; //we add -1 for the computer to not include the excess cell due to the ending \n
		//    echo "<p> $num fields in line $row: <br /></p>\n";
			$iRowCount++;
			for ($iColumnCount=0; $iColumnCount <= $num; $iColumnCount++) {
		//        echo $data[$c] . "<br />\n";
				//edited by Mike, 20200725
				//echo "<td class='column'>".utf8_encode($data[$iColumnCount])."</td>";
				
				//added by Mike, 20200726
				//$cellValue = $data[$iColumnCount];	
				$cellValue = utf8_encode($data[$iColumnCount]);
								
				//$cellValue = utf8_encode($cellValue);
				//$cellValue = mysql_real_escape_string($data[$iColumnCount]);
				
				//added by Mike, 20200811
				//$cellValue = str_replace("�","'",$cellValue); //$data[$iColumnCount]); //$cellValue);
	
				//$cellValue = htmlspecialchars($cellValue, ENT_QUOTES); // Converts double and single quotes

				//added by Mike, 20201018
				$iCount=0;
				while ($iCount<$decodedJSONFileArrayMaxIndex) {
/* //removed by Mike, 20210915
					//$file = $fileBasePath."SYSON,PEDRO".$sDateToday.".txt";
					$file = $fileBasePath.$decodedJSONFileArray[$iCount][0].$sDateToday.".txt";										
					if (file_exists($file)) {						
						$inputJSONFile = file_get_contents($file);
*/
					//added by Mike, 20210915
					if (isset($decodedJSONFileArray[$iCount][1])) {
//						echo "iCount: ".$iCount."<br/>";
						
						//PF Column
						if (($iRowCount==(2+$iCount)) and ($iColumnCount==2)) {
							$cellValue = $decodedJSONFileArray[$iCount][1]->iFeeTotalCount;
							
							//added by Mike, 20201021
							$pfTotal=$pfTotal+$cellValue;
						}
						//Count Column
						else if (($iRowCount==(2+$iCount)) and ($iColumnCount==3)) {
							$cellValue = $decodedJSONFileArray[$iCount][1]->iQuantityTotalCount;
						}
						//MSOC NET PF Column
						else if (($iRowCount==(2+$iCount)) and ($iColumnCount==4)) {
							$cellValue = $decodedJSONFileArray[$iCount][1]->iNetFeeTotalCount;
						}
					}

					$iCount++;
				}

				if (isset($decodedJSONFileArray[1][0])) { //X-RAY
					//PF Column
					if (($iRowCount==12) and ($iColumnCount==0)) {
						//edited by Mike, 20210915
						if (isset($decodedJSONFileArray[1][1])) {
							$cellValue = $decodedJSONFileArray[1][1]->iQuantityTotalCount;
						}
					}
				}

				if (isset($decodedJSONFileArray[4][0])) { //LAB
					//PF Column
					if (($iRowCount==14) and ($iColumnCount==0)) {
						//edited by Mike, 20210915
						if (isset($decodedJSONFileArray[4][1])) {
							$cellValue = $decodedJSONFileArray[4][1]->iQuantityTotalCount;
						}
					}
				}

/* //removed by Mike, 20210915; TO-DO: -add: this
				//NC/NO CHARGE/GRATIS COUNT
				if (($iRowCount==14) and ($iColumnCount==2)) {
					$cellValue = $iNoChargeQuantityTotalCount;
				}
				//DEXA COUNT
				if (($iRowCount==15) and ($iColumnCount==0)) {
					$cellValue = $iDexaQuantityTotalCount;
				}
				//PRIVATE COUNT
				if (($iRowCount==16) and ($iColumnCount==0)) {
					$cellValue = $iPrivateQuantityTotalCount;
				}
*/				
				//added by Mike, 20210915
				if (($iRowCount==18) and ($iColumnCount==2)) {
					$cellValue = $pfTotal;
				}
				
				
/*				
				if (isset($decodedJSONFileSysonPedro)) {
					//PF Column
					if (($iRowCount==2) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileSysonPedro[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==2) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileSysonPedro[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==2) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileSysonPedro[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileSysonPeter)) {
					//PF Column
					if (($iRowCount==15) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileSysonPeter[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==15) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileSysonPeter[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==15) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileSysonPeter[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileRejusoChastity)) {
					//PF Column
					if (($iRowCount==9) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileRejusoChastity[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==9) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileRejusoChastity[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==9) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileRejusoChastity[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileXRay)) {
					//PF Column
					if (($iRowCount==3) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileXRay[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==3) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileXRay[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==3) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileXRay[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileMedicine)) {
					//PF Column
					if (($iRowCount==4) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileMedicine[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==4) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileMedicine[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==4) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileMedicine[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileNonMedicine)) {
					//PF Column
					if (($iRowCount==5) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileNonMedicine[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==5) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileNonMedicine[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==5) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileNonMedicine[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileLab)) {
					//PF Column
					if (($iRowCount==6) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileLab[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==6) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileLab[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==6) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileLab[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileSSS)) {
					//PF Column
					if (($iRowCount==7) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileSSS[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==7) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileSSS[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==7) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileSSS[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileMinor)) {
					//PF Column
					if (($iRowCount==7) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileMinor[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==7) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileMinor[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==7) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileMinor[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFilePhotocopy)) {
					//PF Column
					if (($iRowCount==8) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFilePhotocopy[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==8) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFilePhotocopy[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==8) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFilePhotocopy[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileGlucosamine)) {
					//PF Column
					if (($iRowCount==9) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileGlucosamine[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==9) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileGlucosamine[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==9) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileGlucosamine[0]->iNetFeeTotalCount;
					}
				}
				if (isset($decodedJSONFileVAT)) {
					//PF Column
					if (($iRowCount==10) and ($iColumnCount==6)) {
						$cellValue = $decodedJSONFileVAT[0]->iFeeTotalCount;
					}
					//Count Column
					else if (($iRowCount==10) and ($iColumnCount==7)) {
						$cellValue = $decodedJSONFileVAT[0]->iQuantityTotalCount;
					}
					//MSOC NET PF Column
					else if (($iRowCount==10) and ($iColumnCount==8)) {
						$cellValue = $decodedJSONFileVAT[0]->iNetFeeTotalCount;
					}
				}
*/				
				//TO-DO: -add: the rest
				//TO-DO: -update: to use array container and index

				//added by Mike, 20210914
				if ($iRowCount==0) {
					//PETSA
					if ($iColumnCount==0) {
						$cellValue=$sDateToday;
						echo "<td class='column'><b>PETSA</b></td>";
						echo "<td class='column'>".$cellValue."</td>";
						echo "<td class='column'>".Date('l')."</td>";
					}
				}
				else if (($iRowCount==1)) {// and ($iColumnCount==0)) {
					//edited by Mike, 20200807
//					if (($iColumnCount!=4) and ($iColumnCount!=5) and ($iColumnCount!=9)) {
					//edited by Mike, 20210914
//					if (($iColumnCount!=1) and ($iColumnCount!=5) and ($iColumnCount<9)) {
					if (($iColumnCount>=2) and ($iColumnCount<=4)) {

//						echo $cellValue;
						if (strpos($cellValue,"NET PF")!==false) {
							$cellValue = "MOSC<br/>NET PF";
						}

						//background color green
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
					}
					else {
						echo "<td class='column'>".$cellValue."</td>";
					}
				}
				//edited by Mike, 20210914
				//"CASH REGISTER RECEIPT" cells; text
				else if (($iRowCount>=2) and ($iRowCount<=18) and ($iColumnCount>=1) and ($iColumnCount<=1)) {					
					echo "<td class='column' style='text-align:left'><b>".$cellValue."</b></td>";
				}
				else {
					//echo "<td class='column'>".utf8_encode($data[$iColumnCount])."</td>";
					//edited by Mike, 20200726
//					$cellValue = utf8_encode($data[$iColumnCount]);
					if (is_numeric($cellValue)) {
						//added by Mike, 20200812; edited by Mike, 20210914
//						if ($iColumnCount==7) { //COUNT
						if ($iColumnCount==0) { //COUNT
							//integer value
							//added by Mike, 20210914
							$cellValue=($iRowCount-1);
						}
						//added by Mike, 20210914
						else if ($iColumnCount==3) { //COUNT
						}
						//added by Mike, 20200813						
						else if ((strpos(utf8_encode($data[$iColumnCount+1]),"#")!==false)) {
							//integer value
						}						
						else {
							//add two digits after the decimal point
							//Reference: https://www.php.net/number_format;
							//last accessed: 20200812
							//input: 60
							//output: 60.00
							//Note: Rounding Rules
							//input: 60.00000000000006
							//output: 60.00
							//input: 60.005
							//output: 60.01
							//input: 60.004
							//output: 60.00
							$cellValue = number_format($cellValue, 2, '.', '');
						}																					
/* //removed by Mike, 20210914
						//edited by Mike, 20200726
						//echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
						if (($iRowCount==2) and ($iColumnCount==3)) { //ACTUAL TOTAL
							echo "<td class='columnBorderBottom' style='text-align:right'>".$cellValue."</td>";
						}
						else if (($iRowCount==2) and ($iColumnCount<3)) { //ACTUAL TOTAL number value row
							echo "<td class='columnBorderBottomDotted' style='text-align:right'>".$cellValue."</td>";
						}						
						else if (($iColumnCount+1<count($data)) and ((utf8_encode($data[$iColumnCount+1]))=="TOTAL")) {
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
						}						
						//CASH REGISTER TOTAL
						else if (($iColumnCount-1>=0) and ((utf8_encode($data[$iColumnCount-1]))=="TOTAL")) {
								//edited by Mike, 20201021
								//echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$pfTotal."</td>";
						}
						else if (($iColumnCount-1>=0) and ((utf8_encode($data[$iColumnCount-1]))=="GRAND TOTAL")) {
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
						}
						else {							 
							echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
						}
*/						
						echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
					}
					else {
						//echo "<td class='column'><b>".$cellValue."</b></td>";

						//added by Mike, 20200726
						if ($cellValue=="PREV TOTAL") {
							//background color green
							echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
						}
						else if ($cellValue=="GRAND TOTAL") {
							//background color yellow
							echo "<td class='column' bgcolor='#FFFF00'><b>".$cellValue."</b></td>";
						}
						else {
							echo "<td class='column'><b>".$cellValue."</b></td>";
						}						
					}															
				}
			}
			echo '</tr><tr class="row">';
		  }
		  echo '</tr>';
		  
		  fclose($handle);
		}
	}

?>
	</table>
	<br />
	<div>***NOTHING FOLLOWS***</div>
	<br />
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>