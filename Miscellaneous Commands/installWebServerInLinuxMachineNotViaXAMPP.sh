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
# @last modified: 20230102; from 20220807
# @website address: http://www.usbong.ph
#
# Additional Notes:
# 1) observed: to have error starting MySQL in XAMPP on Linux Ubuntu Machine
# --> version: xampp-linux-x64-7.4.29-1-installer.run
# --> adds: previously, NO such error when executing START 
#
# 2) reminder: "MySQL Error: : 'Access denied for user 'root'@'localhost'"
# --> Excute: sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf
# --> add: "skip-grant-tables"
# --> sudo service mysql restart
#
# --> Reference: https://stackoverflow.com/questions/41645309/mysql-error-access-denied-for-user-rootlocalhost;
# last accessed: 20220727
# answer by: PYK, 20220301T0507; edited 20220311T1730

#added by Mike, 20220807
sudo apt-get update

sudo apt-get install apache2
sudo apt-get install mysql-server
#edited by Mike, 20220727
#sudo apt-get install php
sudo apt-get install php7.*-mysqli

#added by Mike, 20220807
sudo apt-get install php7.*-cli
#note: update apache2 configuration to include PHP;
#actions starts PHP with service apache2 start COMMAND
sudo apt-get install libapache2-mod-php7.0.

#added by Mike, 20221230
#------------------------------
#Part 1
sudo apt-get install phpmyadmin

# MySQL application password for phpmyadmin: mySql1243
# --> where: username = phpmyadmin

#Part 2 & 3
#Reference: https://help.ubuntu.com/community/phpMyAdmin;
#last accessed: 20221230

#Part 2
#To set up under Apache all you need to do is include the following line in /etc/apache2/apache2.conf. 
#edited by Mike, 20230102
#Note: remove the hash mark, i.e #, before "Include
#Include /etc/phpmyadmin/apache.conf
sudo vi /etc/apache2/apache2.conf

#Part 3
sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf
sudo a2enconf phpmyadmin
sudo /etc/init.d/apache2 reload
#------------------------------
