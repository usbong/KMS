<!--
' Copyright 2020~2024 Usbong
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @author: Michael Syson
' @date created: 20200306
' @date updated: 20240629; from 20210110
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
							font-size: 11pt;

							/* This makes the width of the output page that is displayed on a browser equal with that of the printed page. */
							width: 670px
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
						
						div.itemName
						{
							text-align: left;
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
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						tr.rowEvenNumber {
							background-color: #dddddd; 
							border: 1pt solid #00ff00;		
						}
						
						td.tableHeaderColumn
						{
							/*background-color: #00ff00; */
							background-color: #ffffff;
							
							/*border: 1pt solid #00ff00;*/
							border: 1pt solid black;
							
							text-align: center;
							font-weight: bold;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: right
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

						.Quantity-textbox { 
							background-color: #fCfCfC;
							color: #68502b;
							padding: 12px;
							font-size: 16px;
							border: 1px solid #68502b;
							width: 20%;
							border-radius: 3px;	    	    

							float: left;
						}
						
						.Button-purchase {
/*							padding: 8px 42px 8px 42px;
*/
							padding: 12px;
							background-color: #ffe400;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 4px;

							float: left;
							margin-left: 4px;
						}

						.Button-purchase:hover {
							background-color: #d4be00;
						}

						a.rowLink
						{
							color: rgb(0,0,0); /* black */
							text-decoration: none;
						}						

        /*------------------*/
        /* Modal            */
        /*------------------*/

        .modal-header {
            padding-bottom: 0px;
            border-bottom: none;
        }

        .modal-body {
            font-size: 15px;
            color: rgb(75, 75, 75);
        }

        .modal-footer {
            padding-top: 0px;
            border-top: none;
        }
		
    /**/
    </style>
    <title>
      Medicine Price List
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  </head>
	  <script>
	  </script>
  <body>
	<table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img class="Image-moscLogo" src="<?php echo base_url('assets/images/moscLogo.jpg');?>">		
			<img class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				Medicine Price List Report
			</h2>		
		</td>
	  </tr>
	</table>
	<br />
	<div><b>DATE: </b><?php echo strtoupper(date("Y-m-d, l"));?>
	<br />
	<br />

	<?php	
		$dTotalFee = 0;
		$iTotalQuantity = 0;
		

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
				
				//add: table headers
?>				
					  <tr class="row">
						<td class ="tableHeaderColumn">				
							<?php
								echo "COUNT";
							?>
						</td>
						<td class ="tableHeaderColumn">				
				<?php
								echo "ITEM ID";
				?>		
						</td>
						<td class ="tableHeaderColumn">				
							<?php
								echo "ITEM NAME";
							?>
						</td>
						<td class ="tableHeaderColumn">				
							<?php
								echo "ITEM PRICE";
							?>
						</td>						
					  </tr>
<?php			
				//edited by Mike, 20240629
				$iCount = 0; //1;
				foreach ($result as $value) {
					
				//added by Mike, 20240629
			    if ($iCount % 2 == 0) { //even number
				  echo '<tr class="rowEvenNumber">';
			    }
			    else {
				  echo '<tr class="row">';
			    }				   				
				//$iCount = $iCount + 1;					
		?>				
<!-- //edited by Mike, 20240629		
					  <tr class="row">
-->					  
						<td class ="column">				
								<div id="itemCountId<?php echo $iCount?>">
							<?php
								//edited by Mike, 20240629
								echo ($iCount+1); //$iCount
							?>
								</div>
						</td>
						<td class ="column">				
								<div>
				<?php
								echo $value['item_id'];
				?>		
								</div>
						</td>						
						<td class ="column">				
							<a target='_blank' class='rowLink' href='<?php echo site_url('browse/viewItemMedicine/'.$value['item_id'])?>' id="viewItemId<?php echo $iCount?>">
								<div class="itemName">
				<?php
								echo $value['item_name'];
				?>		
								</div>
							</a>
						</td>
						<td class ="column">				
								<div id="itemPriceId<?php echo $iCount?>">
				<?php
								echo $value['item_price'];
				?>		
								</div>
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
				echo "<br/>There are no transactions for the day.";
			}
		}
	?>	
	<br />
	<br />
	<br />
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y")?>. All rights reserved.</span>
	</div>		 
  </body>
</html>