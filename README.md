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


Features:
Feature 1: View Employee Birthday and Current Schedule 
This feature enables administrators to view upcoming employee birthdays and the current work schedules of employees. The feature is divided into two parts:
View Upcoming Employee Birthdays: This part allows users to retrieve a list of employees with birthdays occurring on or after the current date. The query is designed to fetch the EmployeeID, first name, last name, and birth date of the next ten employees, sorted by their birth date in ascending order. This functionality helps administrators to keep track of employee birthdays for planning celebrations or sending greetings.
View Current Employee Schedule: This part provides users with information on the current work schedules of employees. The query retrieves the EmployeeID, first name, last name, start time, end time, and schedule type for each employee by joining the Employee, EmployeeSchedule, and Schedule tables. This feature is essential for administrators to manage and view the schedules of employees effectively, ensuring proper workforce management and operational efficiency.

Feature 2: Update Department
This feature allows administrators to update the details of a specific department within the TTC transit information system. The ability to modify department information is crucial for maintaining accurate and up-to-date records, especially when there are changes in department names, contact information, or managerial assignments. By executing the following SQL query, administrators can change the name, contact number, and manager ID of a department based on its unique department ID.

Feature 3: Request Time Off - Have not implemented yet.
This feature will allow employees to request time off by submitting a start and end date for their leave. The request will be recorded in the system with a status of 'Pending' until it is reviewed and either approved or denied by the appropriate administrative personnel. Implementing this feature helps streamline the process of managing leave requests and ensures that all requests are documented and tracked efficiently.

Feature 4: Approve or Deny Time Off Request - Have not implemented yet.
This feature enables administrators to approve or deny time off requests submitted by employees. By updating the status of a time off request, administrators can manage and respond to leave requests efficiently. The status can be set to 'Approved' or 'Denied' based on the review of the request. This functionality ensures that employees are promptly informed about the decision regarding their leave requests.


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