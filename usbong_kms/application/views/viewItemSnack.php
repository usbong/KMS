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
' @date updated: 20201104
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

						td.columnTableHeaderFee
						{
							font-weight: bold;
							background-color: #00ff00; <!--#93d151; lime green-->
<!--							border: 1pt solid #00ff00; -->
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 13%;
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
							width: 72%;

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
      Search Snack
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

					if (itemIdInput !== null && itemIdInput !== '') { //verify only one
						myPopupFunctionPay(itemIdInput, patientIdInput);
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

				//added by Mike, 20200330; edited by Mike, 20201104
				//1 = Medicine; 3 = Snack
				window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/3/"+itemId+"/"+quantity+"/"+fee+"');?>";

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
			//edited by Mike, 20201104
			//3 = snack
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchase/3/"+itemId +"/"+transactionId+"');?>";

		}	

		//added by Mike, 20200626
		//re-verify: this
		//we do not use this now
		function myPopupFunctionDeleteAllInCart(itemId,transactionId) {				
/*
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
*/			
			//edited by Mike, 20201104
			//3 = snack
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchaseAllInCart/3/"+itemId +"/"+transactionId+"');?>";

		}	

		//added by Mike, 20200331; edited by Mike, 20200608
		//function myPopupFunctionPay(itemId) {				
		function myPopupFunctionPay(itemId, patientId) {				
			//added by Mike, 20201103
			//verified: if a patient id already exists in the cart list
			var hasPatientInCartList = document.getElementById("hasPatientInCartListParam").value;

			if (!hasPatientInCartList) {
				alert("Kailangang may isang (1) pasyente sa bawat Cart List.");
				return;
			}


/*
			window.location.href = "<?php echo site_url('browse/payTransactionMedicinePurchase/"+itemId+"');?>";
*/
			//edited by Mike, 20200608
			//window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/1/"+itemId+"');?>";
			//3 = snack
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/3/"+itemId+"/"+patientId+"');?>";
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
				Search Snack
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<form id="browse-form" method="post" action="<?php echo site_url('browse/confirmSnack')?>">
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
							echo "ITEM NAME";
				?>		
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "AVAILABLE"; //IN-STOCK
							?>
						</td>
						<td class ="columnTableHeader">				
							<?php
								echo "EXPIRATION";
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

//				}
		?>				
		
					  <tr class="row">
						<td class ="column">				
							<a href='<?php echo site_url('browse/viewItemSnack/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								echo $value['item_name'];
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

								<div id="quantityInStockId<?php echo $iCount?>">
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
								
								//added by Mike, 20200615
								if ($value['quantity_in_stock']=="") {
									echo "0 / 0";
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
//									echo $resultQuantityInStockNow;
									
									echo $resultQuantityInStockNow." / ".$value['quantity_in_stock'];
								}								
							?>
								</div>
						</td>
						<td class ="column">				
								<div id="itemExpirationId<?php echo $iCount?>">
							<?php
								//echo $value['expiration_date'];

								if ($value['expiration_date']==0) {

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
						<td class ="column">		
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
							<input type="tel" id="feeParam" class="Fee-textbox no-spin" value="<?php echo $value['item_price'];?>" min="1" max="99999999" 
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
							<button onclick="myPopupFunction(<?php echo $value['item_id'];?>)" class="Button-purchase">BUY</button>									
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
				
				//add: table headers
				$iCount = 1;
				$cartFeeTotal = 0;
				foreach ($cartListResult as $cartValue) { 
/*	
				$value = $result[0];
*/				
				
				if ($cartValue['patient_id']!=0) {
					$patientId = $cartValue['patient_id'];
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
									//added by Mike, 20201104
									if ($cartValue['item_type_id']==3) { //3 = SNACK
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
						<td class ="columnFee">				
								<div id="cartItemPriceId<?php echo $iCount?>">
							<?php
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
							?>
								</div>
						</td>
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
							<button onclick="myPopupFunctionDelete(<?php echo $result[0]['item_id']/*echo $cartValue['item_id']*/.",".$cartValue['transaction_id'];?>)" class="Button-delete">DELETE</button>									
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
							<!-- added by Mike, 20200613 -->
							<input type="hidden" id="payItemIdParam" value="<?php echo $result[0]['item_id'];?>">
							<input type="hidden" id="payPatientIdParam" value="<?php echo $patientId;?>">
						
							<button onclick="myPopupFunctionPay(<?php echo $result[0]['item_id'].",".$patientId;?>)" class="Button-purchase">PAY</button>
						</td>						
					  </tr>
<?php
				echo "</table>";				
			}
?>
			<!-- added by Mike, 20201103 -->
			<input type="hidden" id="hasPatientInCartListParam" value="<?php echo $hasPatientInCartListParamValue;?>">
<?php			
			echo "<br/>";

			echo '<h3>Item Purchased History</h3>';
			
			$value = $result[0];
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
								<a href='<?php echo site_url('browse/viewItemMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
									<div class="itemName">
					<?php
									echo $value['item_name'];
					?>		
									</div>								
								</a>
							</td>
							<td class ="column">				
									<div id="itemPriceId<?php echo $iCount?>">
								<?php
									//edited by Mike, 20200912
//									echo $value['item_price'];

									//added by Mike, 20200415
									if ($value['fee_quantity']==0) {
	//									$iQuantity =  1;
										$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
									}
									else {
										$iQuantity =  $value['fee_quantity'];
									}
									
//									echo $value['fee'];
									//edited by Mike, 20200501
									//echo $value['fee']/$iQuantity;
									echo number_format((float)$value['fee']/$iQuantity, 2, '.', '');

								?>
									</div>
							</td>
							<td class ="column">				
							x
							</td>
							<td class ="column">				
									<div id="itemQuantityId<?php echo $iCount?>">
								<?php
	//								echo $value['fee']/$value['item_price'];
									//edited by Mike, 20200501
//									echo floor(($value['fee']/$value['item_price']*100)/100);
									echo $value['fee_quantity'];
								?>
									</div>
							</td>
							<td class ="column">				
							=
							</td>
							<td class ="column">				
									<div id="itemQuantityId<?php echo $iCount?>">
								<?php
									echo $value['fee'];
								?>
									</div>
							</td>
							<td>								
								<?php //edited by Mike, 20200416 
									if ($value['transaction_date']==date('m/d/Y')) {
								?>
								<button onclick="myPopupFunctionDelete(<?php echo $value['item_id'].",".$value['transaction_id'];?>)" class="Button-delete">DELETE</button>									
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