SHOW DATABASES;
DROP DATABASE 14_assign2db;
CREATE DATABASE 14_assign2db;
USE 14_assign2db;
SHOW TABLES;

CREATE TABLE passenger (passengerid INT NOT NULL, firstname VARCHAR(20) NOT NULL, lastname VARCHAR(20) NOT NULL, primary key(passengerid));

CREATE TABLE passport (passportid CHAR(4) NOT NULL, citizenshipcountry VARCHAR(30) NOT NULL, expirydate DATE NOT NULL,  birthdate DATE NOT NULL, PRIMARY KEY (passportid), passid INT NOT NULL, FOREIGN KEY(passid) REFERENCES passenger(passengerid) ON DELETE CASCADE);

CREATE TABLE bus (licenseplnum CHAR(7) NOT NULL, capacity INT NOT NULL, primary key(licenseplnum));

CREATE TABLE bustrip (tripid INT NOT NULL, tripname VARCHAR(50) NOT NULL, startdate DATE NOT NULL, enddate DATE NOT NULL, visitcountry VARCHAR(30) NOT NULL,  busnum CHAR(7) NOT NULL, FOREIGN KEY (busnum) REFERENCES bus(licenseplnum), primary key(tripid));

CREATE TABLE booking (passengerid INT NOT NULL, tripid INT NOT NULL, price INT NOT NULL, PRIMARY KEY (passengerid, tripid), FOREIGN KEY (passengerid) REFERENCES passenger(passengerid) ON DELETE CASCADE, FOREIGN KEY(tripid) REFERENCES bustrip(tripid));

SHOW TABLES;
