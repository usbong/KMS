@echo off
REM
REM Copyright 2021~2023 SYSON, MICHAEL B.
REM 
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20210225
REM @date updated: 20230811; from 20230426
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myDateDay=%date:~0,3%

REM removed by Mike, 20210225
REM echo %myDateDay%

REM edited by Mike, 20210225
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine" 
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postdiclogen" 
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postcelcoxx" 
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postcelcoxx" ") 400"
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine/_poststarcox"
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postgabica" 
phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postgabix"
REM phantomjs saveWebPageAsImageFile.js "confirmMedicine/_postreventa"

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%