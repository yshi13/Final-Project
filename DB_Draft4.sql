/* live version */

/* Tables are dropped in reverse order to remove FK constraints. */
DROP TABLE IF EXISTS TheftCaseMappings_T;
DROP TABLE IF EXISTS TheftCases_T;
DROP TABLE IF EXISTS Paychecks_T;
DROP TABLE IF EXISTS JobAssignments_T;
DROP TABLE IF EXISTS Jobs_T;
DROP TABLE IF EXISTS ParentCompanies_T;
DROP TABLE IF EXISTS Employers_T;
DROP TABLE IF EXISTS Users_T;
DROP TABLE IF EXISTS UserTypes_T;

/*  Temporarily disables outlandish MariaDB foreign key constraint syntax.
	This parameter is re-enabled after table generation. */
SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE UserTypes_T(
	UserTypeID			int unsigned	NOT NULL	AUTO_INCREMENT,
	UserType			varchar(13)		NOT NULL,
	
	PRIMARY KEY 		(UserTypeID)
);
INSERT INTO UserTypes_T(UserType) VALUES ("root");
INSERT INTO UserTypes_T(UserType) VALUES ("npo-admin");
INSERT INTO UserTypes_T(UserType) VALUES ("employee");

CREATE TABLE Users_T(
	UserID 				int unsigned 	AUTO_INCREMENT,
	Name 				varchar(128) 	NOT NULL,
	UserEmail			varchar(128)	NOT NULL,
	UserAddress 		varchar(128)	NULL,
	VerifyCode			varchar(10)		NULL,
	UserPassword		varchar(255)	NOT NULL,

	UserTypeID			int unsigned	NOT NULL,
	/*(admin: 0, npo: 1, employee: 2) for now*/
	
	PRIMARY KEY 		(UserID),
	FOREIGN KEY 		(UserTypeID) 	REFERENCES 	UserTypes_T (UserTypeID)
);
/*Root admin generation*/
INSERT INTO Users_T(UserID, Name, UserEmail, UserPassword, UserTypeID) VALUES ('admin', 'Root Administrator', 'dummyEmail@test.test', 'password', 0);

CREATE TABLE Employers_T (
	EmployerID			int unsigned	NOT NULL	AUTO_INCREMENT,
	EmployerName 		varchar(128)	NOT NULL,
	EmployerAddress		varchar(128)	NOT NULL,
	
	PRIMARY KEY			(EmployerID)
);

CREATE TABLE ParentCompanies_T(
	ParentCompanyID		int unsigned	NOT NULL	AUTO_INCREMENT,
	ParentCompanyName	varchar(128)	NOT NULL,
	
	PRIMARY KEY			(ParentCompanyID)
);

CREATE TABLE Jobs_T (
	JobID				int unsigned	NOT NULL	AUTO_INCREMENT,
	JobName				varchar(128)	NOT NULL,

	/*FKs*/
	EmployerID			int unsigned	NOT NULL,

	PRIMARY KEY 		(JobID),
	FOREIGN KEY 		(EmployerID)	REFERENCES	Employers_T (EmployerID)
);

CREATE TABLE JobAssignments_T (
	/*FKs*/
	UserID 				int unsigned 	NOT NULL,
	JobID				int unsigned	NOT NULL,

	FOREIGN KEY 		(UserID)		REFERENCES	Users_T (UserID),
	FOREIGN KEY			(JobID)			REFERENCES	Jobs_T (JobID)
);

CREATE TABLE Paychecks_T (
	PaycheckID			int unsigned	NOT NULL	AUTO_INCREMENT,
	Hours				int unsigned	NOT NULL,
	Wages				int unsigned	NOT NULL,
	PayPeriodStartDate	date			NOT NULL,
	PayPeriodEndDate	date			NOT NULL,
	
	
	/*FKs*/
	UserID 				int unsigned	NOT NULL,
	EmployerID			int unsigned	NOT NULL,
	
	PRIMARY KEY			(PaycheckID),
	FOREIGN KEY			(UserID)		REFERENCES	Users_T (UserID),
	FOREIGN KEY			(EmployerID)	REFERENCES	Employers_T (EmployerID)
);

CREATE TABLE TheftCases (
	TheftCaseID			int unsigned 	NOT NULL	AUTO_INCREMENT,
	
	/*FKs
	UserID of admin/npo creating the case */
	UserID				int	unsigned	NOT NULL,
	
	PRIMARY KEY			(TheftCaseID),
	FOREIGN KEY			(UserID)		REFERENCES	Users_T (UserID)
);
	
CREATE TABLE TheftCaseMappings_T (
	/*FKs*/
	TheftCaseID			int unsigned 	NOT NULL,
	PaycheckID			int unsigned	NOT NULL,
	
	
	FOREIGN KEY			(TheftCaseID)	REFERENCES	TheftCases_T (TheftCaseID),
	FOREIGN KEY			(PaycheckID)	REFERENCES	Paychecks_T (PaycheckID)
	
	/* check normalization on paycheck IDs in relation to users,jobs,etc */
);

/* Re-enable foreign key constraint checks */
SET FOREIGN_KEY_CHECKS=1;