  INSERT INTO Logins (username, password, account_type, first_name, last_name, email) VALUES("admin", "21232f297a57a5a743894a0e4a801fc3", "administrator", "Developer", "Developer",  "Developer@gmail.com");

  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Corn Allergy", "Food Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Fish Allergy", "Food Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Egg Allergy", "Food Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Meat Allergy", "Food Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Peanut Allergy", "Food Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Eczema", "Skin Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Hives", "Skin Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Contact Dermatitis", "Skin Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Honeybee Sting", "Insect Sting Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Hornet Sting", "Insect Sting Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Wasp Sting", "Insect Sting Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Yellow Jackets Sting", "Insect Sting Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Fire Ants Sting", "Insect Sting Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Dog Allergy", "Pet Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Cat Allergy", "Pet Allergy");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "ADHD", "Mental Health");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Anxiety", "Mental Health");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "ODD", "Mental Health");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Asthma", "Medical Concern");
  INSERT INTO Medical_Concerns(Author_Username, Name, Type) VALUES ("Developer", "Diabetes", "Medical Concern");


  INSERT INTO Classes(Author_Username, Active_Class, Class_Name) VALUES ("Developer", 1, "Reading Workshop");
  INSERT INTO Classes(Author_Username, Active_Class, Class_Name) VALUES ("Developer", 1, "Writing Workshop");
  INSERT INTO Classes(Author_Username, Active_Class, Class_Name) VALUES ("Developer", 1, "Math Workshop");
  INSERT INTO Classes(Author_Username, Active_Class, Class_Name) VALUES ("Developer", 1, "Computer Programming");
  INSERT INTO Classes(Author_Username, Active_Class, Class_Name) VALUES ("Developer", 0, "Art Workshop");

  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name,  Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", 1, "Mrs.", "Marilee", "Muller","Sam" , "Sr.","630-350-4389", "630-833-8899", "454 Royal Oaks Drive", "Apt 11B", "Wooddale", "IL", 60105, "muller@gmail.com");
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", 1, "Mr.", "Bruce", "Alder", "Sam" , "Sr.", "773-240-0223", "250 Red Oaks Drive", "Apt B", "Bensenville", "IL", 60103, "bruce@yahoo.com");
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, City, State, Zip, Email) VALUES ("Developer", 1, "Mr.", "Paul", "Shall", "Sam" , "Sr.", "630-567-3322", "630-483-2234", "350 Forest Preserve Drive", "Wooddale", "IL", 60105, "shall@gmail.com");
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", 1, "Mrs.", "Pamela", "Ellery", "Sam" , "Sr.", "630-333-2453", "630-889-3299", "400 S Mason St", "Apt 3D", "Bensenville", "IL", 60103, "pam1@gmail.com");
  INSERT INTO Contacts(Author_Username, Active_Contact, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", 1, "Mrs.", "Andrea", "Wisnowski", "Sam" , "Sr.", "630-924-4592", "630-321-1299", "323 Judson St", "Suite 4" ,"Addison", "IL", 60101, "andrea@gmail.com");

  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ("Developer", 1, "Sons of Thunder");
  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ("Developer", 1, "G.E.M.");
  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ("Developer", 1, "New Program");
  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ("Developer", 1, "Music Program");
  INSERT INTO Programs(Author_Username, Active_Program, Program_Name) VALUES ("Developer", 1, "Math Program");

  INSERT INTO Class_To_Programs(Author_Username, Program_Id, Class_Id) VALUES ("Developer", 1,4);
  INSERT INTO Class_To_Programs(Author_Username, Program_Id, Class_Id) VALUES ("Developer", 2,1);
  INSERT INTO Class_To_Programs(Author_Username, Program_Id, Class_Id) VALUES ("Developer", 2,5);
  INSERT INTO Class_To_Programs(Author_Username, Program_Id, Class_Id) VALUES ("Developer", 1,2);
  INSERT INTO Class_To_Programs(Author_Username, Program_Id, Class_Id) VALUES ("Developer", 1,3);

  INSERT INTO Students(Author_Username, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ("Developer", "Audrey", "Chapman", "F", '2007-05-14' , "640 George St", "Apt 21D", "Bensenville", "IL", 60103, "Fullerton Middle School", 1, 1, 1, 0);
  INSERT INTO Students(Author_Username, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ("Developer", "Evan", "Freemon", "M", "2005-08-22", "389 Catalpa Dr", "Suite 3C", "Wooddale", "IL", 60105, "Glen Ellyn Middle School", 1, 1, 1, 0);
  INSERT INTO Students(Author_Username, First_Name, Last_Name, Gender, Birth_Date, Address_One, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ("Developer", "Frank", "Clarkson", "M", "2006-02-26" , "187 Georgia Ct", "Addison", "IL", 60101, "Joliet Middle School", 1, 1, 1, 1);
  INSERT INTO Students(Author_Username, First_Name, Last_Name, Gender, Birth_Date, Address_One, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ("Developer", "Gavin", "Randall", "M", "2005-03-12" , "890 White Pines Rd", "Bensenville", "IL", 60103, "Bloomingdale Middle School", 1, 1, 1, 1);
  INSERT INTO Students(Author_Username, First_Name, Last_Name, Gender, Birth_Date, Address_One, Address_Two, City, State, Zip, School, Permission_Slip, Birth_Certificate, Reduced_Lunch_Eligible, IEP) VALUES ("Developer", "Grace", "Miller", "F", "2007-09-18" , "672 N Indiana St", "Apt 4A", "Elmhurst", "IL", 60107, "Blackhawk Middle School", 1, 1, 1, 0);

  INSERT INTO Volunteer_Employees(Author_Username, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", "Mrs.", "Anna", "Smith", "Sam" , "Sr.", "773-345-6372", "101 Woodlawn Ave", "Condo 4", "Glen Ellyn", "IL", 60143, "smith43@gmail.com");
  INSERT INTO Volunteer_Employees(Author_Username, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, City, State, Zip, Email) VALUES ("Developer", "Mr.", "Johnny", "Donofrio", "Sam" , "Sr.", "847-532-2135", "727 Howard Dr", "Elmhurst", "IL", 60107, "donofrio@gmail.com");
  INSERT INTO Volunteer_Employees(Author_Username, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Address_One, City, State, Zip, Email) VALUES ("Developer", "Mrs.", "Catherine", "Lake", "Sam" , "Sr.", "630-943-1254", "612 Forest View Dr", "Addison", "IL", 60101, "lake@gmail.com");
  INSERT INTO Volunteer_Employees(Author_Username, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", "Mrs.", "Jamie", "Morgan", "Sam" , "Sr.", "630-777-1321", "630-234-4333", "221 Barron St", "Apt 345", "Bensenville", "IL", 60103, "morgan@gmail.com");
  INSERT INTO Volunteer_Employees(Author_Username, Prefix, First_Name, Last_Name, Middle_Name, Suffix, Primary_Phone, Secondary_Phone, Address_One, Address_Two, City, State, Zip, Email) VALUES ("Developer", "Mrs.", "Nancy", "Jacobs", "Sam" , "Sr.", "630-943-4422", "847-298-9824", "231 Breiter Ct", "Apt 617", "Bensenville", "IL", 60103, "jacobs@gmail.com");

  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ("Developer", 2, 1, "100", "3:30", "5:30", "Tuesdays");
  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ("Developer", 1, 4, "101", "3:30", "5:30", "Thursdays");
  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ("Developer", 4, 2, "102", "4:30", "6:30", "Mondays");
  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ("Developer", 3, 5, "103", "4:30", "6:30", "Wednesdays");
  INSERT INTO Schedules(Author_Username, Program_Id, Volunteer_Id, Room_Number, Start_Time, End_Time, Day_Of_Week) VALUES ("Developer", 5, 3, "104", "3:30", "5:30", "Fridays");

  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Id) VALUES ("Developer", 2, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Id) VALUES ("Developer", 1, 4);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Id) VALUES ("Developer", 4, 1);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Id) VALUES ("Developer", 3, 2);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Id) VALUES ("Developer", 5, 2);
  INSERT INTO Student_To_Medical_Concerns(Author_Username, Student_Id, Medical_Concern_Id) VALUES ("Developer", 4, 2);

  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (1, 5);
  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (1, 2);
  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (2, 4);
  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (2, 1);
  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (3, 3);
  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (4, 2);
  INSERT INTO Student_To_Programs(Student_Id, Program_Id) VALUES (5, 1);

  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship) VALUES ("Developer", 1, 3, "Uncle");
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship) VALUES ("Developer", 2, 2, "Father");
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship) VALUES ("Developer", 3, 4, "Aunt");
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship) VALUES ("Developer", 4, 5, "Mother");
  INSERT INTO Student_To_Contacts(Author_Username, Student_Id, Contact_Id, Relationship) VALUES ("Developer", 5, 1, "Neighbor");

  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id) VALUES ("Developer", 1, 4);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id) VALUES ("Developer", 2, 3);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id) VALUES ("Developer", 2, 1);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id) VALUES ("Developer", 1, 2);
  INSERT INTO Volunteer_To_Programs(Author_Username, Program_Id, Volunteer_Id) VALUES ("Developer", 1, 5);

  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES ("Developer", 1, 2016, "Spring", 72, 78);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES ("Developer", 1, 2016, "Fall", 76, 83);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES ("Developer", 2, 2017, "Spring", 74, 80);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES ("Developer", 2, 2017, "Fall", 78, 88);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES ("Developer", 3, 2018, "Spring", 55, 65);
  INSERT INTO Student_Test_Scores(Author_Username, Student_Id, School_Year, Term, Pre_Test, Post_Test) VALUES ("Developer", 3, 2018, "Summer", 55, 65);

  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 1, "2017-08-12", 1, 0, 0, 0);
  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 2, "2017-08-12", 1, 0, 0, 0);
  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 3, "2017-08-12", 1, 0, 0, 0);
  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 2, "2017-08-13", 1, 0, 0, 0);
  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 3, "2017-08-13", 1, 0, 0, 0);
  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 5, "2017-08-12", 1, 0, 0, 0);
  INSERT INTO Attendance(Author_Username, Student_Id, Date, Present, Absent, Tardy, TardyTime) VALUES ("Developer", 5, "2017-08-13", 1, 0, 0, 0);

  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 1, 1);
  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 2, 1);
  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 3, 2);
  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 4, 2);
  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 5, 1);
  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 5, 1);
  INSERT INTO Attendance_To_Programs(Author_Username, Attendance_Id, Program_Id) VALUES ("Developer", 5, 1);

  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 1, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 1, 2);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 2, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 3, 2);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 4, 1);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 4, 2);
  INSERT INTO Student_To_Programs(Author_Username, Student_Id, Program_Id) VALUES ("Developer", 5, 2);
