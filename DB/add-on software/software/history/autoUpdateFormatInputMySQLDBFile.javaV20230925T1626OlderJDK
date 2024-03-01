/*
 * Copyright 2018~2023 SYSON, MICHAEL B.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 *     
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @company: USBONG
 * @author: SYSON, MICHAEL B.
 * @date created: 2018
 * @last updated: 20220925; from 20220408
 * @website address: http://www.usbong.ph
 *
 */
import java.util.*;
import java.io.File;
import java.io.FileInputStream;
import java.io.PrintWriter;

/* //removed by Mike, 20220405
import java.util.regex.Pattern;
import java.util.regex.Matcher;
import java.text.NumberFormat;
import java.text.DecimalFormat;
//import java.lang.Integer;

//added by Mike, 20210716
import java.util.Date; 
import java.text.DateFormat; 
import java.text.SimpleDateFormat;
*/

/*
' Given:
' 1) Input: MySQL File
' --> Saved/Exported as .sql file from phpMyAdmin
'
' Output:
' 1) Auto-updated .sql file 
' --> where: each table value is auto-written in its own row
'
' Notes:
' 1) To execute the add-on software/application simply use the following command:
'   java autoUpdateFormatInputMySQLDBFile 
' 
' where: "input201801.txt" is the name of the file.
'
*/ 

public class autoUpdateFormatInputMySQLDBFile {	
	private static boolean inDebugMode = true;

	//TO-DO: -update: this to auto-read from input configuration file
	//edited by Mike, 20230925
	//private static String sOutputFilenameInDBDirectory = "G:\\Usbong MOSC\\Everyone\\Information Desk\\DB";
	private static String sOutputFilenameInDBDirectory = "D:\\MOSC\\DB\\";
	
	public static void main ( String[] args ) throws Exception
	{					
		makeFilePath("output"); //"output" is the folder where I've instructed the add-on software/application to store the output file			
				
//		File mySQLDBInputFile = new File("input/"+"usbong_kmsV*"+".sql");
		File mySQLDBInputFile = new File(args[0]);

		//edited by Mike, 20220406
		//PrintWriter outputWriter = new PrintWriter("output/"+args[0].replace("input/","").replace(".sql","Updated.sql"), "UTF-8");
		String sOutputFilename;
		//Windows Machine OR Linux Machine?
		if (System.getProperty("os.name").contains("Windows")) { //IF Windows
			//sOutputFilename = "output/"+args[0].replace("input\\","").replace(".sql","Updated.sql");
			sOutputFilename = sOutputFilenameInDBDirectory+"/"+args[0].replace("input\\","").replace(".sql","Updated.sql");
		}
		else {
			//sOutputFilename = "output/"+args[0].replace("input/","").replace(".sql","Updated.sql");
			sOutputFilename = sOutputFilenameInDBDirectory+"/"+args[0].replace("input/","").replace(".sql","Updated.sql");
		}
				
		PrintWriter outputWriter = new PrintWriter(sOutputFilename, "UTF-8");		

		Scanner sc = new Scanner(new FileInputStream(mySQLDBInputFile));				
	
		String sInputValue;
		StringBuffer sbOutput = new StringBuffer();

		//count/compute the number-based values of inputColumns 
		while (sc.hasNextLine()) {
		  sbOutput.setLength(0); //clear
		
//		  System.out.println(sc.nextLine());			
		  sInputValue = sc.nextLine();
		  
	  	  if ((sInputValue.contains("INSERT INTO") && sInputValue.contains("VALUES"))) {
	  	  	//put each value in its own row
	  	  	for (String token : sInputValue.split("\\),")) { 
	  	  	  if (token.contains(");")) {
	  	  	  	sbOutput.append(token+"\n");
	  	  	  }
	  	  	  else {
	  	  	  	sbOutput.append(token+"),\n");
	  	  	  }
	  	  	}	  	  		  	  	
	  	  }		  
	  	  else {
	  	  	sbOutput.append(sInputValue+"\n");
	  	  }
	  	  
		  outputWriter.print(sbOutput);
		}
		
		outputWriter.close();
	}
	
	
	//added by Mike, 20181030
	private static void makeFilePath(String filePath) {
		File directory = new File(filePath);		
		if (!directory.exists() && !directory.mkdirs()) 
    		{
    			System.out.println("File Path to file could not be made.");
    		}    			
	}
			
}
