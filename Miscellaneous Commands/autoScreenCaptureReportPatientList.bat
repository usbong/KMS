set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myDateDay=%date:~0,3%

echo %myDateDay%

phantomjs saveWebPageAsImageFile.js "viewReportPatientQueue"
phantomjs saveWebPageAsImageFile.js "viewReportPatientQueueAccounting"

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%