@echo off
REM
REM	Auto-generate MOSC Summary Report Daily Count
REM
REM Copyright 2020~2024 USBONG
REM
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20200306
REM @last updated: 20240302; from 20240301
REM @website address: www.usbong.ph
REM
REM Reminder:
REM Update consultation count value in list:
REM 
REM 1) Get Consultation Count from MySQL DB:
REM Example:  
REM SELECT * FROM transaction WHERE patient_id != -1 AND transaction_quantity != 0 AND item_id = 0 AND notes NOT LIKE '%ONLY%' AND notes NOT LIKE '%TRANS%' AND notes NOT LIKE '%NC;%' AND notes NOT LIKE '%REQUESTED%' AND medical_doctor_id !=0 AND added_datetime_stamp BETWEEN '2023-08-01' AND '2023-08-31'
REM
REM 2) Update .txt file in assets folder
REM C:\xampp\htdocs\usbong_kms\kasangkapan\MOSC\add-on software\assets\transactions\consultationCountList.txt
REM 
REM 3) Execute generateMOSCSummaryReportDailyCount.bat or .sh
REM

cd /d %1%
set mainDirectory=%CD%
cd /d %mainDirectory%
cd assets/transactions/

mkdir tempListBeforeProcessing

REM edited by Mike, 20231002; added auto-overwrite
REM copy *List.txt "tempListBeforeProcessing/"
copy *List.txt "tempListBeforeProcessing/" /y

REM removed by Mike, 20231002
REM xcopy "tempListBeforeProcessing\*List.txt" "." /s /y

cd %mainDirectory%
		
REM java -cp .\software;.\software\org.apache.commons.text.jar generateMOSCSummaryReportDailyCount input/cashier/*.txt assets/*.txt
java -cp .\software;.\software\org.json.jar;.\software\org.apache.commons.text.jar generateMOSCSummaryReportDailyCount input/cashier/ assets/

cd assets/transactions/

REM removed by Mike, 20231002
REM del *List.txt
REM rename *ListTemp.txt *List.txt

REM TODO: verify: cause of generateMOSCSummaryReportDailyCount generating incorrect contents in consultationCountListTemp file
del *ListTemp.txt


cd %mainDirectory%

REM removed by Mike, 20201025
REM cd ..

rem TO-DO: -update: this
rem "add-on software"\requirements\"chrome.exe - Shortcut.lnk" file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOutputTreatment.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOfUnclassifiedDiagnosedCasesOutput.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOutputConsultation.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsConsultation.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsProcedure.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsTreatment.html

REM edited by Mike, 202301002
REM PAUSE
EXIT
