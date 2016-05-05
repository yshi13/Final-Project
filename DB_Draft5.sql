/* live version */

/* Tables are dropped in reverse order to remove FK constraints. */
DROP TABLE IF EXISTS TheftCaseMappings_T;
DROP TABLE IF EXISTS TheftCases_T;
DROP TABLE IF EXISTS UserReports_T;
DROP TABLE IF EXISTS Paychecks_T;
DROP TABLE IF EXISTS EmployeeHours_T;
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
	UserTypeID			int unsigned			NOT NULL	AUTO_INCREMENT,
	UserType			varchar(13)				NOT NULL,
	
	PRIMARY KEY 		(UserTypeID)
);
INSERT INTO UserTypes_T(UserType) VALUES ("root");
INSERT INTO UserTypes_T(UserType) VALUES ("npo-admin");
INSERT INTO UserTypes_T(UserType) VALUES ("employee");

CREATE TABLE Users_T(
	UserID 				int unsigned 			AUTO_INCREMENT,
	UserFirstName 		varchar(50) 			NOT NULL,
	UserMiddleInitial	varchar(1)				NULL,
	UserLastName		varchar(50)				NOT NULL,
	UserDOB				date					NOT NULL,
	UserGender			varchar(6)				NOT NULL,
	UserEmail			varchar(75)				NOT NULL,
	UserPhoneNumber		varchar(10)				NULL,
	UserAddress 		varchar(100)			NULL,
	VerifyCode			varchar(10)				NULL,
	UserPassword		varchar(255)			NOT NULL,
	
	/* FKs */
	UserTypeID			int unsigned			NOT NULL,
	/*(admin: 1, npo: 2, employee: 3) for now*/
	
	PRIMARY KEY 		(UserID),
	FOREIGN KEY 		(UserTypeID) 			REFERENCES 	UserTypes_T (UserTypeID)
);

CREATE TABLE Employers_T (
	EmployerID			int unsigned			NOT NULL	AUTO_INCREMENT,
	EmployerName 		varchar(128)			NOT NULL,
	EmployerAddress		varchar(128)			NOT NULL,
	
	/* This var indicates whether an employer is an alleged wage thief.
		(0: unflagged, 1: flagged) */
	EmployerFlag		int unsigned			NOT NULL,
	
	PRIMARY KEY			(EmployerID)
);
INSERT INTO Employers_T(EmployerID, EmployerName, EmployerAddress, EmployerFlag) VALUES (1, 'Test Employer', 'Test Employer Address Way, CA', 0);
INSERT INTO Employers_T(EmployerID, EmployerName, EmployerAddress, EmployerFlag) VALUES (2, 'Test Employer 2', 'Test Employer Address Way, CA', 0);

CREATE TABLE ParentCompanies_T(
	ParentCompanyID		int unsigned			NOT NULL	AUTO_INCREMENT,
	ParentCompanyName	varchar(128)			NOT NULL,
	
	PRIMARY KEY			(ParentCompanyID)
);
INSERT INTO ParentCompanies_T(ParentCompanyID, ParentCompanyName) VALUES (1, 'Test Parent Company');

CREATE TABLE Jobs_T (
	JobID				int unsigned			NOT NULL	AUTO_INCREMENT,
	JobName				varchar(128)			NOT NULL,

	/*FKs*/
	EmployerID			int unsigned			NOT NULL,

	PRIMARY KEY 		(JobID),
	FOREIGN KEY 		(EmployerID)			REFERENCES	Employers_T (EmployerID)
);
INSERT INTO Jobs_T (JobName, EmployerID) VALUES ('Test Job', 1);
INSERT INTO Jobs_T (JobName, EmployerID) VALUES ('Test Job 2', 2);

CREATE TABLE JobAssignments_T (
	JobAssignmentID		int unsigned			NOT NULL	AUTO_INCREMENT,

	/*FKs*/
	UserID 				int unsigned 			NOT NULL,
	JobID				int unsigned			NOT NULL,
	PayRate				float unsigned			NOT NULL,
	
	PRIMARY KEY			(JobAssignmentID),
	FOREIGN KEY 		(UserID)				REFERENCES	Users_T (UserID),
	FOREIGN KEY			(JobID)					REFERENCES	Jobs_T (JobID)
);
/*INSERT INTO JobAssignments_T (UserID, JobID, PayRate) VALUES (2, 1, 20.50);*/

CREATE TABLE EmployeeHours_T (
	HourEntryID			int unsigned			NOT NULL	AUTO_INCREMENT,
	NumHours			decimal(3,1) unsigned	NOT NULL,
	EntryDate			date					NOT NULL,
	
	/*FKs*/
	UserID 				int unsigned			NOT NULL,
	JobAssignmentID		int unsigned			NOT NULL,
	
	PRIMARY KEY			(HourEntryID),
	FOREIGN KEY 		(UserID)				REFERENCES	Users_T (UserID),
	FOREIGN KEY			(JobAssignmentID) 		REFERENCES	JobAssignments_T (JobAssignmentID)
);
	
CREATE TABLE Paychecks_T (
	PaycheckID			int unsigned			NOT NULL	AUTO_INCREMENT,
	PaycheckNumHours	decimal(4,1) unsigned	NOT NULL,
	AmountPaid			float unsigned			NOT NULL,
	PayPeriodStartDate	date					NOT NULL,
	PayPeriodEndDate	date					NOT NULL,
	
	/* This attribute determines whether an NPO has inserted this paycheck into a W.T. claim.
	   (0: not in claim; 1: in claim) */
	InWageTheftClaim	int unsigned			NOT NULL,
	
	/* When users enter paycheck information (after completing all hour
	entries for the pay period), algorithm checks num hours entered by
	user and estimated earnings for that pay period & sets a flag if 
	there is potential wage theft.
		(0: unflagged; 1: flagged)
	*/
	WageTheftFlag		int unsigned			NOT NULL,
	
	/*FKs*/
	UserID 				int unsigned			NOT NULL,
	JobAssignmentID		int unsigned			NOT NULL,
	
	PRIMARY KEY			(PaycheckID),
	FOREIGN KEY			(UserID)				REFERENCES	Users_T (UserID),
	FOREIGN KEY			(JobAssignmentID)		REFERENCES	JobAssignments_T (JobAssignmentID)
);

CREATE TABLE UserReports_T (
	UserReportID		int unsigned			NOT NULL	AUTO_INCREMENT,
	ReportComment		varchar(500)			NULL,
	
	/* This attribute determines whether an NPO has read the current report. */
	ReportRead			int unsigned			NOT NULL,
	
	/*FKs*/
	UserID 				int unsigned			NOT NULL,
	PaycheckID			int unsigned			NOT NULL,
	
	PRIMARY KEY			(UserReportID),
	FOREIGN KEY			(UserID)				REFERENCES	Users_T (UserID),
	FOREIGN KEY			(PaycheckID)			REFERENCES	Paychecks_T (PaycheckID)
);

CREATE TABLE TheftCases_T (
	TheftCaseID			int unsigned 			NOT NULL	AUTO_INCREMENT,
	
	/*FKs
	UserID of admin/npo creating the case */
	UserID				int	unsigned			NOT NULL,
	
	PRIMARY KEY			(TheftCaseID),
	FOREIGN KEY			(UserID)				REFERENCES	Users_T (UserID)
);
	
CREATE TABLE TheftCaseMappings_T (
	/*FKs*/
	TheftCaseID			int unsigned 			NOT NULL,
	PaycheckID			int unsigned			NOT NULL,
	
	FOREIGN KEY			(TheftCaseID)			REFERENCES	TheftCases_T (TheftCaseID),
	FOREIGN KEY			(PaycheckID)			REFERENCES	Paychecks_T (PaycheckID)
);

/* Re-enable foreign key constraint checks */
SET FOREIGN_KEY_CHECKS=1;