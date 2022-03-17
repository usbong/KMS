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
' @date created: 20200306
' @date updated: 20220317; from 20220222
' @website address: http://www.usbong.ph

//TO-DO: -fix: computer adds patient after pressing reload

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
							font-family: Arial;
							font-size: 11pt;

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							width: 670px
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
						
						div.itemName
						{
							text-align: left;
						}

						div.tableHeader
						{
							font-weight: bold;
							text-align: center;
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
						}

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

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: left
						}						

						td.columnFee
						{
							border: 1px dotted #ab9c7d;		
							text-align: right
						}						

						td.columnNotes
						{
							border: 1px dotted #ab9c7d;		
							text-align: left
						}						

						td.columnTableHeader
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 26%;
						}						

						td.columnTableHeaderFee
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 13%;
						}		

						td.columnTableHeaderClassification
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 12%;
						}		

						td.columnTableHeaderNotes
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 26%;
						}		

						td.columnTableHeaderDate
						{
							padding-left: 0px;
							text-align: left;
							width: 26%;
						}						

						td.columnTableHeaderIndexCard
						{
							font-weight: bold;
							text-align: right;
							width: 26%;
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

						.Fee-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 10px;
							font-size: 16px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							text-align: right;
							width: 70%;

							float: left;
						}

						.Quantity-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							font-size: 16px;
							border: 1px solid #68502b;
							width: 20%;
							border-radius: 3px;	    	    

							float: left;
						}

						.Notes-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							font-size: 16px;
							border: 1px solid #68502b;
							width: 82%;
							border-radius: 3px;	    	    

							float: left;
						}

						.Classification-select { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							font-size: 16px;
							border: 1px solid #68502b;
							width: 100%;
							border-radius: 3px;	    	    
							float: left;
						}
						
						.Button-purchase {
/*							padding: 8px 42px 8px 42px;
*/
							padding: 12px;
							background-color: #ffe400;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 4px;

							float: left;
							margin-left: 4px;
						}

						.Button-purchase:hover {
							background-color: #d4be00;
						}

						/*added by Mike, 20201013*/
						.Button-purchase:focus {
							background-color: #d4be00;
						}

        /*------------------*/
        /* Modal            */
        /*------------------*/

        .modal-header {
            padding-bottom: 0px;
            border-bottom: none;
        }

        .modal-body {
            font-size: 15px;
            color: rgb(75, 75, 75);
        }

        .modal-footer {
            padding-top: 0px;
            border-top: none;
        }
		
    /**/
    </style>
    <title>
      Search Patient
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>		
		//added by Mike, 20200612
		function onLoad() {
			document.body.onkeydown = function(e){
				//alert(e.keyCode);
				//note keycode not = Character key
				if (e.keyCode==17) { //Ctrl key
					var medicalDoctorIdInput = document.getElementById("payMedicalDoctorIdParam").value;
					var patientIdInput = document.getElementById("payPatientIdParam").value;

					if (medicalDoctorIdInput !== null && medicalDoctorIdInput !== '') { //verify only one
						myPopupFunctionPay(medicalDoctorIdInput, patientIdInput);
					}
				}
			};		
		}
		
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

		//added by Mike, 20200329; edited by Mike, 20200806
//		function myPopupFunction() {				
		function myPopupFunction(patientId) {	
/* //removed by Mike, 20210902
			//added by Mike, 20210424
			//note: we add this command to prevent multiple button clicks
			//received by computer server before identifying that a patient transaction
			//already exists in Cart List from Database
			document.getElementById("addButtonId").disabled = true;
*/
				
			//edited by Mike, 20200522
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;			
			var professionalFee = document.getElementById("professionalFeeParam").value;
			var xRayFee = document.getElementById("xRayFeeParam").value;
			var labFee = document.getElementById("labFeeParam").value;
			var classification = document.getElementById("classificationParam").value;
			var notes = document.getElementById("notesParam").value;


			//added by Mike, 20200806
			//verified: if a patient id already exists in the cart list
			var hasPatientInCartList = document.getElementById("hasPatientInCartListParam").value;
	
			if (hasPatientInCartList) {
				alert("Isang (1) pasyente lamang ang maaaring idagdag sa bawat Cart List.");
				return;
			}
	
			//added by Mike, 20200525
//			alert(notes);
			notes = notes.replace(";", "u003B"); //semicolon
			notes = notes.replace(",", "u002C"); //comma
	
			//added by Mike, 20200526
			notes = notes.toUpperCase();

			//added by Mike, 20201103
			//0 = ANY; SUMMARY = 3
			if ((medicalDoctorId==0) || (medicalDoctorId==3)) {
				alert("Pumili ng Medical Doctor na hindi \"ANY\" o \"SUMMARY\".");
				return;
			}

			//added by Mike, 20210902
			//note: we add this command to prevent multiple button clicks
			//received by computer server before identifying that a patient transaction
			//already exists in Cart List from Database
			document.getElementById("addButtonId").disabled = true;

	
//			alert("after: " + notes);
			//added by Mike, 20200523
//			alert(medicalDoctorId);
			//this is due to we do not include id number 0, i.e. "ANY", and 3, i.e. "SUMMARY", in the select options
			//therefore, we need to add a +1 to correctly identify the medical doctor
/*			
			if ((medicalDoctorId==0)) {
				medicalDoctorId+=1; //to be SYSON, PEDRO
			}
			else (medicalDoctorId==2)) {
				medicalDoctorId+=2; //to be REJUSO, CHASTITY AMOR
			}
*/
			//added by Mike, 20200611
			if (professionalFee.trim()==="") {
				professionalFee = 0;
			}
			//added by Mike, 20200611
			if (xRayFee.trim()==="") {
				xRayFee = 0;
			}
			//added by Mike, 20200611
			if (labFee.trim()==="") {
				labFee = 0;
			}

			//added by Mike, 20200518; edited by Mike, 20200523
			//the following instruction is not yet supported by all computer web browsers
//			if (notes.includes("DEXA")) {
			//edited by Mike, 20210122
			if (notes.indexOf("DEXA2")!==-1) {
				professionalFee = parseInt(professionalFee) + 500*2;
			}
			else if (notes.indexOf("DEXA")!==-1) {
				professionalFee = parseInt(professionalFee) + 500;
			}

/*	//removed by Mike, 20200824			
			//added by Mike, 20200819
			if (notes.indexOf("MINORSET")!==-1) {
				professionalFee = parseInt(professionalFee) + 500;
			}
*/
			if (notes.trim()==="") {
				notes = "NONE";
			}
			
			//added by Mike, 20200602
			if (notes.indexOf("NC")!==-1) { //gratis, i.e. NO CHARGE
				professionalFee = 0;
			}

//			setTimeout(setButton("addButtonId",false),30000);

			//do the following only if value is a Number, i.e. not NaN
			if ((!isNaN(professionalFee)) && (!isNaN(xRayFee)) && (!isNaN(labFee))) {				
				window.location.href = "<?php echo site_url('browse/addTransactionServicePurchase/"+medicalDoctorId+"/"+patientId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+classification+"/"+notes+"');?>";
			}
	
			//added by Mike, 20210424
			//note: no need to add this due to computer enables button after reloading page
//			document.getElementById("addButtonId").disabled = false;
//			setTimeout(setButton("addButtonId",false),300000);
		}	
		
		//added by Mike, 20210424; removed by Mike, 20210424
/*
		function setButton(buttonId, isDisabled) {
			document.getElementById(buttonId).disabled = isDisabled;
		}
*/		

		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
		}	
*/
		function myPopupFunctionDelete(medicalDoctorId,patientId,transactionId) {				
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;

			//added by Mike, 20200523
//			alert(medicalDoctorId);
/*
			//this is due to we do not include id number 0, i.e. "ANY", and 3, i.e. "SUMMARY", in the select options
			//therefore, we need to add a +1 to correctly identify the medical doctor
			if ((medicalDoctorId==0)) {
				medicalDoctorId+=1; //to be SYSON, PEDRO
			}
			else (medicalDoctorId==2)) {
				medicalDoctorId+=2; //to be REJUSO, CHASTITY AMOR
			}
*/

/*
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
*/			
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/deleteTransactionServicePurchase/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"');?>";
		}	

		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionPay(itemId) {				
			window.location.href = "<?php echo site_url('browse/payTransactionMedicinePurchase/"+itemId+"');?>";
		}	
*/
		//edited by Mike, 20200519
/*
		function myPopupFunctionPay(itemId) {				
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/2/"+itemId+"');?>";
			
		}	
*/
		//TO-DO: -reverify: this
		function myPopupFunctionPay(medicalDoctorId,patientId) {				
			//alert("hallo");

			//added by Mike, 20201103
			//verified: if a patient id already exists in the cart list
			var hasPatientInCartList = document.getElementById("hasPatientInCartListParam").value;

			//added by Mike, 20211128			
			var isPatientTransactionGratis = document.getElementById("isPatientTransactionGratisParam").value;
			var dCartFeeTotal = document.getElementById("cartFeeTotalId").value;

			//added by Mike, 20220222
			var iCartValueMedicalDoctorId = document.getElementById("cartValueMedicalDoctorIdParam").value;
			var iCartValuePatientId = document.getElementById("cartValuePatientIdParam").value;

			if (!hasPatientInCartList) {
				alert("Kailangang may isang (1) pasyente sa bawat Cart List.");
				return;
			}
			
			//added by Mike, 20211128
			if ((isPatientTransactionGratis==0) && (dCartFeeTotal==0)) {
				alert("Sapagkat hindi rin No Charge (NC) o Gratis, kailangang may bayaran sa Cart List.");
				return;					
			}

/* //removed by Mike, 20210902			
			//added by Mike, 20210902
			//note: Unit member can set another Medical Doctor in the options
			//after already adding the patient with the set Medical Doctor in the Cart List

//			alert("medicalDoctorId: "+medicalDoctorId);

			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;
*/

			

			//added by Mike, 20200523
//			alert(medicalDoctorId);
			//this is due to we do not include id number 0, i.e. "ANY", and 3, i.e. "SUMMARY", in the select options
			//therefore, we need to add a +1 to correctly identify the medical doctor
/*
			if ((medicalDoctorId==0)) {
				medicalDoctorId+=1; //to be SYSON, PEDRO
			}
			else (medicalDoctorId==2)) {
				medicalDoctorId+=2; //to be REJUSO, CHASTITY AMOR
			}
*/			
			//edited by Mike, 20220222
			//window.location.href = "<?php echo site_url('browse/payTransactionServiceAndItemPurchase/"+medicalDoctorId+"/"+patientId+"');?>";

			window.location.href = "<?php echo site_url('browse/payTransactionServiceAndItemPurchase/"+iCartValueMedicalDoctorId+"/"+iCartValuePatientId+"');?>";			
		}	

	  </script>
  <!-- edited by Mike, 20200612 -->
  <body onload="onLoad();">
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				Search Patient
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<form id="browse-form" method="post" action="<?php echo site_url('browse/confirmPatient')?>">
		<?php
			$itemCounter = 1;
		?>
<!--		<input type="hidden" name="reportTypeIdParam" value="1" required>
		<input type="hidden" name="reportTypeNameParam" value="Incident Report" required>
-->

		<div>
			<table width="100%">
<!--
			  <tr>
				<td>
				  <b><span>Pangalan</span></b>
				</td>
			  </tr>
-->
			  <tr>
				<td>				
				  <input type="text" class="browse-input" placeholder="" name="nameParam" required>
				</td>
			  </tr>
			</table>
		</div>
		<br />
		<!-- Buttons -->
		<button type="submit" class="Button-login">
			Enter
		</button>
	</form>
	<br/>
	<br/>
<!--	//removed by Mike, 20210220
	<div><b>DATE: </b><?php echo strtoupper(date("Y-m-d, l"));?>
	</div>
-->
	<table>
		<tr>
			<td class="columnTableHeaderDate">
				<b>DATE: </b><?php echo strtoupper(date("Y-m-d, l"));?>
			</td>
			<td class="columnTableHeaderIndexCard">
<!-- edited by Mike, 20210320
					<a href='<?php echo site_url('browse/viewPatientIndexCard/'.$result[0]['patient_id'])?>' id="viewPatientIndexCard">
-->					
					<a href='<?php echo site_url('browse/viewPatientIndexCard/'.$result[0]['patient_id'].'/0')?>' id="viewPatientIndexCard">
					
						<div class="patientName">
		<?php
						//echo $value['patient_name'];
	//					echo str_replace("ï¿½","Ã‘",$value['patient_name']);
						echo "INDEX CARD"
		?>		
						</div>								
					</a>
			</td>
		</tr>
	</table>

	<?php 
		//edited by Mike, 20200518; edited by Mike, 20211204
//		if ((!isset($result[0]["medical_doctor_name"])) || ($result[0]["medical_doctor_name"]=="")) {
	
		if (strpos($result[0]["patient_name"],"NONE")!==false) {
//			echo "<br/>There are no transactions for the day.";

			//default value
			//edited by Mike, 20211204
//			$result[0]["medical_doctor_name"] = 1; //SYSON, PEDRO
			$result[0]["medical_doctor_id"] = 1; //SYSON, PEDRO

		}

/*			echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];		
*/
			echo "<b>MEDICAL DOCTOR: </b>";		
?>			

<!-- +updated: this -->
<!--
			<select id="medicalDoctorIdParam">
			  <option value="1">SYSON, PEDRO</option>
			  <option value="2">SYSON, PETER</option>
			  <option value="3">REJUSO, CHASTITY AMOR</option>
			</select>						
-->
<?php			

//			echo ">>".$medicalDoctorId;
			//edited by Mike, 20210907
//			if (isset($medicalDoctorId)) {
			if (isset($result[0]["medical_doctor_id"])) {
				$medicalDoctorId = $result[0]["medical_doctor_id"];
			}
			else {
				$medicalDoctorId = 0; //set default to ANY
			}
																						
			echo "<select id='medicalDoctorIdParam'>";			
			
				foreach ($medicalDoctorList as $medicalDoctorValue) {
				  //edited by Mike, 20200523
				  //TO-DO: -update: this
/*				  
				  if (($medicalDoctorValue["medical_doctor_id"]=="0") || (($medicalDoctorValue["medical_doctor_id"]=="3"))) {
				  }
				  else {
*/					  
	//				  if ($result[0]["medical_doctor_id"]==$medicalDoctorValue["medical_doctor_id"]) {					  
		
					  if (isset($medicalDoctorId) and ($medicalDoctorValue["medical_doctor_id"]==$medicalDoctorId)) {	
				  
						echo "<option value='".$medicalDoctorValue["medical_doctor_id"]."' selected='selected'>".$medicalDoctorValue["medical_doctor_name"]."</option>";
					  }			  	  
	/*
					  else if ($result[0]["medical_doctor_id"]==$medicalDoctorValue["medical_doctor_id"]) {
						echo "<option value='".$medicalDoctorValue["medical_doctor_id"]."' selected='selected'>".$medicalDoctorValue["medical_doctor_name"]."</option>";
					  }				  
	*/				  
					  else {
						echo "<option value='".$medicalDoctorValue['medical_doctor_id']."'>".$medicalDoctorValue["medical_doctor_name"]."</option>";			  
					  }				
				   }
/*
				}
*/				
			echo "</select>";
	?>
	<br/>
<!-- added by Mike, 20210219 -->
<!-- removed by Mike, 20210219 -->
<!-- TO-DO: -add: viewPatientIndexCard -->
<!--
	<table>
	<tr>
		<td class="tableHeaderColumn">
			<b>ADDRESS:</b>
		</td>
		<td class="addressAnswerColumn">
			<input class='inputText' type='text' name='inputTextLocationAddressName' placeholder='LOCATION' required>
		</td>
		<td class="addressAnswerColumn">
			<input class='inputText' type='text' name='inputTextBarangayAddressName' placeholder='BARANGAY' required>
		</td>
		<td class="addressAnswerColumn">
			<input class='inputText' type='text' name='inputTextProvinceCityPhAddressName' placeholder='PROVINCE・CITY・PH' required>
		</td>
		<td class="postalAddressAnswerColumn">
			<input class='inputText' type='text' name='inputTextPostalAddressName' placeholder='POSTAL' required>
		</td>
	</tr>
	</table>
-->	
	
<!--	<br/> 
-->
<!--	TO-DO: -update: this
-->	
	
<!--	<div id="myText" onclick="copyText(1)">Text you want to copy</div>
-->	
	<?php
	
		//get only name strings from array 
		if (isset($result)) {			
			if ($result!=null) {		
/*
				$resultCount = count($result);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($result).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($result).'</b> results found.</div>';			
				}			
*/
				echo "<br/>";
				echo "<table class='search-result'>";
				
				//add: table headers
?>				
					  <tr class="row">
						<td class ="columnTableHeader">				
				<?php
							echo "PATIENT NAME";
				?>		
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "PF";
							?>
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "X-RAY";
							?>
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "LAB";
							?>
						</td>
						<td class ="columnTableHeaderClassification">				
							<?php
								echo "CLASSIFI-<br/>CATION";
							?>
						</td>

						<td class ="columnTableHeaderNotes">				
							<?php
								echo "ADDITIONAL<br/>NOTES";
							?>
						</td>
					  </tr>
<?php				
				$iCount = 1;
/*				foreach ($result as $value) {
*/	

				$value = $result[0];

		?>				
		
					  <tr class="row">
						<td class ="column">				
							<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
								<div class="patientName">
				<?php
								//TO-DO: -update: this
								//echo $value['patient_name'];
								//edited by Mike, 20220317
//								echo str_replace("ï¿½","Ã‘",$value['patient_name']);							
								echo str_replace("�","Ñ",$value['patient_name']);
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">				
							<!-- edited by Mike, 20200602 -->
							<!-- default value is now 800, instead of 600 -->
							<input type="tel" id="professionalFeeParam" class="Fee-textbox no-spin" value="800" min="1" max="99999" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;
						
									if (this.value.length == 5) {			
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>						
						</td>
						<td class ="column">				
							<input type="tel" id="xRayFeeParam" class="Fee-textbox no-spin" value="0" min="1" max="99999" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;
						
									if (this.value.length == 5) {			
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>
						</td>
						<td class ="column">
							<input type="tel" id="labFeeParam" class="Fee-textbox no-spin" value="0" min="1" max="99999" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;
						
									if (this.value.length == 5) {			
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>
						</td>
<!-- edited by Mike, 20210214
						<td class="column">
							<select id="classificationParam" class="Classification-select">
							  <option value="0">WI</option>
							  <option value="1">SC</option>
							  <option value="2">PWD</option>
							</select>						
						</td>
-->
						<td class="column">
							<select id="classificationParam" class="Classification-select">
<?php
							  if (isset($resultPaid[0]["notes"])) {
								  //edited by Mike, 20210219
								  //added by Mike, 20210313
								  //note: keyword "DISCOUNTED"
								  if (strpos($resultPaid[0]["notes"],"DISCOUNTED")!==false) {
									echo "<option value='0'>WI</option>";
									echo "<option value='1'>SC</option>";
									echo "<option value='2'>PWD</option>";
								  }
//edited by Mike, 20210313
//								  if (strpos($resultPaid[0]["notes"],"SC")!==false) {
								  else if (strpos($resultPaid[0]["notes"],"SC")!==false) {
									echo "<option value='0'>WI</option>";
									echo "<option value='1' selected='selected'>SC</option>";
									echo "<option value='2'>PWD</option>";
								  }
								  else if (strpos($resultPaid[0]["notes"],"PWD")!==false) {
									echo "<option value='0'>WI</option>";
									echo "<option value='1'>SC</option>";
									echo "<option value='2' selected='selected'>PWD</option>";
								  }
								  else {
									echo "<option value='0'>WI</option>";
									echo "<option value='1'>SC</option>";
									echo "<option value='2'>PWD</option>";
								  }
							  }			  	  
							  else {
									echo "<option value='0'>WI</option>";
									echo "<option value='1'>SC</option>";
									echo "<option value='2'>PWD</option>";		
							  }				
?>
							</select>						
						</td>
						<td class="column">
							<input type="text" id="notesParam" class="Notes-textbox no-spin" value="NONE" required>
						</td>						
					    <td>
							<button onclick="myPopupFunction(<?php echo $value['patient_id'];?>)" class="Button-purchase" id="addButtonId">ADD</button>
<!--							<button onclick="myPopupFunction()" class="Button-purchase">BUY</button>
-->
						</td>						
					  </tr>
		<?php				
					$iCount++;		
//					echo "<br/>";
/*				}				
*/
				echo "</table>";				
				echo "<br/>";				
//				echo '<div>***NOTHING FOLLOWS***';	
				echo "<br/>";				
			}
			else {					
				//edited by Mike, 20200331
				if (isset($nameParam)) {
					echo '<div>';					
					echo 'Your search <b>- '.$nameParam.' -</b> did not match any of our medicine names.';
					echo '<br><br>Recommendation:';
					echo '<br>&#x25CF; Reverify that the spelling is correct.';				
					echo '</div>';					
				}
			}			

			//TO-DO: -add: paid receipt page
			//TO-DO: -update: this


			//added by Mike, 20200401
			echo '<h3>Cart List</h3>';

			//added by Mike, 20200806
			$hasPatientInCartListParamValue = False;

			$cartListResultCount = 0;
			
			if ((isset($cartListResult)) and ($cartListResult!=False)) {
				$cartListResultCount = count($cartListResult);
			}

			//cart list			
			if ($cartListResultCount==0) {		
				//edited by Mike, 20200529
				echo '<div>';					
				echo 'There are no transactions.';
				echo '</div>';									
			}
			else {
//				$cartListResultCount = count($cartListResult);
				if ($cartListResultCount==1) {
					echo '<div>Showing <b>'.count($cartListResult).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($cartListResult).'</b> results found.</div>';			
				}			
				echo '<br/>';
				
				echo "<table class='search-result'>";
				
				//add: table headers
				$iCount = 1;
				$cartFeeTotal = 0;
				
				//added by Mike, 20200519
				$patientFee = 0;
				
				//added by Mike, 20201212
				$cartValuePatientId = -1;
				
				foreach ($cartListResult as $cartValue) {
/*	
				$value = $result[0];
*/	
				//added by Mike, 20211128
//				echo "cartValueNotes: ".$cartValue['notes']."<br/>";
				
				if (strpos($cartValue['notes'],"NC;")!==false) {
?>
					<input type="hidden" id="isPatientTransactionGratisParam" value="1">
<?php
				}
				else {
?>					
					<input type="hidden" id="isPatientTransactionGratisParam" value="0">
<?php					
				}			
		?>				
		
					  <tr class="row">
						<td class ="column">				
							<div class="transactionDate">
				<?php
								echo $cartValue['transaction_date'];
				?>		
							</div>								
						</td>
						<td class ="column">				
							<a href='<?php 
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									echo site_url('browse/viewPatient/'.$cartValue['patient_id']);
								}
								else {
									if ($cartValue['item_type_id']==1) { //1 = MEDICINE
										echo site_url('browse/viewItemMedicine/'.$cartValue['item_id']);
									}
									//added by Mike, 20201212
									else if ($cartValue['item_type_id']==3) { //3 = SNACK
										echo site_url('browse/viewItemSnack/'.$cartValue['item_id']);
									}
									else if ($cartValue['item_type_id']==2) { //2 = NON-MEDICINE
										echo site_url('browse/viewItemNonMedicine/'.$cartValue['item_id']);
									}									
								}								
								?>'>
								<!-- edited by Mike, 20200806 -->
								<div class="cartItemName">
				<?php
								//edited by Mike, 20200806
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									//TO-DO: -update: this
									//echo $cartValue['patient_name'];
									echo str_replace("ï¿½","Ã‘",$cartValue['patient_name']);
//edited by Mike, 20220222				
?>
<input type="hidden" id="cartValueMedicalDoctorIdParam" value="<?php echo $cartValue['medical_doctor_id'];?>">
<input type="hidden" id="cartValuePatientIdParam" value="<?php echo $cartValue['patient_id'];?>">
<?php	
									$hasPatientInCartListParamValue = True;
								}
								else {
									echo $cartValue['item_name'];
								}
								

				?>		
								</div>								
							</a>
						</td>
							<?php
//edited by Mike, 20210622							
								//edited by Mike, 20200414
//								echo $cartValue['item_price'];

								//added by Mike, 20200415; edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									$iQuantity =  1;

									$patientFee = $cartValue['fee']+$cartValue['x_ray_fee']+$cartValue['lab_fee'];
									
									//added by Mike, 20201212
									$cartValuePatientId = $cartValue['patient_id'];
								}
								else {
									
									if ($cartValue['fee_quantity']==0) {
	//									$iQuantity =  1;
										//edited by Mike, 20210110
										if ($cartValue['item_price']==0) {
											$iQuantity =  1;//floor(0/100);
										}
										else {
											$iQuantity =  floor(($cartValue['fee']/$cartValue['item_price']*100)/100);
										}

									}
									else {
										$iQuantity =  $cartValue['fee_quantity'];
									}
								}
							?>
						<td class ="column">				
						x
						</td>
						<td class ="columnFee">				
								<div id="cartItemQuantityId<?php echo $iCount?>">
							<?php
//								echo $cartValue['fee']/$cartValue['item_price'];
//								echo floor(($cartValue['fee']/$cartValue['item_price']*100)/100);
								//edited by Mike, 20200415
								//echo floor(($cartValue['fee']/$cartValue['fee']*100)/100);							
/*								
								if ($cartValue['fee_quantity']==0) {
									echo 1;
								}
								else {
									echo $cartValue['fee_quantity'];
								}
*/								
								echo $iQuantity;
							?>
								</div>
						</td>
						<td class ="columnFee">				
								<div id="cartItemPriceId<?php echo $iCount?>">
							<?php
//edited by Mike, 20210622							
								//edited by Mike, 20200414
//								echo $cartValue['item_price'];

								//added by Mike, 20200415; edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									echo "@(".$cartValue['fee']." + ".$cartValue['x_ray_fee']." + ".$cartValue['lab_fee'].")";
								}
								else {
									echo "@".number_format($cartValue['fee']/$iQuantity, 2, '.', '');									
								}
							?>
								</div>
						</td>

						<td class ="column">				
						=
						</td>
						<td class ="columnFee">				
								<div id="cartFeeId<?php echo $iCount?>">
							<?php
								//echo $cartValue['fee'];
								
								//edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									echo number_format($patientFee, 2, '.', '');
																		
									$cartFeeTotal = $cartFeeTotal + $patientFee;
								}
								else {
									//edited by Mike, 20200521
//									echo number_format($cartValue['fee']/$iQuantity, 2, '.', '');
									echo number_format($cartValue['fee'], 2, '.', '');

									$cartFeeTotal = $cartFeeTotal + $cartValue['fee'];
								}
				
//								$cartFeeTotal = $cartFeeTotal + $cartValue['fee'];
							?>
								</div>
						</td>
						<td>				
							<!-- TO-DO: -reverify: delete for medicine and non-medicine items -->
							<!-- edited by Mike, 20201212 -->
							<!--
							<button onclick="myPopupFunctionDelete(<?php echo $value['medical_doctor_id'].",".$value['patient_id'].",".$cartValue['transaction_id'];?>)" class="Button-delete">DELETE</button>							-->		
							<button onclick="myPopupFunctionDelete(<?php echo $value['medical_doctor_id'].",".$cartValuePatientId.",".$cartValue['transaction_id'];?>)" class="Button-delete">DELETE</button>														
<!--							<button onclick="myPopupFunction()" class="Button-purchase">BUY</button>
-->
						</td>						
					  </tr>
		<?php				
					$iCount++;		
//					echo "<br/>";
				}				
?>
				<!-- TOTAL -->				
					  <tr class="row">
						<td class ="column">				
							<div class="total">
				<?php
								echo "<b>TOTAL</b>";
				?>		
							</div>								
						</td>
						<td class ="column">				
						</td>
						<td class ="column">				
						</td>
						<td class ="column">				
						</td>
						<td class ="column">				
						</td>
						<td class ="column">				
						=
						</td>
						<td class ="column">				
								<div id="feeTotalId<?php echo $iCount?>">
							<?php
//								echo "<b>".$cartFeeTotal."<b/>";
								
								echo "<b>".number_format((float)$cartFeeTotal, 2, '.', '')."<b/>";
							?>
								</div>
						</td>
						<td>
							<!-- added by Mike, 20200612; edited by Mike, 20210906 -->
							<input type="hidden" id="payMedicalDoctorIdParam" value="<?php echo $medicalDoctorId;?>">
							<!-- edited by Mike, 20210906 -->							
							<input type="hidden" id="payPatientIdParam" value="<?php echo $value['patient_id'];?>">
							<button onclick="myPopupFunctionPay(<?php echo $medicalDoctorId.",".$value['patient_id']?>)" class="Button-purchase">PAY</button>
							
						</td>						
					  </tr>					
<?php
				echo "</table>";				

				//added by Mike, 20211128
//				echo "cartFeeTotal: ".$cartFeeTotal."<br/>";
?>
				<input type="hidden" id="cartFeeTotalId" value="<?php echo $cartFeeTotal;?> ">
<?php
			}
?>
			<!-- added by Mike, 20200806 -->
			<input type="hidden" id="hasPatientInCartListParam" value="<?php echo $hasPatientInCartListParamValue;?>">

<?php
/*			
			echo "<br/>";
*/
			echo '<h3>Patient Purchased Service History</h3>';

/*	//removed by Mike, 20210723
			if ((!isset($value)) or ($value['transaction_date']=="")) {				
				echo '<div>';					
				echo 'There are no transactions.';
				echo '</div>';					
			}
			else {
*/				
				//edited by Mike, 20200406
				$resultCount = 0;

				if ((isset($resultPaid)) and ($resultPaid!=False)) {
					$resultCount = count($resultPaid);
				}
	
				//item purchase history			
				if ($resultCount==0) {				
					echo '<div>';					
					echo 'There are no transactions.';
					echo '</div>';					
				}
				else {
	//				$resultCount = count($resultPaid);
					if ($resultCount==1) {
						echo '<div>Showing <b>'.count($resultPaid).'</b> result found.</div>';
					}
					else {
						echo '<div>Showing <b>'.count($resultPaid).'</b> results found.</div>';			
					}			
					echo '<br/>';
					
					echo "<table class='search-result'>";
					
					//add: table headers
					//added by Mike, 20200806
?>				
					  <tr class="row">
						<td class ="columnTableHeader">				
				<?php
							echo "ADDED DATETIME";
				?>		
						</td>

						<td class ="columnTableHeader">				
				<?php
							echo "PATIENT NAME";
				?>		
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "PF";
							?>
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "X-RAY";
							?>
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "LAB";
							?>
						</td>
						<td class ="columnTableHeaderNotes">				
							<?php
								echo "CLASSIFICATION<br/>& NOTES";
							?>
						</td>

						<td class ="columnTableHeaderNotes">				
							<?php
								echo "TOTAL";
							?>
						</td>
					  </tr>
			<?php


					$iCount = 1;
					foreach ($resultPaid as $value) {
	/*	
					$value = $result[0];
	*/				
			?>				
			
						  <tr class="row">
							<td class ="column">				
								<div class="transactionDate">
					<?php
							//edited by Mike, 20210721
							//TO-DO: -add: official receipt number, et cetera if exist

//							echo str_replace(" ","T",$value['added_datetime_stamp']);

					echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$value['patient_id'].'/'.date("m-d-Y",strtotime($value['transaction_date'])))."' id='viewAcknowledgmentFormId' target='_blank'><b>".

							str_replace(" ","T",$value['added_datetime_stamp'])."</b>
						</a>";
				?>
								</div>								
							</td>
							<td class ="column">				
								<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
									<div class="patientName">
					<?php
									//TO-DO: -update: this
									//echo $value['patient_name'];
									echo str_replace("ï¿½","Ã‘",$value['patient_name']);
	
					?>		
									</div>								
								</a>							
							</td>							
							<td class ="columnFee">				
								<?php
									echo $value['fee'];
								?>
							</td>
							<td class ="columnFee">				
								<?php
									echo $value['x_ray_fee'];
								?>
							</td>
							<td class ="columnFee">				
								<?php
									echo $value['lab_fee'];
								?>
							</td>
							<td class ="columnNotes">				
								<?php
									//edited by Mike, 20200518
									//echo $value['notes'];
									
									if ($value['notes']=="") {
										echo "NONE";
									}
									else {
										echo $value['notes'];
									}
								?>
							</td>
							<!-- added by Mike, 20200518 -->
							<td class ="columnFee">				
								<?php
									$totalFee = $value['fee'] + $value['x_ray_fee'] + $value['lab_fee'];
									//echo $totalFee;

									echo number_format($totalFee, 2, '.', '');
								?>
							</td>
							<td>								
								<?php //edited by Mike, 20200416 
									if ($value['transaction_date']==date('m/d/Y')) {
								?>
								<button onclick="myPopupFunctionDelete(<?php echo $value['medical_doctor_id'].",".$value['patient_id'].",".$value['transaction_id'];?>)" class="Button-delete">DELETE</button>									
									
	<!--							<button onclick="myPopupFunction()" class="Button-purchase">BUY</button>
	-->
								<?php 
									}
								?>
							</td>						
						  </tr>
			<?php				
						$iCount++;		
	//					echo "<br/>";
					}				
					echo "</table>";				
				}				
/*	//removed by Mike, 20210723
			}
*/			
		}
	?>
	<br />
	<br />
	<br />
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>
