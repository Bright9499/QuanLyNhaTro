create table project.giao_dich
(
    ma_gd            int auto_increment
        primary key,
    ma_nguoi_gd      int                                                   null,
    MaNg_dang        int                                                   null,
    tong_tien        decimal                                               null,
    payment_time     timestamp                   default CURRENT_TIMESTAMP null,
    status           bit                         default b'0'              null,
    creditCardNumber varchar(30) charset utf8mb3 default '000000000'       null,
    ma_phong         int                                                   null
);

