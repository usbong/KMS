REM https://superuser.com/questions/204909/cant-delete-folder-and-i-am-admin-you-need-permission-to-perform-this-action;
REM answer by: Sahil, 20101029T1745
REM additional notes: SYSON, MICHAEL B., 20200830T1214
REM Operating System: Windows 7 Ultimate

REM update DIRECTORY_NAME from "D:\Locked Directory" to the target folder
SET DIRECTORY_NAME="D:\54505455ded9ae9109e8a8a8b3"
TAKEOWN /f %DIRECTORY_NAME% /r /d y
ICACLS %DIRECTORY_NAME% /grant administrators:F /t
PAUSE

REM Afterwards, transfer the target folder to the Recycle Bin on the desktop
REM Choose "Empty Recycle Bin"
REM Done!