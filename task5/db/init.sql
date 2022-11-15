CREATE DATABASE IF NOT EXISTS appDB DEFAULT CHARACTER SET utf8;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS goods (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    description VARCHAR(256) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO users (name, password)
VALUES (
        'admin',
        '$apr1$uqao79dh$fmZ6ZI/p1XTy0e5.PYSxH0' -- admin1
    ),
    (
        'irunner',
        '$apr1$iy5n4fzs$2yDfXiSZmYO29Dz4S/D6H1' -- usert
    ),
    (
        'user',
        '$apr1$5i1mg3ur$obDXxC/JHQyptMKFiXZDO1' -- password
    );

INSERT INTO goods (title, description, cost)
VALUES ('Гвозди', 'Гвозди строительные 4x100 мм без покрытия 1 кг', 110),
    ('Молоток', 'Слесарный молоток VIRA RAGE 600 г 903006', 549),
    ('Ключ', 'Рожковый ключ 17x19мм Дело Техники 510197', 187);