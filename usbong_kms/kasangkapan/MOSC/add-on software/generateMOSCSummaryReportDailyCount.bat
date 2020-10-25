@echo off
REM
REM	Auto-generate MOSC Summary Report Daily Count
REM Copyright 2020 Usbong Social Systems, Inc.
REM
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG SOCIAL SYSTEMS, INC. (USBONG)
REM @author: SYSON, MICHAEL B.
REM @date created: 20200306
REM @last updated: 20201025
REM

cd /d %1%
set mainDirectory=%CD%
cd /d %mainDirectory%
cd assets/transactions/
mkdir tempListBeforeProcessing
copy *List.txt "tempListBeforeProcessing/"

xcopy "tempListBeforeProcessing\*List.txt" "." /s /y

cd %mainDirectory%
		
REM java -cp .\software;.\software\org.apache.commons.text.jar generateMOSCSummaryReportDailyCount input/cashier/*.txt assets/*.txt
java -cp .\software;.\software\org.json.jar;.\software\org.apache.commons.text.jar generateMOSCSummaryReportDailyCount input/cashier/ assets/
cd assets/transactions/

del *List.txt

rename *ListTemp.txt *List.txt

cd %mainDirectory%

REM removed by Mike, 20201025
REM cd ..

rem TO-DO: -update: this
rem "add-on software"\requirements\"chrome.exe - Shortcut.lnk" file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOutputTreatment.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOfUnclassifiedDiagnosedCasesOutput.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOutputConsultation.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsConsultation.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsProcedure.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsTreatment.html

PAUSE
