<!--
  Copyright 2020 Usbong Social Systems, Inc.

  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @author: Michael Syson
  @date created: 20200602
  @date updated: 20200827
	
  Computer Web Browser Address (Example):
  1) http://192.168.11.10/usbong_kms/index.php/report/viewWebAddressList
  
  Note:
  1) Previously, we used this PHP page without the CodeIgniter framework
  http://192.168.11.10/usbong_kms/server/viewWebAddressList.php

  2) Update the file location
  
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

	<?php
		//added by Mike, 20200820; edited by Mike, 20200821
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		$machineAddress = "";

/*		//TO-DO: -use: this
		$operatingSystemAndBrowserAddress = $_SERVER['HTTP_USER_AGENT'];
		echo $operatingSystemAndBrowserAddress;
*/

		//added by Mike, 20200821
		if (strpos($ipAddress, "::")!==false) {
			$ipAddress = "SERVER ADDRESS";
			//added by Mike, 20201010
			//TO-DO: -reverify: this
			$machineAddress = "SERVER MACHINE ADDRESS";
		}

		//added by Mike, 20201010
		//TO-DO: -reverify: this
		//added by Mike, 20200821
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { //Windows machine
			$rawMachineAddressInput =  exec('getmac');
			$machineAddress = explode(" ", $rawMachineAddressInput)[0];
		}
		else {
			//TO-DO: -reverify: this set of instructions due receives server machine address, not client machine address
			//note: output is blank if Windows Machine
			//We use this set of instructions with Linux Machines
			//Reference: https://stackoverflow.com/questions/1420381/how-can-i-get-the-mac-and-the-ip-address-of-a-connected-client-in-php;
			//last accessed: 20200820
			//answer by: Paul Dixon, 20090914T0848
			#run the external command, break output into lines
			$arp=`arp -n $ipAddress`; //`arp -a $ipAddress`;
			$lines=explode("\n", $arp);

			#look for the output line describing our IP address
			foreach($lines as $line)
			{
			   $cols=preg_split('/\s+/', trim($line));
			   if ($cols[0]==$ipAddress)
			   {
				   $machineAddress=$cols[1];
	//			   echo $macAddress;
			   }
			}
		}

/*		$_SESSION["client_ip_address"] = $ipAddress;
		$_SESSION["client_machine_address"] = $machineAddress;
*/

		//edited by Mike, 20200821
/*
		$ipAddress = $this->session->userdata('client_ip_address');
		$machineAddress = $this->session->userdata('client_machine_address');
*/
		$this->session->set_userdata('client_ip_address', $ipAddress);
		$this->session->set_userdata('client_machine_address', $machineAddress);


		//TO-DO: -set: value for blank machine address due to Windows Machine		
//		echo $_SESSION["client_ip_address"];
//		echo $_SESSION["client_machine_address"];

		echo "<b><font color='#FF4500'>YOUR INTERNET PROTOCOL ADDRESS: </font></b>".$ipAddress;
		//removed by Mike, 20200826
		//TO-DO: -update: this
/*		
		echo "<br/>";		
		echo "<b><font color='#FF4500'>YOUR MACHINE ADDRESS: </font></b>".$machineAddress;
*/		
		//TO-DO: -use: stored session values
		//TO-DO: -reverify: this		
	?>
	
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
<h3>1) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchPatient">Search Patient</a></h3>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchPatient">http://192.168.11.10/usbong_kms/index.php/browse/searchPatient</a></h3>
<h3>2) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchMedicine">Search Medicine</a></h3>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchMedicine">http://192.168.11.10/usbong_kms/index.php/browse/searchMedicine</a><br/>
<h3>3) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchNonMedicine">Search Non-Medicine</a></h3>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchNonMedicine">http://192.168.11.10/usbong_kms/index.php/browse/searchNonMedicine</a><br/>

<h2>II. INFORMATION DESK + ACCOUNTING UNIT</h2>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportPatientQueueAccounting">http://192.168.11.10/usbong_kms/index.php/report/viewReportPatientQueueAccounting</a><br/>

<h2>III. SUMMARY REPORTS FOR THE DAY</h2>
<h3>1) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified">View All Summary Reports (Unified)</a></h3>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified">http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified</a>
<h3>2) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay">View All Summary Reports (Time-based)</a></h3>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay">http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay</a>

<h2>IV. PAYSLIPS</h2>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Pedro">Payslip SYSON, PEDRO (MOSC)</a><br/>
<br/>
http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/name<br/>
<br/>
where: name = keyword of medical doctor name<br/>
<br/>
Examples:<br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Pedro">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Pedro</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Peter">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Peter</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Chastity">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Chastity</a><br/>

<h2>V. REPORTS</h2>
<b>1) MEDICINE</b><br/>
a) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicine">
http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicine</a><br/>
b) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineUnified">
http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineUnified</a><br/>
<br/>
<b>2) MEDICINE (GLUCOSAMINE SULPHATE & CALCIUM + VITAMIN D)</b><br/>
a) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineAsterisk">
http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineAsterisk</a><br/>
b) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineAsteriskUnified">
http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineAsteriskUnified</a><br/>
<br/>
<b>3) NON-MEDICINE</b><br/>
a) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicine">
http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicine</a><br/>
b) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicineUnified">
http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicineUnified</a><br/>

<h2>VI. OFFICIAL RECEIPTS:</h2>
<b>1) MOSC</b><br/>
<!-- added by Mike, 20200812 -->
<b>a) VIEW REPORT FOR THE DAY</b><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportForTheDay">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportForDay<br/>
</a>
<br/>
<b>b) VIEW REPORT FOR PREVIOUS MONTH</b><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReport">http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReport</a><br/>
<br/>
<!-- TO-DO: -add: year -->
<b>c) SET SPECIFIC MONTH</b><br/>
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportFor/month<br/>
<br/>
where: month = transactions' month<br/>
<br/>
Example:<br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportFor/06">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportFor/06</a><br/>
<br/>
where "06" = "June 2020"<br/>
<b>2) PAS</b><br/>
<!-- added by Mike, 20200812 -->
<b>a) VIEW REPORT FOR THE DAY</b><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASForTheDay">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASForDay<br/>
</a>
<br/>
<b>b) VIEW REPORT FOR PREVIOUS MONTH</b><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPAS">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPAS</a><br/>
<br/>
<b>c) SET SPECIFIC MONTH</b><br/>
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASFor/month<br/>
<br/>
where: month = transactions' month<br/>
<br/>
Example:<br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASFor/06">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASFor/06</a><br/>
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
