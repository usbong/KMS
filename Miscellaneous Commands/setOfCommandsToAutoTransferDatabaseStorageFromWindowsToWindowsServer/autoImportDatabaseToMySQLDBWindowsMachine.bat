@ECHO OFF
REM Copyright 2022~2023 SYSON, MICHAEL B.
REM
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.destination
REM
REM Auto-import Database (DB) to MySQL Database 
REM Linux Machine
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20220328
REM @last modified: 20230206; from 20220726
REM @website address: http://www.usbong.ph
REM
REM Additional Note:
REM 1) update: the following among others:
REM    Directory location; 
REM    Database Name; username
REM
REM Reference: www.stackoverflow.com
REM

REM removed by Mike, 20230206; 
REM note: auto-executed during startup
REM cd /home/unit_member/Desktop/
REM ./startXAMPPCommandInLinuxPC.sh 

REM added by Mike, 20220713
REM note: still requires multiple execution of this BASH SHELL COMMANDS LIST due to DELAY during START

REM re-execute to verify if already running:
REM XAMPP: Starting Apache...already running.
REM XAMPP: Starting MySQL...already running.
REM XAMPP: Starting ProFTPD...already running.

REM removed by Mike, 20230206; Windows; XAMPP auto-starts 
REM echo "re-verifying XAMPP if already running..."
REM echo "--"
REM echo "XAMPP already running."

REM edited by Mike, 20230206
REM cd /opt/lampp/bin/
cd C:\xampp\mysql\bin
C:

REM auto-DROP DB: usbong_kms; force DB drop without need for additional re-verification
mysql -uroot -e "drop database usbong_kms"; 

REM auto-add new DB: usbong_kms
echo "Adding database: usbong_kms"
mysql -uroot -e "create database usbong_kms"

REM store in temporary container the newest .sql file;
REM reminder: -t : sort by time from newest at top; -n1 : first entry

REM inputMySQLFile=$(ls -t /home/unit_member/Documents/halimbawa/DB | head -n1)

REM --

REM reference: https://stackoverflow.com/questions/36284873/get-newest-file-in-directory-with-specific-extension;
REM last accessed: 20230206
REM Mofi, 20160329T1353

FOR /F "eol=| delims=" %%I IN ('DIR "D:\MOSC\DB\*.sql" /A-D /B /O-D /TW 2^>nul') DO SET "inputMySQLFile=%%I" & GOTO FoundFile
ECHO No *.sql file found!
GOTO :EOF

:FoundFile
ECHO Newest *.sql file is: "%inputMySQLFile%"

REM --

REM ./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/usbong_kmsV20220328T0845.sql
REM mysql -uroot usbong_kms < D:\MOSC\DB\usbong_kmsV20230204T1609Updated.sql

REM TO-DO: -update: username and password; -uusername -ppassword

REM ./mysql -uroot usbong_kms < /home/unit_member/Documents/halimbawa/DB/$inputMySQLFile
mysql -uroot usbong_kms < D:\MOSC\DB\%inputMySQLFile%

REM pause