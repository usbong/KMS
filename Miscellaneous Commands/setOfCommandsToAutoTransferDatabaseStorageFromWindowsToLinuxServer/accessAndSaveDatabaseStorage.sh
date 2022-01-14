#!/bin/bash

# Copyright 2020~2022 SYSON, MICHAEL B.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Access and Save Database Storage
# Access Database Storage in Windows PC from Linux PC
# Save Database Storage Command in Linux PC
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20201001
# @last modified: 20220114; from 20201014
# @website address: http://www.usbong.ph
#
# Notes:
# 1) Update Source location
# source: from Windows machine, e.g. Windows 7, Service Pack 1
#
# 2) Using "mount" command to enable access to source folder in "mnt" directory reduces elapsed time from 4mins to 22seconds
# This is instead of for example: source="/run/user/1000/gvfs/smb-share:server=mosc-accounting,share=information%20desk/*"
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
# --> Command: sudo aptitude install cifs-utils
#
# 2) Unmount command: umount -l $destination
#--> where: l=lazy, i.e. unmount filesystem now even if busy

./accessDatabaseStorageInWindowsPCFromLinuxPC.sh
./saveDatabaseStorageCommandInLinuxPC.sh
