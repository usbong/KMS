<!--
' Copyright 2020~2022 SYSON, MICHAEL B.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @company: USBONG
' @author: SYSON, MICHAEL B.
' @date created: 20200420
' @date updated: 20221129; from 20220808
' @website address: http://www.usbong.ph
'
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">

    <!-- Reference: Apache Friends Dashboard index.html -->
    <!-- "Always force latest IE rendering engine or request Chrome Frame" -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
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
						
						div.patientName
						{
							text-align: left;
						}

/*						div.tableHeader
						{
							font-weight: bold;
							text-align: center;
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
						}
*/
						input.browse-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
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
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
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

						td.tableHeaderColumnPartTwo
						{
							border: 1pt solid black;		
							text-align: center;
							font-weight: bold;
							<!--we put this at the bottom; otherwise, the computer browser does not apply the rest of the settings.-->
							/*background-color: #2984f5;*/ <!--#2984f5; = blue-->
							
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;
							text-align: center;
						}						

						td.columnFee
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
						}						
						
						td.imageColumn
						{
							width: 22%;
							display: inline-block;
						}						

						td.pageNameColumn
						{
							width: 76%;
							display: inline-block;
							text-align: right;
						}			

						span.usbongWebsiteAddressSpan
						{
							/* color: rgb(83,128,34);*/ /* dark lime green rgb(103,157,43);*/
							color: rgb(0,0,0); /* black */
							font-weight: bold;
						}
						
						a
						{
							color: rgb(0,0,0); /* black */
							text-decoration: none;
						}

    /**/
    </style>
    <title>
      Receipt Report for the Month (MOSC)
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
		function copyText(iCount){
//			alert("hello"+iCount);
	 
			//Reference: https://stackoverflow.com/questions/51625169/click-on-text-to-copy-a-link-to-the-clipboard;
			//last accessed: 20200307
			//answer by: colxi on 20180801; edited by: Lord Nazo on 20180801	 
/*	 
			var holdText = document.getElementById("patientNameId"+iCount).innerText;
			const el = document.createElement('textarea');
		    el.value = holdText;
			document.body.appendChild(el);
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);
			//alert("text: "+holdText);
*/
			var sHoldTextPatientName = document.getElementById("patientNameId"+iCount).innerText;
			var sHoldTextFee = document.getElementById("feeId"+iCount).innerText; //.innerText;

//			alert("sHoldTextPatientName: "+sHoldTextPatientName);
//			alert("sHoldTextFee: "+sHoldTextFee);

			var sHoldTextTransactionTypeName = document.getElementById("transactionTypeNameId"+iCount).innerText;

			var sTreatmentTypeName = document.getElementById("treatmentTypeNameId"+iCount).innerText;

			var sDiscountAmount = "";
			var sTotalAmount = "0";
			
			if (sHoldTextTransactionTypeName=="CASH") {
				//alert("CASH!");
				sTotalAmount = sHoldTextFee;
			}
			else if (sHoldTextTransactionTypeName=="SC/PWD") {
				//note: solve the values of the other variables using one (1) known variable value
				sTotalAmount = sHoldTextFee
				sHoldTextFee = -sHoldTextFee/(0.20-1);
				sDiscountAmount = "" + sHoldTextFee*0.20;
			}
			else if (sHoldTextTransactionTypeName=="NC") {
				sHoldTextFee = "NC";				
				sTotalAmount = "NC";				
			}						
			else { //hmo
				sHoldTextFee = "HMO";				
				sTotalAmount = sHoldTextTransactionTypeName.toLowerCase();				
			}
			
			const el = document.createElement('textarea');
/*		    
			el.value = sHoldTextPatientName+ "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			document.body.appendChild(el);
*/			

			sTreatmentTypeName = sTreatmentTypeName.toUpperCase();
			
			if ((sTreatmentTypeName=="SWT") || (sTreatmentTypeName=="SHOCKWAVE")) {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" +sHoldTextFee + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="LASER") {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" +sHoldTextFee + "\t" + "\t" + sDiscountAmount + "\t" + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="OT") {
				el.value = sHoldTextPatientName + "\t" + "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="IN-PT") {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else {
				el.value = sHoldTextPatientName+ "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			
			document.body.appendChild(el);							
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

//			alert("text: "+sHoldTextPatientName + sHoldTextFee);//el.value);

		}
/*	  
		  defaultScrollWidth = 0;
		  
		  function auto_grow(element) {
			element.style.height = "5px";
			element.style.height = (element.scrollHeight*4)+"px";
			if (defaultScrollWidth == 0) {
				defaultScrollWidth = element.scrollWidth; //i.e. 42% of the width of the full width of the Browser Window
				alert("defaultScrollWidth: "+defaultScrollWidth);
			}
			else if (element.scrollWidth < defaultScrollWidth){
//				defaultScrollWidth = 100%;
				defaultScrollWidth = element.scrollWidth;
//				alert("defaultScrollWidth: "+defaultScrollWidth);
			}
				
			element.style.width = defaultScrollWidth; //(element.scrollWidth+element.scrollWidth*0.42)+"px";			
		  }
*/
	  </script>
  <body>
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h3>
				Official Receipt Report<br/>
				MARIKINA ORTHOPEDIC<br/>
				SPECIALTY CLINIC<br/>		
				<!-- TO-DO: -add: auto-update: year -->
				<!-- edited by Mike, 20200722 -->
				<?php 
				  if (isset($reportType)) {
					  if ($reportType = "reportToday") {						  
						echo "Receipts for the Day";
					  }
				  }
				  else {
				?>
<!-- edited by Mike, 20221129
					DATE: 2020-<?php echo $monthNum;?>
-->
					DATE: <?php echo strtoupper(date("Y-m"));?> 
				<?php
				  }
				?>
			</h3>		
		</td>
	  </tr>
	</table>
	<div><b>TODAY: </b><?php echo strtoupper(date("Y-m-d, l"));?>
	</div>
	<?php 
		//edited by Mike, 20220326
		//error in Linux machine: "Trying to access array offset on value of type bool";
		//"Trying to access array offset on value of type null"
//		if ($result[0]["medical_doctor_name"]==""){
		//edited by Mike, 20220505
//		if ((isset($result)) or ($result[0]["medical_doctor_name"]=="")) {
		//if ($result[0]["medical_doctor_name"]==""){
		if ((!isset($result[0]["medical_doctor_name"])) or ($result[0]["medical_doctor_name"]=="")) {

			echo "<br/>There are no transactions for the day.";
		}
		else {
//			echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];		
		}
	?>
	<br/>	
<!--	<div id="myText" onclick="copyText(1)">Text you want to copy</div>
-->	
	<?php
		$fFee = 0.00;
		$fXRayFee = 0.00;
		$fNonMedFee = 0.00;
		$fMedFee = 0.00;
		$fLabFee = 0.00;
		$fAmountPaid = 0.00;

		$fTotalFee = 0.00;
		$fTotalXRayFee = 0.00;
		$fTotalNonMedFee = 0.00;
		$fTotalMedFee = 0.00;
		$fTotalLabFee = 0.00;
		$fTotalAmountPaid = 0.00;

	    //added by Mike, 20200426
	    $fTotalVatSales = 0.00;
	    $fTotalVatAmount = 0.00;
	    $fTotalLess20PercentDiscount = 0.00;
		$fTotalAmountWithVat = 0.00;
	
		//get only name strings from array 
		if (isset($result)) {			
			if ($result!=null) {		
/*			
				echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];
				echo "<br/>";
				echo "<br/>";
*/			
				$resultCount = count($result);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($result).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($result).'</b> results found.</div>';			
				}			

				echo "<br/>";
				echo "<table class='search-result'>";
				
				//add: table headers
?>				
					  <tr class="row">
						<td class ="tableHeaderColumn">				
							<?php
								echo "COUNT";
							?>
						</td>

						<td class ="tableHeaderColumn">				
							<?php
								echo "DATE";
							?>
						</td>
	
						<td class ="tableHeaderColumn">				
							<?php
								echo "OR NO.";
							?>
						</td>

						<td class ="tableHeaderColumn">				
				<?php
								echo "PATIENT NAME";
				?>		
						</td>

						<td class ="tableHeaderColumn">				
				<?php
								echo "CLASSIFI-<br/>CATION";
				?>		
						</td>

						<td class ="tableHeaderColumn">				
							<?php
								echo "PF";
							?>
						</td>
						<td class ="tableHeaderColumn">				
							<?php
								echo "X-RAY<br/>FEE";
							?>
						</td>
						<td class ="tableHeaderColumn">				
							<?php
//								echo "MEDICINE<br/>FEE";
								echo "MED<br/>FEE";
							?>
						</td>
						<td class ="tableHeaderColumn">				
							<?php
								echo "LAB<br/>FEE";
							?>
						</td>						
						<td class ="tableHeaderColumn">				
							<?php
								echo "TOTAL<br/>AMT. PAID";
							?>
						</td>						
						<td class ="tableHeaderColumnPartTwo">				
							<?php
								echo "VAT SALES";
							?>
						</td>						
						<td class ="tableHeaderColumnPartTwo">				
							<?php
								echo "VAT<br />AMOUNT";
							?>
						</td>						
						<td class ="tableHeaderColumnPartTwo">				
							<?php
								echo "TOTAL";
							?>
						</td>						
						<td class ="tableHeaderColumnPartTwo">				
							<?php
							   //edited by Mike, 20200719
							   if ($result[0]['transaction_date'] >= "06/01/2020") {
							     echo "PWD•SC<br/>LESS 20%+";
							   }
							   else {
								 echo "PWD•SC<br/>LESS 20%";
							   }
							?>
						</td>
					  </tr>
<?php				
				$iCount = 1;
				foreach ($result as $value) {
		//			echo $value['report_description'];			
	/*	
					echo $value['patient_name'];				
					echo "<br/><br/>";
	*/

				   //added by Mike, 20200421
				   $fAmountPaid = 0;
				   
				   //added by Mike, 20200426
				   $fVatSales = 0;
				   $fVatAmount = 0;
				   $fAmountWithVat = 0;
				   $fAmountNoLess20PercentDiscount = 0;
				   $fLess20PercentDiscount = 0;
				   
				   //added by Mike, 20200426
				   if ($iCount % 2 == 0) { //even number
				     echo '<tr class="rowEvenNumber">';
				   }
				   else {
				     echo '<tr class="row">';
				   }				   
		?>				
		
<!--				  <tr class="row">
-->
						<td class ="column">				
								<span id="countId<?php echo $iCount?>">
							<?php
								echo $iCount;
							?>
								</span>
						</td>

						<td class ="column">				
								<span id="transactionDateId<?php echo $iCount?>">
							<?php
//								echo $value['transaction_date'];
								echo DATE("Y-m-d", strtotime($value['transaction_date']));
							?>
								</span>
						</td>

						<td class ="column">				
								<span id="receiptNumberId<?php echo $iCount?>">
							<?php
								echo $value['receipt_number'];
							?>
								</span>
						</td>

						<td class ="column">
<!--						
							<a href="#" id="patientNameId<?php echo $iCount?>" onclick="copyText(<?php echo $iCount?>)">
-->							

								<!-- edited by Mike, 20220613 -->
<!--
								<div class="patientName">
				<?php
/*	//edited by Mike, 20220613
//								echo $value['patient_name'];
								echo str_replace("�","Ñ",$value['patient_name']);
//								echo str_replace("ufffd","Ñ",$value['patient_name']);
*/
				?>
								</div>				
-->
									<a target='_blank' href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
										<div class="patientName">
						<?php
										//echo $value['patient_name'];
										echo str_replace("�","Ñ",$value['patient_name']);
						?>		
										</div>								
									</a>							
								
<!--							</a>-->
						</td>
						<td class ="column">				
								<div id="classificationId<?php echo $iCount?>">
							<?php
//								echo $value['transaction_date'];								
								//use value in NOTES if it contains keywords, e.g. "SC"
								//SC = Senior Citizens
/*								//removed by Mike, 20200426
								$fAmountNoLess20PercentDiscount = $value['fee'] / (1 - 0.20);
*/
								//we do fee computation in the next column	
								$fAmountNoLess20PercentDiscount += $value['x_ray_fee'] / (1 - 0.20);
								$fLess20PercentDiscount = $fAmountNoLess20PercentDiscount*0.20;
								//edited by Mike, 20200813
/*
								//edited by Mike, 20200620
								if (strpos(strtoupper($value['notes']),"DISCOUNTED")!==false) {
									echo "WI; DISCOUNTED";
									
									//added by Mike, 20200728
									$fLess20PercentDiscount = 0;
								}
								else if (strpos(strtoupper($value['notes']),"SC")!==false) {
									echo "SC";											
								}
								else if (strpos(strtoupper($value['notes']),"PWD")!==false) {
									echo "PWD"; 								
								}
								else {
									echo "WI";										

									$fLess20PercentDiscount = 0;									
								}								
*/
								//TO-DO: -update: PAS official receipt report
								$outputClassification = "";
								if (strpos(strtoupper($value['notes']),"DISCOUNTED")!==false) {
									$outputClassification = "WI; DISCOUNTED";
									
									//added by Mike, 20200728
									$fLess20PercentDiscount = 0;
								}
								else if (strpos(strtoupper($value['notes']),"SC")!==false) {
									$outputClassification = "SC";											
								}
								else if (strpos(strtoupper($value['notes']),"PWD")!==false) {
									$outputClassification = "PWD"; 								
								}
								else {
									$outputClassification = "WI";										

									$fLess20PercentDiscount = 0;									
								}							

								if (strpos(strtoupper($value['notes']),"OR RECEIVED")!==false) {
									$outputClassification = $outputClassification."; OR RECEIVED ".explode("OR RECEIVED ", $value['notes'])[1];
								}
								
								echo $outputClassification;
								
							?>
								</div>
						</td>
						<td class ="columnFee">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								//added by Mike, 20200420; edited by Mike, 20200724
//								$fFee = $value['fee'];
//								if ((strpos(strtoupper($value['medical_doctor_name']),"PEDRO")) or ($value['medical_doctor_id']==0)) {
								//edited by Mike, 20220808
//								if ((strpos(strtoupper($value['medical_doctor_name']),"PEDRO")) or (strpos(strtoupper($value['medical_doctor_name']),"HONESTO")) or ($value['medical_doctor_id']==0)) {
								if ((strpos(strtoupper($value['medical_doctor_name']),"PEDRO")) or (strpos(strtoupper($value['medical_doctor_name']),"HONESTO")) or (strpos(strtoupper($value['medical_doctor_name']),"CHASTITY")) or ($value['medical_doctor_id']==0)) {
									$fFee = $value['fee'];
								}
								else {
									$fFee = 0;
								}							
								
//								echo $fFee;
								//edited by Mike, 20201203
//								echo number_format($fFee, 2, '.', '');
								echo number_format($fFee, 2, '.', ',');

								$fAmountPaid += $fFee;								
								$fTotalFee += $fFee;

								//added by Mike, 20200426
//								if ($fLess20PercentDiscount!=0) {
								//edited by Mike, 20200620
								if (strpos(strtoupper($value['notes']),"DISCOUNTED")!==false) {
									//do not anymore add less 20 percent
								}
								else if ((strpos(strtoupper($value['notes']),"SC")!==false) or (strpos(strtoupper($value['notes']),"PWD")!==false)) {
									$fAmountNoLess20PercentDiscount += $fFee / (1 - 0.20);
	//								$fAmountNoLess20PercentDiscount += $value['x_ray_fee'] / (1 - 0.20);
									//edited by Mike, 20200719
									$fLess20PercentDiscount = $fAmountNoLess20PercentDiscount*0.20;
									//$fLess20PercentDiscount += ($fFee / (1 - 0.20))*0.20;
								}
							?>
								</div>
						</td>

						<td class ="columnFee">				
								<div id="xrayFeeId<?php echo $iCount?>">
							<?php							
								$fXRayFee = $value['x_ray_fee'];

								//edited by Mike, 20201203								
								//echo $fXRayFee;
								echo number_format($fXRayFee, 2, '.', ',');

								$fAmountPaid += $fXRayFee;														
								$fTotalXRayFee += $fXRayFee;
							?>
								</div>
						</td>
						<td class ="columnFee">				
								<div id="medId<?php echo $iCount?>">
							<?php							
								$fMedFee = $value['med_fee'];

								//edited by Mike, 20201203								
								//echo $fMedFee;
								echo number_format($fMedFee, 2, '.', ',');								

								$fAmountPaid += $fMedFee;				
								$fTotalMedFee += $fMedFee;
							?>
								</div>
						</td>
						<td class ="columnFee">				
								<div id="labFeeId<?php echo $iCount?>">
							<?php							
								$fLabFee = $value['lab_fee'];
								
								//edited by Mike, 20201203								
								//echo $fLabFee;
								echo number_format($fLabFee, 2, '.', ',');								

								$fAmountPaid += $fLabFee;												
								$fTotalLabFee += $fLabFee;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="amountPaidId<?php echo $iCount?>">
							<?php
//								echo $fAmountPaid;
								//edited by Mike, 20201203								
//								echo number_format($fAmountPaid, 2, '.', '');
								echo number_format($fAmountPaid, 2, '.', ',');

								$fTotalAmountPaid += $fAmountPaid;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="vatSalesId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20210205
								if (strpos(strtoupper($value['notes']),"DISCOUNTED")!==false) {
									//computation equal with "WI"
								   $fVatAmount = number_format($fAmountPaid/1.12*0.12, 2, '.', '');
								   $fVatSales = $fAmountPaid - $fVatAmount;
								}
								else if ((strpos(strtoupper($value['notes']),"SC")!==false) or (strpos(strtoupper($value['notes']),"PWD")!==false)) {
								}
								else { //WI								
								   $fVatAmount = number_format($fAmountPaid/1.12*0.12, 2, '.', '');
								   $fVatSales = $fAmountPaid - $fVatAmount;	//edited by Mike, 20200426
								}								

								//edited by Mike, 20201203								
//							    echo number_format($fVatSales, 2, '.', '');									
								echo number_format($fVatSales, 2, '.', ',');
								
								$fTotalVatSales += $fVatSales;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="vatAmountId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20201203								
//							    echo number_format($fVatAmount, 2, '.', '');									
								echo number_format($fVatAmount, 2, '.', ',');

								$fTotalVatAmount += $fVatAmount;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="amountWithVatId<?php echo $iCount?>">
							<?php
								$fAmountWithVat = $fAmountPaid;

								//edited by Mike, 20201203								
//							    echo number_format($fAmountWithVat, 2, '.', '');
								echo number_format($fAmountWithVat, 2, '.', ',');

								$fTotalAmountWithVat += $fAmountWithVat;								
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="less20PercentDiscountId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200728
							    //added by Mike, 20200719; edited by Mike, 20200728
							    if ($value['transaction_date'] >= "06/01/2020") {
									$fLess20PercentDiscount = 0;

	//								if ((strpos(strtoupper($value['notes']),"SC")!==false) or (strpos(strtoupper($value['notes']),"PWD")!==false)) {
									if ((strpos(strtoupper($value['notes']),"DISCOUNTED")===false) and (strpos(strtoupper($value['notes']),"SC")!==false) or (strpos(strtoupper($value['notes']),"PWD")!==false)) {
									   //removed by Mike, 20200426
									   //$fLess20PercentDiscount = number_format($fAmountPaid*0.20, 2, '.', '');
																	   
									   //added by Mike, 20200719; edited by Mike, 20200728
	/*								   if ($value['transaction_date'] >= "06/01/2020") {
										   $fLess20PercentDiscount = 0;
	*/									   
										   if ($fFee == 600) {
												$fLess20PercentDiscount += 200; //we give more than 20% discount
										   }
										   else {
											   //edited by Mike, 20221129
											   //note: in right-most column, on PWD•SC LESS 20%+;
											   //$fLess20PercentDiscount += $fFee*0.20;
											   //$fAmountNoLess20PercentDiscount += $fFee / (1 - 0.20);
											   $fLess20PercentDiscount += (($fFee/(1-0.20))-($fFee));
										   }

										   //we do fee computation in the next column	
										   $fAmountNoLess20PercentDiscountXRayOnly = $value['x_ray_fee'] / (1 - 0.20);
										   $fLess20PercentDiscount += $fAmountNoLess20PercentDiscountXRayOnly*0.20;
	//								   }
									}
									else { //WI								
									}								
								}
	
								//edited by Mike, 20201203								
//							    echo number_format($fLess20PercentDiscount, 2, '.', '');							
								echo number_format($fLess20PercentDiscount, 2, '.', ',');
								
								$fTotalLess20PercentDiscount += $fLess20PercentDiscount;
							?>
								</div>
						</td>
					  </tr>
		<?php				
					$iCount++;		
//					echo "<br/>";
				}				

// add row for total counts
?>
			  <tr class="row">
				<td class ="column">				
						<div>
					<?php
//								echo "COUNT";
					?>
						</div>
				</td>

				<td class ="column">				
						<div>
		<?php
//								echo "DATE";
		?>								
						</div>								
				</td>

				<td class ="column">				
						<div>
		<?php
//								echo "OR NO.";
		?>		
						</div>								
				</td>

				<td class ="column">				
						<div>
		<?php
//								echo "PATIENT NAME";
							echo "<b>GRAND TOTAL</b>";
		?>		
						</div>								
				</td>
				
				<td class ="column">				
						<div>
		<?php
//								echo "CLASSIFICATION";
		?>		
						</div>								
				</td>
				
				<td class ="columnFee">				
						<div>
					<?php
//						echo "<b>".$fTotalFee."</b>";
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalFee, 2, '.', '')."<b/>";
						echo "<b>".number_format($fTotalFee, 2, '.', ',')."<b/>";	
					?>
						</div>
				</td>
				<td class ="columnFee">				
						<div>
					<?php
//						echo "<b>".$fTotalXRayFee."</b>";

						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalXRayFee, 2, '.', '')."<b/>";		
						echo "<b>".number_format($fTotalXRayFee, 2, '.', ',')."<b/>";		
					?>
						</div>
				</td>
				<td class ="columnFee">				
						<div>
					<?php
//						echo "<b>".$fTotalMedFee."</b>";
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalMedFee, 2, '.', '')."<b/>";	
						echo "<b>".number_format($fTotalMedFee, 2, '.', ',')."<b/>";							
					?>
						</div>
				</td>
				<td class ="columnFee">				
						<div>
					<?php
//						echo "<b>".$fTotalLabFee."</b>";
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalLabFee, 2, '.', '')."<b/>";	
						echo "<b>".number_format($fTotalLabFee, 2, '.', ',')."<b/>";							
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
//						echo "<b>".$fTotalAmountPaid."</b>";
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalAmountPaid, 2, '.', '')."<b/>";		
						echo "<b>".number_format($fTotalAmountPaid, 2, '.', ',')."<b/>";								
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalVatSales, 2, '.', '')."<b/>";		
						echo "<b>".number_format($fTotalVatSales, 2, '.', ',')."<b/>";		
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalVatAmount, 2, '.', '')."<b/>";		
						echo "<b>".number_format($fTotalVatAmount, 2, '.', ',')."<b/>";
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalAmountWithVat, 2, '.', '')."<b/>";		
						echo "<b>".number_format($fTotalAmountWithVat, 2, '.', ',')."<b/>";
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						//edited by Mike, 20201203								
//						echo "<b>".number_format($fTotalLess20PercentDiscount, 2, '.', '')."<b/>";		
						echo "<b>".number_format($fTotalLess20PercentDiscount, 2, '.', ',')."<b/>";
					?>
						</div>
				</td>						
			  </tr>
<?php				
				echo "</table>";				
				echo "<br/>";				
				echo '<div>***NOTHING FOLLOWS***';	
			}
			else {					
/*
				echo '<div>';					
				echo 'Your search <b>- '.$nameParam.' -</b> did not match any of our patients\' names.';
				echo '<br><br>Recommendation:';
				echo '<br>&#x25CF; Reverify that the patient is <b>not</b> new.';				
				echo '<br>&#x25CF; Reverify that the spelling is correct.';				
				echo '</div>';					
*/				
			}			
		}
	?>
	<br />
	<br />
	<br />
	<br />
	<div class="copyright">
		© <span class="usbongWebsiteAddressSpan">www.usbong.ph </span><span>2011~<?php echo date("Y")?>. All rights reserved.</span>
	</div>		 
  </body>
</html>
