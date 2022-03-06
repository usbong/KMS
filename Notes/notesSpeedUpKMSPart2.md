# Notes: Speed-up Knowledge Management System (KMS) Part 2
## PROBLEM:
noticeable <b>DELAY</b> in execution with <b>patientId#3543</b> (name: <b>"NONE, WALA"</b>),<br/>
with @patientId used in transactions; <b>COUNT:</b> <b>1053 total, Query took 0.0800 seconds</b>.<br/>
<b>TRANSACTION TABLE</b> (<b>74469 total, Query took 0.0100 seconds</b>.)<br/>

## SOLUTION:
added: <b>patientId#11682:</b> (name: <b>"NONE, WALA v2"</b>)

### 1) FROM 2020-03-24 UNTIL 2022-02-18
//1.1) MySQL returned an empty result set (i.e. zero rows). <b>(Query took 0.0020 seconds.)</b><br/>
//1.2) MySQL returned an empty result set (i.e. zero rows). <b>(Query took 0.0020 seconds.)</b><br/>
//1.3) MySQL returned an empty result set (i.e. zero rows). <b>(Query took 0.0020 seconds.)</b><br/>

### 2) FROM 2020-03-24 UNTIL 2022-02-19
//2.1) Showing rows 0 - 8 <b>(9 total, Query took 0.0010 seconds.)</b><br/>
//2.2) Showing rows 0 - 8 <b>(9 total, Query took 0.0020 seconds.)</b><br/>
//2.3) Showing rows 0 - 8 <b>(9 total, Query took 0.0025 seconds.)</b><br/>

