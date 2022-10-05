CREATE DATABASE IF NOT EXISTS appDB DEFAULT CHARACTER SET utf8;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT SELECT,
    UPDATE,
    INSERT ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;
-- Tables
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS toys (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    description VARCHAR(256) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
);
-- Admin
INSERT INTO users (name, password)
SELECT *
FROM (
        SELECT 'iamadmin',
            'mypass'
    ) AS temp
WHERE NOT EXISTS (
        SELECT name
        FROM users
        WHERE name = 'iamadmin'
            AND password = 'mypass'
    )
LIMIT 1;
-- Toys
INSERT INTO toys (title, description, cost)
SELECT *
FROM (
        SELECT 'Amogus',
            'Suspicious toy for your child!',
            420
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM toys
        WHERE title = 'Amogus'
            AND description = 'Suspicious toy for your child!'
            AND cost = 420
    )
LIMIT 1;
INSERT INTO toys (title, description, cost)
SELECT *
FROM (
        SELECT 'Emoji',
            'Happy emoji!',
            900
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM toys
        WHERE title = 'Emoji'
            AND description = 'Happy emoji!'
            AND cost = 900
    )
LIMIT 1;