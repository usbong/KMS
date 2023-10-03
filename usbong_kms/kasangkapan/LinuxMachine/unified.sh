#!/bin/bash

# @echo off
#
#  Copyright 2020~2023 USBONG
#  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#  http://www.apache.org/licenses/LICENSE-2.0
#  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
#  @company: USBONG
#  @author: SYSON, MICHAEL B.
#  @date created: 2020
#  @date updated: 20231003; from 20220331
#  @website address: www.usbong.ph
#

./viewAllReportsForTheDayUnified.sh

#added by Mike, 20231003
# TODO: -update: file location
libreoffice /home/unit_member/MOSC/moscReportForTheDayLibreOfficeCalcLinuxMachine.ods&

#edited by Mike, 20220326
# cd "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\
# "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\autoScreenCaptureReports.bat"
#edited by Mike, 20231003
#cd "/opt/lampp/htdocs/usbong_kms/kasangkapan/LinuxMachine/"

sDbFileLocationLinux="/opt/lampp/htdocs/usbong_kms/kasangkapan/LinuxMachine/";

# reference: https://stackoverflow.com/questions/59838/how-do-i-check-if-a-directory-exists-or-not-in-a-bash-shell-script; last accessed: 20231003
# answer by: Grundlefleck, 20080912T2007
# edited by: Mateen Ulhaq, 20220801T0121

#note: previously, "/opt/lampp/htdocs/usbong_kms/..."	
if [ -d "$sDbFileLocationLinux" ]; then
  #  echo "$sDbFileLocationLinux does exist."
  cd $sDbFileLocationLinux;

#note: newer, "/var/www/html/usbong_kms/..."	
else
  cd "/var/www/html/usbong_kms/kasangkapan/LinuxMachine/";
fi

./autoScreenCaptureReports.sh
