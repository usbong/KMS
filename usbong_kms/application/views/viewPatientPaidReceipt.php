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
' @date created: 20200517
' @date updated: 20210622
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

							/* edited by Mike, 20210622 */
							/* TO-DO: -add: auto-identify if Tablet PC */
							/* 670 makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							/*width: 670px*/
							width: 1000px							
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
						
						span.alertSpan {
							color: red;
							font-weight: bold;
						}
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.receiptDetailsTable
						{
							width: 100%;
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
							text-align: left /* right //edited by Mike, 20210622 */
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

						td.receiptDetailsColumn
						{
							width: 90%;
							display: inline-block;
							text-align: right;
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

						textarea.receipt-input
						{
							width: 42%
						}

						span.asterisk
						{
							color: #ff0000;
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

		//added by Mike, 20200329; edited by Mike, 20200414
//		function myPopupFunction() {				
		function myPopupFunction(itemId) {				
			var quantity = document.getElementById("quantityParam").value;
			var fee = document.getElementById("feeParam").value;
			//added by Mike, 20200504
			var resultQuantityInStockNow  = document.getElementById("resultQuantityInStockNowParam").value;

//			alert("quantity: " + quantity);
//			alert("fee: " + fee);
//			alert("resultQuantityInStockNow: " + resultQuantityInStockNow);

/*
			var product_id = document.getElementById("product_idParam").value;
			var customer_id = document.getElementById("customer_idParam").value;
			var quantity = document.getElementById("quantityParam").value;
			var price = document.getElementById("priceParam").value;
			
			var textCart = document.getElementById("Text-cartId");
			var textCart2Digits = document.getElementById("Text-cart-2digitsId");
			var textCart3Digits = document.getElementById("Text-cart-3digitsId");
	
			var totalItemsInCart = parseInt(document.getElementById("totalItemsInCartId").value);
*/

			//added by Mike, 20200419
			if (quantity==0) {	
			  alert("Kailangang hindi zero (0) ang QUANTITY.");
			  return;
			}

			//added by Mike, 20200419			
			if (fee==0){	
			  alert("Kailangang hindi zero (0) ang FEE.");
			  return;
			}

			//do the following only if quantity is a Number, i.e. not NaN
			if ((!isNaN(quantity)) && (!isNaN(fee))) {	
/*
				//added by Mike, 20170701
				var quantityField = document.getElementById("quantityId");			
				if (quantity>1) {
					quantityField.innerHTML = "Added <b>" +quantity +"</b> units of ";
				}
				else {
					quantityField.innerHTML = "Added <b>1</b> unit of ";
					quantity=1; //added by Mike, 20181029
				}
				var productPriceField = document.getElementById("productPriceId");
				var totalPrice = quantity*price;
				productPriceField.innerHTML = totalPrice;								
				//-----------------------------------------------------------
				
				totalItemsInCart+=parseInt(quantity);
				if (totalItemsInCart>99) {
					totalItemsInCart=99;
				}
	
				document.getElementById("totalItemsInCartId").value = totalItemsInCart;
*/						
/*
				//TO-DO: -add: transaction in database
				alert("itemId: " + itemId);
				alert("quantity: " + quantity);
				window.location.href = "<?php echo site_url('browse/searchMedicine/');?>";
*/
/*
				//added by Mike, 20200330
				window.location.href = "<?php echo site_url('browse/addTransactionMedicinePurchase/"+itemId+"/"+quantity+"');?>";
*/
				//added by Mike, 20200504
				if (resultQuantityInStockNow == 0) { //zero
					alert("Zero (0) o wala na tayo nito sa kasalukuyan.");
					return;
				}

				if (resultQuantityInStockNow - quantity < 0) { //negative number
					alert(resultQuantityInStockNow + " lamang ang mayroon tayo sa kasalukuyan.");
					return;
				}

				//added by Mike, 20200330; edited by Mike, 20200411
				//1 = Medicine
				window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/1/"+itemId+"/"+quantity+"/"+fee+"');?>";

/*
				//added by Mike, 20170627
				if (customer_id=="") {
					window.location.href = "<?php echo site_url('account/login/');?>";
				}
				else {				
		//			var base_url = window.location.origin;
					var site_url = "<?php echo site_url('cart/addToCart/');?>";
					var my_url = site_url.concat(product_id,'/',customer_id,'/',quantity,'/',price);
					
					$.ajax({
				        type:"POST",
				        url:my_url,
		
				        success:function() {			        	
				        	if (totalItemsInCart<10) {
					        	textCart.innerHTML=totalItemsInCart;
								textCart2Digits.innerHTML="";
								textCart3Digits.innerHTML="";
				        	}
							else if (totalItemsInCart<100) {
					        	textCart.innerHTML="";
								textCart2Digits.innerHTML=totalItemsInCart;
								textCart3Digits.innerHTML="";
							}
							else {
					        	textCart.innerHTML="";
								textCart2Digits.innerHTML="";
								textCart3Digits.innerHTML=totalItemsInCart;
							}
							
							$('#myPopup').modal('show');
				        }
		
				    });
				    event.preventDefault();
				}
*/

				//added by Mike, 20200331
//				$('#myPopup').modal('show');

//				document.getElementById("myPopup").classList.toggle("show");
			}
		}	

		function myPopupFunctionDelete(medicalDoctorId,patientId,transactionId) {				
/*
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
*/			
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/deleteTransactionServicePurchase/"+medicalDoctorId+"/"+patientId +"/"+transactionId+"');?>";

		}	

		//added by Mike, 20200331
		function myPopupFunctionPay(itemId) {				
/*
			window.location.href = "<?php echo site_url('browse/payTransactionMedicinePurchase/"+itemId+"');?>";
*/
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/1/"+itemId+"');?>";
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
	<table class="receiptDetailsTable">
	  <tr>
		<td class="receiptDetailsColumn">
			<h2>
				Receipt Details
			</h2>		
		</td>
	  </tr>
	</table>
	
	<!-- Form -->
	<!-- 1 = Medicine -->
	<form method="post" action="<?php echo site_url('browse/confirmPatientPaidReceipt/'.$medicalDoctorId)?>">
<!--
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>Last Name <span class="asterisk">*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>				
				  <input type="text" class="receipt-input" placeholder="" name="memberLastNameParam" required>
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
				  <input type="text" class="receipt-input" placeholder="" name="memberFirstNameParam" required>
				</td>
			  </tr>
			</table>
		</div>	
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>Address <span class="asterisk">*</span></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
					<textarea rows="5" class="receipt-input" placeholder="" name="memberAddressParam" required></textarea>						
				</td>
			  </tr>
			</table>
		</div>	
-->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>Official Receipt Number (MOSC) <span class="asterisk">*</span></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
				  <input type="tel" class="receipt-input" placeholder="" name="officialReceiptNumberMOSCParam" required>
				</td>
			  </tr>			  
			  <?php 
				//edited by Mike, 20200529
//			    if (strpos($medicalDoctorList[$medicalDoctorId-1]['medical_doctor_name'], "PEDRO")==false) {
			    if (strpos($medicalDoctorList[$medicalDoctorId]['medical_doctor_name'], "PEDRO")==false) {
			  ?>
				  <tr>
				    <td>
				      <br/>
					</td>
				  </tr>
				  <tr>
					<td>
<!--			    edited by Mike, 20200529
-->
<b><span>Official Receipt Number <?php echo "(".$medicalDoctorList[$medicalDoctorId]['medical_doctor_name'].")";?><span class="asterisk">*</span></span></b>

<!--					  <b><span>Official Receipt Number <?php echo "(".$medicalDoctorList[$medicalDoctorId]['medical_doctor_name'].")";?><span class="asterisk">*</span></span></b>
-->
					</td>
				  </tr>
				  <tr>
					<td>
					  <input type="tel" class="receipt-input" placeholder="" name="officialReceiptNumberMedicalDoctorParam" required>
					</td>
				  </tr>			  
			  <?php
				}
					if (isset($outputTransaction)) {						
						if ($outputTransaction['pas_fee']!=0) {
//						if ($outputTransaction->pas_fee!==0) {

?>
				  <tr>
				    <td>
				      <br/>
					</td>
				  </tr>
				  <tr>
					<td>
						<b><span>Official Receipt Number (PAS) <span class="asterisk">*</span></span></b>
					</td>
				  </tr>
				  <tr>
					<td>
					  <input type="tel" class="receipt-input" placeholder="" name="officialReceiptNumberPASParam" required>
					</td>				  
				  </tr>
<?php							
						}
					}
			  ?>
			</table>
		</div>	
<!--
		<input type="hidden" class="receipt-input" placeholder="" name="transactionIdParam" value="<?php echo $resultPaid[0]['transaction_id'] ?> "required>
-->
		<input type="hidden" class="receipt-input" placeholder="" name="transactionIdParam" value="<?php echo $outputTransaction['transaction_id'] ?> "required>
		
		<!-- added by Mike, 20200610 -->
		<input type="hidden" class="receipt-input" placeholder="" name="transactionQuantityParam" value="<?php echo $outputTransaction['transaction_quantity'] ?> "required>

		<br />
		<!-- Buttons -->
		<button type="submit" class="Button-login">
			Submit
		</button>
	</form>
	<br />

<?php
//			echo "<br/>";

			echo '<h3>Patient Purchased Service History</h3>';
			
			$value = $result[0];
			//edited by Mike, 20210110
//			if ((!isset($value)) or ($value['transaction_date']=="")) {				
			if (!isset($value)) {				
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
									//edited by Mike, 20200507
									//echo $value['transaction_date'];
									//echo $value['added_datetime_stamp'];
									echo str_replace(" ","T",$value['added_datetime_stamp']);
					?>		
								</div>								
							</td>
							<td class ="column">				
								<a href='<?php echo site_url('browse/viewPatient/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
									<div class="patientName">
					<?php
									//TO-DO: -update: this
									//echo $value['patient_name'];
									echo str_replace("�","Ñ",$value['patient_name']);
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