-- Create a database for test
CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;


-- Create a database user for the test database
GRANT ALL ON testdb.* TO test@localhost IDENTIFIED BY 'test';



-- Ensure UTF8 on the database connection
SET NAMES utf8;


-- Table User
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `mail` VARCHAR(80) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `userType` VARCHAR(50) DEFAULT "user",
    `created` DATETIME,
    `updated` DATETIME,
    `deleted` DATETIME,
    `active` DATETIME
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;


-- Comment table
DROP TABLE IF EXISTS c_comments;
CREATE TABLE `c_comments`(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    userId INTEGER,
    userMail VARCHAR(100),
    msg TEXT,
    heading VARCHAR(100),
    postDate timestamp,
    deleted timestamp,
    updated timestamp,
    liked INTEGER DEFAULT 0,
    FOREIGN KEY (`userId`) REFERENCES `User`(`id`)
) ENGINE INNODB;

-- Dummy User
INSERT INTO `User`(`mail`, `password`, `userType`) VALUES
	("admin", "$2y$10$dW3URRs8Xer0SQUG9Ufrf.Mfi5uOw4Et3OhCd5ursnjnaoWC8NZmu", "admin")
;

-- Dummy Comment
INSERT INTO `c_comments`(userId, userMail, msg, heading) VALUES
	(1, "admin", "Ett testmeddelande", "Title")
;
