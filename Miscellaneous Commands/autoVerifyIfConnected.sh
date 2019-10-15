#!/system/bin/sh
ping -c 1 123.134.45.10; output="$(echo $?)"
if [ "$output" -eq 0 ]; then
 echo "OK!"
else
 echo "NOT OK!"
fi
