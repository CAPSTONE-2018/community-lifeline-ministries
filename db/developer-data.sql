  INSERT INTO Medical_Concern_Types(Author_Username, Type_Name, Note, Active_Id) VALUES ('Developer', 'Allergy', '', 1);
  INSERT INTO Medical_Concern_Types(Author_Username, Type_Name, Note, Active_Id) VALUES ('Developer', 'Mental Health', '', 1);
  INSERT INTO Medical_Concern_Types(Author_Username, Type_Name, Note, Active_Id) VALUES ('Developer', 'Medical Concern', '', 1);

  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name,  Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ('Developer', 1, 'Mrs.', 'Marilee', 'Muller','Sam' , 'Sr.','630-350-4389', '630-833-8899', '454 Royal Oaks Drive', 'Apt 11B', 'Wooddale', 'IL', 60105, 'muller@gmail.com');
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ('Developer', 1, 'Mr.', 'Bruce', 'Alder', 'Sam' , 'Sr.', '773-240-0223', '250 Red Oaks Drive', 'Apt B', 'Bensenville', 'IL', 60103, 'bruce@yahoo.com');
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, City, State, Zip, Email) VALUES ('Developer', 1, 'Mr.', 'Paul', 'Shall', 'Sam' , 'Sr.', '630-567-3322', '630-483-2234', '350 Forest Preserve Drive', 'Wooddale', 'IL', 60105, 'shall@gmail.com');
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ('Developer', 1, 'Mrs.', 'Pamela', 'Ellery', 'Sam' , 'Sr.', '630-333-2453', '630-889-3299', '400 S Mason St', 'Apt 3D', 'Bensenville', 'IL', 60103, 'pam1@gmail.com');
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ('Developer', 1, 'Mrs.', 'Andrea', 'Wisnowski', 'Sam' , 'Sr.', '630-924-4592', '630-321-1299', '323 Judson St', 'Suite 4' ,'Addison', 'IL', 60101, 'andrea@gmail.com');

  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ('Developer', 1, 'Sons of Thunder');
  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ('Developer', 1, 'G.E.M.');
  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ('Developer', 1, 'Blessing Table');

  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 1, 'Audrey', 'Chapman', 'F', '05/14/2008' , '640 George St', 'Apt 21D', 'Bensenville', 'IL', 60103, 'Fullerton Middle School', 1, 1, 1, 0);
  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 1, 'Evan', 'Freemon', 'M', '08/22/2005', '389 Catalpa Dr', 'Suite 3C', 'Wooddale', 'IL', 60105, 'Glen Ellyn Middle School', 1, 1, 1, 0);
  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 1, 'Frank', 'Clarkson', 'M', '02/26/2006' , '187 Georgia Ct', 'Addison', 'IL', 60101, 'Joliet Middle School', 1, 1, 1, 1);
  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 1, 'Gavin','Randall', 'M', '03/12/2005', '890 White Pines Rd', 'Bensenville', 'IL', 60103, 'Bloomingdale Middle School', 1, 1, 1, 1);
  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 1, 'Grace', 'Miller', 'F', '09/18/1999' , '672 N Indiana St', 'Apt 4A', 'Elmhurst', 'IL', 60107, 'Blackhawk Middle School', 1, 1, 1, 0);
  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 0, 'Brian', 'Miller', 'M', '03/15/2004' , '612 S Woodland Ave', 'Apt 2D', 'Wooddale', 'IL', 60107, 'Blackhawk Middle School', 1, 1, 1, 0);
  INSERT INTO Students(Author_Username, Active_Student, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ('Developer', 0, 'Nick', 'Miller', 'M', '11/12/2006' , '111 E Washington St', 'Suite 4D', 'Bensenville', 'IL', 60107, 'Blackhawk Middle School', 1, 1, 1, 0);

  INSERT INTO Volunteer_Employees(Author_Username, Active_Volunteer, First_Name) VALUES ('Developer', 1, 'Developer');
  INSERT INTO Volunteer_Employees(Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, Address_Two, City, State, Zip, Email, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES ('Developer', 1, 'Mrs.', 'Anna', 'Smith', 'Sam' , 'Sr.', '773-345-6372', '101 Woodlawn Ave', 'Condo 4', 'Glen Ellyn', 'IL', 60143, 'smith43@gmail.com', 1, 0, 1, 0, 0, 0, 1);
  INSERT INTO Volunteer_Employees(Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, City, State, Zip, Email, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES ('Developer', 1, 'Mr.', 'Johnny', 'Donofrio', 'Sam' , 'Sr.', '847-532-2135', '727 Howard Dr', 'Elmhurst', 'IL', 60107, 'donofrio@gmail.com', 0, 1, 0, 1, 1, 1, 0);
  INSERT INTO Volunteer_Employees(Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, City, State, Zip, Email, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES ('Developer', 1, 'Mrs.', 'Catherine', 'Lake', 'Sam', 'Sr.', '630-943-1254', '612 Forest View Dr', 'Addison', 'IL', 60101, 'lake@gmail.com', 1, 1, 1, 0, 0, 0 , 0);
  INSERT INTO Volunteer_Employees(Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES ('Developer', 1, 'Mrs.', 'Jamie', 'Morgan', 'Sam', 'Sr.', '630-777-1321', '630-234-4333', '221 Barron St', 'Apt 345', 'Bensenville', 'IL', 60103, 'morgan@gmail.com', 1, 0, 1, 0, 0, 1, 0);
  INSERT INTO Volunteer_Employees(Author_Username, Active_Volunteer, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email, Monday_Availability, Tuesday_Availability, Wednesday_Availability, Thursday_Availability, Friday_Availability, Saturday_Availability, Sunday_Availability) VALUES ('Developer', 1, 'Mrs.', 'Nancy', 'Jacobs', 'Sam', 'Sr.', '630-943-4422', '847-298-9824', '231 Breiter Ct', 'Apt 617', 'Bensenville', 'IL', 60103, 'jacobs@gmail.com', 1, 1, 0, 1, 0, 1, 1);

  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ('Developer', 2, 1, '100', '3:30', '5:30', 'Tuesdays');
  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ('Developer', 1, 4, '101', '3:30', '5:30', 'Thursdays');
  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ('Developer', 3, 5, '103', '4:30', '6:30', 'Wednesdays');

  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Active_Id) VALUES ('Developer', 2, 'Peanut Allergy', 1, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Active_Id) VALUES ('Developer', 1, 'Dog Allergy', 1, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Active_Id) VALUES ('Developer', 4, 'ADHD', 3, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Active_Id) VALUES ('Developer', 3, 'Asthma', 3, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Active_Id) VALUES ('Developer', 5, 'Diabetes', 3, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Name, Medical_Type_Id, Active_Id) VALUES ('Developer', 4, 'Honeybee Sting', 1, 1);

  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship, Active_Id) VALUES ('Developer', 1, 3, 'Uncle', 1);
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship, Active_Id) VALUES ('Developer', 2, 2, 'Father', 1);
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship, Active_Id) VALUES ('Developer', 3, 4, 'Aunt', 1);
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship, Active_Id) VALUES ('Developer', 4, 5, 'Mother', 1);
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship, Active_Id) VALUES ('Developer', 5, 1, 'Neighbor', 1);

  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id, Active_Id) VALUES ('Developer', 1, 4, 1);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id, Active_Id) VALUES ('Developer', 2, 3, 1);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id, Active_Id) VALUES ('Developer', 2, 1, 1);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id, Active_Id) VALUES ('Developer', 1, 2, 1);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id, Active_Id) VALUES ('Developer', 1, 5, 1);

  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test, Active_Id) VALUES ('Developer', 1, 2016, 'Spring', 72, 78, 1);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test, Active_Id) VALUES ('Developer', 1, 2016, 'Fall', 76, 83, 1);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test, Active_Id) VALUES ('Developer', 2, 2017, 'Spring', 74, 80, 1);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test, Active_Id) VALUES ('Developer', 2, 2017, 'Fall', 78, 88, 1);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test, Active_Id) VALUES ('Developer', 3, 2018, 'Spring', 55, 65, 1);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test, Active_Id) VALUES ('Developer', 3, 2018, 'Summer', 55, 65, 1);

  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 1,  1, '02/12/2018', 'Present');
  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 2,  2, '02/12/2018', 'Present');
  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 1,  3, '02/12/2018', 'Present');
  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 1,  2, '02/12/2018', 'Present');
  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 2,  3, '02/12/2018', 'Present');
  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 2,  5, '02/12/2018', 'Present');
  INSERT INTO Attendance(Author_Username,Program_Id, Student_Id, Date, Attendance_Value) VALUES ('Developer', 2,  5, '02/12/2018', 'Present');

  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 1, 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 1, 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 2, 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 3, 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 4, 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 4, 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 5, 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 1, 3, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 1, 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 2, 3, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 2, 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 3, 3, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 4, 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 5, 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 6, 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id, Active_Id) VALUES ('Developer', 7, 2, 1);

  INSERT INTO Account_Login (Author_Username, Active_Id, Username, Password, Account_Type, Employee_Id) VALUES('Developer', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 1);