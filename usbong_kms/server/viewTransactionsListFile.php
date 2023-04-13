<!--
  Copyright 2020~2023 USBONG
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  
  @company: USBONG
  @author: SYSON, Michael B
  @date created: 20200818
  @date updated: 20230413; from 20201028

  Input:
  1) .csv (space delimited) of items table from MySQL DB
  
  Output:
  1) item_id, item_total_sold in a reusable array container (MEMORY)
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewCSVFile.php   
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
							
							/* use zoom 67% scale*/
							zoom: 67%; /* at present, command not support in Mozilla Firefox */				
							transform: scale(0.67);
							transform-origin: 0 0;							
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
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;		
							text-align: center;
							font-weight: bold;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
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
      STA. LUCIA HEALTH CARE CENTER (SLHCC)
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
	
	//$filename="C:\\xampp\\htdocs\\usbong_kms\\kasangkapan\\phantomjs-2.1.1-windows\\bin\\output\\2015\\201505~201507.csv";

	$filename="G:\Usbong MOSC\Everyone\Information Desk\USBONG\KMS\\usbongKMSItemListTransaction2020OK.txt";

    echo "<b>MARIKINA ORTHOPEDIC SPECIALTY CLINIC"."</b><br/>";

	echo "<table>";
/*
	echo "<tr>";
	echo "<td>";
*/					
	//TO-DO: -add: notes column

	//table headers
?>	
<!--
	<tr>
	<td class='tableHeaderColumn'><b>COUNT</b></td>
	<td class='tableHeaderColumn'><b>BODY LOCATION</b></td>
	<td class='tableHeaderColumn'><b>TYPE</b></td>
	<td class='tableHeaderColumn'><b>PRICE</b></td>
	<td class='tableHeaderColumn'><b>SC/PWD<br/>PRICE</b></td>
	<tr>
-->
<?php
echo "<br/>";
	echo "<table>";
				
	//TO-DO: -add: auto-identify and update date format to use YYYY-MM-DD
	
	echo '<tr class="row">';

	ini_set('auto_detect_line_endings', true);

	//added by Mike, 20200523
	if (!file_exists($filename)) {
		//add the day of the week
		//edited by Mike, 20200726
		//$sDateToday = (new DateTime())->format('Y-m-d, l');
		$sDateToday = Date('Y-m-d, l');

		echo $filename;

		echo "There are no transactions for the day, ".$sDateToday.".";
	}
	else {
		//added by Mike, 20230413
		$outputArray = array();
		
		//Reference: https://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php;
		//answer by: thenetimp, 20120204T0730
		//edited by: thenetimp, 20170823T1704

		$iRowCount = -1; //we later add 1 to make start value zero (0)
		//if (($handle = fopen("test.csv", "r")) !== FALSE) {
		if (($handle = fopen($filename, "r")) !== FALSE) {
		  //edited by Mike, 20230413
		  //while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, " ")) !== FALSE) {

			$num = count($data) -1; //we add -1 for the computer to not include the excess cell due to the ending \n
		//    echo "<p> $num fields in line $row: <br /></p>\n";
			$iRowCount++;
			for ($iColumnCount=0; $iColumnCount <= $num; $iColumnCount++) {
		//        echo $data[$c] . "<br />\n";
				//edited by Mike, 20200725
				//echo "<td class='column'>".utf8_encode($data[$iColumnCount])."</td>";
				
				//added by Mike, 20200726
				//$cellValue = $data[$iColumnCount];	
				$cellValue = utf8_encode($data[$iColumnCount]);
				
//				echo $cellValue."<br/>";
				
				if (strpos($cellValue, "item_total_sold=")!==false) {
					$cellValue=str_replace("item_total_sold=","",$cellValue);
					
					echo $cellValue."<br/>";				

					$itemTotalSold=$cellValue;
				}
				else if (strpos($cellValue, "item_id=")!==false) {
					$cellValue=str_replace("item_id=","",$cellValue);
					$cellValue=str_replace(";","",$cellValue);										
					echo $cellValue."<br/>";				
					
					$itemId=$cellValue;
				}				
			}

			$data = array(
				'item_id' => $itemId,
				'item_total_sold' => $itemTotalSold
			);		
			
			array_push($outputArray, $data);			

			echo "<br/>";			
		  }
		  
		  fclose($handle);
		}
		
		foreach ($outputArray as $dataValue) {
		//	$this->db->insert('receipt', $dataValue);
		}	
	}
?>
	</table>
	<br />
	<div>***NOTHING FOLLOWS***</div>
	<br />
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>