#!/bin/bash

# @echo off
#
# Copyright 2021~2022 SYSON, MICHAEL B.
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
# @date updated: 20220326; from 20210322
# @website address: http://www.usbong.ph
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
# 4) update: input/kasangkapanConfig.txt to set computer server address
# --> default: http://localhost

#added by Mike, 20220326
myDirectory="/opt/lampp/htdocs/usbong_kms/kasangkapan/BatchCommandsAsBashShellCommands/output/"

# edited by Mike, 20210320
# set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
# set myDateDay=%date:~0,3%

# note: current date as yyyy-mm-dd HH:MM:SS 
#myDate=$(date '+%Y-%m-%d %H:%M:%S')
myDate=$(date '+%Y%m%d')
myDateDay=$(date '+%A')
myDateDay=${myDateDay:0:3} #get first 3 characters in string

echo $myDateDay

#cat ./input/kasangkapanConfig.txt
#note: python -c 'print "hallo"'
#edited by Mike, 20220326
#note: python -c 'print("hallo")'

if [ -e ./input/kasangkapanConfig.txt ]; then
#edited by Mike, 20220326
#	myComputerServerAddress=$(cat ./input/kasangkapanConfig.txt | python -c 'import json,sys;obj=json.load(sys.stdin);print obj["computerServerAddress"]')
	myComputerServerAddress=$(cat ./input/kasangkapanConfig.txt | python3 -c 'import json,sys;obj=json.load(sys.stdin);print(obj["computerServerAddress"])')

else 
	echo "Computer: \"./input/kasangkapanConfig.txt\" does not exist.";
	echo "Computer: We use as default computer server address: \"http://localhost\".";
fi 

echo $myComputerServerAddress

#edited by Mike, 20210321
# ./phantomjs saveWebPageAsImageFile.js viewReportMedicineUnified http://192.168.1.10
./phantomjs saveWebPageAsImageFile.js viewReportMedicineUnified $myComputerServerAddress

./phantomjs saveWebPageAsImageFile.js viewReportMedicineAsteriskUnified $myComputerServerAddress
# phantomjs saveWebPageAsImageFile.js viewReportNonMedicineUnified
./phantomjs saveWebPageAsImageFile.js viewReportNonMedicine $myComputerServerAddress
./phantomjs saveWebPageAsImageFile.js viewReportSnack $myComputerServerAddress

./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Pedro" $myComputerServerAddress
./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Peter" $myComputerServerAddress

# reminder: add space before and after bracket

if [ "$myDateDay" = "Mon" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Chastity" $myComputerServerAddress
fi
if [ "$myDateDay" = "Tue" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil" $myComputerServerAddress
fi
if [ "$myDateDay" = "Thu" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil" $myComputerServerAddress
fi
if [ "$myDateDay" = "Wed" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto" $myComputerServerAddress
fi
if [ "$myDateDay" = "Fri" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto" $myComputerServerAddress
fi
if [ "$myDateDay" = "Sat" ]; then ./phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Gracia" $myComputerServerAddress
fi

./phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay $myComputerServerAddress
./phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay $myComputerServerAddress
./phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s $myComputerServerAddress

# edited by Mike, 20201205
# phantomjs saveWebPageAsImageFile.js viewReportPatientQueueAccounting
./phantomjs saveWebPageAsImageFile.js viewReportPatientQueue $myComputerServerAddress

#explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%
#edited by Mike, 20220326
#xdg-open "/opt/lampp/htdocs/usbong_kms/kasangkapan/output/"$myDate
xdg-open $myDirectory$myDate
