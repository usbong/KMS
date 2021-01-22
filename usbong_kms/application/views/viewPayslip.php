<!--
' Copyright 2020~2021 Usbong Social Systems, Inc.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @author: Michael Syson
' @date created: 20200306
' @date updated: 20210122
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
							text-align: right
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

						td.columnTableHeaderCount
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 12%;
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
						
						td.notesColumn
						{
							border: 1px dotted #ab9c7d;		
							text-align: left
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
      Payslip for the Day
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
			<h2>
				Payslip for the Day
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- edited by Mike, 20200929 -->
	<div><b>DATE: </b><?php echo strtoupper(date("Y-m-d, l")); //"2020-09-28, MONDAY"?>
	</div>
	<?php 
		if ($result[0]["medical_doctor_name"]==""){
			echo "<br/>There are no transactions for the day.";
		}
		else {
			echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];		
		}
	?>
	<br/>
	<br/>
	
<!--	<div id="myText" onclick="copyText(1)">Text you want to copy</div>
-->	
	<?php
		//added by Mike, 20200415
		$iFee = 0;
		$iMOSC = 0;
		$iNetPF = 0;
		$iXRayFee = 0;

		$iTotalFee = 0;
		$iTotalMOSC = 0;
		$iTotalNetPF = 0;
		$iTotalXRayFee = 0;

		//added by Mike, 20200824
		$iTotalMinorsetFee = 0;
	
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
						<td class ="columnTableHeaderCount">				
								<div class="tableHeader">
							<?php
								echo "COUNT";
							?>
								</div>
						</td>

						<td class ="columnTableHeader">				
								<div class="tableHeader">
				<?php
								echo "PATIENT NAME";
				?>		
								</div>								
						</td>
						<td class ="columnTableHeaderFee">				
								<div class="tableHeader">
							<?php
								echo "FEE";
							?>
								</div>
						</td>
						<td class ="columnTableHeaderFee">				
								<div class="tableHeader">
							<?php
									echo "MOSC";
							?>
								</div>
						</td>
						<td class ="columnTableHeaderFee">				
								<div class="tableHeader">
							<?php
									echo "NET PF";
							?>
								</div>
						</td>
						<!-- added by Mike, 20200819; edited by Mike, 20200824 -->
						<td class ="columnTableHeaderFee">				
								<div class="tableHeader">
							<?php
									echo "MINOR<br/>SET";
							?>
								</div>
						</td>						
						<td class ="columnTableHeaderNotes">				
								<div class="tableHeader">
							<?php
									echo "NOTES";
							?>
								</div>
						</td>
						<td class ="columnTableHeaderFee">				
								<div class="tableHeader">
							<?php
									echo "X-RAY FEE";
							?>
								</div>
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
		?>				
		
					  <tr class="row">
						<td class ="column">				
								<span id="countId<?php echo $iCount?>">
							<?php
								echo $iCount;
							?>
								</span>
						</td>

						<td class ="column">				
<!--						//edited by Mike, 20200523
							<a href="#" id="patientNameId<?php echo $iCount?>" onclick="copyText(<?php echo $iCount?>)">
-->
							<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
							
								<div class="patientName">
				<?php
//								echo $value['patient_name'];
								echo str_replace("�","Ñ",$value['patient_name']);
//								echo str_replace("ufffd","Ñ",$value['patient_name']);
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">				
								<span id="feeId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200415
//								echo $value['fee'];
								//output: whole numbers							
//								echo floor(($value['fee']*100)/100);
								$iFee = floor(($value['fee']*100)/100);
								
								//added by Mike, 20200819
								$iMinorsetFee = 0;
								if (strpos($value['notes'],"MINORSET")!==false){
									$iMinorsetFee = 500;
									$iTotalMinorsetFee = $iTotalMinorsetFee + 500;
									
									//edited by Mike, 20200824
//									$iFee = $iFee - 500;
									$iFee = $iFee;
								}						
								
								echo $iFee;
								
								$iTotalFee += $iFee; //$value['fee'];
							?>
								</span>
						</td>

						<td class ="column">				
								<div id="moscFeeId<?php echo $iCount?>">
							<?php							
								//edited by Mike, 20200403
//								if (strtoupper($value['notes'])=="PRIVATE") {
								if (strpos(strtoupper($value['notes']), "PRIVATE")!==false) {
									//removed by Mike, 20200507									
									//echo 0;
									
									$iMOSC = 0;
								}
								else {
									//removed by Mike, 20200507
//									echo $value['fee']*.30;

									//added by Mike, 20200507
									if (strpos(strtoupper($value['notes']), "DEXA")!==false) {
										//$iMOSC = ($value['fee']-500)*.30;
										//edited by Mike, 20210122
										//max dexa: 2
										if (strpos(strtoupper($value['notes']), "DEXA2")!==false) {
											$iMOSC = ($value['fee']-1000)*.30;
										}
										else {
											$iMOSC = ($value['fee']-500)*.30;
										}
									}
/*									//removed by Mike, 20200824									
									//added by Mike, 20200824
									else if (strpos(strtoupper($value['notes']), "MINORSET")!==false) {
										$iMOSC = ($value['fee']-500)*.30;
									}									
*/									
									else {
										$iMOSC = $value['fee']*.30;
									}
								}

								//added by Mike, 20200507
								//output: whole numbers
								echo floor(($iMOSC*100)/100);

								//added by Mike, 20200906
								//add: 12% to MOSC Fee if Dr. Honesto and has MOSC OR
								if (strpos(strtoupper($value['medical_doctor_name']), "HONESTO")!==false) {
									//edited by Mike, 20200910
									if ((isset($value['receipt_number'])) and (!empty($value['receipt_number']))) {							
										$dAddDueToMOSCOR = $value['fee']*.12;
										
										$iMOSC = $iMOSC + $dAddDueToMOSCOR;

										//edited by Mike, 20200909										
										//echo " + ".$dAddDueToMOSCOR;
										if ($dAddDueToMOSCOR!=0) {
											echo " + ".$dAddDueToMOSCOR;
										}
									}									
								}

								$iTotalMOSC += $iMOSC;
							?>
								</div>
						</td>
						<td class ="column">				
								<div id="medicalDoctorFeeId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200403; edited by Mike, 20200507
//								if (strtoupper($value['notes'])=="PRIVATE") {
								if (strpos(strtoupper($value['notes']), "PRIVATE")!==false) {
//									echo $value['fee'];

									$iNetPF = $value['fee'];
/*									
									//added by Mike, 20200403; edited by Mike, 20200507
									if (strpos(strtoupper($value['notes']), "DEXA")!==false) {
										$iNetPF = $value['fee']+500;//($value['fee']-500)*.70+500;
									}
									else {
										$iNetPF = $value['fee'];
									}
*/									
								}
								else {
//									echo $value['fee']*.70;

									//added by Mike, 20200403; edited by Mike, 20200507
									if (strpos(strtoupper($value['notes']), "DEXA")!==false) {
										//edited by Mike, 20210122
										//$iNetPF = ($value['fee']-500)*.70+500;
										//max dexa: 2
										if (strpos(strtoupper($value['notes']), "DEXA2")!==false) {
											$iNetPF = ($value['fee']-1000)*.70+1000;
										}
										else {
											$iNetPF = ($value['fee']-500)*.70+500;
										}
									}
/*									//removed by Mike, 20200824									
									//added by Mike, 20200824
									else if (strpos(strtoupper($value['notes']), "MINORSET")!==false) {
										$iNetPF = ($value['fee']-500)*.70+500;
									}
*/									
									else {
										$iNetPF = $value['fee']*.70;

									}
								}

								//added by Mike, 20200407
								//output: whole numbers
								echo floor(($iNetPF*100)/100);

								//added by Mike, 20200906
								//deduct: 12% to Net Fee if Dr. Honesto and has MOSC OR
								if (strpos(strtoupper($value['medical_doctor_name']), "HONESTO")!==false) {
									//edited by Mike, 20200910
									if ((isset($value['receipt_number'])) and (!empty($value['receipt_number']))) {							
										$dDeductDueToMOSCOR = $value['fee']*.12;
										
										$iNetPF = $iNetPF - $dDeductDueToMOSCOR; //$value['fee']*.12;
	
										//edited by Mike, 20200909										
										//echo " - ".$dDeductDueToMOSCOR;
										if ($dAddDueToMOSCOR!=0) {
											echo " - ".$dDeductDueToMOSCOR;
										}										
									}									
								}

								$iTotalNetPF += $iNetPF;
							?>
								</div>
						</td>
						<!-- added by Mike, 20200824 -->
						<td class ="column">				
								<div id="minorsetFeeId<?php echo $iCount?>">
							<?php
								//output: whole numbers
								echo $iMinorsetFee;								
							?>
								</div>
						</td>						
						<td class ="notesColumn">				
							<div id="notesId<?php echo $iCount?>">
						<?php
								$iXRayFee = floor(($value['x_ray_fee']*100)/100);

								if ($value['notes']=="") {	
									//edited by Mike, 20200415
//										echo "NONE";								
									if (($iFee==0) and ($iMOSC==0) and ($iNetPF==0) and ($iXRayFee==0)) {
										echo "UNPAID";
									}
									else {
										echo "NONE";
									}
								}
								else {
									echo strtoupper($value['notes']);
								}


								//added by Mike, 20200906
								//add: 12% to MOSC Fee if Dr. Honesto and has MOSC OR
								if (strpos(strtoupper($value['medical_doctor_name']), "HONESTO")!==false) {
									//edited by Mike, 20200910
									if ((isset($value['receipt_number'])) and (!empty($value['receipt_number']))) {
										//edited by Mike, 20200909										
										//echo "; MOSC OR";
										if ($dAddDueToMOSCOR!=0) {
											echo "; MOSC OR";
										}								
									}									
								}

						?>
							</div>						
						</td>
						<td class ="column">				
								<div id="xrayFeeId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200415
//								echo $value['x_ray_fee'];
								//output: whole numbers
//								echo floor(($value['x_ray_fee']*100)/100);								
//								$iXRayFee = floor(($value['x_ray_fee']*100)/100);

								echo $iXRayFee;

								$iTotalXRayFee += $iXRayFee; //$value['x_ray_fee'];
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
//								echo "PATIENT NAME";
		?>		
						</div>								
				</td>
				<td class ="column">				
						<div>
					<?php
						echo "<b>".$iTotalFee."</b>";
					?>
						</div>
				</td>
				<td class ="column">				
						<div>
					<?php
						echo "<b>".$iTotalMOSC."</b>";
					?>
						</div>
				</td>
				<td class ="column">				
						<div>
					<?php
						echo "<b>".$iTotalNetPF."</b>";
					?>
						</div>
				</td>
				<!-- added by Mike, 20200824 -->
				<td class ="column">				
						<div>
					<?php
						echo "<b>".$iTotalMinorsetFee."</b>";
					?>
						</div>
				</td>				
				<td class ="column">				
						<div>
					<?php
//									echo "NOTES";
					?>
						</div>
				</td>
				<td class ="column">				
						<div>
					<?php
						echo "<b>".$iTotalXRayFee."</b>";
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
		<span>© Usbong Social Systems, Inc. 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>