DROP DATABASE IF EXISTS youdemy_db;
CREATE DATABASE youdemy_db;
USE youdemy_db;

create table users (
id bigint  primary key auto_increment,
username varchar(50) not null unique,
email varchar(100) not null unique,
password_hash varchar(255) not null,
bio text ,
profile_picture_url varchar(255),
created_at  timestamp default current_timestamp,
role enum('teacher', 'student', 'admin','user') not null default 'user'
);

create table categories (
id bigint primary key  auto_increment,
name varchar(100) not null
);

create table tags(
id bigint primary key auto_increment,
name varchar(100) not null unique
);

create table courses (
id bigint not null primary key auto_increment,
title varchar(100) not null,
description text,
content enum('document','video') not null,
content_document varchar(255),
content_video text,
level enum('beginner','intermediate','advanced', 'expert') not null,
is_published boolean default false,
category_id bigint,
teacher_id bigint,
status enum('pending', 'approved', 'rejected') default 'pending',
created_at timestamp default current_timestamp,
foreign key (category_id) references categories(id) on delete cascade ,
foreign key (teacher_id) references users(id) on delete cascade
);

create table cours_tags(
tag_id bigint ,
course_id bigint,
primary key (tag_id, course_id),
foreign key (tag_id) references tags(id) on delete cascade,
foreign key (course_id) references courses(id) on delete cascade
);

create table enrollments (
    student_id bigint,
    course_id bigint,
    enrolled_at timestamp default current_timestamp,
completedAt datetime,
    primary key (student_id, course_id),
     foreign key (student_id) references users(id) on delete cascade,
    foreign key (course_id) references courses(id) on delete cascade
);

-- -- -- insert data -- -- 

INSERT INTO users (username, email, password_hash, bio, profile_picture_url, role) VALUES
('john_doe', 'john.doe@example.com', 'hashedpassword123', 'A passionate teacher of programming.', 'https://example.com/images/john.jpg', 'teacher'),
('jane_smith', 'jane.smith@example.com', 'hashedpassword456', 'A curious learner of web development.', 'https://example.com/images/jane.jpg', 'student'),
('admin_user', 'admin@example.com', 'adminhashedpassword789', 'Admin role with full permissions.', 'https://example.com/images/admin.jpg', 'admin');

INSERT INTO categories (name) VALUES
('Programming'),
('Design'),
('Marketing'),
('Business'),
('Data Science');

INSERT INTO tags (name) VALUES
('JavaScript'),
('Python'),
('Web Development'),
('Machine Learning'),
('UI/UX'),
('Data Analysis'),
('SEO'),
('Digital Marketing');

INSERT INTO courses (title, description, content, content_document ,content_video, level, category_id, teacher_id, status) VALUES
('Intro to JavaScript', 'Learn the basics of JavaScript programming.','video', null , 'https://example.com/courses/js101', 'beginner', 1, 1, 'approved'),
('Advanced Python for Data Science', 'Master Python for advanced data science tasks.', 'video','https://example.com/courses/python_advanced',null, 'expert', 5, 1, 'approved'),
('UI/UX Design Fundamentals', 'Learn the essentials of UI/UX design.', 'video',null,'https://example.com/courses/uiux_fundamentals', 'beginner', 2, 1, 'pending'),
('SEO for Beginners', 'A beginner’s guide to SEO for websites.', 'video','https://example.com/courses/seo101',null, 'beginner', 3, 2, 'approved'),
('Machine Learning with Python', 'Deep dive into machine learning algorithms and their implementation in Python.', 'video', null, 'https://example.com/courses/ml_python', 'intermediate', 5, 1, 'approved');

INSERT INTO cours_tags (tag_id, course_id) VALUES
(1, 1),  -- JavaScript, Intro to JavaScript
(2, 2),  -- Python, Advanced Python for Data Science
(4, 4),  -- SEO, SEO for Beginners
(5, 3),  -- UI/UX, UI/UX Design Fundamentals
(6, 5);  -- Data Analysis, Machine Learning with Python

INSERT INTO enrollments (student_id, course_id, completedAt) VALUES
(2, 1, NULL),  -- Jane Smith enrolled in "Intro to JavaScript", not completed
(2, 2, '2025-01-10 10:00:00'),  -- Jane Smith completed "Advanced Python for Data Science"
(2, 4, NULL),  -- Jane Smith enrolled in "SEO for Beginners", not completed
(1, 5, '2025-01-12 15:00:00');  -- John Doe completed "Machine Learning with Python"

 alter table users add column is_banned BOOLEAN DEFAULT FALSE; 