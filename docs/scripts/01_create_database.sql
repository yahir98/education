CREATE SCHEMA `examen` ;
CREATE USER 'examen'@'127.0.0.1' IDENTIFIED BY 'estudio';
GRANT ALL ON examen.* TO 'examen'@'127.0.0.1';
