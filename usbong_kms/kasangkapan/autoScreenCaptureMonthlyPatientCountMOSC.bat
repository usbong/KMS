@echo off
REM  Copyright 2020~2024 SYSON, MICHAEL B.
REM
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20201016
REM @date updated: 20240401; FROM 20231002
REM @website address: http://www.usbong.ph
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

REM added by Mike, 20210702
cd "MOSC\add-on software\"
call generateMOSCSummaryReportDailyCount.bat
cd ..
cd ..

phantomjs saveWebPageAsImageFile.js MOSCSummaryReportDailyCountOutput -k

REM edited by Mike, 20240401
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


REM edited by Mike, 20231002
REM explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%
explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\output\"%myDate%

PAUSE