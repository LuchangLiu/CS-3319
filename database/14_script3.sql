USE 14_assign2db;

-- ----------------------------------
-- Query 1
SELECT tripname FROM bustrip WHERE visitcountry = "Italy";

-- ----------------------------------
-- Query 2
SELECT DISTINCT(lastname) FROM passenger;

-- ----------------------------------
-- Query 3
SELECT * FROM bustrip ORDER BY tripname;

-- ----------------------------------
-- Query 4
SELECT tripname, visitcountry, startdate FROM bustrip WHERE startdate > "2022-04-30";

-- ----------------------------------
-- Query 5
SELECT firstname, lastname, birthdate FROM passenger, passport WHERE passenger.passengerid = passport.passid AND passport.citizenshipcountry = "USA";

-- ----------------------------------
-- Query 6
SELECT tripname, capacity FROM bustrip, bus WHERE bustrip.busnum = bus.licenseplnum AND bustrip.startdate > "2022-04-01" AND bustrip.startdate < "2022-09-01";

-- ----------------------------------
-- Query 7
SELECT * FROM passport, passenger WHERE passport.passid =  passenger.passengerid AND passport.expirydate < ADDDATE( CURDATE(), INTERVAL 365 DAY);

-- ----------------------------------
-- Query 8
SELECT firstname, lastname, tripname FROM passenger, bustrip, booking WHERE passenger.passengerid = booking.passengerid AND bustrip.tripid = booking.tripid AND passenger.lastname LIKE "S%";

-- ----------------------------------
-- Query 9
SELECT COUNT(*) FROM bustrip, booking WHERE bustrip.tripname = "Castles of Germany" AND bustrip.tripid = booking.tripid;
SELECT COUNT(passengerid), tripname, booking.tripid FROM bustrip, booking WHERE bustrip.tripid = booking.tripid GROUP BY bustrip.tripname;

-- ----------------------------------
-- Query 10
SELECT visitcountry, SUM(price) FROM bustrip, booking WHERE bustrip.tripid = booking.tripid GROUP BY bustrip.visitcountry;

-- ----------------------------------
-- Query 11
SELECT firstname, lastname, citizenshipcountry, tripname, visitcountry FROM passport, passenger, bustrip, booking WHERE passport.citizenshipcountry NOT IN (SELECT visitcountry FROM bustrip WHERE bustrip.tripid = booking.tripid) AND passport.passid = booking.passengerid AND bustrip.tripid = booking.tripid AND booking.passengerid = passenger.passengerid;

-- ----------------------------------
-- Query 12
SELECT tripid, tripname FROM bustrip WHERE tripid NOT IN (SELECT booking.tripid FROM booking);

-- ----------------------------------
-- Query 13
DROP VIEW payment;
CREATE VIEW payment AS SELECT firstname, lastname, citizenshipcountry, SUM(price) AS "output" FROM booking, passenger, passport WHERE booking.passengerid = passenger.passengerid AND passport.passid = passenger.passengerid GROUP BY booking.passengerid;
SELECT * FROM payment WHERE output = (SELECT MAX(output) FROM payment);

-- ----------------------------------
-- Query 14
SELECT tripname FROM bustrip WHERE tripid IN(SELECT tripid FROM booking GROUP BY tripid HAVING count(passengerid) > 0 AND count(passengerid) < 4);

-- ----------------------------------
-- Query 15
SELECT tripname AS "BusTrip Name", COUNT(booking.passengerid) AS "Current Total Number of Passengers", capacity AS "Capacity of Bus", licenseplnum AS "License Plate" FROM bustrip, booking, bus WHERE booking.tripid = bustrip.tripid AND bustrip.busnum = bus.licenseplnum GROUP BY tripname;


