CREATE TABLE Users(
	userID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(30),
	lastName VARCHAR(30),
	email VARCHAR(30) UNIQUE,
	home VARCHAR(20),
	mobile VARCHAR(20) UNIQUE,
	zip    VARCHAR(20),
	street  VARCHAR(40),
	city    VARCHAR(40),
	state VARCHAR(40),
	country VARCHAR(40),
	PRIMARY KEY (userID)
);


CREATE TABLE ServiceCount(
	 serviceId INT UNSIGNED NOT NULL  AUTO_INCREMENT,
	 service VARCHAR(50),
	 count INT
);

