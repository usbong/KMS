/*
'
' Copyright 2020~2021 USBONG SOCIAL SYSTEMS, INC. (USBONG)
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @company: USBONG SOCIAL SYSTEMS, INC. (USBONG)
' @author: SYSON, MICHAEL B.
' @date created: 20200724
' @date updated: 20210316
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
var webAddress = 'http://localhost/usbong_kms/index.php/REPORT/'; //default
var fileExtension = '';

//added by Mike, 20210225
var iPostPositionInFilename=fileName.indexOf("/_post")
var data=""

if (iPostPositionInFilename !== -1) {
	//Reference: https://stackoverflow.com/questions/1989009/javascript-substring;
	//answer by: Chirag, 20130411T0835
	//notes: 
	//syntax: string.substring(start [, stop])
	//syntax: string.substr(start [, length])

	filename=fileName.substring(0,iPostPositionInFilename);
	data='nameParam='+fileName.substring(iPostPositionInFilename+"/_post".length);

	webAddress = 'http://localhost/usbong_kms/index.php/browse/';
}	

//added by Mike, 20201017
var isNoonReport = system.args[3];
var noonFolderName = 'noonReport/';

//added by Mike, 20200725
//var dateToday = "20200727";//new Date(); 
var dateToday = new Date(); 

if (isFromServerFolder=="-s") {
	webAddress = 'http://localhost/usbong_kms/server/';
	fileExtension = '.php';
}

//added by Mike, 20201017
if (isNoonReport=="-noon") {
}
else {
	noonFolderName='';
}

console.log("Filename: " + fileName);

var page = require('webpage').create();

//added by Mike, 20210225; removed by Mike, 20210225
//var data='nameParam=zerodol';

//edited by Mike, 20200726
//page.open('http://localhost/usbong_kms/index.php/REPORT/'+filename, function(status) {

//edited by Mike, 20210225
//page.open(webAddress+fileName+fileExtension, function(status) {
page.open(webAddress+fileName+fileExtension, 'post', data, function(status) {
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
	//edited by Mike, 20201017
//	page.render('output/'+dateToday.toISOString()+'/'+fileName+'1.png');
//	page.render('output/20200727/'+fileName+'1.png');

	if (noonFolderName=="") {
		//edited by Mike, 20210309
		//page.render('output/'+dateToday.toISOString()+'/'+fileName+'1.png');
		//with POST data, e.g. for use with med item reports to pharmaceutical companies
		if (data != "") { //has post data
			page.render('output/'+dateToday.toISOString()+'/'+fileName+'V'+getDateToISOStringWithTimeStamp()+'.png');
//			page.render('output/'+dateToday.toISOString()+'/'+fileName+'V.png');
		}
		else {
			page.render('output/'+dateToday.toISOString()+'/'+fileName+'1.png');
		}		
	}
	else {
		//edited by Mike, 20201018
//		page.render('output/'+dateToday.toISOString()+'/'+noonFolderName+fileName+'NoonReport1.png');
		page.render('output/'+dateToday.toISOString()+'/'+noonFolderName+fileName+'Report1.png');
	}

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
	  
	  //edited by Mike, 20201017
	  //page.render('output/'+dateToday.toISOString()+'/'+fileName+iCount+'.png');
	  //page.render('output/'+dateToday.toISOString()+'/'+noonFolderName+fileName+iCount+'.png');

	  if (noonFolderName=="") {

		//edited by Mike, 20210309
		//page.render('output/'+dateToday.toISOString()+'/'+fileName+iCount+'.png');
		//with POST data, e.g. for use with med item reports to pharmaceutical companies
		if (data != "") { //has post data
			page.render('output/'+dateToday.toISOString()+'/'+fileName+iCount+'V'+getDateToISOStringWithTimeStamp()+'.png');
		}
		else {
			page.render('output/'+dateToday.toISOString()+'/'+fileName+iCount+'.png');
		}		


	  }
	  else {
		  //edited by Mike, 20201018
//		page.render('output/'+dateToday.toISOString()+'/'+noonFolderName+fileName+'NoonReport'+iCount+'.png');
		page.render('output/'+dateToday.toISOString()+'/'+noonFolderName+fileName+'Report'+iCount+'.png');

	  }


//	  page.render('output/20200727/'+fileName+iCount+'.png');
	
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
//        function ms(n) { return n < 10 ? '00'+ n : n < 100 ? '0' + n : n }
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

	   //edited by Mike, 20201001
	   //due to getMonth error when October, i.e. 9+1 
		
/*        return this.getFullYear() +
            pad(this.getMonth() + 1) +
            pad(this.getDate());			
*/
       return this.getFullYear()+""+
			pad(this.getMonth()+1)+""+
            pad(this.getDate());
	}

}

//added by Mike, 20210309
function getDateToISOStringWithTimeStamp() {
	function pad(n) { return n < 10 ? '0' + n : n; }
	
	myDateTime = new Date();
	
	//added by Mike, 20210316
	myDateTime.toLocaleString('en-US', { timeZone: 'Asia/Manila' })
	
	return myDateTime.getFullYear() +
		pad(myDateTime.getMonth() + 1) +
		pad(myDateTime.getDate()) + 'T' +
		pad(myDateTime.getHours()) +
		pad(myDateTime.getMinutes());

//	return "hallo";
}
