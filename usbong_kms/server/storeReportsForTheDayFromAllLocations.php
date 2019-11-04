<!--
' Copyright 2019 Usbong Social Systems, Inc.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @author: Michael Syson
  @date created: 20191022
  @date updated: 20191104

  Given:
  1) List with the details of the reports for the day from all locations

  Output:
  1) Automatically connect to the database (DB) and store the reports in the DB  
  
  Note:
  1) At present, use this web address to access the page to store the reports in the DB.
	
	.../usbong_kms/index.php/report/storeReportsForTheDayFromAllLocations
	
  where: ... = web address of the computer server
		   
  Examples: 
	a) localhost/usbong_kms/index.php/report/storeReportsForTheDayFromAllLocations
	b) 192.168.1.3/usbong_kms/index.php/report/storeReportsForTheDayFromAllLocations
	c) www.usbong.ph/usbong_kms/index.php/report/storeReportsForTheDayFromAllLocations
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
	<title>
      Store Reports For The Day From All Locations
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
  <body>
<?php
	//removed by Mike, 20191025	
	// connect to the database
/*	include('usbong-kms-connect.php');
*/	
?>	
	<h1>
		Store Reports for the Day from All Locations
	</h1>
	Pakipili ang lahat ng mga report mula sa mga ito:<br/>
	1) MOSC<br/>
	2) SVGH<br/>
	3) SLHCC<br/>
	<br/>
	<form id="myFormId" enctype="multipart/form-data" method="post" action="<?php echo site_url('report/confirm')?>">
		<input type="hidden" name="reportTypeNameParam" value="Reports from All Locations">
		<input style="font-size: 16px;" id="uploadFilesId" name="reportParamUploadFiles[]" type="file" multiple="multiple" accept="text/plain" onInput="showAlert();"/>
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
	//removed by Mike, 20191025	
	// close database connection
/*	$mysqli->close();
*/
?>
	<div class="copyright">
		<!-- TO-DO: -add: automatically write the present year -->
		<span>© Usbong Social Systems, Inc. 2011~2019. All rights reserved.</span>
	</div>	
  </body>
</html>
