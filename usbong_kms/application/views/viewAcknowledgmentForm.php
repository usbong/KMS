<!--
  Copyright 2020~2021 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  
  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200818
  @date updated: 20210809
  @website address: http://www.usbong.ph  
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

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							/* Legal Size; Landscape*/							

							width: 670px;/*860px;*//* 802px;*//* 670px */

							/* removed by Mike, 20210105 */
							/* use zoom 67% scale*/
							/* at present, command not support in Mozilla Firefox */				
/*							zoom: 67%; 
	
							transform: scale(0.67);
							transform-origin: 0 0;	
*/							
                        }
						
						div.copyright
						{
							text-align: center;
						}
						
						div.formTitle
						{
							text-align: center;
/*							font-weight: bold;*/	
							font-size: 14pt;
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
						
						select.cashierNameSelect {
							font-size: 12pt;
						}
						
						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.tablePart1
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.tablePart2
						{
							width: 100%;
							
<!--							border: 1px solid #ab9c7d;		
-->
							border: 1px solid rgb(255,255,255);
							border-collapse: collapse;							 
						}						

						table.tablePart3
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						tr.rowEvenNumber {
							background-color: #dddddd; <!--#dddddd; = gray #95b3d7; = sky blue; use as row background color-->
							border: 1pt solid #00ff00;		
						}

						td.tableHeaderColumnPart1
						{
							text-align: left;
/*							font-weight: bold;
*/
						}						

						td.tableHeaderColumnPart2
						{
							border: 1px solid #000000;		
							text-align: center;
/*							font-weight: bold;
*/
						}						

						td.tableHeaderColumnPart3dot1
						{
							text-align: left;
/*							font-weight: bold;
*/
							width: 70%;							
						}						

						td.tableHeaderColumnPart3dot2
						{
							text-align: left;
/*							font-weight: bold;
*/
							width: 30%;							
						}						


						td.column
						{
							border: 1px dotted #000000;		
							text-align: center;
						}						

						td.columnFee
						{
							border: 1px dotted #000000;		
							text-align: right;
						}

						td.columnFeeTotal
						{
							border: 1px dotted #000000;		
							text-align: right;
							font-size: 14pt;
							font-weight: bold;
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
      Acknowledgment Form (MOSC)
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
	  </script>
  <body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');
	
	//edited by Mike, 20200726
	//$dateToday = (new DateTime())->format('Y-m-d');
	
	//edited by Mike, 20210720
	//$dateToday = Date('Y-m-d');
//	$dateToday = $result[0]['transaction_date'];
//	$dateToday = $resultPaid[0]['transaction_date'];
	
	//if no paid transaction
	if ($resultPaid[0]['transaction_date']=="") {
		$dateToday = date('Y-m-d');
	}
	else {
		$dateToday = date('Y-m-d',strtotime($resultPaid[0]['transaction_date']));
	}

	//TO-DO: -update: this
	
	$totalAmountFee=0;

?>
	<div class="formTitle">
		<b>MARIKINA ORTHOPEDIC SPECIALTY CLINIC</b><br/>
		<b>ACKNOWLEDGMENT FORM</b>
	</div>
	<br
	
	<!-- PART 1 -->	
	<table class="tablePart1">
		<tr>
			<td class="tableHeaderColumnPart1">
				<b>TO:</b>
			</td>
			<td>
<?php			
				//BERGSTEIN, AKI
				echo $result[0]['patient_name'];
?>				
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td class="tableHeaderColumnPart1">
				<b>DATE:</b>
			</td>
			<td>
				<?php echo $dateToday; ?>				
			</td>			
		</tr>
		<tr>
			<td class="tableHeaderColumnPart1">
				<b>ADDRESS:</b>
			</td>
			<td>
<?php			
/* //edited by Mike, 20210803
				//STO. NIÑO, 1820, MARIKINA CITY
				echo $result[0]['location_address'];
				echo ", ".$result[0]['barangay_address'];
				echo ", ".$result[0]['postal_address'];
				echo ", ".$result[0]['province_city_ph_address'];				
*/				
/*	//edited by Mike, 20210809
				echo $result[0]['location_address'];				

				if (!empty($result[0]['barangay_address'])) {
					if (!empty($result[0]['location_address'])) {
						echo ", ";
					}
					echo $result[0]['barangay_address'];
				}
				else {
					echo " ";
				}

				if (!empty($result[0]['postal_address'])) {
					if (!empty($result[0]['barangay_address'])) {
						echo ", ";
					}
					echo $result[0]['postal_address'];					
				}								
				else {
					echo " ";
				}

				if (!empty($result[0]['province_city_ph_address'])) {
					if (!empty($result[0]['postal_address'])) {
						echo ", ";
					}
					echo $result[0]['province_city_ph_address'];					
				}
*/
				echo $result[0]['location_address'];				

				if (!empty($result[0]['location_address'])) {
					echo ", ";
				}
				echo $result[0]['barangay_address'];

				if (!empty($result[0]['barangay_address'])) {
					echo ", ";
				}
				echo $result[0]['postal_address'];					

				if (!empty($result[0]['postal_address'])) {
					echo ", ";
				}
				echo $result[0]['province_city_ph_address'];									
?>				
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td class="tableHeaderColumnPart1">
				<b>OSCA/PWD ID NO.:</b>
			</td>
			<td>
<?php		
				//if (strpos($result[0]['location_address'],"")!==false) {
				if (empty($result[0]['pwd_senior_id'])) {
					echo "N/A";
				}
				else {
					echo $result[0]['pwd_senior_id'];
				}
?>
			</td>			
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
			<td class="tableHeaderColumnPart1">
				<b>SIGNATURE:</b>
			</td>
			<td>
<?php		
				//edited by Mike, 20210803
				if (empty($result[0]['pwd_senior_id'])) {
//				if ((empty($result[0]['pwd_senior_id']))or ($result[0]['pwd_senior_id']=="")) {
					echo "N/A";
				}
				else {
//					echo $result[0]['pwd_senior_id'];
					echo "<br/>__________";
				}
?>
			</td>			
		</tr>
	</table>

	<br/>

	<!-- PART 2 -->
	<table class="tablePart2">
		<tr>
			<td class="tableHeaderColumnPart2">
				<b>QTY</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>UNIT</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>DESCRIPTION</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>UNIT PRICE</b>
			</td>
			<td class="tableHeaderColumnPart2">
				<b>AMOUNT</b>
			</td>
		</tr>

		<!-- PART 2: ANSWER -->
		<!-- patient transaction -->
<?php		
		//edited by Mike, 20210628
		if (($resultPaid!=null) and (count($resultPaid) > 0)) {					
			//auto-identify fee, e.g. Consultation+Procedure, X-RAY
						
			if ($resultPaid[0]['fee']!=0) {
				echo "<tr>";
					echo "<td class='columnFee'>";
					echo "1";
					echo "</td>";			
					echo "<td class='column'>";
					echo "SET";
					echo "</td>";			
					echo "<td class='column'>";
					echo "PROF FEE: DR. ".$resultPaid[0]['medical_doctor_name'];
					echo "</td>";	
					echo "<td class='columnFee'>";
					//echo $resultPaid[0]['fee'];
					//edited by Mike, 20210706
					echo number_format($resultPaid[0]['fee'], 2, '.', ',');
					echo "</td>";	
					echo "<td class='columnFee'>";
					//echo $resultPaid[0]['fee'];
					//edited by Mike, 20210706
					echo number_format($resultPaid[0]['fee'], 2, '.', ',');
					echo "</td>";
				echo "</tr>";			
								
				$totalAmountFee+=$resultPaid[0]['fee'];
			}
			else {
				if ((strpos($resultPaid[0]['notes'],"NC;")!=0)!==false) {
					echo "<tr>";
						echo "<td class='columnFee'>";
						echo "1";
						echo "</td>";			
						echo "<td class='column'>";
						echo "SET";
						echo "</td>";			
						echo "<td class='column'>";
						//edited by Mike, 20210706
//						echo "PROFESSIONAL FEE: GRATIS";
						echo "PROF FEE: DR. ".$resultPaid[0]['medical_doctor_name']."; GRATIS";
						echo "</td>";	
						echo "<td class='columnFee'>";
						echo "0.00";
						echo "</td>";	
						echo "<td class='columnFee'>";
						echo "0.00";
						echo "</td>";
					echo "</tr>";			
				}				
			}
			
			if ($resultPaid[0]['x_ray_fee']!=0) {
				echo "<tr>";
					echo "<td class='columnFee'>";
					echo "1";
					echo "</td>";			
					echo "<td class='column'>";
					echo "SET";
					echo "</td>";			
					echo "<td class='column'>";
					echo "X-RAY EXAM";
					echo "</td>";	
					echo "<td class='columnFee'>";
					//echo $resultPaid[0]['x_ray_fee'];
					//edited by Mike, 20210706
					echo number_format($resultPaid[0]['x_ray_fee'], 2, '.', ',');
					echo "</td>";	
					echo "<td class='columnFee'>";
					//echo $resultPaid[0]['x_ray_fee'];
					//edited by Mike, 20210706
					echo number_format($resultPaid[0]['x_ray_fee'], 2, '.', ',');
					echo "</td>";					
				echo "</tr>";	

				$totalAmountFee+=$resultPaid[0]['x_ray_fee'];								
			}
			
			if ($resultPaid[0]['lab_fee']!=0) {
				echo "<tr>";
					echo "<td class='columnFee'>";
					echo "1";
					echo "</td>";			
					echo "<td class='column'>";
					echo "SET";
					echo "</td>";			
					echo "<td class='column'>";
					echo "LAB EXAM";
					echo "</td>";	
					echo "<td class='columnFee'>";
					//echo $resultPaid[0]['lab_fee'];
					//edited by Mike, 20210706
					echo number_format($resultPaid[0]['lab_fee'], 2, '.', ',');
					echo "</td>";	
					echo "<td class='columnFee'>";
					//echo $resultPaid[0]['lab_fee'];
					//edited by Mike, 20210706
					echo number_format($resultPaid[0]['lab_fee'], 2, '.', ',');
					echo "</td>";
				echo "</tr>";			

				$totalAmountFee+=$resultPaid[0]['lab_fee'];								
			}
		}
?>		

		<!-- med item transaction -->
<?php		
		//edited by Mike, 20210628
		if (($resultPaidMedItem!=null) and (count($resultPaidMedItem) > 0)) {					
			if ((isset($resultPaidMedItem)) and ($resultPaidMedItem!=False)) {
//				$resultCount = count($resultPaidMedItem);			
			
				foreach ($resultPaidMedItem as $value) {					
					if ($value['fee']!=0) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo $value['fee_quantity'];
							echo "</td>";			
							echo "<td class='column'>";
							
							if ($value['fee_quantity']==1) {
								echo "PC";
							}
							else {
								echo "PCS";
							}

							echo "</td>";			
							echo "<td class='column'>";
							echo strtoupper($value['item_name']);
							echo "</td>";
							echo "<td class='columnFee'>";
//							echo $value['fee']/$value['fee_quantity'];
							//edited by Mike, 20210706
							echo number_format($value['fee']/$value['fee_quantity'], 2, '.', ',');
							echo "</td>";	
							echo "<td class='columnFee'>";
							//echo $value['fee'];
							//edited by Mike, 20210706
							echo number_format($value['fee'], 2, '.', ',');
							echo "</td>";
						echo "</tr>";			

						$totalAmountFee+=$value['fee'];
					}
				}
			}
		}
?>		

		<!-- non-med item transaction -->
<?php		
		//edited by Mike, 20210628
		if (($resultPaidNonMedItem!=null) and (count($resultPaidNonMedItem) > 0)) {			
			if ((isset($resultPaidNonMedItem)) and ($resultPaidNonMedItem!=False)) {
//				$resultCount = count($resultPaidMedItem);			
			
				foreach ($resultPaidNonMedItem as $value) {					
					if ($value['fee']!=0) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo $value['fee_quantity'];
							echo "</td>";			
							echo "<td class='column'>";

							if ($value['fee_quantity']==1) {
								echo "PC";
							}
							else {
								echo "PCS";
							}

							echo "</td>";			
							echo "<td class='column'>";
							echo strtoupper($value['item_name']);
							echo "</td>";
							echo "<td class='columnFee'>";
//							echo $value['fee']/$value['fee_quantity'];
							echo number_format($value['fee']/$value['fee_quantity'], 2, '.', '');
							echo "</td>";	
							echo "<td class='columnFee'>";
							//echo $value['fee'];
							//edited by Mike, 20210706							
							echo number_format($value['fee'], 2, '.', ',');
							echo "</td>";
						echo "</tr>";			

						$totalAmountFee+=$value['fee'];
					}
				}
			}
		}
?>		

		<!-- snack item transaction -->
<?php		
		//edited by Mike, 20210628
		if (($resultPaidSnackItem!=null) and (count($resultPaidSnackItem) > 0)) {
			if ((isset($resultPaidSnackItem)) and ($resultPaidSnackItem!=False)) {
//				$resultCount = count($resultPaidMedItem);			
			
				foreach ($resultPaidSnackItem as $value) {					
					if ($value['fee']!=0) {
						echo "<tr>";
							echo "<td class='columnFee'>";
							echo $value['fee_quantity'];
							echo "</td>";			
							echo "<td class='column'>";

							if ($value['fee_quantity']==1) {
								echo "PC";
							}
							else {
								echo "PCS";
							}

							echo "</td>";			
							echo "<td class='column'>";
							echo strtoupper($value['item_name']);
							echo "</td>";
							echo "<td class='columnFee'>";
//							echo $value['fee']/$value['fee_quantity'];
							//edited by Mike, 20210706
							echo number_format($value['fee']/$value['fee_quantity'], 2, '.', ',');
							echo "</td>";	
							echo "<td class='columnFee'>";
							//echo $value['fee'];
							//edited by Mike, 20210706
							echo number_format($value['fee'], 2, '.', ',');
							echo "</td>";
						echo "</tr>";			

						$totalAmountFee+=$value['fee'];
					}
				}
			}
		}
?>


<!--		
		<tr>
			<td class="columnFee">
				1
			</td>
			<td class="column">
				SET
			</td>
			<td class="column">
				CONSULT AND PROCEDURE
			</td>
			<td class="columnFee">
				1500
			</td>
			<td class="columnFee">
				1500
			</td>
		</tr>

		<tr>
			<td class="columnFee">
			</td>
			<td class="column">
			</td>
			<td class="column">
				DR. HALIMBAWA, USBONG
			</td>
			<td class="columnFee">
			</td>
			<td class="columnFee">
			</td>
		</tr>

		<tr>
			<td class="columnFee">
				1
			</td>
			<td class="column">
				PC
			</td>
			<td class="column">
				X-RAY EXAM
			</td>
			<td class="columnFee">
				400
			</td>
			<td class="columnFee">
				400
			</td>
		</tr>

		<tr>
			<td class="columnFee">
				1
			</td>
			<td class="column">
				PC
			</td>
			<td class="column">
				LONGBONE ARM SLING BLUE
			</td>
			<td class="columnFee">
				250
			</td>
			<td class="columnFee">
				250
			</td>
		</tr>

		<tr>
			<td class="columnFee">
			</td>
			<td class="column">
			</td>
			<td class="column">
				ADULT -LARGE
			</td>
			<td class="columnFee">
			</td>
			<td class="columnFee">
			</td>
		</tr>
-->

		<!-- PART 2: TOTAL -->
		<tr>
			<td class="columnFee">
			</td>
			<td class="column">
			</td>
			<td class="column">
			</td>
			<td class="columnFee">
			</td>
			<td class="columnFeeTotal">
<?php			
				//edited by Mike, 20210706
//				echo number_format($totalAmountFee, 2, '.', '');
				echo number_format($totalAmountFee, 2, '.', ',');				
?>				
			</td>
		</tr>	
	</table>

	<br/>

	<!-- PART 3 -->
	<table class="tablePart3">
		<tr>
			<td class="tableHeaderColumnPart3dot1">
				<b>BY:</b>
			</td>
			<td class="tableHeaderColumnPart3dot2">
				<b>RECEIVED BY:</b>
			</td>
		</tr>
		<tr>
			<td>
				<br/>
			</td>
			<td>
			</td>						
		</tr>
		<tr>
			<td class="tableHeaderColumnPart3dot1">
<!-- 
				<select class="cashierNameSelect">
					<option value='0' selected='selected'>SYSON, MICHAEL B.</option>
					<option value='1'>HALIMBAWA, USBONG</option>			
				</select>
-->
<?php				
				echo "<select class='cashierNameSelect'>";

				foreach ($cashierList as $cashierValue) {
					if ($cashierValue["cashier_id"]==0) {
						echo "<option value='".$cashierValue["cashier_id"]."' selected='selected'>".$cashierValue["cashier_name"]."</option>";						
					}
					else {					  
						echo "<option value='".$cashierValue['cashier_id']."'>".$cashierValue["cashier_name"]."</option>";					  
				   }
				}
				
				echo "</select>";
?>
				
			</td>
			<td class="tableHeaderColumnPart3dot2">
				_________________
			</td>
		</tr>
	</table>

	<br/>
  </body>
</html>