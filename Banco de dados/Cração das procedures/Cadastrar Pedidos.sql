DELIMITER $$
CREATE PROCEDURE cadastrarPedido(IN p_nome VARCHAR(100),IN p_quantidade INT , IN p_dataEntrega date, IN ID_marmita int)
BEGIN 
	INSERT INTO pedidos (nomeCliente, quantidade, dataEntrega, ID_marmita) 
	VALUE (p_nome,p_quantidade,p_dataEntrega,ID_marmita);
END $$ 
DELIMITER ; 




SELECT * FROM ingrediente;
SELECT * FROM marmitas;
SELECT * FROM marmita_ingredi;
SELECT * FROM pedidos;

DELETE FROM pedidos;