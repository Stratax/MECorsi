CREATE DATABASE MECorsi

CREATE TABLE Users(
	IdUser INT PRIMARY KEY IDENTITY(1,1),
	UName VARCHAR(25),
	UPass VARCHAR(20),
	UCategory VARCHAR(20)
)

CREATE TABLE Transportadora(
	IdTransportadora INT PRIMARY KEY IDENTITY(1,1),
	RazonSocial VARCHAR(200) NOT NULL,
	Calle VARCHAR(100) NOT NULL,
	NumExt VARCHAR(10),
	NumInt VARCHAR(10) DEFAULT 'S/N',
	Colonia VARCHAR(50),
	DelMun VARCHAR (50),
	Estado VARCHAR (30),
	CP VARCHAR (6),
	Email VARCHAR (30),
	Telefono VARCHAR (20),
	RegSCT VARCHAR (20),
	AutorizacionSemarnat VARCHAR (20),
	FechaAlta VARCHAR(12)
)

CREATE TABLE Unidad(
	IdUnidad INT PRIMARY KEY IDENTITY(1,1),
	IdTransportadora INT,
	Marca VARCHAR (60),
	Placas VARCHAR (15),
	Tipo VARCHAR (20),
	RegSCT VARCHAR (30),
	AutorizacionSemarnat VARCHAR(30),
	VigenciaSemarnat VARCHAR(12),
	NoPoliza VARCHAR(30),
	VigenciaPoliza VARCHAR(12),
	ManejoEspecial VARCHAR(40),
	Estatus VARCHAR(15),
	FechaAlta VARCHAR(12)
)

CREATE TABLE Empresa(
	IdEmpresa INT PRIMARY KEY IDENTITY(1,1),
	RazonSocial VARCHAR (120),
	Semarnat VARCHAR (30),
	Calle VARCHAR (50),
	NumeroExt VARCHAR (10),
	NumeroInt VARCHAR (10) DEFAULT 'S/N',
	Colonia VARCHAR (50),
	DelMun VARCHAR (50),
	Estado VARCHAR (50),
	CP VARCHAR (6),
	Email VARCHAR (50),
	Telefono VARCHAR (15),
	Responsable VARCHAR (60),
	FechaAlta VARCHAR (12),
	CapacidadAlmacen FLOAT
)

CREATE TABLE Cliente(
	IdCliente INT PRIMARY KEY IDENTITY(1,1),
	RazonSocial VARCHAR (150),
	RFC VARCHAR (20),
	Calle VARCHAR (50),
	Numero VARCHAR (10),
	Colonia VARCHAR (30),
	DelMun VARCHAR (30),
	Estado VARCHAR (30),
	CP VARCHAR (10),
	CalleFiscal VARCHAR (50),
	NumeroFiscal VARCHAR (10),
	ColoniaFiscal VARCHAR (30),
	DelMunFiscal VARCHAR (30),
	EstadoFiscal VARCHAR (30),
	CPFiscal VARCHAR (10),
	NRA VARCHAR (20),
	Contacto VARCHAR (50),
	Tel1 VARCHAR (15),
	Tel2 VARCHAR (15),
	Email VARCHAR (50),
	FechaAlta varchar (12)
)
CREATE TABLE Operador(
	IdOperador INT PRIMARY KEY IDENTITY(1,1),
	IdTransportadora INT,
	Nombre VARCHAR(50),
	ApellidoP VARCHAR (50),
	ApellidoM VARCHAR(50),
	Telefono1 VARCHAR(15),
	Telefono2 VARCHAR (15),
	NoLicencia VARCHAR(30),
	VigenciaLicencia VARCHAR(12),
	Estatus VARCHAR(10),
	Alta VARCHAR(12)
)



CREATE TABLE ManifiestoEntrada(
	IdManifiesto VARCHAR(10) PRIMARY KEY,
	IdCliente INT,
	IdTransportadora INT,
	IdUnidad INT,
	IdUnidad2 INT,
	IdOperador INT,
	IdEmpresa INT,
	FechaEmbarque VARCHAR(12),
	FechaDestino VARCHAR(12),
	FechaEntregaManifiesto VARCHAR(12),
	FechaManifiesto VARCHAR(12),
	Estatus VARCHAR(30)
)

CREATE TABLE IdMaterialSeleccion(
	IdMaterialesSeleccion INT PRIMARY KEY IDENTITY(1,1),
	IdManifiestoEntrada INT,
	Material VARCHAR(150),
	Envase VARCHAR(50),
	CantidadEnvase INT,
	PesoEnvase FLOAT,
	PesoNeto FLOAT,
	PesoBruto FLOAT,
	Unidad VARCHAR(5),
)

CREATE TABLE Consecutivo(
	Tabla VARCHAR(20),
	Valor INT DEFAULT 1, 
)
