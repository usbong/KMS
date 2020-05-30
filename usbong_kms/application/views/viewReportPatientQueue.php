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
' @date created: 20200529
' @date updated: 20200530
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

						td.columnCount
						{
							border: 1px dotted #ab9c7d;		
							text-align: right
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

			//added by Mike, 20200518; edited by Mike, 20200523
			//the following instruction is not yet supported by all computer web browsers
//			if (notes.includes("DEXA")) {
			if (notes.indexOf("DEXA")!==-1) {
				professionalFee = parseInt(professionalFee) + 500;
			}

			if (notes.trim()==="") {
				notes = "NONE";
			}

			//do the following only if value is a Number, i.e. not NaN
			if ((!isNaN(professionalFee)) && (!isNaN(xRayFee)) && (!isNaN(labFee))) {				
				window.location.href = "<?php echo site_url('browse/addTransactionServicePurchase/"+medicalDoctorId+"/"+patientId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+classification+"/"+notes+"');?>";
			}
		}	

		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
		}	
*/
		//added by Mike, 20200529
		function myPopupFunctionDeletePatientTransaction(transactionId) {				
			//TO-DO: -update: this
			window.location.href = "<?php echo site_url('browse/deleteTransactionFromPatient/"+transactionId+"');?>";
		}	


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
		function myPopupFunctionPay(medicalDoctorId,patientId) {				
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
  <body>
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				Search Patient Names<br/>@Information Desk
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<form id="browse-form" method="post" action="<?php echo site_url('browse/confirmPatientInformationDesk')?>">	
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
	<br/>
	<div><b>PATIENT QUEUE TODAY</b></div>
	<br/>

<!--	<div id="myText" onclick="copyText(1)">Text you want to copy</div>
-->	
	<?php
		//added by Mike, 20200530
		$resultCount = 0;

		if ((isset($result)) and ($result!=False)) {
			$resultCount = count($result);
		}

		//list			
		if ($resultCount==0) {		
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';									
		}
		else {
		//get only name strings from array 
//		if (isset($result)) {			
//			if ($result!=null) {		
//				$resultCount = count($result);

				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($result).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($result).'</b> results found.</div>';			
				}			

				echo "<br/>";
				echo "<table class='search-result'>";
				
				$iCount = 0;
?>
				<tr class="row">
						<td class ="column">		
								<div class="tableHeader">
							<?php
								echo "COUNT";
							?>
								</div>
						</td>
						<td class ="column">		
								<div class="tableHeader">
							<?php
								echo "MD COUNT";
							?>
								</div>
						</td>

						<td class ="column">				
								<div class="tableHeader">
				<?php
								echo "PATIENT NAME";
				?>		
								</div>								
						</td>
<!--
						<td class ="column">				
								<div class="tableHeader">
							<?php
								echo "DATE";
							?>
								</div>
						</td>
-->						
						<td class ="column">				
								<div class="tableHeader">
							<?php
									echo "MEDICAL DOCTOR";
							?>
								</div>
						</td>											
						<td class ="column">				
								<div class="tableHeader">
							<?php
									echo "STATUS";
							?>
								</div>
						</td>											
					  </tr>
<?php				
				$iCount = 1;
				$iMedicalDoctorCount = 1;
				$currentMedicalDoctorId = -1; //added by Mike, 20200530
				
				foreach ($result as $value) {
		//			echo $value['report_description'];			
	/*	
					echo $value['patient_name'];				
					echo "<br/><br/>";
	*/	
/*
					if (($value['fee'] == 0) and ($value['x_ray_fee'] == 0)) {
						continue;
					}
*/					
		?>						
					  <tr class="row">
						<td class ="columnCount">				
								<div>
				<?php
								echo $iCount;
				?>		
								</div>								
						</td>

						<td class ="columnCount">				
								<div>
				<?php							
								//added by Mike, 20200530
								if ($currentMedicalDoctorId==-1) {
									$currentMedicalDoctorId = $value['medical_doctor_id'];
								}
								else {									
									if ($currentMedicalDoctorId!==$value['medical_doctor_id']) {
										$currentMedicalDoctorId = $value['medical_doctor_id'];
										$iMedicalDoctorCount = 1;
									}
									else {
										$iMedicalDoctorCount = $iMedicalDoctorCount + 1;
									}
								}
				
								echo $iMedicalDoctorCount;
				?>		
								</div>								
						</td>
	
						<td class ="column">				
							<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="patientNameId<?php echo $iCount?>" onclick="copyTextMOSC(<?php echo $iCount?>)">
								<div class="patientName">
				<?php
//								echo $value['patient_name'];
								//TO-DO: -update: this
								echo str_replace("�","Ñ",$value['patient_name']);
//								echo str_replace("ufffd","Ñ",$value['patient_name']);
				?>		
								</div>								
							</a>
						</td>
<!--
						<td class ="column">				
								<div id="transactionDateId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200518								
//								echo $value['transaction_date'];
//								echo DATE("Y-m-d", strtotime($value['transaction_date']));
								
								if ($value['transaction_date']==0) {
									echo DATE("Y-m-d");
								}
								else {
									echo DATE("Y-m-d", strtotime($value['transaction_date']));
								}
							?>
								</div>
						</td>						
-->
						<td class ="column">				
								<div class="medicalDoctorName" id="medicalDoctorId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200530
//								echo $value['medical_doctor_name'];
//								if ($value['medical_doctor_name']=="") {

								if ($value['medical_doctor_id']==0) { //ANY
									echo "NEW; NONE YET";
								}
								else {
									
									echo $value['medical_doctor_name'];

								}								
								
							?>
								</div>
						</td>						
						<td class ="column">				
								<div>
							<?php
								echo $value['notes'];
/*							
								if (strpos($value['notes'],"PAID")!==false) {
									echo "PAID";
								}
								else if (strpos($value['notes'],"NEW")!==false) {
									echo "PAID";
								}
								else
									echo "NEW; NONE YET";
								}
								else {
									echo $value['medical_doctor_name'];
								}								
*/								
							?>
								</div>
						</td>						
						<td>
							<button onclick="myPopupFunctionDeletePatientTransaction(<?php echo $value['transaction_id'];?>)" class="Button-delete">DELETE</button>									
						</td>
					  </tr>
		<?php				
					$iCount++;		
//					echo "<br/>";
				}				
				
				echo "</table>";				
				echo "<br/>";				
				echo '<div>***NOTHING FOLLOWS***';	
//			}
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