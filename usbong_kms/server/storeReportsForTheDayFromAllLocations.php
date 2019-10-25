<?php
/*
  Copyright 2019 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20191022
  @date updated: 20191024

  Given:
  1) List with the details of the reports for the day from all locations

  Output:
  1) Automatically connect to the database (DB) and store the reports in the DB  
*/
?>
<font size="24">
<?php
	// connect to the database
	include('usbong-kms-connect.php');

	//added by Mike, 20191010
	//main PHP charset
//	mb_internal_encoding('UTF-8');
//	header('Content-Type: application/json; Charset=UTF-8');
	
	$mysqli->set_charset("utf8");
//	$mysqli->set_charset("utf8mb4");
/*			
    if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
            printf("Current character set: %s\n", $mysqli->character_set_name());
    }
*/	
?>	
	<h2>
		Store Reports for the Day from All Locations
	</h2>
	<br/>
		Pakipili ang lahat ng mga report mula sa mga ito:<br/>
		1) MOSC<br/>
		2) SVGH<br/>
		3) SLHCC<br/>
	<br/>	
	<form action="upload.php" method="post" id="myFormId" enctype="multipart/form-data">
		<input style="font-size: 52px;" id="uploadFilesId" name="upload[]" type="file" multiple="multiple" accept="text/plain" onInput="showAlert();"/>
<!--		<button style="font-size: 52px;" name="submit" class="btn btn-primary" type="submit">Ipasa ang mga report</button>
-->
	</form>

	<script language="javascript" type="text/javascript">
		function showAlert() {
			document.getElementById('myFormId').submit();
//			alert("Hey there!" + document.getElementById("uploadFilesId").value);
		}
	</script>
	
	<br/>
<?php
/*
   define("BASEPATH", getcwd() .'/php');
   echo "BASEPATH: ".BASEPATH;
*/

/*
	$data = json_decode(file_get_contents('php://input'), true);
//	$data = file_get_contents('php://input');
//	print_r($data);
//	echo "hello".$data["myKey"];
	
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_description`) VALUES ('usbong');"))
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_description`) VALUES ('".$data["myKey"]."');"))
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_description`) VALUES ('".$data["dateTimeStamp"]."');"))
	
	//edited by Mike, 20190917
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_description`) VALUES ('".json_encode($data)."');"))

//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_type_id`, `payslip_description`) VALUES ('".$data["payslip_type_id"]."', '".$data."');"))

	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_type_id`, `payslip_description`) VALUES ('".$data["payslip_type_id"]."', '".json_encode($data)."');"))

//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_type_id`, `payslip_description`) VALUES ('".$data["payslip_type_id"]."', '".$data."');"))
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_type_id`, `payslip_description`) VALUES ('".$data["payslip_type_id"]."', '".mysql_real_escape_string(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK))."');"))
//	if ($result = $mysqli->query("INSERT INTO `payslip` (`payslip_type_id`, `payslip_description`) VALUES ('".$data["payslip_type_id"]."', '".mysql_real_escape_string(json_encode($data))."');"))
	{

//added by Mike, 20190902
		//update the file locations, e.g. batch file, accordingly
		exec('C:\Windows\System32\cmd.exe /C START C:\Usbong\java\VBA\generatePayslipForTheDay\unit\"add-on software"\generatePayslipForTheDay.bat');
	}
	// show an error if there is an issue with the database query
	else
	{
			echo "Error: " . $mysqli->error;
	}
*/		
	// close database connection
	$mysqli->close();
?>
</font>

<div class="copyright">
	<!-- TO-DO: -add: automatically write the present year -->
	<span>© Usbong Social Systems, Inc. 2011~2019. All rights reserved.</span>
</div>
