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
REM @date created: 20220406
REM @date updated: 20240301; from 20220408
REM website address: http://www.usbong.ph
REM
REM Example input file: usbong_kmsV20220405T0834.sql
REM where: 20220405: YYYYMM

REM java -cp ./software: autoUpdateFormatInputMySQLDBFile input/*.sql
REM Windows Machine
java -cp ./software; autoUpdateFormatInputMySQLDBFile input/*.sql C:/MOSC/DB/

REM exit
pause