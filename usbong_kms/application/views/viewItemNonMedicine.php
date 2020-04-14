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
' @date updated: 20200414
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
							text-align: right
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
							width: 12%;
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
							padding: 12px;
							font-size: 16px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							width: 64%;

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
				//added by Mike, 20200330; edited by Mike, 20200411
/*				window.location.href = "<?php echo site_url('browse/addTransactionMedicinePurchase/"+itemId+"/"+quantity+"');?>";
*/
				//2 = Non-medicine
				window.location.href = "<?php echo site_url('browse/addTransactionItemPurchase/2/"+itemId+"/"+quantity+"/"+fee+"');?>";


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

		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionMedicinePurchase/"+itemId +"/"+transactionId+"');?>";
		}	
*/
		function myPopupFunctionDelete(itemId,transactionId) {				
			window.location.href = "<?php echo site_url('browse/deleteTransactionItemPurchase/2/"+itemId +"/"+transactionId+"');?>";
		}	

		//added by Mike, 20200331; edited by Mike, 20200411
/*
		function myPopupFunctionPay(itemId) {				
			window.location.href = "<?php echo site_url('browse/payTransactionMedicinePurchase/"+itemId+"');?>";
		}	
*/
		function myPopupFunctionPay(itemId) {				
/*
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/"+itemId+"');?>";
*/			
			//edited by Mike, 20200411
			window.location.href = "<?php echo site_url('browse/payTransactionItemPurchase/2/"+itemId+"');?>";
			
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

				$value = $result[0];

		?>				
		
					  <tr class="row">
						<td class ="column">				
							<a href='<?php echo site_url('browse/viewItemNonMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">				
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
								//edited by Mike, 20200414; edited by Mike, 20200414
								if (($resultQuantityInStockNow<0)) {
									echo 9999;
								}
								else {
									echo $resultQuantityInStockNow;
								}								
							?>
								</div>
						</td>
						<td class ="column">				
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								//echo $value['expiration_date'];

								if ($value['expiration_date']==0) {

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
						<td class ="column">
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<td class ="column">				
							<input type="tel" id="feeParam" class="Fee-textbox no-spin" value="<?php echo $value['item_price'];?>" min="1" max="999" 
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
				
				//add: table headers
				$iCount = 1;
				$cartFeeTotal = 0;
				foreach ($cartListResult as $cartValue) {
/*	
				$value = $result[0];
*/				
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
							<a href='<?php echo site_url('browse/viewItemMedicine/'.$cartValue['item_id'])?>'>
								<div class="itemName">
				<?php
								echo $cartValue['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class ="column">				
								<div id="cartItemPriceId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20200414
//								echo $cartValue['item_price'];
								echo $cartValue['fee'];
							?>
								</div>
						</td>
						<td class ="column">				
						x
						</td>
						<td class ="column">				
								<div id="cartItemQuantityId<?php echo $iCount?>">
							<?php
//								echo $cartValue['fee']/$cartValue['item_price'];
//								echo floor(($cartValue['fee']/$cartValue['item_price']*100)/100);
								//edited by Mike, 20200414
								echo floor(($cartValue['fee']/$cartValue['fee']*100)/100);
							?>
								</div>
						</td>
						<td class ="column">				
						=
						</td>
						<td class ="column">				
								<div id="cartFeeId<?php echo $iCount?>">
							<?php
								echo $cartValue['fee'];
								
								$cartFeeTotal = $cartFeeTotal + $cartValue['fee'];
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
							<button onclick="myPopupFunctionPay(<?php echo $result[0]['item_id']?>)" class="Button-purchase">PAY</button>
						</td>						
					  </tr>
<?php
				echo "</table>";				
			}
			
			echo "<br/>";

			echo '<h3>Item Purchased History</h3>';

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
									echo $value['transaction_date'];
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
									//edited by Mike, 20200414
//									echo $value['item_price'];
									echo $value['fee'];
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
//									echo floor(($value['fee']/$value['item_price']*100)/100);
									//edited by Mike, 20200414
									echo floor(($value['fee']/$value['fee']*100)/100);
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
								<button onclick="myPopupFunctionDelete(<?php echo $value['item_id'].",".$value['transaction_id'];?>)" class="Button-delete">DELETE</button>									
	<!--							<button onclick="myPopupFunction()" class="Button-purchase">BUY</button>
	-->
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