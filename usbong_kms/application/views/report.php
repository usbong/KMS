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
' @date created: 20190320
' @date updated: 20190930
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
								font-size: 9pt
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
						
						textarea.report-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
						}
    /**/
    </style>
    <title>
      Incident Report
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
/*	  
		  defaultScrollWidth = 0;
		  
		  function auto_grow(element) {
			element.style.height = "5px";
			element.style.height = (element.scrollHeight*4)+"px";

			if (defaultScrollWidth == 0) {
				defaultScrollWidth = element.scrollWidth; //i.e. 42% of the width of the full width of the Browser Window
				alert("defaultScrollWidth: "+defaultScrollWidth);
			}
			else if (element.scrollWidth < defaultScrollWidth){
//				defaultScrollWidth = 100%;
				defaultScrollWidth = element.scrollWidth;
//				alert("defaultScrollWidth: "+defaultScrollWidth);

			}
				
			element.style.width = defaultScrollWidth; //(element.scrollWidth+element.scrollWidth*0.42)+"px";			
		  }
*/
	  </script>
  <body>
	<h3>
	Incident Report (Usbong Training Template)
	</h3>
	<span>
	a factual statement documenting important things
	</span>
	<br />
	<br />
	<!-- Form -->
	<form id="report-form" method="post" action="<?php echo site_url('report/confirm')?>">
		<?php
			$itemCounter = 1;
		?>
<!--		<input type="hidden" name="reportTypeIdParam" value="1" required>
-->
		<input type="hidden" name="reportTypeNameParam" value="Incident Report" required>

		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>Pangalan (Last Name, First Name) <font color="red">*</font></span></b>
				</td>
			  </tr>
			  <tr>
				<td>				
				  <input type="text" class="report-input" placeholder="" name="memberNameParam" required>
				</td>
			  </tr>
			</table>
		</div>
		<br />
		<br />
		<!-- Question 1 -->		
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>1) Petsa: <font color="red">*</font></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 1 -->
						<input type="date" class="report-input" placeholder="halimbawa: 2019-09-19" name="reportParam<?php echo $itemCounter;?>" required>	
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>
		</div>	
		<br />
		<br />

		<!-- Question 2 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>2) Oras: <font color="red">*</font></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 2 -->
						<input type="time" class="report-input" placeholder="halimbawa: 03:00 PM" name="reportParam<?php echo $itemCounter;?>" required>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>
		</div>	
		<br />
		<br />

		<!-- Question 3 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>3) Lugar: <font color="red">*</font></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 3 -->
						<textarea rows="2" class="report-input" placeholder="halimbawa: Marikina Orthopedic Specialty Clinic (MOSC)" name="reportParam<?php echo $itemCounter;?>" required></textarea>											
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>
		</div>	
		<br />
		<br />

		<!-- Question 4 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>4) Keywords: <font color="red">*</font></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 4 -->
						<textarea rows="2" class="report-input" placeholder="halimbawa: noise, regulation, theft, crime" name="reportParam<?php echo $itemCounter;?>" required></textarea>					</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>
		</div>	
		<br />
		<br />

		<!-- Question 5 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>5) Salaysay: <font color="red">*</font></span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 5 -->
						<textarea rows="6" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>			
		</div>	
		<br />
		<br />
		
		<!-- Buttons -->
		<button type="submit" class="Button-login">
			Submit
		</button>
	</form>
	<br />
	<br />
	<br />
	<br />

	<!-- References -->
	<div>
		<table width="100%">
		  <tr>
			<td>
			  <b><span>Reference:</span></b>
			</td>
		  </tr>
		  <tr>
			<td>
			  <span>[1] Barangay Sto. Niño, Marikina City, 1800, Philippines</span>
			</td>
		  </tr>
		</table>
	</div>	
	<br />
	<br />
	<br />
	<br />

	<div class="copyright">
		<span>© Usbong Social Systems, Inc. 2011~2019. All rights reserved.</span>
	</div>		 
  </body>
</html>