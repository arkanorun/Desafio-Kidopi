# Projeto PHP KIDOPI
Este é um projeto PHP com css, htm e JS que utiliza o XAMPP como ambiente de desenvolvimento local, para rodar o APACHE e o MYSQL.

Requisitos:
PHP
XAMPP (ou outro servidor local)
Composer (para fazer importações de bibliotecas)
Banco de dados (o banco escolhido pela emprea para resolução deste desafio foi o MYSQL)
Usamos o editor de código-fonte vscode para a execução dos comandos.

## Rodando o Script do Banco de Dados
Certifique-se de que o servidor do banco de dados esteja em execução (o banco de dados que você escolher).
Execute o script Dump.sql (que está na raiz do projeto) em qualquer servidor MySQL.

## Configuração pra rodar o projeto localmente
Clone este repositório para o diretório do seu servidor local (se estiver usando o XAMPP sugerimos que o local seja na pasta htdocs).

vá até o diretório do projeto no terminal, .

Execute o comando composer install para instalar as dependências, incluindo o pacote vlucas/dotenv.

Renomeie o arquivo .env.example para .env.

No arquivo .env, configure as variáveis de ambiente do banco de dados de acordo com as configurações do seu ambiente local:

URL_DB='mysql:host=localhost;dbname=kidope';

_OBS:_ a url poderá mudar de acordo com a configuração do seu banco de dados, ex: dbname=consulta.

Certifique-se de substituir as variáveis de ambiente pelos valores corretos do seu ambiente local escolhido.
para o projeto foram utilizadas as seguintes variáveis de ambiente no arquivo .env

URL_DB='mysql:host=localhost;dbname=consulta'
USER_DB=root
PASS_DB=''

## Acesso no navegador
utilize a seguinte URL em seu navegador (foi utilizado o google chrome para o projeto)
http://localhost/kidopi/ para listar casos confirmados e mortes em país.
http://localhost/Desafio_Kidopi/?action=getCountry/ para listar a diferença da taxa de morte entre dois países.


![Sem título](https://github.com/arkanorun/Desafio-Kidopi/assets/124944071/9c092104-f0e8-43b7-a6d4-d896f3874b81)

