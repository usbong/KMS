@echo OFF
REM
REM Copyright 2020~2022 USBONG
REM 
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 2020
REM @date updated: 20220408; from 20220407
REM @website address: http://www.usbong.ph
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myTime=%time:~0,2%%time:~3,2%

set myHour=%time:~0,2%

if %myHour% lss 10 (set myNewHour=0%time:~1,1%) else (set myNewHour=%myHour%)

REM echo %myNewHour%

set myNewTime=%myNewHour%%time:~3,2%

cd "C:\xampp\mysql\bin\"

C:

REM update: username and password; DB location
mysqldump -uroot usbong_kms > "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql"

REM added by Mike, 20220407
REM https://stackoverflow.com/questions/97875/rm-rf-equivalent-for-windows;
REM last accessed: 20220407; answer by: Duncan Smart, 20080918; edited by: Jim McKeeth, 20191211
REM /s = removes all directories and files
REM /q = quiet mode; no additional re-verification
REM delete input and output folders
rd /s /q "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\"
rd /s /q "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\output\"

mkdir "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\"

REM echo "hallo"

REM xcopy "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql" "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\" /y /F
echo F|xcopy "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV%myDate%T%myNewTime%.sql" "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\" /y

cd "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\"
G:
start autoUpdateFormatInputMySQLDBFile.bat
 
 
REM added by Mike, 20220407; removed by Mike, 20220408
REM note: computer instructions to execute LOOP
REM add this after start autoUpdateFormatInputMySQLDBFile.bat
REM :loop
REM REM	if exist "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\output\" (
REM	if exist "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\output\*.sql" (
REM		goto :exit_loop
REM	)
REM goto loop
REM :exit_loop
 
REM xcopy "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\output\usbong_kmsV"%myDate%"T"%myNewTime%"Updated.sql" "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%"Updated.sql" /y /F
REM echo F| xcopy "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\output\usbong_kmsV%myDate%T%myNewTime%Updated.sql" "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%"Updated.sql" /y

cd "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin"
C:

REM echo "pause"
REM pause

exit
