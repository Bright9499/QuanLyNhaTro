create table project.nhatro
(
    nhatro_id       int auto_increment
        primary key,
    MaNg_dang       int(5)       not null,
    tinh            varchar(50)  not null,
    quan            varchar(50)  not null,
    phuong          varchar(50)  not null,
    sonhavaduong    varchar(250) not null,
    diachi          varchar(250) not null,
    loainha         varchar(100) not null,
    tieude          varchar(250) not null,
    mota            varchar(500) not null,
    thongtinlienhe  varchar(200) not null,
    sodt            varchar(50)  not null,
    doituongchothue varchar(50)  not null,
    gia             int(50)      not null,
    dientich        int(50)      not null,
    image           char(255)    not null,
    video           char(50)     not null,
    constraint FK_nhatro_user
        foreign key (MaNg_dang) references project.user (ID)
);

