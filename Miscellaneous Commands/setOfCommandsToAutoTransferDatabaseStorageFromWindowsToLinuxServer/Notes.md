# Notes: Set of Commands to Auto-transfer Database Storage from Windows to Linux Server

## 1. Steps
1.1) Linux Server accesses Windows Server<br/>
1.2) Mounts in Linux Server the target Source directory located in Windows Server<br/>
--> Target Source directory contains the Database files.<br/>
1.3) Sets Destination directory in Linux Server<br/>
1.4) Executes file transfer; where recursive, keep time, verbose;<br/>
--> No need to transfer Files that did NOT change.<br/>

## 2. Required Library
2.1) Verify that cifs-utils, is installed<br/>
--> We use the mount.cifs Linux command<br/>
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
--> The Teroristang Komunista/Manloloko/Carnapper/Budol-budol/Cybercrimininal group executes unauthorized access to the network.<br/>
--> Access to Telephone network becomes KEY;<br/> 
--> With access to Telephone mic and speaker, passwords to Household Computer Network are stolen.<br/>
--> CCTV Cameras that are connected to the Computer Network become open for access.<br/>
--> CCTV Cameras that supposedly provide security surveillance of vehicles become information to the Teroristang Komunista group.<br/>