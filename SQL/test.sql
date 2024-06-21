SET GLOBAL local_infile=ON;
set foreign_key_checks = 0;
load data local infile 'C:/Users/stagq/OneDrive/Desktop/CS338 project/CS338GroupProject/csv_raw_data/CS 338 Project Sample Dataset - Employee.csv' into table employee fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile 'C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - Department.csv' into table department fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile 'C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - BusService.csv' into table busservice fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - DaysPerWeek.csv" into table daysperweek fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - DepartLocation.csv" into table depart_location fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - Department.csv" into table department fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - EmployeeSchedule.csv" into table employeeschedule fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/ServiceFollowsSchedule.csv" into table servicefollowsschedule fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - StreetCarService.csv" into table streetcarservice fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - SubwayService.csv" into table subwayservice fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - TransitSchedule.csv" into table transitschedule fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - TransitService.csv" into table transitservice fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - Vehicle.csv" into table vehicle fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
load data local infile "C:/Users/stagq/Downloads/Schedule.csv" into table schedule fields terminated by ','
	enclosed by '"'
	lines terminated by '\n'
	IGNORE 1 LINES;
-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - Department.csv"
-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - EmployeeSchedule.csv"
-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - ServiceFollowsSchedule.csv"
-- "C:\Users\stagq\Downloads\CS 338 Project Sample Dataset - StreetCarService.csv"
-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - SubwayService.csv"
-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - TransitSchedule.csv"

-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - TransitService.csv"
-- "C:/Users/stagq/Downloads/CS 338 Project Sample Dataset - Vehicle.csv"
select * from transitschedule;