CREATE TABLE IF NOT EXISTS '#__solicitudes' 
(
	'id_solicitud' 				int(10) not null AUTO_INCREMENT,
	'nombre_trabajo'			char(40) not null,
	'nombre_investigador'		char(100) not null,
	'anio'						int(4) not null,
	'mes'						int(11) not null,
	'numero_registro'			char(12) not null,
	'tipo_trabajo'				char(10) not null,
	'fecha_revision'			char(10) not null,
	'fecha_aprovado'			char(10) not null,
	'fecha_devuelto'			char(10) null,
	'fecha_rechazado'			char(10) null,
	
	PRIMARY KEY('id')
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;