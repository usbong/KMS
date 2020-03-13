<!--
' Copyright 2019~2020 Usbong Social Systems, Inc.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @author: Michael Syson
  @date created: 20191120
  @date updated: 20200313
  Given:
  1) Image with the details of the report
  Output:
  1) Automatically connect to the database (DB) and store the report image in the Knowledge Management System (KMS)
  
  Note:
  1) At present, use this web address to access the page to store the reports in the DB.
	
	.../usbong_kms/index.php/report/storeReportImage
	
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
      Store Report Image
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
		Store Report Image
	</h1>
	<br/>
	<form id="myFormId" enctype="multipart/form-data" method="post" action="<?php echo site_url('report/confirm')?>">
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
	//removed by Mike, 20191025	
	// close database connection
/*	$mysqli->close();
*/
?>
	<div class="copyright">
		<!-- TO-DO: -add: automatically write the present year -->
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>	
  </body>
</html>