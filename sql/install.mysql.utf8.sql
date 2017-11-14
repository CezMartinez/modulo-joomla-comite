CREATE TABLE IF NOT EXISTS `#__solicitudes` 
(
	`id_solicitud` 				  int(10) not null AUTO_INCREMENT,
	`nombre_trabajo`			  char(40) not null,
	`nombre_investigador`		char(100) not null,
	`anio`						      int(4) not null,
	`mes`						        int(11) not null,
	`numero_registro`			  char(12) not null,
	`tipo_trabajo`				  char(10) not null,
	`estado`				  			char(10) not null,
	`fecha_revision`			  TIMESTAMP not null,
	`fecha_aprobado`			  TIMESTAMP null,
	`fecha_devuelto`			  TIMESTAMP null,
	`fecha_rechazado`			  TIMESTAMP null,
	`fecha_creado`					TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	
	PRIMARY KEY(`id_solicitud`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

alter table `#__solicitudes` add constraint U_NOMBRE_TRABAJO UNIQUE (nombre_trabajo)