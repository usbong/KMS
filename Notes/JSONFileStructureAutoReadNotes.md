# Notes: Auto-read JSON File Structure 
https://www.json.org/json-en.html; last accessed: 20220326

# Linux Machine: Python3 + Bash Shell

## File: /input/kasangkapanConfig.txt
{"computerServerAddress":["http://192.168.1.10"](http://192.168.1.10)}

## COMMANDS
### Input:
myComputerServerAddress=$(cat ./input/kasangkapanConfig.txt | python3 -c 'import json,sys;obj=json.load(sys.stdin);print(obj["computerServerAddress"])')<br/>
<br/>
echo $myComputerServerAddress

### Output:
http://192.168.1.10

