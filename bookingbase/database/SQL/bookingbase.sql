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

-- classes
  create table classes(
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
    furniture enum('ST','TT','WB') not null, -- ST = student table, TT = teachertable, WB = Board
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
    module int not null,
    bookers_u_id int not null,

    primary key (room_id, module),
    unique (rekv_id, module),
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

-- classes
insert into classes(rekv_id, id, size)
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
insert into confiqs(name, room_id, furniture, place_x, place_y)
  values('A', 401, 'TT', 2000, 1000),
        ('A', 401, 'ST', 3000, 1000),
        ('A', 401, 'ST', 4000, 1000),
        ('A', 401, 'ST', 5000, 1000),
        ('A', 401, 'ST', 2000, 2000),
        ('A', 401, 'ST', 3000, 2000),
        ('A', 401, 'ST', 4000, 2000),
        ('A', 401, 'ST', 5000, 2000),
        ('A', 401, 'ST', 2000, 3000),
        ('A', 401, 'ST', 3000, 3000),
        ('A', 401, 'ST', 4000, 3000),
        ('A', 401, 'ST', 5000, 3000);

-- reservations
insert into reservations (room_id, rekv_id, module, bookers_u_id)
  values(401, 1, 8, 1),
        (402, 2, 8, 1),
        (403, 3, 8, 1),
        (403, 1, 9, 1),
        (405, 3, 9, 1),
        (401, 6, 9, 2),
        (401, 6, 10, 2);
