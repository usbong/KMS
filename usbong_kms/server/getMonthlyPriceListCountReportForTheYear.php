<?php
/*
  Copyright 2020~2021 Usbong Social Systems, Inc.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  @author: Michael Syson
  @date created: 20200521
  @date updated: 20210609
  
  Input:
  1) Item details and sales reports for the year in the database (DB)

  Output:
  1) Automatically connect to the DB and get the item details and sales reports for the day from the DB
  --> Afterwards, write the reports as .txt text in the computer server's set location


//TO-DO: -add: use auto-generated output file as input in JAVA add-on software; 
//output: HTML Report file with answers

//TO-DO: -update: this
  
  Note:
  1) Command: getMonthlyPriceListCountReportForTheYear.php
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

	//added by Mike, 20200524
//	$fileBasePath = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\";
	$fileBasePath = "G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\\";
	
	//added by Mike, 20210323
	//With Linux Machine, if $fileBasePath does not exist, Computer writes in the same folder where getSalesReportsForTheDay.php is located
	//the file name includes the value of $fileBasePath

	//added by Mike, 20200902
	//$sDateToday = date("Y-m-d");
//	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")."-1 Day"));
//	$sDateTodayTransactionFormat = date("m/d/Y", strtotime(date("Y-m-d")."-1 Day"));
	$sDateToday = date("Y-m-d", strtotime(date("Y-m-d")));
	$sDateTodayTransactionFormat = date("m/d/Y", strtotime(date("Y-m-d")));
	
	//added by Mike, 20200524
	$responses = [];

	//added by Mike, 20200819
	$iMinorsetQuantityTotalCount = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <style type="text/css">
	/**/
	                    body
                        {
							margin-top: 0px;

							font-family: Arial;
							font-size: 11pt;

							/* 1128 makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							/* Legal Size; Landscape */							
							/* 900 makes the width of the output page fit in a 90% zoom scale */ 
							/* 1024 makes the width of the output page fit in a legal-sized paper set using A4 size and shrinked to fit*/ 
							width: 1024px; /*900px;*/ /*1128*/ /*1024px;*/ /*802px;*/ /* 670px */
                        }
						
						div.checkBox
						{
								border: 1.5pt solid black; height: 9pt; width: 9pt;
								text-align: center;
								float: left
						}
						
						div.option
						{
								padding: 2pt;
								display: inline-block;
						}
						
						div.copyright
						{
								text-align: center;
						}
						
						table.statistics
						{
							/*outline: thin solid;
							text-align: right*/
						}
						
						tr.tableHeaderRow
						{
							font-weight: bold;
							text-align: center							
						}

						tr.rowEvenNumber {
							background-color: #dddddd; <!--#dddddd; = gray #95b3d7; = sky blue; use as row background color-->
							border: 1pt solid #00ff00;		
						}


						td.tableHeaderColumn
						{
							border: 1pt solid black;							
							text-align: center;
							font-weight: bold;							
							<!--we put this at the bottom; otherwise, the computer browser does not apply the rest of the settings.-->
							/*background-color: #00ff00;*/ <!--#00ff00; = green; #93d151; = lime green-->
						}
						
						td.countValue
						{
							background-color: #ffdd00; <!--#93d151; lime green-->
						}
						
						td.column
						{
							border: 1px dotted #ab9c7d;
							text-align: center;
						}						

						td.columnName
						{
							border: 1px dotted #ab9c7d;
							text-align: left;
						}						

						td.columnFee
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
						}												
		
						div.year
						{
							width: 100%;
							text-align: center
						}


    /**/
    </style>
    <title>
      MARIKINA ORTHOPEDIC SPECIALTY CLINIC (MOSC) HQ
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
  <body>
	<h3>
      MARIKINA ORTHOPEDIC SPECIALTY CLINIC (MOSC) HQ
	<br />
	<br />
	MONTHLY PRICE LIST COUNT: MEDICINE ITEM
	<br />
	<!-- FILE TYPE  -->
	</h3>
	<br />
	<!-- This portion of the page is divided into 24 columns -->
	<div>
		<!-- Table Values -->
		<table width="100%" class="statistics">
					
		  <!-- Table Header Row -->		  
		  <tr class="tableHeaderRow">
			<td class ="tableHeaderColumn">				
		  		#
		  	</td>
			<td class ="tableHeaderColumn">				
		  		ID#
		  	</td>
			<td class ="tableHeaderColumn">				
		  		ITEM NAME
		  	</td>
			<td class ="tableHeaderColumn">				
		  		MERC<br/>PRICE
		  	</td>
			<td class ="tableHeaderColumn">				
		  		SELL<br/>PRICE
		  	</td>
			<td class ="tableHeaderColumn">				
		  		DISC<br/>COST
		  	</td>
			<td class ="tableHeaderColumn">				
		  		COST
		  	</td>
			<td class ="tableHeaderColumn">				
		  		JAN
		  	</td>
			<td class ="tableHeaderColumn">				
		  		FEB
		  	</td>
			<td class ="tableHeaderColumn">				
		  		MAR
		  	</td>
			<td class ="tableHeaderColumn">				
		  		APR
		  	</td>
			<td class ="tableHeaderColumn">				
		  		MAY
		  	</td>
			<td class ="tableHeaderColumn">				
		  		JUN
		  	</td>
			<td class ="tableHeaderColumn">				
		  		JUL
		  	</td>
			<td class ="tableHeaderColumn">				
		  		AUG
		  	</td>
			<td class ="tableHeaderColumn">				
		  		SEP
		  	</td>
			<td class ="tableHeaderColumn">				
		  		OCT
		  	</td>
			<td class ="tableHeaderColumn">				
		  		NOV
		  	</td>
			<td class ="tableHeaderColumn">				
		  		DEC
		  	</td>
		  </tr>		
		
		  <!-- ANSWERS Row -->		  		  
<?php		  
	if ($selectedMedItemPriceListResultArray = $mysqli->query("select item_id, item_name, item_price, item_total_sold from item where item_type_id='1'"))	
	{
		if ($selectedMedItemPriceListResultArray->num_rows > 0) {			
			$iCount=1;

			foreach ($selectedMedItemPriceListResultArray as $value) {
				
			   //added by Mike, 20210609
			   $iItemTotalSoldCountArray = array();
			   $sYear = date('Y'); //TO-DO: -add: auto-set if January

			   for ($iMonthCount=1; $iMonthCount<=12; $iMonthCount++) {
				 $sMonth="".$iMonthCount;
				 if ($iMonthCount<10) {
					 $sMonth="0".$sMonth;
				 }
				 //echo $sMonth;
				 //echo $sYear;
//				 echo $value['item_id'];
				 

//				 echo $value['item_name'];

				//TO-DO: -reverify: in Report_Model, getPurchasedItemTransactionsForTheDayUnifiedAll(...)
				
				 //note: transaction_date format: date('m/d/Y')
				 if ($iItemTotalSoldForTheMonthResultArray = $mysqli->query("select  transaction_id, fee_quantity from transaction where item_id='".$value['item_id']."' and transaction_date>='".$sMonth."/01/".$sYear."' and transaction_date<='".$sMonth."/31/".$sYear."'")) {

//					if ($iItemTotalSoldForTheMonthResultArray->num_rows > 0) {			
					 
//					 echo $iItemTotalSoldForTheMonthResultArray->transaction_id;
//					 echo $iItemTotalSoldForTheMonthResultArray->num_rows;

					 $iItemTotalSoldCount=0;
					 
					 foreach ($iItemTotalSoldForTheMonthResultArray as $itemInTransactionValue) {
						$iItemTotalSoldCount+=$itemInTransactionValue['fee_quantity'];
					 }
					
					  //echo $value['item_name']. ": ".$sMonth.": ".$iItemTotalSoldCount."<br/>";

					  array_push($iItemTotalSoldCountArray,$iItemTotalSoldCount);
//					}
				 }			 
//				 echo "<br/>";
			   }
				
				
				
			   //added by Mike, 20200426
			   if ($iCount % 2 == 0) { //even number
				 echo '<tr class="rowEvenNumber">';
			   }
			   else {
				 echo '<tr class="row">';
			   }				   
				
				
//				if (strpos($value['item_name'], "*") === false) {
				//removed by Mike, 20200711
/*				if ($value['fee'] !== "0.00") {
*/	
					//column 1: #
					echo '<td class ="column">';
					echo $iCount;
					echo "</td>";

					//column 2: ID#
					echo '<td class ="column">';
					echo $value['item_id'];
					echo "</td>";

					//column 3: ITEM NAME
					echo '<td class ="columnName">';
					echo $value['item_name'];
					echo "</td>";

					//column 4: MERC PRICE
					echo '<td class ="columnFee">';
//					echo $value['item_name'];
					echo "</td>";

					//column 5: SELL PRICE
					echo '<td class ="columnFee">';
					echo $value['item_price'];
					echo "</td>";

					//column 6: DISC COST
					echo '<td class ="columnFee">';
//					echo $value['item_price'];
					echo "</td>";

					//column 7: COST
					echo '<td class ="columnFee">';
//					echo $value['item_price'];
					echo "</td>";


					//column 8~19; JAN~DEC
					for ($iMonthCount=0;$iMonthCount<12; $iMonthCount++) {
						echo '<td class ="column">';
						echo $iItemTotalSoldCountArray[$iMonthCount];
						echo "</td>";						
					}
/*
					//column 8: JAN
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo $iItemTotalSoldCountArray[$iMonthCount];
					$iMonthCount++;
					echo "</td>";

					//column 9: FEB
					echo '<td class ="column">';
					echo $iItemTotalSoldCountArray[$iMonthCount];
					$iMonthCount++;
					echo "</td>";

					//column 10: MAR
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 11: APR
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 12: MAY
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 13: JUN
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 14: JUL
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 15: AUG
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 16: SEP
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 17: OCT
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 18: NOV
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";

					//column 19: DEC
					echo '<td class ="column">';
//					echo $value['item_price'];
					echo "</td>";
*/

//TO-DO: -add: total item sold
//TO-DO: -add: total item remaining in-stock
					
					$iCount=$iCount+1;
					
					
					//TO-DO: -add: total item sold for each month of the year
					
/*				}					
*/


				echo "</tr>";
			}

			//write as .txt file
/*
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
			$file = $fileBasePath."priceListCountReportMedItemV".$sDateToday.".txt";

			file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				
*/

		}
		else {
			echo "There are no MED ITEM transactions for the year.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																
?>		  
		  
		</table>		
	</div>	
	<br />
	<br />
	<div class="copyright">
		<!-- +added: instructions in add-on software to automatically replace PHP command to the present year -->
		<span>© Usbong Social Systems, Inc. 2011~<?php echo date('Y');?>. All rights reserved.</span>	
	</div>		 
  </body>
</html>


<?php	
/*
	if ($selectedMedItemPriceListResultArray = $mysqli->query("select item_id, item_name, item_price, item_total_sold from item where item_type_id='1'"))	
	

	//note:
////		if ($selectedXRayPriceListResultArray = $mysqli->query("select a.x_ray_body_location_name 'Body Location', b.x_ray_type_name 'Type', c.x_ray_price 'Price' from x_ray_body_location a, x_ray_type b, x_ray_service c where c.x_ray_body_location_id = a.x_ray_body_location_id and c.x_ray_type_id = b.x_ray_type_id and c.added_datetime_stamp = (select max(c2.added_datetime_stamp) from x_ray_service as c2 where c.x_ray_body_location_id=c2.x_ray_body_location_id and c.x_ray_type_id=c2.x_ray_type_id)"))	
			
	{
		//added by Mike, 20200524
		echo "--<br />";

		if ($selectedMedItemPriceListResultArray->num_rows > 0) {
			
			
////			//added by Mike, 20200524
////			if ($selectedMedicalDoctorResultArray->num_rows == 1) {
////				echo "SYSON, PEDRO's transaction for the day.<br /><br />";
////			}
////			else {
////				echo "SYSON, PEDRO's transactions for the day.<br /><br />";
////			}

			$iCount=1;

			foreach ($selectedMedItemPriceListResultArray as $value) {
//				if (strpos($value['item_name'], "*") === false) {
				//removed by Mike, 20200711
////				if ($value['fee'] !== "0.00") {
	
					echo $iCount.": ".$value['item_name']."<br/>";
					
					$iCount=$iCount+1;
					
					
					//TO-DO: -add: total item sold for each month of the year
					
////				}					

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
			$file = $fileBasePath."priceListCountReportMedItemV".$sDateToday.".txt";

			file_put_contents($file, $outputReportMedicalDoctor, LOCK_EX);				


		}
		else {
			echo "There are no MED ITEM transactions for the year.";
		}
	}		
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																

	echo "<br/>";

	$responses = [];
	
*/	
	
	//close database connection
	$mysqli->close();
?>
