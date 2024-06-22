# CS338GroupProject
TTC Transit Information System

Contributors
Yuzheng Tang, Pete Wang, George Niu, Fred Fan, Edward Zhang

Data Source
The majority of the data from our system is derived from https://www.ttc.ca/ along with Wikipedia. There is a certain portion of data that is inaccessible due to privacy concerns, thus we choose to use make-up figures. The dataset for this application will be a relational database management system (RDBMS) that stores information about employees, departments, transit services, schedules, vehicles, and other relevant data​​. 

Load Sample Data into MySQL Database Method:
Ensure that MySQL and MySQL Workbench is installed and working on your local machine.
Download the CSV files attached within the csv_raw_data folder. Each csv file corresponds to a data table with the same name, and contains the data necessary to populate the table.
Run the commands from SQL/create_db.sql within a MySQL instance to create the Data Tables for all entities and relationships. Foreign keys are defined within this file.
Run the commands in SQL/populate_db.sql to populate the Data Tables with the previously downloaded CSV data. Ensure that the paths defined within this file are changed to reflect your own file structure and the location of the downloaded CSVs. 
Optionally run SQL\check_fk_validity.sql to check if foreign key constraints are satisfied.

Dataset Details:
Employees: Information about employees including profiles, department assignments, and management hierarchy.
Departments: Details about departments, including contact information and department locations.
DepartLocaiton: Data indicating the specific location of a given department. 
Transit Services: Data on various transit services such as buses, streetcars, and subways, including their service type (regular, express or night).
Vehicles: Information on vehicles including maintenance records, capacity, and status.
Schedule: Data on various transit approaches’ schedule (including buses, streetcars and subways) and employee schedule.
DayPerWeek: Data on the number of days covered by a given schedule. 

Guid for navigating the webpage:
1.run this command under cs338groupproject folder in terminal:php -S localhost:8000
2.now try to access http://localhost:8000/index.php

#config stuff
<?php
$config = [
'servername' => $servername$,
'username' => $username$,
'password' => $password$,
'dbname' => '$dbname$'
];
?>