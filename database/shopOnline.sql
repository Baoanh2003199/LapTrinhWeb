
create database shoponline;

create table Suppliers(
	SupplierID int not null AUTO_INCREMENT,
	SupplierName nvarchar(50),
	Address varchar(50),
	Phone varchar(13),
	Status int,
	Primary key(SupplierID) 
);
create table Categories(
	CategoryID int not null AUTO_INCREMENT,
	CategoryName varchar(50),
	Description varchar(255),
    Status int,
	primary key(CategoryID)
);
create table Products(
	ProductID int not null AUTO_INCREMENT,
	ProductName varchar(50),
	Price float,
	Views int,
    SellNumber int,
    Origin varchar(50),
	Img varchar(100),
	Description varchar(255),
	CategoryID int,
	SupplierID int,
	Status int,


	primary key(ProductID)
);
create table Roles(
	RoleID int not null AUTO_INCREMENT,
	RoleName varchar(50),
	RoleCode varchar(20),

	primary key(RoleID)
);
create table User(
	UserID int not null AUTO_INCREMENT,
	UserName varchar(20),
	Password varchar(50),
	RoleId int,
    Status int,
    
    primary key(UserID)
);
create table Employees(
	EmployeeID int not null AUTO_INCREMENT,
	Name varchar(50),
	Address varchar(50),
	Phone varchar(13),
	Email varchar(30),
    DoB datetime,
	RoleID int,
	UserId int,
    Status int,
	
	Primary key(EmployeeID)
);
create table Customers(
	CustomerID int not null AUTO_INCREMENT,
	Name varchar(50),
	Address varchar(50),
	Phone varchar(13),
	Email varchar(30),
    City varchar(50),
    DoB datetime,
	RoleID int,
	UserId int,
    Status int,
    
	Primary key(CustomerID)
);
create table Cart(
	CartID int not null auto_increment,
	ProductID int,
    CustomerID int,
	Quantity int,
	Price float,
    Status int,
    CreatedDate datetime,

	Primary key(CartID)
);
create table Orders(
	OrderID int not null auto_increment,
	Total float,
    QuantityProducts int,
	Note varchar(255),
    Address varchar(50),
    Status int,
    
    primary key(OrderID)
	
);
create table OrderDetails(
	CartID int,
    OrderID int,
    Note varchar(255),
    Status int,
    
    primary key(CartID, OrderID)
);