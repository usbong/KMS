@echo off
REM Send Short Messaging Service (SMS) message from Windows Personal Computer (PC)
REM author: SYSON, MICHAEL B.
REM date created: 20200915
REM last updated: 20200916
REM
REM Notes:
REM 1) Download Android Software Development Kit (SDK) Platform Tools to execute Android Debug Bridge (ADB) Shell commands
REM https://developer.android.com/studio/releases/platform-tools;
REM last accessed: 20200914T1036
REM 2) Verify connected devices/emulators using ADB Command: adb shell
REM 3) Verify ADB commands using: adb
REM 4) Accept Rivest–Shamir–Adleman (RSA) pairing of mobile telephone device with PC
REM  --> This is after connecting the device with the PC via the Universal Serial Bus (USB) ports and cable
REM
REM References:
REM 1) https://stackoverflow.com/questions/17580199/sending-a-sms-on-android-through-adb;
REM last accessed: 20200914; question by: user790995, 20130710T2022
REM 2) https://stackoverflow.com/questions/7789826/adb-shell-input-events;
REM last accessed: 20200914; answer by: LionCoder, 20111213T0256; edited by Community, 20200317T0723

REM update file location
REM cd /home/unit_member/Documents/USBONG/Android/platform-tools
REM cd "D:\2020\add-on software\sendReportViaSMS\platform-tools_r30.0.4-windows\platform-tools"
cd "D:\Usbong\SLHCC\Reports\platform-tools"

REM replace "Kumusta!" with Short Messaging Service (SMS) message
REM replace CCXXXXXXXXXX with mobile telephone number, e.g. 09291234567, 639291234567
REM adb shell am start -a android.intent.action.SENDTO -d sms:639299527263 --es sms_body "Kumusta!" --ez exit_on_sent true

REM %1% = input SMS message body value
REM Example: sendSMSCommandFromWindowsPC "Kumusta\ po!"
REM Output: Kumusta po!

REM echo "input SMS message".%1%
REM add backslash before space, e.g. "Kumusta\ po!"

adb shell am start -a android.intent.action.SENDTO -d sms:639299527263 --es sms_body %1% --ez exit_on_sent true

adb shell input keyevent 22 REM directional pad right key
adb shell input keyevent 66 REM enter key

cd .. REM change directory to the location of the batch file