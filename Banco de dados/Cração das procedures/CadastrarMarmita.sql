DELIMITER $$ 
CREATE PROCEDURE addMarmita(
	IN p_nomeM VARCHAR (100),
	IN p_preco DECIMAL (10,2),
	
	IN p_qtdeMarmita1 DECIMAL(10,2),
	IN p_qtdeMarmita2 DECIMAL(10,2),
	IN p_qtdeMarmita3 DECIMAL(10,2),
	
	IN P_IDingred1 INT, 
	IN P_IDingred2 INT, 
	IN P_IDingred3 INT 
)

BEGIN 

	DECLARE var_idMarmita INT;
	
	INSERT INTO marmitas(nomeMarmita,preco) VALUE (p_nomeM,p_preco);
	
	SET var_idMarmita = LAST_INSERT_ID();
	
	INSERT INTO marmita_ingredi(ID_marmita, ID_ingrediente, quantidade_necessaria) 
	VALUES (var_idMarmita, P_IDingred1, p_qtdeMarmita1),
	       (var_idMarmita, P_IDingred2, p_qtdeMarmita2),
	       (var_idMarmita, P_IDingred3, p_qtdeMarmita3);
END $$

DELIMITER ;









