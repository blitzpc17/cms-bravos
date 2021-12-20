create database dbBravos;

use dbBravos;



create table Proceso(
	id int primary key auto_increment,
	nombre varchar(20) not null
);


create  table Tipos(
	id int primary key auto_increment,
	clave varchar(3) not null,
	nombre varchar(25) not null,
	procesoId int not null,
	foreign key (procesoId) references Proceso(id)
);

create table Estados(
	id int primary key auto_increment,
	clave varchar(2) not null,
	nombre varchar(25) not null,
	procesoId int n-ot null,
	foreign key(procesoId) references Proceso(Id)
);

create table Users(
	id int primary key auto_increment,
	name varchar(65) not null,
	email varchar(255) unique,
	password varchar(255) not null,
	remember_token varchar(100) null,
	email_verified_at datetime null,
	created_At datetime not null,
	updated_At datetime not null,
	tiposId int not null,
	estadoId int not null,
	foreign key (tiposId) references tipos(id),
	foreign key (estadoId) references Estados(id)
	
);

create table Modulos(
	id int primary key auto_increment,
	nombre varchar(15) not null,
	icono varchar(35) null,	
	procesoId int not null,
	modulosIdPadre int null,
	estadosid int not null,
	created_At datetime not null,
	updated_At datetime not null,
	foreign key (procesoId) references proceso(id),
	foreign key (modulosIdPadre) references modulos(id),
	foreign key (estadosid) references Estados(id)
);


create table Excepciones(
	id int primary key auto_increment,
	descripcion text not null,
	stacktrace text not null,
	usersId int not null,
	modulosId int not null,	
	created_at datetime not null,
	updated_At datetime not null,
	foreign key(usersId) references Users(id),
	foreign key (modulosId) references modulos(id)
);

create table Configuraciones(
	id int primary key auto_increment,
	nombre varchar(35) not null,
	tiposId int not null,
	valor text not null,
	usersIdCreo int not null,	
	created_at datetime not null,
	updated_At datetime not null,
	foreign key(usersIdCreo) references Users(id),
	foreign key (tiposId) references tipos(id)
);

create table Clientes(
	id int primary key auto_increment,
	nombres varchar(65) not null,
	apellidos varchar(65) not null,
	telefono varchar(10) not null,
	email varchar(105) null,
	calle varchar(105) null,
	noext varchar(15) null,
	noint varchar(155) null,
	referencias text,
	cp varchar(5) null,
	created_At timestamp not null,
	updated_At timestamp not null
);

create table SolicitudProveedor(
	id int primary key auto_increment,
	nombreNegocio varchar(105) not null,
	telefono varchar(10) not null,
	email varchar(105) null,
	calle varchar(105) null,
	noext varchar(15) null,
	noint varchar(155) null,
	referencias text,
	cp varchar(5) null,
	estadosId int not null,
	nombreRepresentante varchar(125) not null,
	created_At timestamp not null,
	updated_At timestamp not null,
	foreign key (estadosId) references estados(id)
);

create table Proveedores(
	id int primary key auto_increment,
	nombreNegocio varchar(105) not null,
	razonSocial varchar(105) null,
	rfc varchar(18) null,
	telefono varchar(10) not null,
	email varchar(105) null,
	calle varchar(105) null,
	noext varchar(15) null,
	noint varchar(155) null,
	referencias text,
	cp varchar(5) null,	
	tiposProveedorId int not null,
	estadosId int not null,
	solicitudProveedorId int not null,
	evFotoEstablecimiento text null,
	evLogoEstablecimiento text null,
	usersId int not null,
	horarios text,	
	created_At timestamp not null,
	updated_At timestamp not null,
	foreign key(tiposProveedorId) references tipos(id),
	foreign key(estadosId) references estados(id),
	foreign key(solicitudProveedorId) references SolicitudProveedor(id)
	foreign key(usersId) references users (id)
);

create table SolicitudChofer(
	id int primary key auto_increment,
	nombres varchar(65) not null,
	apellidos varchar(65) not null,
	telefono varchar(10) not null,
	email varchar(105) null,
	calle varchar(105) null,
	noext varchar(15) null,
	noint varchar(155) null,
	referencias text,
	cp varchar(5) null,
	estadosId int not null,
	tiposChoferId int not null,
	razonSolicitud text not null,
	experienciaManejo text not null,
	cuentaUnidad tinyint not null,	
	licenciaVigente tinyint not null,	
	evIne text,
	evLicencia text,
	evSelfie text,
	created_At timestamp not null,
	updated_At timestamp not null,
	foreign key (estadosId) references estados(id),
	foreign key(tiposChoferId) references tipos(id),
);

create table choferes(
	id int primary key auto_increment,
	nombres varchar(65) not null,
	apellidos varchar(65) not null,
	telefono varchar(10) not null,
	email varchar(105) null,
	calle varchar(105) null,
	noext varchar(15) null,
	noint varchar(155) null,
	referencias text,
	cp varchar(5) null,
	estadosId int not null,
	tiposChoferId int not null,
	solicitudChoferId int not null,
	created_At timestamp not null,
	updated_At timestamp not null,	
	foreign key (estadosId) references estados(id),
	foreign key(tiposChoferId) references tipos(id),
	foreign key (solicitudChoferId) references solicitudChofer(id)
);

create table productos(
	id int primary key auto_increment,
	descripcion varchar(125) not null,
	precio decimal(10,2) not null,
	tiposId int not null,
	estadosId int not null,
	proveedoresId int not null,
	existencias int not null,
	descuento decimal(10,2) null,
	precioAnterior decimal(10,2) null,
	iconoProducto text,
	imgProducto text,
	created_At timestamp not null,
	updated_At timestamp not null,	
	foreign key (tiposId) references tipos (id),
	foreign key (estadoId) references estados (id),
	foreign key (proveedoresId) references proveedores(id)	
);

create table pedidos(
	id int primary key auto_increment,
	folio varchar(9) unique not null,
	partidas text,
	total decimal(10,2),	
	estadosId int not null,
	choferesId int null,
	observacionesCliente text, 
	clientesId int not null,
	observacionesProvedor text,
	proveedoresId int not null,
	tiempoEstimadoEntrega varchar(35) null,
	fechaEntrega timestamp null,
	created_At timestamp not null,
	updated_At timestamp not null,
	foreign key(estadosId) references estados(Id),
	foreign key(choferesId) references choferes(Id),
	foreign key(clientesId) references clientes(Id),
	foreign key(proveedoresId) references proveedores(Id)
);

create table viajes(
	id int primary key auto_increment,
	choferesId int null,
	clienteId int not null
	pedidosId int null,
	estadosId int not null,
	lugarSalida varchar(105) not null,
	fechaSalida timestamp not null,
	lugarDestino varchar(105) not null,
	lugarDestinoAux varchar(105) null,
	fechaLLegada timestamp not null,
	trayectoMaps text,
	subTotal decimal(10,2) default 0,
	total decimal(10,2) default 0,
	created_At timestamp not null,
	updated_At timestamp not null,
	foreign key (choferesId) references choferes(id),
	foreign key (clienteId) references clientes(id),
	foreign key (pedidosId) references pedidos(id),
	foreign key (estadosId) references estados(id)
);

