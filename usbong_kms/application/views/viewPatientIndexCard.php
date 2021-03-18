<!--
  Copyright 2020~2021 USBONG SOCIAL SYSTEMS, INC. (USBONG)
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  @author: Michael Syson
  @date created: 20200818
  @date updated: 20210318

  Input:
  1) Laboratory Request Form (.csv format) at the Marikina Orthopedic Specialty Clinic (MOSC)
  Output:
  1) Laboratory Request Form that is viewable on a Computer Web Browser  
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewCSVFileMOSCLabRequestForm.php   
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
							width: 860px; /*860px;*/ /* 802px;*//* 670px */
							
							/* use zoom 67% (prev) scale*/
							zoom: 90%; /* at present, command not supported in Mozilla Firefox */				
							transform: scale(0.90);
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
		
						img.Image-indexCard {
							max-width: 100%;
							height: auto;
							float: left;
							text-align: center;
							padding-left: 0px;
							padding-top: 0px;
						}
		
						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						input.inputText
						{
							font-size: 12pt;						
						}

						input.browse-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
						}	

						table.formTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}				

						table.bottomSectionTable
						{
							width: 100%;
						}

						tr.rowEvenNumber {
							background-color: #dddddd; <!--#dddddd; = gray #95b3d7; = sky blue; use as row background color-->
							border: 1pt solid #00ff00;		
						}

						td.tableHeaderColumn
						{
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
							text-align: left;
							font-weight: bold;							
							width: 20%; <!-- 17%; --> <!-- 84% -->
						}						

						td.addressAnswerColumn
						{
							width: 25%; <!-- 84% -->
						}						

						td.postalAddressAnswerColumn
						{
							width: 10%;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}						

						td.columnField
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
						}						

						td.columnName
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
						}						

						td.columnNumber
						{
							border: 1px dotted #ab9c7d;		
							text-align: right;
						}						

						td.columnFieldNameAge
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
							width: 25%;
						}					

						td.columnTableHeader
						{
							font-weight: bold;
							background-color: #00ff00; 
							border: 1px dotted #ab9c7d;		
							text-align: center;
						}		

						td.columnTableHeaderFee
						{
							font-weight: bold;
							background-color: #00ff00;
							border: 1px dotted #ab9c7d;		
							text-align: center;
							width: 13%;
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
						
						td.columnTableHeaderDate
						{
							padding-left: 0px;
							text-align: left;
							width: 26%;
						}						

						td.columnTableHeaderIndexCard
						{
							font-weight: bold;
							text-align: right;
							width: 26%;
						}						

						td.imageColumn
						{
							width: 40%;
							display: inline-block;
						}						

						td.pageNameColumn
						{
							width: 59%; /*50%*/
							display: inline-block;
							text-align: right;
						}						

						td.formDateColumn
						{
							width: 50%;
							text-align: right;
						}												

						td.requestingPhysicianNameColumn
						{
							width: 100%; /*90%*/
							display: inline-block;
							text-align: right;
						}						

						div.checkBox
						{
							border: 1.5pt solid black; height: 14pt; width: 14pt;
							text-align: center;
							float: left
						}

						<!-- added by Mike, 20210209 -->
						input.inputCheckBox
						{
							border: 1.5pt solid black; height: 14pt; width: 14pt;
							text-align: center;
							float: left;
						}

						/* added by Mike, 20210210 */
						input[type=checkbox]
						{
						  /* Double-sized Checkboxes */
						  -ms-transform: scale(1.7); /* IE */
						  -moz-transform: scale(1.7); /* FF */
						  -webkit-transform: scale(1.7); /* Safari and Chrome */
						  -o-transform: scale(1.7); /* Opera */
						  transform: scale(1.7);
						  padding: 10px;
						}						

						/* added by Mike, 20210210 */
						input[type=checkbox]:focus-within
						{
							outline :2px solid #0011f1; //blue
						}

						input.inputAgeTextBox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 0px;
							font-size: 18px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							text-align: right;
							width: 30%;
						}

						/* added by Mike, 20210210 */
/* removed by Mike, 20210307						
						input[type=tel]:focus 
						{
							/*color:#0011f1;*/
							border: 1.7px solid #0011f1; /*black;*/
*/						}
						

/*
						input.inputText {
							background-color: #fCfCfC;
							color: #68502b;
							padding: 0px;
							font-size: 16px;
							border: 1px solid #68502b;
							border-radius: 3px;	    	    
							text-align: left;
							width: 98%;
						}

						input[type=text]:focus 
						{
							/*color:#0011f1;*/
							border: 1.7px solid #0011f1; /*black;*/
						}
*/

						div.buttonSubmitUpdate
						{
							font-size: 16px;
/*							//removed by Mike, 20210210
							font-weight: bold;
*/
						}

						select.medicalDoctorSelect
						{
							font-size: 12pt;
							text-align: right;							
						}
						
						option.medicalDoctorOption
						{
							font-size: 12pt;
						}											
						
<!-- added by Mike, 20210210 -->
<!-- Reference: https://stackoverflow.com/questions/7291873/disable-color-change-of-anchor-tag-when-visited; 
	last accessed: 20200321
	answer by: Rich Bradshaw on 20110903T0759
	edited by: Peter Mortensen on 20190511T2239
-->
						a {color:#0011f1;}         /* Unvisited link  */
						a:visited {color:#0011f1;} /* Visited link    */
						a:hover {color:#0011f1;}   /* Mouse over link */
						a:active {color:#593baa;}  /* Selected link */												

    /**/
    </style>
    <title>
      MARIKINA ORTHOPEDIC SPECIALTY CLINIC (MOSC): INDEX CARD
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
		//added by Mike, 20210211
		function myPopupFunction(patientId) {	
			//edited by Mike, 20200522
			//note: if the unit member selects an option that is not the default, the computer server receives a blank value
			//var medicalDoctorId = document.getElementById("medicalDoctorIdParam").value;
			var medicalDoctorId = document.getElementById("medicalDoctorIdParam").selectedIndex;			
			var sexId = document.getElementById("selectSexIdParam").selectedIndex;			
			var ageUnitId = document.getElementById("selectAgeUnitIdParam").selectedIndex;			

//			alert("medicalDoctorId"+medicalDoctorId);
			//0 = ANY; SUMMARY = 3
			if ((medicalDoctorId==0) || (medicalDoctorId==3)) {
				alert("Pumili ng Medical Doctor na hindi \"ANY\" o \"SUMMARY\".");
				return;
			}

//			alert("sexId"+sexId);
//			alert("ageUnitId"+ageUnitId);

			var iInputCheckBoxCount=0;
			var iInputCheckBoxCountMax=40;
			
			//note: this does not update hidden input value sent via form POST command
//			document.getElementById("inputSelectSexNameParam").value = sexId;

/*
			window.location.href = "<?php echo site_url('browse/addTransactionServicePurchase/"+medicalDoctorId+"/"+patientId+"/"+professionalFee+"/"+xRayFee+"/"+labFee+"/"+classification+"/"+notes+"');?>";
*/			
		}		  
	  </script>
  <body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');
	
	//edited by Mike, 20200726
	//$dateToday = (new DateTime())->format('Y-m-d');
	$dateToday = Date('Y-m-d');

	// connect to the database
//	include('usbong-kms-connect.php');
//	$mysqli->set_charset("utf8");
	
	//edited by Mike, 20210206
//	$filename="C:\\xampp\\htdocs\\usbong_kms\\kasangkapan\\phantomjs-2.1.1-windows\\bin\\output\\2015\\201505~201507.csv";
//edited by Mike, 20210208
//update file location
//	$filename="G:\\Usbong MOSC\\Everyone\\Information Desk\\Laboratory\\templates\\MOSCLabRequestForm.csv";

//edited by Mike, 20210209
//	$filename="D:\\Usbong\\LABORATORY\\templates\\MOSCLabRequestForm.csv";
	$filename="C:\\xampp\\htdocs\\usbong_kms\\usbongTemplates\\MOSCIndexCard.csv";
	
	//added by Mike, 20210208
	$iCheckboxCount=0;
	
	//added by Mike, 20210209
	$iCount = 1;
	$value = $result[0];
	
?>
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				Search Patient<br/>
				@INDEX CARD PAGE
			</h2>		
		</td>
	  </tr>
	</table>
	<br/>
	<!-- Form -->
	<form id="browse-form" method="post" action="<?php echo site_url('browse/confirmPatient')?>">
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
	<br/>
	<table>
		<tr>
			<td class="columnTableHeaderDate">
				<b>DATE: </b><?php echo strtoupper(date("Y-m-d, l"));?>
			</td>
			<td class="columnTableHeaderIndexCard">
					<a href='<?php echo site_url('browse/viewPatientIndexCard/'.$result[0]['patient_id'])?>' id="viewPatientIndexCard">
						<div class="patientName">
		<?php
						//echo $value['patient_name'];
	//					echo str_replace("ï¿½","Ã‘",$value['patient_name']);
						echo "INDEX CARD"
		?>		
						</div>								
					</a>
			</td>
		</tr>
	</table>


<!-- added by Mike, 20210209 -->
<!-- TO-DO: -add: lab request list for the day -->
<!-- Form -->
<form id="indexCardId" method="post" action="<?php echo site_url('browse/confirmUpdateIndexCardForm/'.$result[0]['patient_id'])?>">
<!--
<form id="indexCardId" method="post">
-->
	<?php 
		//edited by Mike, 20200518
		if ($result[0]["medical_doctor_name"]==""){
//			echo "<br/>There are no transactions for the day.";

			//default value
			$result[0]["medical_doctor_name"] = 1; //SYSON, PEDRO
		}

/*			echo "<b>MEDICAL DOCTOR: </b>".$result[0]["medical_doctor_name"];		
*/
			echo "<b>MEDICAL DOCTOR: </b>";		
?>			

<!-- +updated: this -->
<!--
			<select id="medicalDoctorIdParam">
			  <option value="1">SYSON, PEDRO</option>
			  <option value="2">SYSON, PETER</option>
			  <option value="3">REJUSO, CHASTITY AMOR</option>
			</select>						
-->
<?php			

			if (isset($medicalDoctorId)) {
			}
			else {
				$medicalDoctorId = $result[0]["medical_doctor_id"];
			}
			
			//edited by Mike, 20210318
			//echo "<select id='medicalDoctorIdParam'>"
			echo "<select id='medicalDoctorIdParam' name='selectMedicalDoctorNameParam'>";			
				foreach ($medicalDoctorList as $medicalDoctorValue) {
				  //edited by Mike, 20200523
				  //TO-DO: -update: this
/*				  
				  if (($medicalDoctorValue["medical_doctor_id"]=="0") || (($medicalDoctorValue["medical_doctor_id"]=="3"))) {
				  }
				  else {
*/					  
	//				  if ($result[0]["medical_doctor_id"]==$medicalDoctorValue["medical_doctor_id"]) {					  
					  if (isset($medicalDoctorId) and ($medicalDoctorValue["medical_doctor_id"]==$medicalDoctorId)) {
						echo "<option value='".$medicalDoctorValue["medical_doctor_id"]."' selected='selected'>".$medicalDoctorValue["medical_doctor_name"]."</option>";
					  }			  	  
	/*
					  else if ($result[0]["medical_doctor_id"]==$medicalDoctorValue["medical_doctor_id"]) {
						echo "<option value='".$medicalDoctorValue["medical_doctor_id"]."' selected='selected'>".$medicalDoctorValue["medical_doctor_name"]."</option>";
					  }				  
	*/				  
					  else {
						echo "<option value='".$medicalDoctorValue['medical_doctor_id']."'>".$medicalDoctorValue["medical_doctor_name"]."</option>";			  
					  }				
				   }
/*
				}
*/				
			echo "</select>";
	?>
	<br/>
<?php
/*
    echo "<b>MARIKINA ORTHOPEDIC SPECIALTY CLINIC</b><br/>";
    echo "<b>OUT-PATIENT ORTHOPEDICS, X-RAY, PHYSICAL AND OCCUPATION THERAPY</b><br/>";
    echo "<b>#2 E. MANALO AVE., STO. NIÑO, 1820, MARIKINA CITY, PHILIPPINES</b><br/>";
    echo "<b>TEL. NO. (8) 941-4888; MONDAY - SATURDAY; 9:00 A.M. -  5:00 P.M.</b><br/>";
*/

//removed by Mike, 20210209
//	echo "<table>";

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
//echo "<br/>";
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
				
				if (is_numeric($cellValue)) {
					if ((strpos($cellValue,"#")!==false)) {
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
						$cellValue = number_format($cellValue, 2, '.', ',');
					}
					echo "<td class='column' style='text-align:right'><b>".$cellValue."</b></td>";
				}
				else {

//					if (($iColumnCount+1<count($data)) and ((utf8_encode($data[$iColumnCount+1]))=="TOTAL")) {
/*	//removed by Mike, 20210208					
					if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="DATE")) {
					echo "<td class='column' style='text-align:center'>".strtoupper(date('Y-m-d, l'))."</td>";
					}						
					else {
*/					
						//edited by Mike, 20210206
						//$cellValue=str_replace("?", "<div class='checkBox'></div>",$cellValue);
						if (strpos($cellValue,"?")!==false) {							
							//edited by Mike, 20210209
//							$cellValue=str_replace("?", "<input type='checkBox' id='".$iCheckboxCount."'>",$cellValue);

//edited by Mike, 20210211
//							$cellValue=str_replace("?", "<input class='inputCheckBox' type='checkBox' id='".$iCheckboxCount."'>",$cellValue);
//							$cellValue=str_replace("?", "<input class='inputCheckBox' type='checkBox' name='1'>",$cellValue);
							$cellValue=str_replace("?","",$cellValue);

//echo $iCheckboxCount.": ".$cellValue."<br/>";
//removed by Mike, 20210213
//echo $cellValue."<br/>";

//							$cellValue="<input class='inputCheckBox' type='checkBox' name='1' form='indexCardId'>".$cellValue;
//							$cellValue="<input class='inputCheckBox' type='checkBox' name='".$iCheckboxCount."'>".$cellValue;
							$cellValue="<input class='inputCheckBox' type='checkBox' name='inputCheckBox".$iCheckboxCount."'>".$cellValue;


							//added by Mike, 20210211
/* //removed by Mike, 20210211							
							if (strpos($cellValue, "OTHERS:")!==false) {
								$cellValue=$cellValue;
							}
*/							
							$iCheckboxCount=$iCheckboxCount+1;
						}

						//added by Mike, 20210209
						if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="PHYSICIAN")) {							
							if ($result[0]["medical_doctor_name"]==""){							
								//default value
								//edited by Mike, 20210212
								//$result[0]["medical_doctor_name"] = "SYSON, PEDRO (DEFAULT)";
								$cellValue="SYSON, PEDRO (DEFAULT)";
							}
							else {
								$cellValue=$result[0]["medical_doctor_name"];
							}
						}
						//added by Mike, 20210306
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="PATIENT NAME")) {						
						$cellValue="<a href='".site_url('browse/viewPatient/'.$value['patient_id'])."' id='viewPatientId'>
							<div class='patientName'>".
								str_replace('ï¿½','Ã‘',$value['patient_name'])."
							</div>								
						</a>";
?>
		<input type="hidden" name="patientIdNameParam" value="<?php echo $value['patient_id'];?>" form="indexCardId">
<?php
						}
						//added by Mike, 20210211
						else if ((utf8_encode($data[$iColumnCount])=="OTHERS ANSWER")) {
							$cellValue=str_replace("OTHERS ANSWER","<input class='inputText' type='text' id='inputTextOthersAnswerId' name='inputTextOthersAnswerNameParam' form='indexCardId'>",$cellValue);
						}
						
/*	//removed by Mike, 20210210
						//added by Mike, 20210210
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="ADDRESS")) {
							//TO-DO: -add: patient address in patient table of MySQL database

//							$cellValue="<textarea class='inputText' rows='3' id='inputTextAddressId' form ='indexCardId'></textarea>";


							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
						else if (($iColumnCount-2>=0) and (utf8_encode($data[$iColumnCount-2])=="ADDRESS")) {
							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
						else if (($iColumnCount-3>=0) and (utf8_encode($data[$iColumnCount-3])=="ADDRESS")) {
							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
*/						

						//added by Mike, 20210306
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="PWD/SENIOR")) {						
							$cellValue="<input class='inputText' type='text' id='inputTextPwdSeniorId' name='inputTextPwdSeniorIdNameParam' placeholder='IDENTIFICATION' form='indexCardId'>";
						}
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="CIVIL STATUS")) {
							$cellValue="<select id='selectCivilStatusIdParam' name='selectCivilStatusNameParam' form='indexCardId'>";
							
							  if (isset($result[0]["civil_status_id"])) {
								  if ($result[0]["sex_id"]==0) {
									$cellValue=$cellValue."<option value='0' selected='selected'>SINGLE</option>
									<option value='1'>MARRIED</option>
									<option value='2'>WIDOWED</option>
									<option value='3'>SEPARATED</option>";
								  }
								  else if ($result[0]["sex_id"]==1) {
									$cellValue=$cellValue."<option value='0'>SINGLE</option>
									<option value='1' selected='selected'>MARRIED</option>
									<option value='2'>WIDOWED</option>
									<option value='3'>SEPARATED</option>";
								  }
								  else if ($result[0]["sex_id"]==2) {
									$cellValue=$cellValue."<option value='0'>SINGLE</option>
									<option value='1'>MARRIED</option>
									<option value='2' selected='selected'>WIDOWED</option>
									<option value='3'>SEPARATED</option>";
								  }
//								  else if ($result[0]["sex_id"]==3) {
								  else {
									$cellValue=$cellValue."<option value='0'>SINGLE</option>
									<option value='1'>MARRIED</option>
									<option value='2'>WIDOWED</option>
									<option value='3' selected='selected'>SEPARATED</option>";
								  }								  
							  }			  	  
							  else {
								$cellValue=$cellValue."<option value='0' selected='selected'>SINGLE</option>
								<option value='1'>MARRIED</option>
								<option value='2'>WIDOWED</option>
								<option value='3'>SEPARATED</option>";
							  }				
							$cellValue=$cellValue."</select>";
						}
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="OCCUPATION")) {						
							$cellValue="<input class='inputText' type='text' id='inputTextOccupationId' name='inputTextOccupationIdNameParam' form='indexCardId'>";
						}
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="BIRTHDAY")) {
							$cellValue="<input class='inputText' type='date' id='inputTextBirthdayId' name='inputTextBirthdayIdNameParam' form='indexCardId'>";
						}
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="CONTACT#")) {						
							$cellValue="<input class='inputText' type='tel' id='inputTextContactNumberId' name='inputTextContactNumberIdNameParam' form='indexCardId'>";
						}

						//note: another set of if-then, if-else statements
						if (strpos($cellValue,"SEX")!==false) {					
							echo "<td class='columnField'><b>".$cellValue;
							echo "<select id='selectSexIdParam' name='selectSexNameParam' form='indexCardId'>";
							
							//note: no echo output after select command
?>
<!-- edited by Mike, 20210212 -->
<!--
							<select id='selectSexIdParam' name='selectSexNameParam' form='indexCardId'>
							  <option value='0'>MALE</option>
							  <option value='1'>FEMALE</option>
-->
<?php							
//							for ($iCount=0; $iCount<2; $iCount++) {
							  if (isset($result[0]["sex_id"])) {
								  if ($result[0]["sex_id"]==0) {
									echo "<option value='0' selected='selected'>MALE</option>";
									echo "<option value='1'>FEMALE</option>";
								  }
								  else {
									echo "<option value='0'>MALE</option>";
									echo "<option value='1' selected='selected'>FEMALE</option>";
								  }
							  }			  	  
							  else {
									echo "<option value='0'>MALE</option>";			  							
									echo "<option value='1'>FEMALE</option>";			  														
							  }				
//						   }
?>
							</select>
							
							<!-- added by Mike, 20210211 -->
<!--							
							<input type='hidden' name='inputSelectSexNameParam' value='20'>
-->							
<?php
							echo "</b></td>";

						}
						//added by Mike, 20210209
						//TO-DO: -add: birthday to auto-compute age
						else if (strpos($cellValue,"AGE")!==false) {							
							echo "<td class='columnFieldNameAge'><b>".$cellValue."</b>";
?>
<!-- edited by Mike, 20210210 -->
<!--
							<input type="tel" id="inputAgeId" class="inputAgeTextBox no-spin" value="1" min="1" max="999">
-->

<!--	//edited by Mike, 20210212
							<input type="tel" id="inputAgeId" name="inputAgeNameParam" class="inputAgeTextBox no-spin" placeholder="hal.10" value="" min="1" max="999" required>
-->
							<input type="tel" id="inputAgeId" name="inputAgeNameParam" class="inputAgeTextBox no-spin" placeholder="hal.10" value="<?php echo $result[0]["age"];?>" min="1" max="999" required>

							
<!--	//edited by Mike, 20210212
							<select id='selectAgeUnitIdParam' name='selectAgeUnitNameParam'>
							  <option value='0'>YRS</option>
							  <option value='1'>MOS</option>
							</select>
-->

<?php							
							echo "<select id='selectAgeUnitIdParam' name='selectAgeUnitNameParam'>";

							  if (isset($result[0]["age_unit"])) {
								  if ($result[0]["age_unit"]==0) {
									echo "<option value='0' selected='selected'>YRS</option>";
									echo "<option value='1'>MOS</option>";
								  }
								  else {
									echo "<option value='0'>YRS</option>";
									echo "<option value='1' selected='selected'>MOS</option>";
								  }
							  }			  	  
							  else {
									echo "<option value='0'>YRS</option>";
									echo "<option value='1'>MOS</option>";			
							  }				

							echo "</select>";
?>

<?php
							echo "</td>";

						}
						else if (strpos($cellValue,"PHYSICIAN")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
/*	//removed by Mike, 20210307						
						//added by Mike, 20210210
						else if (strpos($cellValue,"ADDRESS")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
*/						
						//added by Mike, 20210306
						else if (strpos($cellValue,"PATIENT NAME")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}						
						//added by Mike, 20210307
						else if (strpos($cellValue,"LOCATION")!==false) {
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextLocationAddressId' name='inputTextLocationAddressIdNameParam'
									placeholder='LOCATION'
									form='indexCardId'>
									</input>
								  </td>";
						}						
						else if (strpos($cellValue,"BARANGAY")!==false) {
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextBarangayAddressId' name='inputTextBarangayAddressIdNameParam'
									placeholder='BARANGAY'
									form='indexCardId'>
									</input>
								  </td>";
						}						
						else if (strpos($cellValue,"POSTAL")!==false) {
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextPostalAddressId' name='inputTextPostalAddressIdNameParam'
									placeholder='POSTAL'
									form='indexCardId'>
									</input>
								  </td>";
						}						
						else if (strpos($cellValue,"PROVINCE/CITY/PH")!==false) {
							echo "<td class='columnField'>
									<input class='inputText' type='text' id='inputTextProvinceCityPhAddressId' name='inputTextProvinceCityPhAddressIdNameParam'
									placeholder='PROVINCE/CITY/PH'
									form='indexCardId'>
									</input>
								  </td>";
						}
/* //removed by Mike, 20210307						
						//added by Mike, 20210307
						else if (strlen(trim($cellValue))!=0) {						
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
*/
						else {
							//blank space HTML command: "&nbsp;"
							echo "<td class='columnField'><b>".$cellValue."</b></td>";
						}


//removed by Mike, 20210209
/*						//blank space HTML command: "&nbsp;"
						echo "<td class='columnFieldName'><b>".$cellValue."</b></td>";
*/						
						
/*	//removed by Mike, 20210208					
					}
*/					
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
	<table class="bottomSectionTable">
	  <tr>
		  <td class="requestingPhysicianNameColumn">
			<br/>			
			<!-- Buttons -->
<!--
			<button type="submit" onclick="myPopupFunction(<?php echo $value['patient_id'];?>)">
-->			
			<button type="submit">			
				<div class="buttonSubmitUpdate">Update</div>
			</button>
		  </td>
	  </tr>
	</table>	
</form>
<!-- removed by Mike, 20210314
	<br />		
	<div>***NOTHING FOLLOWS***</div>
	<br />
-->

<!-- added by Mike, 20210316 -->
		<h3>Patient Index Card History</h3>

<?php
		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultIndexCardImageList)) and ($resultIndexCardImageList!=False)) {
				$resultCount = count($resultIndexCardImageList);
			}

			//item purchase history			
			if ($resultCount==0) {				
				echo '<div>';					
				echo 'There are no transactions.';
				echo '</div>';					
			}
			else {
//				$resultCount = count($resultPaid);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($resultIndexCardImageList).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($resultIndexCardImageList).'</b> results found.</div>';			
				}			
				echo '<br/>';

				foreach ($resultIndexCardImageList as $indexCardImageListValue) {				
			
					echo "<table class='search-result'>";

					//add: table headers
	?>				
					  <tr class="row">
						<td class="column">
							<img class="Image-indexCard" src="<?php echo base_url($indexCardImageListValue['image_filename']);?>">		

							<?php
								echo $indexCardImageListValue['image_filename'];
							?>

						</td>
					  </tr>
	<?php
				}
				
				echo "</table>";
			}
		}
?>
		<br/>
		<form id="myFormId" enctype="multipart/form-data" method="post" action="<?php echo site_url('image/confirmStoreIndexCardImage/'.$value['transaction_id'].'/'.$value['patient_id'])?>">
			<input type="hidden" name="reportTypeNameParam" value="Report Image">
			<input style="font-size: 16px;" id="uploadFilesId" name="reportParamUploadFiles[]" type="file" multiple="multiple" accept="image/*" onInput="showAlert();"/>
		</form>

		<script language="javascript" type="text/javascript">
			function showAlert() {
				document.getElementById('myFormId').submit();
	//			alert("Hey there!" + document.getElementById("uploadFilesId").value);
			}
		</script>

		<br/>
		<br/>
		
<?php	
		echo '<h3>Patient Purchased Medicine Item History</h3>';

		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultPaidMedItem)) and ($resultPaidMedItem!=False)) {
				$resultCount = count($resultPaidMedItem);
			}

			//item purchase history			
			if ($resultCount==0) {				
				echo '<div>';					
				echo 'There are no transactions.';
				echo '</div>';					
			}
			else {
//				$resultCount = count($resultPaid);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($resultPaidMedItem).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($resultPaidMedItem).'</b> results found.</div>';			
				}			
				echo '<br/>';
			
				echo "<table class='search-result'>";

				//add: table headers				
?>				
					  <tr class="row">
						<td class="columnTableHeader">				
				<?php
							echo "DATE";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "COUNT";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class="columnTableHeaderFee">				
							<?php
								echo "FEE"; //"ITEM FEE, i.e. discounted price, set price";
							?>
						</td>						
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "QTY";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "TOTAL";
							?>
						</td>
					  </tr>
<?php				
				  $iCount=1;
				  $iCountForTheDay=0;
				  $sCurrentTransactionDate="";

				  foreach ($resultPaidMedItem as $value) {
/* //removed by Mike, 20210314					  
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  
*/					
		?>						
					  <tr class="row">
						<td class="column">				
							<?php
//								echo $value['transaction_date'];

					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
//					  echo $value['transaction_date'];
					  echo date('Y-m-d', strtotime($value['transaction_date']));
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  

							?>
						</td>
						<td class="column">				
							<?php
								echo $iCountForTheDay;
							?>
						</td>

						<td class="columnName">				
							<a href='<?php echo site_url('browse/viewItemMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class="columnNumber">		
								<!-- edited by Mike, 20200912 
								<input type="hidden" id="feeParam" value="<?php echo $value['item_price']?>">
								</input>
-->								
								<input type="hidden" value="<?php echo $value['item_price']?>">
								</input>
					
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
						<td>
							x
						</td>
						<td class="columnNumber">				
								<div id="itemQuantityId<?php echo $iCount?>">
							<?php
//								echo floor(($value['fee']/$value['item_price']*100)/100);
//								$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								//edited by Mike, 20200415
								if ($value['fee_quantity']==0) {
//									$iQuantity =  1;
									$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								}
								else {
									$iQuantity =  $value['fee_quantity'];
								}

								echo $iQuantity;
								
//								$iTotalQuantity = $iTotalQuantity + $iQuantity;
							?>
								</div>
						</td>
						<td class="column">				
						=
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
					  </tr>
		<?php				
					$currentItemId = $value['item_id'];					

					$iCount++;		
/*					echo "<br/>";
*/					
				}				

				echo "</table>";				
				echo "<br/>";				
//				echo '<div>***NOTHING FOLLOWS***';	
				echo "<br/>";				
				
				
			}

		}
?>	




<?php	
		echo '<h3>Patient Purchased Non-medicine Item History</h3>';

		if ((!isset($value)) or ($value['transaction_date']=="")) {				
			echo '<div>';					
			echo 'There are no transactions.';
			echo '</div>';					
		}
		else {
			//edited by Mike, 20200406
			$resultCount = 0;

			if ((isset($resultPaidNonMedItem)) and ($resultPaidNonMedItem!=False)) {
				$resultCount = count($resultPaidNonMedItem);
			}

			//item purchase history			
			if ($resultCount==0) {				
				echo '<div>';					
				echo 'There are no transactions.';
				echo '</div>';					
			}
			else {
//				$resultCount = count($resultPaid);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($resultPaidNonMedItem).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($resultPaidNonMedItem).'</b> results found.</div>';			
				}			
				echo '<br/>';
			
				echo "<table class='search-result'>";

				//add: table headers
?>				
					  <tr class="row">
						<td class="columnTableHeader">				
				<?php
							echo "DATE";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "COUNT";
				?>		
						</td>
						<td class="columnTableHeader">				
				<?php
							echo "ITEM NAME";
				?>		
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "PRICE"; //"ITEM PRICE";
							?>
						</td>
						<td class="columnTableHeaderFee">				
							<?php
								echo "FEE"; //"ITEM FEE, i.e. discounted price, set price";
							?>
						</td>						
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "QTY";
							?>
						</td>
						<td class="column">				
						</td>
						<td class="columnTableHeader">				
							<?php
								echo "TOTAL";
							?>
						</td>
					  </tr>
<?php				
				  $iCount=1;
				  $iCountForTheDay=0;
				  $sCurrentTransactionDate="";

				  foreach ($resultPaidNonMedItem as $value) {
/* //removed by Mike, 20210314					  
					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  
*/					
		?>						
					  <tr class="row">
						<td class="column">				
							<?php
//								echo $value['transaction_date'];

					if ($sCurrentTransactionDate==$value['transaction_date']) {
						$iCountForTheDay=$iCountForTheDay+1;
					}
					else {
					  $iCountForTheDay=1;
//					  echo $value['transaction_date'];
					  echo date('Y-m-d', strtotime($value['transaction_date']));
					}
					  
					$sCurrentTransactionDate=$value['transaction_date'];				  

							?>
						</td>
						<td class="column">				
							<?php
								echo $iCountForTheDay;
							?>
						</td>

						<td class="columnName">				
							<a href='<?php echo site_url('browse/viewItemMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>								
							</a>
						</td>
						<td class="columnNumber">		
								<!-- edited by Mike, 20200912 
								<input type="hidden" id="feeParam" value="<?php echo $value['item_price']?>">
								</input>
-->								
								<input type="hidden" value="<?php echo $value['item_price']?>">
								</input>
					
								<div id="itemPriceId<?php echo $iCount?>">
							<?php
								echo $value['item_price'];
							?>
								</div>
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
						<td>
							x
						</td>
						<td class="columnNumber">				
								<div id="itemQuantityId<?php echo $iCount?>">
							<?php
//								echo floor(($value['fee']/$value['item_price']*100)/100);
//								$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								//edited by Mike, 20200415
								if ($value['fee_quantity']==0) {
//									$iQuantity =  1;
									$iQuantity =  floor(($value['fee']/$value['item_price']*100)/100);
								}
								else {
									$iQuantity =  $value['fee_quantity'];
								}

								echo $iQuantity;
								
//								$iTotalQuantity = $iTotalQuantity + $iQuantity;
							?>
								</div>
						</td>
						<td class="column">				
						=
						</td>
						<td class="columnNumber">				
								<div id="feeId<?php echo $iCount?>">
							<?php
								echo $value['fee'];
								
//								$dTotalFee = $dTotalFee + $value['fee'];
							?>
								</div>
						</td>
					  </tr>
		<?php				
					$currentItemId = $value['item_id'];					

					$iCount++;		
/*					echo "<br/>";
*/					
				}				

				echo "</table>";				
				echo "<br/>";				
//				echo '<div>***NOTHING FOLLOWS***';	
				echo "<br/>";				
				
				
			}

		}
?>	
	<br/>
	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>