# Notes: Set of Commands to Auto-transfer Database Storage from Windows to Linux Server

## 1. Steps
1.1) Linux Server accesses Windows Server<br/>
1.2) Mounts in Linux Server the target Source directory located in Windows Server<br/>
--> Target Source directory contains the Database files.<br/>
1.3) Sets Destination directory in Linux Server<br/>
1.4) Executes file transfer; where recursive, keep time, verbose;<br/>
--> No need to transfer Files that did NOT change.<br/>
--> <b>Reminders:</b> 
--> recursive : verify including even folders inside folders<br/> 
--> keep time : verify TIME of file's last update<br/>
--> verbose : verify filename spelling<br/>

## 2. Required Library
2.1) Verify that <b>cifs-utils</b>, is installed<br/>
--> We use the <b>mount.cifs</b> Linux command<br/>
--> CIFS = Common Internet File System<br/>
--> Command: <b>sudo aptitude install cifs-utils</b><br/>

## 3. Additional Notes
To successfully access the Windows Server, we shall need the following:<br/>
3.1) Windows Server's Internet Protocol Address<br/>
3.2) Windows Server's target Source directory<br/>
3.3) Windows Server's username<br/>
3.4) Windows Server's password<br/>

<b>Reminder#1:</b> We need to set Windows Server to accept <b>REMOTE</b> access;<br/>
This is set to <b>OFF</b> as default;<br/>
<br/>
<b>Reminder#2:</b> We need to set Windows Server's <b>target Source directory</b> to be accessible as shared folder in the network;<br/>
This is set to <b>OFF</b> as default;<br/>
<br/>
<b>Reminder#3:</b> Those with access to the <b>network</b> can monitor data transfers via tools, e.g. Wireshark;<br/>
--> Without additional security verification, account passwords even with HTTPS can be stolen.<br/> 
--> <b>Example Additional Security Verification:</b><br/> 
--> Email notification of NOT yet registered machine accessing the account<br/>
--> Auto-generated Personal Identification Number (PIN) sent to person's mobile telephone to be entered to successfully access account

## Teroristang Komunista/Manloloko/Carnapper/Budol-budol/Cybercrimininal group
--> The Teroristang Komunista group executes unauthorized access to the network.<br/>
--> Access to Telephone network becomes KEY;<br/> 
--> verified: GLOBE Postpaid SIM card of target person is misused to execute unauthorized actions;<br/>
--> <b>Example:</b> Access to the Telephone mic and speaker to steal passwords to Household Computer Network and devices.<br/>
--> <b>Reminder:</b> Technologies, e.g. <b>Java Virtual Machine (JVM)</b>, were added since the year 2004 and earlier to increase security against this wiretapping technique being misused on mobile telephones.<br/>
--> However, while new applications developed for use with <b>JVM</b> were set to access only select telephone functions, the Telephone Network that connected telephones and their mics and speakers was still open for misuse by Teroristang Komunista group to execute wiretapping techniques.<br/>
--> In addition, because the CCTV Cameras are also connected to the Computer Network, instead of supposedly providing security surveillance of household vehicles, they become source of information to the Teroristang Komunista group.<br/>
--> <b>Recommended Action:</b> reverify: telephone conversation recording technique in the Year 2004 National Elections<br/>
--> With the Teroristang Komunista group having access to the Telephone network, election fraud becomes another path to get quick money.<br/>
--> <b>Reminder#1:</b> Kahit HINDI panahon ng pangangampanya sa eleksyon, nangangapanya ang mga iyan!<br/>
--> <b>Reminder#2:</b> Kahit TAPOS na ang eleksyon, nangangapanya pa rin!<br/>
--> <b>notified:</b> Barangay Santo Niño regarding such action in the year 2018 Barangay Elections<br/>

