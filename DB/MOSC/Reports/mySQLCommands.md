# Reports: MySQL (Structured Query Language) Commands
## 1) Auto-generate Total Patient Count for the Month
### 1.1) Example: For All Medical Doctors; Month: 2020-11; "NC", i.e. Gratis, not included

> SELECT * FROM `transaction` WHERE `patient_id` != -1 AND `transaction_quantity` != 0 AND `item_id` = 0 AND `notes` NOT LIKE '%ONLY%' AND `notes` NOT LIKE '%TRANS%' AND `notes` NOT LIKE '%NC;%' AND `notes` NOT LIKE '%REQUESTED%' AND `medical_doctor_id` !=0 AND `added_datetime_stamp` BETWEEN '2020-11-01' AND '2020-11-31'

## 2) Auto-generate Med Item Price List, order by item name ascending

## MySQL

> SELECT item_id, item_name, item_price FROM item WHERE is_hidden != 1 AND item_type_id = 1 ORDER BY item_name ASC;

## KMS

http://192.168.11.99/usbong_kms/index.php/report/viewReportMedicinePriceList
