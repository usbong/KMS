<!--
  Copyright 2020~2021 Usbong Social Systems, Inc.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20210625
  @date updated: 20210625
  @website address: http://www.usbong.ph

  Input:
  1) MySQL Database with Acknowledgment Form details @Marikina Orthopedic Specialty Clinic (MOSC)

  Output:
  1) Auto-generated print-ready Acknowledgment Form that is viewable on a Computer Web Browser  
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewAcknowledgmentForm.php   
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
						
						table.imageTable
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
	$dateToday = Date('Y-m-d');

	// connect to the database
	include('usbong-kms-connect.php');

	$mysqli->set_charset("utf8");

	//TO-DO: -update: this

?>
	<div class="formTitle">
		<b>ACKNOWLEDGMENT FORM</b>
	</div>

<!--	<b>DATE:</b><?php echo " ".$dateToday; ?>
-->
	<br
	
	<!-- PART 1 -->	
	<table>
		<tr>
			<td class="tableHeaderColumnPart1">
				<b>TO:</b>
			</td>
			<td>
				BERGSTEIN, AKI
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
				STO. NIÑO, 1820, MARIKINA CITY
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
				N/A
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
				N/A
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
				2150
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
				SYSON, MICHAEL B.
			</td>
			<td class="tableHeaderColumnPart3dot2">
				_________________
			</td>
		</tr>
	</table>
	
<?php

	//TO-DO: -update: this

	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
	echo "<table>";
/*
	echo "<tr>";
	echo "<td>";
*/					
	//TO-DO: -add: notes column

	//table headers
?>	
	<tr>
	<td class='tableHeaderColumn'><b>COUNT</b></td>
	<td class='tableHeaderColumn'><b>BODY LOCATION</b></td>
	<td class='tableHeaderColumn'><b>TYPE</b></td>
	<td class='tableHeaderColumn'><b>PRICE</b></td>
	<td class='tableHeaderColumn'><b>SC/PWD<br/>PRICE</b></td>
	<tr>
<?php	
	//edited by Mike, 20200823
	if ($selectedXRayPriceListResultArray = $mysqli->query("select a.x_ray_body_location_name 'Body Location', b.x_ray_type_name 'Type', c.x_ray_price 'Price' from x_ray_body_location a, x_ray_type b, x_ray_service c where c.x_ray_body_location_id = a.x_ray_body_location_id and c.x_ray_type_id = b.x_ray_type_id and c.added_datetime_stamp = (select max(c2.added_datetime_stamp) from x_ray_service as c2 where c.x_ray_body_location_id=c2.x_ray_body_location_id and c.x_ray_type_id=c2.x_ray_type_id)"))	
	{
		if ($selectedXRayPriceListResultArray->num_rows > 0) {
			//added by Mike, 20200820
			$iRowCount = 0;

			foreach ($selectedXRayPriceListResultArray as $valueArray) {
				//added by Mike, 20200820
				$bodyLocationValue = "";
				$iCount = 0;
				$isAlreadyDiscounted = false;
								
				//edited by Mike, 20200820
				//echo "<tr>";
			    if ($iRowCount % 2 == 0) { //even number
				  echo '<tr class="rowEvenNumber">';
			    }
			    else {
				  echo '<tr class="row">';
			    }				   				
				$iRowCount = $iRowCount + 1;
				
				
				echo "<td class='column'>";
					echo $iRowCount;
				echo "</td>";
				
				foreach ($valueArray as $value) {
					echo "<td class='column'>";

						//added by Mike, 20200820
						if ($bodyLocationValue=="") {
							$bodyLocationValue = $value;
						}

						//added by Mike, 20200820
						if ($iCount==1) { //TYPE COLUMN
							if (strpos(strtoupper($value),"AP, R/L BENDING")!==false) {
								$isAlreadyDiscounted = true;
							}
							else if (strpos(strtoupper($value),"SCOLIOSIS SERIES")!==false) {
								$isAlreadyDiscounted = true;
							}
						}
						
						//echo strtoupper($value);
						//Body Location: LUMBO-SACRAL TO LOWER THORACIC
						if (strpos($value,"to")!==false) {
							$value = str_replace("to","<br/>to",$value);
							echo strtoupper($value);
						}
						else {
							echo strtoupper($value);
						}
							
					echo "</td>";					
					
					//added by Mike, 20200820
					$iCount = $iCount + 1;
				}				
				
				//note: the last $value is x_ray_price
				echo "<td class='column'>";
					$scPwdPrice = $value - $value*0.20;
					
					//added by Mike, 20200820
					if (strpos(strtoupper($bodyLocationValue),"PEDIA")!==false) {
						$scPwdPrice = "N/A";
					}

					//added by Mike, 20200820
					if (strpos(strtoupper($bodyLocationValue),"THORACO-LUMBAR")!==false) {
						if ($isAlreadyDiscounted) {
							$scPwdPrice = "ALREADY<BR/>DISCOUNTED";
						}
					}

					echo $scPwdPrice;
				echo "</td>";					
				
				echo "</tr>";
			}
		}
		else {
			echo "Found zero (0) result.";
		}
	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}																
/*
	echo "<td>";
	echo "<tr>";
*/
?>
	</table>
	<br />
	<div>***NOTHING FOLLOWS***</div>
	<br />
	<br />
	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>		 
  </body>
</html>