REM
REM Copyright 2020~2023 USBONG
REM 
REM Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM
REM http://www.apache.org/licenses/LICENSE-2.0
REM
REM Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM @company: USBONG
REM @author: SYSON, MICHAEL B.
REM @date created: 20201216T09:06
REM @date updated: 20230410; from 20230408
REM @website address: http://www.usbong.ph
REM
REM Notes:
REM 1) 3 years (approx) since last updated
REM 2) reusable technique

"C:\Program Files\Mozilla Firefox\firefox.exe" "http://localhost/usbong_kms/index.php/browse/updateTotalQuantitySoldPerItem"

REM added by Mike, 20230410
REM TO-DO: -update: .bat file name; set of COMMANDS at startup; task scheduler
"C:\Program Files\Mozilla Firefox\firefox.exe" "http://localhost/usbong_kms/server/autoSetSelectMySQLGlobalVariables.php"


exit