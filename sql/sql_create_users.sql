create user 'dbcreator'@'localhost' identified by 'dbcreator';
grant create, drop, alter on *.* to 'dbcreator'@'localhost';

create user 'userpremier50'@'%' identified by 'userpremier50';
grant all privileges on dbpremiersymfo50.* to 'userpremier50'@'%';