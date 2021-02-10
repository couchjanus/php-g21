CREATE TABLE guestbook (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(25) NOT NULL,
    email varchar(30) NOT NULL,
    message text NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

