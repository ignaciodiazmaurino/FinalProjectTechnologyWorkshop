CREATE USER 'cabinreservationuser'@'localhost' IDENTIFIED BY 'cabinreservationuser01';
GRANT ALL PRIVILEGES ON reservations_db . * TO 'cabinreservationuser'@'localhost';