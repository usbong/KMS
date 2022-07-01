<!--
  Copyright 2020~2022 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200522
  @date updated: 20220701; from 20220531
  @website address: http://www.usbong.ph

  Input:
  1) Summary Worksheet with counts and amounts in .csv (comma-separated value) file at the Accounting/Cashier Unit
  Output:
  1) Summary Worksheet that is viewable on a Computer Web Browser  
  
  Note:
  1) We can reuse this set of instructions with other .csv files that need to be viewable on a Computer Web Browser.
  2) We can auto-generate the .csv files using Microsoft EXCEL and LibreOffice CALC.
	
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewSummaryReportForTheDay.php   
-->
<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
 	<!-- edited by Mike, 20200811 -->
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
							font-size: 11pt;

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

						td.columnBorderBottomNotDoubleLine
						{
							border: 1px dotted #ab9c7d;		
							border-bottom: 4px solid black;
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

						td.columnBorderTopBottomNotDoubleLine
						{
							border: 1px dotted #ab9c7d;		
							border-top: 2px solid black;
							border-bottom: 4px solid black;
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
      Summary Report for the Day (MOSC)
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
//	$dateToday = date("Y-m-d", strtotime(date("Y-m-d")."-1 Day"));

	//TO-DO: -update: file location
//	$filename="C:/Usbong/Patients".$dateToday.".txt";	
//	$filename="D:\Usbong\MOSC\Forms\Information Desk\output\cashier\summaryReport".$dateToday.".txt";

	//edited by Mike, 20200725
	//$filename="D:\Usbong\MOSC\Forms\Information Desk\output\cashier\summaryReport".$dateToday.".csv";
	//edited by Mike, 202000726
	//$filename="D:\Usbong\MOSC\Forms\Information Desk\output\cashier\moscReportForTheDay2020-07-25Final.csv";
	//$filename="D:\Usbong\MOSC\Forms\Information Desk\output\cashier\moscReportForTheDay".$dateToday."Final.csv";

	$filename="G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\moscReportForTheDay".$dateToday."Final.csv";
//$filename="G:\Usbong\MOSC\Forms\Information Desk\output\informationDesk\cashier\moscReportForTheDay2021-10-06Final.csv";

	echo "<br/>";
	echo "<table>";
				
	//TO-DO: -add: auto-identify and update date format to use YYYY-MM-DD
	
	echo '<tr class="row">';

	ini_set('auto_detect_line_endings', true);

	//added by Mike, 20200523
	if (!file_exists($filename)) {
		//add the day of the week
		//edited by Mike, 20200726
		//$dateToday = (new DateTime())->format('Y-m-d, l');
		$dateToday = Date('Y-m-d, l');

		echo "There are no transactions for the day, ".$dateToday.".";
	}
	else {
		//Reference: https://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php;
		//answer by: thenetimp, 20120204T0730
		//edited by: thenetimp, 20170823T1704

		$iRowCount = -1; //we later add 1 to make start value zero (0)
		//if (($handle = fopen("test.csv", "r")) !== FALSE) {
		if (($handle = fopen($filename, "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
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
				
				//added by Mike, 20220531
				$cellValue=strtoupper($cellValue);
				
				//$cellValue = utf8_encode($cellValue);
				//$cellValue = mysql_real_escape_string($data[$iColumnCount]);
				
				//added by Mike, 20200811
				//$cellValue = str_replace("�","'",$cellValue); //$data[$iColumnCount]); //$cellValue);
	
				//$cellValue = htmlspecialchars($cellValue, ENT_QUOTES); // Converts double and single quotes
	
				if (($iRowCount==1)) {// and ($iColumnCount==0)) {
					//edited by Mike, 20200807
//					if (($iColumnCount!=4) and ($iColumnCount!=5) and ($iColumnCount!=9)) {
					//edited by Mike, 20220701					
//					if (($iColumnCount!=4) and ($iColumnCount!=5) and ($iColumnCount<9)) {
					if (($iColumnCount!=4) and ($iColumnCount!=5) and ($iColumnCount<15)) {
						//background color green
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
					}
					else {
						echo "<td class='column'>".$cellValue."</td>";
					}
				}
				//"CASH REGISTER RECEIPT" cells; text
				//edited by Mike, 20220128
//				else if (($iRowCount>=2) and ($iRowCount<=18) and ($iColumnCount>=4) and ($iColumnCount<=5)) {
				else if (($iRowCount>=2) and ($iRowCount<=20) and ($iColumnCount>=4) and ($iColumnCount<=5)) {
					echo "<td class='column' style='text-align:left'><b>".$cellValue."</b></td>";
				}
				else {
					//echo "<td class='column'>".utf8_encode($data[$iColumnCount])."</td>";
					//edited by Mike, 20200726
//					$cellValue = utf8_encode($data[$iColumnCount]);
					if (is_numeric($cellValue)) {
						//added by Mike, 20200812						
						if ($iColumnCount==7) { //COUNT
							//integer value
						}
						//added by Mike, 20200813; edited by Mike, 20201212
						else if (isset($data[$iColumnCount+1]) and ((strpos(utf8_encode($data[$iColumnCount+1]),"#")!==false))) {
							//integer value
						}						
						else {
							//add two digits after the decimal point
							//Reference: https://www.php.net/number_format;
							//last accessed: 20200812
							//input: 60
							//output: 60.00
							//Note: Rounding Rules
							//input: 60.00000000000006
							//output: 60.00
							//input: 60.005
							//output: 60.01
							//input: 60.004
							//output: 60.00
							$cellValue = number_format($cellValue, 2, '.', '');
						}																					

						//edited by Mike, 20200726
						//echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
						if (($iRowCount==2) and ($iColumnCount==3)) { //ACTUAL TOTAL
							echo "<td class='columnBorderBottom' style='text-align:right'>".$cellValue."</td>";
						}
						else if (($iRowCount==2) and ($iColumnCount<3)) { //ACTUAL TOTAL number value row
							echo "<td class='columnBorderBottomDotted' style='text-align:right'>".$cellValue."</td>";
						}						
						else if (($iColumnCount+1<count($data)) and ((utf8_encode($data[$iColumnCount+1]))=="TOTAL")) {
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
						}						
						//CASH REGISTER TOTAL
						else if (($iColumnCount-1>=0) and ((utf8_encode($data[$iColumnCount-1]))=="TOTAL")) {
								//edited by Mike, 20220128
//								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
								echo "<td class='columnBorderTopBottomNotDoubleLine' style='text-align:right'>".$cellValue."</td>";
//								echo "<td class='columnBorderBottomNotDoubleLine' style='text-align:right'>".$cellValue."</td>";
						}
						//added by Mike, 20220128
						else if (($iColumnCount-1>=0) and ((utf8_encode($data[$iColumnCount-1]))=="DIRECT PAYMENT")) {
								echo "<td class='columnBorderBottomNotDoubleLine' style='text-align:right'>".$cellValue."</td>";
						}						
						//added by Mike, 20220128						
						else if ($iRowCount==20) {
							echo "<td class='columnBorderBottom' style='text-align:right'>".$cellValue."</td>";																
						}						
						else if (($iColumnCount-1>=0) and ((utf8_encode($data[$iColumnCount-1]))=="GRAND TOTAL")) {
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
						}
						else {							 
							echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
						}
					}
					else {
						//echo "<td class='column'><b>".$cellValue."</b></td>";

						//added by Mike, 20200726
						if ($cellValue=="PREV TOTAL") {
							//background color green
							echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
						}
						else if ($cellValue=="GRAND TOTAL") {
							//background color yellow
							echo "<td class='column' bgcolor='#FFFF00'><b>".$cellValue."</b></td>";
						}
						else {
							echo "<td class='column'><b>".$cellValue."</b></td>";
						}						
					}															
				}
			}
			echo '</tr><tr class="row">';
		  }
		  echo '</tr>';
		  
		  fclose($handle);
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