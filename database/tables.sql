/* File: tables.sql - Creates all the tables for RAMP Database in MYSQL */

DROP TABLE IF EXISTS tblEmployee;
DROP TABLE IF EXISTS tblJobShipDate;
DROP TABLE IF EXISTS tblJobDueDate;
DROP TABLE IF EXISTS tblJob;
DROP TABLE IF EXISTS tblProgramRevision;
DROP TABLE IF EXISTS tblProgram;
DROP TABLE IF EXISTS tblMachine;
DROP TABLE IF EXISTS tblComPort;
DROP TABLE IF EXISTS tblBaudRate;
DROP TABLE IF EXISTS tblDataBit;
DROP TABLE IF EXISTS tblStopBit;
DROP TABLE IF EXISTS tblParity;
DROP TABLE IF EXISTS tblOperation;
DROP TABLE IF EXISTS tblOperationNumber;
DROP TABLE IF EXISTS tblPart;
DROP TABLE IF EXISTS tblRevision;
DROP TABLE IF EXISTS tblCompany_CompanyType;
DROP TABLE IF EXISTS tblCompanyType;
DROP TABLE IF EXISTS tblContact;
DROP TABLE IF EXISTS tblCompanyLogin;
DROP TABLE IF EXISTS tblCompany;

CREATE TABLE tblCompany
(
    idsCompanyID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrName         VARCHAR(80) NOT NULL,
    chrAddress      VARCHAR(80),
    chrCity         VARCHAR(80),
    chrState        VARCHAR(20),
    chrZip          VARCHAR(10),
    chrWebsite      VARCHAR(80),
    chrAlias        VARCHAR(80),
    chrShipName     VARCHAR(80),
    chrShipAddress  VARCHAR(80),
    chrShipCity     VARCHAR(80),
    chrShipState    VARCHAR(20),
    chrShipZip      VARCHAR(10),
    PRIMARY KEY (idsCompanyID),
    CONSTRAINT uc_Name UNIQUE (chrName)
);

CREATE TABLE tblCompanyLogin
(
    idsCompanyLoginID   INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsCompanyID        INT(6) UNSIGNED NOT NULL,
    chrUsername         VARCHAR(20) NOT NULL,
    chrPassword         VARCHAR(15) NOT NULL,
    PRIMARY KEY (idsCompanyLoginID),
    FOREIGN KEY (idsCompanyID) REFERENCES tblCompany (idsCompanyID)
);

CREATE TABLE tblContact
(
    idsContactID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsCompanyID    INT(6) UNSIGNED,
    chrFirstName    VARCHAR(80),
    chrLastName     VARCHAR(80),
    chrPhone        VARCHAR(15),
    chrFax          VARCHAR(15),
    chrEmail        VARCHAR(40),
    PRIMARY KEY (idsContactID),
    FOREIGN KEY (idsCompanyID) REFERENCES tblCompany (idsCompanyID),
    CONSTRAINT uc_Name UNIQUE (idsCompanyID, chrFirstName, chrLastName)
);

CREATE TABLE tblCompanyType
(
    idsCompanyTypeID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrType             VARCHAR(10),
    PRIMARY KEY (idsCompanyTypeID)
);

CREATE TABLE tblCompany_CompanyType
(
    idsCompany_CompanyTypeID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsCompanyTypeID            INT(6) UNSIGNED,
    idsCompanyID                INT(6) UNSIGNED,
    PRIMARY KEY (idsCompany_CompanyTypeID),
    FOREIGN KEY (idsCompanyID) REFERENCES tblCompany (idsCompanyID),
    FOREIGN KEY (idsCompanyTypeID) REFERENCES tblCompanyType (idsCompanyTypeID)
);

CREATE TABLE tblRevision
(
    idsRevisionID   INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrRevision     VARCHAR(20),
    PRIMARY KEY (idsRevisionID),
    CONSTRAINT uc_Revision UNIQUE (chrRevision)
);

CREATE TABLE tblPart
(
    idsPartID           INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsCompanyID        INT(6) UNSIGNED,
    idsRevisionID       INT(6) UNSIGNED,  
    chrPartNumber       VARCHAR(80),
    intInStockQty       INT(4) UNSIGNED,
    chrDescription      VARCHAR(255),
    chrDrawingNumber    VARCHAR(80),
    chrMaterial         VARCHAR(100),
    PRIMARY KEY (idsPartID),
    FOREIGN KEY (idsCompanyID) REFERENCES tblCompany (idsCompanyID),
    FOREIGN KEY (idsRevisionID) REFERENCES tblRevision (idsRevisionID),
    CONSTRAINT uc_Part UNIQUE (idsCompanyID, chrPartNumber, idsRevisionID)
);

CREATE TABLE tblJob
(
    idsJobNumber        INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsPartID           INT(6) UNSIGNED,
    chrPONumber         VARCHAR(20),
    dtmDateReceived     DATETIME,
    curPiecePrice       DECIMAL (8,2) UNSIGNED,
    blnShipped          BOOLEAN,
    blnReleased         BOOLEAN,
    PRIMARY KEY (idsJobNumber),
    FOREIGN KEY (idsPartID) REFERENCES tblPart (idsPartID)
);

CREATE TABLE tblJobDueDate
(
    idsJobDueDateID     INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsJobNumber        INT(6) UNSIGNED,    
    dtmDueDate          DATETIME,
    intQuantity         INT(5) UNSIGNED,
    PRIMARY KEY (idsJobDueDateID),
    FOREIGN KEY (idsJobNumber) REFERENCES tblJob (idsJobNumber)
);

CREATE TABLE tblJobShipDate
(
    idsJobShipDateID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsJobNumber        INT(6) UNSIGNED,
    dtmDate             DATETIME,
    intNewParts         INT(5) UNSIGNED,
    intFromInventory    INT(5) UNSIGNED,
    PRIMARY KEY (idsJobShipDateID),
    FOREIGN KEY (idsJobNumber) REFERENCES tblJob (idsJobNumber)
);

CREATE TABLE tblOperationNumber
(
    idsOperationNumberID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    intOperationNumber      INT(4) UNSIGNED NOT NULL,
    PRIMARY KEY (idsOperationNumberID),
    CONSTRAINT uc_OpeationNumber UNIQUE (intOperationNumber)
);

CREATE TABLE tblOperation
(
    idsOperationID          INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsPartID               INT(6) UNSIGNED NOT NULL,
    idsOperationNumberID    INT(6) UNSIGNED NOT NULL,
    chrDecription           VARCHAR(255),
    PRIMARY KEY (idsOperationID),
    FOREIGN KEY (idsPartID) REFERENCES tblPart(idsPartID),
    FOREIGN KEY (idsOperationNumberID) 
    REFERENCES tblOperationNumber (idsOperationNumberID),
    CONSTRAINT uc_Operation UNIQUE (idsPartID, idsOperationNumberID)
);

CREATE TABLE tblComPort
(
    idsComPortID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrName         VARCHAR(80) NOT NULL,
    PRIMARY KEY (idsComPortID),
    CONSTRAINT uc_ComPort UNIQUE (chrName)
);

CREATE TABLE tblBaudRate
(
    idsBaudRateID   INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    intBaudRate     INT(6) UNSIGNED NOT NULL,
    PRIMARY KEY (idsBaudRateID),
    CONSTRAINT uc_BaudRate UNIQUE (intBaudRate)
);

CREATE TABLE tblStopBit
(
    idsStopBitID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    intStopBits     INT(2) UNSIGNED NOT NULL,
    PRIMARY KEY (idsStopBitID),
    CONSTRAINT uc_StopBits UNIQUE (intStopBits)
);

CREATE TABLE tblDataBit
(
    idsDataBitID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    intDataBits     INT(2) NOT NULL,
    PRIMARY KEY (idsDataBitID),
    CONSTRAINT uc_DataBits UNIQUE (intDataBits)
);

CREATE TABLE tblParity
(
    idsParityID     INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrParity       VARCHAR(80) NOT NULL,
    PRIMARY KEY (idsParityID),
    CONSTRAINT uc_Parity UNIQUE (chrParity)
);

CREATE TABLE tblMachine
(
    idsMachineID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrMachineName  VARCHAR(80),
    idsParityID     INT(6) UNSIGNED,
    idsStopBitID    INT(6) UNSIGNED,    
    idsDataBitID    INT(6) UNSIGNED,
    idsComPortID    INT(6) UNSIGNED,
    idsBaudRateID   INT(6) UNSIGNED,
    PRIMARY KEY (idsMachineID),
    FOREIGN KEY (idsParityID) REFERENCES tblParity (idsParityID),
    FOREIGN KEY (idsStopBitID) REFERENCES tblStopBit (idsStopBitID),
    FOREIGN KEY (idsDataBitID) REFERENCES tblDataBit (idsDataBitID),
    FOREIGN KEY (idsComPortID) REFERENCES tblComPort (idsComPortID),
    FOREIGN KEY (idsBaudRateID) REFERENCES tblBaudRate (idsBaudRateID),
    CONSTRAINT uc_Machine UNIQUE (chrMachineName)
);

CREATE TABLE tblProgram
(
    idsProgramID        INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsOperationID      INT(6) UNSIGNED,
    idsMachineID        INT(6) UNSIGNED,
    intCurrentRevision  INT(2) UNSIGNED,
    PRIMARY KEY (idsProgramID),
    FOREIGN KEY (idsOperationID) REFERENCES tblOperation (idsOperationID),
    FOREIGN KEY (idsMachineID) REFERENCES tblMachine (idsMachineID),
    CONSTRAINT uc_Program UNIQUE (idsOperationID, idsMachineID)
);

CREATE TABLE tblProgramRevision
(
    idsProgramRevisionID    INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    idsProgramID            INT(6) UNSIGNED NOT NULL,
    intProgramRevision      INT(2) UNSIGNED NOT NULL,
    dtmRevisionDate         DATETIME,
    chrCycleTime            VARCHAR(9),
    chrStatus               VARCHAR(8),
    chrCodeFiles            VARCHAR(80),
    chrGeometryFiles        VARCHAR(80),
    chrRevisionMessage      VARCHAR(255),
    PRIMARY KEY (idsProgramRevisionID),
    FOREIGN KEY (idsProgramID) REFERENCES tblProgram (idsProgramID),
    CONSTRAINT uc_ProgramRevision UNIQUE (idsProgramID, intProgramRevision)
);

CREATE TABLE tblEmployee
(
    idsEmployeeID   INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    chrFirstName    VARCHAR(20) NOT NULL,
    chrLastName     VARCHAR(20) NOT NULL,
    chrEmail        VARCHAR(40) NOT NULL,
    chrPhone        VARCHAR(20) NOT NULL,
    chrUsername     VARCHAR(10),
    chrPassword     VARCHAR(15),
    PRIMARY KEY (idsEmployeeID),
    CONSTRAINT uc_Employee UNIQUE (chrFirstName, chrLastName, chrEmail),
    CONSTRAINT uc_EmployeeEmail UNIQUE (chrEmail),
    CONSTRAINT ucEmployeeUsername UNIQUE (chrUserName)
);
