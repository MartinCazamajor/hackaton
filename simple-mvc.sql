DROP DATABASE hackaton_BNB;
CREATE DATABASE hackaton_BNB;
​
USE hackaton_BNB;
​
CREATE TABLE preference (
                            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(255) NOT NULL
);
​
CREATE TABLE type (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      name VARCHAR(255) NOT NULL
);
​
CREATE TABLE type_preference (
                                 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                 type_id INT NOT NULL,
                                 preference_id INT NOT NULL,
                                 FOREIGN KEY (type_id) REFERENCES type(id),
                                 FOREIGN KEY (preference_id) REFERENCES preference(id)
);
​
CREATE TABLE user (
                      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      username VARCHAR(255) NOT NULL,
                      pass VARCHAR(255) NOT NULL,
                      type_id INT NOT NULL,
                      FOREIGN KEY (type_id) REFERENCES type(id)
);
​
CREATE TABLE user_preference (
                                 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                 user_id INT NOT NULL,
                                 preference_id INT NOT NULL,
                                 FOREIGN KEY (user_id) REFERENCES user(id),
                                 FOREIGN KEY (preference_id) REFERENCES preference(id)
);
​
CREATE TABLE experience (
                            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            title VARCHAR(255) NOT NULL,
                            description TEXT NOT NULL,
                            img TEXT NOT NULL,
                            user_id INT NOT NULL,
                            available VARCHAR(10) NOT NULL,
                            FOREIGN KEY (user_id) REFERENCES user(id)
);
​
INSERT INTO preference (name) VALUES
('male'),('female'),('other'),
('18-30'),('31-60'),('61'),
('chinese'),('italian'),('thai'),('mexican'),('japanese'),('other'),
('heavy'),('not_heavy'),
('slow'),('not_slow'),
('garlic'),('not_garlic'),
('martial'),('not_martial'),
('allergy'),('not_allergy'),
('vhs'),('not_vhs'),
('swim'),('not_swim'),
('ginger'),('not_ginger'),
('doll'),('not_doll'),
('ufo'),('not_ufo'),
('laugh'),('not_laugh'
);

INSERT INTO type (name) VALUES
('human'),
('vampire'),
('werewolf'),
('zombie'),
('ghost'),
('serial_killer'),
('demon'),
('aquatic_monster'),
('alien'),
('clown'),
('possessed_doll'
);

INSERT INTO type_preference (type_id, preference_id) VALUES
(2,18),
(3,22),
(4,15),
(5,28),
(6,20),
(7,23),
(8,25),
(9,31),
(10,33),
(11,29
);
​
INSERT INTO user (username,pass,type_id) VALUES
('vlad','0000',2),
('hairyWolf','0000',3),
('ghosty','0000',5),
('Jason','0000',6);

INSERT INTO experience (title,description,available,img,user_id) VALUES
('Carpate','Great Castlec with view','yes','https://freepngimg.com/thumb/castle/9-2-castle-png-picture.png(894 ko)
https://freepngimg.com/thumb/castle/9-2-castle-png-picture.png
',1),
('Forest','Nice Trees','yes','https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg',2),
('Cellar','Spacy cellar','yes','https://static.vinepair.com/wp-content/uploads/2016/02/Wine-Cellar-header.jpg(91 ko)
https://static.vinepair.com/wp-content/uploads/2016/02/Wine-Cellar-header.jpg
',3),
('City','lonely city','yes','https://upload.wikimedia.org/wikipedia/commons/3/3c/Cityoflondon2019june.jpg(268 ko)
https://upload.wikimedia.org/wikipedia/commons/3/3c/Cityoflondon2019june.jpg
',4
);