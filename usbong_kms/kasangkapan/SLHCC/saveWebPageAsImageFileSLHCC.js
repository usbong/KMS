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
' @date updated: 20201006
'
' Reference:
' 1) https://phantomjs.org/; last accessed: 20200724
' 2) downloaded phantomjs zipped file's examples: netsniff.js; last accessed: 20200725
'
*/

var system = require('system');
var fileName = system.args[1];

//added by Mike, 20200726
var isFromServerFolder = system.args[2];
//var webAddress = 'http://localhost/usbong_kms/index.php/REPORT/'; //default
//edited by Mike, 20200830
//var webAddress = 'file:///D:/Usbong/SLHCC/202007/'; //default
var webAddress = 'file:///D:/2020/add-on software/generateMonthlySummaryReport/add-on software/output/';

var fileExtension = '.html'; //'';//edited by Mike, 20200802

//added by Mike, 20200725
var dateToday = new Date(); 

/* //removed by Mike, 202000802
if (isFromServerFolder=="-s") {
	webAddress = 'http://localhost/usbong_kms/server/';
	fileExtension = '.php';
}
*/

console.log("Filename: " + fileName);

var page = require('webpage').create();
//edited by Mike, 20200726
//page.open('http://localhost/usbong_kms/index.php/REPORT/'+filename, function(status) {
page.open(webAddress+fileName+fileExtension, function(status) {
  console.log("Status: " + status);
  
  if(status === "success") {
	//added by Mike, 20200725
	//Reference: https://phantomjs.org/tips-and-tricks.html;
	//last accessed: 20200725
	page.evaluate(function() {
	  document.body.bgColor = 'white';
	});
	
	//edited by Mike, 20200725
    //page.render('output/'+fileName+'.png');
//	page.render('output/'+dateToday.toISOString()+'/'+fileName+'1.png');
	page.render('output/SLHCC/'+dateToday.toISOString()+'/'+fileName+'1.png');

/*	
    console.log("windowScreenHeight: " + window.screen.height);
    console.log("scrollHeightMax: " + document.body.scrollHeight);
*/
    var windowScreenHeight = window.screen.height;
    var documentBodyHeight = document.body.scrollHeight;
    var currentDocumentBodyHeight = documentBodyHeight;
	var iCount = 2;

    while (currentDocumentBodyHeight > windowScreenHeight) {
	  page.evaluate(function(currentDocumentBodyHeight) {
			window.document.body.scrollTop = currentDocumentBodyHeight;	    
	  });

	  page.render('output/'+dateToday.toISOString()+'/'+fileName+iCount+'.png');
	
	  currentDocumentBodyHeight = currentDocumentBodyHeight - windowScreenHeight;
	  iCount = iCount + 1;
    }
	
  }
  phantom.exit();
});

//added by Mike, 20200725
//edited by Mike, 20200725
//if (!Date.prototype.toISOString) {
if (Date.prototype.toISOString) {
    Date.prototype.toISOString = function () {
        function pad(n) { return n < 10 ? '0' + n : n; }
        function ms(n) { return n < 10 ? '00'+ n : n < 100 ? '0' + n : n }
		//edited by Mike, 20200725
/*		
        return this.getFullYear() + '-' +
            pad(this.getMonth() + 1) + '-' +
            pad(this.getDate()) + 'T' +
            pad(this.getHours()) + ':' +
            pad(this.getMinutes()) + ':' +
            pad(this.getSeconds()) + '.' +
            ms(this.getMilliseconds()) + 'Z';
*/
/*
        return this.getFullYear() +
            pad(this.getMonth() + 1) +
            pad(this.getDate()) + 'T' +
            pad(this.getHours()) +
            pad(this.getMinutes());			
*/			
		//edited by Mike, 20201006
/*
        return this.getFullYear() +
            pad(this.getMonth() + 1) +
            pad(this.getDate());			
*/			
        return this.getFullYear() + "" +
            pad(this.getMonth() + 1) + "" +
            pad(this.getDate());			

    }
}
