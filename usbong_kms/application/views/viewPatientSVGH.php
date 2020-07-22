<!--
' Copyright 2020 Usbong Social Systems, Inc.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @author: Michael Syson
' @date created: 20200306
' @date updated: 20200722
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

							/* 670px makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							width: 900px
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
							max-width: 50%;
							height: auto;
							float: left;
							text-align: center;
							padding-left: 20px;
							padding-top: 10px;
							padding-right: 20px;
						}

						img.Image-moscLogo {
							max-width: 18%;
							height: auto;
							float: left;
							text-align: center;
						}

						img.Image-svghLogo {
							max-width: 18%;
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

						td.columnCentered
						{
							border: 1px dotted #ab9c7d;		
							text-align: center
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

						.Temperature-textbox { 
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

						.BloodPressure-textbox { 
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

						.Schedule-date { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 10px;
							font-size: 16px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							text-align: right;
							width: 86%;

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

						.ScheduleTime-select { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							font-size: 16px;
							border: 1px solid #68502b;
							width: 100%;
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

		//added by Mike, 20200329; edited by Mike, 20200517
//		function myPopupFunction() {				
		function myPopupFunction(patientId) {	
			//edited by Mike, 20200522
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;			
			var professionalFee = document.getElementById("professionalFeeParam").value;
			var xRayFee = document.getElementById("xRayFeeParam").value;
			var labFee = document.getElementById("labFeeParam").value;
			var classification = document.getElementById("classificationParam").value;
			var notes = document.getElementById("notesParam").value;
			
			//added by Mike, 20200525
//			alert(notes);
			notes = notes.replace(";", "u003B"); //semicolon
			notes = notes.replace(",", "u002C"); //comma
	
			//added by Mike, 20200526
			notes = notes.toUpperCase();
	
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
			if (notes.indexOf("DEXA")!==-1) {
				professionalFee = parseInt(professionalFee) + 500;
			}

			if (notes.trim()==="") {
				notes = "NONE";
			}
			
			//added by Mike, 20200602
			if (notes.indexOf("NC")!==-1) { //gratis, i.e. NO CHARGE
				professionalFee = 0;
			}

			//do the following only if value is a Number, i.e. not NaN
			if ((!isNaN(professionalFee)) && (!isNaN(xRayFee)) && (!isNaN(labFee))) {				
				window.location.href = "<?php echo site_url('browse/addTransactionServicePurchase/"+medicalDoctorId+"/"+patientId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+classification+"/"+notes+"');?>";
			}
		}	


		//added by Mike, 20200713; edited by Mike, 20200719
		function myPopupFunctionAdd(patientId) {	
			//edited by Mike, 20200522
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
/*			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;			
			var professionalFee = document.getElementById("professionalFeeParam").value;
			var xRayFee = document.getElementById("xRayFeeParam").value;
			var labFee = document.getElementById("labFeeParam").value;
			var classification = document.getElementById("classificationParam").value;
			var notes = document.getElementById("notesParam").value;
*/
			var therapistId = document.getElementById("therapistIdParam").selectedIndex;			
			var scheduleDate = document.getElementById("scheduleDateParam").value;
			var scheduleTime = document.getElementById("scheduleTimeParam").value;
			var diagnosis = document.getElementById("diagnosisParam").value;
			var temperature = document.getElementById("temperatureParam").value;
			var bloodPressure = document.getElementById("bloodPressureParam").value;
			
			//added by Mike, 20200525
//			alert(notes);
			diagnosis = diagnosis.replace(";", "u003B"); //semicolon
			diagnosis = diagnosis.replace(",", "u002C"); //comma
			//added by Mike, 20200719
			diagnosis = diagnosis.replace("/", "u2215"); //slash
	
			//added by Mike, 20200526
			diagnosis = diagnosis.toUpperCase();

//			alert("scheduleDate: " + scheduleDate);	
//			alert("scheduleTime: " + scheduleTime);	
			
			if (scheduleTime==="0") {
				scheduleTime = "08:00:00"
			}
			else if (scheduleTime==="1") {
				scheduleTime = "09:00:00"
			}
			else if (scheduleTime==="2") {
				scheduleTime = "10:00:00"
			}
			else if (scheduleTime==="3") {
				scheduleTime = "11:00:00"
			}
			else if (scheduleTime==="4") {
				scheduleTime = "12:00:00"
			}
			else if (scheduleTime==="5") {
				scheduleTime = "13:00:00"
			}
			else if (scheduleTime==="6") {
				scheduleTime = "14:00:00"
			}
			else if (scheduleTime==="7") {
				scheduleTime = "15:00:00"
			}

//			alert("temperature: " + temperature);
//			alert("bloodPressure: " + bloodPressure);
			
			bloodPressure = bloodPressure.replace("/",".");

//			alert("after: " + notes);
			//added by Mike, 20200523
//			alert(medicalDoctorId);

			if (scheduleDate.trim()==="") {
				alert("Pakisulat ang petsa: mm/dd/yyyy");
				return
			}

			if ((diagnosis.trim()==="") || (diagnosis.trim()==="NONE")) {
				diagnosis = "NOT YET WRITTEN";
			}
			
			window.location.href = "<?php echo site_url('browseSVGH/addTransactionServicePurchaseSVGH/"+therapistId+"/"+patientId+"/"+scheduleDate+"/"+scheduleTime+"/"+diagnosis+"/"+temperature+"/"+bloodPressure+"');?>";
		}	


		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
		}	
*/

/*  //removed by Mike, 20200718
		function myPopupFunctionDelete(medicalDoctorId,patientId,transactionId) {				
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;

			//added by Mike, 20200523
//			alert(medicalDoctorId);

			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/deleteTransactionServicePurchase/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"');?>";

		}	
*/
		//added by Mike, 20200529; edited by Mike, 20200704
		function myPopupFunctionDeletePatientTransaction(patientId,transactionId) {				
			//TO-DO: -update: this
			//window.location.href = "<?php echo site_url('browse/deleteTransactionFromPatient/"+transactionId+"');?>";
			
			//edited by Mike, 20200717
//			window.location.href = "<?php echo site_url('browseSVGH/deleteTransactionFromPatient/"+transactionId+"');?>";
			window.location.href = "<?php echo site_url('browseSVGH/deleteTransactionFromPatientSVGH/"+patientId+"/"+transactionId+"');?>";

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
		function myPopupFunctionPay(medicalDoctorId,patientId) {				
			//alert("hallo");
			
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;

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

			window.location.href = "<?php echo site_url('browse/payTransactionServiceAndItemPurchase/"+medicalDoctorId+"/"+patientId+"');?>";
		}	

	  </script>
  <!-- edited by Mike, 20200612 -->
  <body onload="onLoad();">
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">
			<img class="Image-svghLogo" src="<?php echo base_url('assets/images/svghLogo.jpg');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
<!--			//edited by Mike, 20200717		
				Search Patient<br/>@SVGH
-->
				Search Patient Names<br/>@
				<a href='<?php echo site_url('reportSVGH/viewReportPatientAppointmentList/')?>'>
					Information Desk (SVGH)
				</a>

			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<!-- edited by Mike, 20200717 -->
	<form id="browse-form" method="post" action="<?php echo site_url('browseSVGH/confirmPatientInformationDeskSVGH')?>">
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
	<div><b>DATE: </b><?php echo strtoupper(date("Y-m-d, l"));?>
	</div>
	<?php 
		//TO-DO: -update: this to Physical Therapist name, etc
		echo "<b>PHYSICAL THERAPIST: </b>";		

/*
		//edited by Mike, 20200518
		if ($result[0]["medical_doctor_name"]==""){
//			echo "<br/>There are no transactions for the day.";

			//default value
			$result[0]["medical_doctor_name"] = 1; //SYSON, PEDRO
		}

////			echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];		

			echo "<b>MEDICAL DOCTOR: </b>";		
*/

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

			//TO-DO: -update: this to Physical Therapist name, etc

			if (isset($therapistId)) {
			}
			else {
				$therapistId = $result[0]["therapist_id"];
			}
			
			//edited by Mike, 20200713
//			echo "<select id='medicalDoctorIdParam'>";			
			echo "<select id='therapistIdParam'>";			
				foreach ($therapistList as $therapistValue) {
				  //edited by Mike, 20200523
				  //TO-DO: -update: this
/*				  
				  if (($medicalDoctorValue["medical_doctor_id"]=="0") || (($medicalDoctorValue["medical_doctor_id"]=="3"))) {
				  }
				  else {
*/					  
	//				  if ($result[0]["medical_doctor_id"]==$medicalDoctorValue["medical_doctor_id"]) {					  
					  if (isset($therapistId) and ($therapistValue["therapist_id"]==$therapistId)) {
						echo "<option value='".$therapistValue["therapist_id"]."' selected='selected'>".$therapistValue["therapist_name"]."</option>";
					  }			  	  
	/*
					  else if ($result[0]["medical_doctor_id"]==$medicalDoctorValue["medical_doctor_id"]) {
						echo "<option value='".$medicalDoctorValue["medical_doctor_id"]."' selected='selected'>".$medicalDoctorValue["medical_doctor_name"]."</option>";
					  }				  
	*/				  
					  else {
						echo "<option value='".$therapistValue['therapist_id']."'>".$therapistValue["therapist_name"]."</option>";			  
					  }				
				   }
/*
				}
*/				
			echo "</select>";
	?>
	<br/>
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
						<td class ="columnTableHeader">				
							<?php
								echo "SCHEDULE DATE";
							?>
						</td>
						<!-- +added: by Mike, 20200710 -->
						<td class ="columnTableHeader">				
							<?php
								echo "TIME";
							?>
						</td>
						<td class ="columnTableHeaderNotes">				
							<?php
								echo "DIAGNOSIS";
							?>
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "TEMPE<br/>RATURE";
							?>
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "BLOOD<br/>PRESSURE";
							?>
						</td>
<!--
						<td class ="columnTableHeaderNotes">				
							<?php
								echo "ADDITIONAL<br/>NOTES";
							?>
						</td>
-->						
					  </tr>
<?php				
				$iCount = 1;
/*				foreach ($result as $value) {
*/	

				$value = $result[0];

		?>				
		
					  <tr class="row">
						<td class ="column">				
							<!-- edited by Mike, 20200713 -->
							<a href='<?php echo site_url('browseSVGH/viewPatientSVGH/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
								<div class="patientName">
				<?php
								//TO-DO: -update: this
								//echo $value['patient_name'];
								echo str_replace("�","Ñ",$value['patient_name']);
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">
							<!-- edited by Mike, 20200713 -->
<!--
							<input type="date" class="Schedule-date no-spin" placeholder="halimbawa: 2019-09-19" name="reportParam<?php echo $itemCounter;?>" required>	
-->
							<input type="date" class="Schedule-date no-spin" id="scheduleDateParam" required>	

							<!-- edited by Mike, 20200602 -->
							<!-- default value is now 800, instead of 600 -->
<!-- 
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
-->									
						</td>
						<td class="column">
							<select id="scheduleTimeParam" class="ScheduleTime-select">
							  <option value="0">08:00 AM</option>
							  <option value="1">09:00 AM</option>
							  <option value="2">10:00 AM</option>
							  <option value="3">11:00 AM</option>
							  <option value="4">12:00 PM</option>
							  <option value="5">01:00 PM</option>
							  <option value="6">02:00 PM</option>
							  <option value="7">03:00 PM</option>
							</select>						
						</td>
						<td class ="column">				
							<input type="text" id="diagnosisParam" class="Notes-textbox no-spin" value="NONE" required>
						</td>
						<td class ="column">
							<input type="tel" id="temperatureParam" class="Temperature-textbox no-spin" value="36.10" min="1" max="9999999" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;
						
									if (this.value.length == 7) {
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>
						</td>
						<td class="column">
<!--
							<select id="classificationParam" class="Classification-select">
							  <option value="0">WI</option>
							  <option value="1">SC</option>
							  <option value="2">PWD</option>
							</select>						
-->
<!-- TO-DO: -update: this -->
						<input type="tel" id="bloodPressureParam" class="BloodPressure-textbox no-spin" value="120/80" min="1" max="9999999" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;
						
									if (this.value.length == 7) { //5
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>						
						</td>
<!--						
						<td class="column">
							<input type="text" id="notesParam" class="Notes-textbox no-spin" value="NONE" required>
						</td>						
-->						
					    <td>		
							<button onclick="myPopupFunctionAdd(<?php echo $value['patient_id'];?>)" class="Button-purchase">ADD</button>									
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

			//removed by Mike, 20200713
/*
			//added by Mike, 20200401
			echo '<h3>Cart List</h3>';

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
				
				foreach ($cartListResult as $cartValue) {

////				$value = $result[0];
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
									else if ($cartValue['item_type_id']==2) { //2 = NON-MEDICINE
										echo site_url('browse/viewItemNonMedicine/'.$cartValue['item_id']);
									}
								}								
								?>'>
								<div class="itemName">
				<?php
								//edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									//TO-DO: -update: this
									//echo $cartValue['patient_name'];
									echo str_replace("�","Ñ",$cartValue['patient_name']);
								}
								else {
									echo $cartValue['item_name'];
								}
				?>		
								</div>								
							</a>
						</td>
						<td class ="columnFee">				
								<div id="cartItemPriceId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200414
//								echo $cartValue['item_price'];

								//added by Mike, 20200415; edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									$iQuantity =  1;

									$patientFee = $cartValue['fee']+$cartValue['x_ray_fee']+$cartValue['lab_fee'];
									echo number_format($patientFee, 2, '.', '');
								}
								else {
									if ($cartValue['fee_quantity']==0) {
	//									$iQuantity =  1;
										$iQuantity =  floor(($cartValue['fee']/$cartValue['item_price']*100)/100);
									}
									else {
										$iQuantity =  $cartValue['fee_quantity'];
									}
									
									echo number_format($cartValue['fee']/$iQuantity, 2, '.', '');
								}

//								//edited by Mike, 20200419
//								//echo $cartValue['fee']/$iQuantity;	
////								echo number_format($cartValue['fee']/$iQuantity, 2, '.', '');

							?>
								</div>
						</td>
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
								
////								if ($cartValue['fee_quantity']==0) {
////									echo 1;
////								}
////								else {
////									echo $cartValue['fee_quantity'];
////								}
								
								echo $iQuantity;
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
							<button onclick="myPopupFunctionDelete(<?php echo $value['medical_doctor_id'].",".$value['patient_id'].",".$cartValue['transaction_id'];?>)" class="Button-delete">DELETE</button>									
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
							<!-- added by Mike, 20200612 -->
							<input type="hidden" id="payMedicalDoctorIdParam" value="<?php echo $value['medical_doctor_id'];?>">
							<input type="hidden" id="payPatientIdParam" value="<?php echo $value['patient_id'];?>">

							<button onclick="myPopupFunctionPay(<?php echo $value['medical_doctor_id'].",".$value['patient_id']?>)" class="Button-purchase">PAY</button>
						</td>						
					  </tr>
<?php
				echo "</table>";				
			}

////			echo "<br/>";
*/
			echo '<h3>Patient Purchased Service History</h3>';

			if ((!isset($value)) or ($value['transaction_date']=="")) {				
				echo '<div>';					
				echo 'There are no transactions.';
				echo '</div>';					
			}
			else {
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
						<td class ="columnTableHeader">				
							<?php
								echo "SCHEDULE<br/>DATE & TIME";
							?>
						</td>
						<td class ="columnTableHeaderNotes">				
							<?php
								echo "THERAPIST<br/>NAME";
							?>
						</td>
						<td class ="columnTableHeaderNotes">				
							<?php
								echo "DIAGNOSIS";
							?>
						</td>
						<td class ="columnTableHeaderFee">				
							<?php
								echo "TEMPE<br/>RATURE";
							?>
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "BLOOD<br/>PRESSURE";
							?>
						</td>
					  </tr>
<?php					
					//add: table headers
					$iCount = 1;
					foreach ($resultPaid as $value) {
	/*	
					$value = $result[0];
	*/				
			?>				
			
						  <tr class="row">
							<td class ="columnCentered">				
								<div class="transactionDate">
					<?php
									//edited by Mike, 20200507
									//echo $value['transaction_date'];
									//echo $value['added_datetime_stamp'];
									echo str_replace(" ","T",$value['added_datetime_stamp']);
					?>		
								</div>								
							</td>
							<td class ="column">				
								<a href='<?php echo site_url('browseSVGH/viewPatientSVGH/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
									<div class="patientName">
					<?php
									//TO-DO: -update: this
									//echo $value['patient_name'];
									echo str_replace("�","Ñ",$value['patient_name']);
	
					?>		
									</div>								
								</a>							
							</td>							
							<td class ="columnCentered">				
								<?php
									//edited by Mike, 20200715
									//echo $value['treatment_datetime_stamp'];
									//edited by Mike, 20200719
									//echo str_replace(" ","T", $value['treatment_datetime_stamp']);
//									echo str_replace(" ","<br/>", $value['treatment_datetime_stamp']);
									//edited by Mike, 20200722
									//note: this is due to the following removed function is not available in PHP 5.3
									//$iDate = str_replace(" ", "", explode(" ",$value['treatment_datetime_stamp'])[0]);
									$outputDateArray = explode(" ",$value['treatment_datetime_stamp']);
									$iDate = str_replace(":00", "", $outputDateArray[0]);
																		
									echo $iDate."<br/>";
									
									//edited by Mike, 20200722
									//note: this is due to the following removed function is not available in PHP 5.3
									//$iTime = str_replace(":00", "", explode(" ",$value['treatment_datetime_stamp'])[1]);
									$outputTimeArray = explode(" ",$value['treatment_datetime_stamp']);
									$iTime = str_replace(":00", "", $outputTimeArray[1]);


									if ($iTime==12) {
										echo $iTime.":00 PM";
									}									
									else if ($iTime>12) {
										$iTime = $iTime - 12;
										echo "0".$iTime.":00 PM";
									}									
									else {
										echo $iTime.":00 AM";
									}


								?>
							</td>
							<td class ="column">				
								<?php
									echo $value['therapist_name'];
								?>
							</td>
							<td class ="column">				
								<?php
									echo $value['treatment_diagnosis'];
								?>
							</td>
							<td class ="columnCentered">				
								<?php
									echo $value['treatment_temperature'];
								?>
							</td>
							<td class ="columnCentered">				
								<?php
									//edited by Mike, 20200715
									//echo $value['treatment_bp'];
									echo str_replace(".","/", $value['treatment_bp']);

								?>
							</td>
							<td>								
								<?php 
									//TO-DO: -update: this
									//edited by Mike, 20200416 
									if ($value['transaction_date']==date('m/d/Y')) {
								?>								
<!--							//edited by Mike, 20200717								
								<button onclick="myPopupFunctionDelete(<?php echo $value['medical_doctor_id'].",".$value['patient_id'].",".$value['transaction_id'];?>)" class="Button-delete">DELETE</button>									
-->
								<button onclick="myPopupFunctionDeletePatientTransaction(<?php echo $value['patient_id'].",".$value['transaction_id'];?>)" class="Button-delete">DELETE</button>									
									
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
			}
		}
	?>
	<br />
	<br />
	<br />
	<br />
	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>		 
  </body>
</html>