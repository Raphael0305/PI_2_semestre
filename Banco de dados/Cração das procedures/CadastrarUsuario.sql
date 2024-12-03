DELIMITER $$
CREATE PROCEDURE addUsuario (IN p_nome VARCHAR(100), IN p_email VARCHAR(100), IN p_senha VARCHAR(100), IN p_telefone VARCHAR(100),IN p_Nivel VARCHAR(20))
BEGIN 
	INSERT INTO usuario(nome,email,senha,telefone,nivel_acesso) VALUE(p_nome,p_email,p_senha,p_telefone,p_Nivel);
END $$
DELIMITER ; 


CALL addUsuario('Maria', 'maria@email.com', 'senha123', '11987654321', 'administrador');


