set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myDateDay=%date:~0,3%

phantomjs saveWebPageAsImageFile.js viewReportMedicineUnified
phantomjs saveWebPageAsImageFile.js viewReportMedicineAsteriskUnified
phantomjs saveWebPageAsImageFile.js viewReportNonMedicineUnified
phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Pedro"
phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Peter"

echo %myDateDay%

if "%myDateDay%"=="Mon" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Chastity"
if "%myDateDay%"=="Tue" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil"
if "%myDateDay%"=="Thu" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Rodil"
if "%myDateDay%"=="Wed" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto"
if "%myDateDay%"=="Fri" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Honesto"
if "%myDateDay%"=="Sat" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Gracia"

phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay
phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay
phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%