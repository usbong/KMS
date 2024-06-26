#!/bin/bash

# Send Short Messaging Service (SMS) message from Linux Personal Computer (PC)
# author: SYSON, MICHAEL B.
# date created: 20200914
# last updated: 20200916
#
# Notes:
# 1) Download Android Software Development Kit (SDK) Platform Tools to execute Android Debug Bridge (ADB) Shell commands
# https://developer.android.com/studio/releases/platform-tools;
# last accessed: 20200914T1036
# 2) Verify connected devices/emulators using ADB Command: ./adb shell
# 3) Verify ADB commands using: ./adb
# 4) Accept Rivest–Shamir–Adleman (RSA) pairing of mobile telephone device with PC
#  --> This is after connecting the device with the PC via the Universal Serial Bus (USB) ports and cable
#
# References:
# 1) https://stackoverflow.com/questions/17580199/sending-a-sms-on-android-through-adb;
# last accessed: 20200914; question by: user790995, 20130710T2022
# 2) https://stackoverflow.com/questions/7789826/adb-shell-input-events;
# last accessed: 20200914; answer by: LionCoder, 20111213T0256; edited by Community, 20200317T0723

cd /home/unit_member/Documents/USBONG/Android/platform-tools

# replace "Kumusta!" with Short Messaging Service (SMS) message
# replace CCXXXXXXXXXX with mobile telephone number, e.g. 09291234567, 639291234567
#./adb shell am start -a android.intent.action.SENDTO -d sms:639299527263 --es sms_body "Kumusta!" --ez exit_on_sent true

# $1 = input SMS message body value
# Example: ./sendSMSCommandFromLinuxPC Kumusta!
# Output: Kumusta!
./adb shell am start -a android.intent.action.SENDTO -d sms:639299527263 --es sms_body $1 --ez exit_on_sent true

./adb shell input keyevent 22 #directional pad right key
./adb shell input keyevent 66 #enter key

cd .. # change directory to the location of the bash shell script file