@echo OFF
REM
REM Copyright 2020~2024 USBONG
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
REM @date updated: 20240302; from 20240301
REM @website address: http://www.usbong.ph
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

REM added by Mike, 20240301
REM note change "C:" to the correct directory, e.g. "D:"

REM edited by Mike, 20240301
REM Windows 7
set myDate=%date:~10,4%%date:~4,2%%date:~7,2%

REM auto-identify date format;
REM based on location of first forward slash, i.e. /
REM January 9, 2024, Tuesday
REM in Windows 7, %date% outputs: Tue 01/09/2024
REM in Windows 11, 09/01/2024

REM note: local date format; dd/mm/yyyy (default in Windows 11)
REM may vary depending on the settings;
REM 09/01/2024
REM year, %date:~6,4%
REM month, %date:~3,2%
REM day, %date:~0,2%

REM set myDate=%date:~6,4%%date:~3,2%%date:~0,2%

REM set myDateSlashLocation=/ 
set myDateSlashLocation=%date:~2,1%

REM echo %myDateSlashLocation%

REM Windows 11 format
if %myDateSlashLocation%==/ (
REM	echo "DITO"	
	set myDate=%date:~6,4%%date:~3,2%%date:~0,2%
)


set myTime=%time:~0,2%%time:~3,2%

set myHour=%time:~0,2%

if %myHour% lss 10 (set myNewHour=0%time:~1,1%) else (set myNewHour=%myHour%)

REM echo %myNewHour%

set myNewTime=%myNewHour%%time:~3,2%

cd "C:\xampp\mysql\bin\"

C:

REM update: username and password; DB location

REM edited by Mike, 20230925
REM mysqldump -uroot usbong_kms > "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql"

REM edited by Mike, 20240301
REM mysqldump -uroot usbong_kms > "D:\MOSC\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql"
mysqldump -uroot usbong_kms > "C:\MOSC\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql"


REM added by Mike, 20220407
REM https://stackoverflow.com/questions/97875/rm-rf-equivalent-for-windows;
REM last accessed: 20220407; answer by: Duncan Smart, 20080918; edited by: Jim McKeeth, 20191211
REM /s = removes all directories and files
REM /q = quiet mode; no additional re-verification
REM delete input and output folders

REM edited by Mike, 20230925
REM rd /s /q "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\"
REM rd /s /q "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\output\"

REM mkdir "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\"

REM edited by Mike, 20240301
REM rd /s /q "D:\MOSC\DB\add-on software\input\"
REM rd /s /q "D:\MOSC\DB\add-on software\output\"
REM
REM mkdir "D:\MOSC\DB\add-on software\input\"
rd /s /q "C:\MOSC\DB\add-on software\input\"
rd /s /q "C:\MOSC\DB\add-on software\output\"
REM
mkdir "C:\MOSC\DB\add-on software\input\"


REM echo "hallo"


REM xcopy "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql" "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\" /y /F

REM edited by Mike, 20230925
REM echo F|xcopy "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV%myDate%T%myNewTime%.sql" "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\input\" /y

REM cd "G:\Usbong MOSC\Everyone\Information Desk\DB\add-on software\"
REM G:

REM edited by Mike, 20240301
REM echo F|xcopy "D:\MOSC\DB\usbong_kmsV%myDate%T%myNewTime%.sql" "D:\MOSC\DB\add-on software\input\" /y
REM
REM cd "D:\MOSC\DB\add-on software\"
REM D:
echo F|xcopy "C:\MOSC\DB\usbong_kmsV%myDate%T%myNewTime%.sql" "C:\MOSC\DB\add-on software\input\" /y

cd "C:\MOSC\DB\add-on software\"
C:



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
