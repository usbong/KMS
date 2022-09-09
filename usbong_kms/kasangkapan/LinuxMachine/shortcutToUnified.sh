#!/bin/bash

# Copyright 2020~2022 SYSON, MICHAEL B.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Auto-execute UNIFIED command for report generation via Linux PC
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20220909
# @last modified: 20220909
# @website address: http://www.usbong.ph
#
# Note
# 1) Set the following to be Trusted executable:
# 1.1) unified.sh
# 1.2) viewAllReportsForTheDayUnified.sh
# 1.3) autoScreenCaptureReports.sh

## TO-DO: -update: this

sInputDirectory="/opt/lampp/htdocs/usbong_kms/kasangkapan/LinuxMachine";

if [ ! -e $sInputDirectory ]; then
	$sInputDirectory = "/var/www/html/htdocs/usbong_kms/kasangkapan/LinuxMachine";
fi

cd $sInputDirectory;

echo $sInputDirectory;

ls;

./unified.sh;

#xdg-open $sInputDirectory&;
