DELIMITER $$
CREATE PROCEDURE p_atualizaIngredi(in p_novaQtde INT, IN p_id_ingrediente INT, IN p_tipo ENUM('retirar', 'adicionar'))
BEGIN 
	
	IF p_tipo = 'retirar' then 
		UPDATE ingrediente  SET quantidade = quantidade - p_novaQtde  WHERE ID_ingrediente = p_id_ingrediente; 
	ELSE 
		UPDATE ingrediente  SET quantidade = quantidade + p_novaQtde  WHERE ID_ingrediente = p_id_ingrediente;  
	END IF;


END $$

DELIMITER ;

CALL p_atualizaIngredi(1, 1, 'retirar');



SELECT * FROM ingrediente;
SELECT * FROM marmitas;
SELECT * FROM marmita_ingredi;
SELECT * FROM pedidos;