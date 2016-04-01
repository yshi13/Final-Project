DROP TABLE IF EXISTS Users_T;
CREATE TABLE Users_T (
	UserID 				int unsigned 	AUTO_INCREMENT,
	Name 				varchar(128) 	NOT NULL,
	UserEmail			varchar(128)	NOT NULL,
	UserAddress 		varchar(128)	NULL,
	VerifyCode			varchar(10)		NULL,
	UserPassword		varchar(255)	NOT NULL,

	UserTypeID			int unsigned	NOT NULL,
	
	PRIMARY KEY 		(UserID),
	FOREIGN KEY 		(UserTypeID) 	REFERENCES 	UserTypes_T(UserTypeID),
);

--insert root user here

DROP TABLE IF EXISTS UserTypes_T;
CREATE TABLE UserTypes_T (
	UserTypeID			int unsigned	NOT NULL	AUTO_INCREMENT,
	UserType			varchar(13)		NOT NULL,
	
	PRIMARY KEY 		(UserTypeID),
);
INSERT INTO UserTypes_T(UserType) VALUES ("root");

DROP TABLE IF EXISTS Jobs_T;
CREATE TABLE Jobs_T (
	JobID				int unsigned	NOT NULL	AUTO_INCREMENT,
	JobName				varchar(128)	NOT NULL,
	
	PRIMARY KEY 		(JobID),
-- need to incorporate the foreign key field in this table defn and reorder tables
	FOREIGN KEY 		(EmployerID)	REFERENCES	Employers_T(EmployerID),
);

DROP TABLE IF EXISTS JobAssignments_T;
CREATE TABLE JobAssignments_T (
	FOREIGN KEY 		(UserID)		REFERENCES	Users_T(UserID),
	FOREIGN KEY			(JobID)			REFERENCES	Jobs_T(JobID),
);

DROP TABLE IF EXISTS Employers_T;
CREATE TABLE Employers_T (
	EmployerID			int unsigned	NOT NULL	AUTO_INCREMENT,
	EmployerName 		varchar(128)	NOT NULL,
	EmployerAddress		varchar(128)	NOT NULL,
	
	PRIMARY KEY			(EmployerID),
	/* FK for Parent Company ID? */
);

DROP TABLE IF EXISTS ParentCompanies_T;
CREATE TABLE ParentCompanies_T(
	ParentCompanyID		int unsigned	NOT NULL	AUTO_INCREMENT,
	ParentCompanyName	varchar(128)	NOT NULL,
);

DROP TABLE IF EXISTS Paychecks_T;
CREATE TABLE Paychecks_T (
	PaycheckID			int unsigned	NOT NULL	AUTO_INCREMENT,
	Hours				int unsigned	NOT NULL,
	Wages				int unsigned	NOT NULL,
	
	PRIMARY KEY			(PaycheckID),
	FOREIGN KEY			(UserID)		REFERENCES	Users_T(UserID),
	FOREIGN KEY			(EmployerID)	REFERENCES	Employers_T(EmployerID),
	
	/* think about storing user-reported hours, separate from the hours listed
	on paychecks
    
    start/end dates for pay periods
    */
);

DROP TABLE IF EXISTS TheftCaseMappings_T;
CREATE TABLE TheftCaseMappings_T (
	FOREIGN KEY			(CaseID)		REFERENCES	TheftCases_T(TheftCaseID),
	
	/* how to incorporate multiple paycheck & report IDs? */
);

DROP TABLE IF EXISTS TheftCases_T;
CREATE TABLE TheftCases (
	TheftCaseID			int unsigned 	NOT NULL	AUTO_INCREMENT,
	
	/* think about including the userID of user creating each case */
);
	






















