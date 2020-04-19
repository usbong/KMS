# SQL Commands
If your table uses several foreign keys, you can use the following commands:<br/>
## 1) DROP TABLE

<b>SET FOREIGN_KEY_CHECKS=0; DROP TABLE yourtable;</b> 

## 2) TRUNCATE TABLE
<b>SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE yourtable;</b>
#### Note: With this, you need not add the foreign key contraints again.

## References:
1) https://stackoverflow.com/questions/25626045/deleting-foreign-key-tables-on-phpmyadmin-cannot-drop-index-needed-in-foreign;<br/>
last accessed: 20200419<br/>
answer by: Cfreak on 2014-09-02
