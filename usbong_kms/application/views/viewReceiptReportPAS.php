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
' @date created: 20200420
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
							margin-top: 0px;

							font-family: Arial;
							font-size: 11pt;

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							/* Legal Size; Landscape */							
							width: 1128px; /*1024px;*/ /*802px;*/ /* 670px */
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

    /**/
    </style>
    <title>
      Receipt Report for the Month (PAS)
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
				P.A.S. ORTHOPEDIC AND<br/>
				MEDICAL SUPPLIES<br/>
				<!-- TO-DO: -add: auto-update: year -->
				<!-- edited by Mike, 20200722 -->
				<?php 
				  if (isset($reportType)) {
					  if ($reportType = "reportToday") {						  
						echo "Report for the Day";
					  }
				  }
				  else {
				?>
					DATE: 2020-<?php echo $monthNum;?>
	<!--				DATE: <?php echo strtoupper(date("Y-m"));?> -->
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
		//TO-DO: -update: this
		if ($result[0]["medical_doctor_name"]==""){
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
								echo "CLASSIFICATION<br/>NON-MED";
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
								<div class="patientName">
				<?php
//								echo $value['patient_name'];
								echo str_replace("�","Ñ",$value['patient_name']);
//								echo str_replace("ufffd","Ñ",$value['patient_name']);
				?>		
								</div>								
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
/*
								//we do fee computation in the next column	
								$fAmountNoLess20PercentDiscount += $value['x_ray_fee'] / (1 - 0.20);
								$fLess20PercentDiscount = $fAmountNoLess20PercentDiscount*0.20;
*/

								//removed temporarily by Mike, 20200619
/*
								if (strpos(strtoupper($value['notes']),"SC")!==false) {
									echo "SC";											
								}
								else if (strpos(strtoupper($value['notes']),"PWD")!==false) {
									echo "PWD"; 								
								}
								else {
									echo "WI";										
								}								
*/								
								echo "WI";										
							?>
								</div>
						</td>
						<td class ="columnFee">				
								<div id="amountPaidId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200617
								$fAmountPaid = $value['pas_fee'];
//								$fAmountPaid = $value['fee'];

//								echo $fAmountPaid;
								echo number_format($fAmountPaid, 2, '.', '');

								$fTotalAmountPaid += $fAmountPaid;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="vatSalesId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200619
								//removed temporarily by Mike, 20200619
/*
								if ((strpos(strtoupper($value['notes']),"SC")!==false) or (strpos(strtoupper($value['notes']),"PWD")!==false)) {
								}
								else { //WI								
*/								
								   $fVatAmount = number_format($fAmountPaid/1.12*0.12, 2, '.', '');
								   $fVatSales = $fAmountPaid - $fVatAmount;	//edited by Mike, 20200426
/*
								}								
*/
							    echo number_format($fVatSales, 2, '.', '');									
								
								$fTotalVatSales += $fVatSales;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="vatAmountId<?php echo $iCount?>">
							<?php
							    echo number_format($fVatAmount, 2, '.', '');									

								$fTotalVatAmount += $fVatAmount;
							?>
								</div>
						</td>						
						<td class ="columnFee">				
								<div id="amountWithVatId<?php echo $iCount?>">
							<?php
								$fAmountWithVat = $fAmountPaid;
							    echo number_format($fAmountWithVat, 2, '.', '');

								$fTotalAmountWithVat += $fAmountWithVat;								
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
//						echo "<b>".$fTotalAmountPaid."</b>";
						echo "<b>".number_format($fTotalAmountPaid, 2, '.', '')."<b/>";		
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						echo "<b>".number_format($fTotalVatSales, 2, '.', '')."<b/>";		
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						echo "<b>".number_format($fTotalVatAmount, 2, '.', '')."<b/>";		
					?>
						</div>
				</td>						
				<td class ="columnFee">				
						<div>
					<?php
						echo "<b>".number_format($fTotalAmountWithVat, 2, '.', '')."<b/>";		
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
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>		 
  </body>
</html>