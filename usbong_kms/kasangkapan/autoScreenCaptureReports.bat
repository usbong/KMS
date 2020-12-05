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
if "%myDateDay%"=="Sat" phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Gracia"

phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay
phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay
phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s

REM edited by Mike, 20201205
REM phantomjs saveWebPageAsImageFile.js viewReportPatientQueueAccounting
phantomjs saveWebPageAsImageFile.js viewReportPatientQueue

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%