#!/bin/bash

# @echo off
#
#  Copyright 2020~2022 SYSON, MICHAEL B.
#  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#  http://www.apache.org/licenses/LICENSE-2.0
#  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
#  @company: USBONG
#  @author: SYSON, MICHAEL B.
#  @date created: 2020
#  @date updated: 20220326; from 20220730
#  @website address: http://www.usbong.ph
#
#  Reference:
#	1) https://phantomjs.org/; last accessed: 20200724
#	2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725

# note: current date as yyyy-mm-dd HH:MM:SS 
#myDate=$(date '+%Y-%m-%d %H:%M:%S')
myDate=$(date '+%Y%m%d')
myDateDay=$(date '+%A')
myDateDay=${myDateDay:0:3} #get first 3 characters in string

#echo $myDateDay

echo $myDate

myNewTime=$(date '+%H%M')

echo $myNewTime

#edited by Mike, 20220326
#cd "C:\xampp\mysql\bin\"
cd "/opt/lampp/bin/"

# update: username and password; DB location
./mysqldump -uroot usbong_kms > "/home/unit_member/MOSC/DB/usbong_kmsV"$myDate"T"$myNewTime".sql"
