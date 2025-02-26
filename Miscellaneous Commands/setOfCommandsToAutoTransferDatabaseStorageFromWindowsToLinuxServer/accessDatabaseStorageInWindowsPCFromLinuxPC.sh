#!/bin/bash

# Copyright 2020~2023 SYSON, MICHAEL B.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Access Database Storage in Windows PC from Linux PC
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20201001
# @last modified: 20230926; from 20220711
# @website address: http://www.usbong.ph
#
# References:
# 1) https://askubuntu.com/questions/137011/mounting-cifs-url-not-implemented-yet-when-i-try-to-mount-a-samba-share;
# last accessed: 20201001
# answer by: Eliah Kagan, 20120514T2046
# edited by: Community, 20170311T1900
#
# 2) https://unix.stackexchange.com/questions/131766/why-does-my-shell-script-choke-on-whitespace-or-other-special-characters;
# last accessed: 20201001
# answer by: Gilles 'SO- stop being evil', 20140524T0325
# edited by: Stéphane Chazelas, 20200124T1233
#
# Notes:
# 1) Verify that cifs-utils, is installed
# --> We use the mount.cifs Linux command
# --> CIFS = Common Internet File System
# 
# --> Command#1: sudo apt-get update
# --> Command#2: sudo apt-get install aptitude
# --> Command#3: sudo aptitude install cifs-utils
#
# --> Reference: https://askubuntu.com/questions/525243/why-do-i-get-wrong-fs-type-bad-option-bad-superblock-error; last accessed: 20220711
#
# 2) Unmount command: umount -l $destination
#--> where: l=lazy, i.e. unmount filesystem now even if busy

#make destination folder
sudo mkdir /mnt/myMOSC-AccountingFolder/

#update source location
#source: from Windows machine, e.g. Windows 7, Service Pack 1
#Example:
#source="//192.168.11.55/accounting/"
#edited by Mike, 20230117
#source="//192.168.11.10/information desk/"
#edited by Mike, 20230926; from 20230730
#source="//192.168.11.110/information desk/"
source="//192.168.11.10/mosc/"

#source="//192.168.10.104/information desk/"


echo "source: "$source

#update destination location
#destination: to Linux machine, e.g. LUBUNTU 20.04 LTS
destination="/mnt/myMOSC-AccountingFolder/"

echo "destination: "$destination

#Note: add quotation marks, e.g. in $source
#TO-DO: add: auto-read from external file password=halimbawaValue
#edited by Mike, 20230926
#sudo mount -t cifs "$source" "$destination" -o user=unit_member
#OK
sudo mount -t cifs "//192.168.11.10/mosc/" "/mnt/myMOSC-AccountingFolder/" -o user="unit member",password="halimbawaPassword"

#not OK yet
sudo mount -t cifs "$source" "$destination" -o user="unit member"
