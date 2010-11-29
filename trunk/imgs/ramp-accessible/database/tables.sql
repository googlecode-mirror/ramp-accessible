create table TLB_Product (
	id 		INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	name 		CHAR(128),
	price 		DOUBLE
);

create table TLB_Customer (
	id 		INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email		CHAR(64) Unique,
	name 		CHAR(128),
	address1	VARCHAR(512),
	address2	VARCHAR(512),
	state 		CHAR(2),
	phone		CHAR(16),
	fax		CHAR(16),
	created 	TIMESTAMP DEFAULT now()
);

create table TLB_Order (
	id 		INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	product_id 	INT NOT NULL,
	customer_id	INT NOT NULL,
	ordered 	TIMESTAMP DEFAULT now()
);

create table TLB_Infors (
	id 		INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	head 		CHAR(128),
	contents 	VARCHAR(1024),
	created 	TIMESTAMP DEFAULT now()
);

create table TLB_Comment (
	id 		INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email		CHAR(64) Unique,
	customer_id 	INT,
	name 		CHAR(128),
	contents 	VARCHAR(1024),
	created 	TIMESTAMP DEFAULT now()
);

create table TLB_Schedule (
	id 		INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	tiemline	TIMESTAMP,
	order_id	INT NOT NULL
);