#!/bin/bash

# Copyright 2022 SYSON, MICHAEL B.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Auto-import Database (DB) to MySQL Database 
# Linux Machine
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20220328
# @last modified: 20220331; from 20220330
# @website address: http://www.usbong.ph
#
# Reference: www.stackoverflow.com
#

cd /home/unit_member/Desktop/
./startXAMPPCommandInLinuxPC.sh 

# re-execute to verify if already running:
#XAMPP: Starting Apache...already running.
#XAMPP: Starting MySQL...already running.
#XAMPP: Starting ProFTPD...already running.
echo "re-verifying XAMPP if already running..."
while ./startXAMPPCommandInLinuxPC.sh | grep "...ok"; do
	./startXAMPPCommandInLinuxPC.sh
done

echo "--"
echo "XAMPP already running."

#added by Mike, 20220331
#note: re-verify: mount error(16): Device or resource busy
#current solution: execute: "accessDatabaseStorageInWindowsPCFromLinuxPC.sh" first before "autoImportDatabaseToMySQLDBLinuxMachine.sh"
./accessDatabaseStorageInWindowsPCFromLinuxPC.sh

cd /opt/lampp/bin/

#auto-DROP DB: usbong_kms; force DB drop without need for additional re-verification
./mysqladmin -uroot drop -f usbong_kms 

#auto-add new DB: usbong_kms
echo "Adding database: usbong_kms"
./mysql -uroot -e "create database usbong_kms"

# store in temporary container the newest .sql file;
#reminder: -t : sort by time from newest at top; -n1 : first entry
inputMySQLFile=$(ls -t /home/unit_member/Documents/halimbawa/DB | head -n1)

#./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/usbong_kmsV20220328T0845.sql
#TO-DO: -update: username and password; -uusername -ppassword
./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/$inputMySQLFile


