use figuras;

DELIMITER $
CREATE PROCEDURE newClient(
	in nombre_c varchar(25),
    in app_c varchar(25),
    in apm_c varchar(25),
    in phone_c varchar(10),
    
    in mail_c varchar(60),
    in pass_c varchar(20)
)
begin
	declare lastID int;
    set lastID = 0;
	insert into usuarios(usuarios.nombre, usuarios.app, usuarios.apm, usuarios.mail, usuarios.telefono, usuarios.pass, usuarios.tipo, usuarios.fecha) values(nombre_c, app_c, apm_c, mail_c, phone_c, pass_c, '2', DATE(NOW()));
end
$

DELIMITER $
CREATE PROCEDURE newPresupuesto(
	in sol int,
    in med varchar(25),
    in pos char(1),
    in tipo varchar(90),
    in aca varchar(30),
    in pin varchar(30),
    in pz int,
    in price decimal(7,2),
    in com mediumtext
)
begin
	INSERT INTO presupuestos (solicito, medidas, posicion, tipo_uso, acabado, pintura, piezas, precio, comentarios) VALUES
    (sol, med, pos, tipo, aca, pin, pz, price, com);
end
$

DELIMITER $
CREATE PROCEDURE newDomicilio(
    in us int,
    in street varchar(80),
    in clave int,
    in ref varchar(160)
)
begin
INSERT INTO domicilio (fk_user, calle, cp, referencia) VALUES (us,UPPER(street), clave, UPPER(ref));
end
$




DELIMITER $
CREATE PROCEDURE setPrice(
    in pres int,
    in fecha date,
    in price decimal(7,2)
)
begin
    INSERT INTO pedido(presu, entrega, estado, total) values (pres,fecha,'1',price);
end
$