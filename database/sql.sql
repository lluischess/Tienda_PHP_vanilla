CREATE DATABASE store_db;
USE store_db;

CREATE TABLE users(
	id 	int(255) AUTO_INCREMENT NOT NULL,
	name  varchar(75) NOT NULL,
	lastname varchar(125) NOT NULL,
    email varchar(125) NOT NULL,
    acount_user varchar(100) NOT NULL,
    password_user varchar(255) NOT NULL,
    rol varchar(75) NOT NULL,
    image varchar(255),
	CONSTRAINT pk_users PRIMARY KEY(id),
	CONSTRAINT uq_email UNIQUE(email)
)ENGINE=INNODB;

CREATE TABLE orders(
	id 	int(255) AUTO_INCREMENT NOT NULL,
    user_id int(255) NOT NULL, 
	province  varchar(255) NOT NULL,
	location varchar(255) NOT NULL,
    direction varchar(255) NOT NULL,
    total_price float(5.2) NOT NULL,
    status_order varchar(100) NOT NULL,
    date_order DATE NOT NULL,
    CONSTRAINT pk_orders PRIMARY KEY(id),
    CONSTRAINT fk_orders_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=INNODB;

CREATE TABLE order_details(
	id 	int(255) AUTO_INCREMENT NOT NULL,
	order_id  int(255) NOT NULL,
	product_id int(255) NOT NULL,
    units int(10) NOT NULL,
    CONSTRAINT pk_order_details PRIMARY KEY(id),
    CONSTRAINT fk_order_details_orders FOREIGN KEY(order_id) REFERENCES orders(id),
    CONSTRAINT fk_order_details_products FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=INNODB;

CREATE TABLE products(
	id 	int(255) AUTO_INCREMENT NOT NULL,
    category_id int(255) NOT NULL,
	name  varchar(175) NOT NULL,
	description TEXT,
    price float(5,2) NOT NULL,
    stock int(5),
    offer float(5,2),
    date_publish date NOT NULL,
    image varchar(255),
    CONSTRAINT pk_products PRIMARY KEY(id),
    CONSTRAINT fk_products_categoris FOREIGN KEY(category_id) REFERENCES categoris(id)
)ENGINE=INNODB;

CREATE TABLE categoris(
	id 	int(255) AUTO_INCREMENT NOT NULL,
	name  varchar(75) NOT NULL
)ENGINE=INNODB;