CREATE DATABASE cloud_management_system;
USE cloud_management_system;
CREATE TABLE admin(
admin_id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50),
password VARCHAR(255),
email VARCHAR(100)
);
CREATE TABLE users(
user_id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(255),
phone VARCHAR(20)
);
CREATE TABLE cloud_resources(
resource_id INT PRIMARY KEY AUTO_INCREMENT,
resource_name VARCHAR(100),
resource_type VARCHAR(50),
status VARCHAR(20)
);
CREATE TABLE virtual_machines(
vm_id INT PRIMARY KEY AUTO_INCREMENT,
vm_name VARCHAR(100),
cpu INT,
ram INT,
storage INT,
status VARCHAR(20)
);
CREATE TABLE storage(
storage_id INT PRIMARY KEY AUTO_INCREMENT,
storage_type VARCHAR(50),
capacity INT,
status VARCHAR(20)
);
CREATE TABLE network(
network_id INT PRIMARY KEY AUTO_INCREMENT,
network_name VARCHAR(100),
ip_range VARCHAR(50),
status VARCHAR(20)
);
CREATE TABLE applications(
app_id INT PRIMARY KEY AUTO_INCREMENT,
app_name VARCHAR(100),
version VARCHAR(50),
status VARCHAR(20)
);
CREATE TABLE resource_allocation(
allocation_id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
vm_id INT,
storage_id INT,
allocation_date DATE,
FOREIGN KEY (user_id) REFERENCES users(user_id)
);
CREATE TABLE billing(
bill_id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
amount DECIMAL(10,2),
billing_date DATE,
status VARCHAR(20),
FOREIGN KEY (user_id) REFERENCES users(user_id)
);
CREATE TABLE monitoring(
monitor_id INT PRIMARY KEY AUTO_INCREMENT,
vm_id INT,
cpu_usage INT,
memory_usage INT,
timestamp DATETIME
);
CREATE TABLE backup(
backup_id INT PRIMARY KEY AUTO_INCREMENT,
vm_id INT,
backup_date DATE,
status VARCHAR(20)
);
CREATE TABLE security(
security_id INT PRIMARY KEY AUTO_INCREMENT,
vm_id INT,
firewall_status VARCHAR(20),
last_scan DATE
);
CREATE TABLE patient_bills(
patient_bill_id INT PRIMARY KEY AUTO_INCREMENT,
patient_name VARCHAR(100),
treatment VARCHAR(100),
amount DECIMAL(10,2),
date DATE
);
CREATE TABLE virtual_machines (
vm_id INT AUTO_INCREMENT PRIMARY KEY,
vm_name VARCHAR(100),
cpu INT,
ram INT,
storage INT
);
INSERT INTO admin(username,password,email)
VALUES('admin','admin123','admin@cloud.com');

INSERT INTO users(name,email,password,phone)
VALUES('John','john@mail.com','12345','987654321');

INSERT INTO virtual_machines(vm_name,cpu,ram,storage,status)
VALUES('VM1',4,16,200,'active');

INSERT INTO storage(storage_type,capacity,status)
VALUES('SSD',500,'available');

INSERT INTO network(network_name,ip_range,status)
VALUES('Net1','192.168.1.0/24','active');
SELECT * FROM users;
SELECT * FROM billing;
UPDATE users SET phone='999999999' WHERE user_id=1;
DELETE FROM virtual_machines WHERE vm_id=5;
INSERT INTO virtual_machines(vm_name,cpu,ram,storage)
VALUES('VM1',4,16,200);
UPDATE virtual_machines
SET cpu=8, ram=32
WHERE vm_id=1;
DELETE FROM virtual_machines
WHERE vm_id=1;