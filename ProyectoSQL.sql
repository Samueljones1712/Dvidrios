create database DVidrios;

use dvidrios;                                                             

create table tb_orden(
id_orden int auto_increment primary key,
id_cuenta_pk int,
subtotal int,
detalles varchar(250),
fechaSolicitud datetime ,
estado varchar(25) default "Espera",
foreign key (id_cuenta_pk) references tb_usuario(id_usuario) 
);

create table tb_usuario(
id_usuario int auto_increment primary key,
usuario varchar(30) unique,
nombre varchar(30),
apellido varchar(30),
contrasena varchar(30) not null,
email varchar(100),
telefono varchar(8),
estado varchar(20) default 'Activo'
);
   
create table usuario_token(
TokenID int auto_increment primary key,
id_usuario_pk int,
Token varchar(100),
fecha datetime default NULL,
foreign key (id_usuario_pk) references tb_usuario(id_usuario) 
);

insert into tb_usuario(usuario, contrasena, nombre, apellido, estado) values("samueljones1322333345","samueljones1234","Kency","Jones","Activo");
insert into tb_orden(id_cuenta_pk,subtotal,detalles,fechaSolicitud) values(1,2222,"Nose3",CURRENT_TIMESTAMP);

update tb_usuario set estado="Activo" where id_usuario=3;
Insert into tb_usuario (usuario,nombre,apellido,contrasena,telefono,email) 
        values ('Kency','Kency','Jones','samueljones1234','76666658','asassasasasas1@gmail.com')
        
          
select* from tb_orden;
select* from tb_usuario;
select* from usuario_token;
Update tb_usuario nombre='Kency', apellido='Jones', contrasena='samueljones1234', email='', telefono='' where id_usuario='3';

select * from tb_orden inner join tb_usuario where tb_orden.id_cuenta_pk = tb_usuario.id_usuario;

drop table usuario_token
drop table tb_orden
drop table tb_usuario

create table publicacion(
id int auto_increment primary key,
descripcion varchar(200)
);

create table imagenPublicacion(
url varchar(200),
nombre varchar(50) primary key unique,
idpublicacion int,
foreign key (idpublicacion) references tb_publicacion(id) 
)
