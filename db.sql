CREATE TABLE Users(
	userID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(30),
	lastName VARCHAR(30),
	email VARCHAR(30) UNIQUE,
	home VARCHAR(10),
	mobile VARCHAR(10) UNICODE,
	zip    VARCHAR(5),
	street  VARCHAR(40),
	city    VARCHAR(40),
	state CHAR(2),
	PRIMARY KEY (userID)
);
-- Holds ID from User and Address
CREATE TABLE UserAddress(
	userID INT,
	addressID INT
);

CREATE TABLE ServiceCount(
	 serviceId INT UNSIGNED NOT NULL  AUTO_INCREMENT,
	 service VARCHAR(50),
	 count INT
);

 -- Enable search by names, email, or phone numbers 


INSERT INTO  Users
(firstName, lastName, email, home, mobile, zip, street, city, state)
VALUES ( "Hfuy", "Vo", "huy@gmail.com", "7531231231", "1231231111", "94501", "752 Pacific Ave", "Alameda", "CA");