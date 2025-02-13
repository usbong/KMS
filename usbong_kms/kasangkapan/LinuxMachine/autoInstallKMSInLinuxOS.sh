#!/bin/bash

# @echo off
#
# Copyright 2022 USBONG
# 
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Auto-install Knowledge Management System (KMS) in Linux Operating System (OS)
# verified: with LUBUNTU (20.04 LTS)
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20220325
# @date updated: 20220326; from 20220325
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

# added by Mike, 20220325
mkdir $myDirectory"/noonReport/"

# added by Mike, 20220325
mkdir "/home/unit_member/MOSC/output/"
mkdir "/home/unit_member/MOSC/output/informationDesk/"
mkdir "/home/unit_member/MOSC/output/informationDesk/cashier/"

# Reference: https://askubuntu.com/questions/158735/how-to-set-permissions-so-that-i-can-read-and-write-to-another-partition;
# last accessed: 20220326
# answer by: Luis Alvarado, 20120702; edited 20120702

# reminder:
#7 - Full (Read, Write & Execute)
#6 - read and write
#5 - read and execute
#4 - read only
#3 - write and execute
#2 - write only
#1 - execute only
#0 - none 
#owner, group, user
chmod 777 "/home/unit_member/MOSC/output/informationDesk/cashier/"

# added by Mike, 20220326
mkdir "/home/unit_member/MOSC/DB/"
sudo chmod 644 "/opt/lampp/etc/my.cnf"

if [ ! -f ./phantomjs ]; then
	echo "phantomjs does NOT yet exist in this directory."
	#part 1 download file
	wget https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-2.1.1-linux-x86_64.tar.bz2

	#part 2; install via extract file
	#reference: https://askubuntu.com/questions/25347/what-command-do-i-need-to-unzip-extract-a-tar-gz-file;
	#last accessed: 20223025
	#removed "z" in "-xvzf" to be "-xvf"
	#edited by Mike, 20220325
	#auto-identify file version, e.g.  2.1.1
	#tar -xvf phantomjs-2.1.1-linux-x86_64.tar.bz2
	#cp ./phantomjs-2.1.1-linux-x86_64/bin/phantomjs ./
	tar -xvf phantomjs-*-linux-x86_64.tar.bz2
	cp ./phantomjs-*-linux-x86_64/bin/phantomjs ./
	
	#TO-DO: -add: auto-delete excess files;	
else
	echo "phantomjs already exists in this directory."
fi

#added by Mike, 20220326
sudo apt-get install python3

#TO-DO: -update: this
