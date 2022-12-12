USE 14_assign2db;

DELETE FROM booking;
DELETE FROM bustrip;
DELETE FROM bus;
DELETE FROM passport;
DELETE FROM passenger;


SELECT * FROM passenger;
SELECT * FROM passport;
SELECT * FROM bus;
SELECT * FROM bustrip;
SELECT * FROM booking;


LOAD DATA LOCAL INFILE 'loaddatafall2021.txt' INTO TABLE bus FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n';

SELECT * FROM bus;

INSERT INTO passenger VALUES(11, "Homer", "Simpson");
INSERT INTO passenger VALUES(22, "Marge", "Simpson");
INSERT INTO passenger VALUES(33, "Bart", "Simpson");
INSERT INTO passenger VALUES(34, "Lisa", "Simpson");
INSERT INTO passenger VALUES(35, "Maggie", "Simpson");
INSERT INTO passenger VALUES(44, "Ned", "Flanders");
INSERT INTO passenger VALUES(45, "Todd", "Flanders");
INSERT INTO passenger VALUES(66, "Heidi", "Klum");
INSERT INTO passenger VALUES(77, "Michael", "Scott");
INSERT INTO passenger VALUES(78, "Dwight", "Schrute");
INSERT INTO passenger VALUES(79, "Pam", "Beesly");
INSERT INTO passenger VALUES(80, "Creed", "Bratton");
INSERT INTO passenger VALUES(99, "Tokai", "Teio");

INSERT INTO passport VALUES("US10", "USA", "2025-01-01", "1970-02-19", 11);
INSERT INTO passport VALUES("US12", "USA", "2025-01-01", "1972-08-12", 22);
INSERT INTO passport VALUES("US13", "USA", "2025-01-01", "2001-05-12", 33);
INSERT INTO passport VALUES("US14", "USA", "2025-01-01", "2004-03-19", 34);
INSERT INTO passport VALUES("US15", "USA", "2025-01-01", "2012-09-17", 35);
INSERT INTO passport VALUES("US22", "USA", "2030-04-04", "1950-06-11", 44);
INSERT INTO passport VALUES("US23", "USA", "2018-03-03", "1940-06-24", 45);
INSERT INTO passport VALUES("GE11", "Germany", "2027-01-01", "1970-07-12", 66);
INSERT INTO passport VALUES("US88", "Canada", "2030-02-13", "1979-04-25", 77);
INSERT INTO passport VALUES("US89", "Canada", "2022-02-02", "1976-04-08", 78);
INSERT INTO passport VALUES("US90", "Italy", "2020-02-28", "1980-04-04", 79);
INSERT INTO passport VALUES("US91", "Germany", "2030-01-01", "1959-02-02", 80);
INSERT INTO passport VALUES("JP20", "Japan", "2033-08-30", "1988-04-20", 99);

INSERT INTO bustrip VALUES(1, "Castles of Germany", "2022-01-01", "2022-01-17", "Germany", "VAN1111");
INSERT INTO bustrip VALUES(2, "Tuscany Sunsets", "2022-03-03", "2022-03-14", "Italy", "TAXI222");
INSERT INTO bustrip VALUES(3, "California Wines", "2022-05-05", "2022-05-10", "USA", "VAN2222");
INSERT INTO bustrip VALUES(4, "Beaches Galore", "2022-04-04", "2022-04-14", "Bermuda", "TAXI222");
INSERT INTO bustrip VALUES(5, "Cottage Country", "2022-06-01", "2022-06-22", "Canada", "CAND123");
INSERT INTO bustrip VALUES(6, "Arrivaderci Roma", "2022-07-05", "2022-07-15", "Italy", "TAXI111");
INSERT INTO bustrip VALUES(7, "Shetland and Orkney", "2022-09-09", "2022-09-29", "UK", "TAXI111");
INSERT INTO bustrip VALUES(8, "Disney World and Sea World", "2022-06-10", "2022-06-20", "USA", "VAN2222");
INSERT INTO bustrip VALUES(9, "Qatar Prix", "2022-10-03", "2022-10-18", "France", "TAXI111");
INSERT INTO bustrip VALUES(10, "Epsom Oaks", "2022-06-04", "2022-06-20", "UK", "TAXI333");



INSERT INTO booking VALUES(11, 1, 500);
INSERT INTO booking VALUES(22, 1, 500);
INSERT INTO booking VALUES(33, 1, 200);
INSERT INTO booking VALUES(34, 1, 200);
INSERT INTO booking VALUES(35, 1, 200);
INSERT INTO booking VALUES(66, 1, 600.99);
INSERT INTO booking VALUES(44, 8, 400);
INSERT INTO booking VALUES(45, 8, 200);
INSERT INTO booking VALUES(78, 4, 600);
INSERT INTO booking VALUES(80, 4, 600);
INSERT INTO booking VALUES(78, 1, 550);
INSERT INTO booking VALUES(33, 8, 300);
INSERT INTO booking VALUES(34, 8, 300);
INSERT INTO booking VALUES(11, 6, 600);
INSERT INTO booking VALUES(22, 6, 600);
INSERT INTO booking VALUES(33, 6, 100);
INSERT INTO booking VALUES(34, 6, 100);
INSERT INTO booking VALUES(35, 6, 100);
INSERT INTO booking VALUES(11, 7, 300);
INSERT INTO booking VALUES(44, 7, 400);
INSERT INTO booking VALUES(77, 7, 500);
INSERT INTO booking VALUES(99, 10, 100);


SELECT * FROM passenger;
SELECT * FROM passport;
SELECT * FROM bus;
SELECT * FROM bustrip;
SELECT * FROM booking;

UPDATE passport SET citizenshipcountry = "Germany" WHERE passid in (SELECT passengerid FROM passenger WHERE firstname = "Dwight" and lastname = "Schrute");


UPDATE bustrip SET busnum = "VAN1111" WHERE visitcountry = "USA";


SELECT * FROM passport;
SELECT * FROM bustrip;


