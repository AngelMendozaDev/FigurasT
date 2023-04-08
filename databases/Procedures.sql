use figuras;

DELIMITER $
CREATE PROCEDURE newClient(
	in nombre_c varchar(25),
    in app_c varchar(25),
    in apm_c varchar(25),
    in fecha_n date,
    in phone_c varchar(10),
    
    in mail_c varchar(60),
    in pass_c varchar(20),
    in foto_c varchar(20)
)
begin
	declare lastID int;
    set lastID = 0;
	insert into person(nombre, app, apm, fecha_nac, phone) values(nombre_c, app_c, apm_c, fecha_n, phone_c);
    SET lastID = LAST_INSERT_ID();
    insert into users(id_user, mail, pass, foto, tipo) values (lastID, mail_c, pass_c, foto_c, '2');
end
$