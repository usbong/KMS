set myDate=%date:~10,4%%date:~4,2%%date:~7,2%
set myTime=%time:~0,2%%time:~3,2%

set myHour=%time:~0,2%

if %myHour% lss 10 (set myNewHour=0%time:~1,1%) else (set myNewHour=%myHour%)

echo %myNewHour%

set myNewTime=%myNewHour%%time:~3,2%

cd "C:\xampp\mysql\bin\"

C:

mysqldump -uroot usbong_kms > "G:\Usbong MOSC\Everyone\Information Desk\DB\usbong_kmsV"%myDate%"T"%myNewTime%".sql"