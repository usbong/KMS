phantomjs saveWebPageAsImageFileSLHCC.js viewAnnualYearEndSummaryReportSLHCC -s

rem added by Mike, 20210101
phantomjs saveWebPageAsImageFileSLHCC.js outputAnnualYearEndSummaryReportChart -a


set myDate=%date:~10,4%%date:~4,2%%date:~7,2%

rem edited by Mike, 20201231
rem explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\output\"%myDate%
rem explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\output\"%sOutput%
explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\SLHCC\output\SLHCC\"%myDate%

rem removed by Mike, 20210101
rem pause