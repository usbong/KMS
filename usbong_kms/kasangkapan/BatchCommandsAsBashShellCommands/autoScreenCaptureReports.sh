#!/bin/bash

# @echo off
#
# Copyright 2021 USBONG SOCIAL SYSTEMS, INC. (USBONG)
# 
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# @company: USBONG SOCIAL SYSTEMS, INC. (USBONG)
# @author: SYSON, MICHAEL B.
# @date created: 20210322
# @date updated: 20210322
#
# References:
# 1) https://phantomjs.org/; last accessed: 20200724
# 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
#
# Notes:
# 1) verified: with Linux Machine, i.e. LUBUNTU (version LTS 20.04)
# 2) set phantomjs executable file to "Trust this executable"
# 3) put phantomjs executable file in the same directory as Bash Shell command, e.g. autoScreenCaptureReportMedicineIPCA.sh
# --> example: /opt/lampp/htdocs/usbong_kms/kasangkapan

# edited by Mike, 20210320
# set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
# set myDateDay=%date:~0,3%

# note: current date as yyyy-mm-dd HH:MM:SS 
#myDate=$(date '+%Y-%m-%d %H:%M:%S')
myDate=$(date '+%Y%m%d')
myDateDay=$(date '+%A')
myDateDay=${myDateDay:0:3} #get first 3 characters in string

echo $myDateDay

./phantomjs saveWebPageAsImageFile.js viewReportMedicineUnified
./phantomjs saveWebPageAsImageFile.js viewReportMedicineAsteriskUnified
# phantomjs saveWebPageAsImageFile.js viewReportNonMedicineUnified
./phantomjs saveWebPageAsImageFile.js viewReportNonMedicine
./phantomjs saveWebPageAsImageFile.js viewReportSnack

./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Pedro"
./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Peter"

# reminder: add space before and after bracket

if [ "$myDateDay" = "Mon" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Chastity"
fi
if [ "$myDateDay" = "Tue" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil"
fi
if [ "$myDateDay" = "Thu" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil"
fi
if [ "$myDateDay" = "Wed" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto"
fi
if [ "$myDateDay" = "Fri" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto"
fi
if [ "$myDateDay" = "Sat" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Gracia"
fi

./phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay
./phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay
./phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s

# edited by Mike, 20201205
# phantomjs saveWebPageAsImageFile.js viewReportPatientQueueAccounting
./phantomjs saveWebPageAsImageFile.js viewReportPatientQueue

#explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%
xdg-open "/opt/lampp/htdocs/usbong_kms/kasangkapan/output/"$myDate

