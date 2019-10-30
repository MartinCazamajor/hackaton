DROP DATABASE hackaton_BNB;
CREATE DATABASE hackaton_BNB;

USE hackaton_BNB;

CREATE TABLE preference (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE type (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE type_preference (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type_id INT NOT NULL,
    preference_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES type(id),
    FOREIGN KEY (preference_id) REFERENCES preference(id)
);

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    type_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES type(id)
);

CREATE TABLE user_preference (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    preference_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (preference_id) REFERENCES preference(id)
);

CREATE TABLE experience (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    available VARCHAR(10) NOT NULL,
    img TEXT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);