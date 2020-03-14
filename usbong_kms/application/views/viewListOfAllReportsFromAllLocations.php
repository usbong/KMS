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
  @date created: 20191110
  @date updated: 20200313
  Given:
  1) Database (DB) containing the list of all the reports from all locations
	
  Output:
  1) Automatically connect to the DB and display on the Web Browser the list of all the reports in the DB  
  
  Note:
  1) The details of each report in the list from the DB is in the JSON format.
  
  2) At present, use this web address to access the page to view the list of all the reports in the DB.
	
	.../usbong_kms/index.php/report/viewListOfAllReportsFromAllLocations
	
  where: ... = web address of the computer server
		   
  Examples: 
	a) localhost/usbong_kms/index.php/report/viewListOfAllReportsFromAllLocations
	b) 192.168.1.3/usbong_kms/index.php/report/viewListOfAllReportsFromAllLocations
	c) www.usbong.ph/usbong_kms/index.php/report/viewListOfAllReportsFromAllLocations
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
      View List of All the Reports From All Locations
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
	/**/
			body
			{
				font-family: Arial;
				font-size: 9pt
			}
			
			div.search-result
			{
				font-size: 12pt
			}
			
			div.container-search
			{
				font-size: 12pt
			}
						
			div.copyright
			{
				text-align: center;
			}
    /**/
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
		View List of All the Reports From All Locations
	</h1>
<?php	
		$resultCount = count($result);
		if ($resultCount==0) {
			echo '<div class="search-result"><b>'.count($result).'</b> result found.</div>';
/*
			echo '<div class="Search-noResult">';
			echo 'Your search <b>- '.$param.' -</b> did not match any of our products.';
			echo '<br><br>Suggestion:';
			echo '<br>&#x25CF; Make sure that all words are spelled correctly.';				
			echo '<br>&#x25CF; You may send us a request for the product item <a class="Request-link" href="'.site_url('request/'.$URLFriendlyReformattedProductName.'/b').'">here</a>.';		
			echo '</div>';
*/			
		}
		else {
			if ($resultCount==1) {
				echo '<div class="search-result"><b>'.count($result).'</b> result found.</div>';
			}
			else {
				echo '<div class="search-result"><b>'.count($result).'</b> results found.</div>';			
			}			
		}
?>		
		<br/>
		<div class="container-search">
			<?php
				//edited by Mike, 20191112
				//+added: process JSON formatted result
				//note: list is based on added_datetime_stamp
				foreach ($result as $value) {
//					echo $value['report_answer']."<br/>";
					$data = json_decode($value['report_answer'], true);
					
					if (is_array($data)) {
						foreach ($data as $item) {
							//identify report_type_id
							if ($item["report_type_id"]===null) {	
								//echo $dataValue["report_answer"]."<br/><br/>";					
							}
							else {
								//edited by Mike, 20191116
//								echo $item["report_answer"];	

								//TO-DO: -update: this
								if ($item["report_type_id"]==3) { //Incident Report at location, MOSC HQ 									
									echo $item["report_answer"];	
									
									if ($item["report_item_id"]==5) {
										//added by Mike, 20191116
										echo "<br/>";
										echo $item["member_last_name"].", ".$item["member_first_name"];	
										echo "<br/>--";	
									}
								}						
/*								else if ($item["report_type_id"]==4) { //Incident Report at All Locations
									echo $item["report_answer"];	
								}
*/								
							}
							echo "<br/>";
						}
					}
					//edited by Mike, 20191116
					else {
						echo $value['report_answer'];
//						echo "<br/>";					

						//edited by Mike, 20191118
						if ($value["report_item_id"]==1) {	
							//if report_answer contains "no reports"
							//note that this is instead of the date stamp for report_item_id 1
							if (strpos(strtolower($value['report_answer']), 'no reports') !== false) {
								echo "<br/>--";
							}
						}
						else if ($value["report_item_id"]==5) {
							//added by Mike, 20191116
							echo "<br/>";
							echo $value["member_last_name"].", ".$value["member_first_name"];	
							echo "<br/>--";	
						}
						echo "<br/>";					
						
	
/*
						//TO-DO: -update: this
						if ($data["report_type_id"]==3) { //Incident Report at location, MOSC HQ 
							echo "hello";
						}						
*/						
					}
					
//					echo "----------<br/>";
					
					//	print_r($data);					
				}
			?>
		</div>
<?php		
	//removed by Mike, 20191025	
	// close database connection
/*	$mysqli->close();
*/
?>
	<br/>
	<div class="copyright">
		<!-- TO-DO: -add: automatically write the present year -->
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>	
  </body>
</html>