DELIMITER $$
	CREATE PROCEDURE Pro_ingredi_por_id_marmita (IN p_IDMarmita INT)
	BEGIN 
	
    	DECLARE id_existe INT;
   		DECLARE done INT DEFAULT 0;
    	DECLARE var_nomeIngrediente VARCHAR(255);
    	DECLARE var_idIngredi INT;
	 	
    	DECLARE cur CURSOR FOR
      	SELECT ID_ingrediente 
        	FROM marmita_ingredi 
        	WHERE ID_marmita = p_IDMarmita;

   		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
   	
     	SELECT COUNT(*) INTO id_existe
    	FROM marmita_ingredi
    	WHERE ID_marmita = p_IDMarmita;

    	IF id_existe = 0 THEN
        	SIGNAL SQLSTATE '45000'
      		SET MESSAGE_TEXT = 'Erro: ID não encontrado dog.';
    	END IF;  	
   	
		CREATE TEMPORARY TABLE IF NOT EXISTS temp_ingredientes (
    	nome_ingrediente VARCHAR(255)
		);	

    	OPEN cur;

    	read_loop: LOOP
        	FETCH cur INTO var_idIngredi; 
			
        	IF done THEN
            	LEAVE read_loop;  
        	END IF;
        
        	SELECT nome INTO var_nomeIngrediente 
        	FROM ingrediente 
        	WHERE ID_ingrediente = var_idIngredi;
        
        	INSERT INTO temp_ingredientes (nome_ingrediente) 
        	VALUES (var_nomeIngrediente);
   	END LOOP;

   CLOSE cur;

   SELECT nome_ingrediente FROM temp_ingredientes;

   DROP TEMPORARY TABLE IF EXISTS temp_ingredientes;
END $$
DELIMITER ;

CALL Pro_ingredi_por_id_marmita(1);
