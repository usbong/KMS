@echo off
rem added by Mike, 20210102
rem no space before and after "=", i.e. equal symbol
set myKasangkapanBaseDirectory="C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\"
cd /d %myKasangkapanBaseDirectory%
rem pushd %myKasangkapanBaseDirectory%

rem cd %myKasangkapanBaseDirectory%
rem C:
rem %myKasangkapanBaseDirectory:~1,2% 

phantomjs saveWebPageAsImageFileSLHCC.js viewAnnualYearEndSummaryReportSLHCC -s

rem added by Mike, 20210101
phantomjs saveWebPageAsImageFileSLHCC.js outputAnnualYearEndSummaryReportChart -a


set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
rem echo %myDate%

rem edited by Mike, 20201231
rem explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\output\"%myDate%
rem explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\output\"%sOutput%
rem edited by Mike, 20210102
rem explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\output\SLHCC\"%myDate%
explorer "%myKasangkapanBaseDirectory%output\SLHCC\%myDate%"

rem removed by Mike, 20210101
rem pause