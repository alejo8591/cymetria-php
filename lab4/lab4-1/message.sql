CREATE TABLE message(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	message_text TEXT,
	message_date DATE NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

INSERT INTO message SET
message_text = "Hola esto es una prueba de los datos que estoy almacenando el tabla `message`",
message_date = "2014-09-30";

INSERT INTO message (message_text, message_date) VALUES (
	"Hola esto es otro mensaje de prueba",
	"2014-09-29"
);

UPDATE message SET message_date = "2014-09-30" WHERE id = "2";

