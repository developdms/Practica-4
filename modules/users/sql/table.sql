
CREATE TABLE IF NOT EXISTS User (
    email varchar(80) PRIMARY KEY,
    password varchar(40) not null,
    alias varchar(80) UNIQUE,
    dischargeDate date not null,
    active tinyint(1) not null default 0,
    administrator tinyint(1) not null default 0,
    personal tinyint(1) not null default 0
);
