# Knowledge Management System (KMS)

## I. Screenshots
### 1) Information Desk
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/viewReportPatientQueue1.png" width="60%">
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/informationDeskAddNewPatientMikhail.png" width="80%">

### 2) Cashier/Accounting
#### <b>a) Search</b>
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/cashierSearchPatient.png" width="80%">
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/cashierSearchNonMedicine.png" width="80%">
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/cashierSearchMedicine.png" width="80%">

#### <b>b) Report</b>
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/cashierPurchasedNonMedicineReportWithVAT.png" width="80%">
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/cashierPurchasedNonMedicineReportWithVATOfficialReceiptV2.png" width="80%">
<img src="https://github.com/usbong/KMS/blob/master/Screenshots/exampleAcknowledgmentFormTrimmed.png" width="60%">

## II. Add-on Software Requirements
### XAMPP
https://www.apachefriends.org/index.html

<b>Technologies:</b> Apache Web Server, MySQL, PHP, phpMyAdmin

### Installation Notes
1) Download and open (as Administrator/SuperUser) to install XAMPP file from https://www.apachefriends.org/download.html;<br/>
--> Example: <b>XAMPP for Linux 7.4.27</b><br/>
2) Download ZIP folder via CODE button on https://github.com/usbong/KMS<br/>
3) Extract ZIP folder; Output: <b>"KMS-master"</b><br/>
4) Copy <b>"KMS-master"</b> folder; Paste to <b>/opt/lampp/htdocs/</b><br/>
5) Rename <b>"KMS-master"</b> folder to <b>"usbong_kms"</b><br/>
6) Enter the following COMMANDs in Terminal Window:<br/>
<b>sudo chmod 755 /opt/lampp/phpmyadmin/config.inc.php</b><br/>
<b>sudo /opt/lampp/xampp start</b><br/>
7) Enter the following website address in Computer Web Browser:<br/>
<b>http://localhost/phpmyadmin/</b><br/>
8) Left Panel -> New -> Create database; with database name: <b>usbong_kms</b><br/>
9) Top Panel -> Import -> Browse button<br/>
--> Example input database file: <b>KMS-master/DB/SQLCommands/usbong_kmsCreateDBTableStructureV20211219T0602.sql</b><br/>
10) Enter the following website address in Computer Web Browser<br/>
<b>localhost/usbong_kms/index.php/report/viewWebAddressList</b><br/>
11) Update: <b>"/opt/lampp/htdocs/usbong_kms/application/views/viewWebAddressList.php"</b><br/>
--> Search and Replace keyphrase: <b>"192.168.11.62"</b> with <b>"localhost"</b><br/>
--> Note: Set <b>"localhost"</b> to the computer's network Internet Protocol (IP) Address<br/>
<br/>
<b>Example Computer Server Web Address:</b><br/> 
http://192.168.1.110/usbong_kms/index.php/report/viewWebAddressList<br/>
<br/>
DONE!<br/>
<br/>
<b>Reference:</b> https://stackoverflow.com/questions/7577490/phpmyadmin-wrong-permissions-on-configuration-file-should-not-be-world-writabl;<br/>
last accessed: 20220314<br/>
answer by: Y. Joy Ch. Singha, 20180521T0816<br/>
edited by: bad_coder, 20210724T1636<br/>

## Open Source Software License
Copyright 2019~2022 SYSON, MICHAEL B.

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0
  
Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.

@company: USBONG<br/>
@author: SYSON, MICHAEL B.<br/>
@website address: http://www.usbong.ph<br/>

## III. Add-on Software Tools
### 1) Chat
[LAN Messenger: Instant Messenging Client (Official Website)](http://lanmsngr.sourceforge.net/) <br/>
Action: [Download](https://sourceforge.net/projects/lanmsngr/)

### 2) Auto-screen Capture Photograph Image
[PhantomJS Tool (Official Website)](https://phantomjs.org/) <br/>

#### Notes
1) LAN = Local Area Network<br/>
2) For Linux Operating Systems (OS), e.g. LUBUNTU, we recommend using the software tool: "wine"<br/>
2.1) Installation Steps:<br/>
2.1.1) <b>sudo apt-get install wine</b><br/>
2.1.2) <b>wine lmc-1.2.35-win32.exe</b><br/>
--> You may verify using another version of the executable file.<br/>
DONE!<br/>
3) Auto-start LAN Messenger<br/>
--> verified: with [LUBUNTU 20.04LTS Operating System (OS)](lubuntu.me)<br/>
--> 3.1) Click: Preferences -> LXQt Settings -> Session Settings<br/>
--> 3.2) Click: "Autostart" icon in left panel<br/>
--> 3.3) Click: "Add" Button<br/>
--> Name: "LAN MESSENGER"<br/>
--> Command: wine \"/home/unit_member/.wine/drive_c/Program Files (x86)/LAN Messenger/lmc.exe\"<br/>
--> <b>Additional Notes:</b><br/>
--> Update correct location of "lmc.exe"<br/>
--> No need to put check mark in checkbox of "Wait for system tray"<br/>
--> 3.4) Click: "OK"<br/>
--> 3.5) Click: "Close"<br/>
--> DONE!<br/>

4) Error: "A port address conflict has been detected. LAN Messenger will close now"<br/>
--> verified: with Windows7 Machine<br/>
--> Solution: in CMD Prompt Window, enter this <b>COMMAND</b> in the <b>lmc.exe</b> directory:<br/>
--> <b>lmc.exe /noconfig</b><br/>
--> DONE!<br/>
--> <b>Reference:</b> https://unix.stackexchange.com/questions/405926/a-port-address-conflict-has-been-detected-lan-messenger-will-close-now; last accessed: 20220208
   
## IV. System Integration @Partner Clinic and Peripheral Units
To eliminate excess steps and inefficient time usage, the Marikina Orthopedic Specialty Clinic (MOSC) requested Usbong's services to automate routine, monotonous tasks and share with unit members know-how on computers.<br/><br/>
https://www.usbong.ph/excel/<br/>
<br/>
<img src="https://github.com/usbong/KMS/blob/master/Notes/res/exampleTabletPCSoftwareHardwareWithMedItemBoxTechnique20220314T1158.jpg" width="60%"><br/>
<b>Example Tablet Personal Computer (PC)<br/> 
Software+Hardware with MED Item Box Technique
</b>
