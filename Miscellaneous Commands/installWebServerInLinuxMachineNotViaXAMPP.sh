#!/bin/bash

# Copyright 2022 SYSON, MICHAEL B.
#
# Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
#
# http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.destination
#
# Install Web Server COMMAND in Linux Machine
# NOT via XAMPP
#
# @company: USBONG
# @author: SYSON, MICHAEL B.
# @date created: 20220328
# @last modified: 20220727; from 20220725
# @website address: http://www.usbong.ph
#
# Additional Note:
# 1) observed: to have error starting MySQL in XAMPP on Linux Ubuntu Machine
# --> version: xampp-linux-x64-7.4.29-1-installer.run
# --> adds: previously, NO such error when executing START 
#

sudo apt-get install apache2
sudo apt-get install mysql-server
sudo apt-get install php