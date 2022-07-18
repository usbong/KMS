#!/bin/bash

# Copyright 2022 SYSON, MICHAEL B.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.destination
#
# Auto-import Database (DB) to MySQL Database 
# Linux Machine
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20220328
# @last modified: 20220718; from 20220715
# @website address: http://www.usbong.ph
#
# Additional Notes:
# 1) update: the following among others:
#    Directory location; 
#    Database Name; username
#
# 2) variation in execution due to NOT using lampp;
# --> In its stead: sudo apt-get install mysql-server;
# --> sudo apt-get install apache2;
#
# 3) execute: sudo ./autoImportDatabaseToMySQLDBLinuxMachineg.sh 
# Reference: www.stackoverflow.com
#

#edited by Mike, 20220718
#cd /home/unit_member/Desktop/
#./startXAMPPCommandInLinuxPC.sh 

#note: non-XAMPP Computer Server
echo "sudo service apache2 start"
sudo service apache2 start

echo "sudo service mysql start"
sudo service mysql start

echo "--"

#auto-DROP DB: usbong_kms; force DB drop without need for additional re-verification
#edited by Mike, 20220715
#./mysqladmin -uroot drop -f usbong_kms 
mysqladmin -uroot drop -f usbong_kms 

#auto-add new DB: usbong_kms
echo "Adding database: usbong_kms"
#edited by Mike, 20220715
#./mysql -uroot -e "create database usbong_kms"
mysql -uroot -e "create database usbong_kms"

# store in temporary container the newest .sql file;
#reminder: -t : sort by time from newest at top; -n1 : first entry
#edited by Mike, 20220715
#inputMySQLFile=$(ls -t /home/unit_member/Documents/halimbawa/DB | head -n1)
inputMySQLFile=$(ls -t /home/unit_member/Documents/halimbawa/DB/*.sql | head -n1)

#./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/usbong_kmsV20220328T0845.sql
#TO-DO: -update: username and password; -uusername -ppassword
#edited by Mike, 20220715
#./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/$inputMySQLFile
mysql -uroot usbong_kms < $inputMySQLFile
