CREATE TABLE Users(
	userID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(100),
	lastName VARCHAR(100),
	email VARCHAR(100),
	PRIMARY KEY(userID)
);

CREATE TABLE PhoneNumber(
	numberID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	userID   INT UNSIGNED, 
	home VARCHAR(100),
	mobile VARCHAR(100),
	PRIMARY KEY(numberID),
	FOREIGN KEY (userID) REFERENCES Users(userID)
);
-- Add for Address 
CREATE TABLE Address(
	addressID 	  INT UNSIGNED NOT NULL AUTO_INCREMENT,
	userID 	      INT UNSIGNED, 
	zip           VARCHAR(12),
  	street        VARCHAR(200),
  	city          VARCHAR(100),
  	state         VARCHAR(100),
  	PRIMARY KEY (addressID),
  	FOREIGN KEY (userID) REFERENCES Users(userID)
);
-- Holds ID from User and Address
CREATE TABLE UserAddress(
	userID INT,
	addressID INT 
);

 CREATE TABLE ServiceCount(

 );