<!--
  Copyright 2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20200602
  @date updated: 20200723
	
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/viewWebAddressList.php
  
  Note:
  1) Update the file location
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
							width: 802px; /* 670px */
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
      Computer Web Address List (MOSC)
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
	
	//edited by Mike, 20200723
	//note: this is due to the following removed function is not available in PHP 5.3				
	//$dateToday = (new DateTime())->format('Y-m-d');
	$dateToday = date('Y-m-d');

	ini_set('auto_detect_line_endings', true);
?>
<h2>Computer Web Address List (MOSC)</h2>
<h2>I. SEARCH</h2>
<h3>1) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/BROWSE/searchPatient">Search Patient</a></h3>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/BROWSE/searchPatient">http://mosc-accounting/usbong_kms/index.php/BROWSE/searchPatient</a></h3>
<h3>2) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/browse/searchMedicine">Search Medicine</a></h3>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/BROWSE/searchMedicine">http://mosc-accounting/usbong_kms/index.php/BROWSE/searchMedicine</a><br/>
<h3>3) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/BROWSE/searchNonMedicine">Search Non-Medicine</a></h3>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/BROWSE/searchNonMedicine">http://mosc-accounting/usbong_kms/index.php/BROWSE/searchNonMedicine</a><br/>

<h2>II. INFORMATION DESK</h2>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportPatientQueue">http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportPatientQueue</a><br/>

<h2>III. SUMMARY REPORTS FOR THE DAY</h2>
<h3>1) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified">View All Summary Reports (Unified)</a></h3>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified">http://mosc-accounting/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified</a>
<h3>2) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay">View All Summary Reports (Time-based)</a></h3>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay">http://mosc-accounting/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay</a>

<h2>IV. PAYSLIPS</h2>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Pedro">Payslip SYSON, PEDRO (MOSC)</a><br/>
<br/>
http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/name<br/>
<br/>
where: name = keyword of medical doctor name<br/>
<br/>
Examples:<br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Pedro">http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Pedro</a><br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Peter">http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Peter</a><br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Chastity">http://mosc-accounting/usbong_kms/index.php/REPORT/viewpayslipwebfor/Chastity</a><br/>

<h2>V. REPORTS</h2>
<b>1) MEDICINE</b><br/>
a) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicine">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicine</a><br/>
b) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicineUnified">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicineUnified</a><br/>
<br/>
<b>2) MEDICINE (GLUCOSAMINE SULPHATE & CALCIUM + VITAMIN D)</b><br/>
a) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicineAsterisk">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicineAsterisk</a><br/>
b) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicineAsteriskUnified">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportMedicineAsteriskUnified</a><br/>
<br/>
<b>3) NON-MEDICINE</b><br/>
a) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportNonMedicine">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportNonMedicine</a><br/>
b) <a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportNonMedicineUnified">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReportNonMedicineUnified</a><br/>

<h2>VI. OFFICIAL RECEIPTS:</h2>
<b>1) MOSC</b><br/>
<b>a) VIEW REPORT FOR PREVIOUS MONTH</b><br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReport">http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReport</a><br/>
<br/>
<!-- TO-DO: -add: year -->
<b>b) SET SPECIFIC MONTH</b><br/>
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportFor/month<br/>
<br/>
where: month = transactions' month<br/>
<br/>
Example:<br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportFor/06">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportFor/06</a><br/>
<br/>
where "06" = "June 2020"<br/>
<br/>
<b>2) PAS</b><br/>
<b>a) VIEW REPORT FOR PREVIOUS MONTH</b><br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportPAS">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportPAS</a><br/>
<br/>
<b>b) SET SPECIFIC MONTH</b><br/>
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportPASFor/month<br/>
<br/>
where: month = transactions' month<br/>
<br/>
Example:<br/>
<a target="_blank" href="http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportPASFor/06">
http://mosc-accounting/usbong_kms/index.php/REPORT/viewReceiptReportPASFor/06</a><br/>
<br/>
where "06" = "June 2020"<br/>

<br/>
	<br />
	<div>***NOTHING FOLLOWS***</div>
	<br />
	<br />
	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>		 
  </body>
</html>