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
role enum('teacher', 'student', 'admin') not null
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
content_url varchar(255),
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