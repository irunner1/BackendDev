CREATE DATABASE IF NOT EXISTS appDB DEFAULT CHARACTER SET utf8;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT SELECT,
    UPDATE,
    INSERT ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;

CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS goods (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    description VARCHAR(256) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO users (name, password)
SELECT *
FROM (
        SELECT 'admin',
            'admin1'
    ) AS temp
WHERE NOT EXISTS (
        SELECT name
        FROM users
        WHERE name = 'admin'
            AND password = 'admin1'
    )
LIMIT 1;

INSERT INTO goods (title, description, cost)
SELECT *
FROM (
        SELECT 'Find your sound',
            'Home is the new studio! Created together with electronic music artists, Swedish House Mafia, this just-launched collection helps music makers and other creatives to find their state of flow, wherever they call home.',
            9999
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM goods
        WHERE title = 'Find your sound'
            AND description = 'Home is the new studio! Created together with electronic music artists, Swedish House Mafia, this just-launched collection helps music makers and other creatives to find their state of flow, wherever they call home.'
            AND cost = 9999
    )
LIMIT 1;
INSERT INTO goods (title, description, cost)
SELECT *
FROM (
        SELECT 'Starting out small in the city',
            '32m² might not sound like much, but this tiny apartment is the perfect size for a busy student with the world on his doorstep.',
            1000
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM goods
        WHERE title = 'Starting out small in the city'
            AND description = '32m² might not sound like much, but this tiny apartment is the perfect size for a busy student with the world on his doorstep.'
            AND cost = 1000
    )
LIMIT 1;