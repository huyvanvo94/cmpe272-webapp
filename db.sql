CREATE TABLE User(
	userID INT NOT NULL UNIQUE,
	firstName VARCHAR(100),
	lastName VARCHAR(100),
	email VARCHAR(100),
	PRIMARY KEY(userID)
);

CREATE TABLE PhoneNumber(
	numberID INT NOT NULL UNIQUE,
	userID INT, 
	home VARCHAR(100),
	mobile VARCHAR(100)
	PRIMARY KEY(numberID),
	FOREIGN KEY (userID) REFERENCES User(userID)
);

CREATE TABLE Address(
	addressID INT NOT NULL UNIQUE,
	userID INT, 
	ZIP           VARCHAR(12),
  STREET        VARCHAR(200),
  CITY          VARCHAR(100),
  STATE         VARCHAR(100),
  PRIMARY KEY (addressID),
  FOREIGN KEY (userID) REFERENCES User(userID)
);

-- Create Users 

INSERT INTO User(firstName, lastName, email) 
VALUES ('Bob', 'Dylan', 'bob.dylan@sjsu.edu'); 

INSERT INTO Address(userID, zip, street, city, state)
VALUES ( 1, '94501', '742 Park Ave', 'Oakland', 'CA');