--- FALTA DEFINIR QUIEN VENDIO EL LIBRO

-- 1 Persona
  -- Coordinador
INSERT INTO Persona VALUE (null, 'Luis', 'Fernando', 'Gutierrez', 'Villca', '1111111', 'LP', 'M', '1997-10-12', 'La Paz', 'Bolivia', 'La Paz', 'Universitario', 'Universidad Adventista de Boliva', 'Ingenieria', 'Ingenieria Petrolera', 78829032, null);
  -- Lider
INSERT INTO Persona VALUE (null, 'Jhonny', null, 'Gutierrez', null, '2222222', 'LP', 'M', '1997-10-12', 'La Paz', 'Bolivia', 'La Paz', 'Universitario', 'Universidad Adventista de Boliva', 'Ingenieria', 'Ingenieria Petrolera', 78829032, null);
INSERT INTO Persona VALUE (null, 'Rdrigo', 'Luis', 'Poma', 'Mollo', '5555555', 'LP', 'M', '1997-10-12', 'La Paz', 'Uruguay', 'Mar del Sur', 'Universitario', 'Universidad Adventista de Boliva', 'Ingenieria', 'Ingenieria Petrolera', 78829032, null);
INSERT INTO Persona VALUE (null, 'Gustavo', null, 'Cerezo', null, '6666666-1f', 'OR', 'M', '1997-10-12', 'La Paz', 'Colombia', 'Bogoto', 'Universitario', 'Universidad Adventista de Boliva', 'Ingenieria', 'Ingenieria Petrolera', 78829032, null);
INSERT INTO Persona VALUE (null, 'Saul', 'Salomon', 'Mamani', 'Choque', '7777777', 'LP', 'M', '1997-10-12', 'La Paz', 'Peru', 'La Plata', 'Universitario', 'Universidad Adventista de Boliva', 'Ingenieria', 'Ingenieria Petrolera', 78829032, null);
  -- Coolportor
INSERT INTO Persona VALUE (null, 'Rodrigo', 'Alex', 'Paz', 'Santos', '3333333', 'LP', 'M', '1997-10-12', 'La Paz', 'Bolivia', 'La Paz', 'Universitario','Universidad Adventista de Boliva',  'Ingenieria', 'Ingenieria Petrolera', 78829032, null);
INSERT INTO Persona VALUE (null, 'Jhonatan', 'Elias', 'Esuar', 'Santos', '4444444', 'SC', 'M', '1997-10-12', 'La Paz', 'Bolivia', 'La Paz', 'Universitario','Universidad Adventista de Boliva',  'Ingenieria', 'Ingenieria Petrolera', 78829032, null);

-- 2 Union
INSERT INTO Unionn VALUE (null, 'Boliviana');

-- 3 Rol de Usuario
INSERT INTO RolUsuario VALUE(null, "Coordinador");
INSERT INTO RolUsuario VALUE(null, "Lider");
INSERT INTO RolUsuario VALUE(null, "Colportor");

-- 4 Categoria
INSERT INTO Categoria VALUE (null, 'Medicina');
INSERT INTO Categoria VALUE (null, 'Historia');
INSERT INTO Categoria VALUE (null, 'Cocina');

-- 5 Tipo de Venta
INSERT INTO TipoVenta VALUE (null, 'Contado');
INSERT INTO TipoVenta VALUE (null, 'Cotas');

-- 6 Cliente
INSERT INTO Cliente VALUE (null, 'David', null, 'Apaza', 'Gutierrez', 'El Alto - Zaragoza', 78900987, null);
INSERT INTO Cliente VALUE (null, 'Jimena', 'Guadalupe', 'Gutierrez', 'Estrada', 'Caranavi - Villa Elena', 79022645, null);
INSERT INTO Cliente VALUE (null, 'Rut', 'Nayeli', 'Gutierrez', 'Villca', 'El Alto - Cosmos', 745992334, null);

-- 7 Tipo de Gasto Camapaña
INSERT INTO tipo VALUE (null, 'Agua');
INSERT INTO tipo VALUE (null, 'Luz');
INSERT INTO tipo VALUE (null, 'Alquiler');
INSERT INTO tipo VALUE (null, 'Telefono');
INSERT INTO tipo VALUE (null, 'Internet');

-- 8 Tipo de Campaña
INSERT INTO TipoCampana VALUE (null, 'Invierno');
INSERT INTO TipoCampana VALUE (null, 'Verano');

-- 9 Mision
INSERT INTO Mision VALUE (null, 1, 'Mision Boliviana Occidental');
INSERT INTO Mision VALUE (null, 1, 'Mision Boliviana Central');
INSERT INTO Mision VALUE (null, 1, 'Mision Oriente Boliviano');

-- 10 Zona
INSERT INTO Zona VALUE (null, 'Vinto', 80, null);
INSERT INTO Zona VALUE (null, 'Quillacollo', 10, null);
INSERT INTO Zona VALUE (null, 'Sacaba', 15, null);
INSERT INTO Zona VALUE (null, 'Caranavi', 30, null);
INSERT INTO Zona VALUE (null, 'Sipe Sipe', 50, null);

-- 11 Deposito
INSERT INTO Deposito VALUE (null, 2, 00001, '200.50');
INSERT INTO Deposito VALUE (null, 3, 00002, '100.50');
INSERT INTO Deposito VALUE (null, 4, 00003, '40.00');
INSERT INTO Deposito VALUE (null, 5, 00004, '10.00');
INSERT INTO Deposito VALUE (null, 6, 00005, '10.00');

-- 12 Libro
INSERT INTO Libro VALUE (null, 1, 'Poder Medicinal de las Frutas', 'El libro contiene el secreto de todas las frutas', '100.00', '200.00', null);
INSERT INTO Libro VALUE (null, 2, 'Biblia', 'El libro contiene el nuevo y antigo Testamento', '150.00', '300.00', null);
INSERT INTO Libro VALUE (null, 3, 'El Cheff Jhonny SAN', 'El libro contiene miles de resetas de platos y como preapararlos', '80.00', '160.00', null);

-- 13 Usuarios
  -- Coordinador
INSERT INTO Usuario VALUE(null, 1, 1, "Lgutierrez", "1111111", TRUE);
  -- Lider
INSERT INTO Usuario VALUE(null, 2, 2, "Jgutierrez", "2222222", TRUE);
INSERT INTO Usuario VALUE(null, 2, 3, "Rpoma", "5555555", TRUE);
INSERT INTO Usuario VALUE(null, 2, 4, "Gcerezo", "6666666", FALSE);
INSERT INTO Usuario VALUE(null, 2, 5, "Smamani", "7777777", FALSE);
  -- Coolportor
INSERT INTO Usuario VALUE(null, 3, 6, "jhonny", "4444444", TRUE);
INSERT INTO Usuario VALUE(null, 3, 7, "Rpaz", "3333333", TRUE);

-- 14 Campaña
INSERT INTO Campana VALUE (null, 1, 1, 1, 'Salvando', '2016-06-11', '2016-08-11', 2017, TRUE);
INSERT INTO Campana VALUE (null, 1, 2, 1, 'Sigueme', '2017-06-11', '2017-08-11', 2017, TRUE);

-- 15 Grupo
INSERT INTO Grupo VALUE (null, 1, 1, 2, 'Asael', 'Vinto chico', null);
INSERT INTO Grupo VALUE (null, 2, 1, 3, 'Malaquias', 'Zaragoza', null);
INSERT INTO Grupo VALUE (null, 3, 1, 4, 'Hijos de Habraham', 'Caranavi', null);

-- 16 Asignacion Libro
INSERT INTO AsignacionLibro VALUE (null, 6, 1, '2017-06-11', 5 );
INSERT INTO AsignacionLibro VALUE (null, 6, 2, '2017-06-11', 5 );
INSERT INTO AsignacionLibro VALUE (null, 6, 3, '2017-06-11', 5 );
INSERT INTO AsignacionLibro VALUE (null, 7, 1, '2017-06-11', 2 );
INSERT INTO AsignacionLibro VALUE (null, 7, 2, '2017-06-11', 2 );

-- 17 Devolucion
INSERT INTO Devolucion VALUE (null, 1, 1, 1, '2017-08-11' );
INSERT INTO Devolucion VALUE (null, 2, 1, 1, '2017-08-11' );

-- 18 Compras
INSERT INTO Compras VALUE (null, 1, 1, 1, '2017-08-11' );
INSERT INTO Compras VALUE (null, 2, 1, 1, '2017-08-11' );

-- 19 Venta
INSERT INTO Venta VALUE (null, 1, 1, 1, '2017-07-09');
INSERT INTO Venta VALUE (null, 1, 2, 2, '2017-07-09');
INSERT INTO Venta VALUE (null, 2, 3, 3, '2017-07-09');

-- 20 Pagos
INSERT INTO Pagos VALUE (null, 3, '2017-07-09', '100.50');
INSERT INTO Pagos VALUE (null, 3, '2017-07-15', '100.50');

-- 21 Grupo Persona
INSERT INTO GrupoPersona VALUE (null, 1, 3);
INSERT INTO GrupoPersona VALUE (null, 1, 6);
INSERT INTO GrupoPersona VALUE (null, 1, 7);

-- 22 Gasto Campaña
INSERT INTO GastoCampana VALUE (null, 1, 1, '10.50');
INSERT INTO GastoCampana VALUE (null, 2, 1, '12.50');
INSERT INTO GastoCampana VALUE (null, 3, 1, '22.00');
INSERT INTO GastoCampana VALUE (null, 4, 1, '50.00');

-- 23 Libro Campaña
INSERT INTO LibroCampana VALUE (null, 1, 1, 10, '2017-06-01');
INSERT INTO LibroCampana VALUE (null, 2, 1, 50, '2017-06-01');
