CREATE TABLE Employee (
    EmployeeID INT(6) NOT NULL,
    BDate DATE NOT NULL,
    ContactNo CHAR(15) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Hiredate DATE NOT NULL,
    FName VARCHAR(50) NOT NULL,
    LName VARCHAR(50) NOT NULL,
    DepartNo INT(6) NOT NULL,
    SuperID INT(6),
    Schedule INT(6) NOT NULL,
    PRIMARY KEY (EmployeeID),
    FOREIGN KEY (SuperID) REFERENCES Employee(EmployeeID)
);
CREATE TABLE Department (
    DepartID INT(6) NOT NULL,
    ContactNo CHAR(15) NOT NULL,
   DepartName ENUM('TransitService', 'Maintenance', 'Security',   'Customer Service') NOT NULL,
    Mgr_ID INT(6) NOT NULL,
    PRIMARY KEY (DepartID),
    FOREIGN KEY (Mgr_ID) REFERENCES Employee(EmployeeID)
    );  
ALTER TABLE employee ADD FOREIGN KEY (DepartNo) REFERENCES Department(DepartID);
CREATE TABLE Depart_Location (
    DepartID INT(6) NOT NULL,
    DLocation VARCHAR(50) NOT NULL,
    PRIMARY KEY (DepartID, DLocation),
    FOREIGN KEY (DepartID) REFERENCES Department(DepartID)
);
CREATE TABLE TransitService (
    ServiceID INT(6) NOT NULL,
    ServiceType ENUM('Bus', 'StreetCar', 'Subway') NOT NULL,
    DepartID INT(6) NOT NULL,
    PRIMARY KEY (ServiceID),
    FOREIGN KEY (DepartID) REFERENCES Department(DepartID)
);
CREATE TABLE BusService (
    BServiceID INT(6) NOT NULL,
    BusLine INT(3) NOT NULL,
    BusDestination VARCHAR(50) NOT NULL,
    BusLineType ENUM('Regular', 'Express', 'Night') NOT NULL,
    PRIMARY KEY (BServiceID),
    FOREIGN KEY (BServiceID) REFERENCES TransitService(ServiceID)
);
CREATE TABLE SubwayService (
    SServiceID INT(6) NOT NULL,
    SubwayLine INT NOT NULL CHECK (SubwayLine BETWEEN 1 AND 3),
    SubwayDestination VARCHAR(50) NOT NULL,
    PRIMARY KEY (SServiceID),
    FOREIGN KEY (SServiceID) REFERENCES TransitService(ServiceID)
);
CREATE TABLE StreetCarService (
    SCServiceID INT(6) NOT NULL,
    StreetCarLine INT(3) NOT NULL,
    StreetCarDestination VARCHAR(50) NOT NULL,
    PRIMARY KEY (SCServiceID),
    FOREIGN KEY (SCServiceID) REFERENCES TransitService(ServiceID)
);
CREATE TABLE Schedule (
    ScheduleID INT(6) NOT NULL,
    StartTime TIME NOT NULL,
    EndTime TIME NOT NULL,
    MadebyDepart INT(6) NOT NULL,
    ScheduleType VARCHAR(50) NOT NULL,
    PRIMARY KEY (ScheduleID),
    UNIQUE (ScheduleType),
    FOREIGN KEY (MadebyDepart) REFERENCES Department(DepartID)
);
CREATE TABLE DaysPerWeek (
    ScheduleID INT(6) NOT NULL,
    DaysCovered VARCHAR(50) NOT NULL,
    PRIMARY KEY (ScheduleID),
    FOREIGN KEY (ScheduleID) REFERENCES Schedule(ScheduleID)
);
CREATE TABLE EmployeeSchedule (
    EmployeeScheduleID INT(6) NOT NULL,
    PRIMARY KEY (EmployeeScheduleID),
    FOREIGN KEY (EmployeeScheduleID) REFERENCES Schedule(ScheduleID)
);
ALTER TABLE Employee ADD FOREIGN KEY (Schedule) REFERENCES EmployeeSchedule(EmployeeScheduleID);
CREATE TABLE Vehicle (
    VehicleID INT(8) NOT NULL,
    VehicleType ENUM('Bus', 'StreetCar', 'Subway') NOT NULL,
    Capacity INT NOT NULL,
    Seats INT NOT NULL,
    Status BOOLEAN NOT NULL,
    PRIMARY KEY (VehicleID)
);
CREATE TABLE TransitSchedule (
    TransitScheduleID INT(6) NOT NULL,
    VehicleID INT(8) NOT NULL,
    PRIMARY KEY (TransitScheduleID),
    FOREIGN KEY (VehicleID) REFERENCES Vehicle(VehicleID)
);
CREATE TABLE EmployeeProvideTransitService (
    EmployeeID INT(6) NOT NULL,
    ServiceID INT(6) NOT NULL,
    PRIMARY KEY (EmployeeID, ServiceID),
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),
    FOREIGN KEY (ServiceID) REFERENCES TransitService(ServiceID)
);
CREATE TABLE TransitServiceAssignVehicle (
    ServiceID INT(6) NOT NULL,
    VehicleID INT(8) NOT NULL,
    PRIMARY KEY (ServiceID, VehicleID),
    FOREIGN KEY (ServiceID) REFERENCES TransitService(ServiceID),
    FOREIGN KEY (VehicleID) REFERENCES Vehicle(VehicleID)
);
CREATE TABLE ServiceFollowsSchedule (
    ServiceID INT(6) NOT NULL,
    ScheduleID INT(6) NOT NULL,
    PRIMARY KEY (ServiceID, ScheduleID),
    FOREIGN KEY (ServiceID) REFERENCES TransitService(ServiceID),
    FOREIGN KEY (ScheduleID) REFERENCES Schedule(ScheduleID)
);