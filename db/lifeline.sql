/*
**********************************Important Note*********************************
    To actually make changes to the database, you must edit this file
    and edit the actual database on the front server! talk to Dr.
    Howard about gaining access to the MYSQL database on the server
*********************************************************************************
*/
DROP DATABASE community_lifeline;
CREATE DATABASE community_lifeline;
use community_lifeline;

CREATE TABLE Students (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Student         TINYINT(1),
  First_Name             VARCHAR(30),
  Last_Name              VARCHAR(30),
  Middle_Name            VARCHAR(30),
  Suffix                 VARCHAR(10),
  Gender                 CHAR(1),
  Birth_Date             VARCHAR(30),
  Address_One            VARCHAR(40),
  Address_Two            VARCHAR(40),
  City                   VARCHAR(30),
  State                  CHAR(2),
  Zip                    INT(5),
  Ethnicity              VARCHAR(30),
  School                 VARCHAR(30),
  Permission_Slip        TINYINT(1),
  Birth_Certificate      TINYINT(1),
  Reduced_Lunch_Eligible TINYINT(1),
  IEP                    TINYINT(1)
);

# CREATE TABLE Medical_Concerns (
#   Created_Timestamp      TIMESTAMP DEFAULT now(),
#   Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
#   Author_Username        VARCHAR(30),
#   Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
#   Name                   VARCHAR(60),
#   Type                   VARCHAR(60),
#   Note                   VARCHAR(500)
# );

CREATE TABLE Medical_Concern_Types (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Id              TINYINT(1),
  Type_Name              VARCHAR(60),
  Note                   VARCHAR(500)
);

CREATE TABLE Student_To_Medical_Concerns (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Id              TINYINT(1),
  Student_Id             INT(10),
  Medical_Concern_Name   VARCHAR(50),
  Medical_Type_Id        INT(10),
  Note                   VARCHAR(500),
  CONSTRAINT FK_Student_Id_Medical_Concerns FOREIGN KEY (Student_Id)
  REFERENCES Students (Id),
  CONSTRAINT FK_Medical_Type_Id_Medical_Concerns FOREIGN KEY (Medical_Type_Id)
  REFERENCES Medical_Concern_Types (Id)
);

CREATE TABLE Programs (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Program         TINYINT(1),
  Program_Name           VARCHAR(60)
);

CREATE TABLE Attendance (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Student_Id             INT(10),
  Program_Id             INT(10),
  Date                   VARCHAR(100),
  Attendance_Value       TINYINT(1),
  TardyTime              VARCHAR(50),
  Note                   VARCHAR(500),
  CONSTRAINT FK_Student_Id_Attendance FOREIGN KEY (Student_Id)
  REFERENCES Students (Id),
  CONSTRAINT FK_Program_Id_Attendance FOREIGN KEY (Program_Id)
  REFERENCES Programs (Id)
);

CREATE TABLE Contacts (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Contact         TINYINT(1),
  Prefix                 VARCHAR(10),
  First_Name             VARCHAR(30),
  Last_Name              VARCHAR(30),
  Middle_Name            VARCHAR(30),
  Suffix                 VARCHAR(10),
  Primary_Phone          CHAR(20),
  Secondary_Phone        CHAR(20),
  Address_One            VARCHAR(40),
  Address_Two            VARCHAR(40),
  City                   VARCHAR(30),
  State                  CHAR(2),
  Zip                    INT(5),
  Email                  VARCHAR(50)
);

CREATE TABLE Volunteer_Employees (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Volunteer       TINYINT(1),
  Prefix                 VARCHAR(10),
  First_Name             VARCHAR(30),
  Last_Name              VARCHAR(30),
  Middle_Name            VARCHAR(30),
  Suffix                 VARCHAR(10),
  Primary_Phone          CHAR(20),
  Secondary_Phone        CHAR(20),
  Address_One            VARCHAR(40),
  Address_Two            VARCHAR(40),
  City                   VARCHAR(30),
  State                  CHAR(5),
  Zip                    INT(5),
  Email                  VARCHAR(50),
  User_Type              VARCHAR(30),
  Monday_Availability    TINYINT(1),
  Tuesday_Availability   TINYINT(1),
  Wednesday_Availability TINYINT(1),
  Thursday_Availability  TINYINT(1),
  Friday_Availability    TINYINT(1),
  Saturday_Availability  TINYINT(1),
  Sunday_Availability    TINYINT(1)
);

CREATE TABLE Classes (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Class           TINYINT(1),
  Class_Name             VARCHAR(60)
);

CREATE TABLE Student_Test_Scores (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Id              TINYINT(1),
  Student_Id             INT(10),
  School_Year            INT(10),
  Term                   VARCHAR(20),
  Pre_Test               DECIMAL(5, 2),
  Post_Test              DECIMAL(5, 2),
  CONSTRAINT FK_Student_Id_To_Students FOREIGN KEY (Student_Id)
  REFERENCES Students (Id)
);

CREATE TABLE Student_To_Contacts (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Id              TINYINT(1),
  Student_Id             INT(10),
  Contact_Id             INT(10),
  Relationship           VARCHAR(100),
  CONSTRAINT FK_Student_Id_To_Student FOREIGN KEY (Student_Id)
  REFERENCES Students (Id),
  CONSTRAINT FK_Contact_Id_To_Contact FOREIGN KEY (Contact_Id)
  REFERENCES Contacts (Id)
);

CREATE TABLE Volunteer_To_Programs (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Id              TINYINT(1),
  Program_Id             INT(10),
  Volunteer_Id           INT(10),
  CONSTRAINT FK_Program_Id_Programs FOREIGN KEY (Program_Id)
  REFERENCES Programs (Id),
  CONSTRAINT FK_Volunteer_Id_Programs FOREIGN KEY (Volunteer_Id)
  REFERENCES Volunteer_Employees (Id)
);

CREATE TABLE Schedules (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Program_Id             INT(10),
  Volunteer_Id           INT(10),
  Room_Number            VARCHAR(30),
  Start_Time             VARCHAR(20),
  End_Time               VARCHAR(20),
  Day_Of_Week            VARCHAR(30),
  CONSTRAINT FK_Program_Id_Schedule FOREIGN KEY (Program_Id)
  REFERENCES Programs (Id),
  CONSTRAINT FK_Volunteer_Id_Schedule FOREIGN KEY (Volunteer_Id)
  REFERENCES Volunteer_Employees (Id)
);

CREATE TABLE Student_To_Programs (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Id                     INT(10)   AUTO_INCREMENT PRIMARY KEY,
  Active_Id              TINYINT(1),
  Student_Id             INT(10),
  Program_Id             INT(10),
  CONSTRAINT FK_Student_Id_Program FOREIGN KEY (Student_Id)
  REFERENCES Students (Id),
  CONSTRAINT FK_Program_Id_Program FOREIGN KEY (Program_Id)
  REFERENCES Programs (Id)
);

CREATE TABLE Account_Login (
  Created_Timestamp      TIMESTAMP DEFAULT now(),
  Last_Updated_Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Author_Username        VARCHAR(30),
  Active_Id              TINYINT(1),
  Username               VARCHAR(30),
  Password               VARCHAR(32),
  Account_Type           VARCHAR(30),
  Employee_Id            INT(10),
  CONSTRAINT FK_User_Login_To_Volunteer_Employees FOREIGN KEY (Employee_Id)
  REFERENCES Volunteer_Employees (Id)
);

CREATE USER 'clm_user'@'localhost'
  IDENTIFIED BY 'dbuser';
GRANT SELECT, INSERT, UPDATE, DELETE ON community_lifeline.* TO 'clm_user'@'localhost';