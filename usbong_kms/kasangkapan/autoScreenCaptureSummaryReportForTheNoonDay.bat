@ECHO OFF
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
REM @date created: 20201016
REM @date updated: 20230926; from 20211102
REM @website: http://www.usbong.ph
REM
REM Reference:
REM 1) https://phantomjs.org/; last accessed: 20200724
REM 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
REM

REM added by Mike, 20201018
phantomjs saveWebPageAsImageFile.js getSalesReportsForTheDay -s -noon

REM added by Mike, 20201028
phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s -noon

REM edited by Mike, 20201018
REM phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s -noon
phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheNoonDay -s -noon
phantomjs saveWebPageAsImageFile.js viewReportPatientQueueAccounting -n -noon

REM added by Mike, 20211102
phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay
phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay


set myDate=%date:~10,4%%date:~4,2%%date:~7,2%

REM edited by Mike, 20201017
REM explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%

REM edited by Mike, 20230926
REM explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%"\noonReport\"
explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\output\"%myDate%"\noonReport\"

