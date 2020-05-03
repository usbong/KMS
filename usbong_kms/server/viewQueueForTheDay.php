<?php
/*
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
  1) Patients list viewable on a Computer Web Browser  
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewQueueForTheDay.php

*/
	date_default_timezone_set('Asia/Hong_Kong');

	//added by Mike, 20191017
	$dateToday = (new DateTime())->format('Y-m-d');

	//TO-DO: -update: file location
	$filename="C:/Usbong/Patients".$dateToday.".txt";
	
	echo $filename;
	
	echo "<br/>";
	echo "<br/>";
	
	$fileContents = file_get_contents($filename);

	//TO-DO: -add: display as Tab-delimited
	echo $fileContents;

	echo "<br/>";
	echo "<br/>";

	echo "<table>";
				
	//TO-DO: -add: table headers
	echo '<tr class="row">';

	//TO-DO: -update: this
	$sToken = strtok($fileContents, "\t");

	while ($sToken !== false) {
		echo "<td class='column'>".$sToken."</td>";

		$sToken = strtok("\t");
		
		if (strpos($sToken,"\n")!==false) {
			//note: we use explore(...), instead of another strtok(...) to receive correct outputs
			$sTokenNewLine = explode("\n", $sToken);
				
			echo "<td class='column'>".$sTokenNewLine[0]."</td>";

			echo '</tr><tr class="row">';
			echo "<td class='column'>".$sTokenNewLine[1]."</td>";

			$sToken = strtok("\t");			
		}
	}	
	
	echo "</tr>";
?>
