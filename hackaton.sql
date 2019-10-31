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
    img TEXT NOT NULL,
    user_id INT NOT NULL,
    available VARCHAR(10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

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

 INSERT INTO user (username,pass,type_id) VALUES
    ('axel','0000',1),
    ('vlad','0000',2),
   ('hairyWolf','0000',3),
   ('zombzomb','0000',4),
   ('ghosty','0000',5),
   ('jason','0000',6),
   ('ringgirl','0000',7),
   ('nessy','0000',8),
   ('zloug','0000',9),
   ('pennywise','0000',10),
   ('chucky','0000',11
   );
   
  INSERT INTO experience (title,description,available,img,user_id) VALUES
   ('Carpate','Great Castle with view','yes','https://freepngimg.com/thumb/castle/9-2-castle-png-picture.png(894 ko)
https://freepngimg.com/thumb/castle/9-2-castle-png-picture.png
',2),
   ('Forest','Nice Trees','yes','https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg',3),
('Cellar','Spacy cellar','yes','https://static.vinepair.com/wp-content/uploads/2016/02/Wine-Cellar-header.jpg(91 ko)
https://static.vinepair.com/wp-content/uploads/2016/02/Wine-Cellar-header.jpg
',4),
   ('City','lonely city','yes','https://upload.wikimedia.org/wikipedia/commons/3/3c/Cityoflondon2019june.jpg(268 ko)
https://upload.wikimedia.org/wikipedia/commons/3/3c/Cityoflondon2019june.jpg
',5),
   ('Cabin','viewtiful cabin','yes','https://odis.homeaway.com/odis/listing/badb5f7a-40bb-4b18-ac49-ea217f79cb2b.f6.jpg
',6),
   ('Appartement','Appartement with TV','yes','http://marceauimmo.staticlbi.com/original/images/biens/
1/78793b99ed3060a58b833ea04b493953/21243765f7f2f834f1eda0c1a755a87d.jpg
',7),
   ('Scotland','Lochness','yes','http://aroundlochness.co.uk/images/gallery/pic1.jpg
',8),
   ('Space travel','big space station','yes','https://cdn.mos.cms.futurecdn.net/Q8U3LcsBLsXX9mYksBx5eV.jpg
',9),
   ('Circus trip','circus with great music','yes','https://www.dailyherald.com/storyimage/da/20190701/news/190709897/
AR/0/AR-190709897.jpg
',10),
   ('Room','sweet little room with toy','yes','http://toyreport.org/wp-content/uploads/2008/08/2008toyroom.jpg
',11
);
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
