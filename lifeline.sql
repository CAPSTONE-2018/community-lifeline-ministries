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
    school_year varchar(25),
    reduced_lunch_eligible VARCHAR(10),
    pre_test varchar(10),
    post_test varchar(10)
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