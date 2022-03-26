# Notes: Auto-read JSON File Structure 
<b>JSON (JavaScript Object Notation)</b> is a lightweight data-interchange text format.<br/>
where: format : name/value pairs<br/>
<br/>
<b>Reminder:</b><br/> 
Due to increased used of the <b>JSON</b> File Structure format, there already exists Libraries written in multiple Computer Languages for public use.<br/>
where: <b>Library</b> = set of reusable techniques written as computer instructions, e.g. reading and writing text in the JSON format

## Reference
https://www.json.org/json-en.html; last accessed: 20220326

# Linux Machine: Python3 + Bash Shell

## File: ./input/kasangkapanConfig.txt
{"<b>computerServerAddress</b>":"[http://192.168.1.10](http://192.168.1.10)"}

## COMMANDS
### Input:
myComputerServerAddress=$(cat <b>./input/kasangkapanConfig.txt</b> | python3 -c 'import json,sys;obj=json.load(sys.stdin);print(obj["<b>computerServerAddress</b>"])')<br/>
<br/>
echo $<b>myComputerServerAddress</b>

### Output:
http://192.168.1.10

