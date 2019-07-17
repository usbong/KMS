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
' @date updated: 20190715
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
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
							width: 42%
						}

    /**/
    </style>
    <title>
      Lessons-learned Report
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
  <body>
	<h3>
	Lessons-learned Report (Usbong Training Template)
	</h3>
	<span>
	a reflective statement documenting important things you have learned from doing the training project
	</span>
	<br />
	<br />
	<!-- Form -->
	<form id="report-form" method="post" action="<?php echo site_url('report/confirm')?>">
		<?php
			$itemCounter = 1;
		?>
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>Name (Last Name, First Name)*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>				
				  <input type="text" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required>
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
				  <b><span>1) Were the project goals met?*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
					<label><input type="radio" name="reportParam<?php echo $itemCounter;?>" value="1" checked>Yes</label>
				</td>
			  </tr>
			  <tr>
				<td>
					<label><input type="radio" name="reportParam<?php echo $itemCounter;?>" value="2">No</label>
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
				  <b><span>2) Was the project successful?*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
					<label><input type="radio" name="reportParam<?php echo $itemCounter;?>" value="1" checked>Yes</label>
				</td>
			  </tr>
			  <tr>
				<td>
					<label><input type="radio" name="reportParam<?php echo $itemCounter;?>" value="2">No</label>
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
				  <b><span>3) Your reflections on #1 & #2?*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 3 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
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
				  <b><span>4) Give comments on the use of different project management tools and techniques.*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 4 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
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
				  <b><span>5) What are the causes of variances (i.e. difference between what is expected and what is actually accomplished) on the project?*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 5 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>
		</div>	
		<br />
		<br />

		<!-- Question 6 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>6) What is your reasoning behind the corrective actions that your team chose?*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 6 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>
		</div>	
		<br />
		<br />

		<!-- Question 7 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>7) Describe one example of what went right on this project.*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 7 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>			
		</div>	
		<br />
		<br />

		<!-- Question 8 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>8) Describe one example of what went wrong on this project.*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 8 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>						
		</div>	
		<br />
		<br />

		<!-- Question 9 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>9) What will you do differently on the next project based on your experience working on this project?*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 9 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
				</td>
			  </tr>
			</table>
			<?php
				$itemCounter++;
			?>									
		</div>	
		<br />
		<br />

		<!-- Question 10 -->
		<div>
			<table width="100%">
			  <tr>
				<td>
				  <b><span>10) Give your personal words of wisdom based on your team's experiences.*</span></b>
				</td>
			  </tr>
			  <tr>
				<td>
						<!-- Answer 10 -->
						<textarea rows="5" class="report-input" placeholder="" name="reportParam<?php echo $itemCounter;?>" required></textarea>						
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
			  <b><span>References:</span></b>
			</td>
		  </tr>
		  <tr>
			<td>
			  <span>[1] Schwalbe, K. 2008. Information Technology Project Management, Fifth Edition. Philippines: Cengage Learning Asia Pte Ltd.</span>
			</td>
		  </tr>
		  <tr>
			<td>
			  <span>[2] HireRight Inc.'s Employment Verification Request</span>
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