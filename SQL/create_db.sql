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
    DepartName ENUM('TransitService', 'Maintenance', 'Security',   'Customer Service', 'Human Resource') NOT NULL,
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
    BRouteName VARCHAR(50) NOT NULL,
    BusDestination VARCHAR(50) NOT NULL,
    BusLineType ENUM('Regular', 'Express', 'Night') NOT NULL,
    PRIMARY KEY (BServiceID),
    FOREIGN KEY (BServiceID) REFERENCES TransitService(ServiceID)
);
CREATE TABLE SubwayService (
    SServiceID INT(6) NOT NULL,
    SRouteName VARCHAR(50) NOT NULL,
    SubwayDestination VARCHAR(50) NOT NULL,
    PRIMARY KEY (SServiceID),
    FOREIGN KEY (SServiceID) REFERENCES TransitService(ServiceID)
);
CREATE TABLE StreetCarService (
    SCServiceID INT(3) NOT NULL,
    SCRouteName VARCHAR(50) NOT NULL,
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
    VehicleID CHAR(8) PRIMARY KEY,
    VehicleType ENUM('Bus', 'Wheel-Trans Bus', 'StreetCar', 'Subway', 'Subway car') NOT NULL,
    VehicleNumberSeries VARCHAR(20) NOT NULL,
    Model VARCHAR(50) NOT NULL,
    VehiclesInService INT NOT NULL,
    Built YEAR NOT NULL,
    Seat INT NOT NULL,
    LengthInMeters FLOAT NOT NULL,
    TrackGaugeInMillimeters FLOAT DEFAULT NULL,
    Fuel VARCHAR(50) NOT NULL,
    Manufacturer VARCHAR(50) NOT NULL
);
CREATE TABLE TransitSchedule (
    TransitScheduleID INT(6) NOT NULL,
    VehicleID CHAR(8) NOT NULL,
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
    VehicleID CHAR(8) NOT NULL,
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

CREATE TABLE ShiftRequest (
  RequestID INT ,
  EmployeeID INT,
  EffectiveDate DATETIME,
  OriginalShift INT, -- Either {404371, 404372, 404373}
  RequestedStartTime TIME,
  RequestedEndTIme TIME,
  Reason VARCHAR(255), 
  RequestDate DATETIME DEFAULT CURRENT_TIMESTAMP,
  Status VARCHAR(20) DEFAULT 'Pending', -- Either 'Approved'; 'Denied';'Pending'
  -- Primary Key constraint
  PRIMARY KEY (RequestID),
  FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),


  
  -- Constraint on request date
  CONSTRAINT RequestTimingCheck
  CHECK(TIMESTAMPDIFF(HOUR,RequestDate,EffectiveDate) >= 24),
  
  -- Constraint on DailyShiftHours
  CONSTRAINT DailyShiftLimit 
  CHECK (TIMESTAMPDIFF(HOUR, RequestedStartTime, RequestedEndTime) <= 8)
);

ALTER TABLE shiftrequest modify RequestID INT auto_increment;

CREATE TABLE MonFriServiceInterval (
    ServiceID INT,
    MorningPeak INT,
    Midday INT,
    AfternoonPeak INT,
    EarlyEvening INT,
    LateEvening INT,
    Coverage BOOLEAN GENERATED ALWAYS AS (MorningPeak IS NOT NULL AND Midday IS NOT NULL AND AfternoonPeak IS NOT NULL AND EarlyEvening IS NOT NULL AND LateEvening IS NOT NULL),
    TenMinService BOOLEAN GENERATED ALWAYS AS (MorningPeak < 10 AND Midday < 10 AND AfternoonPeak < 10 AND EarlyEvening < 10 AND LateEvening < 10),
    PRIMARY KEY (ServiceID),
    FOREIGN KEY (ServiceID) REFERENCES TransitService(ServiceID)
);

CREATE TABLE SatServiceInterval (
    ServiceID INT,
    MorningPeak INT,
    AfternoonPeak INT,
    EarlyEvening INT,
    LateEvening INT,
    Coverage BOOLEAN GENERATED ALWAYS AS (MorningPeak IS NOT NULL AND AfternoonPeak IS NOT NULL AND EarlyEvening IS NOT NULL AND LateEvening IS NOT NULL),
    TenMinService BOOLEAN GENERATED ALWAYS AS (MorningPeak < 10 AND AfternoonPeak < 10 AND EarlyEvening < 10 AND LateEvening < 10),
    PRIMARY KEY (ServiceID),
    FOREIGN KEY (ServiceID) REFERENCES TransitService(ServiceID)
);

CREATE TABLE SunHoliServiceInterval (
    ServiceID INT,
    MorningPeak INT,
    AfternoonPeak INT,
    EarlyEvening INT,
    LateEvening INT,
    Coverage BOOLEAN GENERATED ALWAYS AS (MorningPeak IS NOT NULL AND AfternoonPeak IS NOT NULL AND EarlyEvening IS NOT NULL AND LateEvening IS NOT NULL),
    TenMinService BOOLEAN GENERATED ALWAYS AS (MorningPeak < 10 AND AfternoonPeak < 10 AND EarlyEvening < 10 AND LateEvening < 10),
    PRIMARY KEY (ServiceID),
    FOREIGN KEY (ServiceID) REFERENCES TransitService(ServiceID)
);