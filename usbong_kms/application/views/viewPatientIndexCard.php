<!--
  Copyright 2020~2025 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200818
  @date updated: 20250820; from 20250819
  @website address: http://www.usbong.ph

  //TO-DO: -add: search earlier transactions, e.g. earlier than 2 years ago; 
  //notes: earlier transaction tables are named based on Year, 2020
  
  //TO-DO: update: indent in instructions
  
   Reference:
   1) https://stackoverflow.com/questions/74865684/php-utf8-en-decode-deprecated-what-can-i-use; last accessed: 20240301
   answer by: Eugene Kaurov, 20230216T1657
     
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
							width: 780px; /*960px*/
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
		
						img.Image-indexCard {
							max-width: 100%;
							height: auto;
							float: left;
							text-align: center;
							padding-left: 0px;
							padding-top: 0px;
						}
		
						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						input.inputText
						{
							font-size: 12pt;	
							width: 92%;							
						}

						input.inputTextPatientName
						{
							font-size: 12pt;	
							width: 92%;			
							visibility: visible;
							border: 2pt solid #0000dd;	
						}

						input.browse-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
						}	

						span.spanAgeFieldName
						{
							background-color: #00ff00; <!--#93d151; lime green-->
						}

						span.spanSexFieldName
						{
							background-color: #00ff00; <!--#93d151; lime green-->
						}								

						span.spanTotalFeeGold
						{							
							color: #ff8000;	
						}

						table.bottomSectionTable
						{
							width: 100%;
						}

						table.indexCardImageListTable
						{
							width: 100%;
						}

						tr.rowEvenNumber {
							background-color: #dddddd; <!--#dddddd; = gray #95b3d7; = sky blue; use as row background color-->
							border: 1pt solid #00ff00;		
						}
						
						td.tableHeaderColumn
						{
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
							text-align: left;
							font-weight: bold;							
							width: 16%; <!-- 17%; --> <!-- 84% -->
						}						

						td.addressAnswerColumn
						{
							width: 25%; <!-- 84% -->
						}						

						td.postalAddressAnswerColumn
						{
							width: 10%;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;		
						}						

						td.columnTransactionDate
						{
							width: 12%;
							border: 1px dotted #ab9c7d;		
							text-align: center;							
						}		

						/* added by Mike, 20210407 */
						td.columnTotalFee
						{
							border: 1px dotted #ab9c7d;		
							text-align: right; /* edited by Mike, 20210408 */
							color: #ff8000;	
							font-weight: bold;													
						}	

						/* added by Mike, 20210407 */
						td.columnGrandTotalName
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;							
							font-weight: bold;													
						}	
						
						td.columnField
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
						}						

						td.columnName
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;							
						}						

						td.columnNumber
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
							width: 8%;
							padding-left: 2em;
						}						

						td.columnTableHeaderClassification
						{
							font-weight: bold;
							background-color: #00ff00;
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 15%;
						}								

						td.columnNumberQuantityTotal
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
							color: #ff8000;	
						}						

						td.columnNotes
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}
						
						td.columnClassification
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;	
						}

						td.columnFieldNameAge
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
							width: 25%;
						}					

						td.columnTableHeader
						{
							font-weight: bold;
							background-color: #00ff00; 
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
						
						td.columnTableHeaderNotes
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 26%;
						}								
						
						td.columnDateToday
						{
							padding-left: 0px;
							text-align: left;
							width: 26%;
						}		

						td.columnTableHeaderDate
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;
							padding-left: 0px;
							text-align: center;
							width: 1%;
						}		

						td.columnTableHeaderIndexCard
						{
							font-weight: bold;
							text-align: right;
							width: 10%; /*26%*/
						}						

						td.imageColumn
						{
							width: 40%;
							display: inline-block;
						}						

						td.pageNameColumn
						{
							width: 58%; /*59%*/
							display: inline-block;
							text-align: right;
							font-size: 22px;
						}						

						.Fee-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 8px;
							
							font-size: 16px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							text-align: right;
							width: 120%;

							float: right;
						}

						td.formDateColumn
						{
							width: 50%;
							text-align: right;
						}												

						td.updateIndexCardColumn
						{
							width: 100%; /*90%*/
							display: inline-block;
							text-align: right;
						}						

						td.foldUnfoldIndexCardImageListColumn
						{
							width: 100%; /*90%*/
							display: inline-block;
							text-align: right;
						}						

						div.checkBox
						{
							border: 1.5pt solid black; height: 14pt; width: 14pt;
							text-align: center;
							float: left
						}

						<!-- added by Mike, 20210209 -->
						input.inputCheckBox
						{
							border: 1.5pt solid black; height: 14pt; width: 14pt;
							text-align: center;
							float: left;
						}

						input[type="checkbox"] {
							transform: scale(1.0);
							margin-left: 1.0em;					
						}		

						input[type="radio"] {
							transform: scale(1.0);
							margin-left: 1.0em;					
						}		
						
						input.inputAgeTextBox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 0px;
							padding-right: 0.2em;
							
							font-size: 18px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							text-align: right;
							width: 30%;
						}

						/* added by Mike, 20210210 */
/* removed by Mike, 20210307						
						input[type=tel]:focus 
						{
							/*color:#0011f1;*/
							border: 1.7px solid #0011f1; /*black;*/
*/						}
						

						div.buttonSubmitUpdate
						{
							font-size: 16px;
/*							//removed by Mike, 20210210
							font-weight: bold;
*/
						}

						div.buttonDeleteImage
						{
							font-size: 16px;
						}

						select.medicalDoctorSelect
						{
							font-size: 12pt;
							text-align: right;							
						}
						
						option.medicalDoctorOption
						{
							font-size: 12pt;
						}	

						table.tableIndexCardImage
						{
							border: 2px solid #00ddaa; /*river sea blue green;*/
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

						button.saveButton {
							background-color: #ffffff;
							border: 0px dotted #333333;
							font-size: 20px;
							padding: 0;
							margin-right: -0.2em;
						}
						
						button.saveButton:hover {
							background-color: #cccccc;
							border: 0px solid #333333;
							font-size: 20px;
							padding: 0;
							margin-right: -0.2em;
						}
						
						button.saveButton:active {
							background-color: #cccccc;
							border: 0px solid #333333;
							font-size: 20px;
							padding: 0;
						}	

						button.copyToClipboardButton {
							background-color: #ffffff;
							border: 0px dotted #333333;
							font-size: 20px;
							padding: 0;
						}
						
						button.copyToClipboardButton:hover {
							background-color: #cccccc;
							border: 0px solid #333333;
							font-size: 20px;
							padding: 0;
						}
						
						button.copyToClipboardButton:active {
							background-color: #cccccc;
							border: 0px solid #333333;
							font-size: 20px;
							padding: 0;
						}				
						
<!-- added by Mike, 20210210 -->
<!-- Reference: https://stackoverflow.com/questions/7291873/disable-color-change-of-anchor-tag-when-visited; 
	last accessed: 20200321
	answer by: Rich Bradshaw on 20110903T0759
	edited by: Peter Mortensen on 20190511T2239
-->
						a {color:#0011f1;}         /* Unvisited link  */
						a:visited {color:#0011f1;} /* Visited link    */
						a:hover {color:#0011f1;}   /* Mouse over link */
						a:active {color:#593baa;}  /* Selected link */												

    /**/
    </style>
    <title>
      MARIKINA ORTHOPEDIC SPECIALTY CLINIC (MOSC): INDEX CARD
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
		//added by Mike, 20210211
		function myPopupFunction(patientId) {	
			//edited by Mike, 20200522
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;			
			var sexId = document.getElementById("selectSexIdParam").selectedIndex;			
			var ageUnitId = document.getElementById("selectAgeUnitIdParam").selectedIndex;			

//			alert("medicalDoctorId"+medicalDoctorId);
			//0 = ANY; SUMMARY = 3
			if ((medicalDoctorId==0) || (medicalDoctorId==3)) {
				alert("Pumili ng Medical Doctor na hindi \"ANY\" o \"SUMMARY\".");
				return;
			}

			//added by Mike, 20230331
			if (medicalDoctorId==3) {
				alert("Pumili ng Medical Doctor na hindi \"--\".");
				return;
			}


//			alert("sexId"+sexId);
//			alert("ageUnitId"+ageUnitId);

			var iInputCheckBoxCount=0;
			var iInputCheckBoxCountMax=40;
			
			//note: this does not update hidden input value sent via form POST command
//			document.getElementById("inputSelectSexNameParam").value = sexId;

/*
			window.location.href = "<?php echo site_url('browse/addTransactionServicePurchase/"+medicalDoctorId+"/"+patientId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+classification+"/"+notes+"');?>";
*/			
		}		 

		//added by Mike, 20210320
		function myFoldIndexCardImageListFunction(iPatientId) {			
//			alert("hallo");			

			bFoldImageListValue = document.getElementById("foldImageListId").value;
			
			//0=FALSE; 1=TRUE
			if (bFoldImageListValue==0) {
				bFoldImageListValue=1;
			}
			else {
				bFoldImageListValue=0;
			}

			//note: we reload page with updated parameter, 
			//so we can use PHP command to execute if-else using its updated value
			document.getElementById("foldImageListId").setAttribute('value',bFoldImageListValue);	

//			alert("bFoldImageListValue: "+bFoldImageListValue);			
				
			//note: reload causes value to be reset
//			location.reload();

			window.location.href = "<?php echo site_url('browse/viewPatientIndexCard/"+iPatientId+"/"+bFoldImageListValue+"');?>";			
		}
				
		//added by Mike, 20210630
		function myDeleteIndexCardImageFunction(iPatientId,iIndexCardImageId) {
//			alert("hallo");			

//			bFoldImageListValue = document.getElementById("foldImageListId").value;
			
//			alert("bFoldImageListValue: "+bFoldImageListValue);			
				
			//note: reload causes value to be reset
//			location.reload();

			window.location.href = "<?php echo site_url('browse/deletePatientIndexCard/"+iPatientId+"/"+iIndexCardImageId+"');?>";			
		}
		
		//added by Mike, 20211201
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
			window.location.href = "<?php echo site_url('browse/deleteTransactionServicePurchaseIndexCardPage/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"');?>";
		}	
		
		//added by Mike, 20250819; from 20250404
		function mySaveFunctionItemName(medicalDoctorId,patientId,transactionId) {				
		//function mySaveFunctionItemName(medicalDoctorId,patientId,transactionId,bIsPrivate) {
			var professionalFee = document.getElementById("professionalFeeParam").value;			
			var xRayFee = document.getElementById("xRayFeeParam").value;			
			var labFee = document.getElementById("labFeeParam").value;		
			
			//added by Mike, 20250819
			var bIsPrivate = document.getElementById("privCheckBoxParam").checked;	

			//added by Mike, 20250820
			var iClassParam = document.getElementById("classificationParam").selectedIndex;

			//alert(iClassParam);
			
			var sClass = "WI";
			
			if (iClassParam===1) {
				sClass = "SC";
			}
			else if (iClassParam===2) {
				sClass = "PWD";
			}
			
			//alert(sClass);
			
/*			
			alert(bIsPrivate);			
			return;
*/			
			var iIsPrivate=0;
			if (bIsPrivate) {
				iIsPrivate=1;
			}

			//added by Mike, 20200523
//			alert(medicalDoctorId);
/*
			alert("professionalFee: "+professionalFee);
			alert("xRayFee: "+xRayFee);
			alert("labFee: "+labFee);
*/			

			//window.location.href = "<?php echo site_url('browse/updateTransactionServicePurchaseIndexCardPage/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"');?>";
			
			//	public function updateTransactionServicePurchaseIndexCardPage($medicalDoctorId, $patientId, $transactionId, $professionalFee, $xRayFee, $labFee)
			
			//edited by Mike, 20250819			
			//window.location.href = "<?php echo site_url('browse/updateTransactionServicePurchaseIndexCardPage/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"');?>";

			//alert(notes);
			//edited by Mike, 20250820
			//window.location.href = "<?php echo site_url('browse/updateTransactionServicePurchaseIndexCardPage/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+iIsPrivate+"');?>";

			window.location.href = "<?php echo site_url('browse/updateTransactionServicePurchaseIndexCardPage/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+iIsPrivate+"/"+sClass+"');?>";
			
		}	
		
		//added by Mike, 20250414
		function validateForm() {
			var patientName = document.getElementById("patientNameId").value;	
			var inputTextPatientName = document.getElementById("inputTextPatientNameId").value;	
			
			//added by Mike, 20250503
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;	
			
			//alert(medicalDoctorId);
			
			//alert(inputTextPatientName);
						
			if (inputTextPatientName.trim()==="") {
				alert ("( ! ) An empty PATIENT NAME is not valid.");
				return false;
			}

			//ANY or --
			if ((medicalDoctorId==="0") || (medicalDoctorId==="3")) {
				alert ("( ! ) Please choose a valid Medical Doctor.");
				return false;
			}
			
			return true;
		}
		
		function myCopyToClipboardFunction(inputText) {
		  var sCopyText = inputText;

		  //alert("itemText: " + itemText);	

	      //reference: 
		  //1) https://stackoverflow.com/questions/51805395/navigator-clipboard-is-undefined;
		  //last accessed: 20250326
		  //note available if not using HTTPS with the "S"
		  // Copy the text inside the text field
		  //navigator.clipboard.writeText(copyText.innerText);		

		  //2) https://github.com/josdejong/svelte-jsoneditor/issues/98;
		  //last accessed: 20250326
		  //3) https://stackoverflow.com/questions/400212/how-do-i-copy-to-the-clipboard-in-javascript/33928558#33928558; last accessed: 20250325
		  //answer by nikksan, 20170914
		  //edited by Korayem, 20200217

		  var input = document.createElement('textarea');
		  input.innerHTML = sCopyText; //copyText.innerText;
		  document.body.appendChild(input);
		  input.select();
		  var result = document.execCommand('copy');
		  document.body.removeChild(input);
	
		  // Alert the copied text
		  alert("Copied: " + sCopyText); //copyText.innerText);	
		}			
	  </script>
  <body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');
	
	//edited by Mike, 20200726
	//$dateToday = (new DateTime())->format('Y-m-d');
	$dateToday = Date('Y-m-d');

	// connect to the database
//	include('usbong-kms-connect.php');
//	$mysqli->set_charset("utf8");
	
	//edited by Mike, 20210206
//	$filename="C:\\xampp\\htdocs\\usbong_kms\\kasangkapan\\phantomjs-2.1.1-windows\\bin\\output\\2015\\201505~201507.csv";
//edited by Mike, 20210208
//update file location
//	$filename="G:\\Usbong MOSC\\Everyone\\Information Desk\\Laboratory\\templates\\MOSCLabRequestForm.csv";

	//added by Mike, 20210320
	//TO-DO: -add: filename location in Database, so that no need to edit viewPatientIndexCard .php file 
	  
//edited by Mike, 20210209
//	$filename="D:\\Usbong\\LABORATORY\\templates\\MOSCLabRequestForm.csv";
	  
//edited by Mike, 20210320; edited again by Mike, 20220317; from 20210408
	$filename="C:\\xampp\\htdocs\\usbong_kms\\usbongTemplates\\MOSCIndexCard.csv";
//	$filename="/opt/lampp/htdocs/usbong_kms/usbongTemplates/MOSCIndexCard.csv";
	  
	if (!file_exists($filename)) {
		$filename="/opt/lampp/htdocs/usbong_kms/usbongTemplates/MOSCIndexCard.csv";
	}  
	  
	//added by Mike, 20210208
	$iCheckboxCount=0;
	
	//added by Mike, 20210209
	$iCount = 1;
	$value = $result[0];
	
?>
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<b>
				Search Patient<br/>

<!--				@INDEX CARD PAGE
-->				
					<a href='<?php echo site_url('browse/viewPatientIndexCard/'.$result[0]['patient_id'].'/0')?>' id="viewPatientIndexCard">
						<div class="patientName">
		<?php
						echo "@INDEX CARD PAGE"
		?>		
						</div>								
					</a>				
			</b>		
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
	<table>
		<tr>
			<td class="columnDateToday">
				<b>DATE: </b><?php echo strtoupper(date("Y-m-d, l"));?>
			</td>
			<td class="columnTableHeaderIndexCard">
				<?php
					//edited by Mike, 20210720
					/*echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$value['patient_id'])."' id='viewAcknowledgmentFormId' target='_blank'>
							ACKNOWLEDGMENT FORM
						</a>";
					*/
						//edited by Mike, 20250508
						// or ($value['transaction_date']=="")
						if (!isset($resultPaid[0]['added_datetime_stamp'])) {
							echo "ACKNOWLEDGMENT FORM<br/>NOT YET AVAILABLE";
						}
						else {
							//note: we update the date format to m/d/y in Browse.php (Controller folder)
							//edited by Mike, 20250610
/*							
							echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$value['patient_id'].'/'.date("m-d-Y"))."' id='viewAcknowledgmentFormId' target='_blank'>
									ACKNOWLEDGMENT FORM
								</a>";
*/								
								echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$value['patient_id'].'/'.date("m-d-Y",strtotime($resultPaid[0]['transaction_date'])))."' id='viewAcknowledgmentFormId' target='_blank'>
									ACKNOWLEDGMENT FORM
								</a>";

						}
				?>
				
			</td>
		</tr>
	</table>


<!-- added by Mike, 20210209 -->
<!-- TO-DO: -add: lab request list for the day -->
<!-- Form -->
<form id="indexCardId" method="post"action="<?php echo site_url('browse/confirmUpdateIndexCardForm/'.$result[0]['patient_id'].'/0')?>" onsubmit="return validateForm()">
	<?php 
		//edited by Mike, 20200518
		if ($result[0]["medical_doctor_name"]==""){
//			echo "<br/>There are no transactions for the day.";

			//default value
			$result[0]["medical_doctor_name"] = 1; //SYSON, PEDRO
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

			if (isset($medicalDoctorId)) {
			}
			else {				
				$medicalDoctorId = $result[0]["medical_doctor_id"];				
			}
			
			//edited by Mike, 20210318
			//echo "<select id='medicalDoctorIdParam'>"
			echo "<select id='medicalDoctorIdParam' name='selectMedicalDoctorNameParam'>";			
				foreach ($medicalDoctorList as $medicalDoctorValue) {
				  //added by Mike, 20230328
				  //note: "SUMMARY" ID NOW SET TO BE LAST IN MEDICAL DOCTOR TABLE LIST
				  if (strpos($medicalDoctorValue["medical_doctor_name"],"SUMMARY")!==false) {				  
					continue;
				  }

				  //added by Mike, 20230327
				  //note: "BALCE, GRACIA CIELO" ID NOW SET TO BE LAST before "SUMMARY" IN MEDICAL DOCTOR TABLE LIST
				  if (strpos($medicalDoctorValue["medical_doctor_name"],"BALCE, GRACIA CIELO")!==false) {				  
					continue;
				  }

				  //added by Mike, 20230331
				  if (strpos($medicalDoctorValue["medical_doctor_name"],"ESPINOSA, JHONSEL")!==false) {				

					$medicalDoctorValue["medical_doctor_name"]="--";
				  
					//continue;
				  }
				  
/*				
				  //added: by Mike, 20230328; remove: in list, ESPINOSA, JHONSEL (ID#3); note: select OPTIONS count;
				  //note: select options count when page is loaded
				  if (strpos($medicalDoctorValue["medical_doctor_name"],"ESPINOSA, JHONSEL")!==false) {				  
					continue;
				  }
*/
					
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
<?php
/*
    echo "<b>MARIKINA ORTHOPEDIC SPECIALTY CLINIC</b><br/>";
    echo "<b>OUT-PATIENT ORTHOPEDICS, X-RAY, PHYSICAL AND OCCUPATION THERAPY</b><br/>";
    echo "<b>#2 E. MANALO AVE., STO. NIÑO, 1820, MARIKINA CITY, PHILIPPINES</b><br/>";
    echo "<b>TEL. NO. (8) 941-4888; MONDAY - SATURDAY; 9:00 A.M. -  5:00 P.M.</b><br/>";
*/

//removed by Mike, 20210209
//	echo "<table>";

/*
	echo "<tr>";
	echo "<td>";
*/					
	//TO-DO: -add: notes column

	//table headers
?>	
<!--
	<tr>
	<td class='tableHeaderColumn'><b>COUNT</b></td>
	<td class='tableHeaderColumn'><b>BODY LOCATION</b></td>
	<td class='tableHeaderColumn'><b>TYPE</b></td>
	<td class='tableHeaderColumn'><b>PRICE</b></td>
	<td class='tableHeaderColumn'><b>SC/PWD<br/>PRICE</b></td>
	<tr>
-->

<?php
//echo "<br/>";
	echo "<table>";
				
	//TO-DO: -add: auto-identify and update date format to use YYYY-MM-DD
	
	echo '<tr class="row">';

	//removed by Mike, 20240301
	//deprecated
	//ini_set('auto_detect_line_endings', true);

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
				
				//edited by Mike, 20240301; from 20210306
				//deprecated
				//$cellValue = utf8_encode($data[$iColumnCount]);
				$cellValue = mb_convert_encoding($data[$iColumnCount], "UTF-8", mb_detect_encoding($data[$iColumnCount]));

				
				if (is_numeric($cellValue)) {
					if ((strpos($cellValue,"#")!==false)) {
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
						$cellValue = number_format($cellValue, 2, '.', ',');
					}
					echo "<td class='column' style='text-align:right'><b>".$cellValue."</b></td>";
				}
				else {

//					if (($iColumnCount+1<count($data)) and ((utf8_encode($data[$iColumnCount+1]))=="TOTAL")) {
/*	//removed by Mike, 20210208					
					if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="DATE")) {
					echo "<td class='column' style='text-align:center'>".strtoupper(date('Y-m-d, l'))."</td>";
					}						
					else {
*/					
						//edited by Mike, 20210206
						//$cellValue=str_replace("?", "<div class='checkBox'></div>",$cellValue);
						if (strpos($cellValue,"?")!==false) {							
							//edited by Mike, 20210209
//							$cellValue=str_replace("?", "<input type='checkBox' id='".$iCheckboxCount."'>",$cellValue);

//edited by Mike, 20210211
//							$cellValue=str_replace("?", "<input class='inputCheckBox' type='checkBox' id='".$iCheckboxCount."'>",$cellValue);
//							$cellValue=str_replace("?", "<input class='inputCheckBox' type='checkBox' name='1'>",$cellValue);
							$cellValue=str_replace("?","",$cellValue);

//echo $iCheckboxCount.": ".$cellValue."<br/>";
//removed by Mike, 20210213
//echo $cellValue."<br/>";

//							$cellValue="<input class='inputCheckBox' type='checkBox' name='1' form='indexCardId'>".$cellValue;
//							$cellValue="<input class='inputCheckBox' type='checkBox' name='".$iCheckboxCount."'>".$cellValue;
							$cellValue="<input class='inputCheckBox' type='checkBox' name='inputCheckBox".$iCheckboxCount."'>".$cellValue;


							//added by Mike, 20210211
/* //removed by Mike, 20210211							
							if (strpos($cellValue, "OTHERS:")!==false) {
								$cellValue=$cellValue;
							}
*/							
							$iCheckboxCount=$iCheckboxCount+1;
						}
						//edited by Mike, 20240301; from 20210306
						//deprecated
						//if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="PHYSICIAN")) {							
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="PHYSICIAN") {

							if ($result[0]["medical_doctor_name"]==""){							
								//default value
								//edited by Mike, 20210212
								//$result[0]["medical_doctor_name"] = "SYSON, PEDRO (DEFAULT)";
								$cellValue="SYSON, PEDRO (DEFAULT)";
							}
							else {
								$cellValue=$result[0]["medical_doctor_name"];
							}
						}
						//edited by Mike, 20240301; from 20210306
						//deprecated
//						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="PATIENT NAME")) {						
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="PATIENT NAME") {
							
						//edited by Mike, 20250414

						$cellValue="<a href='".site_url('browse/viewPatient/'.$value['patient_id'])."' id='viewPatientId'>
						<div class='patientName' id='patientNameId'>".
								//edited by Mike, 20220317
								//str_replace('ï¿½','Ã‘',$value['patient_name'])."
								str_replace("�","Ñ",$value['patient_name'])."
							</div>								
						</a>";
					
?>						
		<input type="hidden" name="patientIdNameParam" value="<?php echo $value['patient_id'];?>" form="indexCardId">
<?php
						}
/*						
						//added by Mike, 20250414
						else if (($iColumnCount-2>=0) and (mb_convert_encoding($data[$iColumnCount-2], "UTF-8", mb_detect_encoding($data[$iColumnCount-2])))=="PATIENT NAME") {
							echo "<button class='saveButton' onclick=''>💾</button>";
						}
*/						
						//edited by Mike, 20240301; from 20210211
						//deprecated
						//$cellValue = utf8_encode($data[$iColumnCount]);
						//else if ((utf8_encode($data[$iColumnCount])=="OTHERS ANSWER")) {
						else if ($data[$iColumnCount]=="OTHERS ANSWER") {
							$cellValue=str_replace("OTHERS ANSWER","<input class='inputText' type='text' id='inputTextOthersAnswerId' name='inputTextOthersAnswerNameParam' form='indexCardId'>",$cellValue);
						}
						
/*	//removed by Mike, 20210210
						//added by Mike, 20210210
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="ADDRESS")) {
							//TO-DO: -add: patient address in patient table of MySQL database

//							$cellValue="<textarea class='inputText' rows='3' id='inputTextAddressId' form ='indexCardId'></textarea>";


							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
						else if (($iColumnCount-2>=0) and (utf8_encode($data[$iColumnCount-2])=="ADDRESS")) {
							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
						else if (($iColumnCount-3>=0) and (utf8_encode($data[$iColumnCount-3])=="ADDRESS")) {
							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
*/						
						//edited by Mike, 20240301; from 20210306
						//deprecated
//						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="PWD/SENIOR")) {					
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="PWD/SENIOR") {

							//added by Mike, 20210319
/*							
							if (isset($result[0]["pwd_senior_id"])){
								$cellValue="<input class='inputText' type='text' id='inputTextPwdSeniorId' name='inputTextPwdSeniorIdNameParam' placeholder='IDENTIFICATION' form='indexCardId' value='".$result[0]["pwd_senior_id"]."' required>";
							}
							else {
								$cellValue="<input class='inputText' type='text' id='inputTextPwdSeniorId' name='inputTextPwdSeniorIdNameParam' placeholder='IDENTIFICATION' form='indexCardId' required>";
							}
*/							
							$myValue="";
							if (isset($result[0]["pwd_senior_id"])){
								$myValue=$result[0]["pwd_senior_id"];
							}
							//edited by Mike, 20210803
							//$cellValue="<input class='inputText' type='text' id='inputTextPwdSeniorId' name='inputTextPwdSeniorIdNameParam' placeholder='IDENTIFICATION' form='indexCardId' value='".$myValue."' required>";
							$cellValue="<input class='inputText' type='text' id='inputTextPwdSeniorId' name='inputTextPwdSeniorIdNameParam' placeholder='IDENTIFICATION' form='indexCardId' value='".$myValue."'>";

						}
						//edited by Mike, 20240301; from 20210306
						//deprecated
//						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="CIVIL STATUS")) {
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="CIVIL STATUS") {
							$cellValue="<select id='selectCivilStatusIdParam' name='selectCivilStatusNameParam' form='indexCardId'>";
							
							  if (isset($result[0]["civil_status_id"])) {
								  if ($result[0]["civil_status_id"]==0) {
									$cellValue=$cellValue."<option value='0' selected='selected'>SINGLE</option>
									<option value='1'>MARRIED</option>
									<option value='2'>WIDOWED</option>
									<option value='3'>SEPARATED</option>";
								  }
								  else if ($result[0]["civil_status_id"]==1) {
									$cellValue=$cellValue."<option value='0'>SINGLE</option>
									<option value='1' selected='selected'>MARRIED</option>
									<option value='2'>WIDOWED</option>
									<option value='3'>SEPARATED</option>";
								  }
								  else if ($result[0]["civil_status_id"]==2) {
									$cellValue=$cellValue."<option value='0'>SINGLE</option>
									<option value='1'>MARRIED</option>
									<option value='2' selected='selected'>WIDOWED</option>
									<option value='3'>SEPARATED</option>";
								  }
//								  else if ($result[0]["sex_id"]==3) {
								  else {
									$cellValue=$cellValue."<option value='0'>SINGLE</option>
									<option value='1'>MARRIED</option>
									<option value='2'>WIDOWED</option>
									<option value='3' selected='selected'>SEPARATED</option>";
								  }								  
							  }			  	  
							  else {
								$cellValue=$cellValue."<option value='0' selected='selected'>SINGLE</option>
								<option value='1'>MARRIED</option>
								<option value='2'>WIDOWED</option>
								<option value='3'>SEPARATED</option>";
							  }				
							$cellValue=$cellValue."</select>";
						}
						//edited by Mike, 20240301; from 20210306
						//deprecated
//						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="OCCUPATION")) {						
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="OCCUPATION") {
/*							//edited by Mike, 20210319							
							$cellValue="<input class='inputText' type='text' id='inputTextOccupationId' name='inputTextOccupationIdNameParam' form='indexCardId' required>";
*/
							$myValue="";
							if (isset($result[0]["occupation"])){
								$myValue=$result[0]["occupation"];
							}

							//edited by Mike, 20210803
//							$cellValue="<input class='inputText' type='text' id='inputTextOccupationId' name='inputTextOccupationIdNameParam' form='indexCardId'  value='".$myValue."' required>";
							$cellValue="<input class='inputText' type='text' id='inputTextOccupationId' name='inputTextOccupationIdNameParam' form='indexCardId'  value='".$myValue."'>";
						}
						//edited by Mike, 20240301
						//deprecated
						//else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="BIRTHDAY")) {						 
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="BIRTHDAY") {
/*							//edited by Mike, 20210319							
							$cellValue="<input class='inputText' type='date' id='inputTextBirthdayId' name='inputTextBirthdayIdNameParam' form='indexCardId' required>";
*/
							$myValue="";
							if (isset($result[0]["birthday"])){
								$myValue=$result[0]["birthday"];
							}

							//edited by Mike, 20210803
//							$cellValue="<input class='inputText' type='date' id='inputTextBirthdayId' name='inputTextBirthdayIdNameParam' form='indexCardId' value='".$myValue."' required>";
							$cellValue="<input class='inputText' type='date' id='inputTextBirthdayId' name='inputTextBirthdayIdNameParam' form='indexCardId' value='".$myValue."'>";
						}
						//edited by Mike, 20240301
						//deprecated
						//else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="CONTACT#")) {						
						else if (($iColumnCount-1>=0) and (mb_convert_encoding($data[$iColumnCount-1], "UTF-8", mb_detect_encoding($data[$iColumnCount-1])))=="CONTACT#") {
/* //edited by Mike, 20210319						
							$cellValue="<input class='inputText' type='tel' id='inputTextContactNumberId' name='inputTextContactNumberIdNameParam' form='indexCardId' required>";
*/
							$myValue="";
							if (isset($result[0]["contact_number"])){
								$myValue=$result[0]["contact_number"];
							}

							//edited by Mike, 20210803
//							$cellValue="<input class='inputText' type='tel' id='inputTextContactNumberId' name='inputTextContactNumberIdNameParam' form='indexCardId'  value='".$myValue."' required>";
							$cellValue="<input class='inputText' type='tel' id='inputTextContactNumberId' name='inputTextContactNumberIdNameParam' form='indexCardId'  value='".$myValue."'>";
						}

						//note: another set of if-then, if-else statements
						if (strpos($cellValue,"SEX")!==false) {					
							echo "<td class='columnField'><b><span class='spanSexFieldName'>".$cellValue."</span>";
							echo "<select id='selectSexIdParam' name='selectSexNameParam' form='indexCardId'>";
							
							//note: no echo output after select command
?>
<!-- edited by Mike, 20210212 -->
<!--
							<select id='selectSexIdParam' name='selectSexNameParam' form='indexCardId'>
							  <option value='0'>MALE</option>
							  <option value='1'>FEMALE</option>
-->
<?php							
//							for ($iCount=0; $iCount<2; $iCount++) {
							  if (isset($result[0]["sex_id"])) {
								  if ($result[0]["sex_id"]==0) {
									echo "<option value='0' selected='selected'>MALE</option>";
									echo "<option value='1'>FEMALE</option>";
								  }
								  else {
									echo "<option value='0'>MALE</option>";
									echo "<option value='1' selected='selected'>FEMALE</option>";
								  }
							  }			  	  
							  else {
									echo "<option value='0'>MALE</option>";			  							
									echo "<option value='1'>FEMALE</option>";			  														
							  }				
//						   }
?>
							</select>
							
							<!-- added by Mike, 20210211 -->
<!--							
							<input type='hidden' name='inputSelectSexNameParam' value='20'>
-->							
<?php
							echo "</b></td>";

						}
						//added by Mike, 20210209
						//TO-DO: -add: birthday to auto-compute age
						else if (strpos($cellValue,"AGE")!==false) {							
						
							echo "<td class='columnFieldNameAge'><b><span class='spanAgeFieldName'>".$cellValue."</span></b>";
?>
<!-- edited by Mike, 20210210 -->
<!--
							<input type="tel" id="inputAgeId" class="inputAgeTextBox no-spin" value="1" min="1" max="999">
-->

<!--	//edited by Mike, 20210212
							<input type="tel" id="inputAgeId" name="inputAgeNameParam" class="inputAgeTextBox no-spin" placeholder="hal.10" value="" min="1" max="999" required>
-->
<!-- edited by Mike, 20210803
							<input type="tel" id="inputAgeId" name="inputAgeNameParam" class="inputAgeTextBox no-spin" placeholder="hal.10" value="<?php echo $result[0]["age"];?>" min="1" max="999" required>
-->
							<input type="tel" id="inputAgeId" name="inputAgeNameParam" class="inputAgeTextBox no-spin" placeholder="hal.10" value="<?php 
							if (isset($result[0]["age"])) {
								echo $result[0]["age"];
							}
							else {
								echo "";
							}
							?>" min="1" max="999">
							
<!--	//edited by Mike, 20210212
							<select id='selectAgeUnitIdParam' name='selectAgeUnitNameParam'>
							  <option value='0'>YRS</option>
							  <option value='1'>MOS</option>
							</select>
-->

<?php							
							echo "<select id='selectAgeUnitIdParam' name='selectAgeUnitNameParam'>";

							  if (isset($result[0]["age_unit"])) {
								  if ($result[0]["age_unit"]==0) {
									echo "<option value='0' selected='selected'>YRS</option>";
									echo "<option value='1'>MOS</option>";
								  }
								  else {
									echo "<option value='0'>YRS</option>";
									echo "<option value='1' selected='selected'>MOS</option>";
								  }
							  }			  	  
							  else {
									echo "<option value='0'>YRS</option>";
									echo "<option value='1'>MOS</option>";			
							  }				

							echo "</select>";
?>

<?php
							echo "</td>";

						}
						else if (strpos($cellValue,"PHYSICIAN")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
/*	//removed by Mike, 20210307						
						//added by Mike, 20210210
						else if (strpos($cellValue,"ADDRESS")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
*/						
						//added by Mike, 20210306
						else if (strpos($cellValue,"PATIENT NAME")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
						//added by Mike, 20210319
						else if (strpos($cellValue,"ADDRESS")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						
						//added by Mike, 20210319
						else if (strpos($cellValue,"PWD/SENIOR")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						
						//added by Mike, 20210319
						else if (strpos($cellValue,"CIVIL STATUS")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						
						//added by Mike, 20210319
						else if (strpos($cellValue,"OCCUPATION")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						
						//added by Mike, 20210319
						else if (strpos($cellValue,"BIRTHDAY")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						
						//added by Mike, 20210319
						else if (strpos($cellValue,"CONTACT#")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						

						//added by Mike, 20210307
						else if (strpos($cellValue,"LOCATION")!==false) {
/* //edited by Mike, 20210319							
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextLocationAddressId' name='inputTextLocationAddressIdNameParam'
									placeholder='LOCATION'
									form='indexCardId' required>
									</input>
								  </td>";
*/
							$myValue="";
							if (isset($result[0]["location_address"])){
								$myValue=$result[0]["location_address"];
							}

							//edited by Mike, 20210803
							/*echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextLocationAddressId' name='inputTextLocationAddressIdNameParam'
									placeholder='LOCATION'
									form='indexCardId' value='".$myValue."' required>
									</input></b>
								  </td>";
							*/
							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextLocationAddressId' name='inputTextLocationAddressIdNameParam'
									placeholder='LOCATION'
									form='indexCardId' value='".$myValue."'>
									</input></b>
								  </td>";								  
						}						
						else if (strpos($cellValue,"BARANGAY")!==false) {
/* //edited by Mike, 20210319							
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextBarangayAddressId' name='inputTextBarangayAddressIdNameParam'
									placeholder='BARANGAY'
									form='indexCardId' required>
									</input>
								  </td>";
*/
							$myValue="";
							if (isset($result[0]["barangay_address"])){
								$myValue=$result[0]["barangay_address"];
							}

							//edited by Mike, 20210803
/*							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextBarangayAddressId' name='inputTextBarangayAddressIdNameParam'
									placeholder='BARANGAY'
									form='indexCardId' value='".$myValue."' required>
									</input></b>
								  </td>";
*/
							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextBarangayAddressId' name='inputTextBarangayAddressIdNameParam'
									placeholder='BARANGAY'
									form='indexCardId' value='".$myValue."'>
									</input></b>
								  </td>";								  
						}						
						else if (strpos($cellValue,"POSTAL")!==false) {
/* //edited by Mike, 20210319							
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextPostalAddressId' name='inputTextPostalAddressIdNameParam'
									placeholder='POSTAL'
									form='indexCardId' required>
									</input>
								  </td>";
*/
							$myValue="";
							if (isset($result[0]["postal_address"])){
								$myValue=$result[0]["postal_address"];
							}

							//edited by Mike, 20210803
/*							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextPostalAddressId' name='inputTextPostalAddressIdNameParam'
									placeholder='POSTAL'
									form='indexCardId' value='".$myValue."' required>
									</input></b>
								  </td>";
*/
							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextPostalAddressId' name='inputTextPostalAddressIdNameParam'
									placeholder='POSTAL'
									form='indexCardId' value='".$myValue."'>
									</input></b>
								  </td>";								  
						}						
						else if (strpos($cellValue,"PROVINCE/CITY/PH")!==false) {
/* //edited by Mike, 20210319							
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextProvinceCityPhAddressId' name='inputTextProvinceCityPhAddressIdNameParam'
									placeholder='PROVINCE/CITY/PH'
									form='indexCardId' required>
									</input>
								  </td>";
*/
							$myValue="";
							if (isset($result[0]["province_city_ph_address"])){
								$myValue=$result[0]["province_city_ph_address"];
							}

							//edited by Mike, 20210803
/*							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextProvinceCityPhAddressId' name='inputTextProvinceCityPhAddressIdNameParam'
									placeholder='PROVINCE/CITY/PH'
									form='indexCardId' value='".$myValue."' required>
									</input></b>
								  </td>";
*/
							echo "<td class='columnField'><b>
									<input class='inputText' type='text' id='inputTextProvinceCityPhAddressId' name='inputTextProvinceCityPhAddressIdNameParam'
									placeholder='PROVINCE/CITY/PH'
									form='indexCardId' value='".$myValue."'>
									</input></b>
								  </td>";								  
						}
/* //removed by Mike, 20210307						
						//added by Mike, 20210307
						else if (strlen(trim($cellValue))!=0) {						
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
*/
						else if (strpos($cellValue,"EDIT")!==false) {
													
							$updatedPatientName=str_replace("�","Ñ",$value['patient_name']);
						
							$myValue="<td class='columnField'><input class='inputTextPatientName' type='text' id='inputTextPatientNameId' name='inputTextPatientNameNameParam'
							placeholder=''
							form='indexCardId' value='".$updatedPatientName."'></input></td>";

							echo $myValue;	
						}
						else {
							//blank space HTML command: "&nbsp;"
							echo "<td class='columnField'><b>".$cellValue."</b></td>";
						}


//removed by Mike, 20210209
/*						//blank space HTML command: "&nbsp;"
						echo "<td class='columnFieldName'><b>".$cellValue."</b></td>";
*/						
						
/*	//removed by Mike, 20210208					
					}
*/					
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
	<table class="bottomSectionTable">
	  <tr>
		  <td class="updateIndexCardColumn">
			<br/>			
			<!-- Buttons -->
<!--
			<button type="submit" onclick="myPopupFunction(<?php echo $value['patient_id'];?>)">
-->			
			<button type="submit">			
				<div class="buttonSubmitUpdate">Update</div>
			</button>
		  </td>
	  </tr>
	</table>	
</form>
<!-- removed by Mike, 20210314
	<br />		
	<div>***NOTHING FOLLOWS***</div>
	<br />
-->

<?php
  //added by Mike, 20230406
  $searchHistoryRangeTime = strtotime("-2 year", time());
  $searchHistoryRangeDate = date("Y", $searchHistoryRangeTime);  

  //edited by Mike, 20230407
//$sDateToday = Date('Y-m-d, l', strtotime($value['last_visit_date']));
  //edited by Mike, 20230408
//  $sDateToday = Date('Y-m-d', strtotime($value['last_visit_date']));
  
    
  //added by Mike, 20250404
  if (!isset($value['last_visited_date'])) {
	  $value['last_visited_date']="";
  }
  if (!isset($value['transaction_date'])) {
	  $value['transaction_date']="";
  }
  if (!isset($value['transaction_id'])) {
	  $value['transaction_id']="";
  }

  if (!isset($bFoldImageListValue)) {
	  $bFoldImageListValue=0;
  }
  
  
    
  //added by Mike, 20230408
//  if (trim($sDateToday)=="") {
  //edited by Mike, 20230409
  if (trim($value['last_visited_date'])=="") {
	//edited by Mike, 20230410
	//$sDateToday="NEW";
	if (isset($value['transaction_date'])) {
		$sDateToday= Date('Y-m-d', strtotime($value['transaction_date']));
	}
	else {
		$sDateToday="NEW";
	}
  }
  //note: last_visit_date auto-updated @ start, et cetera
  //Windows Task Scheduler; Triggers, Actions, Conditions; STARCRAFT; SAP
  //edited by Mike, 20230409
  else if (strpos($value['last_visited_date'],"DEL")!==false) {				  
	$sDateToday = $value['last_visited_date'];
  }
  else {
	$sDateToday = Date('Y-m-d', strtotime($value['last_visited_date']));
  }

  //added by Mike, 20250513
  if (strpos($sDateToday,"1970-01-01")!==false) {
	//$sDateToday = $value['last_visited_date'];
	
	//echo "DITO!!!";
	
	if (isset($resultPaid[0]['added_datetime_stamp'])) {		
		//input: 2025-05-10 11:56:46;
		//output: 2025-05-10
		$sDateToday=strtok($resultPaid[0]['added_datetime_stamp']," ");
	}
	//added by Mike, 20250605
	else {
		$sDateToday="NEW; NONE YET";
	}
  }
  
  //echo ">>>>>>>>>>>>>>".$sDateToday."<br/>";
  
  //edited by Mike, 20250513
  //echo "<b>LAST VISITED:</b> ".$sDateToday;
  //note space before the ⿻ button;
  echo "<b>LAST VISITED:</b> ".$sDateToday." <button class='copyToClipboardButton' onclick='myCopyToClipboardFunction(\"".$sDateToday."\")'>⿻</button>";


?>

<!-- added by Mike, 20210316 -->
<!--
		<h3>Patient Index Card History [<?php echo date("Y")."~".$searchHistoryRangeDate;?>] MORE</h3>				
-->
		<h3>Patient Index Card History [<?php echo date("Y")."~".$searchHistoryRangeDate;?>] +</h3>				

<?php
		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultIndexCardImageList)) and ($resultIndexCardImageList!=False)) {
				$resultCount = count($resultIndexCardImageList);
			}

?>
			<!-- added by Mike, 20210320 -->
			<input type="hidden" id="foldImageListId" value="<?php echo $bFoldImageListValue;?>">
<?php
			if ($bFoldImageListValue) {
					//edited by Mike, 20210320
					echo '<table class="indexCardImageListTable"><tr>';
					echo '<td>';				
	//				$resultCount = count($resultPaid);
					if ($resultCount==1) {
						echo '<div>Hiding <b>'.count($resultIndexCardImageList).'</b> result found.</div>';
					}
					else {
						echo '<div>Hiding <b>'.count($resultIndexCardImageList).'</b> results found.</div>';			
					}			
					echo '</td>';
					echo '<td class="foldUnfoldIndexCardImageListColumn">';
						echo '<button onclick="myFoldIndexCardImageListFunction('.$result[0]['patient_id'].')">Unfold Image List</button>';
					echo '</td>';
					echo '</table></tr>';
			}
			else {
				
				//item purchase history			
				if ($resultCount==0) {				
					echo '<div>';					
					echo 'There are no transactions.';
					echo '</div>';					
				}
				else {		
					//edited by Mike, 20210320
					echo '<table class="indexCardImageListTable"><tr>';
					echo '<td>';				
	//				$resultCount = count($resultPaid);
					if ($resultCount==1) {
						echo '<div>Showing <b>'.count($resultIndexCardImageList).'</b> result found.</div>';
					}
					else {
						echo '<div>Showing <b>'.count($resultIndexCardImageList).'</b> results found.</div>';			
					}			
					echo '</td>';
					echo '<td class="foldUnfoldIndexCardImageListColumn">';
						echo '<button onclick="myFoldIndexCardImageListFunction('.$result[0]['patient_id'].')">Fold Image List</button>';
					echo '</td>';
					echo '</table></tr>';

					echo '<br/>';

					foreach ($resultIndexCardImageList as $indexCardImageListValue) {	  
							echo "<table class='tableIndexCardImage'>";
						//add: table headers
		?>				
						  <tr class="row">
							<td class="column">
								<!-- added by Mike, 20210630 -->
<?php								
								echo '<button onclick="myDeleteIndexCardImageFunction('.$result[0]['patient_id'].','.$indexCardImageListValue['image_id'].')">								
									<div class="buttonDeleteImage">Delete</div>
								</button>';
?>
								<br/>
							</td>
							<td class="column">
								<?php
									//edited by Mike, 20210320
									echo $indexCardImageListValue['image_filename'];
								?>
							</td>
						  </tr>
						  <tr>
							<td>
							</td>
							<td class="column">
								<img class="Image-indexCard" src="<?php echo base_url($indexCardImageListValue['image_filename']);?>">		
							</td>
						  </tr>
		<?php
					}
					
					echo "</table>";
				}
			}
		}
?>
		<br/>
		<form id="myFormId" enctype="multipart/form-data" method="post" action="<?php echo site_url('image/confirmStoreIndexCardImage/'.$value['transaction_id'].'/'.$value['patient_id'])?>">
			<input type="hidden" name="reportTypeNameParam" value="Report Image">
			<input style="font-size: 16px;" id="uploadFilesId" name="reportParamUploadFiles[]" type="file" multiple="multiple" accept="image/*" onInput="showAlert();"/>
		</form>

		<script language="javascript" type="text/javascript">
			function showAlert() {
				document.getElementById('myFormId').submit();
	//			alert("Hey there!" + document.getElementById("uploadFilesId").value);
			}
		</script>

		<br/>
		<br/>
		
<?php
		//added by Mike, 20210701; edited by Mike, 20230406
		//echo '<h3>Patient Purchased Service History</h3>';
		//echo '<h3>Patient Purchased Service History ['.date("Y").'~'.$searchHistoryRangeDate.'] MORE</h3>';
		echo '<h3>Patient Purchased Service History ['.date("Y").'~'.$searchHistoryRangeDate.'] +</h3>';
		
 		//added by Mike, 20210707; edited by Mike, 20220317
 		//severity notice with Linux machine: "Trying to access array offset on value of type bool"
//		$value = $resultPaid[0];
		$value = null;
		if (isset($resultPaid[0])) {
			$value = $resultPaid[0];
		}

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
				//added by Mike, 20200806
	?>				
				  <tr class="row">
					<td class ="columnTableHeaderDate">				
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
							echo "PRIV";
						?>
					</td>
					<td class ="columnTableHeader">				
						<?php
							echo "PF";
						?>
					</td>
					<td class ="columnTableHeader">				
						<?php
							echo "X-RAY";
						?>
					</td>
					<td class ="columnTableHeader">				
						<?php
							echo "LAB";
						?>
					</td>
					<td class ="columnTableHeaderClassification">				
						<?php
							echo "CLASS";//"CLASSIFI-<br/>CATION";
						?>
					</td>

					<!-- added by Mike, 20250401 -->
					<td>				
					</td>
					<td class ="columnTableHeaderNotes">				
						<?php
							echo "NOTES";
						?>
					</td>

					<td class ="columnTableHeader">				
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
			$bIsEditable=false;
			if (strcmp(date("m-d-Y"),date("m-d-Y",strtotime($value['transaction_date'])))==0) { //if equal
				if (strpos($value['notes'],"ONLY")==false) {
					$bIsEditable=true;
				}
			}
	?>				
	
				  <tr class="row">
					<td class ="columnTransactionDate">				
<!--
						<div class="transactionDate">
-->						
			<?php
							//edited by Mike, 20210720
//							echo str_replace(" ","T",$value['added_datetime_stamp']);

							echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$value['patient_id'].'/'.date("m-d-Y",strtotime($value['transaction_date'])))."' id='viewAcknowledgmentFormId' target='_blank'><b>".
								//edited by Mike, 20210927
	//							str_replace(" ","T",$value['added_datetime_stamp'])."</b>
								str_replace(" ","<br/>T",$value['added_datetime_stamp'])."</b>
							</a>";
				?>
<!--
						</div>								
-->						
					</td>
					<td class ="columnName">				
						<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
							<div class="patientName">
			<?php
							//TO-DO: -update: this
							//echo $value['patient_name'];
							//edited by Mike, 20220317
//							echo str_replace("ï¿½","Ã‘",$value['patient_name']);							
							echo str_replace("�","Ñ",$value['patient_name']);
			?>		
							</div>								
						</a>				
					</td>		
					<td class ="columnName">
						<?php 
							if ($bIsEditable) {
								if (strpos($value['notes'],"PRIVATE")!==false) {
						?>
									<input type="checkbox" id="privCheckBoxParam" checked>
						<?php
								}
								else {
						?>
									<input type="checkbox" id="privCheckBoxParam">
						<?php
								}
							}
							else {
								if (strpos($value['notes'],"PRIVATE")!==false) {
						?>
									<input type="radio" id="privCheckBoxParam" onclick="return false;" checked>
						<?php
								}
								else {
						?>
									<input type="radio" id="privCheckBoxParam" onclick="return false;">
						<?php
								}
							}
						?>
					</td>
					<td class ="columnNumber">				
						<?php
							//edited by Mike, 20250401
							//echo $value['fee'];
							if ($bIsEditable) {
						?>
						<input type="tel" id="professionalFeeParam" class="Fee-textbox no-spin" value="<?php echo intval($value['fee']);?>" min="1" max="99999" 
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
<?php
							}
							else {
								echo $value['fee'];
							}
?>
					</td>
					<td class ="columnNumber">				
						<?php
							//echo $value['x_ray_fee'];
							if ($bIsEditable) {
						?>
						<input type="tel" id="xRayFeeParam" class="Fee-textbox no-spin" value="<?php echo intval($value['x_ray_fee']);?>" min="1" max="99999" 
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
<?php
							}
							else {
								echo $value['x_ray_fee'];
							}
?>									
					</td>
					<td class ="columnNumber">				
						<?php
							//echo $value['lab_fee'];
							if ($bIsEditable) {							
						?>
						<input type="tel" id="labFeeParam" class="Fee-textbox no-spin" value="<?php echo intval($value['lab_fee']);?>" min="1" max="99999" 
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
<?php
							}
							else {
								echo $value['lab_fee'];
							}
?>									
					</td>
					<td class="columnClassification">
					<?php
						if ($bIsEditable) {		
					?>
							<select id="classificationParam" class="Classification-select">
<?php
							  if (isset($value["notes"])) {
								  if (strpos($value['notes'],"DISCOUNTED")!==false) {
									echo "<option value='0'>WI</option>";
									echo "<option value='1'>SC</option>";
									echo "<option value='2'>PWD</option>";
								  }
								  else if (strpos($value["notes"],"SC")!==false) {
									echo "<option value='0'>WI</option>";
									echo "<option value='1' selected='selected'>SC</option>";
									echo "<option value='2'>PWD</option>";
								  }
								  else if (strpos($value["notes"],"PWD")!==false) {
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
<?php
						}
						else {
							 if (isset($value["notes"])) {
								  /*if (strpos($value['notes'],"DISCOUNTED")!==false) {
								  }
								  else*/ if (strpos($value["notes"],"SC;")!==false) {
									  echo "SC";
								  }
								  else if (strpos($value["notes"],"PWD;")!==false) {
									  echo "PWD";
								  }
								  else {
									  echo "WI";
								  }
							 }
						}
?>							
					</td>
						
					<!-- added by Mike, 20250401 -->
					<td>			
						<?php //if (date("m-d-Y",strtotime($value['transaction_date']))
							//echo date("m-d-Y");
							//echo date("m-d-Y",strtotime($value['transaction_date']));
/*							
							if (strcmp(date("m-d-Y"),date("m-d-Y",strtotime($value['transaction_date'])))==0) { //if equal
								if (strpos($value['notes'],"ONLY")==false) {
*/
							if ($bIsEditable) {							
//echo $value['notes'];

							  $bIsPrivate=0;
							  if (strpos($value['notes'],"PRIVATE")!==false) {						
								$bIsPrivate=1;
							  }
						?>
						
<button class='saveButton' onclick="mySaveFunctionItemName(<?php echo $value['medical_doctor_id'].','.$value['patient_id'].','.$value['transaction_id'];?>)">💾</button>

<!--
						<button class='saveButton' onclick="mySaveFunctionItemName(<?php echo $value['medical_doctor_id'].','.$value['patient_id'].','.$value['transaction_id'].','.$bIsPrivate;?>)">💾</button>
-->						
						<?php
							}
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
								//edited by Mike, 20250820
								//echo $value['notes'];
								$updatedNotesOutput=$value['notes'];
								
								$updatedNotesOutput=str_replace("PWD;","",$updatedNotesOutput);

								$updatedNotesOutput=str_replace("SC;","",$updatedNotesOutput);
								
								$updatedNotesOutput=str_replace("NONE;","",$updatedNotesOutput);
								
								$updatedNotesOutput=str_replace("PRIVATE;","",$updatedNotesOutput);

								$updatedNotesOutput=str_replace("PAID;","",$updatedNotesOutput);
								
								echo $updatedNotesOutput;
							}
						?>
					</td>
					<td class ="columnNumber">
						<?php
							$totalFee = $value['fee'] + $value['x_ray_fee'] + $value['lab_fee'];
							//echo $totalFee;
							//echo number_format($totalFee, 2, '.', '');
							
							if ($totalFee!=0) {
								echo "<span class='spanTotalFeeGold'>".number_format($totalFee, 2, '.', '')."</span>";
							}
							else {
								echo number_format($totalFee, 2, '.', '');
							}							
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
			echo "<br />"; //added by Mike, 20210707

		}
	}

		//edited by Mike, 20230406
		//echo '<h3>Patient Purchased Medicine Item History</h3>';
		//echo '<h3>Patient Purchased Medicine Item History ['.date("Y").'~'.$searchHistoryRangeDate.'] MORE</h3>';
		echo '<h3>Patient Purchased Medicine Item History ['.date("Y").'~'.$searchHistoryRangeDate.'] +</h3>';
				
		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultPaidMedItem)) and ($resultPaidMedItem!=False)) {
				$resultCount = count($resultPaidMedItem);
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
					echo '<div>Showing <b>'.count($resultPaidMedItem).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($resultPaidMedItem).'</b> results found.</div>';			
				}			
				echo '<br/>';
			
				echo "<table class='search-result'>";

				//add: table headers				
?>				
					  <tr class="row">
						<td class="columnTableHeader">				
				<?php
							echo "DATE";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "COUNT";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "ACTUAL<br/>FEE"; //"ITEM FEE, i.e. discounted price, set price";
							?>
						</td>						
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "QTY";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "TOTAL";
							?>
						</td>
					  </tr>
<?php				
				  $iCount=1;
				  $iCountForTheDay=0;
				  $sCurrentTransactionDate="";
				  
				  //added by Mike, 20210412
				  $dTotalFee = 0;	
				  
				  //added by Mike, 20210929
				  $iTotalQuantity = 0;				
				  				  
				  //added by Mike, 20210407
				  $iTotalResultPaidMedItemCount = count($resultPaidMedItem);				  

				  foreach ($resultPaidMedItem as $value) {
/* //removed by Mike, 20210314					  
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  
*/					
		?>						

<!-- removed by Mike, 20210408		
		  <tr class="row">
			<td class="column">				
-->			
				<?php
//								echo $value['transaction_date'];
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;

					  echo "<tr class='row'>";
					  echo "<td class='column'>";

					}
					else {
					  $iCountForTheDay=1;
//					  echo $value['transaction_date'];
						
					//edited by Mike, 20210412
/*					if ((($sCurrentTransactionDate!="") and ($sCurrentTransactionDate!=$value['transaction_date'])) or
							($iCount==($iTotalResultPaidMedItemCount))) {	
*/
					if (($dTotalFee!=0) and ((($sCurrentTransactionDate!="") and($sCurrentTransactionDate!=$value['transaction_date'])) or
							($iCount==($iTotalResultPaidMedItemCount)))) {							
							
		?>
				<tr class="row">
						<td class="column">				
						</td>
						<td class="column">				
						</td>
						<td class="columnGrandTotalName">				
				<?php
							echo "TOTAL FOR THE DAY (MED ITEM)";
				?>		
						</td>
						<td class="column">				
						</td>
						<td class="column">				
						</td>						
						<td class="column">				
						</td>
						<td class="columnNumberQuantityTotal">		
							<?php
								//added by Mike, 20210929
								echo "<b>".$iTotalQuantity."</b>";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTotalFee">				
							<?php
								echo number_format($dTotalFee, 2, '.', '');
							?>
						</td>
					  </tr>				
<?php					
					}

					  echo "<tr class='row'>";
					  echo "<td class='column'>";

					  //edited by Mike, 20221102
					  //echo date('Y-m-d', strtotime($value['transaction_date']));

						echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$patientId.'/'.date("m-d-Y",strtotime($value['transaction_date'])))."' id='viewAcknowledgmentFormId' target='_blank'><b>".
							//edited by Mike, 20210927
//							str_replace(" ","T",$value['added_datetime_stamp'])."</b>
							date('Y-m-d', strtotime($value['transaction_date']))."</b>
						</a>";

					  //added by Mike, 20210407
					  $dTotalFee = 0;					  

					  //added by Mike, 20210929
					  $iTotalQuantity = 0;				


				}
					
					//removed by Mike, 20210407
//					$sCurrentTransactionDate=$value['transaction_date'];				  

							?>
						</td>
						<td class="column">				
							<?php
								echo $iCountForTheDay;
							?>
						</td>

						<td class="columnName">				
							<a href='<?php echo site_url('browse/viewItemMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>" target='_blank'>
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class="columnNumber">		
								<!-- edited by Mike, 20200912 
								<input type="hidden" id="feeParam" value="<?php echo $value['item_price']?>">
								</input>
-->								
								<input type="hidden" value="<?php echo $value['item_price']?>">
								</input>
					
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20210423
//								echo $value['fee'];
								//edited by Mike, 20210616
//								echo number_format($value['fee']/$value['fee_quantity'], 2, '.', '');								
								echo "@".number_format($value['fee']/$value['fee_quantity'], 2, '.', '');								
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
						<td>
							x
						</td>
						<td class="columnNumber">				
								<div id="itemQuantityId<?php echo $iCount?>">
							<?php
//								echo floor(($value['fee']/$value['item_price']*100)/100);
//								$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								//edited by Mike, 20200415
								if ($value['fee_quantity']==0) {
//									$iQuantity =  1;
									$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								}
								else {
									$iQuantity =  $value['fee_quantity'];
								}

								echo $iQuantity;
								
								//added by Mike, 20210929
								$iTotalQuantity = $iTotalQuantity + $iQuantity;
							?>
								</div>
						</td>
						<td class="column">				
						=
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
								//added by Mike, 20210407							
								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
					  </tr>
					  
		<?php		
				  //added by Mike, 20210407
/*				  
				  echo "sCurrentTransactionDate: ".$sCurrentTransactionDate."<br/>";
				  echo "transaction_date: ".$value['transaction_date']."<br/>";

echo "iCount: ".$iCount."<br/>";
echo "iTotalResultPaidNonMedItemCount: ".$iTotalResultPaidMedItemCount;				   		
*/				   				  
//TO-DO: -update: this due to $iTotalResultPaidMedItemCount not only for the day
					if ((($sCurrentTransactionDate=="") and
						($sCurrentTransactionDate!=$value['transaction_date']) and 
						($iCount==$iTotalResultPaidMedItemCount)) or
							($iCount==($iTotalResultPaidMedItemCount))) {	
							
		?>
				<tr class="row">
						<td class="column">				
						</td>
						<td class="column">				
						</td>
						<td class="columnGrandTotalName">				
				<?php
							echo "TOTAL FOR THE DAY (MED ITEM)";
				?>		
						</td>
						<td class="column">				
						</td>
						<td class="column">				
						</td>						
						<td class="column">				
						</td>
						<td class="columnNumberQuantityTotal">				
							<?php
								//added by Mike, 20210929
								echo "<b>".$iTotalQuantity."</b>";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTotalFee">				
							<?php
								echo number_format($dTotalFee, 2, '.', '');
							?>
						</td>
					  </tr>		
<?php					
					}
					$sCurrentTransactionDate=$value['transaction_date'];				  
					
						
					$currentItemId = $value['item_id'];					

					$iCount++;		
/*					echo "<br/>";
*/					
				}				

				echo "</table>";				
				echo "<br/>";				
//				echo '<div>***NOTHING FOLLOWS***';	
//removed by Mike, 20210515
//				echo "<br/>";				
				
				
			}

		}
		
		//edited by Mike, 20230406
		//echo '<h3>Patient Purchased Non-medicine Item History</h3>';
		echo '<h3>Patient Purchased Non-medicine Item History ['.date("Y").'~'.$searchHistoryRangeDate.'] +</h3>';

		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultPaidNonMedItem)) and ($resultPaidNonMedItem!=False)) {
				$resultCount = count($resultPaidNonMedItem);
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
					echo '<div>Showing <b>'.count($resultPaidNonMedItem).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($resultPaidNonMedItem).'</b> results found.</div>';			
				}			
				echo '<br/>';
			
				echo "<table class='search-result'>";

				//add: table headers
?>				
					  <tr class="row">
						<td class="columnTableHeader">				
				<?php
							echo "DATE";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "COUNT";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "ACTUAL<br/>FEE"; //"ITEM FEE, i.e. discounted price, set price";
							?>
						</td>						
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "QTY";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "TOTAL";
							?>
						</td>
					  </tr>
<?php				
				  $iCount=1;
				  $iCountForTheDay=0;
				  $sCurrentTransactionDate="";
				  
				  $iTotalResultPaidNonMedItemCount = count($resultPaidNonMedItem);
					
				  //added by Mike, 20210412
				  $dTotalFee = 0;					  

				  //added by Mike, 20210929
				  $iTotalQuantity = 0;				


				  foreach ($resultPaidNonMedItem as $value) {
/* //removed by Mike, 20210314					  
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  
*/					
		?>						
<!-- removed by Mike, 20210408		
		  <tr class="row">
			<td class="column">				
-->			
				<?php
//								echo $value['transaction_date'];
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;

					  echo "<tr class='row'>";
					  echo "<td class='column'>";

					}
					else {
					  $iCountForTheDay=1;
//					  echo $value['transaction_date'];

					//edited by Mike, 20210412
/*					if ((($sCurrentTransactionDate!="") and ($sCurrentTransactionDate!=$value['transaction_date'])) or
							($iCount==($iTotalResultPaidNonMedItemCount))) {	
*/
					if (($dTotalFee!=0) and ((($sCurrentTransactionDate!="") and($sCurrentTransactionDate!=$value['transaction_date'])) or
							($iCount==($iTotalResultPaidNonMedItemCount)))) {							
		?>
				<tr class="row">
						<td class="column">				
						</td>
						<td class="column">				
						</td>
						<td class="columnGrandTotalName">				
				<?php
							echo "TOTAL FOR THE DAY (NON-MED ITEM)";
				?>		
						</td>
						<td class="column">				
						</td>
						<td class="column">				
						</td>						
						<td class="column">				
						</td>
						<td class="columnNumberQuantityTotal">				
							<?php
								//added by Mike, 20210929
								echo "<b>".$iTotalQuantity."</b>";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTotalFee">				
							<?php
								echo number_format($dTotalFee, 2, '.', '');
							?>
						</td>
					  </tr>				
<?php					
					}


					  echo "<tr class='row'>";
					  echo "<td class='column'>";

					  //edited by Mike, 20221102
					  //echo date('Y-m-d', strtotime($value['transaction_date']));

						echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$patientId.'/'.date("m-d-Y",strtotime($value['transaction_date'])))."' id='viewAcknowledgmentFormId' target='_blank'><b>".
							//edited by Mike, 20210927
	//							str_replace(" ","T",$value['added_datetime_stamp'])."</b>
							date('Y-m-d', strtotime($value['transaction_date']))."</b>
						</a>";

					  //added by Mike, 20210407
					  $dTotalFee = 0;					  

					  //added by Mike, 20210929
					  $iTotalQuantity = 0;
					}
					  
					//removed by Mike, 20210407
//					$sCurrentTransactionDate=$value['transaction_date'];	
							?>
						</td>
						<td class="column">				
							<?php
								echo $iCountForTheDay;
							?>
						</td>

						<td class="columnName">				
							<a href='<?php echo site_url('browse/viewItemNonMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>" target='_blank'>
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class="columnNumber">		
								<!-- edited by Mike, 20200912 
								<input type="hidden" id="feeParam" value="<?php echo $value['item_price']?>">
								</input>
-->								
								<input type="hidden" value="<?php echo $value['item_price']?>">
								</input>
					
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20210423
//								echo $value['fee'];
								//edited by Mike, 20210616
//								echo number_format($value['fee']/$value['fee_quantity'], 2, '.', '');								
								echo "@".number_format($value['fee']/$value['fee_quantity'], 2, '.', '');								
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
						<td>
							x
						</td>
						<td class="columnNumber">				
								<div id="itemQuantityId<?php echo $iCount?>">
							<?php
//								echo floor(($value['fee']/$value['item_price']*100)/100);
//								$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								//edited by Mike, 20200415
								if ($value['fee_quantity']==0) {
//									$iQuantity =  1;
									$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								}
								else {
									$iQuantity =  $value['fee_quantity'];
								}

								echo $iQuantity;
								
								//added by Mike, 20210929
								$iTotalQuantity = $iTotalQuantity + $iQuantity;
							?>
								</div>
						</td>
						<td class="column">				
						=
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
								//added by Mike, 20210407
								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
					  </tr>
		<?php		
				  //added by Mike, 20210407				  
//				  if ($iCountForTheDay==1) {
//echo "hallo".$sCurrentTransactionDate."<br/>";
						
/*	//edited by Mike, 20210407
echo "iCount: ".$iCount."<br/>";
echo "iTotalResultPaidNonMedItemCount: ".$iTotalResultPaidNonMedItemCount;
*/

					if ((($sCurrentTransactionDate=="") and
						($sCurrentTransactionDate!=$value['transaction_date']) and 
						($iCount==$iTotalResultPaidNonMedItemCount)) or
							($iCount==($iTotalResultPaidNonMedItemCount))) {	

											
		?>
				<tr class="row">
						<td class="column">				
						</td>
						<td class="column">				
						</td>
						<td class="columnGrandTotalName">				
				<?php
							echo "TOTAL FOR THE DAY (NON-MED ITEM)";
				?>		
						</td>
						<td class="column">				
						</td>
						<td class="column">				
						</td>						
						<td class="column">				
						</td>
						<td class="columnNumberQuantityTotal">				
							<?php
								//added by Mike, 20210929
								echo "<b>".$iTotalQuantity."</b>";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTotalFee">				
							<?php
								echo number_format($dTotalFee, 2, '.', '');
							?>
						</td>
					  </tr>				
<?php					
					}
					$sCurrentTransactionDate=$value['transaction_date'];				  
					
						
					$currentItemId = $value['item_id'];					

					$iCount++;		
/*					echo "<br/>";
*/					
				}			

				echo "</table>";				
				echo "<br/>";				
//removed by Mike, 20210515				
/*				echo '<div>***NOTHING FOLLOWS***';
				echo "<br/>";								
*/				
			}
		}
?>	

<?php	
		//added by Mike, 20210514

		//edited by Mike, 20230406
		//echo '<h3>Patient Purchased Snack Item History</h3>';
		echo '<h3>Patient Purchased Snack Item History ['.date("Y").'~'.$searchHistoryRangeDate.'] +</h3>';

		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultPaidSnackItem)) and ($resultPaidSnackItem!=False)) {
				$resultCount = count($resultPaidSnackItem);
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
					echo '<div>Showing <b>'.count($resultPaidSnackItem).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($resultPaidSnackItem).'</b> results found.</div>';			
				}			
				echo '<br/>';
			
				echo "<table class='search-result'>";

				//add: table headers				
?>				
					  <tr class="row">
						<td class="columnTableHeader">				
				<?php
							echo "DATE";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "COUNT";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "ACTUAL<br/>FEE"; //"ITEM FEE, i.e. discounted price, set price";
							?>
						</td>						
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "QTY";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "TOTAL";
							?>
						</td>
					  </tr>
<?php				
				  $iCount=1;
				  $iCountForTheDay=0;
				  $sCurrentTransactionDate="";
				  
				  //added by Mike, 20210412
				  $dTotalFee = 0;					  

				  //added by Mike, 20210929
				  $iTotalQuantity = 0;
				  				  
				  //added by Mike, 20210407
				  $iTotalResultPaidSnackItemCount = count($resultPaidSnackItem);				  

				  foreach ($resultPaidSnackItem as $value) {
/* //removed by Mike, 20210314					  
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  
*/					
		?>						

<!-- removed by Mike, 20210408		
		  <tr class="row">
			<td class="column">				
-->			
				<?php
//								echo $value['transaction_date'];
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;

					  echo "<tr class='row'>";
					  echo "<td class='column'>";

					}
					else {
					  $iCountForTheDay=1;
//					  echo $value['transaction_date'];
						
					//edited by Mike, 20210412
/*					if ((($sCurrentTransactionDate!="") and ($sCurrentTransactionDate!=$value['transaction_date'])) or
							($iCount==($iTotalResultPaidMedItemCount))) {	
*/
					if (($dTotalFee!=0) and ((($sCurrentTransactionDate!="") and($sCurrentTransactionDate!=$value['transaction_date'])) or
							($iCount==($iTotalResultPaidSnackItemCount)))) {							
							
		?>
				<tr class="row">
						<td class="column">				
						</td>
						<td class="column">				
						</td>
						<td class="columnGrandTotalName">				
				<?php
							echo "TOTAL FOR THE DAY (SNACK ITEM)";
				?>		
						</td>
						<td class="column">				
						</td>
						<td class="column">				
						</td>						
						<td class="column">				
						</td>
						<td class="columnNumberQuantityTotal">				
							<?php
								//added by Mike, 20210929
								echo "<b>".$iTotalQuantity."</b>";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTotalFee">				
							<?php
								echo number_format($dTotalFee, 2, '.', '');
							?>
						</td>
					  </tr>				
<?php					
					}

					  echo "<tr class='row'>";
					  echo "<td class='column'>";

					  //edited by Mike, 20221102
					  //echo date('Y-m-d', strtotime($value['transaction_date']));

						echo "<a href='".site_url('browse/viewAcknowledgmentForm/'.$patientId.'/'.date("m-d-Y",strtotime($value['transaction_date'])))."' id='viewAcknowledgmentFormId' target='_blank'><b>".
							//edited by Mike, 20210927
	//							str_replace(" ","T",$value['added_datetime_stamp'])."</b>
							date('Y-m-d', strtotime($value['transaction_date']))."</b>
						</a>";


					  //added by Mike, 20210407
					  $dTotalFee = 0;					  

					  //added by Mike, 20210929
					  $iTotalQuantity = 0;
				}
					
					//removed by Mike, 20210407
//					$sCurrentTransactionDate=$value['transaction_date'];				  

							?>
						</td>
						<td class="column">				
							<?php
								echo $iCountForTheDay;
							?>
						</td>

						<td class="columnName">				
							<a href='<?php echo site_url('browse/viewItemSnack/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>" target='_blank'>
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class="columnNumber">		
								<!-- edited by Mike, 20200912 
								<input type="hidden" id="feeParam" value="<?php echo $value['item_price']?>">
								</input>
-->								
								<input type="hidden" value="<?php echo $value['item_price']?>">
								</input>
					
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20210423
//								echo $value['fee'];
								//edited by Mike, 20210616
//								echo number_format($value['fee']/$value['fee_quantity'], 2, '.', '');								
								echo "@".number_format($value['fee']/$value['fee_quantity'], 2, '.', '');								
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
						<td>
							x
						</td>
						<td class="columnNumber">				
								<div id="itemQuantityId<?php echo $iCount?>">
							<?php
//								echo floor(($value['fee']/$value['item_price']*100)/100);
//								$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								//edited by Mike, 20200415
								if ($value['fee_quantity']==0) {
//									$iQuantity =  1;
									$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								}
								else {
									$iQuantity =  $value['fee_quantity'];
								}

								echo $iQuantity;
								
								//added by Mike, 20210929
								$iTotalQuantity = $iTotalQuantity + $iQuantity;
							?>
								</div>
						</td>
						<td class="column">				
						=
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
								//added by Mike, 20210407							
								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
					  </tr>
					  
		<?php		
				  //added by Mike, 20210407
/*				  
				  echo "sCurrentTransactionDate: ".$sCurrentTransactionDate."<br/>";
				  echo "transaction_date: ".$value['transaction_date']."<br/>";

echo "iCount: ".$iCount."<br/>";
echo "iTotalResultPaidNonMedItemCount: ".$iTotalResultPaidMedItemCount;				   		
*/				   				  
//TO-DO: -update: this due to $iTotalResultPaidMedItemCount not only for the day
					if ((($sCurrentTransactionDate=="") and
						($sCurrentTransactionDate!=$value['transaction_date']) and 
						($iCount==$iTotalResultPaidSnackItemCount)) or
							($iCount==($iTotalResultPaidSnackItemCount))) {	
							
		?>
				<tr class="row">
						<td class="column">				
						</td>
						<td class="column">				
						</td>
						<td class="columnGrandTotalName">				
				<?php
							echo "TOTAL FOR THE DAY (SNACK ITEM)";
				?>		
						</td>
						<td class="column">				
						</td>
						<td class="column">				
						</td>						
						<td class="column">				
						</td>
						<td class="columnNumberQuantityTotal">				
							<?php
								//added by Mike, 20210929
								echo "<b>".$iTotalQuantity."</b>";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTotalFee">				
							<?php
								echo number_format($dTotalFee, 2, '.', '');
							?>
						</td>
					  </tr>		
<?php					
					}
					$sCurrentTransactionDate=$value['transaction_date'];				  
					
						
					$currentItemId = $value['item_id'];					

					$iCount++;		
/*					echo "<br/>";
*/					
				}				

				echo "</table>";				
				echo "<br/>";				
//added by Mike, 20210515				
				echo '<div>***NOTHING FOLLOWS***';	
				echo "<br/>";				
				
				
			}

		}
?>

	<br/>
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>
