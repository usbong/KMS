@echo off
REM ' Copyright 2023 SYSON, MICHAEL B.
REM '
REM ' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM '
REM ' http://www.apache.org/licenses/LICENSE-2.0
REM '
REM ' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM '
REM ' @company: USBONG
REM ' @author: SYSON, MICHAEL B.
REM ' @date created: 20230126
REM ' @date updated: 20230126
REM ' @website address: http://www.usbong.ph
REM '

REM TO-DO: -add: in task scheduler to auto-execute when OS starts

REM note: update file location
REM cd C:\Program Files\Mozilla Firefox\

cd C:\xampp\php

REM firefox.exe localhost/usbong_kms//server/autoSetSelectMySQLGlobalVariables.php

REM https://stackoverflow.com/questions/4301975/how-can-i-run-a-php-without-a-web-server;
REM last accessed: 20230126
REM answer by: Michal M, 20120825T1153; from 20101129T0836

REM note: remove HTML instructions in autoSetSelectMySQLGlobalVariables.php to remove OUTPUT log text
php.exe "C:\xampp\htdocs\usbong_kms\server\autoSetSelectMySQLGlobalVariables.php"

pause