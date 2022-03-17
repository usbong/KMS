<!--
  Copyright 2020~2022 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  
  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200818
  @date updated: 20220317; from 20211201
  @website address: http://www.usbong.ph  
-->
<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
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

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							/* Legal Size; Landscape*/							

							width: 670px;/*860px;*//* 802px;*//* 670px */

							/* removed by Mike, 20210105 */
							/* use zoom 67% scale*/
							/* at present, command not support in Mozilla Firefox */				
/*							zoom: 67%; 
	
							transform: scale(0.67);
							transform-origin: 0 0;	
*/							
                        }
						
						div.copyright
						{
							text-align: center;
						}
						
						div.formTitle
						{
							text-align: center;
/*							font-weight: bold;*/	
							font-size: 14pt;
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
						
						select.cashierNameSelect {
							font-size: 12pt;
						}
						
						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.tablePart1
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.tablePart2
						{
							width: 100%;
							
<!--							border: 1px solid #ab9c7d;		
-->
							border: 1px solid rgb(255,255,255);
							border-collapse: collapse;							 
						}						

						table.tablePart3
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						tr.rowEvenNumber {
							background-color: #dddddd; <!--#dddddd; = gray #95b3d7; = sky blue; use as row background color-->
							border: 1pt solid #00ff00;		
						}

						td.tableHeaderColumnPart1
						{
							text-align: left;
/*							font-weight: bold;
*/
						}						

						td.tableHeaderColumnPart2
						{
							border: 1px solid #000000;		
							text-align: center;
/*							font-weight: bold;
*/
						}						

						td.tableHeaderColumnPart3dot1
						{
							text-align: left;
/*							font-weight: bold;
*/
							width: 70%;							
						}						

						td.tableHeaderColumnPart3dot2
						{
							text-align: left;
/*							font-weight: bold;
*/
							width: 30%;							
						}						


						td.column
						{
							border: 1px dotted #000000;		
							text-align: center;
						}						

						td.columnItemHeaderList
						{
							border: 1px dotted #000000;		
							text-align: left;
							font-weight: bold;
						}						

						td.columnFee
						{
							border: 1px dotted #000000;		
							text-align: right;
						}

						td.columnFeeTotal
						{
							border: 1px dotted #000000;		
							text-align: right;
							font-size: 14pt;
							font-weight: bold;
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

						button
						{
							padding: 0px;
							background-color: #ffffff;
							color: #000000;
							font-size: 19px;

							border: 0px solid;		
							border-radius: 4px;
						}
						
						button:hover {
							color: rgb(85,56,153);
						}						
    /**/
    </style>
    <title>
      Acknowledgment Form (MOSC)
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>	  
	  <script>
/*	  	//removed by Mike, 20210911; added as external .js file; 
		//src="<?php echo base_url('assets/js/halimbawaScript.js');?>"
		//added by Mike, 20210911
		function myPopupFunctionNoPaymentYet() {
			alert("No payment yet!");
		}
*/		
	  </script>
  <body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');
	
	//edited by Mike, 20200726
	//$dateToday = (new DateTime())->format('Y-m-d');
	
	//edited by Mike, 20210720
	//$dateToday = Date('Y-m-d');
//	$dateToday = $result[0]['transaction_date'];
//	$dateToday = $value['transaction_date'];
	
	//if no paid transaction
	//edited by Mike, 20220317
 	//severity notice with Linux machine: "Trying to access array offset on value of type bool"
//	if ($resultPaid[0]['transaction_date']=="") {
	if (!isset($resultPaid[0]) or ($resultPaid[0]['transaction_date']=="")) {
		$dateToday = date('Y-m-d');
	}
	else {
		$dateToday = date('Y-m-d',strtotime($resultPaid[0]['transaction_date']));
	}

	//TO-DO: -update: this
	
	$totalAmountFee=0;

?>
	<div class="formTitle">
		<b>MARIKINA ORTHOPEDIC SPECIALTY CLINIC</b><br/>
		<!-- edited by Mike, 20210901; 
			TO-DO: -update: this due to increased web address length-->
<?php //edited by Mike, 20210911	
		if (isset($resultPaid[0])) {
?>
			<!-- edited by Mike, 20210926 -->
			<a target='_blank' href='<?php echo site_url('browse/setOfficialReceiptTransactionServiceAndItemPurchase/'.$resultPaid[0]['medical_doctor_id'].'/'.$resultPaid[0]['patient_id'].'/'.$resultPaid[0]['transaction_id'].'/0'); ?>'>
				<b>ACKNOWLEDGMENT RECEIPT</b>
			</a>
			<b>[<a target='_blank' href='<?php echo site_url('browse/setOfficialReceiptTransactionServiceAndItemPurchase/'.$resultPaid[0]['medical_doctor_id'].'/'.$resultPaid[0]['patient_id'].'/'.$resultPaid[0]['transaction_id'].'/1'); ?>'>
				+
			</a>]</b>
<?php 	}
		else {
			//example: include external .js file
?>		
			<script type="text/javascript" src="<?php echo base_url('assets/js/halimbawaScript.js');?>">
			</script>
			<button onclick="myPopupFunctionNoPaymentYet()">
				<b><u>ACKNOWLEDGMENT RECEIPT</u></b>			
			</button>
<?php			
		}
?>
		
		
	</div>
	<br
	
	<!-- PART 1 -->	
	<table class="tablePart1">
		<tr>
			<td class="tableHeaderColumnPart1">
				<b>TO:</b>
			</td>
			<td>
<?php			
				//BERGSTEIN, AKI
				//edited by Mike, 20220317
//				echo $result[0]['patient_name'];
				echo str_replace("�","Ñ",$result[0]['patient_name']);
?>				
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td class="tableHeaderColumnPart1">
				<b>DATE:</b>
			</td>
			<td>
				<?php echo $dateToday; ?>				
			</td>			
		</tr>
		<tr>
			<td class="tableHeaderColumnPart1">
				<b>ADDRESS:</b>
			</td>
			<td>
<?php			
/* //edited by Mike, 20210803
				//STO. NIÑO, 1820, MARIKINA CITY
				echo $result[0]['location_address'];
				echo ", ".$result[0]['barangay_address'];
				echo ", ".$result[0]['postal_address'];
				echo ", ".$result[0]['province_city_ph_address'];				
*/				
/*	//edited by Mike, 20210809
				echo $result[0]['location_address'];				
				if (!empty($result[0]['barangay_address'])) {
					if (!empty($result[0]['location_address'])) {
						echo ", ";
					}
					echo $result[0]['barangay_address'];
				}
				else {
					echo " ";
				}
				if (!empty($result[0]['postal_address'])) {
					if (!empty($result[0]['barangay_address'])) {
						echo ", ";
					}
					echo $result[0]['postal_address'];					
				}								
				else {
					echo " ";
				}
				if (!empty($result[0]['province_city_ph_address'])) {
					if (!empty($result[0]['postal_address'])) {
						echo ", ";
					}
					echo $result[0]['province_city_ph_address'];					
				}
*/
				echo $result[0]['location_address'];				

				if (!empty($result[0]['location_address'])) {
					echo ", ";
				}
				echo $result[0]['barangay_address'];

				if (!empty($result[0]['barangay_address'])) {
					echo ", ";
				}
				echo $result[0]['postal_address'];					

				if (!empty($result[0]['postal_address'])) {
					echo ", ";
				}
				echo $result[0]['province_city_ph_address'];									
?>				
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td class="tableHeaderColumnPart1">
				<b>OSCA/PWD ID NO.:</b>
			</td>
			<td>
<?php		
				//edited by Mike, 20211027
/*
				//if (strpos($result[0]['location_address'],"")!==false) {
				if (empty($result[0]['pwd_senior_id'])) {
					echo "N/A";
				}
				else {
					echo $result[0]['pwd_senior_id'];
				}
*/
				if (strpos($result[0]['notes'],"SC;")!==false) {
/* //edited by Mike, 20211201
					echo "SC#";
					$bIsWithSCPWDCard=true;
*/

					$bIsWithSCPWDCard=true;

					if (empty($result[0]['pwd_senior_id'])) {
						echo "SC#";
					}
					else {
						echo $result[0]['pwd_senior_id'];
						$bIsWithSCPWDCard=true;
					}
				}
				else if (strpos($result[0]['notes'],"PWD;")!==false) {
/* //edited by Mike, 20211201
					echo "PWD#";
					$bIsWithSCPWDCard=true;
*/
					$bIsWithSCPWDCard=true;

					if (empty($result[0]['pwd_senior_id'])) {
						echo "PWD#";
					}
					else {
						echo $result[0]['pwd_senior_id'];
						$bIsWithSCPWDCard=true;
					}
				}
				else {
					if (empty($result[0]['pwd_senior_id'])) {
						echo "N/A";
					}
					else {
						echo $result[0]['pwd_senior_id'];
						$bIsWithSCPWDCard=true;
					}
				}						
?>
			</td>			
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td class="tableHeaderColumnPart1">
				<b>SIGNATURE:</b>
			</td>
			<td>
<?php		
/* //edited by Mike, 20211027
				//edited by Mike, 20210803
				if (empty($result[0]['pwd_senior_id'])) {
//				if ((empty($result[0]['pwd_senior_id']))or ($result[0]['pwd_senior_id']=="")) {
					echo "N/A";
				}
				else {
//					echo $result[0]['pwd_senior_id'];
					echo "<br/>__________";
				}
*/
				if (strpos($result[0]['notes'],"SC;")!==false) {
					echo "<br/>__________";
				}
				else if (strpos($result[0]['notes'],"PWD;")!==false) {
					echo "<br/>__________";
				}
				else {
					if (empty($result[0]['pwd_senior_id'])) {
						echo "N/A";
					}
					else {
						echo "<br/>__________";
					}
				}						
				
?>
			</td>			
		</tr>
	</table>

	<br/>

	<!-- PART 2 -->
	<table class="tablePart2">
		<tr>
			<td class="tableHeaderColumnPart2">
				<b>QTY</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>UNIT</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>DESCRIPTION</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>UNIT PRICE</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>AMOUNT</b>
			</td>
		</tr>

		<!-- PART 2: ANSWER -->
		<!-- patient transaction -->
<?php		
		//added by Mike, 20220317
		$dTotalMDXrayFee=0;
		$dTotalLabFee=0;
		$dTotalMedItemFee=0;
		$dTotalMDDiscountedFeePlus=0;
		
		//DR. HONESTO
		$sWithDrHonesto="";

		//edited by Mike, 20210628
		if (($resultPaid!=null) and (count($resultPaid) > 0)) {					
			//auto-identify fee, e.g. Consultation+Procedure, X-RAY
			
			//added by Mike, 20210902
			foreach ($resultPaid as $value) {					
						
				if ($value['fee']!=0) {
					echo "<tr>";
						echo "<td class='columnFee'>";
						echo "1";
						echo "</td>";			
						echo "<td class='column'>";
						echo "SET";
						echo "</td>";			
						echo "<td class='column'>";
						echo "PROF FEE: DR. ".$value['medical_doctor_name'];
						echo "</td>";	
						echo "<td class='columnFee'>";
						//echo $value['fee'];
						//edited by Mike, 20210706
						echo number_format($value['fee'], 2, '.', ',');
						echo "</td>";	
						echo "<td class='columnFee'>";
						//echo $value['fee'];
						//edited by Mike, 20210706
						echo number_format($value['fee'], 2, '.', ',');
						echo "</td>";
					echo "</tr>";			
					
					//added by Mike, 20220317
					//DR. PEDRO OR DR. HONESTO
					if (($value['medical_doctor_id']==1) or
						($value['medical_doctor_id']==6)) {
						
						//edited by Mike, 20220317
						$dTotalMDXrayFee+=$value['fee'];

						if ($value['medical_doctor_id']==6) {
							$sWithDrHonesto=" (WITH DR. HONESTO)";						
						}
					}


				//added by Mike, 20220317
				$dTotalMDFee=$value['fee'];
				$dTotalMDFeeWithDiscount=($dTotalMDFee/(1-0.20))*0.20;

				if (!isset($dTotalMDXrayFeeWithDiscount)) {
					$dTotalMDXrayFeeWithDiscount=0;
				}

				//note: 800 -> 600; gives over 20% discount for SC classification;
				//but NOT for all PWD classifications
				if ((strpos($result[0]['notes'],"SC;")!==false) or
					((strpos($result[0]['notes'],"PWD;")!==false))) {

					if ($value['fee']==600) {
						$dTotalMDDiscountedFeePlus+=40;
						$dTotalMDDiscountedFeePlus+=10; //added due to 800 -> 600 in MD Fee
					}
				}



				if (($result[0]['medical_doctor_id']==1) or
					($result[0]['medical_doctor_id']==6)) {
					$dTotalMDXrayFeeWithDiscount+=$dTotalMDDiscountedFeePlus;
				}				
				//note: add MD RECEIPT TOTAL only IF NOT DR. PEDRO OR DR. HONESTO				
				else {
					echo "<tr>";
						echo "<td class='columnFee'>";
						echo "</td>";			
						echo "<td class='column'>";
						echo "</td>";			
						echo "<td class='columnItemHeaderList'>";
	
						if ((strpos($result[0]['notes'],"SC;")!==false) or
							((strpos($result[0]['notes'],"PWD;")!==false))) {
							echo "MD RECEIPT TOTAL (discounted: ".number_format($dTotalMDFeeWithDiscount+$dTotalMDDiscountedFeePlus, 2, '.', ',').")";
						}
						else {
							echo "MD RECEIPT TOTAL";
						}
	
						echo "</td>";
						echo "<td class='columnFee'>";
						echo "</td>";	
						echo "<td class='columnFee'>";
						echo "<b>".number_format($dTotalMDFee, 2, '.', ',')."</b>";
						echo "</td>";
					echo "</tr>";		
				}


									
					$totalAmountFee+=$value['fee'];
				}
				else {
					if ((strpos($value['notes'],"NC;")!=0)!==false) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo "1";
							echo "</td>";			
							echo "<td class='column'>";
							echo "SET";
							echo "</td>";			
							echo "<td class='column'>";
							//edited by Mike, 20210706
	//						echo "PROFESSIONAL FEE: GRATIS";
							echo "PROF FEE: DR. ".$value['medical_doctor_name']."; GRATIS";
							echo "</td>";	
							echo "<td class='columnFee'>";
							echo "0.00";
							echo "</td>";	
							echo "<td class='columnFee'>";
							echo "0.00";
							echo "</td>";
						echo "</tr>";			
					}				
				}
				
				if ($value['x_ray_fee']!=0) {
					echo "<tr>";
						echo "<td class='columnFee'>";
						echo "1";
						echo "</td>";			
						echo "<td class='column'>";
						echo "SET";
						echo "</td>";			
						echo "<td class='column'>";
						echo "X-RAY EXAM";
						echo "</td>";	
						echo "<td class='columnFee'>";
						//echo $value['x_ray_fee'];
						//edited by Mike, 20210706
						echo number_format($value['x_ray_fee'], 2, '.', ',');
						echo "</td>";	
						echo "<td class='columnFee'>";
						//echo $value['x_ray_fee'];
						//edited by Mike, 20210706
						echo number_format($value['x_ray_fee'], 2, '.', ',');
						echo "</td>";					
					echo "</tr>";	

					//added by Mike, 20220317
					$dTotalMDXrayFee+=$value['x_ray_fee'];

					$totalAmountFee+=$value['x_ray_fee'];								
				}
				
				if ($value['lab_fee']!=0) {
					echo "<tr>";
						echo "<td class='columnFee'>";
						echo "1";
						echo "</td>";			
						echo "<td class='column'>";
						echo "SET";
						echo "</td>";			
						echo "<td class='column'>";
						echo "LAB EXAM";
						echo "</td>";	
						echo "<td class='columnFee'>";
						//echo $value['lab_fee'];
						//edited by Mike, 20210706
						echo number_format($value['lab_fee'], 2, '.', ',');
						echo "</td>";	
						echo "<td class='columnFee'>";
						//echo $value['lab_fee'];
						//edited by Mike, 20210706
						echo number_format($value['lab_fee'], 2, '.', ',');
						echo "</td>";
					echo "</tr>";			

					//added by Mike, 20220317
					$dTotalLabFee+=$value['lab_fee'];

					$totalAmountFee+=$value['lab_fee'];								
				}
			}
		}
?>		

		<!-- med item transaction -->
<?php		
		//edited by Mike, 20210628
		if (($resultPaidMedItem!=null) and (count($resultPaidMedItem) > 0)) {					
			if ((isset($resultPaidMedItem)) and ($resultPaidMedItem!=False)) {
//				$resultCount = count($resultPaidMedItem);			
			
				foreach ($resultPaidMedItem as $value) {					
					if ($value['fee']!=0) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo $value['fee_quantity'];
							echo "</td>";			
							echo "<td class='column'>";
							
							if ($value['fee_quantity']==1) {
								echo "PC";
							}
							else {
								echo "PCS";
							}

							echo "</td>";			
							echo "<td class='column'>";
							echo strtoupper($value['item_name']);
							echo "</td>";
							echo "<td class='columnFee'>";
//							echo $value['fee']/$value['fee_quantity'];
							//edited by Mike, 20210706
							echo number_format($value['fee']/$value['fee_quantity'], 2, '.', ',');
							echo "</td>";	
							echo "<td class='columnFee'>";
							//echo $value['fee'];
							//edited by Mike, 20210706
							echo number_format($value['fee'], 2, '.', ',');
							echo "</td>";
						echo "</tr>";			

						//added by Mike, 20220317
						$dTotalMedItemFee+=$value['fee'];
						
						$totalAmountFee+=$value['fee'];
					}
				}
			}
		}
		
		//added by Mike, 20220317
				echo "<tr>";
					echo "<td class='columnFee'>";
					echo "</td>";			
					echo "<td class='column'>";
					echo "</td>";			
					echo "<td class='columnItemHeaderList'>";

					$dTotalMDXrayFeeWithDiscount=($dTotalMDXrayFee/(1-0.20))*0.20;

/*
					//note: 800 -> 600; gives over 20% discount for SC classification;
					if (strpos($result[0]['notes'],"SC;")!==false) {
*/
					//added by Mike, 20220317
					//DR. PEDRO OR DR. HONESTO
					if (($result[0]['medical_doctor_id']==1) or
						($result[0]['medical_doctor_id']==6)) {
						$dTotalMDXrayFeeWithDiscount+=$dTotalMDDiscountedFeePlus;
					}
					
					if ((strpos($result[0]['notes'],"SC;")!==false) or
						((strpos($result[0]['notes'],"PWD;")!==false))) {
						
						//added by Mike, 20220317
						//note: "WITH DR. HONESTO" TEXT NOT ANYMORE DISPLAYED
						
						echo "MOSC RECEIPT TOTAL (discounted: ".number_format($dTotalMDXrayFeeWithDiscount, 2, '.', ',').")";
					}
					else {
						echo "MOSC RECEIPT TOTAL".$sWithDrHonesto;
					}
					echo "</td>";
					echo "<td class='columnFee'>";
					echo "</td>";	
					echo "<td class='columnFee'>";
					echo "<b>".number_format($dTotalMDXrayFee+$dTotalLabFee+$dTotalMedItemFee, 2, '.', ',')."</b>";
					echo "</td>";
				echo "</tr>";	
		
?>		

		<!-- non-med item transaction -->
<?php		
		//TO-DO: -reverify: this
		//added by Mike, 20220317
		$dTotalNonMedFee=0;

		//edited by Mike, 20210628
		if (($resultPaidNonMedItem!=null) and (count($resultPaidNonMedItem) > 0)) {			
			if ((isset($resultPaidNonMedItem)) and ($resultPaidNonMedItem!=False)) {
//				$resultCount = count($resultPaidMedItem);			
/*
				//added by Mike, 20220317
				echo "<tr>";
					echo "<td class='columnFee'>";
					echo "</td>";			
					echo "<td class='column'>";
					echo "</td>";			
					echo "<td class='columnItemHeaderList'>";
					echo "NON-MED ITEM LIST";
					echo "</td>";
					echo "<td class='columnFee'>";
					echo "</td>";	
					echo "<td class='columnFee'>";
					echo "</td>";
				echo "</tr>";		
*/									
				foreach ($resultPaidNonMedItem as $value) {					
					if ($value['fee']!=0) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo $value['fee_quantity'];
							echo "</td>";			
							echo "<td class='column'>";

							if ($value['fee_quantity']==1) {
								echo "PC";
							}
							else {
								echo "PCS";
							}

							echo "</td>";			
							echo "<td class='column'>";
							echo strtoupper($value['item_name']);
							echo "</td>";
							echo "<td class='columnFee'>";
//							echo $value['fee']/$value['fee_quantity'];
							echo number_format($value['fee']/$value['fee_quantity'], 2, '.', '');
							echo "</td>";	
							echo "<td class='columnFee'>";
							//echo $value['fee'];
							//edited by Mike, 20210706							
							echo number_format($value['fee'], 2, '.', ',');
							echo "</td>";
						echo "</tr>";			

						//added by Mike, 20220317
						$dTotalNonMedFee+=$value['fee'];

						$totalAmountFee+=$value['fee'];
					}
				}
				
				//added by Mike, 20220317
				echo "<tr>";
					echo "<td class='columnFee'>";
					echo "</td>";			
					echo "<td class='column'>";
					echo "</td>";			
					echo "<td class='columnItemHeaderList'>";

					$dTotalNonMedFeeWithDiscount=$dTotalNonMedFee*0.12;

					if ((strpos($result[0]['notes'],"SC;")!==false) or
						((strpos($result[0]['notes'],"PWD;")!==false))) {
						echo "PAS RECEIPT TOTAL (discounted: ".number_format($dTotalNonMedFeeWithDiscount, 2, '.', ',').")";
					}
					else {
						//edited by Mike, 20220317
						//echo "PAS RECEIPT TOTAL";

						if (isset($resultPaidNonMedItem[0]['receipt_id'])) {
							
							$dTotalNonMedVATFee=$dTotalNonMedFee-$dTotalNonMedFee/(1+0.12);
							
							echo "PAS RECEIPT TOTAL (WITH 12% VAT: @".number_format($dTotalNonMedVATFee, 2, '.', ',').")";
						}
						else {
							echo "PAS RECEIPT TOTAL";
						}
					}
					echo "</td>";
					echo "<td class='columnFee'>";
					echo "</td>";	
					echo "<td class='columnFee'>";
					//edited by Mike, 20220317
					echo "<b>".number_format($dTotalNonMedFee, 2, '.', ',')."</b>";
					//echo "<b>".number_format($dTotalNonMedFee+$dTotalNonMedFeeWithVAT, 2, '.', ',')."</b>";
					echo "</td>";
				echo "</tr>";										
			}
		}
?>		

		<!-- snack item transaction -->
<?php		
		//edited by Mike, 20210628
		if (($resultPaidSnackItem!=null) and (count($resultPaidSnackItem) > 0)) {
			if ((isset($resultPaidSnackItem)) and ($resultPaidSnackItem!=False)) {
//				$resultCount = count($resultPaidMedItem);			
			
				foreach ($resultPaidSnackItem as $value) {					
					if ($value['fee']!=0) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo $value['fee_quantity'];
							echo "</td>";			
							echo "<td class='column'>";

							if ($value['fee_quantity']==1) {
								echo "PC";
							}
							else {
								echo "PCS";
							}

							echo "</td>";			
							echo "<td class='column'>";
							echo strtoupper($value['item_name']);
							echo "</td>";
							echo "<td class='columnFee'>";
//							echo $value['fee']/$value['fee_quantity'];
							//edited by Mike, 20210706
							echo number_format($value['fee']/$value['fee_quantity'], 2, '.', ',');
							echo "</td>";	
							echo "<td class='columnFee'>";
							//echo $value['fee'];
							//edited by Mike, 20210706
							echo number_format($value['fee'], 2, '.', ',');
							echo "</td>";
						echo "</tr>";			

						$totalAmountFee+=$value['fee'];
					}
				}
			}
		}
?>


<!--		
		<tr>
			<td class="columnFee">
				1
			</td>
			<td class="column">
				SET
			</td>
			<td class="column">
				CONSULT AND PROCEDURE
			</td>
			<td class="columnFee">
				1500
			</td>
			<td class="columnFee">
				1500
			</td>
		</tr>
		<tr>
			<td class="columnFee">
			</td>
			<td class="column">
			</td>
			<td class="column">
				DR. HALIMBAWA, USBONG
			</td>
			<td class="columnFee">
			</td>
			<td class="columnFee">
			</td>
		</tr>
		<tr>
			<td class="columnFee">
				1
			</td>
			<td class="column">
				PC
			</td>
			<td class="column">
				X-RAY EXAM
			</td>
			<td class="columnFee">
				400
			</td>
			<td class="columnFee">
				400
			</td>
		</tr>
		<tr>
			<td class="columnFee">
				1
			</td>
			<td class="column">
				PC
			</td>
			<td class="column">
				LONGBONE ARM SLING BLUE
			</td>
			<td class="columnFee">
				250
			</td>
			<td class="columnFee">
				250
			</td>
		</tr>
		<tr>
			<td class="columnFee">
			</td>
			<td class="column">
			</td>
			<td class="column">
				ADULT -LARGE
			</td>
			<td class="columnFee">
			</td>
			<td class="columnFee">
			</td>
		</tr>
-->

		<!-- PART 2: TOTAL -->
		<tr>
			<td class="columnFee">
			</td>
			<td class="column">
			</td>			
			<td class='columnItemHeaderList'>
				GRAND TOTAL:
			</td>
			<td class="columnFee">
			</td>
			<td class="columnFeeTotal">
<?php			
				//edited by Mike, 20210706
//				echo number_format($totalAmountFee, 2, '.', '');
				echo number_format($totalAmountFee, 2, '.', ',');				
?>				
			</td>
		</tr>	
	</table>

	<br/>

	<!-- PART 3 -->
	<table class="tablePart3">
		<tr>
			<td class="tableHeaderColumnPart3dot1">
				<b>BY:</b>
			</td>
			<td class="tableHeaderColumnPart3dot2">
				<b>RECEIVED BY:</b>
			</td>
		</tr>
		<tr>
			<td>
				<br/>
			</td>
			<td>
			</td>						
		</tr>
		<tr>
			<td class="tableHeaderColumnPart3dot1">
<!-- 
				<select class="cashierNameSelect">
					<option value='0' selected='selected'>SYSON, MICHAEL B.</option>
					<option value='1'>HALIMBAWA, USBONG</option>			
				</select>
-->
<?php				
				echo "<select class='cashierNameSelect'>";

				foreach ($cashierList as $cashierValue) {
					if ($cashierValue["cashier_id"]==0) {
						echo "<option value='".$cashierValue["cashier_id"]."' selected='selected'>".$cashierValue["cashier_name"]."</option>";						
					}
					else {					  
						echo "<option value='".$cashierValue['cashier_id']."'>".$cashierValue["cashier_name"]."</option>";					  
				   }
				}
				
				echo "</select>";
?>
				
			</td>
			<td class="tableHeaderColumnPart3dot2">
				_________________
			</td>
		</tr>
	</table>

	<br/>
  </body>
</html>
