CREATE DATABASE data_posyandu;
use data_posyandu;

create table users ( 
    id_user INT_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role ENUM('kader', 'admin') DEFAULT 'kader'
);

CREATE TABLE data_anak (
    id_anak INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    nama VARCHAR(200),
    berat float,
    tinggi float,
    tanggal DATE,
    FOREIGN KEY (id_anak) REFERENCES users(id_anak)
);

INSERT INTO users (username, password, role) VALUES
('kader123', 'kaderwakawaka', 'kader'),
('admin123', 'admineak', 'admin');