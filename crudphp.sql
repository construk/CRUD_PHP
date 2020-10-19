create database crudphp;
create table administradores(
    id int auto_increment,
    usuario varchar(50) not null,
    clave varchar(128) not null,
    primary key(id)
);
create table empleados(
    id int auto_increment,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    email varchar(50) not null,
    puesto varchar(50) not null,
    salario varchar(50) not null,
    primary key(id)
);

