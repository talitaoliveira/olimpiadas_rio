# Projeto olimpiadas_rio
Projeto de armazenamento de mensagens, e visualização as mensagens já inseridas

## Instalação:

#### 1. Banco de dados mysql (para criação foi utilizado o phpmyadmin)
1.1 Criar o banco de dados olimpiadas_rio com Agrupamento (Collation) : utf8_bin
1.2 Importar banco de dados que se encontra na raiz do projeto com o nome "olimpiadas_rio.sql"

#### 2. Colocar pasta do projeto no servidor

#### 3.Definir os valores das constantes de acesso ao banco de dados
3.1 Entrar na pasta **classes** que se encontra na raiz do projeto
3.2 Abrir o arquivo **config.php**
3.3 Alterar os **segundos parametros** das constantes :

**DB_HOST** - nome do servidor (se for local provavelmente é localhost)

**DB_NAME** - nome do banco de dados (criado anteriormente: **olimpiadas_rio**)

**DB_USER** - usuário do servidor

**DB_PASS** - senha do servidor
