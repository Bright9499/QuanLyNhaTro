create table project.user
(
    ID          int auto_increment
        primary key,
    name        varchar(255) null,
    gioitinh    varchar(5)   not null,
    email       varchar(255) null,
    nickname    varchar(100) null,
    pass        varchar(255) null,
    sodienthoai int          not null,
    facebook    varchar(255) not null,
    avatar      varchar(255) not null,
    diachi      varchar(255) not null,
    role        varchar(50)  null
);

go
create table project.user
(
    ID          int auto_increment
        primary key,
    name        varchar(255)             null,
    gioitinh    varchar(5) default 'nam' not null,
    email       varchar(255)             null,
    nickname    varchar(100)             null,
    pass        varchar(255)             null,
    sodienthoai int                      not null,
    facebook    varchar(255)             not null,
    avatar      varchar(255)             not null,
    diachi      varchar(255)             not null,
    role        varchar(50)              null,
    delete_fg   bit        default b'0'  null
);

