<!--
  Copyright 2021 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  
  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20210804
  @date updated: 20210804

  Input:
  1) MySQL Database with Patients List at the Marikina Orthopedic Specialty Clinic (MOSC)
  Output:
  1) Patients List with names to be identified as multiple and classified to be together;
	page viewable on a Computer Web Browser  
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewPatientsList.php   
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
							width: 640px; /*860px;*//* 802px;*//* 670px */

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

						table.part1Table
						{
							width: 100%;
						}

						table.patientGroupTable
						{
							width: 100%;
							border: 1px solid #ab9c7d;
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
						
						td.patientGroupColumn
						{
							padding-left: 10%;
							width: 50%;
							vertical-align: top;							
							text-align: right;							
							border: 1px dotted #ab9c7d;
						}
						
						.Button-clear {
							padding: 12px;
							background-color: #ffe400;
							color: #222222;
							font-size: 14px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 4px;

							float: right;
							margin-left: 4px;
						}

						.Button-clear:hover {
							background-color: #d4be00;
						}

						.Button-clear:focus {
							background-color: #d4be00;
						}
												
    /**/
    </style>
    <title>
      Patients List (MOSC)
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
		function myFunction(iRowCount) {
		  //alert("hallo"+iRowCount);

		  var checkboxId = document.getElementById("checkBoxId"+iRowCount);
		  var patientNameSpanId = document.getElementById("patientNameSpanId"+iRowCount);
		  
		  //TO-DO: -use array container
		  var groupPatientName1 = document.getElementById("groupPatientName1");
		  var groupPatientName2 = document.getElementById("groupPatientName2");
		  var groupPatientName3 = document.getElementById("groupPatientName3");
		  var groupPatientName4 = document.getElementById("groupPatientName4");
		  var groupPatientName5 = document.getElementById("groupPatientName5");
		  var currGroupPatientName = groupPatientName1;

//		  alert("hallo"+patientNameSpanId.innerHTML);
			
		  //identify patient name group count
		　　if (groupPatientName1.innerHTML.trim()==="") {
			currGroupPatientName = groupPatientName1;
		  }
		　　else if (groupPatientName2.innerHTML.trim()==="") {
			currGroupPatientName = groupPatientName2;
		  }
		　　else if (groupPatientName3.innerHTML.trim()==="") {
			currGroupPatientName = groupPatientName3;
		  }
		　　else if (groupPatientName4.innerHTML.trim()==="") {
			currGroupPatientName = groupPatientName4;
		  }
		　　else if (groupPatientName5.innerHTML.trim()==="") {
			currGroupPatientName = groupPatientName5;
		  }
		
		  if (checkboxId.checked == true){
			  if (currGroupPatientName.innerHTML.trim()==="") {
				  currGroupPatientName.innerHTML = patientNameSpanId.innerHTML;			  
				  currGroupPatientName.value = iRowCount;			  

				  currGroupPatientName.style.display = "block";

				  //alert("dito"+patientNameGroup1.innerHTML+"end");
			  }
		  }
		  else {
			　　if (groupPatientName1.value ===iRowCount) {
				currGroupPatientName = groupPatientName1;
			  }
			　　else if (groupPatientName2.value ===iRowCount) {
				currGroupPatientName = groupPatientName2;
			  }
			　　else if (groupPatientName3.value ===iRowCount) {
				currGroupPatientName = groupPatientName3;
			  }
			　　else if (groupPatientName4.value ===iRowCount) {
				currGroupPatientName = groupPatientName4;
			  }
			　　else if (groupPatientName5.value ===iRowCount) {
				currGroupPatientName = groupPatientName5;
			  }

			  if (currGroupPatientName.value ===iRowCount) {
				currGroupPatientName.style.display = "none";
				currGroupPatientName.innerHTML="";
				currGroupPatientName.value="";
			  }
		  }

		  if (groupPatientName5.innerHTML.trim()==="") {
		  }
		  else {
			  alert("SAME PATIENT GROUP MAX REACHED!");
		  }
		} 	  
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
?>
	<table class="part1Table">
	<tr>
		<td>
			<b><u>PATIENTS LIST</u></b><br/>
			<br/>
			<table>
			<tr>
			<td class='tableHeaderColumn'><b>COUNT</b></td>
			<td class='tableHeaderColumn'><b>PATIENT NAME</b></td>
			<td class='tableHeaderColumn'><b>IDENTIFY</b></td>
			<tr>
<?php	
	//TO-DO: -add: button to go to next batch
	if ($selectedPatientsListResultArray = $mysqli->query("SELECT patient_name FROM patient LIMIT 12"))	
	{
		if ($selectedPatientsListResultArray->num_rows > 0) {
			$iRowCount = 0;

			foreach ($selectedPatientsListResultArray as $valueArray) {
				$iCount = 0;
				$isAlreadyDiscounted = false;
								
				//echo "<tr>";
			    if ($iRowCount % 2 == 0) { //even number
				  echo '<tr class="rowEvenNumber">';
			    }
			    else {
				  echo '<tr class="row">';
			    }				   				
				$iRowCount = $iRowCount + 1;
				
					//columns
					echo "<td class='column'>";
						echo $iRowCount;
					echo "</td>";

					echo "<td class='column'>";				
						echo "<span id='patientNameSpanId".$iRowCount."'>".strtoupper($valueArray['patient_name'])."</span>";
					echo "</td>";

					//TO-DO: -add: if same patient group MAX reached...

					echo "<td class='column'>";
						echo "<input type='checkbox' id='checkBoxId".$iRowCount."' value='' onclick='myFunction(".$iRowCount.")' autocomplete='off'>";
					echo "</td>";
				
				$iCount = $iCount + 1;

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
?>
		</table>
		</td>
		<td class="patientGroupColumn">
			<table class="patientGroupTable">
				<tr>
					<b>SAME PATIENT GROUP</b>
				</tr>
				<tr>
					<td class="patientGroupColumn">
						<!-- note: max multiple entries of same patient;
							if reached, send request to server to clear -->
						<span id="groupPatientName1" style="display:none"></span>
						<span id="groupPatientName2" style="display:none"></span>
						<span id="groupPatientName3" style="display:none"></span>
						<span id="groupPatientName4" style="display:none"></span>
						<span id="groupPatientName5" style="display:none"></span>
					</td>
				</tr>
					<td>
						<button onclick="myClearFunction()" class="Button-clear" id="clearButtonId">CLEAR</button>
					</td>
				<tr>
				</tr>	
			</table>
		</td>
	</tr>
	<br/>

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