DROP TABLE IF EXISTS UserTypes_T;
CREATE TABLE UserTypes_T (
	UserTypeID			int unsigned	NOT NULL	AUTO_INCREMENT,
	UserType			varchar(13)		NOT NULL,
	
	PRIMARY KEY 		(UserTypeID)
);
INSERT INTO UserTypes_T(UserType) VALUES ("root");

DROP TABLE IF EXISTS Users_T;
CREATE TABLE Users_T (
	UserID 				int unsigned 	AUTO_INCREMENT,
	Name 				varchar(128) 	NOT NULL,
	UserEmail			varchar(128)	NOT NULL,
	UserAddress 		varchar(128)	NULL,
	VerifyCode			varchar(10)		NULL,
	UserPassword		varchar(255)	NOT NULL,

	UserTypeID			int unsigned	NOT NULL,
	--(admin: 0, npo: 1, employee: 2) for now
	
	PRIMARY KEY 		(UserID),
	FOREIGN KEY 		(UserTypeID) 	REFERENCES 	UserTypes_T(UserTypeID)
);
-- Root admin generation
INSERT INTO Users_T(UserID, Name, UserEmail, UserPassword, UserTypeID) VALUES ('admin', 'Root Administrator', 'dummyEmail@test.test', 'password', 0)

DROP TABLE IF EXISTS Employers_T;
CREATE TABLE Employers_T (
	EmployerID			int unsigned	NOT NULL	AUTO_INCREMENT,
	EmployerName 		varchar(128)	NOT NULL,
	EmployerAddress		varchar(128)	NOT NULL,
	
	PRIMARY KEY			(EmployerID)
);

DROP TABLE IF EXISTS ParentCompanies_T;
CREATE TABLE ParentCompanies_T(
	ParentCompanyID		int unsigned	NOT NULL	AUTO_INCREMENT,
	ParentCompanyName	varchar(128)	NOT NULL
);

DROP TABLE IF EXISTS Jobs_T;
CREATE TABLE Jobs_T (
	JobID				int unsigned	NOT NULL	AUTO_INCREMENT,
	JobName				varchar(128)	NOT NULL,

	--FKs
	EmployerID			int unsigned	NOT NULL	AUTO_INCREMENT,

	PRIMARY KEY 		(JobID),
	FOREIGN KEY 		(EmployerID)	REFERENCES	Employers_T(EmployerID)
);

DROP TABLE IF EXISTS JobAssignments_T;
CREATE TABLE JobAssignments_T (
	--FKs
	UserID 				int unsigned 	AUTO_INCREMENT,
	JobID				int unsigned	NOT NULL	AUTO_INCREMENT,

	FOREIGN KEY 		(UserID)		REFERENCES	Users_T(UserID),
	FOREIGN KEY			(JobID)			REFERENCES	Jobs_T(JobID)
);

DROP TABLE IF EXISTS EmployeeRecords_T;
CREATE TABLE EmployeeRecords_T (
	PayPeriodStart		date			NOT NULL,
	PayPeriodEnd		date			NOT NULL,
	HoursLogged			int				NULL,
	
	--FKs
	UserID 				int unsigned 	AUTO_INCREMENT,
	
	FOREIGN KEY 		(UserID)		REFERENCES	Users_T(UserID),
);

DROP TABLE IF EXISTS Paychecks_T;
CREATE TABLE Paychecks_T (
	PaycheckID			int unsigned	NOT NULL	AUTO_INCREMENT,
	Hours				int unsigned	NOT NULL,
	Wages				int unsigned	NOT NULL,
	PaycheckStartDate	date			NOT NULL,
	PaycheckEndDate		date			NOT NULL,
	
	
	--FKs
	UserID 				int unsigned 	AUTO_INCREMENT,
	EmployerID			int unsigned	NOT NULL	AUTO_INCREMENT,
	
	PRIMARY KEY			(PaycheckID),
	FOREIGN KEY			(UserID)		REFERENCES	Users_T(UserID),
	FOREIGN KEY			(EmployerID)	REFERENCES	Employers_T(EmployerID)
	    
    --start/end dates for pay periods
);

DROP TABLE IF EXISTS TheftCases_T;
CREATE TABLE TheftCases (
	TheftCaseID			int unsigned 	NOT NULL	AUTO_INCREMENT,
	
	--ID of user creating the case
	UserID 				int unsigned 	AUTO_INCREMENT,
	
	PRIMARY KEY			(TheftCaseID),
	FOREIGN KEY			(UserID)		REFERENCES	Users_T(UserID)
);
	
DROP TABLE IF EXISTS TheftCaseMappings_T;
CREATE TABLE TheftCaseMappings_T (
	FOREIGN KEY			(TheftCaseID)		REFERENCES	TheftCases_T(TheftCaseID),
	
	/* how to incorporate multiple paycheck & report IDs? */
);

