# LibreOffice Calc
## 0.Q) How to execute using "RUN" command computer instructions classified as "MACRO"?
<b>Objective:</b> Eliminate excess steps to command the computer to execute a macro, i.e. set of instructions<br/>
## 0.A) Answer
### 0.1) Verify that the Java Development Kit (JDK) is installed on your Machine<br/>
Linux Machine, e.g. LUBUNTU (version: LTS 20.04)<br/>
1. Execute the following command on Terminal:<br/>
<b>sudo apt-get install openjdk-8-jdk</b><br/>
<br/>
<b>Additional Note:</b><br/>
1. "8" in "openjdk-8-jdk" is the Java version<br/>
2. "jdk", i.e. Java Development Kit, empowers us to write instructions using the Java Computer Language and make, i.e. compile, them into objects classified to be ".class" files.<br/>
--> These .class files are executed by the Java Virtual Machine (JVM).<br/>
--> If we set "jdk" to be "jre", i.e. Java Runtime Environment, we can only execute .class files using the JVM.

## 1.Q) How to add a "MACRO" Menu Item with a button to execute it?
<b>Objective:</b> Eliminate excess steps to command the computer to execute a macro, i.e. set of instructions<br/>
## 1.A) Answer
### 1.1) List of Action Steps<br/>
1. Go to Tools -> "Customize…".
2. Go to Right Panel, Target.
3. Click “Add…”.
4. In “New Menu” Window, write for Menu name field, “MACRO”.
5. Click OK.
6. Go to Right Panel, Target.
7. Click “MACRO”.
8. Go to Left Panel, Macros.
9. Go to Function, “InformationDeskWithMacroLibreOffice.ods”.
10. Go to Standard, Module1, “sendReportToCashier”.
11. Click Right Arrow.
12. Click OK.

Done!

### 1.2) Note
We use this with LibreOffice's Calc Module.

### 1.3) Reference
1) LibreOffice 6.3 Help: Assigning Scripts in LibreOffice<br/>
a) To assign a script to a new menu entry

## 2.Q) How to fix apostrophe becoming blank after using PHP's encode to UTF-8 tool?
## 2.A) Answer 
### 2.1)  List of Action Steps<br/>
1. Go to "Tools" -> "Localized Options" Tab.
2. In "Single Quotes", remove check mark in the checkbox for "Replace".
3. Click OK.

Done!

### 2.2) Reference:
1) https://ask.libreoffice.org/en/question/71000/is-there-any-way-to-default-to-a-correct-apostrophe/;<br/>
last accessed: 20200811

## 3.Q) How to export to Portable Document Format (PDF) file with text from LibreOffice Impress on [LUBUNTU Operating System (OS) version: 20.04 LTS](https://lubuntu.me/)?
## 3.A) Answer 
### 3.1)  List of Action Steps<br/>
1. Go to "Terminal", e.g. "QTerminal" Window<br/>
2. Execute Command: <b>sudo apt remove libreoffice-qt5</b><br/>
3. Enter "Y" as "Yes" answer to "Do you want to continue? \[Y/n\]"

Done!

### 3.2) Reference:
1) https://ask.libreoffice.org/en/question/241673/export-or-print-to-pdf-no-text/;<br/>
last accessed: 20201113; answer by: Piotr Szafrański, 20200829
