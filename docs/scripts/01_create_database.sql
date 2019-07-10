CREATE SCHEMA `examen` ;
--CREATE USER 'examen'@'127.0.0.1' IDENTIFIED BY 'estudio';
create USER 'examen'@'127.0.0.1' IDENTIFIED WITH mysql_native_password BY 'estudio';
GRANT ALL ON examen.* TO 'examen'@'127.0.0.1';
