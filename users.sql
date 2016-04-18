DROP TABLE IF EXISTS Users;

CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT,
    hashedPass VARCHAR(255) NOT NULL,
    email VARCHAR(45) UNIQUE NOT NULL,
    fname varchar(128) NOT NULL,
    lname varchar(128) NOT NULL,
    PRIMARY KEY (id)
);