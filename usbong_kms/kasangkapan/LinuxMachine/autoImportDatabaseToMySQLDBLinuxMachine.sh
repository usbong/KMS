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
# @last modified: 20220329; from 20220328
# @website address: http://www.usbong.ph
#
# Reference: www.stackoverflow.com
#

cd /home/unit_member/Desktop/
./startXAMPPCommandInLinuxPC.sh 

cd /opt/lampp/bin/

#auto-DROP DB: usbong_kms; force DB drop without need for additional re-verification
./mysqladmin -uroot drop -f usbong_kms 

#auto-add new DB: usbong_kms
./mysql -uroot -e "create database usbong_kms"

# store in temporary container the newest .sql file;
#reminder: -t : sort by time from newest at top; -n1 : first entry
inputMySQLFile=$(ls -t /home/unit_member/Documents/halimbawa/DB | head -n1)

#./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/usbong_kmsV20220328T0845.sql
#TO-DO: -update: username and password; -uusername -ppassword
./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/$inputMySQLFile

