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
      View All Report Images
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
			
			img.Image-companyLogo {
				max-width: 60%;
				height: auto;
			}			

			img.Image-file {
				max-width: 20%;
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
  </head>
  <body>
<?php
	//removed by Mike, 20191025	
	// connect to the database
/*	include('usbong-kms-connect.php');
*/	
?>		
	<table>
	  <tr>
		<td>				
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td>				
			<h2>
				View All Report Images
			</h2>
		</td>
	  </tr>
	</table>	
	<?php	
		//get only name strings from array 
		if (isset($result)) {			
			if ($result!=null) {		
				$resultCount = count($result);
				if ($resultCount==1) {
					echo '<div>Showing <b>'.count($result).'</b> result found.</div>';
				}
				else {
					echo '<div>Showing <b>'.count($result).'</b> results found.</div>';			
				}			

				echo "<br/>";
				echo "<table class='search-result'>";
				
				$iCount = 1;
				foreach ($result as $value) {
		//			echo $value['report_description'];			
	/*	
					echo $value['patient_name'];				
					echo "<br/><br/>";
	*/
		?>				
		
					  <tr class="row">
						<td class ="column">				
							<a href="#" id="imageFileId<?php echo $iCount?>" onclick="copyText(<?php echo $iCount?>)">
								<div>
									<img class="Image-file" src="<?php echo base_url($value["image_filename"]);?>">
								</div>								
							</a>
						</td>
					  </tr>
		<?php				
					$iCount++;		
//					echo "<br/>";
				}				
				
				echo "</table>";				
				echo "<br/>";				
				echo '<div>***NOTHING FOLLOWS***';	
			}
			else {					
				echo '<div>';					
				echo 'Your search <b>- '.$nameParam.' -</b> did not match any of our patients\' names.';
				echo '<br><br>Recommendation:';
				echo '<br>&#x25CF; Reverify that the patient is <b>not</b> new.';				
				echo '<br>&#x25CF; Reverify that the spelling is correct.';				
				echo '</div>';					
			}			
		}
	?>
	
	<br/>
	<div class="copyright">
		<!-- TO-DO: -add: automatically write the present year -->
		<span>© Usbong Social Systems, Inc. 2011~2020. All rights reserved.</span>
	</div>	
  </body>
</html>