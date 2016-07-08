CREATE TABLE users (
	user_id INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	user_name VARCHAR(30) NOT NULL,
	user_last_name VARCHAR(15) NOT NULL,
	user_role_id INT(1) UNSIGNED NOT NULL,
	user_password CHAR(32) NOT NULL,
	user_email VARCHAR(255) NOT NULL,
	user_address VARCHAR(60) NOT NULL,
	user_phoneNumber VARCHAR(15) NOT NULL
)