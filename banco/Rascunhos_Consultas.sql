-- Primeira opção de matéria
SELECT a.NOME, a.SOBRENOME, d.NOME  FROM pes_info_pessoal a, pes_volunt b, pes_disciplina d, pes_disciplina_prof c 
WHERE b.VERSAO_PS = '2020-2' and b.ID_VOLUNT = a.ID_VOLUNT and c.ID_VOLUNT = a.ID_VOLUNT AND d.ID_DISCIPLINA = c.ID_DISCIPLINA and c.OPCAO = 1

-- Listar todas as opções
SELECT a.NOME, a.SOBRENOME, d.NOME, c.OPCAO FROM pes_info_pessoal a, pes_volunt b, pes_disciplina d, pes_disciplina_prof c
WHERE b.VERSAO_PS = '2020-2' and b.ID_VOLUNT = a.ID_VOLUNT and c.ID_VOLUNT = a.ID_VOLUNT AND d.ID_DISCIPLINA = c.ID_DISCIPLINA

-- Listar todas as opções ordenando
SELECT a.NOME, a.SOBRENOME, d.NOME, c.OPCAO FROM pes_info_pessoal a, pes_volunt b, pes_disciplina d, pes_disciplina_prof c
WHERE b.VERSAO_PS = '2020-2' and b.ID_VOLUNT = a.ID_VOLUNT and c.ID_VOLUNT = a.ID_VOLUNT AND d.ID_DISCIPLINA = c.ID_DISCIPLINA
ORDER BY a.NOME ASC, c.OPCAO ASC 

-- Pegar Todas Info
SELECT * FROM pes_volunt a, pes_info_pessoal b
WHERE a.IS_VOLUNT = b.ID_VOLUNT AND a.VERSAO_PS = '2020-2' AND a.TIPO_VOLUNTARIO = 'P'