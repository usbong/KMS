phantomjs saveWebPageAsImageFile.js viewReportMedicineUnified
phantomjs saveWebPageAsImageFile.js viewReportMedicineAsteriskUnified
phantomjs saveWebPageAsImageFile.js viewReportNonMedicineUnified
phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Pedro"
phantomjs saveWebPageAsImageFile.js "viewPayslipWebFor/Peter"
phantomjs saveWebPageAsImageFile.js viewReceiptReportForTheDay
phantomjs saveWebPageAsImageFile.js viewReceiptReportPASForTheDay
phantomjs saveWebPageAsImageFile.js viewSummaryReportForTheDay -s

set myDate=%date:~10,4%%date:~4,2%%date:~7,2%

explorer "C:\xampp\htdocs\usbong_kms\kasangkapan\phantomjs-2.1.1-windows\bin\output\"%myDate%