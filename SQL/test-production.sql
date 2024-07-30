-- Feature 1 Employee Birthday and Employee Schedule
SELECT EmployeeID, FName, LName, DATE_FORMAT(BDate, '%m-%d') AS BDate 
FROM employee 
WHERE DATE_FORMAT(BDate, '%m') = DATE_FORMAT(NOW(), '%m')+1 OR (DATE_FORMAT(BDate, '%m%d') > DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(BDate, '%m') = DATE_FORMAT(NOW(), '%m'))  
ORDER BY BDate;


-- Feature 2 Employee Schedule
SELECT E.EmployeeID, E.FName, E.LName, S.StartTime, S.EndTime, S.ScheduleType
FROM Employee as E
left join schedule as S on E.Schedule = S.ScheduleID;

/*
-- Feature 3 Update Department
UPDATE Department 
SET DepartName = 'Maintenance', ContactNo = '4161234567', Mgr_ID = 107381 
WHERE DepartID = 202649;
-- 16:50:25	UPDATE Department  SET DepartName = 'Maintenance', ContactNo = '4161234567', Mgr_ID =107381  WHERE DepartID = 202649	Error Code: 1175. You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column.  To disable safe mode, toggle the option in Preferences -> SQL Editor and reconnect.	0.0075 sec
-- department
*/

-- Feature 3 Update Department
SET SQL_SAFE_UPDATES = 0; -- Disable safe update mode

UPDATE Department 
SET DepartName = 'TransitService', ContactNo = '4161234567', Mgr_ID = 107381 
WHERE DepartID = 202649;

SET SQL_SAFE_UPDATES = 1;  -- Re-enable safe update mode

-- See the Update
SELECT *
from Department
WHERE DepartID = 202649;


-- Feature 4 Requesting Time Off
INSERT into shiftrequest (EmployeeID,EffectiveDate,OriginalShift,RequestedStartTime,RequestedEndTIme,Reason)
-- Basic case
VALUES (1001, '2024-08-15', 'Night', '2024-08-15 22:00:00', '2024-08-16 06:00:00', 'Personal'),
(1010, '2024-08-15', 'Night', '2024-08-15 22:00:00', '2024-08-16 08:00:00', 'Personal');


-- See the request from the shiftrequest
Select *
from ShiftRequest
where RequestID = 1001 or RequestID = 1010;

-- Display all pending shift requests
SELECT RequestID, EmployeeID, EffectiveDate, OriginalShift, RequestedStartTime, RequestedEndTime, Reason, RequestDate, status from shiftrequest where Status LIKE '%Pending%';

-- Arrange: Get a pending request ID
SELECT @pendingRequestID := RequestID 
FROM shiftrequest 
WHERE Status = 'Pending' 
LIMIT 1;

-- Feature 5 Approve the request
-- Act: Approve the request
SET SQL_SAFE_UPDATES = 0; -- Disable safe update mode
UPDATE shiftRequest 
SET Status = 'Approved' 
WHERE RequestID = @pendingRequestID;
SET SQL_SAFE_UPDATES = 1;  -- Re-enable safe update mode

-- Assert: Verify the status change
SELECT Status 
FROM shiftrequest 
WHERE RequestID = @pendingRequestID;

-- Expected result: Status should be 'Approved'


-- Feature 6 View Performance
drop view if exists ALLTransitService;

CREATE VIEW AllTransitService AS
SELECT SServiceID AS ID, SRouteName, SubwayDestination AS Destination, 'Subway' AS ServiceType
FROM SubwayService 
UNION ALL
SELECT BserviceID, RouteName, BusDestination, BusLineType
FROM BusService
UNION ALL
SELECT SCServiceID, SCRouteName, StreetCarDestination, 'Streetcar' AS ServiceType
FROM StreetCarService;

-- take a look
select *
from AllTransitService;

drop view if exists PerfTable;

CREATE VIEW PerfTable AS
SELECT TimeI.ServiceID, ATS.ServiceType, TimeI.AverageWT AS AverageWaitingTime, 
       TimeI.TenMinService, TimeI.coverage AS AllTimeCoverage, V.Model, V.Seat
FROM `Sunholiday ServiceInterval` TimeI, Vehicle V, TransitServiceAssignVehicle TSAV, 
     AllTransitService ATS
WHERE TimeI.ServiceID = ATS.ID #tells you servicetype, streetcar, subway, or bus
AND TimeI.ServiceID = TSAV.ServiceID
AND TSAV.VehicleID = V.VehicleID;

-- take a look
select *
from PerfTable;