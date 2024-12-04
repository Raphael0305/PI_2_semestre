DELIMITER $$
	CREATE PROCEDURE Pro_excluirMarmita(IN p_IDMarmita INT)
	BEGIN 
		DELETE FROM marmita_ingredi WHERE ID_marmita = p_IDMarmita;	
		DELETE FROM marmitas WHERE ID_marmita = p_IDMarmita;	
	END $$
	
DELIMITER ;

SELECT * FROM alerta_estoque_baixo;
SELECT * FROM ingrediente;
SELECT * FROM marmitas;
SELECT * FROM marmita_ingredi;
SELECT * FROM pedidos;
SELECT * FROM usuario;

CALL addMarmita();