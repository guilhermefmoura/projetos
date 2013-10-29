-- alterar a tabela para campo numérico
alter table conta modify valor_compra decimal(10,2);
-- alterando o tamanho do campo id da conta
alter table conta modify cod_conta int(30);
-- alterando o tamanho do campo da conta histórico
alter table conta modify cod_conta_historico int(20);
-- alterando o tamanho do campo do lançamento 
alter table conta modify cod_lancamento int(30);

-- altera FK da tabela conta
ALTER TABLE conta
	ADD CONSTRAINT 'FK_CONTA_USUARIO' FOREIGN KEY ('cod_usuario_log') REFERENCES 'usuario' ('cod_usuario'),
	ADD CONSTRAINT 'FK_CONTA_CLIENTE' FOREIGN KEY ('cod_cliente') REFERENCES 'cliente' ('cod_cliente'),
	ADD CONSTRAINT 'FK_CONTA_LANCAMENTO' FOREIGN KEY ('cod_lancamento') REFERENCES 'lancamento_caixa' ('cod_lancamento');