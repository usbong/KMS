@ECHO OFF
REM
REM  Copyright 2025 USBONG
REM  Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
REM  http://www.apache.org/licenses/LICENSE-2.0
REM  Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
REM
REM  @company: USBONG
REM  @author: SYSON, MICHAEL B.
REM  @date created: 20250722
REM  @date updated: 20250723; from 20250722
REM

REM use with Windows Task Scheduler; set as Administrator
REM taskkill will fail if firefox is not open at all
taskkill /f /im firefox.exe