<!--
' Copyright 2019~2025 SYSON, MICHAEL B.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20250109
  @date updated: 20250109
  @website address: http://www.usbong.ph
  
  Given:
  1) File with the details of the report

  Output:
  1) Automatically connect to the database (DB) and store the report file in the Knowledge Management System (KMS)
  
  Note:
  1) At present, use this web address to access the page to store the reports in the DB.
	
	.../usbong_kms/index.php/report/storeReportFileOnly
	
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
    <style type="text/css">
	/**/
	                    body
                        {
                                font-family: Arial;
								font-size: 11pt
                        }
						
						div.checkBox
						{
								border: 1.5pt solid black; height: 9pt; width: 9pt;
								text-align: center;
								float: left
						}
						
						div.option
						{
								padding: 2pt;
								display: inline-block;
						}
						
						div.copyright
						{
								text-align: center;
						}

						input.browse-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
						}	

						img.Image-companyLogo {
							max-width: 60%;
							height: auto;
						}
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
						}						
						
    /**/
    </style>
	<title>
      Store Report File Only
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
	<h2>
		Store Report File Only
	</h2>
	<br/>
	<form id="myFormId" enctype="multipart/form-data" method="post" action="<?php echo site_url('file/confirmStoreFileOnly/0');?>"> <!--$result[0]['transaction_id']-->
		<input type="hidden" name="reportTypeNameParam" value="Report File">
		
		<input style="font-size: 16px;" id="uploadFilesId" name="reportParamUploadFiles[]" type="file" multiple="multiple" accept="file_extension" onInput="showAlert();"/>
	</form>

	<script language="javascript" type="text/javascript">
		function showAlert() {
			document.getElementById('myFormId').submit();
//			alert("Hey there!" + document.getElementById("uploadFilesId").value);
		}
	</script>
	<br />
	<br />
	<br/>	
	<br/>
<?php
	//removed by Mike, 20191025	
	// close database connection
/*	$mysqli->close();
*/
?>
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>	
  </body>
</html>