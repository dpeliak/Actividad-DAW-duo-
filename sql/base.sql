Create database DAW;
Create table Persons (ID int, LastName varchar(255), FirstName varchar(255), Address varchar(255), City varchar(255));
CREATE USER 'daw'@'localhost' IDENTIFIED BY 'qwerty';
GRANT ALL PRIVILEGES ON DAW.* TO 'daw'@'localhost';

