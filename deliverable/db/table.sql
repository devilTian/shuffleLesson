CREATE DATABASE shuffleLesson DEFAULT CHARACTER SET utf8;

USE shuffleLesson;

CREATE TABLE book(
    id INT NOT NULL AUTO_INCREMENT,
    name char(100) NOT NULL,
    state ENUM('N', 'W', 'R', 'C') NOT NULL DEFAULT 'N',
    category char(20),
    description TEXT,
    PRIMARY KEY(id)
)Engine=InnoDB;

CREATE TABLE lesson(
    les_id INT NOT NULL AUTO_INCREMENT,
    les_num INT NOT NULL,
    les_name CHAR(100) NOT NULL,
    les_unit CHAR(50) NULL,
    les_score INT NULL,
    les_bookid INT NOT NULL,
    PRIMARY KEY(les_id),
    FOREIGN KEY(les_bookid) references book(id)
)Engine=InnoDB;

CREATE TABLE recordTime(
    les_id INT NOT NULL,
    datetime datetime NOT NULL,
    FOREIGN KEY(les_id) references lesson(les_id)
)Engine=InnoDB;
