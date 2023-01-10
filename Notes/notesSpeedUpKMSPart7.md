# Notes: Speed-up Knowledge Management System (KMS) Part 7

## 1) PROBLEM:
Noticeable INCORRECT SPELLING;<br/>
--> Example: in NOTES COLUMN for transactions classified to be "DISCOUNTED"

### Additional Notes:

notes: "DISCOUNTE" occurred and have not yet been corrected 8 times; <br/>
--> oldest to be @2021-01-21; DB began: 2020-03-24<br/>
--> adds: "DISCOUNT" did not exist;

## 1) ANSWER:

Add the following COMMAND in the COMPUTER INSTRUCTIONS,<br/>
--> to CORRECT the INCORRECT SPELLING via the `str_replace` function<br/>
--> t signify: String Replace

> $notes = str_replace("DISCOUNTE","DISCOUNTED",$notes);
		
### Additional Notes:

adds: additional technique exists to auto-update spelling error<br/>
--> example: via Levenshtein Distance;

#### Reference: 
https://github.com/usbong/SLHCC/blob/e93bda14d0b3f63e6d7eab28f734d228d4d09137/Master%20List/generateDoctorReferralPTTreatmentReportFromMasterList/java/linux/software/generateDoctorReferralPTTreatmentSummaryReportOfTheTotalOfAllInputFilesFromMasterList.java;
last accessed: 20230110
			
### Additional Related Notes
> DB began: 2020-03-24

### HISTORY of ACTIONS:
1) started with using current system at the time;<br/>
--> via pen & paper workbooks @INFO DESK UNIT<br/>
--> PATIENT COUNTS<br/>
--> Computer COUNT: 1<br/>
--> OS: Windows7

2) connected INFO DESK Unit and CASHIER UNIT,<br/>
--> via Microsoft Excel, LibreOffice Calc, NETWORK<br/>
--> PATIENT COUNTS<br/>
--> Computer COUNT: 2<br/>
--> OS: Windows7

3) added: TABLET PC's <br/>
--> Apache Web Server, MySQL DB<br/>
--> PATIENT COUNTS; ITEM COUNTS<br/>
--> Computer COUNT: 2+<br/>
--> OS: Windows7, Android, macOS (iPAD)

4) increased: additional PC's <br/>
--> Printed Reports;<br/>
--> BACK-UP of DB<br/>
--> Computer COUNT: 2+<br/>
--> OS: Windows7, Linux (LUBUNTU), Android, macOS (iPAD)

