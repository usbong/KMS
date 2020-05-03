<!--
  Copyright 2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20200503
  @date updated: 20200503

  Input:
  1) Patients list in Tab-delimited .txt file from the Information Desk

  Output:
  1) Patients list that is viewable on a Computer Web Browser  
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewQueueForTheDay.php
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
							font-size: 18pt;

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							/* Legal Size; Landscape*/							
							/* width: 802px; *//* 670px */
							width: 100%;
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
							background-color: #00cc00; <!-- #00ff00; --> <!--#93d151; lime green-->
							border: 1pt solid #00cc00;
							text-align: center;
							font-weight: bold;
						}						

						td.column
						{
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
    /**/
    </style>
    <title>
      Patients Queue MOSC
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

	$dateToday = (new DateTime())->format('Y-m-d');

	//TO-DO: -update: file location
	$filename="C:/Usbong/Patients".$dateToday.".txt";	

/*		
	echo $filename;	
	echo "<br/>";
	echo "<br/>";
*/
	//added by Mike, 20200503
	if (file_exists($filename)) {
		
		$fileContents = file_get_contents($filename);
	//	echo $fileContents;

		$fileContents = str_replace("\"", "", $fileContents);	
	//	$fileContents = str_replace("�", "Ñ", $fileContents);	
		$fileContents = utf8_encode($fileContents);	
		
		//delete the ending \n
		$fileContents = substr($fileContents,0,-1);	

		//auto-identify max column count
		$sCellValueArray = explode("\t", $fileContents);
		$iCountColumn = 0;
		$iMaxCountColumn = 0;
		
		foreach ($sCellValueArray as $sCellValue) {		
			if (strpos($sCellValue,"\n")!==false) {
				$iMaxCountColumn = $iCountColumn + 1;
				break;
			}
			else {
				$iCountColumn = $iCountColumn + 1;
			}
		}

		echo "<br/>";
		echo "<table>";
					
		$bHasFinishedTableHeaderRow = false;
		$iCountColumn = 0;
		
	//	echo $iMaxCountColumn;
		
		echo '<tr class="row">';

		$sToken = strtok($fileContents, "\t");

		while ($sToken !== false) {
			if ($bHasFinishedTableHeaderRow) {
				echo "<td class='column'>".$sToken."</td>";
			}
			else {
				echo "<td class='tableHeaderColumn'>".$sToken."</td>";
			}

			$iCountColumn = $iCountColumn + 1;

			$sToken = strtok("\t");
			
			if (strpos($sToken,"\n")!==false) {
				//note: we use explore(...), instead of another strtok(...) to receive correct outputs
				$sTokenNewLine = explode("\n", $sToken);

				if ($bHasFinishedTableHeaderRow) {
					echo "<td class='column'>".$sTokenNewLine[0]."</td>";				
				}
				else {
					echo "<td class='tableHeaderColumn'>".$sTokenNewLine[0]."</td>";
				}
								
				//we add -2 due to token value includes both the last cell value in the current row and the next cell value after the new line 
				while ($iCountColumn < $iMaxCountColumn-2) {
					echo "<td class='column'></td>";
					$iCountColumn = $iCountColumn + 1;
				}

				echo '</tr><tr class="row">';
				echo "<td class='column'>".$sTokenNewLine[1]."</td>";

				$sToken = strtok("\t");			
				
				$bHasFinishedTableHeaderRow = True;
				$iCountColumn = 0;
			}		

		}	
		echo "</tr>";	
		echo "</table>";
		echo "<br />";
		echo "<div>***NOTHING FOLLOWS***</div>";
	}
	else {
		echo "<br/>";		
		echo "There are no transactions.";
	}	
?>
	<br />
	<br />
	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>		 
  </body>
</html>