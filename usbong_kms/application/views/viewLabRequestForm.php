<!--
  Copyright 2020~2021 USBONG SOCIAL SYSTEMS, INC. (USBONG)
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  @author: Michael Syson
  @date created: 20200818
  @date updated: 20210212

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
							width: 860px;/* 802px;*//* 670px */
							
							/* use zoom 67% (prev) scale*/
							zoom: 90%; /* at present, command not support in Mozilla Firefox */				
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
						
						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.formTable
						{
							width: 100%; //90%
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

						td.columnFieldNameAge
						{
							border: 1px dotted #ab9c7d;		
							text-align: left;
							width: 25%;
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
						input[type=tel]:focus 
						{
							/*color:#0011f1;*/
							border: 1.7px solid #0011f1; /*black;*/
						}

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

						/* added by Mike, 20210210 */
						input[type=text]:focus 
						{
							/*color:#0011f1;*/
							border: 1.7px solid #0011f1; /*black;*/
						}

						div.buttonSubmit
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
      MARIKINA ORTHOPEDIC SPECIALTY CLINIC (MOSC): LABORATORY UNIT
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
	$filename="C:\\xampp\\htdocs\\usbong_kms\\usbongTemplates\\MOSCLabRequestForm.csv";
	
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
			<h3>
				MARIKINA ORTHOPEDIC SPECIALTY CLINIC<br/>
				LABORATORY UNIT
			</h3>		
		</td>
	  </tr>
	</table>

	<table class="formTable">
	  <tr>
		<td>
			<h3>REQUEST FORM</h3>
		</td>
		<td class="formDateColumn">
			<h3>DATE: <?php
					echo strtoupper(date('Y-m-d, l'));
				 ?>
			</h3>
		</td>
	  </tr>
</table>
<!-- added by Mike, 20210209 -->
<!-- TO-DO: -add: lab request list for the day -->
<!-- Form -->
<form id="labRequestFormId" method="post" action="<?php echo site_url('browse/confirmLabRequestForm')?>">
<!--
<form id="labRequestFormId" method="post">
-->
<table>
	<tr>
		<td class="tableHeaderColumn">
			PATIENT NAME:
		</td>
		<td>
<!--
		<a href='<?php echo site_url('browse/confirmPatientLabUnit/'.str_replace("ï¿½","Ã‘",$value['patient_name']))?>' id="viewPatientId<?php echo $iCount?>">
-->
		<a href='<?php echo site_url('browse/confirmPatientLabUnit/'.$value['patient_id'])?>' id="viewPatientId<?php echo $iCount?>">
			<div class="patientName">
		<?php
			//TO-DO: -update: this
			//echo $value['patient_name'];
			echo str_replace("ï¿½","Ã‘",$value['patient_name']);
		?>		
			</div>								
		</a>

		<!-- added by Mike, 20210212 -->
		<input type="hidden" name="patientIdNameParam" value="<?php echo $value['patient_id'];?>" form="labRequestFormId">

		</td>
	</tr>
<!-- removed by Mike, 20210211 -->
<!--
	<tr>
		<td class="tableHeaderColumn">
			ADDRESS:
		</td>
		<td class="addressAnswerColumn">
			<input class='inputText' type='text' name='inputTextLocationAddressName' placeholder='LOCATION' required>
		</td>
		<td class="addressAnswerColumn">
			<input class='inputText' type='text' name='inputTextBarangayAddressName' placeholder='BARANGAY' required>
		</td>
		<td class="addressAnswerColumn">
			<input class='inputText' type='text' name='inputTextProvinceCityPhAddressName' placeholder='PROVINCE・CITY・PH' required>
		</td>
		<td class="postalAddressAnswerColumn">
			<input class='inputText' type='text' name='inputTextPostalAddressName' placeholder='POSTAL' required>
		</td>
	</tr>
-->	
</table>	

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

//							$cellValue="<input class='inputCheckBox' type='checkBox' name='1' form='labRequestFormId'>".$cellValue;
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
								$result[0]["medical_doctor_name"] = "SYSON, PEDRO (DEFAULT)";
							}
							else {
								$cellValue=$result[0]["medical_doctor_name"];
							}
						}
						//added by Mike, 20210211
						else if ((utf8_encode($data[$iColumnCount])=="OTHERS ANSWER")) {
							$cellValue=str_replace("OTHERS ANSWER","<input class='inputText' type='text' id='inputTextOthersAnswerId' name='inputTextOthersAnswerName' form='labRequestFormId'>",$cellValue);
						}
						
/*	//removed by Mike, 20210210
						//added by Mike, 20210210
						else if (($iColumnCount-1>=0) and (utf8_encode($data[$iColumnCount-1])=="ADDRESS")) {
							//TO-DO: -add: patient address in patient table of MySQL database

//							$cellValue="<textarea class='inputText' rows='3' id='inputTextAddressId' form ='labRequestFormId'></textarea>";


							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
						else if (($iColumnCount-2>=0) and (utf8_encode($data[$iColumnCount-2])=="ADDRESS")) {
							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
						else if (($iColumnCount-3>=0) and (utf8_encode($data[$iColumnCount-3])=="ADDRESS")) {
							$cellValue="<input class='inputText' type='text' id='inputTextAddressId'></textarea>";
						}
*/						
						
						if (strpos($cellValue,"SEX")!==false) {							
							echo "<td class='columnField'><b>".$cellValue;

?>
							<select id='selectSexIdParam' name='selectSexNameParam' form='labRequestFormId'>
							  <option value='0'>MALE</option>
							  <option value='1'>FEMALE</option>
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
							<input type="tel" id="inputAgeId" name="inputAgeNameParam" class="inputAgeTextBox no-spin" placeholder="hal.10" value="" min="1" max="999" required>
							<select id='selectAgeUnitIdParam' name='selectAgeUnitNameParam'>
							  <option value='0'>YRS</option>
							  <option value='1'>MOS</option>
							</select>

<?php
							echo "</td>";

						}
						else if (strpos($cellValue,"PHYSICIAN")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
						//added by Mike, 20210210
						else if (strpos($cellValue,"ADDRESS")!==false) {
							echo "<td class='tableHeaderColumn'>".$cellValue."</td>";
						}
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
	<br />	
	<table class="bottomSectionTable">
	  <tr>
		<td class="requestingPhysicianNameColumn">
			<b>REQUESTING PHYSICIAN</b>
		</td>
	  </tr>
	  <tr>
		<!-- added by Mike, 20210209 -->
		<td class="requestingPhysicianNameColumn">
	<?php 
		if ($result[0]["medical_doctor_name"]==""){
//			echo "<br/>There are no transactions for the day.";

			//default value
			$result[0]["medical_doctor_name"] = 1; //SYSON, PEDRO
		}
?>			

<!-- +updated: this -->
<!--
			<select id="medicalDoctorIdParam">
			  <option value="1">SYSON, PEDRO</option>
			  <option value="2">SYSON, PETER</option>
			  <option value="3">REJUSO-MORALES, CHASTITY AMOR</option>
			</select>						
-->
<?php			

			if (isset($medicalDoctorId)) {
			}
			else {
				$medicalDoctorId = $result[0]["medical_doctor_id"];
			}
			
			//edited by Mike, 20210212
//			echo "<select class='medicalDoctorSelect' id='medicalDoctorIdParam'>";			
			echo "<select class='medicalDoctorSelect' id='medicalDoctorIdParam' name='selectMedicalDoctorNameParam' form='labRequestFormId'>";			
				foreach ($medicalDoctorList as $medicalDoctorValue) {
					  if (isset($medicalDoctorId) and ($medicalDoctorValue["medical_doctor_id"]==$medicalDoctorId)) {
						echo "<option class='medicalDoctorOption' value='".$medicalDoctorValue["medical_doctor_id"]."' selected='selected'>".$medicalDoctorValue["medical_doctor_name"]."</option>";
					  }			  	  
					  else {
						echo "<option class='medicalDoctorOption' value='".$medicalDoctorValue['medical_doctor_id']."'>".$medicalDoctorValue["medical_doctor_name"]."</option>";			  
					  }				
				   }
			echo "</select>";
	?>		
		</td>
	  </tr>
	  <!-- added by Mike, 20210209 -->
	  <tr>
		  <td class="requestingPhysicianNameColumn">
			<br/>			
			<!-- Buttons -->
<!--
			<button type="submit" onclick="myPopupFunction(<?php echo $value['patient_id'];?>)">
-->			
			<button type="submit">			
				<div class="buttonSubmit">Submit</div>
			</button>
		  </td>
	  </tr>
	</table>	
</form>

	<br />		
	<div>***NOTHING FOLLOWS***</div>
	<br />
	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>