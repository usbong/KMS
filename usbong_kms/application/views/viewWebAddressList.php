<!--
  Copyright 2020~2025 SYSON, MICHAEL B.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.

  @company: USBONG
  @author: SYSON, MICHAEL B.
  @date created: 20200602
  @date updated: 20250902; from 20250901
  @website address: http://www.usbong.ph
	
  Computer Web Browser Address (Example):
  1) http://mosc-accounting/usbong_kms/index.php/report/viewWebAddressList
  
  Notes:
  1) Previously, we used this PHP page without the CodeIgniter framework
  http://mosc-accounting/usbong_kms/server/viewWebAddressList.php
  2) Update the file location
    Example#1: http://192.168.1.110/usbong_kms/server/viewWebAddressList.php
    Example#2: http://192.168.11.10/usbong_kms/server/viewWebAddressList.php
	Example#3:
	192.168.11.10/usbong_kms/server/viewWebAddressList.php
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

			//added by Mike, 20201022
			echo "<font color='#FF0000'><b>Please set as default in the Computer Server Browser,<br/>the Computer Server Internet Protocol (IP) Address<br/>that is not \"localhost\".<br/><br/></b></font>";
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
//		echo "MACHINE ADDRESS: ".$machineAddress;

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
		//added by Mike, 20250314; debug
		if (isset($_SESSION["hasAddedPatientInCartList"])) {		
			$this->session->unset_userdata('hasAddedPatientInCartList');
		}

		//TO-DO: -use: stored session values
		//TO-DO: -reverify: this		
	?>
	
    <style type="text/css">
	/**/
	                    body
                        {
							font-family: Arial;
							font-size: 12pt;
							
							/*background-color: #FEFEFE;*/

							width: 820px;
                        }
						
						div.copyright
						{
							text-align: center;
						}
						
						a
						{
							padding-right: 35%;
						}

						span.indentSpan
						{
							padding-left: 2.5%;
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

						img.patientIcon {
							width: 4%;
							height: auto;
							vertical-align: middle;
							margin-left: 0.5%;
							margin-right: 1.5%;	
						}						
						
						img.patientIcon:hover {
							width: 4%;
							height: auto;
							vertical-align: middle;
							margin-left: 0.5%;
							margin-right: 1.5%;	
							opacity: 0.6;
						}						

						img.medIcon, .nonMedIcon {
							width: 3%;
							height: auto;
							vertical-align: middle;
							margin-left: 1%;
							margin-right: 2%;
						}
						
						img.medIcon:hover, .nonMedIcon:hover {
							width: 3%;
							height: auto;
							vertical-align: middle;
							margin-left: 1%;
							margin-right: 2%;
							opacity: 0.6;
						}

						img.priceListIcon {
							width: 3%;
							height: auto;
							vertical-align: middle;
							margin-left: 1%;
							margin-right: 2%;
						}
						
						img.priceListIcon:hover {
							background-color: #d9eeff;
							width: 3%;
							height: auto;
							vertical-align: middle;
							margin-left: 1%;
							margin-right: 2%;
							/*opacity: 0.6;*/
						}
						
						img.snackIcon {
							width: 2%;
							height: auto;
							vertical-align: middle;
							margin-left: 1.5%;
							margin-right: 2.5%;
						}

						img.snackIcon:hover {
							width: 2%;
							height: auto;
							vertical-align: middle;
							margin-left: 1.5%;
							margin-right: 2.5%;
							opacity: 0.6;
						}
						
						img.reportSummaryEndDayIcon {
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 0%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}

						img.reportSummaryEndDayIcon:Hover {
							background-color: #d9eeff;
							
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 0%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}
						
						img.reportPatientQueueAccountingIcon {
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 2%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}

						img.reportPatientQueueAccountingIcon:Hover {
							background-color: #d9eeff;
							
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 2%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}

						img.reportXrayIcon, img.reportLabIcon {
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 3%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}

						img.reportXrayIcon:Hover, img.reportLabIcon:Hover {
							background-color: #d9eeff;
							
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 3%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}

						img.reportMedIcon {
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 0.5%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
						}

						img.reportMedIcon:Hover {
							background-color: #d9eeff;
							
							width: 5%;
							height: auto;
							vertical-align: middle;
							margin-left: 0.5%;
							margin-right: 1%;
							margin-top: -0.5%;
							margin-bottom: -0.5%;							
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

						span.moreTextSpanIIISummaryReports
						{
							display: none;
						}
						
						span.moreTextSpanIIISummaryReportsHeader
						{
							/*color: green;*/
							border: 3px solid #ab9c7d;	
						}
						
						a:link {
						  color: rgb(48,103,126);
						}
						
						a:link:hover {
						  color: rgb(95,204,250); /*rgb(73,156,191);*/
						}

						a:visited {
						  color: rgb(48,103,126);
						}

						a:visited:hover {
						  color: rgb(95,204,250); /*rgb(73,156,191);*/
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
	  <!-- edited by Mike, 20250815; from 20230417 -->	  
	  function toggleMore(sParamId) {
		  //alert(sParamId);
		  //alert(summaryReportsHeaderId);
		 
			var summaryReportsId = document.getElementById("summaryReportsId");
			var summaryReportsVReportsId = document.getElementById("summaryReportsVReportsId");
		  
			if (sParamId=="summaryReportsHeaderId") {
			  //alert("dito"+summaryReportsId.style.display);
			  //note: 1st summaryReportsId.style.display value is blank, i.e. "";
			  if (summaryReportsId.style.display === "") {
				  summaryReportsId.style.display = "inline";
			  }
			  else if (summaryReportsId.style.display === "none") {
				  summaryReportsId.style.display = "inline";
			  }
			  else {
				  summaryReportsId.style.display = "none";
			  }
			}
			else if (sParamId=="summaryReportsHeaderVReportsId") {
			  if (summaryReportsVReportsId.style.display === "") {
				  summaryReportsVReportsId.style.display = "inline";
			  }
			  else if (summaryReportsVReportsId.style.display === "none") {
				  summaryReportsVReportsId.style.display = "inline";
			  }
			  else {
				  summaryReportsVReportsId.style.display = "none";
			  }
			}

		} 
	  
	  </script>
  <body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');
	
	//edited by Mike, 20200723
	//note: this is due to the following removed function is not available in PHP 5.3				
	//$dateToday = (new DateTime())->format('Y-m-d');
	$dateToday = date('Y-m-d');

	//removed by Mike, 20240301
	//auto_detect_line_endings is deprecated
	//ini_set('auto_detect_line_endings', true);
	
?>
<h2>Computer Web Address List (MOSC)</h2>
<h2>I. SEARCH</h2>
<h3><span class="indentSpan"></span>1.<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchPatient"><img class="patientIcon" src="<?php echo base_url('assets/images/patientIcon3.png');?>?lastmod=20250806T1432">Search Patient</a></h3>

<h3><span class="indentSpan"></span>2.<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchMedicine"><img class="medIcon" src="<?php echo base_url('assets/images/medIcon.png');?>?lastmod=20250806T1432">Search Medicine</a></h3>

<h3><span class="indentSpan"></span>3.<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchNonMedicine"><img class="nonMedIcon" src="<?php echo base_url('assets/images/nonMedIcon.png');?>?lastmod=20250806T1432">Search Non-Medicine</a></h3>

<h3><span class="indentSpan"></span>4.<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/browse/searchSnack"><img class="snackIcon" src="<?php echo base_url('assets/images/snackIcon.png');?>?lastmod=20250806T1432">Search Snack</a></h3>

<h2>II. INFORMATION DESK + ACCOUNTING UNIT</h2>
<h3><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportPatientQueueAccounting"><img class="reportPatientQueueAccountingIcon" src="<?php echo base_url('assets/images/reportPatientQueueAccountingIcon.png');?>?lastmod=20250812T1054">View Report Patient Queue Accounting</a></h3>

<h2><span id="summaryReportsHeaderId" class="moreTextSpanIIISummaryReportsHeader" onclick="toggleMore('summaryReportsHeaderId')">III. SUMMARY REPORTS FOR THE DAY</span></h2>
<span id="summaryReportsId" class="moreTextSpanIIISummaryReports">
<h3><span class="indentSpan"></span>1. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified">View All Summary Reports (Unified)</a></h3>
<!--
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified">http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDayUnified</a>
-->
<h3><span class="indentSpan"></span>2. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay">View All Summary Reports (Time-based)</a></h3>
<!--
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay">http://192.168.11.10/usbong_kms/index.php/report/viewAllSummaryReportsForTheDay</a>
-->

<!-- edited by Mike, 20250812; from 20210915 -->
<h3><span class="indentSpan"></span>3. <a target="_blank" href="http://192.168.11.10/usbong_kms/server/viewSummaryReportForEndDay.php"><img class="reportSummaryEndDayIcon" src="<?php echo base_url('assets/images/reportSummaryEndDayIcon.png');?>?lastmod=20250812T1247">View Summary Report for End Day</a></h3>
</span>

<h2>IV. PAYSLIPS</h2>
<h3><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Pedro"><img class="reportPatientQueueAccountingIcon" src="<?php echo base_url('assets/images/reportPayslipPedroIcon.png');?>?lastmod=20250812T1207">Payslip SYSON, PEDRO (MOSC)</a></h3>
<h3>
<span class="indentSpan"></span><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Peter">Payslip SYSON, PETER</a>
</h3>
<h3>
<span class="indentSpan"></span><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Chastity">Payslip REJUSO-MORALES, CHASTITY</a>
</h3>
<h3>
<span class="indentSpan"></span><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Rodil">Payslip DELA PAZ, RODIL</a>
</h3>
<h3>
<span class="indentSpan"></span><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Honesto">Payslip LASAM, HONESTO</a>
</h3>

<!-- //removed by Mike, 20250812
http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/name<br/>
<br/>
where: name = keyword of medical doctor name<br/>
<br/>
Examples:<br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Pedro">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Pedro</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Peter">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Peter</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Chastity">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Chastity</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Rodil">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Rodil</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Honesto">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Honesto</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Gracia">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Gracia</a><br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Jhonsel">http://192.168.11.10/usbong_kms/index.php/report/viewpayslipwebfor/Jhonsel</a><br/>
-->

<!-- //TODO: -reverify: this
<h2><span id="summaryReportsHeaderVReportsId" class="moreTextSpanIIISummaryReportsHeader" onclick="toggleMore('summaryReportsHeaderVReportsId')">V. REPORTS</span></h2>
<span id="summaryReportsVReportsId" class="moreTextSpanIIISummaryReports">
-->
<h2>V. REPORTS</h2>

<h3>
<span class="indentSpan"></span>1. MEDICINE
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>a. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicine"><img class="reportMedIcon" src="<?php echo base_url('assets/images/reportMedIcon.png');?>?lastmod=20250812T1520">VIEW REPORT MED</a><br/>
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>b. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineUnified">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportMedUnifiedIcon.png');?>?lastmod=20250812T1520">VIEW REPORT MED UNIFIED</a>
</h3>
<h3>
<span class="indentSpan"></span>2. MEDICINE (GLUCOSAMINE SULPHATE & CALCIUM + VITAMIN D)
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>a. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineAsterisk">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportMedAsteriskIcon.png');?>?lastmod=20250812T1542">VIEW REPORT MED *</a>
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>b. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportMedicineAsteriskUnified"><img class="reportMedIcon" src="<?php echo base_url('assets/images/reportMedAsteriskUnifiedIcon.png');?>?lastmod=20250812T1542">VIEW REPORT MED * UNIFIED</a>
</h3>
<h3>
<span class="indentSpan"></span>3. NON-MEDICINE
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>a. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicine">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportNonMedIcon.png');?>?lastmod=20250812T1443">VIEW REPORT NON-MED</a>
</h3>

<!-- removed by Mike, 20210712
b) <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicineUnified">
http://192.168.11.10/usbong_kms/index.php/report/viewReportNonMedicineUnified</a><br/>
-->
<h3>
<span class="indentSpan"></span>4. SNACK
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>a. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportSnack">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportSnackIcon.png');?>?lastmod=20250814T1059">VIEW REPORT SNACK</a>
</h3>
</a>
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>b. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportSnackUnified">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportSnackUnifiedIcon.png');?>?lastmod=20250814T1059">VIEW REPORT SNACK UNIFIED</a>
</h3>

<h3>
<span class="indentSpan"></span>5. X-RAY
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportXray">
<img class="reportXrayIcon" src="<?php echo base_url('assets/images/reportXrayIcon.png');?>?lastmod=20250813T1451">VIEW REPORT X-RAY</a>
</h3>

<h3>
<span class="indentSpan"></span>6. LAB
</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span><a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReportLab"><img class="reportLabIcon" src="<?php echo base_url('assets/images/reportLabIcon.png');?>?lastmod=20250813T1542">VIEW REPORT LAB</a>
</h3>
</span>

<h2>VI. OFFICIAL RECEIPTS:</h2>
<h3><span class="indentSpan"></span>1. MOSC</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>a. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportForTheDay">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportReceiptMOSCIcon.png');?>?lastmod=20250814T1145">VIEW MOSC REPORT FOR THE DAY</a>
</h3>

<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>b. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReport">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportReceiptMOSCMonthIcon.png');?>?lastmod=20250814T1145">VIEW MOSC REPORT FOR PREVIOUS MONTH</a>
</h3>
<!-- TO-DO: -add: year -->
<!--
<b>c. SET SPECIFIC MONTH</b><br/>
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportFor/month<br/>
<br/>
where: month = transactions' month<br/>
<br/>
Example:<br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportFor/06">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportFor/06</a><br/>
<br/>
where "06" = "June 2020"<br/>
-->
<h3><span class="indentSpan"></span>2. PAS</h3>
<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>a. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASForTheDay">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportReceiptPASIcon.png');?>?lastmod=20250814T1200">VIEW PAS REPORT FOR THE DAY</a></h3>

<h3>
<span class="indentSpan"></span><span class="indentSpan"></span>b. <a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPAS">
<img class="reportMedIcon" src="<?php echo base_url('assets/images/reportReceiptPASMonthIcon.png');?>?lastmod=20250814T1200">VIEW PAS REPORT FOR PREVIOUS MONTH</a></h3>

<!--
<b>c. SET SPECIFIC MONTH</b><br/>
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASFor/month<br/>
<br/>
where: month = transactions' month<br/>
<br/>
Example:<br/>
<a target="_blank" href="http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASFor/06">
http://192.168.11.10/usbong_kms/index.php/report/viewReceiptReportPASFor/06</a><br/>
<br/>
where "06" = "June 2020"<br/>
-->

<!-- added by Mike, 2021530 -->
<h2>VII. PRICE LISTS:</h2>
<h3>
<span class="indentSpan"></span>1. <a target="_blank" href="http://192.168.11.10/usbong_kms/server/viewXRayPriceList.php">
<img class="priceListIcon" src="<?php echo base_url('assets/images/xrayIcon.png');?>?lastmod=20250814T1112">X-RAY UNIT PRICE LIST</a>
</h3>
<h3>
<span class="indentSpan"></span>2. <a target="_blank" href="http://192.168.11.10/usbong_kms/server/viewLabPriceList.php">
<img class="priceListIcon" src="<?php echo base_url('assets/images/labIcon.png');?>?lastmod=20250814T1113">LAB UNIT PRICE LIST</a>
</h3>

<h2>VIII. CONTACTS LIST:</h2>
<span class="indentSpan"></span><b>1. MARIKINA ORTHOPEDIC SPECIALTY CLINIC</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-942-4011<br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#2: 02-8-941-4888<br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#3: 02-8-533-4651<br/>
<br/>
<span class="indentSpan"></span><b>2. ST. VINCENT GEN. HOSPITAL</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-359-3986<br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#2: 02-8-531-5080<br/>
<br/>
<span class="indentSpan"></span><b>3. MARIKINA VALLEY MEDICAL CENTER</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-682-2222<br/>
<br/>
<span class="indentSpan"></span><b>4. METRO ANTIPOLO HOSPITAL AND MEDICAL CENTER</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-722-3208<br/>
<br/>
<span class="indentSpan"></span><b>5. 'AMANG' RODRIGUEZ MEMORIAL MEDICAL CENTER</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-948-0595<br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#2: 02-8-941-0342<br/>
<br/>
<span class="indentSpan"></span><b>6. STA. LUCIA HEALTH CARE CENTER</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-647-2545<br/>
<br/>
<span class="indentSpan"></span><b>7. I-SCAN DIAGNOSTIC CENTER (J.P. LAUREL, MARIKINA CITY BRANCH)</b><br/>
<!--
7.1) Dimasalang Rd., Manila City Branch<br/> 
TEL#1: (02)241-8888; 0917-1227226<br/>
7.2) Malakas St. Quezon City Branch<br/>
TEL#2: (02)928-6197; (02)927-2659;0925-8647226<br/>
7.3) MacArthur Highway, Valenzuela Branch<br/>
TEL#3: (02)961-2371; 0925-5847226<br/>
-->
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-584-6788<br/>
<span class="indentSpan"></span><span class="indentSpan"></span>MOBILE#1: 0998-952-7226<br/>
<br/>
<span class="indentSpan"></span><b>8. BARANGAY STO. NIÑO</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-534-9703<br/>
<br/>
<span class="indentSpan"></span><b>9. OFFICE OF PUBLIC SAFETY AND SECURITY (OPSS)-MARIKINA</b><br/>
<span class="indentSpan"></span><span class="indentSpan"></span>TEL#1: 02-8-655-3061<br/>
<br/>
	<br />
	<div>***NOTHING FOLLOWS***</div>
	<br />
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
  </body>
</html>
