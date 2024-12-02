DELIMITER $$

CREATE procedure Pro_atualizaIngredientes ( IN p_ID_Marmita INT , p_Quantidade INT)

BEGIN 
	DECLARE var_qtde_necessaria INT ;
	DECLARE var_ID_Ingrediente INT ;
	DECLARE var_Qtde_Atual INT;
	DECLARE var_QtdeGasta INT;
	DECLARE var_resultado INT;
	DECLARE fim INT DEFAULT 0;
	DECLARE var_message TEXT;
			
	DECLARE cur CURSOR FOR 
		SELECT quantidade_necessaria,ID_ingrediente 
		FROM marmita_ingredi
		WHERE ID_marmita = p_ID_Marmita;
		
	DECLARE CONTINUE handler FOR NOT FOUND SET fim = TRUE;
	
	
	OPEN cur;
	
	read_loop: LOOP
		FETCH cur INTO var_qtde_necessaria, var_ID_Ingrediente;
		
		IF fim THEN 
			LEAVE read_loop;
		END IF;
		
		SELECT quantidade INTO var_Qtde_Atual FROM ingrediente WHERE ID_ingrediente = var_ID_Ingrediente; 
		
		SET var_QtdeGasta = p_Quantidade * var_qtde_necessaria;

		SET var_resultado = var_Qtde_Atual - var_QtdeGasta;

		IF var_resultado >= 0 THEN
			UPDATE ingrediente SET quantidade = quantidade - var_QtdeGasta WHERE ID_ingrediente = var_ID_Ingrediente;
		ELSE 
            SET var_message = CONCAT('Estoque insuficiente para o ingrediente ID: ', CAST(var_ID_Ingrediente AS CHAR));
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = var_message;
		END IF;
		
	END LOOP;

	
	CLOSE cur;
	
END $$

DELIMITER ; 



