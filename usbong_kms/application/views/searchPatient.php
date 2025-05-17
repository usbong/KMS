<!--
' Copyright 2020~2025 SYSON, MICHAEL B.
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
' @date updated: 20250517; from 20250513
' @website address: http://www.usbong.ph
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
						
						div.patientName
						{
							text-align: left;
						}						

						div.medicalDoctorName
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

						div.tableHeaderAddNewPatient
						{
							font-weight: bold;
							text-align: center;
							background-color: #ff8000; <!--#93d151; lime green-->
							border: 1pt solid #ff8000;
						}						

						div.transactionDateDiv
						{
							text-align: center;
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

						table.addPatientTable
						{
							border: 2px dotted #ab9c7d;		
							margin-top: 10px;
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
							text-align: right
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
						
						span.asterisk
						{
							color: #ff0000;							
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
      Search Patient
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
		//SVGH
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

		function copyTextMOSC(iCount){
//			alert("hello"+iCount);
	 
			//Reference: https://stackoverflow.com/questions/51625169/click-on-text-to-copy-a-link-to-the-clipboard;
			//last accessed: 20200307
			//answer by: colxi on 20180801; edited by: Lord Nazo on 20180801	 

			var sHoldTextPatientName = document.getElementById("patientNameId"+iCount).innerText;
			
			const el = document.createElement('textarea');

			el.value = sHoldTextPatientName;
			
			document.body.appendChild(el);							
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

//			alert("text: "+sHoldTextPatientName + sHoldTextFee);//el.value);

		}
		
		//added by Mike, 20250513
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
	<!-- TO-DO: -update: site_url value -->
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

<!--	<div id="myText" onclick="copyText(1)">Text you want to copy</div>
-->	
	<?php
		//get only name strings from array 
		if (isset($result)) {			
		
			echo "<br/>";
			echo "<br/>";

			if ($result!=null) {		
				$resultCount = count($result);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($result).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($result).'</b> results found.</div>';			
				}			

				echo "<br/>";

				//added by Mike, 20250429
				//echo $result[0]['added_datetime_stamp']."<br/>";

				if (isset($result[0]['added_datetime_stamp']) and (strpos($result[0]['added_datetime_stamp'],date('Y/m/d'))!==false)) {
					echo "<span style='color:red'><b>CAUTION! THE <span style='color:black'>SAME NAME</span> WAS ADDED ON <span style='color:black'>".substr($result[0]['added_datetime_stamp'],0,strpos($result[0]['added_datetime_stamp']," "))."</span> IN THE OLD RECORDS!</b></span>";

					echo "<br/><br/>";
				}

				echo "<table class='search-result'>";
				
				//add: table headers
?>
				<tr class="row">
						<td class ="column">				
								<div class="tableHeader">
				<?php
								echo "PATIENT NAME";
				?>		
								</div>								
						</td>
						<td class ="column">				
								<div class="tableHeader">
							<?php
								echo "DATE";
							?>
								</div>
						</td>
						<td class ="column">				
								<div class="tableHeader">
							<?php
									echo "MEDICAL DOCTOR";
							?>
								</div>
						</td>			
						<td>
						</td>
					  </tr>
<?php				
				//added by Mike, 20250513
				$sPatientName="";
				$sTransactionDate="";
				$sMedicalDoctor="";				

				$iCount = 1;
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
						<td class ="column">				
<?php
							//edited by Mike, 20250429
							if (isset($result[0]['added_datetime_stamp'])) {
								//echo site_url('browse/viewPatient/'.$value['patient_id'])
								//edited by Mike, 20250430
/*								
								echo ">>>>>".$result[0]['last_visited_date']."!!!<br/>";
								echo "stamp: ".$result[0]['added_datetime_stamp']."<br/>";
								echo "date: ".date('Y-m-d')."<br/>";
*/								
								//if (strpos($result[0]['added_datetime_stamp'],date('Y/m/d'))!==false) {
								//if ((strpos($result[0]['added_datetime_stamp'],date('Y/m/d'))!==false)and ($result[0]['last_visited_date']==="")) {
								if ((strpos($result[0]['added_datetime_stamp'],date('Y-m-d'))!==false)and (strpos($result[0]['last_visited_date'],'/')===false)) { //blank
	?>
									<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id']) ?>' id="patientNameId<?php echo $iCount?>" onclick="copyTextMOSC(<?php echo $iCount?>)">
	<?php
								}
								else {
	?>
									<a href='<?php echo site_url('browse/viewPatientIndexCard/'.$value['patient_id'].'/0') ?>' id="patientNameId<?php echo $iCount?>" onclick="copyTextMOSC(<?php echo $iCount?>)">
	<?php
								}
							}
							else {
	?>
									<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id']) ?>' id="patientNameId<?php echo $iCount?>" onclick="copyTextMOSC(<?php echo $iCount?>)">
	<?php
							}
?>							
								<div class="patientName">
				<?php
//								echo $value['patient_name'];
								//edited by Mike, 20250513
								//echo str_replace("�","Ñ",$value['patient_name']);
								
								$sPatientName=str_replace("�","Ñ",$value['patient_name']);
								
								echo $sPatientName;
								
//								echo str_replace("ufffd","Ñ",$value['patient_name']);
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">				
								<div class="transactionDateDiv" id="transactionDateId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200518								
//								echo $value['transaction_date'];
//								echo DATE("Y-m-d", strtotime($value['transaction_date']));

								//edited by Mike, 20210724
//								if ($value['transaction_date']==0) {
	
								//edited by Mike, 20250513
								if (!isset($value['transaction_date']) or ($value['transaction_date']==0)) {
									//echo DATE("Y-m-d");
									//$sTransactionDate=DATE("Y-m-d");
									//edited by Mike, 20250517
									//echo $sTransactionDate;
									echo "-"; //"NEW";
								}
								else {
									//echo DATE("Y-m-d", strtotime($value['transaction_date']));
									$sTransactionDate=DATE("Y-m-d", strtotime($value['transaction_date']));
									
									//added by Mike, 20250517
									//echo $sTransactionDate;
									//if a transaction today;
									if (strpos($sTransactionDate,DATE("Y-m-d"))!==false) {
										echo "-"; //"NEW";
									}
									else {
										echo $sTransactionDate;
									}
								}
							?>
								</div>
						</td>						
						<td class ="column">				
								<div class="medicalDoctorName" id="medicalDoctorId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200518
//								echo $value['medical_doctor_name'];
//edited by Mike, 20210721
//								if ($value['medical_doctor_name']=="") {
								if (!isset($value['medical_doctor_name']) or ($value['medical_doctor_name']=="")) {
									echo "NEW; NONE YET";
								}
								else {
									//edited by Mike, 20250513
									//echo $value['medical_doctor_name'];
									$sMedicalDoctor=$value['medical_doctor_name'];
									
									echo $sMedicalDoctor;
								}								
							?>
								</div>
						</td>			
						<td>
<?php					 //added by Mike, 20250513
						 //$patientName=str_replace("�","Ñ",$value['patient_name']);

						 echo "<button class='copyToClipboardButton' onclick='myCopyToClipboardFunction(\"".$sPatientName."; ".$sTransactionDate."; ".$sMedicalDoctor."\")'>⿻</button>";
?>						
						</td>
					  </tr>
		<?php				
					$iCount++;		
//					echo "<br/>";
				}				
				
				echo "</table>";				
				echo "<br/>";				
				echo '<div>***NOTHING FOLLOWS***';	
			}
			else {					
				//added by Mike, 20220105
				//note: We auto-remove space before and after ",", i.e. comma
/*	//removed by Mike, 20220105; note: There exist names with "JR.", et cetera
				$nameParamToken = explode(",", $nameParam);
				$nameParam = trim($nameParamToken[0]).", ".trim($nameParamToken[1]);
*/
				$nameParam = str_replace(",",", ",$nameParam);
				$nameParam = str_replace(" ,",",",$nameParam);
			
				echo '<div>';					
				echo 'Your search <b>- '.$nameParam.' -</b> did not match any of our patients\' names.';
				echo '<br/><br/>Recommended Steps:';
				echo '<br/>1) Reverify that the patient is <b>not</b> new.';				
				echo '<br/>2) Reverify that the spelling is correct.';				
				echo '<br/>3) Add <b>new</b> patient name.';				
				echo '</div>';				
			}			
		}
	?>
	<br />
	<br />
		
	<table class="addPatientTable">
	<tr>
		<td>
			<div class="tableHeaderAddNewPatient">
				ADD NEW PATIENT
			</div>
		</td>
	</tr>
	<tr>
		<td>
		<!-- Form -->
		<!-- note: "browse/addPatientNameAccounting" to redirect to patient wait list -->
		<!-- "browse/addPatientName" faster -->
		<form method="post" action="<?php echo site_url('browse/addPatientName/')?>">
			<div>
				<table width="100%">
				  <tr>
					<td>
					  <b><span>Last Name <span class="asterisk">*</span></b>
					</td>
				  </tr>
				  <tr>
					<td>				
					  <input type="text" class="patient-input" placeholder="" name="patientLastNameParam" required>
					</td>
				  </tr>
				</table>
			</div>
			<div>
				<table width="100%">
				  <tr>
					<td>
					  <b><span>First Name </span><span class="asterisk">*</span></b>
					</td>
				  </tr>
				  <tr>
					<td>
					  <input type="text" class="patient-input" placeholder="" name="patientFirstNameParam" required>
					</td>
				  </tr>
				</table>
			</div>	
			<br />
			<!-- Buttons -->
			<button type="submit" class="Button-login">
				Submit
			</button>
		</form>
		</td>
	</tr>
	</table>
		
	<br />
	<br />
	<br />
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>