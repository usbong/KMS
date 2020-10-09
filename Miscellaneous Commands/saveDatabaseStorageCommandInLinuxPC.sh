#!/bin/bash

# Copyright 2020 Usbong Social Systems, Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Save Database Storage Command in Linux PC
# @company: USBONG SOCIAL SYSTEMS, INC. (USBONG)
# @author: SYSON, MICHAEL B.
# @date created: 20201001
# @last modified: 20201009

#update source location
#source: from Windows machine, e.g. Windows 7, Service Pack 1
#Example:
#source="/run/user/1000/gvfs/smb-share:server=mosc-accounting,share=information%20desk/unified.bat"

#edited by Mike, 20201009
#source="/run/user/1000/gvfs/smb-share:server=mosc-accounting,share=information%20desk/*"
#note: using "mount" command to enable access to source folder in "mnt" directory reduces elapsed time from 4mins to 22seconds
#example: sudo mount -t cifs "$source" "$destination" -o user=unit_member
source="/mnt/myMOSC-AccountingFolder/*"

echo "source: ".$source

#update destination location
#destination: to Linux machine, e.g. LUBUNTU 20.04 LTS
destination="/home/unit_member/Documents/halimbawa/"

echo "destination: ".$destination

#notes: rsync inputs
#where: r = recursive
#where: t = keep time
#where: v = verbose
rsync -rtv $source $destination
