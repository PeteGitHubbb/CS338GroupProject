-- Feature 1: 
-- View Employee Birthday and Current Schedule 
SELECT EmployeeID, FName, LName, BDate 
FROM Employee 
WHERE BDate >= CURDATE() 
ORDER BY BDate ASC 
LIMIT 10;

SELECT EmployeeID, FName, LName, BDate 
FROM Employee 
WHERE BDate >= '2000-01-01' 
ORDER BY BDate ASC 
LIMIT 10;

SELECT EmployeeID, FName, LName, BDate 
FROM Employee 
WHERE BDate >= '1995-01-01' 
ORDER BY BDate ASC
LIMIT 10;

-- View Current Employee Schedule
SELECT E.EmployeeID, E.FName, E.LName, S.StartTime, S.EndTime, S.ScheduleType
FROM Employee E
JOIN EmployeeSchedule ES ON E.Schedule = ES.EmployeeScheduleID
JOIN Schedule S ON ES.EmployeeScheduleID = S.ScheduleID;


-- Feature 2: 
-- Update Department
UPDATE Department
SET DepartName = 'Maintenance', ContactNo = '4161234567', Mgr_ID =107381
WHERE DepartID = 202649;


-- Feature 3: Request Time Off (Have not implemented yet)
INSERT INTO TimeOffRequests (RequestID, EmployeeID, StartDate, EndDate, Status)
VALUES (1, 101, '2024-07-01', '2024-07-10', 'Pending');


-- Feature 4: Approve or Deny Time Off Request (Have not implemented yet)
UPDATE TimeOffRequests
SET Status = ?
WHERE RequestID = ?;