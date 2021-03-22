#!/bin/bash

#@echo off
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# @author: Michael Syson
# @date created: 20210322
# @date updated: 20210322
#
# Reference:
# 1) https://phantomjs.org/; last accessed: 20200724
# 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
#
# Note:
# 1) set: in usbong_kms/server/viewSummaryReportForTheDay.php $filename value of file location

#added by Mike, 20210322
#TO-DO: -update: instructions to eliminate excess steps

# update input and output files
sInput="viewSummaryReportForTheDay20200909"
sOutput="viewSummaryReportForTheDay20200909"

echo $sInput

# note: "-s" keyword to use PHP Command usbong_kms/server/ folder
./phantomjs saveWebPageAsImageFile.js "/"$sInput -s

#note: current date as yyyy-mm-dd HH:MM:SS 
#myDate=$(date '+%Y-%m-%d %H:%M:%S')
myDate=$(date '+%Y%m%d')

#explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\".%sOutput%
xdg-open "/opt/lampp/htdocs/usbong_kms/kasangkapan/output/"$myDate"/"$sOutput
