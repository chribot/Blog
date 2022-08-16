DROP USER IF EXISTS 'tagebuchUser';
CREATE USER 'tagebuchUser' IDENTIFIED BY 'tagebuchPass';
GRANT SELECT, UPDATE, DELETE, INSERT ON tagebuch.* TO 'tagebuchUser';
FLUSH PRIVILEGES;