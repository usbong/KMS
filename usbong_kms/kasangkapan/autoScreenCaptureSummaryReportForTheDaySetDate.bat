rem added by Mike, 20209090
rem update input and output files
set sInput="viewSummaryReportForTheDay20200909"
set sOutput="viewSummaryReportForTheDay20200909"

echo sInput

phantomjs saveWebPageAsImageFile.js /%sInput% -s

rem removed by Mike, 20200909
rem set myDate=%date:~10,4%%date:~4,2%%date:~7,2%

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\".%sOutput%