@echo off
REM Copyright 2020~2023 SYSON, MICHAEL B.
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
REM @last modified: 20230206; from 20230204
REM @website address: http://www.usbong.ph
REM

REM access destination folder
rem sudo mkdir /mnt/myMOSC-AccountingFolder/

REM update source location
REM source: from Windows machine, e.g. Windows 7, Service Pack 1
REM Example:
REM source="//192.168.11.55/accounting/"
REM source="//192.168.11.55/information desk/"
set source="\\MOSC-ACCOUNTING\"information desk"

REM echo "source: "$source
echo "source: "%source%

REM update destination location
REM destination: to Linux machine, e.g. LUBUNTU 20.04 LTS
REM destination="D:\MOSC"
REM destination: to Windows machine, e.g. Windows 7
REM set destination="D:\MOSC"
set destination="D:\MOSC\DB"

REM echo "destination: "$destination
echo "destination: "%destination%

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
xcopy /d "\DB\usbong_kmsV202302*" %destination%

REM unmount
popd "%~dp0"

autoImportDatabaseToMySQLDBWindowsMachine.bat
