<!--
  Copyright 2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20201227
  @date updated: 20201227

  Input:
  1) Annual Year End Summary Worksheet with counts and amounts in .csv (comma-separated value) file using Tab as the delimiter from Sta. Lucia Health Care Center (SLHCC) Master List Workbook

  Output:
  1) Annual Year End  Worksheet that is viewable on a Computer Web Browser  
  
  Note:
  1) We can reuse this set of instructions with other .csv files that need to be viewable on a Computer Web Browser.
  2) We auto-generate the .csv file using the Java Computer Language.
	
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewReferralSummaryReportSLHCC.php   
  
  //TO-DO: -delete: excess instructions and notes
-->
<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
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
							text-align: left; <!--center-->
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
      Annual Year End Summary Report (SLHCC)
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

	//TO-DO: -update: file location

	//$filename="D:\Usbong\SLHCC\Master List\output\WeeklyCollectionReportWorkbook20200803~20200808.csv";
	//$filename="D:\Usbong\SLHCC\Master List\output\WeeklyCollectionReportWorkbook20200824~20200829.csv";

	//added by Mike, 20200830
	//TO-DO: -reverify: with lower versions of PHP, i.e. not 5.+
	//note: generate the report every Sunday
	//auto-identify the start and end dates
	$dateToday = Date('Y-m-d');	

	$startDate = new DateTime($dateToday);
	$startDate->modify("-6 day");

	$sStartDate = str_replace("-","",$startDate->format("Y-m-d"));

	$endDate = new DateTime($dateToday);
	$endDate->modify("-1 day");

	$sEndDate = str_replace("-","",$endDate->format("Y-m-d"));
		
	//edited by Mike, 20201206
//	$filename="D:\Usbong\SLHCC\Master List\output\WeeklyCollectionReportWorkbook".$sStartDate."~".$sEndDate.".csv";
	//note: use this to set by hand the week of a collection report 
	//$filename="D:\Usbong\SLHCC\Master List\output\WeeklyCollectionReportWorkbook20201123~20201128.csv";
	
	//$filename="D:\Usbong\SLHCC\Master List\output\WeeklyCollectionReportWorkbook20201221~20201224.csv";	

	$filename="D:\Usbong\SLHCC\Master List\generateAnnualYearEndSummaryReportOfAllInputFilesFromMasterList\output\AnnualYearEndSummaryReportOutput.csv";


	echo "<br/>";
	echo "<table>";
					
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
				
				//added by Mike, 20200726; edited by Mike, 20201227
				//$cellValue = utf8_encode($data[$iColumnCount]);
				$cellValue = strtoupper(utf8_encode($data[$iColumnCount]));

				if (($iRowCount==0) and ($iColumnCount==0)) {
						//sky blue
						echo "<td class='column' bgcolor='#00CCFF'><b>".$cellValue."</b></td>";
				}
				//added by Mike, 20201227
				//note: we add these in sequence
				else if (strpos($cellValue, "TOTAL:")!==false) {
						//green
						echo "<td class='column' bgcolor='#FFFF00'><b>".$cellValue."</b></td>";
				}
				else if (strpos($cellValue, ":")!==false) {
						//green
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
				else if (strpos($cellValue, "MEDICAL DOCTOR NAME")!==false) {
						//green
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}

/*	//removed by Mike, 20201227
				else if ($iRowCount==1) {
						//green
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
				else if (strpos($cellValue, "Report")!==false) {
						//sky blue
						echo "<td class='column' bgcolor='#00CCFF'><b>".$cellValue."</b></td>";
				}
				else if (strpos($cellValue, ":")!==false) {
						//green
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
*/

/*
				//I. CASH
				else if (($iRowCount==4) and ($iColumnCount==0)) {
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
				//II. HMO (Forecasted)
				else if (($iRowCount==9) and ($iColumnCount==0)) {
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
				//III. HMO (Forecasted)
				else if (($iRowCount==12) and ($iColumnCount==0)) {
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
				//IV. UNCOLLECTED CASH
				else if (($iRowCount==14) and ($iColumnCount==0)) {
						echo "<td class='column' bgcolor='#00FF00'><b>".$cellValue."</b></td>";
				}
*/				
				else {
					//echo "<td class='column'>".utf8_encode($data[$iColumnCount])."</td>";
					//edited by Mike, 20200726
//					$cellValue = utf8_encode($data[$iColumnCount]);
					if (is_numeric($cellValue)) {
						//TO-DO: -update: this
/*						
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
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
						}
						else if (($iColumnCount-1>=0) and ((utf8_encode($data[$iColumnCount-1]))=="GRAND TOTAL")) {
								echo "<td class='columnBorderTopBottom' style='text-align:right'>".$cellValue."</td>";
						}
						else {							 
*/						
/*						//removed by Mike, 20200927
							echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
*/							
/*
						}
*/						
						//added by Mike, 20200927; edited by Mike, 20201226
						//$cellValue = number_format($cellValue, 2, '.', '');					
						//edited by Mike, 20201226
						//$cellValue = number_format($cellValue, 2, '.', ',');

/*				//removed by Mike, 20201227
						if ($iColumnCount==2) { //count
							$cellValue = number_format($cellValue, 0, '', ',');
						}
						else {
							$cellValue = number_format($cellValue, 2, '.', ',');
						}
*/
					
						//added by Mike, 20201227
						//count
						$cellValue = number_format($cellValue, 0, '', ',');

						echo "<td class='column' style='text-align:right'>".$cellValue."</td>";
					}
					else {
						//echo "<td class='column'><b>".$cellValue."</b></td>";
						
						//TO-DO: -update: this
/*
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
*/							
							echo "<td class='column'><b>".$cellValue."</b></td>";
/*
						}						
*/						
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
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>		 
  </body>
</html>