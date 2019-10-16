# Android Debug Bridge (ADB)
https://developer.android.com/studio/command-line/adb; last accessed: 20191016

## Notes:
The "adb.exe" file is inside the "platform-tools" folder.<br/><br/>
<b>Reference:</b><br/>
https://dl.google.com/android/repository/platform-tools_r29.0.4-windows.zip; last accessed: 20191019

## Commands:
1) To view the list of Android devices connected to the computer:<br/>
<b>adb devices</b>

2) To pull a file from the Android device's storage to the computer:<br/>
<b>adb pull /sdcard/Download/autoVerifyIfConnected.sh</b>

3) To push a file from the computer to the Android device's storage:<br/>
<b>adb push autoVerifyIfConnected.sh /sdcard/Download</b>

4) To access the Android device and execute shell commands:<br/>
<b>adb shell</b>

5) To make the Android device execute a Unix script file:<br/>
<b>sh autoVerifyIfConnected.sh</b>

6) To make the Android device play an audio file in .wav format:<br/>
<b>adb shell am start -a android.intent.action.VIEW -d file:///sdcard/Download/wavebig.wav -t audio/wav</b>

7) To make the Android device close the audio file player:<br/>
<b>adb shell input keyevent 4</b>

8) To make the Android device put "usbong" as input in the search box<br/>
<b>adb shell am start -a android.search.action.GLOBAL_SEARCH --es query usbong</b>
