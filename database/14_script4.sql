USE 14_assign2db;

DROP VIEW tripinfo;

CREATE VIEW tripinfo AS SELECT firstname, lastname, tripname, visitcountry, price FROM passenger, bustrip, booking WHERE booking.passengerid = passenger.passengerid AND bustrip.tripid = booking.tripid;
SELECT * FROM tripinfo;

SELECT * FROM tripinfo WHERE tripname LIKE "%Castles%" ORDER BY price ASC;

SELECT * FROM bus;
DELETE FROM bus WHERE licenseplnum LIKE "%UWO%";
SELECT * FROM bus;

SELECT * FROM passport;
SELECT * FROM passenger;
DELETE FROM passport WHERE citizenshipcountry = "Canada";
SELECT * FROM passport;
SELECT * FROM passenger;

-- COMMENT: The row of passport table with citizenship country "Canada" was deleted, because I have set the passenger ID as the foreign key with ON DELETE CASCADE command for passport table from passenger table, which means when there is any deletion in passenger table, the passport table will be deleted  correspondingly. Nevertheless, if we delete passport table, the passenger table won't have any change. We can consider passenger table as the parent and passport as the child, parent won't be influenced by child. Hence, when the row of passport table with citizenship country "Canada" was deleted, the passenger table was not affected. 

SELECT * FROM bustrip;
DELETE FROM bustrip WHERE tripname = "California Wines";
SELECT * FROM bustrip;
DELETE FROM bustrip WHERE tripname = "Arrivaderci Roma";

-- COMMENT: This bustrip could not be deleted, because there exists some passengers who book Arrivaderci Roma trip, when we want to delete this trip, we are notified to return money to passengers who booked this trip. I have set trip ID as the foreign key in booking table from bustrip table without DELETE CASCADE command, so when we delete a row in parent table, the booking will not be deleted, there will cause an error since this trip still has any booking from some passengers. 

SELECT * FROM passenger;
DELETE FROM passenger WHERE firstname = "Pam";
SELECT * FROM passenger;

SELECT * FROM tripinfo;
DELETE FROM passenger WHERE lastname = "Simpson";
SELECT * FROM tripinfo;

