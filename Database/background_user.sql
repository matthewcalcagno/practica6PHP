##UPDATE users;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE background_user;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE background_user(
id_bg int NOT NULL AUTO_INCREMENT,
id_user int,
link_bg VARCHAR(1000),
PRIMARY KEY (id_bg),
    CONSTRAINT FK_BackgroundUser FOREIGN KEY (id_user)
    REFERENCES users(id)
);

ALTER TABLE users
ADD COLUMN id_background INT,
ADD CONSTRAINT FK_UserBackground 
FOREIGN KEY (id_background) REFERENCES Background_user(id_bg);

#INSERT INTO background_user(id_user,link_bg)
#VALUES(11,"https://estaticos.elperiodico.com/resources/jpg/2/9/baby-yoda-estrella-the-the-mandalorian-que-conquistado-las-redes-1576220722292.jpg");

#SELECT *
#FROM users;

#SELECT *
#  FROM Background_user;
  
#SELECT id_bg FROM background_user WHERE id_user = 12