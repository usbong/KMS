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
' @date updated: 20250421; from 20250415
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

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. 
								width: 670px
							*/
							width: 800px
                        }
						
						span.asterisk
						{
							color: #ff0000;							
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

						div.tableHeaderAddNewNonMedItem
						{
							font-size: 12pt;
							font-weight: bold;
							text-align: center;
							background-color: #ff8000; <!--#93d151; lime green-->
							border: 1pt solid #ff8000;
							padding: 0.2em;
						}	

						button.tableHeaderFlipSwitchIconButton
						{
							font-size: 18pt;
							background-color: #ffffff;
							border: 0px solid #333333;
						}
	
						button.tableHeaderFlipSwitchIconButton:hover
						{
							font-size: 18pt;
							background-color: #eeeeee;
							border: 0px solid #333333;
						}

						button.tableHeaderFlipSwitchIconButton:active
						{
							font-size: 18pt;
							background-color: #eeeeee;
							border: 0px solid #333333;
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

						table.addNonMedItemTable
						{
							border: 2px dotted #ab9c7d;		
							margin-top: 10px;
						}	
						
						td.tableHeaderAddNewNonMedItemTd {
							background-color: #ff8000;
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

						td.columnTableHeaderItemName
						{
							font-weight: bold;
							background-color: #00ff00;
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

/*
						.Price-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 10px;
							font-size: 16px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							width: 72%;

							float: left;
						}
*/						
						.Button-delete {
							background-color: #E9E9E9;
							color: #000000;
							/*font-weight: bold;*/
							border: 1px dotted #333333;
							/*border-radius: 3px;*/
						}						

						.Button-delete:hover {
							background-color: #C0C0C0;
							color: #000000;
							border: 1px dotted #333333;
							/*border-radius: 3px;*/
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

		function myPopupFunctionDelete(itemId,itemName) {	
			//alert("DITO");
		
			if (confirm("Delete ["+itemName+"]?")) { //YES
				window.location.href = "<?php echo site_url('browse/deleteItemFromSearch/2/"+itemId+"');?>";
			} else {
				//CANCEL
			} 
		}

		function myCopyToClipboardFunction(itemCount) {
		  var copyText = document.getElementById("itemNameDivId"+itemCount);

		  //alert("itemCount: " + itemCount);	

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
		  input.innerHTML = copyText.innerText;
		  document.body.appendChild(input);
		  input.select();
		  var result = document.execCommand('copy');
		  document.body.removeChild(input);
	
		  // Alert the copied text
		  alert("Copied: " + copyText.innerText);	
		}
		
		//added by Mike, 20250421
		function myCopyToClipboardFunctionItemText(copyText) {
		  //alert ("DITO: " + copyText);
			
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
		  input.innerHTML = copyText;//.innerText;
		  document.body.appendChild(input);
		  input.select();
		  var result = document.execCommand('copy');
		  document.body.removeChild(input);
	
		  // Alert the copied text
		  alert("Copied: " + copyText);//.innerText);	
		  
		}
		
		function myFlipSwitchFunction() {
		  var addNewNonMedItemDiv = document.getElementById("addNewNonMedItemDivId");

		  var addNewNonMedItemTdHeader = document.getElementById("addNewNonMedItemTdHeaderId");

		  var addNewNonMedItemTd = document.getElementById("addNewNonMedItemTdId");

		  var addNewNonMedForm = document.getElementById("addNonMedItemFormId");
		  
		  var isReturnedItemTd = document.getElementById("isReturnedItemTdId");

		  //alert("DITO");
		  
		  var sText = addNewNonMedItemDiv.innerHTML;
		  
		  var sFormActionUrl = addNewNonMedForm.action;
		  
		  //if equal
		  if (sText.localeCompare("ADD NEW NON-MED")==0) {
			addNewNonMedItemDiv.innerHTML="REPORT LOST ITEM";
			addNewNonMedItemDiv.style.backgroundColor = "white";
			addNewNonMedItemTdHeader.style.backgroundColor = "white";
			addNewNonMedItemTdHeader.style.border = "2pt solid #000000";
			addNewNonMedItemTd.style.backgroundColor = "#eeeeee";
			isReturnedItemTd.style.visibility = "hidden";
			
			//isLostItem
			//addNewNonMedForm.action = "addNonMedItem/1"; 			
			addNewNonMedForm.action = sFormActionUrl.substring(0, sFormActionUrl.length - 1)+"1";
		  }
		  else {
			addNewNonMedItemDiv.innerHTML="ADD NEW NON-MED";
			addNewNonMedItemDiv.style.backgroundColor = "#ff8000";
			addNewNonMedItemTdHeader.style.backgroundColor = "#ff8000";
			addNewNonMedItemTdHeader.style.border = "0pt dotted #000000";
			addNewNonMedItemTd.style.backgroundColor = "#ffffff";
			isReturnedItemTd.style.visibility = "visible";

			//addNewNonMedForm.action = "addNonMedItem/0"; 			
			addNewNonMedForm.action = sFormActionUrl.substring(0, sFormActionUrl.length - 1)+"0";
		  }
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
	
<!--	<div id="myText" onclick="copyText(1)">Text you want to copy</div>
-->	
	<?php
	
		//get only name strings from array 
		if (isset($result)) {			

			echo "<br/>";
			echo "<br/>";

			if ($result!=null) {		
/*			
				echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];
				echo "<br/>";
				echo "<br/>";
*/			

				$resultCount = count($result);
				
				//added by Mike, 20250421
				$iTotalQuantityInStock=0;
				$iTotalQuantityLostItem=0;
				
/* //edited by Mike, 20221013
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($result).'</b> result found.</div>';
				}
				else {
*/					
					//edited by Mike, 20221008
					//echo '<div>Showing <b>'.count($result).'</b> results found.</div>';			

					$iCount = 0;
					$updatedResult = [];
					foreach ($result as $value) {
						if (($value['quantity_in_stock']<0) or ($value['quantity_in_stock']=="") ){
						}
/*						
						else if ($value['quantity_in_stock']=="") {
						}
*/						
						else {
/*
							//added by Mike, 20250421
							echo "DITO!!!".$value['quantity_in_stock']."<br/>";
							echo $value['is_lost_item']."<br/><br/>";
*/
							
							if (!$value['is_lost_item']) {
								$iTotalQuantityInStock+=$value['quantity_in_stock'];
							}
							else {
								$iTotalQuantityLostItem+=$value['quantity_in_stock'];
							}
							
							//echo "HALLO!".$value['resultQuantityInStockNow']."<br/>";
							
							//added by Mike, 20250405
							if (!isset($value['resultQuantityInStockNow'])) {
								$value['resultQuantityInStockNow'] = 0;
							}
							
							//edited by Mike, 20250408
							if ($value['resultQuantityInStockNow']==0) {
							//if ($value['resultQuantityInStockNow']<=0) {
								$iCount++;
								continue;
							}
						}
						
						array_push($updatedResult,$value);
					}
					//edited by Mike, 20221013
					//echo '<div>Showing <b>'.(count($result)-$iCount).'</b> results found.</div>';				

					//added by Mike, 20250408					
					//--------------------------	
					
					$bIsSameItemId=false;
					$itemId=-1;
					$itemCount=0;
					
					//sort($updatedResult);
					$cleanedupdatedResult = array();
					
					foreach ($updatedResult as $valueTemp) {
						$myNextElementTemp=next($updatedResult);
							
						//echo $valueTemp['resultQuantityInStockNow']." / ".$valueTemp['quantity_in_stock']."<br/>";
							
						if ($myNextElementTemp) { //element exists
							//if has the same id;
							if ($myNextElementTemp['item_id']==$valueTemp['item_id']) {
								if ($valueTemp['resultQuantityInStockNow']<0) {
								  continue;
								}
							}
						}	

						array_push($cleanedupdatedResult, $valueTemp);

						$itemCount++;
					}		
					
					sort($cleanedupdatedResult);
				
					$updatedResult = $cleanedupdatedResult; 
					//--------------------------

					$updatedResultCount = count($updatedResult);
					
				//edited by Mike, 20250424
/*					
				if (!isset($bIsDeleteItemFromSearch)) {				
					$bIsSameItemId=false;
					$itemId=-1;
					$itemCount=0;
					//sort($updatedResult);
					$cleanedupdatedResult = array();
					$iTotalQuantityLostItem=0;
					
					foreach ($updatedResult as $valueTemp) {
						//$myNextElementTemp=next($updatedResult);
							
						////echo $valueTemp['resultQuantityInStockNow']." / ".$valueTemp['quantity_in_stock']."<br/>";
						
						if ($valueTemp['is_lost_item']) {
						//if ($valueTemp['resultQuantityInStockNow']<0) {
							
						  ////echo "DITO!<br/>";
						  //$iTotalQuantityLostItem+=$valueTemp['resultQuantityInStockNow'];
						  
						  ////echo ">START: ".current($cleanedupdatedResult)['resultQuantityInStockNow']."<br/>";
						  
						  ////echo "minus ".$valueTemp['resultQuantityInStockNow']."<br/>";
						  //current($cleanedupdatedResult)['resultQuantityInStockNow']+=$valueTemp['resultQuantityInStockNow'];
						  
						  if ($itemCount>0) {
							  //$cleanedupdatedResult[$itemCount-1]['resultQuantityInStockNow']+=$valueTemp['resultQuantityInStockNow'];

							  $cleanedupdatedResult[$itemCount-1]['resultQuantityInStockNow']+=($valueTemp['resultQuantityInStockNow']*-1);

						  }

						  ////echo ">>>".current($cleanedupdatedResult)['resultQuantityInStockNow']."<br/>";
						  
						  continue;
						}
						else {
							
							////echo "ADD<br/>";
							
							array_push($cleanedupdatedResult, $valueTemp);
						}
						
						$itemCount++;
					}		
					
					//sort($cleanedupdatedResult);					

					//added by Mike, 20250421
					//$updatedResult = array(); //clear contents

					$updatedResult = $cleanedupdatedResult; //array();
					$updatedResultCount=0;
*/					



					$bIsSameId=false;
					$consolidatedUpdatedResult = array();

					foreach ($updatedResult as $valueTemp) {
						$bIsSameId=false;
						
						foreach ($consolidatedUpdatedResult as &$consolidatedValueTemp) {
							if ($valueTemp['item_id']==$consolidatedValueTemp['item_id']) {
								//echo "DITO!";
								$consolidatedValueTemp['resultQuantityInStockNow']+=$valueTemp['resultQuantityInStockNow'];
								
								//continue;
								
								$bIsSameId=true;
								break;
							}
						}
						unset($consolidatedValueTemp);
						
						//echo $valueTemp['resultQuantityInStockNow']." / ".$valueTemp['quantity_in_stock']."<br/>";
						
						if (!$bIsSameId) {
							array_push($consolidatedUpdatedResult,$valueTemp);
						}
					}
					
					////echo "<br/>CONSOLIDATED; CHECK!!!<br/>";
					
					////foreach ($consolidatedUpdatedResult as $consolidatedValueTemp) {
					////	echo $consolidatedValueTemp['resultQuantityInStockNow']." / ".$consolidatedValueTemp['quantity_in_stock']."<br/>";
					////}				
	
					$updatedResult=$consolidatedUpdatedResult;
				////}
				//-----							


				if (isset($updatedResult[0])) {
					//echo ">>>>>>>>>".$updatedResult[0]['item_id'];
					
					$updatedResultCount = count($updatedResult);
				}				
				
				//echo ">>updatedResultCount: ".$updatedResultCount."<br/>";
/*
				if ($updatedResultCount==1) {
					echo '<div>Showing <b>1</b> result found.</div>';
				}
				else*/ if ($updatedResultCount<=0) {
					//added by Mike, 20250407
					if (isset($value['item_name'])) {	
						echo "<b>".strtoupper($value['item_name'])."</b>";
?>						
						<button class="copyToClipboardButton" onclick="myCopyToClipboardFunctionItemText('<?php echo $value['item_name'];?>')">⿻</button>
<?php						
						//echo "<br/><span style='color:red'><b>OUT-OF-STOCK</b></span> @".$value['item_price']."<button class='copyToClipboardButton' onclick='myCopyToClipboardFunctionItemText(".$value['item_price'].")'>⿻</button>";

						//edited by Mike, 20250428
						//$iCurrentTotal = $iTotalQuantityInStock-$iTotalQuantityLostItem;
						
						$iCurrentTotal = $iTotalQuantityInStock-$iTotalQuantityLostItem-$value['item_total_sold'];
						
/*						
						//echo $updatedResult[0]['resultQuantityInStockNow'].";";
						echo $iTotalQuantityInStock.";";
						echo $iTotalQuantityLostItem*2;
						echo ">>>".$iCurrentTotal;
*/
						
						//use this with med items; not non-med items
						//$iCurrentTotal = $value['resultQuantityInStockNow'];

						//edited by Mike, 20250428
						//TODO: -update: this
						echo "<br/><span style='color:red'><b>OUT-OF-STOCK (".$iCurrentTotal.")</b></span> @".$value['item_price']."<button class='copyToClipboardButton' onclick='myCopyToClipboardFunctionItemText(".$value['item_price'].")'>⿻</button>";

						//echo "<br/><span style='color:red'><b>OUT-OF-STOCK (".$value['resultQuantityInStockNow'].")</b></span> @".$value['item_price']."<button class='copyToClipboardButton' onclick='myCopyToClipboardFunctionItemText(".$value['item_price'].")'>⿻</button>";

						echo "<br/><br/>";
					}

					echo '<div>Showing <b>0</b> result found.</div>';
				}
				else {
					//edited by Mike, 20221020
					//TO-DO: -reverify: this
//						echo '<div>Showing <b>'.($updatedResultCount-$iCount).'</b> results found.</div>';				
					echo '<div>Showing <b>'.($updatedResultCount).'</b> results found.</div>';				
				}

				echo "<br/>";
				echo "<table class='search-result'>";
				
				//add: table headers
?>				
					  <tr class="row">
						<td class="columnTableHeaderItemName">				
								<div class="tableHeader">
				<?php
								echo "ITEM NAME";
				?>		
								</div>								
						</td>
						<td>				
						<!-- copy to clipboard column -->
						</td>						
						<td class="columnTableHeader">				
							<?php
								echo "AVAILABLE"; //IN-STOCK;
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "EXPIRATION";
							?>
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //ITEM PRICE;
							?>
						</td>
						<td class="">
							<?php
								//DELETE ITEM COLUMN
							?>
						</td>
					  </tr>
<?php				
				//removed by Mike, 20250408
				$iCount = 1;
				
				//sort($updatedResult);

				//edited by Mike, 20250421; from 20221013
				//if (!isset($updatedResult)) {
				if ($updatedResultCount==0) {					
					$updatedResult=array(); //[];
				}

				//edited by Mike, 20221008
				//foreach ($result as $value) {
				foreach ($updatedResult as $value) {
		?>				
		
					  <tr class="row">
						<td class="column">				
							<a target='_blank' href='<?php echo site_url('browse/viewItemNonMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div id="itemNameDivId<?php echo $iCount?>" class="itemName">
				<?php
								//edited by Mike, 20200715
								//echo $value['item_name'];
								echo strtoupper($value['item_name']);
				?>		
								</div>								
							</a>
						</td>
						<td class="column">		
							<button class="copyToClipboardButton" onclick="myCopyToClipboardFunction('<?php echo $iCount;/*$value['item_name'];*/?>')">⿻</button>
							<!-- paste clipboard icon 📋 -->
						</td>
						<td class="column">				
								<div class="quantityInStockDiv" id=quantityInStockId<?php echo $iCount?>>
							<?php
								//echo $value['quantity_in_stock'];

								//edited by Mike, 20200411
								if (($value['quantity_in_stock']<0) or ($value['quantity_in_stock']=="") ){
									echo 9999;
								}
								else if ($value['quantity_in_stock']=="") {
									//edited by Mike, 20250416; from 20200615
									//echo 9999;
									//echo "0/0";
									echo "0";
								}
								else {
									if ($value['resultQuantityInStockNow']<0) {
										echo "<span style='color:red;font-weight:bold;'>".$value['resultQuantityInStockNow']."</span>";
									}
									else {
	//									echo $value['quantity_in_stock'];
										//edited by Mike, 20250428; from 20221008
										//echo $value['resultQuantityInStockNow']." / ".$value['quantity_in_stock'];

										//edited by Mike, 20250424
										//echo $value['resultQuantityInStockNow'];
										if (!isset($bIsDeleteItemFromSearch)) {
											echo $value['resultQuantityInStockNow'];
										}
										else {
											if ($value['is_lost_item']) {
												echo "<span style='color:red;font-weight:bold;'>-".$value['resultQuantityInStockNow']."</span>";
											}
											else {
												echo $value['resultQuantityInStockNow'];
											}
										}										
									}
									
/*	//removed by Mike, 20221008									
									if ($value['resultQuantityInStockNow']==0) {
										continue;
									}
									else {
										echo $value['resultQuantityInStockNow']." / ".$value['quantity_in_stock'];										
									}
*/									
								}
							?>
								</div>
						</td>
						<td class =column>				
								<div id=expirationId<?php echo $iCount?>>
							<?php
								//echo ">>>>".$value['expiration_date'];
							
								//echo $value['expiration_date'];
								//if ($value['expiration_date']==0) {
								if (($value['expiration_date']==0) || ($value['expiration_date']=='0000-00-00')) {
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
						<?php
							//added by Mike, 20250314
							$updatedResultTemp = array();
							$updatedResultTemp = $updatedResult;
							
							$myNextElement=next($updatedResult);
							
							if ($myNextElement) { //element exists
								if ($myNextElement['item_id']!=$value['item_id']) {
						?>
						<td class="column">
							<button onclick="myPopupFunctionDelete(<?php echo $value['item_id'].",'".strtoupper($value['item_name'])."'";?>)" class="Button-delete">
								DELETE
							</button>
						</td>						
						<?php
								}
							}	
							//current element is already the last
							else {
						?>								
							<td class="column">
								<button onclick="myPopupFunctionDelete(<?php echo $value['item_id'].",'".strtoupper($value['item_name'])."'";?>)" class="Button-delete">
									DELETE
								</button>
							</td>						
						<?php
							}
						?>
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

				echo '<div>';					
				echo 'Your search <b>- '.$nameParam.' -</b> did not match any of our non-medicine names.';
				echo '<br><br>Recommendation:';
				echo '<br>&#x25CF; Reverify that the spelling is correct.';				
				echo '</div>';					
			}			
		}
	?>
	<br />
	<br />
	
	<table class="addNonMedItemTable">
	<tr>
		<td id="addNewNonMedItemTdHeaderId" class="tableHeaderAddNewNonMedItemTd">
			<div id="addNewNonMedItemDivId" class="tableHeaderAddNewNonMedItem">ADD NEW NON-MED</div>
		</td>
		<td>
			<button class="tableHeaderFlipSwitchIconButton" onclick="myFlipSwitchFunction()">⎘</button>
			</button>
		</td>
	</tr>
	<tr>
		<td id="addNewNonMedItemTdId">
		<!-- Form -->
		<!-- note: "browse/addPatientNameAccounting" to redirect to patient wait list -->
		<!-- "browse/addPatientName" faster -->
		<form id="addNonMedItemFormId" method="post" action="<?php echo site_url('browse/addNonMedItem/0')?>">
			<div>
				<table width="100%">
				  <tr>
					<td>
					  <b><span>Item Name <span class="asterisk">*</span></b>
					</td>
				  </tr>
				  <tr>
					<td>				
					  <input type="text" class="item-input" placeholder="" name="itemNameParam" value="<?php if (isset($itemNameParam)){echo $itemNameParam;}?>" required>
					</td>
				  </tr>
				</table>
			</div>
			<div>
				<table width="100%">
				  <tr>
					<td>
					  <b><span>Price </span><span class="asterisk">*</span></b>
					</td>
				  </tr>
				  <tr>
					<td>
<!--									
					  <input type="text" class="patient-input" placeholder="" name="patientFirstNameParam" required>
-->					  
					<input type="tel" id="" name="priceParam" class="Price-textbox no-spin" value="<?php if (isset($priceParam)){echo $priceParam;}?>" min="1" max="99999999" 
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
				  </tr>
				</table>
			</div>	
			<div>
				<table width="100%">
				  <tr>
					<td>
					  <b><span>Quantity </span><span class="asterisk">*</span></b>
					</td>
				  </tr>
				  <tr>
					<td>
<!--									
					  <input type="text" class="patient-input" placeholder="" name="patientFirstNameParam" required>
-->					  
					<input type="tel" id="" name="quantityParam" class="Quantity-textbox no-spin" value="<?php if (isset($quantityParam)){echo $quantityParam;}?>" min="1" max="99999999" 
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
				  </tr>
				  <tr>
				  <td>
					<!-- add extra blank row -->
				  </td>
				  </tr>
				  <tr>
					<td id="isReturnedItemTdId">
					<b><span>Is returned item? </span><span class="asterisk">*</span></b>
					<input type="checkbox" name="isReturnedItemCheckBoxParam">
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