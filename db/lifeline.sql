/*
**********************************Important Note*********************************
    To actually make changes to the database, you must edit this file
    and edit the actual database on the front server! talk to Dr.
    Howard about gaining access to the MYSQL database on the server
*********************************************************************************
*/
CREATE TABLE Students (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id int(10) AUTO_INCREMENT PRIMARY KEY,
    Active_Student TINYINT(1),
    First_Name VARCHAR(30),
    Last_Name VARCHAR(30),
    Middle_Name VARCHAR(30),
    Suffix VARCHAR(10),
    Gender CHAR(1),
    Birth_Date DATE,
    Address_One VARCHAR(40),
    Address_Two VARCHAR(40),
    City VARCHAR(30),
    State CHAR(2),
    Zip INT(5),
    Ethnicity VARCHAR(30),
    School VARCHAR(30),
    Permission_Slip TINYINT(1),
    Birth_Certificate TINYINT(1),
    Reduced_Lunch_Eligible TINYINT(1),
    IEP TINYINT(1)
);

/*
IEP = immediate emotional problem
 */


CREATE TABLE Allergies (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(60),
    Type VARCHAR(60),
    Note VARCHAR(500)
);

CREATE TABLE Student_To_Allergies (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Allergy_Id INT(10),
    CONSTRAINT FK_Student_Id_Allergy FOREIGN KEY (Student_Id)
    REFERENCES Students (Id),
    CONSTRAINT FK_Allergy_Id_Allergy FOREIGN KEY (Allergy_Id)
    REFERENCES Allergies (Id)
);

CREATE TABLE Attendance (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Date DATE,
    Present TINYINT(1),
    Absent TINYINT(1),
    TardyInd TINYINT(1),
    TardyTime VARCHAR(50)
);

CREATE TABLE Contacts (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Active_Contact TINYINT(1),
    Prefix VARCHAR(10),
    First_Name VARCHAR(30),
    Last_Name VARCHAR(30),
    Middle_Name VARCHAR(30),
    Suffix VARCHAR(10),
    Primary_Phone CHAR(20),
    Secondary_Phone CHAR(20),
    Address_One VARCHAR(40),
    Address_Two VARCHAR(40),
    City VARCHAR(30),
    State CHAR(2),
    Zip INT(5),
    Email VARCHAR(50)
);

CREATE TABLE Volunteer_Employees (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Active_Volunteer TINYINT(1),
    Prefix VARCHAR(10),
    First_Name VARCHAR(30),
    Last_Name VARCHAR(30),
    Middle_Name VARCHAR(30),
    Suffix VARCHAR(10),
    Primary_Phone CHAR(20),
    Secondary_Phone CHAR(20),
    Address_One VARCHAR(40),
    Address_Two VARCHAR(40),
    City VARCHAR(30),
    State CHAR(5),
    Zip INT(5),
    Email VARCHAR(50),
    Type VARCHAR(10)
);

CREATE TABLE Classes(
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Active_Class TINYINT(1),
    Class_Name VARCHAR(60)
);

CREATE TABLE Student_To_Test_Scores (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    School_Year INT(10),
    Term VARCHAR(20),
    Pre_Test DECIMAL(5, 2),
    Post_Test DECIMAL(5, 2),
    CONSTRAINT FK_Student_Id_To_Students FOREIGN KEY (Student_Id)
    REFERENCES Students (Id)
);

CREATE TABLE Programs (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Active_Program TINYINT(1),
    Program_Name VARCHAR(60)
);

CREATE TABLE Attendance_To_Programs (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    ID INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Id INT(10),
    Attendance_Id INT(10),
    CONSTRAINT FK_Program_Id_Attendance FOREIGN KEY (Program_Id)
    REFERENCES Programs (Id),
    CONSTRAINT FK_Attendance_Id_Attendance FOREIGN KEY (Attendance_Id)
    REFERENCES Attendance (Id)
);

CREATE TABLE Class_To_Programs (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Id INT(10),
    Class_Id INT(10),
    CONSTRAINT FK_Program_Id_Classes FOREIGN KEY (Program_Id)
    REFERENCES Programs (Id),
    CONSTRAINT FK_Class_Id_Classes FOREIGN KEY (Class_Id)
    REFERENCES Classes (Id)
);

CREATE TABLE Student_To_Classes(
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Class_Id INT(10),
    CONSTRAINT FK_Student_Id_Enrolled FOREIGN KEY (Student_Id)
    REFERENCES Students (Id),
    CONSTRAINT FK_Class_Id_Enrolled FOREIGN KEY (Class_Id)
    REFERENCES Classes(Id)
);

CREATE TABLE Student_To_Contacts(
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Conctact_Id INT(10),
    Relationship VARCHAR(100),
    CONSTRAINT FK_Student_Id_To_Student FOREIGN KEY (Student_Id)
    REFERENCES Students (Id),
    CONSTRAINT FK_Contact_Id_To_Contact FOREIGN KEY (Conctact_Id)
    REFERENCES Contacts (Id)
);

CREATE TABLE Volunteer_To_Programs(
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Id INT(10),
    Volunteer_Id INT(10),
    CONSTRAINT FK_Program_Id_Programs FOREIGN KEY (Program_Id)
    REFERENCES Programs(Id),
    CONSTRAINT FK_Volunteer_Id_Programs FOREIGN KEY (Volunteer_Id)
    REFERENCES Volunteer_Employees (Id)
);

CREATE TABLE Schedules (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Id INT(10),
    Volunteer_Id INT(10),
    Room_Number VARCHAR(30),
    Start_Time VARCHAR(20),
    End_Time VARCHAR(20),
    Day_Of_Week VARCHAR(30),
    CONSTRAINT FK_Program_Id_Schedule FOREIGN KEY (Program_Id)
    REFERENCES Programs(Id),
    CONSTRAINT FK_Volunteer_Id_Schedule FOREIGN KEY (Volunteer_Id)
    REFERENCES Volunteer_Employees (Id)
);

CREATE TABLE Logins (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Active_User TINYINT(1),
    username VARCHAR(30) PRIMARY KEY,
    password VARCHAR(32),
    account_type VARCHAR(30),
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    email VARCHAR(30)
);

CREATE TABLE Student_To_Programs (
    Created_Timestamp TIMESTAMP DEFAULT now(),
    Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Author VARCHAR(30),
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Program_Id INT(10),
    CONSTRAINT FK_Student_Id_Program FOREIGN KEY (Student_Id)
    REFERENCES Students(Id),
    CONSTRAINT FK_Program_Id_Program FOREIGN KEY (Program_Id)
    REFERENCES Programs(Id)
);

CREATE USER 'clm_user'@'localhost'  identified by 'dbuser';
GRANT SELECT, INSERT, UPDATE, DELETE on community_lifeline.* TO 'clm_user'@'localhost';