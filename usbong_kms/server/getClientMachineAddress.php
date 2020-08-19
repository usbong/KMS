<?php
/*
  Copyright 2020 Usbong Social Systems, Inc.
  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
  http://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
  @author: Michael Syson
  @date created: 20200819
  @date updated: 20200819
  Input:
  1) Client computer connected to the computer network

  Output:
  1) Client computer's Machine (MAC) Address
  
  Computer Web Browser Address (Example):
  1) http://localhost/usbong_kms/server/getClientMachineAddress.php
  
*/
	//removed by Mike, 20200819
/*
	// connect to the database
	include('usbong-kms-connect.php');

	$mysqli->set_charset("utf8");
*/	
	date_default_timezone_set('Asia/Hong_Kong');

/*	//removed by Mike, 20200819
	//added by Mike, 20200524
//	$fileBasePath = "D:\Usbong\MOSC\Forms\Information Desk\output\cashier\\";
	$fileBasePath = "G:\Usbong MOSC\Everyone\Information Desk\output\informationDesk\cashier\\";
*/

	
	//TO-DO: -reverify: this
	//$ipAddress=$_SERVER['REMOTE_ADDR'];

	$macAddress = exec('getmac');
	//echo system('getmac')."<br/>";

	$macAddress = explode(" ",$macAddress)[0];

	//echo $ipAddress;
	//echo "<br/>";
	echo "Your Machine Address Output: ".$macAddress;	
	
	//removed by Mike, 20200819
/*
	//close database connection
	$mysqli->close();
*/	
?>