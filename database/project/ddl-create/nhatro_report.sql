create table project.nha_tro_report
(
    nha_tro_report_id int auto_increment
        primary key,
    nha_tro_id        int                                 not null,
    number_report     int       default 0                 null,
    created_at        timestamp default CURRENT_TIMESTAMP null
);