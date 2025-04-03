# Notes: Speed-up Knowledge Management System (KMS) Part 14

## PROBLEM:

1. How to trim or remove the excess blank spaces before and after a whole text in SQL? 

2. How to remove the new lines in the text?

## ANSWER:

Steps: Remove line feed and carriage return respectively, then trim the text.

We need to remove the line feed (\n) first before removing the carriage return (\r) to get the correct output.

1) Remove line feed 
> UPDATE `item` SET `item_name` =  replace (`item_name`, char(10), '');

2) Remove carriage return
> UPDATE `item` SET `item_name` =  replace (`item_name`, char(13), '');

3) Trim the text

> UPDATE `item` SET `item_name` = TRIM(`item_name`);

## Additional Reference

https://stackoverflow.com/questions/12747722/what-is-the-difference-between-a-line-feed-and-a-carriage-return;
last accessed: 20250403
