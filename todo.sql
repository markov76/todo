drop database if exist todo;

create database todo;

use todo;

create table task (
    id int primary key auto_increment,
    description text not null
);

insert into task (description) values ('Test task');
insert into task (description) values ('another Test task');
