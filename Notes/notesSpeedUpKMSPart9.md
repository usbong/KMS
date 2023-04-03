# Notes: Speed-up Knowledge Management System (KMS) Part 9

## 1) PROBLEM:

<b>Noticeable DELAY</b> to load web page for select <b>COMMANDS</b>;<br/>
--> Example <b>COMMAND</b>: `viewPatient` -> `confirmPatient`<br/>
--> where: <b>Noticeable DELAY</b> <= 5 seconds (approx)

### Additional Note

1) Search Patient: "aki"

## 1) ANSWER:

DELETE FROM `transaction` WHERE `transaction_date` >= '03/24/2020' and `transaction_date` <= '12/31/2020';

92689 rows affected. (Query took 85.7401 seconds.)

### OUTPUT

Search Patient: "aki"

ELAPSED TIME: 2\~3 seconds (CURRENT)<br/>
ELAPSED TIME: 4\~5 seconds (PREVIOUSLY)

#### WITH CACHE technique

ELAPSED TIME: 2 seconds (CURRENT)<br/>
ELAPSED TIME: 4 seconds (PREVIOUSLY)

--> SPEED-UP of 1 second;<br/>
--> CACHE technique causes additional SPEED-UP of 1 second

### Additional Note

1) observed: variation in output via copy DB table COMMAND; phpmyadmin

ORIGINAL: Showing rows 0 - 24 (121531 total, Query took 0.0200 seconds.)<br/>
COPIED OUTPUT: Showing rows 0 - 24 (122368 total, Query took 0.4200 seconds.)

2) listening: to the following:<br/>
2.1) USBONG SOUND ROBOTO<br/>
2.2) Harada's Bar: Interview with the Heroes...; Pakistan (鉄拳7), Taiwan (SFV), Japan (GuiltyGearStrive)


