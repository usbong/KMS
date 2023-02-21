REM
REM Copyright 2020~2023 SYSON, MICHAEL B.
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
REM @date updated: 20230221; from 2020
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myDateDay=%date:~0,3%

phantomjs saveWebPageAsImageFile.js viewReportMedicineUnified
phantomjs saveWebPageAsImageFile.js viewReportMedicineAsteriskUnified
REM phantomjs saveWebPageAsImageFile.js viewReportNonMedicineUnified
phantomjs saveWebPageAsImageFile.js viewReportNonMedicine

REM added by Mike, 20201127
phantomjs saveWebPageAsImageFile.js viewReportSnack

phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Pedro"
phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Peter"

echo %myDateDay%

if "%myDateDay%"=="Mon" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Chastity"
if "%myDateDay%"=="Tue" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil"
if "%myDateDay%"=="Thu" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil"
if "%myDateDay%"=="Wed" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto"
if "%myDateDay%"=="Fri" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto"

REM removed by Mike, 20230221
REM if "%myDateDay%"=="Sat" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Gracia"

phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay
phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay
phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s

REM edited by Mike, 20211215; from 20201205
phantomjs saveWebPageAsImageFile.js viewReportPatientQueueAccounting
phantomjs saveWebPageAsImageFile.js viewReportPatientQueue

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%