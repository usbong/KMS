@echo OFF
REM
REM Copyright 2022 USBONG
REM 
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20221021
REM @date updated: 20221021
REM @website address: http://www.usbong.ph
REM
REM Note:
REM 1) Command solves known problem: "PORT Conflict" Error
REM 
REM Reference:
REM 1) https://lanmsngr.sourceforge.net/faq.php; last accessed: 20221021
REM

REM update: to CORRECT file location where lmc.exe (EXECUTABLE) is 
cd "C:\Program Files (x86)\LAN Messenger"
C:

REM error IF LAN MESSENGER successfully started,
REM and COMMAND re-executed; log-off account in COMPUTER
lmc /noconfig

REM pause

exit