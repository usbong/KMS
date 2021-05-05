#!/bin/bash

#TO-DO: -update: this

#
#	Auto-generate MOSC Summary Report Daily Count
# Copyright 2020~2021 Usbong Social Systems, Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# @company: USBONG SOCIAL SYSTEMS, INC. (USBONG)
# @author: SYSON, MICHAEL B.
# @date created: 20200306
# @last updated: 20210505
#

#Windows Machine
#java -cp .\software:.\software\org.apache.commons.text.jar generateMOSCSummaryReportDailyCount input/cashier/*.txt assets/*.txt

#Linux Machine
java -cp ./software:./software/org.apache.commons.text.jar generateMOSCSummaryReportDailyCount input/cashier/*.txt assets/*.txt

#edited by Mike, 20210504
# "add-on software"\requi#ents\"chrome.exe - Shortcut.lnk" file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOutputTreatment.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOfUnclassifiedDiagnosedCasesOutput.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlySummaryReportOutputConsultation.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsConsultation.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsProcedure.html file:///D:/2019/add-on%%20software/generateMonthlySummaryReport/add-on%%20software/output/MonthlyStatisticsTreatment.html

#Linux Machine
firefox ./output/MOSCSummaryReportDailyCountOutput.html

#PAUSE
