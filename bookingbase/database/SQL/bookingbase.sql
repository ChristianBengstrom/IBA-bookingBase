DROP DATABASE IF EXISTS bookingbase;

CREATE DATABASE bookingbase;
USE bookingbase;

-- CREATING TABLES -------------------------------------------------
-- rekvirent
  create table rekvirents(
    id int auto_increment primary key,
    user_id int,                          -- nullable!
    class_id varchar(20),                 -- nullable!
    unique (user_id, class_id)
  );

-- course
  create table course(
    id varchar(20) not null primary key,          -- dkpbweb181a
    size int not null,                            -- number of students in class
    created_when timestamp default CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    rekv_id int not null,
    foreign key(rekv_id) references rekvirents(id)
  );

-- user
  create table users(
    id int auto_increment primary key,
    name varchar(20) not null unique,
    email varchar(20) not null,
    password blob not null,
    remembertoken varchar(100) not null,
    created_at timestamp not null,
    updated_at timestamp not null,
    rekv_id int not null,
    foreign key(rekv_id) references rekvirents(id)

  );

-- room
  create table rooms(
    id int not null,                                      -- fx 102 = 1. sal, lokale 2
    type enum('UV', 'GR') not null,
    depth int not null,                                   -- i mm
    width int not null,                                   -- i mm
    ent_direction enum('N','S','E','W') not null,         -- compass directions
    ent_location int not null,                            -- from y=0 || x=0 mm
    board_direction enum('N','S','E','W') not null,

    primary key (id)
  );
-- config
  create table confiqs(
    id int auto_increment,
    name varchar(20) not null,
    room_id int not null,
    furniture enum('ST','TT','WB','SC') not null, -- ST = student table, TT = teachertable, WB = Board
    rotation enum('VT','HT') not null,
    place_x int not null,
    place_y int not null,

    primary key (id, name, room_id),
    foreign key(room_id) references rooms(id)
  );
-- reservations
  create table reservations(
    room_id int not null,
    created_when timestamp default CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    rekv_id int not null,
    res_module int not null,
    res_date date not null,
    bookers_u_id int not null,

    primary key (room_id, res_module, res_date),
    unique (rekv_id, res_module, res_date),
    foreign key(rekv_id) references rekvirents(id),
    foreign key(bookers_u_id) references users(id)
  );

   SET time_zone='+01:00';
-- SEEDING TABLES -------------------------------------------------

-- rekv
insert into rekvirents(user_id, class_id)
  values('dkpbw18a1', null),
        ('dkpbw18a2', null),
        ('dkmmd16a1', null),
        ('dkmmd16a2', null),
        ('dkmmd16a3', null),
        (null, 1),
        (null, 2),
        (null, 3);

-- course
insert into course(rekv_id, id, size)
  values(1, 'dkpbw18a1', 5),
        (2, 'dkpbw18a2', 3),
        (3, 'dkmmd16a1', 31),
        (4, 'dkmmd16a2', 28),
        (5, 'dkmmd16a3', 35);

-- user
insert into users(rekv_id, name,email,password,remembertoken)
  values(6, 'mads', 'mads@mail.dk','kjhasdkhasdbajks', 'qkjsdahlsdlas'),
        (7, 'per', 'per@mail.dk','asdasasd', 'asdasasd'),
        (8, 'hans', 'hans@mail.dk','dfgdfggsdf', 'dfgdfgdfgdf');

-- room
insert into rooms(id, type, depth, width, ent_direction, ent_location, board_direction)
  values(401, 'UV', 10000, 5000, 'S', 2000, 'W'),
        (402, 'UV', 12000, 6000, 'N', 3000, 'E'),
        (403, 'UV', 8000, 5000, 'E', 4000, 'W'),
        (404, 'UV', 10000, 10000, 'W', 1000, 'E'),
        (405, 'UV', 10000, 8000, 'S', 2000, 'W'),
        (406, 'UV', 5000, 8000, 'N', 4000, 'S'),
        (407, 'UV', 10000, 12000, 'E', 3500, 'W'),
        (408, 'UV', 8000, 12000, 'W', 1500, 'W'),
        (409, 'UV', 10000, 5000, 'S', 2000, 'E');


-- config
INSERT INTO `confiqs` (`id`, `name`, `room_id`, `furniture`, `rotation`, `place_x`, `place_y`) VALUES
(1, 'A', 401, 'TT', 'HT', 60, 100),
(2, 'A', 401, 'ST', 'HT', 155, 100),
(3, 'A', 401, 'ST', 'HT', 250, 100),
(4, 'A', 401, 'ST', 'HT', 60, 220),
(5, 'A', 401, 'ST', 'HT', 155, 220),
(6, 'A', 401, 'ST', 'HT', 250, 220),
(7, 'A', 401, 'ST', 'HT', 155, 340),
(8, 'A', 401, 'ST', 'HT', 250, 340),
(9, 'A', 401, 'ST', 'HT', 45, 480),
(10, 'A', 401, 'ST', 'HT', 140, 480),
(11, 'A', 401, 'ST', 'HT', 235, 480),
(12, 'A', 401, 'ST', 'HT', 330, 480),
(13, 'A', 401, 'ST', 'VT', 360, 100);

-- reservations
insert into reservations (room_id, rekv_id, res_module, res_date, bookers_u_id)
  values(401, 1, 8, '2019-3-1', 1),
        (401, 1, 9, '2019-3-1', 1),
        (402, 2, 9, '2019-3-1', 1),
        (401, 1, 8, '2019-3-2', 1),
        (405, 3, 9, '2019-3-5', 1),
        (401, 6, 9, '2019-3-6', 2),
        (401, 6, 10, '2019-3-7', 2),
        (401, 6, 9, '2019-2-18', 2),
        (401, 6, 10, '2019-2-18', 2),
        (401, 6, 11, '2019-2-18', 2),
        (401, 6, 12, '2019-2-18', 2),
        (401, 6, 13, '2019-2-20', 2),
        (401, 6, 14, '2019-2-20', 2),
        (401, 6, 15, '2019-2-20', 2);
