@echo off
REM Copyright 2020~2024 SYSON, MICHAEL B.
REM
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM Access and Save Database Storage in Windows PC from Windows PC
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20201001
REM @last modified: 20240302; from 20231206
REM @website address: www.usbong.ph
REM

REM edited by Mike, 20240301
REM Windows 7
set myDate=%date:~10,4%%date:~4,2%%date:~7,2%

REM note: no add the day of previous Month at start day of new Month
REM echo %date:~10,4%(%date:~4,2%-1)
REM set myInputMonth=%date:~10,4%%date:~4,2%
set myInputMonth=%date:~6,4%%date:~3,2%

REM echo %myInputMonth%

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

REM note: no add the day of previous Month at start day of new Month
REM set myInputMonth=%myDate:~4,2% REM Month only
set myInputMonth=%myDate:~0,6%

REM echo %myDate:~4,2%

echo %myInputMonth%

REM access destination folder
rem sudo mkdir /mnt/myMOSC-AccountingFolder/

REM update source location
REM source: from Windows machine, e.g. Windows 7, Service Pack 1
REM Example:
REM source="//192.168.11.55/accounting/"
REM source="//192.168.11.55/information desk/"
REM set source="\\MOSC-ACCOUNTING\"information desk"

REM reminder: File Explorer -> Network -> halimbawa_unit;
REM connect via username and password
REM set source="\\ORTHOANDPTUNIT\MOSC\DB"
set source="\\USBONG-HAL\MOSC\DB\"

REM echo "source: "$source
REM echo "source: "%source%

REM update destination location
REM destination: to Linux machine, e.g. LUBUNTU 20.04 LTS
REM destination="D:\MOSC"
REM destination: to Windows machine, e.g. Windows 7
REM set destination="D:\MOSC"
REM set destination="D:\MOSC\DB"
REM edited by Mike, 20240302
set destination="C:\MOSC\DB\"


REM echo "destination: "$destination
REM echo "destination: "%destination%

REM Note: add quotation marks, e.g. in $source
REM TO-DO: add: auto-read from external file password=halimbawaValue
REM sudo mount -t cifs "$source" "$destination" -o user=unit_member

REM https://stackoverflow.com/questions/40996943/use-of-pushd-and-popd-command-with-unc-path;
REM last accessed: 20230204
REM geisterfurz007, 20161207T0629; from 20161206T1412

REM note: pushd COMMAND to mount location and enter the directory
REM pushd
REM note: pushd COMMAND to unmount location
REM popd

REM note: "%~dp0" is current directory
REM pushd "%~dp0"
pushd %source%

REM no need to copy files with the same datetime stamp
REM TO-DO: -update: this
REM xcopy /d "\DB\usbong_kmsV20230204*" %destination%
REM edited by Mike, 20230207
REM xcopy /d "\DB\usbong_kmsV202302*" %destination%

REM edited by Mike, 20230517
REM xcopy /d "\DB\usbong_kmsV%myInputMonth%*" %destination%
REM no need to wait for answer to overwrite question; "/Y"
xcopy /d "\DB\usbong_kmsV%myInputMonth%*" %destination% /Y

REM unmount
popd "%~dp0"

autoImportDatabaseToMySQLDBWindowsMachine.bat
