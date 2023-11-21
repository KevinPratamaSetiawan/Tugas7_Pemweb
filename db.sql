-- Active: 1686408613400@@127.0.0.1@3306@data_mhs
CREATE DATABASE data_mhs

USE data_mhs

DESC mahasiswa;

DROP TABLE mahasiswa;

SELECT * FROM mahasiswa;

CREATE TABLE mahasiswa(
    nim varchar(9) NOT NULL,
    nama varchar(50) NOT NULL,
    prodi varchar(30) NOT NULL,
    PRIMARY KEY(nim)
);

INSERT INTO mahasiswa(nim,nama,prodi)
VALUES  ('01','Nama 1','Teknik Informatika'),
        ('02','Nama 2','Teknik Kimia'),
        ('03','Nama 3','Teknik Elektro'),
        ('04','Nama 4','Teknik Mesin'),
        ('05','Nama 5','Teknik Fisika'),
        ('06','Nama 6','Teknik Informatika'),
        ('07','Nama 7','Teknik Kimia'),
        ('08','Nama 8','Teknik Elektro'),
        ('09','Nama 9','Teknik Mesin'),
        ('10','Nama 10','Teknik Fisika'),
        ('11','Nama 11','Teknik Informatika'),
        ('12','Nama 12','Teknik Kimia'),
        ('13','Nama 13','Teknik Elektro'),
        ('14','Nama 14','Teknik Mesin'),
        ('15','Nama 15','Teknik Fisika'),
        ('16','Nama 16','Teknik Informatika'),
        ('17','Nama 17','Teknik Kimia'),
        ('18','Nama 18','Teknik Elektro'),
        ('19','Nama 19','Teknik Mesin'),
        ('20','Nama 20','Teknik Fisika');