CREATE TABLE c_user (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `mail` VARCHAR(80) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `userType` VARCHAR(50) DEFAULT "user",
    `created` DATETIME,
    `updated` DATETIME,
    `deleted` DATETIME,
    `active` DATETIME
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;


CREATE TABLE `c_comments`(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user INTEGER,
    msg TEXT,
    heading VARCHAR(100),
    postDate timestamp,
    deleted timestamp,
    updated timestamp,
    liked INTEGER DEFAULT 0,
    FOREIGN KEY (`user`) REFERENCES `User`(`id`)
) ENGINE INNODB;


-- Dummy User
INSERT INTO `User`(`mail`, `password`, `userType`) VALUES
	("admin", "$2y$10$dW3URRs8Xer0SQUG9Ufrf.Mfi5uOw4Et3OhCd5ursnjnaoWC8NZmu", "admin")
;

-- Dummy Comment
INSERT INTO `c_comments`(`user`, `msg`, `heading`) VALUES
	(1, "Ett testmeddelande", "Detta är en test titel")
;
