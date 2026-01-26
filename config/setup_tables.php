<?php
$servername="localhost";
$username="root";
$password="";

$conn=new mysqli($servername,$username,$password);
if($conn->connect_error) 
{
die("Connection failed: ".$conn->connect_error);
}

$sql="Create Database if not exists inventory_system;";
if(!$conn->query($sql)) 
{
die("DB Error: ".$conn->error);
}

$conn->select_db("inventory_system");

/*$sql="DROP TABLE IF EXISTS stock_movements;";
if(!$conn->query($sql))
{
die("Table does not exist".$conn->error($conn));
}
$sql="DROP TABLE IF EXISTS products;";
if(!$conn->query($sql))
{
die("Table does not exist".$conn->error($conn));
}*/
$sql=
"Create Table if not exists products
(
id int auto_increment primary key,
name varchar(50) not null,
category varchar(25) not null,
current_stock int default 0,
min_stock int default 10
)ENGINE=InnoDB;";

if(!$conn->query($sql)) 
{
die("Products Table Error: ".$conn->error);
}

$sql=
"Create table if not exists stock_movements
(
id int auto_increment primary key,
product_id int,
type enum('IN','OUT') not null,
quantity int not null,
date timestamp default current_timestamp,
note varchar(255),
foreign key (product_id) references products(id)
)ENGINE=InnoDB;";

if(!$conn->query($sql))
{
die ("Stock Table Error: ".$conn->error);
}
echo "Database & tables created successfully";
?>