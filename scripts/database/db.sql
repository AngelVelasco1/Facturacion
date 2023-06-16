-- Active: 1686658906641@@172.16.48.210@3306@db_hunter_facture_Angel_Velasco
CREATE DATABASE db_hunter_facture_Angel_Velasco;
USE db_hunter_facture_Angel_Velasco;

CREATE TABLE bill (
    bill_number VARCHAR(25) NOT NULL PRIMARY KEY,
    bill_date DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE customer (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone INT,
    address VARCHAR(255),
);

CREATE TABLE products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_code BIGINT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    amount INT NOT NULL,
    standard_value INT NOT NULL
);

CREATE TABLE seller (
seller_id INT,
   name VARCHAR(255) NOT NULL
);
ALTER TABLE bill 
ADD FOREIGN KEY (customer_id) REFERENCES customer(customer_id), 
ADD FOREIGN KEY (seller_id) REFERENCES seller(seller_id), 
ADD FOREIGN KEY (product_id) REFERENCES products(product_id);

INSERT INTO customer (customer_id, fullName, email, phone, address) VALUES (1, 'Maria', 'maria@gmail.com', '+57 3784574112', 'Street 5');
SELECT fullName AS "Full's_Names" FROM customer;



USE db_hunter_facture;
INSERT INTO tb_client (identificacion, full_name, email, address, phone) VALUES (2, 'Diego Norrea', 'angel@outlook.com', 'Street 4', '+57 2374111');
SELECT * FROM tb_client WHERE identificacion = 2 or address = 'Campus';

SELECT * FROM tb_client LIMIT 5 OFFSET 0
;