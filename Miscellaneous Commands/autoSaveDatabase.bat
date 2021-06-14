@echo off
REM Copyright 2021 USBONG SOCIAL SYSTEMS, INC. (USBONG)
REM
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM Auto-save MySQL Database with Windows Personal Computer (PC)
REM company: USBONG
REM author: SYSON, MICHAEL B.
REM date created: 20210613
REM last updated: 20210614
REM @website address: http://www.usbong.ph

set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myTime=%time:~0,2%%time:~3,2%

echo %myTime%

cd "C:\xampp\mysql\bin\"

C:

REM TO-DO: -update: time to include zero if <10

REM note: add: password after "-p" to auto-save 
REM without need to enter the password as input with every execution
mysqldump -uroot -p usbong_kms > "C:\Usbong\DB\SLHCC\usbong_kmsSLHCCV"%myDate%
rem "T"%myTime%

pause
