-- DDL
DROP DATABASE IF EXISTS tagebuch;
CREATE DATABASE tagebuch;
USE tagebuch;
DROP TABLE IF EXISTS eintrag;
CREATE TABLE eintrag (id INT PRIMARY KEY AUTO_INCREMENT, createDate DATETIME, editDate DATETIME, content VARCHAR(4096));

-- DML
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (1, '2022-05-24 08:46:30', '2022-05-24 11:04:31', 'Tagebuch fertig gestellt');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (2, '2022-05-23 21:39:09', '2022-05-23 21:39:09', 'Es sollte ein Scrollbalken erscheinen, weil nun genug Einträge vorhanden sind.');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (3, '2022-05-23 21:19:41', '2022-05-23 21:19:41', 'Sorry, dass ich gestern nichts geschrieben habe. Ich war sehr beschäftigt.');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (4, '2022-05-21 22:55:46', '2022-05-21 22:56:09', 'Nagut ich schreibe hier was rein');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (5, '2022-05-20 19:15:15', '2022-05-20 19:15:15', 'Ein sehr aktueller neuer schöner Eintrag!!!');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (6, '2022-05-20 16:24:47', '2022-05-23 23:46:32', 'Neuer Eintrag...');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (7, '2022-05-19 15:00:00', '2022-05-23 23:46:45', 'Erster Eintrag! XD');
INSERT INTO tagebuch.eintrag (id, createDate, editDate, content) VALUES (8, '2022-06-09 18:49:21', '2022-06-09 18:49:21', 'Tagebuch funktioniert nun mit einer Datenbank');

