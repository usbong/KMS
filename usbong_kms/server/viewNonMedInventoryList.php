<!--
  Copyright 2020~2022 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200818
  @date updated: 20220813; from 20210105

  Input:
  1) MySQL Database with NON-MED INVENTORY LIST at the Marikina Orthopedic Specialty Clinic (MOSC)

  Output:
  1) NON-MED INVENTORY LIST that is viewable on a Computer Web Browser  
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewNonMedInventoryList.php   
  
  Reference:
  1) X-RAY Price List that is viewable on a Computer Web Browser  
  
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
							width: 860px;/* 802px;*//* 670px */

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

						tr.rowEvenNumber {
							background-color: #dddddd; <!--#dddddd; = gray #95b3d7; = sky blue; use as row background color-->
							border: 1pt solid #00ff00;		
						}

						td.tableHeaderColumn
						{
							border: 1pt solid black;		
							/*background-color: #00ff00;*/ /* #93d151; lime green; */
							text-align: center;
							font-weight: bold;		
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}	
											
						td.columnName
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
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

						span.usbongWebsiteAddressSpan
						{
							/* color: rgb(83,128,34);*/ /* dark lime green rgb(103,157,43);*/
							color: rgb(0,0,0); /* black */
							font-weight: bold;
						}

						a
						{
							color: rgb(0,0,0); /* black */
							text-decoration: none;
						}						
														
    /**/
    </style>
    <title>
      NON-MED ITEM INVENTORY LIST (MOSC)
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

    echo "<b>MARIKINA ORTHOPEDIC SPECIALTY CLINIC"."</b><br/>";
	echo "<br/>";
    echo "<b>NON-MED ITEM INVENTORY LIST"."</b><br/>";
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
	<td class='tableHeaderColumn'><b>ID#</b></td>
	<td class='tableHeaderColumn'><b>NAME</b></td>
	<td class='tableHeaderColumn'><b>PRICE</b></td>
	<td class='tableHeaderColumn'><b>SOLD COUNT</b></td>
	<td class='tableHeaderColumn'><b>QTY COUNT</b></td>
	<td class='tableHeaderColumn'><b>REMAINING COUNT</b></td>
	<tr>
<?php	
	//edited by Mike, 20220813; from 20200823	
//	if ($selectedXRayPriceListResultArray = $mysqli->query("select a.x_ray_body_location_name 'Body Location', b.x_ray_type_name 'Type', c.x_ray_price 'Price' from x_ray_body_location a, x_ray_type b, x_ray_service c where c.x_ray_body_location_id = a.x_ray_body_location_id and c.x_ray_type_id = b.x_ray_type_id and c.added_datetime_stamp = (select max(c2.added_datetime_stamp) from x_ray_service as c2 where c.x_ray_body_location_id=c2.x_ray_body_location_id and c.x_ray_type_id=c2.x_ray_type_id)"))	

	//non-med item list
	if ($selectedItemListResultArray = $mysqli->query("select a.item_id 'ID#', a.item_name 'NAME',a.item_price 'PRICE', a.item_total_sold 'SOLD COUNT', b.quantity_in_stock 'QTY COUNT' from item a, inventory b where a.item_id = b.item_id and a.item_type_id=2 and a.is_hidden=0 order by a.item_name ASC"))	
	
	//med item list
//	if ($selectedItemListResultArray = $mysqli->query("select a.item_id 'ID#', a.item_name 'NAME',a.item_price 'PRICE', a.item_total_sold 'SOLD COUNT', b.quantity_in_stock 'QTY COUNT' from item a, inventory b where a.item_id = b.item_id and a.item_type_id=1 and a.is_hidden=0 and a.item_id!=0 order by a.item_name ASC"))	

	{
		if ($selectedItemListResultArray ->num_rows > 0) {
			//added by Mike, 20200820
			$iRowCount = 0;

			$iCurrentItemId=-1;
			$iQtyCount=0;
			$bIsNewItemId=false;
			$arrayNewValue=[];

			foreach ($selectedItemListResultArray as $valueArray) {
				//added by Mike, 20200820
				$bodyLocationValue = "";
				$iCount = 0;
				$isAlreadyDiscounted = false;
  								
				foreach ($valueArray as $value) {
						//added by Mike, 20220813
						//echo "<td class='column'>";


						if ($iCount==0) { //ID# COLUMN
/*	
						echo $valueArray['ID#']."<br/>";
						echo $iCurrentItemId."<br/>";
*/						
							if ($iCurrentItemId==$valueArray['ID#']) {
								$bIsNewItemId=false;							
								$iQtyCount+=$valueArray['QTY COUNT'];								

//								echo "DITO";
							}
							else {
								$iCurrentItemId=$valueArray['ID#'];
								$bIsNewItemId=true;							
								$iCountNewValueColumn=0;
								

				if ($iRowCount==0) {
					$iRowCount++;
					continue;
				}
								
								
				//edited by Mike, 20200820
				//echo "<tr>";
			    if ($iRowCount % 2 == 0) { //even number
				  echo '<tr class="rowEvenNumber">';
			    }
			    else {
				  echo '<tr class="row">';
			    }				

								
				echo "<td class='column'>";
					echo $iRowCount;
				echo "</td>";								
								

				$iRowCount = $iRowCount + 1;

								foreach ($arrayNewValue as $newValue) {
								
								    if ($iCountNewValueColumn==4) { //QTY COUNT
										break;	
								    }
								    else {
										if ($iCountNewValueColumn==1) { //NAME COLUMN
											echo "<td class='columnName'>";			
												echo strtoupper($newValue);								
											echo "</td>";
										}
										else {
											echo "<td class='column'>";
												echo strtoupper($newValue);								
											echo "</td>";		
										}								    
								    
/*
										echo "<td class='column'>";
											echo strtoupper($newValue);								
										echo "</td>";		
*/
								    }
									
									$iCountNewValueColumn++;	
								}

								echo "<td class='column'>";
									//edited by Mike, 20220813
									//echo $iQtyCount;			
									
									if ($iQtyCount<0) {
										echo "N/A";
									}
									else {
										echo $iQtyCount;
									}														
								echo "</td>";		

								//remaining count								
								echo "<td class='column'>";
									$iRemainingCount = $iQtyCount-$arrayNewValue['SOLD COUNT'];								
									
									if ($iRemainingCount<0) {
										echo "N/A";
									}
									else {
										echo $iRemainingCount;
									}														

								echo "</td>";		



								$iQtyCount=$valueArray['QTY COUNT'];								

							}
						}


					$arrayNewValue=$valueArray;

							
					//added by Mike, 20200820
					$iCount = $iCount + 1;
				}				

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
		© <span class="usbongWebsiteAddressSpan">www.usbong.ph </span><span>2011~<?php echo date("Y")?>. All rights reserved.</span>
	</div>		 
  </body>
</html>
