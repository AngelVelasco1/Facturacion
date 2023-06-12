-- Active: 1686323553532@@127.0.0.1@3306
CREATE DATABASE Hunters_Bill;
USE Hunters_Bill;
CREATE TABLE customer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone INT,
    address VARCHAR(255)
)