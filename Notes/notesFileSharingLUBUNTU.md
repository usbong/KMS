# NOTES: File Sharing (LUBUNTU)
## Output: file accessibly using Windows, Linux, and Unix-like Machines
Verified: with Windows 7 Ultimate and LUBUNTU 20.04 LTS

# 1) Computer Server (with the shared folder)
## 1.1) Install
### 1.1.1) sudo apt-get install samba
### 1.1.2) sudo apt-get install gvfs-bin
### 1.1.3) sudo apt-get install gvfs-backends

## 1.2) Verify
### 1.2.1) Open File Manager, e.g. PCManFM-Qt
### 1.2.2) Enter as the address: smb://localhost
### 1.2.3) Verify that "print$" folder is included in the output list

## 1.3) Set
### 1.3.1) sudo smbpasswd -a myUsername
<br/>
New SMB password:<br/>
Retype new SMB password:<br/>
<br/>
Added user myUsername.

### 1.3.2) sudo smbpasswd -e myUsername
Enabled user myUsername.

### 1.3.3) sudo chmod o+x /home/unit_member/UsbongSharedFolder

### 1.3.4) sudo vi /etc/samba/smb.conf
#### #add the following set of instructions:
<b>
[share]<br/>
comment = LUBUNTU File Server Share<br/>
path = /home/unit_member/UsbongSharedFolder<br/>
guest ok = yes<br/>
read only = no<br/>
create mask = 0755<br/>
</b>

#### 1.3.4.1) Reminder:
1.3.4.1.1) Make a copy using the following command before updating /etc/samba/smb.conf: <b>sudo cp smb.conf smb.conf20200905</b>
1.3.4.1.2) Execute the following command after updating /etc/samba/smb.conf: <b>sudo samba restart</b>

# 2) Client Computer
## 2.1) sudo apt-get install libreoffice-gnome

# 3) References: 
## 3.1) https://ubuntuforums.org/showthread.php?t=1623346; last accessed: 20200828
## 3.2) https://help.ubuntu.com/community/Samba/SambaServerGuide; last accessed: 20200828
## 3.3) https://ask.libreoffice.org/en/question/9549/unable-to-open-files-from-windows-share/?sort=votes#sort-top; last accessed: 20200828
