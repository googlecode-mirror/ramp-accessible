INSERT INTO tblCompany (idsCompanyID, chrName) VALUES (1, 'RAMP Engineering Inc.');
INSERT INTO tblCompany (idsCompanyID, chrName) VALUES (2, 'Cameron Technologies');
INSERT INTO tblCompany (idsCompanyID, chrName) VALUES (3, 'Fischer Custom Communications');
INSERT INTO tblCompany (idsCompanyID, chrName) VALUES (4, 'Hansen Engineering');

INSERT INTO tblCompanyLogin VALUES (1, 2, 'CAMERON', 'CAMERON');
INSERT INTO tblCompanyLogin VALUES (2, 3, 'FCC', 'FCC');

INSERT INTO tblContact VALUES (1, 1, 'Lisa', 'Scott', '(562)-531-8030', '(555)-555-5555', 'lisa.ramp@dslextreme.com', 'Office');
INSERT INTO tblContact VALUES (2, 1, 'Mark', 'Scott', '(562)-531-8030', '(555)-555-5555', 'msramp@dslextreme.com', 'Engineering');
INSERT INTO tblContact VALUES (3, 1, 'John', 'Cakebread', '(562)-531-8030', '(555)-555-5555', 'jcramp@dslextreme.com', 'Engineering');
INSERT INTO tblContact VALUES (4, 1, 'Claudio', 'Buzzoni', '(562)-531-8030', '(555)-555-5555', 'cbramp@dslextreme.com', 'Management');

INSERT INTO tblCompanyType (idsCompanyTypeID, chrType) VALUES (1, 'Customer');
INSERT INTO tblCompanyType (idsCompanyTypeID, chrType) VALUES (2, 'Vendor');
INSERT INTO tblCompanyType (idsCompanyTypeID, chrType) VALUES (3, 'Supplier');

INSERT INTO tblCompany_CompanyType (idsCompany_CompanyTypeID, idsCompanyTypeID, idsCompanyID) VALUES (1, 1, 2);
INSERT INTO tblCompany_CompanyType (idsCompany_CompanyTypeID, idsCompanyTypeID, idsCompanyID) VALUES (2, 1, 3);
INSERT INTO tblCompany_CompanyType (idsCompany_CompanyTypeID, idsCompanyTypeID, idsCompanyID) VALUES (3, 1, 4);

INSERT INTO tblRevision VALUES (1, '01');
INSERT INTO tblRevision VALUES (2, '02');
INSERT INTO tblRevision VALUES (3, '03');
INSERT INTO tblRevision VALUES (4, 'A');
INSERT INTO tblRevision VALUES (5, 'B');
INSERT INTO tblRevision VALUES (6, 'C');

INSERT INTO tblPart (idsPartID, idsCompanyID, idsRevisionID, chrPartNumber, intInStockQty, chrDescription) VALUES (1, 2, 1, '9A-0224-0017C', 0, 'HOUSING, TORQUE TUBE');
INSERT INTO tblPart (idsPartID, idsCompanyID, idsRevisionID, chrPartNumber, intInStockQty, chrDescription) VALUES (2, 2, 2, '418Z3142-21', 0, 'HOUSING, TORQUE TUBE');
INSERT INTO tblPart (idsPartID, idsCompanyID, idsRevisionID, chrPartNumber, intInStockQty, chrDescription) VALUES (3, 3, 3, 'F35-1250', 0, 'PROBE CASE');
INSERT INTO tblPart (idsPartID, idsCompanyID, idsRevisionID, chrPartNumber, intInStockQty, chrDescription) VALUES (4, 3, 4, '350A-5000-EIAEC5', 0, 'FLANGE UNIT');
INSERT INTO tblPart (idsPartID, idsCompanyID, idsRevisionID, chrPartNumber, intInStockQty, chrDescription) VALUES (5, 4, 5, '331W1683-23', 0, 'DEPRESSOR FITTING');
INSERT INTO tblPart (idsPartID, idsCompanyID, idsRevisionID, chrPartNumber, intInStockQty, chrDescription) VALUES (6, 4, 6, '724S3571-243', 0, 'STRINGER');

INSERT INTO tblJob (idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete) VALUES (1, 1, '4502667049', '1/10/2010', False, True, 70);
INSERT INTO tblJob (idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete) VALUES (2, 2, '4502667050', '2/10/2010', True, False, 100);
INSERT INTO tblJob (idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete) VALUES (3, 3, '35905', '3/10/2010', False, True, 30);
INSERT INTO tblJob (idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete) VALUES (4, 4, '35906', '4/10/2010', True, False, 100);
INSERT INTO tblJob (idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete) VALUES (5, 5, '91048', '5/10/2010', False, True, 50);
INSERT INTO tblJob (idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete) VALUES (6, 6, '91049', '6/10/2010', True, False, 100);

INSERT INTO tblJobDueDate VALUES (1, 1, '2-10-10', 100);
INSERT INTO tblJobDueDate VALUES (2, 2, '3-10-10', 200);
INSERT INTO tblJobDueDate VALUES (3, 3, '4-10-10', 300);
INSERT INTO tblJobDueDate VALUES (4, 4, '5-10-10', 400);
INSERT INTO tblJobDueDate VALUES (5, 5, '6-10-10', 500);
INSERT INTO tblJobDueDate VALUES (6, 6, '7-10-10', 600);

INSERT INTO tblJobShipDate VALUES (1, 2, '3-10-10', 200, 0);
INSERT INTO tblJobShipDate VALUES (2, 4, '5-10-10', 400, 0);
INSERT INTO tblJobShipDate VALUES (3, 6, '7-10-10', 600, 0);

INSERT INTO tblOperationNumber VALUES (1, 10);
INSERT INTO tblOperationNumber VALUES (2, 20);
INSERT INTO tblOperationNumber VALUES (3, 30);
INSERT INTO tblOperationNumber VALUES (4, 40);

INSERT INTO tblOperation VALUES (1, 1, 1, "Saw Material");
INSERT INTO tblOperation VALUES (2, 1, 2, "Mill Profile");
INSERT INTO tblOperation VALUES (3, 1, 3, "Finish Thickness");
INSERT INTO tblOperation VALUES (4, 2, 1, "Saw Material");
INSERT INTO tblOperation VALUES (5, 2, 2, "Turn OD");
INSERT INTO tblOperation VALUES (6, 2, 3, "Turn ID");
INSERT INTO tblOperation VALUES (7, 2, 4, "Mill Hex");
INSERT INTO tblOperation VALUES (8, 3, 1, "Mill profile and pockets");
INSERT INTO tblOperation VALUES (9, 3, 2, "Finish part complete");
INSERT INTO tblOperation VALUES (10, 4, 1, "Saw Material");
INSERT INTO tblOperation VALUES (11, 4, 2, "Finish part complete");

INSERT INTO tblMachine (idsMachineID, chrMachineName) VALUES (1, 1);
INSERT INTO tblMachine (idsMachineID, chrMachineName) VALUES (2, 2);
INSERT INTO tblMachine (idsMachineID, chrMachineName) VALUES (3, 3);
INSERT INTO tblMachine (idsMachineID, chrMachineName) VALUES (4, 4);

INSERT INTO tblProgram VALUES (1, 2, 1, 1);
INSERT INTO tblProgram VALUES (2, 3, 1, 1);
INSERT INTO tblProgram VALUES (3, 5, 2, 1);
INSERT INTO tblProgram VALUES (4, 6, 2, 1);
INSERT INTO tblProgram VALUES (5, 7, 3, 1);
INSERT INTO tblProgram VALUES (6, 8, 3, 1);
INSERT INTO tblProgram VALUES (7, 9, 3, 1);
INSERT INTO tblProgram VALUES (8, 11, 4, 1);

INSERT INTO tblProgramRevision VALUES (1, 1, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (2, 2, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (3, 3, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (4, 4, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (5, 5, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (6, 6, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (7, 7, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');
INSERT INTO tblProgramRevision VALUES (8, 8, 1, '1-1-10', '0:00', 'NEW', 'code', 'geometry', 'Initial Import');

INSERT INTO tblEmployee (idsEmployeeID, chrFirstName, chrLastName, chrUsername, chrPassword) VALUES (1, 'Nathan', 'Scott', 'Nathan', 'Nathan');
INSERT INTO tblEmployee (idsEmployeeID, chrFirstName, chrLastName, chrUsername, chrPassword) VALUES (2, 'Louis', 'Mendoza', 'Louis', 'Louis');
INSERT INTO tblEmployee (idsEmployeeID, chrFirstName, chrLastName, chrUsername, chrPassword) VALUES (3, 'Raymond', 'Jia', 'Raymond', 'Raymond');
INSERT INTO tblEmployee (idsEmployeeID, chrFirstName, chrLastName, chrUsername, chrPassword) VALUES (4, 'Truc', 'Nguyen', 'Truc', 'Truc');


