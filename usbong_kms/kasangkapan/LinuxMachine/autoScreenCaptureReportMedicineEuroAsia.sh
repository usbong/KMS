#!/bin/bash

# @echo off
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
# @date created: 20210225
# @date updated: 20220325; from 20220324
# @website address: http://www.usbong.ph
#
# References:
# 1) https://phantomjs.org/; last accessed: 20220325; from 20200724
# --> downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
# --> https://phantomjs.org/download.html; last accessed: 20220325
#
# Notes:
# 1) verified: with Linux Machine, i.e. LUBUNTU (version LTS 20.04)
# 2) set phantomjs executable file to "Trust this executable"
# 3) put phantomjs executable file in the same directory as Bash Shell command, e.g. autoScreenCaptureReportMedicineIPCA.sh
# --> example: /opt/lampp/htdocs/usbong_kms/kasangkapan/BatchCommandsAsBashShellCommands/

# edited by Mike, 20210320
# set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
# set myDateDay=%date:~0,3%

# note: current date as yyyy-mm-dd HH:MM:SS 
#myDate=$(date '+%Y-%m-%d %H:%M:%S')
myDate=$(date '+%Y%m%d')

# print current date directly
#echo $(date '+%Y-%m-%d')

# removed by Mike, 20210225
# echo %myDateDay%

# added by Mike, 20220325
myDirectory="/opt/lampp/htdocs/usbong_kms/kasangkapan/BatchCommandsAsBashShellCommands/output/"
mkdir $myDirectory
myDirectory=$myDirectory$myDate"/"
mkdir $myDirectory

# edited by Mike, 20210225
# phantomjs saveWebPageAsImageFile.js "confirmMedicine" 
# edited by Mike, 20210320
#phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postzerodol" 
#phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postcartiflex" 

# edited by Mike, 20220324
#./phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postlagaflex" 
#./phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postdiclogen" 
./phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postcetradol" 

# edited by Mike, 20210320
#explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%

#edited by Mike, 20220324
#xdg-open "/opt/lampp/htdocs/usbong_kms/kasangkapan/output/"$myDate
xdg-open $myDirectory
