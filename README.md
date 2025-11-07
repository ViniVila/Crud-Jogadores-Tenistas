Sistema de Gerenciamento de Banco de Dados MySQL com PHP
Este projeto consiste em um sistema completo de conexão e manipulação de banco de dados MySQL utilizando PHP, com exemplos de CRUD (Create, Read, Update, Delete) e interface web.

📁 Estrutura do Projeto
Arquivos Principais:
conexao.php - Arquivo de conexão com o banco de dados

index.php - Exemplo de consulta e exibição de dados

index1.php - Formulário para inserção de dados

index2.php - Sistema completo de CRUD para jogadores

style.css - Estilos para a interface web

LLLL.png - Imagem de fundo para o sistema

🗄️ Configuração do Banco de Dados
Configurações de Conexão:
Servidor: localhost

Usuário: root

Senha: Senai@118

Banco de Dados: Teste_conexao ou formulario

Tabelas Utilizadas:
Tabela pessoas (para index.php e index1.php):
sql
CREATE TABLE pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    idade INT
);
Tabela Jogadores (para index2.php):
sql
CREATE TABLE Jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jogador VARCHAR(255),
    ano_mundial INT
);
🚀 Funcionalidades
1. Conexão Básica (conexao.php)
Estabelece conexão com o banco de dados MySQL

Verifica se a conexão foi bem-sucedida

Retorna mensagem de status

2. Leitura de Dados (index.php)
Consulta dados da tabela pessoas

Exibe informações: ID, Nome e Idade

Utiliza fetch_assoc() para recuperar dados

3. Inserção de Dados (index1.php)
Formulário HTML para cadastro de pessoas

Campos: Nome (texto) e Idade (número)

Processamento via método POST

Mensagem de confirmação de inserção

4. Sistema Completo CRUD (index2.php)
Cadastro: Formulário para adicionar novos jogadores

Listagem: Tabela com todos os jogadores cadastrados

Edição: Funcionalidade de editar registros existentes

Exclusão: Remoção de registros com confirmação

Contador: Exibe total de jogadores cadastrados

🎨 Interface (style.css)
Design responsivo com imagem de fundo

Tabelas estilizadas com bordas vermelhas

Formulários com efeitos visuais

Cores temáticas em vermelho (#c40000)

Efeitos de hover e transições suaves

🔧 Requisitos do Sistema
Servidor web com PHP (Apache, Nginx, etc.)

MySQL/MariaDB

Extensão mysqli habilitada no PHP

📋 Como Usar
Configure o banco de dados com as credenciais em conexao.php

Crie as tabelas necessárias no MySQL

Coloque os arquivos no diretório do servidor web

Acesse os diferentes arquivos conforme necessidade:

index.php para ver dados

index1.php para cadastrar pessoas

index2.php para o sistema completo de jogadores

⚠️ Observações de Segurança
As credenciais do banco estão hardcoded - em produção, use variáveis de ambiente

Validação de entrada básica implementada

Confirmação para exclusão de registros

Proteção contra alguns tipos de injeção SQL

🛠️ Possíveis Melhorias
Implementar prepared statements para maior segurança

Adicionar paginação para grandes volumes de dados

Incluir validação mais robusta nos formulários

Adicionar sistema de autenticação

Implementar busca e filtros

Este projeto serve como base para sistemas web com PHP e MySQL, demonstrando operações fundamentais de banco de dados em uma aplicação web.
