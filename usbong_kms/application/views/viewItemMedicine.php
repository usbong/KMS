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
' @date updated: 20250626; from 20250625
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

							/* edited by Mike, 20201001 */
							/* TO-DO: -add: auto-identify if Tablet PC */
							/* 670 makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							width: 800px							
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
						
						div.itemPurchasedHistory
						{
							font-weight: bold;
							text-align: right;
							margin-right: 10%; /*22%;*/	
						}							

						div.tableHeader
						{
							font-weight: bold;
							text-align: center;
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
						}

						div.quantityInStockDiv
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
						
						span.alertSpan {
							color: red;
							font-weight: bold;
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
							text-align: left;
						}						

						td.columnCentered
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}							

						td.columnGrandTotal
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
						}
						
						td.columnFee
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
						}						

						td.columnNotes
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
						}						

						td.columnTableHeader
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}		

						td.columnTableHeaderName
						{
							font-weight: bold;
							background-color: #00ff00;
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 40%;
						}		

						td.columnTableHeaderFee
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 9%;
						}		
						
						td.columnTableHeaderDateHistory
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 15%;
						}								

						td.columnTableHeaderPatientNameHistory
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 20%;
						}		

						td.columnTableHeaderItemNameHistory
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 28%;
						}		

						td.columnTableHeaderHistory
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 2%;
						}		

						td.columnTableHeaderFeeHistory
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 2%;
						}		

						td.columnTableHeaderBlankHistory
						{
							font-weight: bold;
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 2%;
						}		
						
						td.imageColumn
						{
							width: 40%;
							display: inline-block;
						}						

						td.pageNameColumn
						{
							width: 50%; /*38%;*/
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
							width: 72%;
							float: left;
						}

						.Quantity-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							padding-right: 0;
							
							font-size: 16px;
							border: 1px solid #68502b;
							width: 12%;
							border-radius: 3px;	    	    

							float: left;
						}

						.Button-delete {
							margin-left: 4px;
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
      Search Medicine
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
					var itemIdInput = document.getElementById("payItemIdParam").value;
					var patientIdInput = document.getElementById("payPatientIdParam").value;
					//added by Mike, 20201210
					var medicalDoctorIdInput = document.getElementById("payMedicalDoctorIdParam").value;

					if (itemIdInput !== null && itemIdInput !== '') { //verify only one
						//edited by Mike, 20201211
						//myPopupFunctionPay(itemIdInput, patientIdInput);
						myPopupFunctionPay(itemIdInput, patientIdInput, medicalDoctorIdInput);
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

		//added by Mike, 20200329; edited by Mike, 20200414
//		function myPopupFunction() {				
		function myPopupFunction(itemId) {
			//added by Mike, 20210526
			//note: we add this command to prevent multiple button clicks
			//received by computer server before identifying that a patient transaction
			//already exists in Cart List from Database
			document.getElementById("buyButtonId").disabled = true;
		
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

			//edited by Mike, 20210509
/*			
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
*/			
			if (quantity==0) {	
			  alert("Kailangang hindi zero (0) ang QUANTITY.");
			  return;
			}
			else if (parseInt(quantity)<0) {	
			  alert("Kailangang hindi negative ang QUANTITY.");
			  return;
			}


			if (fee==0){	
			  alert("Kailangang hindi zero (0) ang FEE.");
			  return;
			}
			else if (parseInt(fee)<0) {	
			  alert("Kailangang hindi negative ang FEE.");
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
				//edited by Mike, 20201115
//				window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/1/"+itemId+"/"+quantity+"/"+fee+"');?>";
				window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/1/"+itemId+"/"+quantity+"/"+fee+"/0');?>";

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

		//added by Mike, 20200331
		function myPopupFunctionDelete(itemId,transactionId) {				
/*
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
*/			
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchase/1/"+itemId +"/"+transactionId+"');?>";

		}	

		//added by Mike, 20201115		
		function myPopupFunctionDeleteTransactionServicePurchase(medicalDoctorId,patientId,transactionId) {				
/*			//removed by Mike, 20201115		
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;
*/

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

		//added by Mike, 20200626
		//re-verify: this
		//we do not use this now
		function myPopupFunctionDeleteAllInCart(itemId,transactionId) {				
/*
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
*/			
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchaseAllInCart/1/"+itemId +"/"+transactionId+"');?>";

		}	

		//added by Mike, 20200331; edited by Mike, 20201210
		//function myPopupFunctionPay(itemId) {				
//		function myPopupFunctionPay(itemId, patientId) {				
		function myPopupFunctionPay(itemId, patientId, medicalDoctorId) {				
			//added by Mike, 20201103
			//verified: if a patient id already exists in the cart list
			var hasPatientInCartList = document.getElementById("hasPatientInCartListParam").value;

			//added by Mike, 20211128			
			var isPatientTransactionGratis = document.getElementById("isPatientTransactionGratisParam").value;
			var dCartFeeTotal = document.getElementById("cartFeeTotalId").value;

			if (!hasPatientInCartList) {
				alert("Kailangang may isang (1) pasyente sa bawat Cart List.");
				return;
			}
			
			//added by Mike, 20211128
			if ((isPatientTransactionGratis==0) && (dCartFeeTotal==0)) {
				alert("Sapagkat hindi rin No Charge (NC) o Gratis, kailangang may bayaran sa Cart List.");
				return;					
			}

/*
			window.location.href = "<?php echo site_url('browse/payTransactionMedicinePurchase/"+itemId+"');?>";
*/
			//edited by Mike, 20200608
			//window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/1/"+itemId+"');?>";

			//edited by Mike, 20201210
//			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/1/"+itemId+"/"+patientId+"');?>";

			//note: all carts should include a patient transation with Medical Doctor Identification
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/1/"+itemId+"/"+patientId+"/"+medicalDoctorId+"');?>";
/*						
			alert("patientId: " +patientId);
			alert("medicalDoctorId: "+medicalDoctorId);
*/			
//			window.location.href = "<?php echo site_url('browse/payTransactionServiceAndItemPurchase/"+medicalDoctorId+"/"+patientId+"');?>";
			
		}	

	  </script>
  <!-- edited by Mike, 20200613 -->
  <body onload="onLoad();">
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				Search Medicine
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<form id="browse-form" method="post" action="<?php echo site_url('browse/confirmMedicine')?>">
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
		<a target='_blank' href='<?php echo site_url('browse/viewItemMedicineWithItemPurchasedHistory/'.$itemId)?>' id="viewItemPurchasedHistory">
			<div class="itemPurchasedHistory">
<?php
			echo "ITEM PURCHASED HISTORY"
?>		
			</div>								
		</a>
		<br/>
	
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
						<td class="columnTableHeaderName">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "AVAIL"; //AVAILABLE; //IN-STOCK
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "EXP"; //EXPIRATION
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class="columnTableHeaderFee">				
							<?php
								echo "FEE"; //"ITEM FEE, i.e. discounted price, set price";
							?>
						</td>	
						<td>
						</td>
						<td>
						</td>						
					  </tr>
<?php				
				$iCount = 1;
/*				foreach ($result as $value) {
*/	
				//edited by Mike, 20200501
//				$value = $result[0];

//				if (isset($resultItem)) {

					//edited by Mike, 20200527
					//edited again by Mike, 20200607
//					$value = $resultItem[sizeof($resultItem)-1];
					//$value = $resultItem[0];
//					$value = $resultItem;

					//edited by Mike, 20200608
					//$value = $resultItem[0];
					
					//edited by Mike, 20200803
					$value = $result[0];
					
					if (isset($resultItem[0])) {
						$value = $resultItem[0];
					}
					
					//added by Mike, 20250421
					if (!isset($value['quantity_in_stock'])) {
						$value['quantity_in_stock']=-1;
					}

//				}
		?>				
		
					  <tr class="row">
						<td class ="column">				
							<a href='<?php echo site_url('browse/viewItemMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								//edited by Mike, 20250421
								echo strtoupper($value['item_name']);
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">	
								<!-- added by Mike, 20200504; edited by Mike, 20200505 -->							
								<input type="hidden" id="resultQuantityInStockNowParam" value="<?php 
									if (($resultQuantityInStockNow<0) || ($value['quantity_in_stock']==-1)) {										
										echo 9999;
									} 
									else {
										//added by Mike, 20200618
										//echo $value['resultQuantityInStockNow'];
																				
										if (isset($value['resultQuantityInStockNow'])) {
											echo $value['resultQuantityInStockNow'];
										}
										else {
											echo 0;
										}										
									}
								?>">

								<div class="quantityInStockDiv" id="quantityInStockId<?php echo $iCount?>">
							<?php
								//echo $value['quantity_in_stock'];
/*
								if ($value['quantity_in_stock']==-1) {
									echo 9999;
								}
								else {
									echo $value['quantity_in_stock'];
								}
*/
								//added by Mike, 20200501; edited by Mike, 20200608
								$resultQuantityInStockNow = -1;
								if (isset($value['resultQuantityInStockNow'])) {
									$resultQuantityInStockNow = $value['resultQuantityInStockNow'];
								}
								
													
								//added by Mike, 20210111
								if (!isset($value['quantity_in_stock'])) {
									echo "9999";
								}									
								//edited by Mike, 20200615
								else if ($value['quantity_in_stock']=="") {
									//edited by Mike, 20250416
									//echo "0 / 0";
									echo "0";
								}
								//edited by Mike, 20200411; edited by Mike, 20200713
/*
								else if (($resultQuantityInStockNow<0) || ($value['quantity_in_stock']==-1)) {
									//echo 9999;
									echo "0 / ".$value['quantity_in_stock'];
								}
*/								
								//added by Mike, 20200803
								//note: put this here before "else if ($resultQuantityInStockNow<0) {"
								else if ($value['quantity_in_stock']==-1) {
									echo 9999;
								}
								else if ($resultQuantityInStockNow<0) {
									//edited by Mike, 20200723
									//echo "0 / ".$value['quantity_in_stock'];
									
									if (strpos($value['item_name'], "*")!==false) {
										//TO-DO: -update: this to use actual count
										echo 9999;
									}
									else {
										//edited by Mike, 20200803
										//echo "0 / ".$value['quantity_in_stock'];
										echo "0";
									}
								}
								else {
									//echo $resultQuantityInStockNow."<BR/><BR/>";
									
									//edited by Mike, 20250416
									//show total available;
									//echo $resultQuantityInStockNow." / ".$value['quantity_in_stock'];

									$resultQuantityInStockNowTotal=0;
									$quantityInStockTotal=0;
									
									foreach ($resultItem as $value) {
										if ($value['is_lost_item']==1) {
											//make its quantity negative
											$value['resultQuantityInStockNow']*=(-1);
										}

										$resultQuantityInStockNowTotal+=$value['resultQuantityInStockNow'];
										//$quantityInStockTotal+=$value['quantity_in_stock'];
									}
		
									//echo $resultQuantityInStockNowTotal." / ".$quantityInStockTotal;
									
									//edited by Mike, 20250421
									//echo $resultQuantityInStockNowTotal;

									if ($resultQuantityInStockNowTotal<=0) {
										echo "<span style='color:red'><b>".$resultQuantityInStockNowTotal."</b></span>";
									}
									else {
										echo $resultQuantityInStockNowTotal;
									}
								}								
							?>
								</div>
						</td>
						<td class="columnCentered">				
								<div id="itemExpirationId<?php echo $iCount?>">
							<?php
								//echo $value['expiration_date'];
								//edited by Mike, 20210110
								if (!isset($value['expiration_date'])) {
									echo "UNKNOWN";
								}
								else if ($value['expiration_date']==0) {

									if ($value['quantity_in_stock']==-1) {
										echo "UNKNOWN";
									}									
									//added by Mike, 20200614
									else if ($value['quantity_in_stock']=="") {
										echo "UNKNOWN";
									}									
									else {
										echo "NONE";
									}
								}
								else {
									//edited by Mike, 20200504
									//echo $value['expiration_date'];
									if ($value['expiration_date'] <= date("Y-m-d")) {
										echo '<span class="alertSpan">';
									}
									else {
										echo '<span>';
									}
									echo $value['expiration_date'];
									echo '</span>';
								}
							?>
								</div>
						</td>						
						<td class="columnCentered">		
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
						<!-- added by Mike, 20200912 -->
						<td class ="column">		
							<!-- edited by Mike, 20200611 -->
							<!-- increased number of digits for the fee -->
							<input type="tel" id="feeParam" class="Fee-textbox no-spin" value="<?php echo $value['item_price'];?>" min="1" max="99999" 
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
						<td>
							x
						</td>
						<td>
							<input type="tel" id="quantityParam" class="Quantity-textbox no-spin" value="1" min="1" max="999" 
						onKeyPress="var key = event.keyCode || event.charCode;		
									const keyBackspace = 8;
									const keyDelete = 46;
									const keyLeftArrow = 37;
									const keyRightArrow = 39;
						
									if (this.value.length == 3) {			
										if( key == keyBackspace || key == keyDelete || key == keyLeftArrow || key == keyRightArrow) {
											return true;
										}
										else {
											return false;										
										}
									}" required>	
<!--
							<button onclick="myPopupFunction(<?php echo $value['item_id'];?>)" class="Button-purchase" id="buyButtonId">BUY</button>									
-->				
							<?php //edited by Mike, 20220914
								if (isset(($is_hidden)) && ($is_hidden==1)) {
									//TO-DO: -add: link to updated item page
									echo "<b>UPDATED ITEM AVAILABLE</b>";
								}
								else {
?>
							<button onclick="myPopupFunction(<?php echo $value['item_id'];?>)" class="Button-purchase" id="buyButtonId">BUY</button>									
<?php
								}
?>							
							
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

			//added by Mike, 20200401
			echo '<h3>Cart List</h3>';

			//added by Mike, 20201103
			$hasPatientInCartListParamValue = False;

			$cartListResultCount = 0;
			
			if ((isset($cartListResult)) and ($cartListResult!=False)) {
				$cartListResultCount = count($cartListResult);
			}

			//cart list			
			if ($cartListResultCount==0) {				
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

				//added by Mike, 20200608
				//note: at present, the computer server accepts only 1 patient per cart list
				$patientId = 0; //none

				//added by Mike, 20201210
				$medicalDoctorId = 1; //DR. PEDRO
				
				//add: table headers
				$iCount = 1;
				$cartFeeTotal = 0;
				
				//added by Mike, 20250426
				$iCurrType=0; //patient; at the top of list
				$dMedItemTotal=0;
				$dNonMedItemTotal=0;
				$dSnackItemTotal=0;
				$dPatientServiceTotal=0;
				$iCountTransactionTypes=0;
				
				foreach ($cartListResult as $cartValue) { 
/*	
				$value = $result[0];
*/				
				
				if (intval($cartValue['patient_id'])!=0) {
					$dPatientServiceTotal=$cartValue['fee']+$cartValue['x_ray_fee']+$cartValue['lab_fee'];
					
					//added by Mike, 20250428
					$patientId=$cartValue['patient_id'];
					
					$iCountTransactionTypes++;
				}
				else {
/*					
					echo "iCurrType: ".$iCurrType." ; ";
					echo "item_type_id: ".$cartValue['item_type_id']."<br/>";
*/					
					//med item
					if ($cartValue['item_type_id']==1) {
						$dMedItemTotal+=$cartValue['med_fee'];
						$iCountTransactionTypes++;
					}
					//non-med item
					else if ($cartValue['item_type_id']==2) {
						$dNonMedItemTotal+=$cartValue['pas_fee'];
						$iCountTransactionTypes++;
					}
					//snack item
					else if ($cartValue['item_type_id']==3) {
						$dSnackItemTotal+=$cartValue['snack_fee'];
						$iCountTransactionTypes++;
					}
					
					if ($iCurrType!=$cartValue['item_type_id']) {
						//echo "CHANGE!!! iCurrType: ".$iCurrType."<br/><br/>";
						
						//patient service
						if ($iCurrType==0) {
							if ($dPatientServiceTotal!=0) {				
							//echo "DITO!!!<br/><br/>";
	?>					
							<tr class="row">
							<td class ="column">				
							</td>
							<td class ="column">				
								<div class="">
					<?php
									echo "<b>SERVICE TOTAL</b>";
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
							<td class="columnFee">
							<?php
								echo "<b>".number_format($dPatientServiceTotal, 2, '.', '')."</b>";
							?>
							</td>
	<?php						
							}
						}
						//med item
						//if (intval($cartValue['item_type_id'])==1) {
						else if ($iCurrType==1) {
							//echo "DITO!!!<br/><br/>";
	?>					
							<tr class="row">
							<td class ="column">				
							</td>
							<td class ="column">				
								<div class="">
					<?php
									echo "<b>MED TOTAL</b>";
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
							<td class="columnFee">
							<?php
								echo "<b>".number_format($dMedItemTotal, 2, '.', '')."</b>";
							?>
							</td>
	<?php						
						}
						//non-med item
						//else if (intval($cartValue['item_type_id'])==2) {
						else if ($iCurrType==2) {
	?>					
							<tr class="row">
							<td class ="column">				
							</td>
							<td class ="column">				
								<div class="">
					<?php
									echo "<b>NON-MED TOTAL</b>";
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
							<td class="columnFee">
							<?php
								echo "<b>".number_format($dNonMedItemTotal, 2, '.', '')."</b>";
							?>
							</td>							
	<?php						
						}						
						//snack item
						//put before the GRAND TOTAL row			
					}
					$iCurrType=$cartValue['item_type_id'];
				}

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
									
									//added by Mike, 20201103
									$hasPatientInCartListParamValue = True;
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
<?php
	//edited by Mike, 20210622
								//added by Mike, 20200415; edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									$iQuantity =  1;

									$patientFee = $cartValue['fee']+$cartValue['x_ray_fee']+$cartValue['lab_fee'];								
								}
								else {
									if ($cartValue['fee_quantity']==0) {
	//									$iQuantity =  1;
										$iQuantity =  floor(($cartValue['fee']/$cartValue['item_price']*100)/100);
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
/*							
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									$iQuantity =  1;
								}
								else {
	//								echo $cartValue['fee']/$cartValue['item_price'];
									//edited by Mike, 20200501
	//								echo floor(($cartValue['fee']/$cartValue['item_price']*100)/100);
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
<?php
							//edited by Mike, 20201115
							if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
?>
									<button onclick="myPopupFunctionDeleteTransactionServicePurchase(<?php echo $cartValue['medical_doctor_id'].",".$cartValue['patient_id'].",".$cartValue['transaction_id'];?>)" class="Button-delete">DELETE</button>
<?php
							}
							else {
?>
							<button onclick="myPopupFunctionDelete(<?php echo $result[0]['item_id']/*echo $cartValue['item_id']*/.",".$cartValue['transaction_id'];?>)" class="Button-delete">DELETE</button>									
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

				//edited by Mike, 20250428
				if ($iCountTransactionTypes>1) {

					if ($cartValue['med_fee']!=0) {
?>
					<tr class="row">
						<td class ="column">				
						</td>
						<td class ="column">				
							<div class="">
				<?php
								echo "<b>MED TOTAL</b>";
				?>		
							</div>								
						</td>		
	</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class="columnFee">
								<?php
									echo "<b>".number_format($dMedItemTotal, 2, '.', '')."</b>";
								?>
								</td>
						
					</tr>
	<?php
					}
					
					if ($cartValue['pas_fee']!=0) {
	?>
					<tr class="row">
						<td class ="column">				
						</td>
						<td class ="column">				
							<div class="">
				<?php
								echo "<b>NON-MED TOTAL</b>";
				?>		
							</div>								
						</td>		
	</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class="columnFee">
								<?php
									echo "<b>".number_format($dNonMedItemTotal, 2, '.', '')."</b>";
								?>
								</td>
						
					</tr>
	<?php
					}				
					
					if ($cartValue['snack_fee']!=0) {
	?>
					<tr class="row">
						<td class ="column">				
						</td>
						<td class ="column">				
							<div class="">
				<?php
								echo "<b>SNACK TOTAL</b>";
				?>		
							</div>								
						</td>		
	</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class ="column">				
								</td>
								<td class="columnFee">
								<?php
									echo "<b>".number_format($dSnackItemTotal, 2, '.', '')."</b>";
								?>
								</td>
						
					</tr>
<?php
					}
				}
?>
				<!-- TOTAL -->				
					  <tr class="row">
						<td class ="column">				
						</td>
						<td class ="column">				
						</td>
						<td class ="column">				
						</td>
						<td class ="column">				
						</td>
						<td class ="columnGrandTotal">				
							<div class="total">
				<?php
								echo "<b>GRAND TOTAL</b>";
				?>		
							</div>								
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
							<!-- added by Mike, 20200613 -->
							<input type="hidden" id="payItemIdParam" value="<?php echo $result[0]['item_id'];?>">
							<input type="hidden" id="payPatientIdParam" value="<?php echo $patientId;?>">
							<!-- added by Mike, 20201210 -->
							<input type="hidden" id="payMedicalDoctorIdParam" value="<?php echo $medicalDoctorId;?>">
							
							<!-- edited by Mike, 20201210 -->
							<!--
							<button onclick="myPopupFunctionPay(<?php echo $result[0]['item_id'].",".$patientId;?>)" class="Button-purchase">PAY
							-->
							
							<button onclick="myPopupFunctionPay(<?php echo $result[0]['item_id'].",".$patientId.",".$medicalDoctorId;?>)" class="Button-purchase">PAY
							</button>
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
			<!-- added by Mike, 20201103 -->
			<input type="hidden" id="hasPatientInCartListParam" value="<?php echo $hasPatientInCartListParamValue;?>">
<?php			
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
