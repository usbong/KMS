#!/bin/bash

# Copyright 2020 Usbong Social Systems, Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
#
# Scan Documents Using Linux Personal Computer (PC)
# author: SYSON, MICHAEL B.
# date created: 20200914
# last updated: 20201014
#
# Notes:
# 1) Linux Machine: LUBUNTU 20.04 LTS
# --> www.lubuntu.me; last accessed: 20201014
#
# 2) Scanner Machine: Samsung SCX-4521F
#
# 3) Image Format
# 3.1) PNM: 24.9MB
# 3.2) JPEG: 424KB 
#

#TO-DO: -reverify: use of mount command to speed-up scanning
#Note: device `smfp:usb;04e8;3419;0123456789ABCDEF' is a Samsung SCX-4x21 Series on USB Scanner

#TO-DO: -add: auto-open Terminal Window

scanimage -L


#scanimage --resolution 600 --format=jpeg > outputImage.jpeg
scanimage --format=jpeg > outputImage.jpeg
