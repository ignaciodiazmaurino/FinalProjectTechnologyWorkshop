DELETE FROM CABINS;

INSERT INTO CABINS (CABIN_NAME, CABIN_DESCRIPTION, CABIN_MAX_OCCUPANCY) VALUES
	('Cabaña 1',
	 	'Cabaña para cuatro personas ideal para disfrutar tus vacaciones en familia. Cuenta con amplia sala de estar con estufa hogar y sillones; Cocina con vajilla completa, cocina, horno a microhondas, horno electrico; dos habitaciones, una de ellas con cama matrimonial y la restante con dos camas de una plaza. Posee equipos de aire acondicionado en todas las habitaciones.',
	 	6),
	('Cabaña 2',
		'Cabaña para seis personas ideal para disfrutar tus vacaciones en familia. Cuenta con amplia sala de estar con estufa hogar y sillones; Cocina con vajilla completa, cocina, horno a microhondas, horno electrico; tres habitaciones, una de ellas con cama matrimonial y baño en suite con bañera para hidromasajes. Posee equipos de aire acondicionado en todas las habitaciones.',
		4);

DELETE FROM THUMBNAILS;

INSERT INTO THUMBNAILS (CABIN_ID, THUMBNAIL_PATH, THUMBNAIL_ALTERNATE_TEXT) VALUES 
	(0001, 'images/cabin1Th.jpg', 'Cabaña1'),
	(0002, 'images/cabin2Th.jpg', 'Cabaña2');

DELETE FROM IMAGES;

INSERT INTO IMAGES (CABIN_ID, IMAGE_PATH, IMAGE_ALTERNATE_TEXT) VALUES
	(0001, 'images/cabin1.jpg', 'Cabaña1'),
	(0001, 'images/cabin1_int1.jpg', 'Sala de estar'),
	(0001, 'images/cabin1_int2.jpg', 'Dormitorio'),
	(0001, 'images/cabin1_int3.jpg', 'Baño'),
	(0002, 'images/cabin2.jpg', 'Cabaña1'),
	(0002, 'images/cabin2_int1.jpg', 'Sala de estar'),
	(0002, 'images/cabin2_int2.jpg', 'Dormitorio'),
	(0002, 'images/cabin2_int3.jpg', 'Baño');


DELETE FROM AMENITIES;

INSERT INTO AMENITIES (AMENITY_CABIN_ID, AMENITY_TEXT) VALUES 
	(0001, 'reposeras para todos los ocupantes'),
	(0001, 'seis bicicletas'),
	(0001, 'dos sombrillas'),
	(0002, 'reposeras para todos los ocupantes'),
	(0002, 'seis bicicletas'),
	(0002, 'dos sombrillas');

DELETE FROM ROLES;

INSERT INTO ROLES (ROLE_ID, ROLE_NAME) values
	(0, 'ADMINISTRATOR'),
	(1, 'GUEST');

DELETE FROM USERS;

INSERT INTO USERS (USER_NAME, USER_LAST_NAME, USER_ROLE_ID, USER_PASSWORD, USER_EMAIL, USER_ADDRESS) VALUES
	('Ignacio',
		'Diaz',
		0,
		'sarasa',
		'mail_test@test.com',
		'Address test 123'
	);
