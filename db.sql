CREATE TABLE Users(
	userID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(30),
	lastName VARCHAR(30),
	email VARCHAR(30),
	PRIMARY KEY(userID)
);

CREATE TABLE PhoneNumber(
	numberID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	userID   INT UNSIGNED, 
	home VARCHAR(20),
	mobile VARCHAR(20),
	PRIMARY KEY(numberID),
	FOREIGN KEY (userID) REFERENCES Users(userID)
);
-- Add for Address 
CREATE TABLE Address(
		addressID 	  INT UNSIGNED NOT NULL AUTO_INCREMENT,
		userID 	      INT UNSIGNED,
		zip           VARCHAR(12),
  	street        VARCHAR(40),
  	city          VARCHAR(40),
  	state         VARCHAR(40),
  	PRIMARY KEY (addressID),
  	FOREIGN KEY (userID) REFERENCES Users(userID)
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
 