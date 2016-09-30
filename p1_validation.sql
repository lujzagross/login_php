use p1_validation;

DROP TABLE IF EXISTS persons;
CREATE TABLE persons (
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(45) NOT NULL,
email VARCHAR(225) NOT NULL,
age INT NOT NULL
 );
 
 INSERT INTO persons (name, email, age) VALUES ('Marc', 'klu@cphbusiness.dk', 100);
SELECT * FROM persons;

SELECT  id FROM persons WHERE email = 'cph-lg101@cphbusiness.dk'-- AND age= 20;