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
REM @date updated: 20220316; from 20200730
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myTime=%time:~0,2%%time:~3,2%

set myHour=%time:~0,2%

if %myHour% lss 10 (set myNewHour=0%time:~1,1%) else (set myNewHour=%myHour%)

echo %myNewHour%

set myNewTime=%myNewHour%%time:~3,2%

cd "C:\xampp\mysql\bin\"

C:

REM update: username and password; DB location
mysqldump -uroot usbong_kms > "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql"