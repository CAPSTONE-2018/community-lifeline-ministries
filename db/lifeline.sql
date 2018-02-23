/*
**********************************Important Note*********************************
    To actually make changes to the database, you must edit this file
    and edit the actual database on the front server! talk to Dr.
    Howard about gaining access to the MYSQL database on the server
*********************************************************************************
*/
CREATE TABLE Student(
    Id int(10) AUTO_INCREMENT PRIMARY KEY,
    First_Name varchar(30),
    Last_Name varchar(30),
    Middle_Name varchar(30),
    Suffix varchar(10),
    Gender char(1),
    Birth_Date DATE,
    Address varchar(40),
    City varchar(30),
    State char(2),
    Zip int(5),
    Ethnicity varchar(30),
    School varchar(30),
    Permission_Slip TINYINT(1),
    Birth_Certificate TINYINT(1),
    Reduced_Lunch_Eligible TINYINT(1),
    IEP TINYINT(1)
);

/*
IEP = immediate emotional problem
 */


CREATE TABLE Allergy (
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Type varchar(60),
    Note varchar(500)
);

CREATE TABLE Student_To_Allergy(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Allergy_Id INT(10),
    CONSTRAINT FK_Student_Id_Allergy FOREIGN KEY (Student_Id) REFERENCES Student(Id),
    CONSTRAINT FK_Allergy_Id_Allergy FOREIGN KEY (Allery_Id) REFERENCES Allergy(Id)
);

CREATE TABLE ATTENDANCE_TO_PROGRAM (
  ID INT(10) AUTO_INCREMENT PRIMARY KEY,
  Program_Id INT(10),
  Attendance_Id INT(10),
  CONSTRAINT FK_Program_Id_Attendance FOREIGN KEY (Program_Id) REFERENCES Program (Id),
  CONSTRAINT FK_Attendance_Id_Attendance FOREIGN KEY (Attendance_Id) REFERENCES Attendance (Id)
);

CREATE TABLE ATTENDANCE (
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id Int(10),
    Student_Firstname varchar(50),
    Student_LastName varchar(50),
    Present TINYINT(1),
    Absent TINYINT(1),
    TardyInd TINYINT(1),
    TardyTime varchar(50)
);


CREATE TABLE Contact(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Prefix varchar(10),
    First_Name varchar(30),
    Last_Name varchar(30),
    Middle_Name varchar(30),
    Suffix varchar(10),
    Phone_Cell CHAR(20),
    Phone_Home CHAR(20),
    Address VARCHAR(40),
    City VARCHAR(30),
    State CHAR(2),
    Zip INT(5),
    Email VARCHAR(50),
    Relationship VARCHAR(30)
);


CREATE TABLE Volunteer_Employee(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Prefix VARCHAR(10),
    First_Name VARCHAR(30),
    Last_Name VARCHAR(30),
    Middle_Name VARCHAR(30),
    Suffix VARCHAR(10),
    Phone_Cell char(20),
    Phone_Home char(20),
    Address varchar(40),
    City varchar(30),
    State CHAR(5),
    Zip INT(5),
    Email varchar(50),
    Type VARCHAR(10)
);

CREATE TABLE Classes(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Class_Name VARCHAR(60)
);

CREATE TABLE School_Year(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Term VARCHAR(20),
    Year INT(4),
    Pre_Test DECIMAL(5, 2),
    Post_Test DECIMAL(5, 2),
    CONSTRAINT FK_Student_Id_School_Year FOREIGN KEY (Student_Id) REFERENCES Student(Id)
);

CREATE TABLE Programs (
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Name VARCHAR(60)
);

CREATE TABLE Classes_To_Programs(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Id INT(10),
    Class_Id INT(10),
    CONSTRAINT FK_Program_Id_Classes FOREIGN KEY (Program_Id) REFERENCES Programs(Id),
    CONSTRAINT FK_Class_Id_Classes FOREIGN KEY (Class_Id) REFERENCES Classes(Id)
);

CREATE TABLE Students_To_Classes(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Class_Id INT(10),
    CONSTRAINT FK_Student_Id_Enrolled FOREIGN KEY (Student_Id)
    REFERENCES Student(Id),
    CONSTRAINT FK_Class_Id_Enrolled FOREIGN KEY (Class_Id)
    REFERENCES Classes(Id)
);

CREATE TABLE Students_To_Contacts(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Student_Id INT(10),
    Conctact_Id INT(10),
    CONSTRAINT FK_Student_Id_To_Student FOREIGN KEY (Student_Id) REFERENCES Student(Id),
    CONSTRAINT FK_Contact_Id_To_Contact FOREIGN KEY (Conctact_Id) REFERENCES Contact(Id)
);

CREATE TABLE Volunteer_To_Programs(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Program_Id INT(10),
    Volunteer_Id INT(10),
    CONSTRAINT FK_Program_Id_Programs FOREIGN KEY (Program_Id) REFERENCES Programs(Id),
    CONSTRAINT FK_Volunteer_Id_Programs FOREIGN KEY (Volunteer_Id) REFERENCES Volunteer_Employee(Id)
);

CREATE TABLE Schedule(
    Id INT(10) AUTO_INCREMENT PRIMARY KEY,
    Class_Id INT(10),
    Volunteer_Id INT(10),
    Room_Number VARCHAR(30),
    Start_Time TIME,
    End_Time TIME,
    Day varchar(30),
    CONSTRAINT FK_Class_Id_Schedule FOREIGN KEY (Class_Id)
    REFERENCES Classes(Id),
    CONSTRAINT FK_Volunteer_Id_Schedule FOREIGN KEY (Volunteer_Id)
    REFERENCES Volunteer_Employee(Id)
);


CREATE TABLE Logins (
    username varchar(30) PRIMARY KEY,
    password varchar(32),
    account_type varchar(30),
    first_name varchar(30),
    last_name varchar(30),
    email varchar(30)
);

CREATE USER 'clm_user'@'localhost'  identified by 'dbuser';
GRANT SELECT, INSERT, UPDATE, DELETE on community_lifeline.* TO 'clm_user'@'localhost';

-- Original code as back up

/*

CREATE TABLE Students(
    student_id char(10) PRIMARY KEY,
    l_Name varchar(30),
    f_name varchar(30),
    age INT,
    gender char(1),
    birth_date DATE,
    address varchar(40),
    zip_code char(5),
    city varchar(15),
    school varchar(25),
    program char(5),
    ethnicity varchar(30),
    permission_slip char(1),
    birth_certificate char(1),
    school_year INT,
    reduced_lunch_eligible TINYINT(1),
    pre_test FLOAT(5,2),
    post_test FLOAT(5,2)
);


CREATE TABLE Parents(
    child_id char(10) PRIMARY KEY,
    stud_f varchar(30),
    stud_l varchar(30),
    f_name varchar(30),
    l_name varchar(30),
    phone char(14),
    income varchar(6),
    CONSTRAINT FK_child_id FOREIGN KEY (child_id, phone)
    	REFERENCES Students(student_id)
);
-- 14 characters for phone to factor in dashes
-- inserted income varchar(6)

CREATE TABLE Teachers(
    teacher_id char(10) PRIMARY KEY,
    f_name varchar(30),
    l_name varchar(30),
    phone char(14),
    address varchar(40),
    city varchar(15),
    zipcode char(5),
    email varchar(30)
);

CREATE TABLE Schedule(
    class_name char(15),
    teacher char(10),
    teacher_f varchar(30),
    teacher_l varchar(30),
    id_student varchar(30),
    studfirst varchar(30),
    studlast varchar(30),
    room_num char(5),
	class_time varchar(7),
    CONSTRAINT PK_schedule PRIMARY KEY(class_name,teacher,id_student),
    CONSTRAINT FK_Teacher FOREIGN KEY (teacher)
    	REFERENCES Teachers(teacher_id),
    CONSTRAINT FK_Student_id FOREIGN KEY(id_student)
    	REFERENCES Students(student_id)
);

CREATE TABLE Emergency_Info (
    student_reference_id char(10),
    studentfirst varchar(30),
    studentlast varchar(30),
    contact_first varchar(30),
    contact_last varchar(30),
    relation char(15),
    phone_num char(14),
    CONSTRAINT PK_EMERGENCY_INFO PRIMARY KEY (student_reference_id,phone_num),
    CONSTRAINT FK_student_reference_id FOREIGN KEY (student_reference_id)
    	REFERENCES Students(student_id)
);

CREATE TABLE Logins (
	username varchar(30) PRIMARY KEY,
	password varchar(32),
	account_type varchar(30),
	first_name varchar(30),
	last_name varchar(30),
	email varchar(30)
);

-- Test Values

INSERT INTO Students VALUES
('A1B3CL3215', 'Jacobs', 'Blake', 22, 'M', '1995-09-26', '123 S. Main St.', '60321', 'Romeoville',  'Lewis', 'GEMS', 'African-American', 'Y','Y');

INSERT INTO Parents VALUES
('A1B3CL3215', 'Blake', 'Jacobs', 'Damon', 'Jacobs', '1-630-898-7242', '60000');
-- insert 60k
INSERT INTO Teachers VALUES
('A12345678B', 'Carl', 'Winslow', '1-630-808-2131', '232 Westfield Ln', 'Planefield', '60325', 'Carlonduty@gmail.com');

INSERT INTO Schedule VALUES
('Math', 'A12345678B', 'Carl', 'Winslow', 'A1B3CL3215', 'Blake', 'Jacobs', '132A', '09:00AM');

INSERT INTO Emergency_Info VALUES
('A1B3CL3215', 'Blake', 'Jacobs', 'Roman', 'Gonzales', 'Family-Friend', '1-630-888-2132');

INSERT INTO Logins VALUES
('kenny123', 'lewis123', 'administrator', 'Kenny', 'Madsen', 'kenny@lewisu.edu');
 */

