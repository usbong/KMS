#!/bin/bash

#@echo off
#
# Copyright 2021~2022 USBONG
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20210322
# @date updated: 20220325; from 20210322
# @website address: http://www.usbong.ph
#
# Reference:
# 1) https://phantomjs.org/; last accessed: 20200724
# 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
#

./phantomjs saveWebPageAsImageFile.js getSalesReportsForTheDay -s -noon
./phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s -noon

#./phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s -noon
./phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheNoonDay -s -noon
./phantomjs saveWebPageAsImageFile.js viewReportPatientQueueAccounting -n -noon

#edited by Mike, 20210322
#set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
#note: current date as yyyy-mm-dd HH:MM:SS 
#myDate=$(date '+%Y-%m-%d %H:%M:%S')
myDate=$(date '+%Y%m%d')

#explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%

#explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%"\noonReport\"
#edited by Mike, 20220325
xdg-open "/opt/lampp/htdocs/usbong_kms/kasangkapan/BatchCommandsAsBashShellCommands/output/"$myDate"/noonReport/"
