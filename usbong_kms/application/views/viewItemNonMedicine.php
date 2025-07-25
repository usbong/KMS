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
' @date updated: 20250722; 20250721
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
							width: 850px
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
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}		

						table.cartListResult
						{
							width: 86%;
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

						td.columnVat
						{
							font-weight: bold;
							background-color: #0088ff; <!--#93d151; lime green-->
							border: 2px dotted #ab9c7d;		
							text-align: center;
							float: left;							
							display: inline-block;
						}

						div.vatDiv
						{
							background-color: #ffe400;
							font-weight: bold;
							background-color: #00aaff;
							
							border: 2px dotted #ab9c7d;									
							border-radius: 3px;	    
							text-align: center;
							float: center;							
							display: inline-block;
							
							padding: 2px;
							margin-left: 5%; /*40px*/
						}

						td.columnTableHeader
						{
							font-weight: bold;
							background-color: #00ff00; 
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}						

						td.columnTableHeaderName
						{
							font-weight: bold;
							background-color: #00ff00;
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 34%;
						}	
						
						td.columnTableHeaderFee
						{
							font-weight: bold;
							background-color: #00ff00;
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 11%; /*13%;*/
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

							width: 72%; /*50%;*/

							float: left;
						}

						.Quantity-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							padding-right: 0;
							
							font-size: 16px;
							border: 1px solid #68502b;
							width: 15%;
							border-radius: 3px;	    	    

							float: left;
						}
						
						.Button-delete {
							margin-left: 4px;
						}
						
						.Button-purchase {
/*							padding: 8px 42px 8px 42px;
*/
							padding: 14px;
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


						.Button-addVAT {
/*							padding: 8px 42px 8px 42px;
*/
							padding: 12px;
							background-color: #ffe400;
							font-weight: bold;
							background-color: #00aaff; <!--#93d151; lime green-->
							border: 2px dotted #ab9c7d;		
							<!-- edited by Mike, 20201228 -->
							text-align: center;
							border-radius: 6px;

							float: left;
							margin-left: 4px;
						}

						.Button-addVAT:hover {
							background-color: #0088ff; <!--#93d151; lime green-->
						}
						
						.Button-addVAT:focus {
							background-color: #0088ff; <!--#93d151; lime green-->
						}

						.Button-lessVAT {
/*							padding: 8px 42px 8px 42px;
*/
							padding: 12px;
							background-color: #ffe400;
							font-weight: bold;
							background-color: #ff1100; <!--#93d151; lime green-->
							border: 2px dotted #ab9c7d;		
							<!-- edited by Mike, 20201228 -->
							text-align: center;
							border-radius: 6px;

							float: left;
							margin-left: 4px;
						}

						.Button-lessVAT:hover {
							background-color: #ff5500; <!--#93d151; lime green-->
						}
						
						.Button-lessVAT:focus {
							background-color: #ff5500; <!--#93d151; lime green-->
						}
						
						input[type="checkbox"] {
							transform: scale(1.5);
						}			

						input.Quantity-textbox {
							padding-top: 14px;
							padding-bottom: 14px;
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
      Search Non-medicine
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
		//added by Mike, 20200613
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

		//edited by Mike, 20250324; from 20200911
//		function myPopupFunction() {				
		function myPopupFunction(itemId) {			
			//added by Mike, 20210526
			//note: we add this command to prevent multiple button clicks
			//received by computer server before identifying that a patient transaction
			//already exists in Cart List from Database
			document.getElementById("buyButtonId").disabled = true;
				
			var quantity = document.getElementById("quantityParam").value;
			var fee = document.getElementById("feeParam").value;
			
			//added by Mike, 20200911
			var vatCheckedBox = document.getElementById("vatCheckBoxParam");

			//added by Mike, 20250425			
			var isPatientTransactionScPwd = document.getElementById("isPatientTransactionScPwdParam");
			
			//alert(isPatientTransactionScPwd);

			if (vatCheckedBox.checked) {
				if (isPatientTransactionScPwd!==null) {
					if (isPatientTransactionScPwd.value==1) {
						alert("Patient is SC or PWD card holder.");
						vatCheckedBox.checked=0;
					}
					else {
						//add VAT
						numericalFee = eval(fee);
						fee = numericalFee + numericalFee*.12;
					}
				}
				else {
					alert("HALLO!");
					
					//add VAT
					numericalFee = eval(fee);
					fee = numericalFee + numericalFee*.12;
				}
			}
			
			//added by Mike, 20250324
			//if not a number
			if (isNaN(quantity)) {
				alert("Kailangang BILANG ang QUANTITY.");
				window.location.href = "<?php echo site_url('browse/viewItemNonMedicine/"+itemId+"');?>";
				return;
			}
			
			//alert("quantity: "+quantity.indexOf("."));
	
			if (quantity==0) {	
			  alert("Kailangang hindi ZERO (0) ang QUANTITY.");
			  window.location.href = "<?php echo site_url('browse/viewItemNonMedicine/"+itemId+"');?>";
			  return;
			}
			else if (parseInt(quantity)<0) {	
			  alert("Kailangang hindi NEGATIVE ang QUANTITY.");
			  window.location.href = "<?php echo site_url('browse/viewItemNonMedicine/"+itemId+"');?>";
			  return;
			}
			//edited by Mike, 20250722; from 20250324
			//else if (!Number.isInteger(quantity)) {	
			//includes(...) fails in default Internet browser of Lenovo Tablet PC
			//else if (quantity.includes(".")) {	
			else if (quantity.indexOf(".") !== -1) {
			  alert("Kailangang WHOLE NUMBER ang QUANTITY.");
			  window.location.href = "<?php echo site_url('browse/viewItemNonMedicine/"+itemId+"');?>";
			  return;
			}

			if (fee==0){	
			  alert("Kailangang hindi ZERO (0) ang FEE.");
			  return;
			}
			else if (parseInt(fee)<0) {	
			  alert("Kailangang hindi NEGATIVE ang FEE.");
			  return;
			}
			
			//do the following only if quantity is a Number, i.e. not NaN
			if ((!isNaN(quantity)) && (!isNaN(fee))) {	
				//2 = Non-medicine
				//last parameter plusVATId; where 1 = plus VAT for non-medicine items
				if (vatCheckedBox.checked) {
					window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/2/"+itemId+"/"+quantity+"/"+fee+"/1');?>";
				}
				else {
					window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/2/"+itemId+"/"+quantity+"/"+fee+"/0');?>";
				}
			}
		}

		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
		}	
*/
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchase/2/"+itemId +"/"+transactionId+"');?>";
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
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchaseAllInCart/2/"+itemId +"/"+transactionId+"');?>";
		}	


		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionPay(itemId) {				
			window.location.href = "<?php echo site_url('browse/payTransactionMedicinePurchase/"+itemId+"');?>";
		}	
*/
		//edited by Mike, 20200608; edited by Mike, 20201210
//		function myPopupFunctionPay(itemId) {				
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
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/"+itemId+"');?>";
*/			
			//edited by Mike, 20201210
//			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/2/"+itemId+"/"+patientId+"');?>";

			//note: all carts should include a patient transaction with Medical Doctor Identification
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/2/"+itemId+"/"+patientId+"/"+medicalDoctorId+"');?>";
/*						
			alert("patientId: " +patientId);
			alert("medicalDoctorId: "+medicalDoctorId);
*/			
//			window.location.href = "<?php echo site_url('browse/payTransactionServiceAndItemPurchase/"+medicalDoctorId+"/"+patientId+"');?>";
			
		}	

		//added by Mike, 20201026
//		function myPopupFunctionPay(itemId) {				
		function myPopupFunctionAddVAT(itemId, patientId) {				
/*
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/"+itemId+"');?>";
*/			
			//edited by Mike, 20200608
			//window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/2/"+itemId+"');?>";
			window.location.href = "<?php echo site_url('browse/addVATBeforePayTransactionItemPurchase/2/"+itemId+"/"+patientId+"');?>";			
		}	

		//added by Mike, 20201027
//		function myPopupFunctionPay(itemId) {				
		function myPopupFunctionLessVAT(itemId, patientId) {				
/*
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/"+itemId+"');?>";
*/			
			//edited by Mike, 20200608
			//window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/2/"+itemId+"');?>";
			window.location.href = "<?php echo site_url('browse/lessVATBeforePayTransactionItemPurchase/2/"+itemId+"/"+patientId+"');?>";			
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
				Search Non-medicine
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<form id="browse-form" method="post" action="<?php echo site_url('browse/confirmNonMedicine')?>">
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
		<a target='_blank' href='<?php echo site_url('browse/viewItemNonMedicineWithItemPurchasedHistory/'.$itemId)?>' id="viewItemPurchasedHistory">
			<div class="itemPurchasedHistory">
<?php
			echo "ITEM PURCHASED HISTORY"
?>		
			</div>								
		</a>
		<br/>

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
						<td class ="columnTableHeaderName">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "AVAIL"; //AVAILABLE; //IN-STOCK
							?>
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "EXP"; //EXPIRATION
							?>
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class ="columnTableHeaderFee">				
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

				$value = $result[0];
				if (isset($resultItem[0])) {
					$value = $resultItem[0];					
				}				
				
				//added by Mike, 20250408
				//TODO: -verify: summing up the total available resultQuantityInStockNow

		?>				
		
					  <tr class="row">
						<td class ="column">				
							<a href='<?php echo site_url('browse/viewItemNonMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								//edited by Mike, 20200715
								//echo $value['item_name'];
								echo strtoupper($value['item_name']);
				?>		
								</div>								
							</a>
						</td>
						
						<td class ="column">				
								<!-- added by Mike, 20200618 -->							
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
/*
								//edited by Mike, 20200414; edited by Mike, 20200414
								if (($resultQuantityInStockNow<0)) {
									echo 9999;
								}
								else {
									echo $resultQuantityInStockNow;
								}								
*/
								//removed by Mike, 20200615
								//$resultQuantityInStockNow = -1;

								//added by Mike, 20200615								
								if (isset($value['resultQuantityInStockNow'])) {
									$resultQuantityInStockNow = $value['resultQuantityInStockNow'];
								}
						
								//added by Mike, 20200615; edited by Mike, 20210110
								if (!isset($value['quantity_in_stock'])) {
									echo "9999";
								}								
								else if ($value['quantity_in_stock']=="") {
									//edited by Mike, 20200615
//									echo "0 / 0";
									echo "9999";
								}
/*								//edited by Mike, 20200803
								//edited by Mike, 20200411; edited by Mike, 20200615
								else if (($resultQuantityInStockNow<0) || ($value['quantity_in_stock']==-1)) {
									echo 9999;
								}
*/								
								//added by Mike, 20200803
								//note: put this here before "else if ($resultQuantityInStockNow<0) {"
								else if ($value['quantity_in_stock']==-1) {
									echo "9999";
								}
								else if ($resultQuantityInStockNow<0) {
									//edited by Mike, 20200723
									//echo "0 / ".$value['quantity_in_stock'];

/*									//removed by Mike, 20200803									
									if (strpos($value['item_name'], "*")!==false) {
										//TO-DO: -update: this to use actual count
										echo 9999;
									}
									else {
*/										
										//edited by Mike, 20200803
										//echo "0 / ".$value['quantity_in_stock'];
										echo "0";
/*
									}
*/									
								}
								else {
//									echo $resultQuantityInStockNow;

									//edited by Mike, 20250415; from 20250409
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
									
									//echo $resultQuantityInStockNowTotal;
									if ($resultQuantityInStockNowTotal<=0) {
										echo "<span style='color:red'><b>".$resultQuantityInStockNowTotal."</b></span>";
									}
									else {
										echo $resultQuantityInStockNowTotal;
									}
									

/*									//TODO: -update: this									
									$iTotalResultQuantityInStockNow=0;
									$iTotalQuantityInStockNow=0;
									
									foreach ($resultItem as $resultItemValue) {
										if (isset($resultItemValue['resultQuantityInStockNow'])) {

									echo $iTotalResultQuantityInStockNow."/";
									echo $iTotalQuantityInStockNow."<br/>";
									echo "--<br/>";

											$iTotalResultQuantityInStockNow+=$resultItemValue['resultQuantityInStockNow'];
											$iTotalQuantityInStockNow+=$resultItemValue['quantity_in_stock'];
										}
									}
									
									echo $iTotalResultQuantityInStockNow." / ".$iTotalQuantityInStockNow;
*/									
								}								
							?>
								</div>
						</td>
						<td class ="columnCentered">				
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								//echo $value['expiration_date'];
								//edited by Mike, 20210110
								if (!isset($value['expiration_date'])) {
									echo "UNKNOWN";
								}
								//edited by Mike, 20250324
								else if (($value['expiration_date']==0)||(($value['expiration_date']=="0000-00-00"))) {

									if ($value['quantity_in_stock']==-1) {
										echo "UNKNOWN";
									}
									else {
										echo "NONE";
									}
								}
								else {
									echo $value['expiration_date'];
								}
							?>
								</div>
						</td>						
						<td class="columnCentered">
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<!-- edited by Mike, 20250625 -->
						<!-- TODO: -fix: column width not reduced -->
						<td class="column">		
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
							<button onclick="myPopupFunction(<?php echo $value['item_id'];?>)" class="Button-purchase" id="buyButtonId">BUY</button>				
<!--							<button onclick="myPopupFunction()" class="Button-purchase">BUY</button>
-->
						<!-- edited by Mike, 20250324; from 20200911 -->
						<div class="vatDiv">
							<label>+12%VAT</label><br/>
<?php						  //edited by Mike, 20201115							
							  if ((isset($noVAT)) and ($noVAT)) {
?>
								<input type="checkbox" id="vatCheckBoxParam" onclick="return false;">
<?php
							  }
							  else if (isset($addedVAT) and ($addedVAT)) {
?>
								<input type="checkbox" id="vatCheckBoxParam" onclick="return false;" checked>
<?php
							  }
							  else {
?>								  
								<input type="checkbox" id="vatCheckBoxParam">
<?php
							  }
?>
						</div>
						</td>		
						<td>
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
				
				echo "<table class='cartListResult'>";

				//added by Mike, 20200608
				//note: at present, the computer server accepts only 1 patient per cart list
				$patientId = 0; //none

				//added by Mike, 20201210
				$medicalDoctorId = 1; //DR. PEDRO
				
				//add: table headers
				$iCount = 1;
				$cartFeeTotal = 0;
				
				//added by Mike, 20201115
				$cartFeeTotalNonMedOnly = 0;
				
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
				
//				echo "patientId: ".$patientId;

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
				
				//added by Mike, 20250425
				//for SC/PWD;
				if ((strpos($cartValue['notes'],"SC;")!==false) ||
					(strpos($cartValue['notes'],"PWD;")!==false)) {
?>
					<input type="hidden" id="isPatientTransactionScPwdParam" value="1">
<?php
				}
				else {
?>					
					<input type="hidden" id="isPatientTransactionScPwdParam" value="0">
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
									//edited by Mike, 20200715
									//echo $cartValue['item_name'];
									echo strtoupper($cartValue['item_name']);
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

									//edited by Mike, 20201203
									//echo number_format($cartValue['fee']/$iQuantity, 2, '.', '');
									$cartValueFee = $cartValue['fee']/$iQuantity;
									
									//edited by Mike, 20201214
									if ($cartValue['item_type_id']==2) { //NON-MED ITEM
										//note: verify first if noVAT 
										if ((isset($noVAT)) and ($noVAT)) {
											$cartValueFeeWithoutVAT = $cartValueFee - $cartValueFee*0.12;
										}
										else if (isset($addedVAT) and ($addedVAT)) {
											$cartValueFeeWithoutVAT = $cartValueFee/(1+0.12);
										}
										else {
										}									
									}
									else {
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
								//added by Mike, 20200415; edited by Mike, 20200519
								if ((isset($cartValue['patient_name'])) && ($cartValue['patient_name']!=="NONE")) {
									echo "@(".$cartValue['fee']." + ".$cartValue['x_ray_fee']." + ".$cartValue['lab_fee'].")";
								}
								else {
									//edited by Mike, 20201214
									if ($cartValue['item_type_id']==2) { //NON-MED ITEM
										//note: verify first if noVAT 
										if ((isset($noVAT)) and ($noVAT)) {
											//edited by Mike, 20210622
//											echo "@(".number_format($cartValueFeeWithoutVAT, 2, '.', '')." + ".number_format($cartValueFee*.12, 2, '.', '').")";
											echo "@(".number_format($cartValueFee, 2, '.', '')." + ".number_format($cartValueFee*.12, 2, '.', '')." - ".number_format($cartValueFee*.12, 2, '.', '').")";
											
											
										}
										else if (isset($addedVAT) and ($addedVAT)) {
											echo "@(".number_format($cartValueFeeWithoutVAT, 2, '.', '')." + ".number_format($cartValueFeeWithoutVAT*.12, 2, '.', '').")";
										}
										else {
											//edited by Mike, 20210618
//											echo number_format($cartValueFee, 2, '.', '');
											echo "@".number_format($cartValueFee, 2, '.', '');
										}									
									}
									else {
										//edited by Mike, 20210618
//										echo number_format($cartValueFee, 2, '.', '');
										echo "@".number_format($cartValueFee, 2, '.', '');
									}									
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

									//added by Mike, 20201115
									if ($cartValue['item_type_id']==2) {
										$cartFeeTotalNonMedOnly = $cartFeeTotalNonMedOnly + $cartValue['fee'];
									}					
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
						<td class ="columnGrandTotal">				
								<div id="feeTotalId<?php echo $iCount?>">
							<?php
//								echo "<b>".$cartFeeTotal."<b/>";
								
								echo "<b>".number_format((float)$cartFeeTotal, 2, '.', '')."<b/>";
							?>
								</div>
						</td>
						<td>
							<!-- added by Mike, 20200612 -->
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
						<!-- added by Mike, 20201026; edited by Mike, 20201115 -->
						<?php 
							  if ((isset($noVAT)) and ($noVAT)) {
						?>
								<td class ="column">				
<?php
								echo "<b>".number_format((float)0, 2, '.', '')."<b/>";
?>
								</td>						
								<td>
									<button class="Button-addVAT">NO<br/>VAT</button>
								</td>						
								<!-- added by Mike, 20201128 -->
								<td class ="column">				
<?php
									$cartFeeTotalNonMedOnlySCPWDDiscount = $cartFeeTotalNonMedOnly*0.12;

								echo "<b>".number_format((float)$cartFeeTotalNonMedOnlySCPWDDiscount, 2, '.', '')."<b/>";
?>
								</td>								
								<td>
<?php
								echo "<b>Non-Med<br/>SC/PWD<br/>Discount<b/>";
?>
								</td>
						<?php
							  }
							  else if (isset($addedVAT) and ($addedVAT)) {
						?>
								<td class ="column">				
<?php
									//get total VAT
									$cartFeeTotalWithoutVAT = $cartFeeTotalNonMedOnly/(1+0.12);
									$cartFeeTotalVAT = $cartFeeTotalWithoutVAT*0.12;

									echo "<b>".number_format((float)$cartFeeTotalVAT, 2, '.', '')."<b/>";
?>
								</td>
								<td>
									<!-- TO-DO: -update: this -->
									<!-- note: multiple button presses cause multiple +12% VAT -->
									<button onclick="myPopupFunctionLessVAT(<?php echo $result[0]['item_id'].",".$patientId;?>)" class="Button-lessVAT">LESS<br/>VAT</button>
								</td>
						<?php							
							  }
							  else {
						?>
								<td class ="column">				
<?php
								echo "<b>".number_format((float)0, 2, '.', '')."<b/>";
?>
								</td>						
								<td>
									<button onclick="myPopupFunctionAddVAT(<?php echo $result[0]['item_id'].",".$patientId;?>)" class="Button-addVAT">ADD<br/>VAT</button>			
								</td>						
						<?php
							  }
						?>

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
