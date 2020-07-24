/*
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @author: Michael Syson
' @date created: 20200724
' @date updated: 20200724
'
' Reference:
' 1) https://phantomjs.org/; last accessed: 20200724
'
*/

var system = require('system');
var filename = system.args[1];

console.log("Filename: " + filename);

var page = require('webpage').create();
page.open('http://mosc-accounting/usbong_kms/index.php/REPORT/'+filename, function(status) {
  console.log("Status: " + status);
  if(status === "success") {
    page.render('output/'+filename+'.png');
  }
  phantom.exit();
});
