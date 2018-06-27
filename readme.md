Guia de Instalação ------------------------------------------

1 - Primeiro é necessário ter um servidor com a versão 7 ou superior do PHP e banco de dados MySQL

2 - Clone o projeto pelo git, execute o cmd e dentro da pasta raiz execute o comando "composer install"

3 - Copie o arquivo .env.example dentro da pasta raiz do projeto e utilize para criar um arquivo .env com os dados do seu database

4 - Execute o comando "php artisan key:generate" para gerar uma chave para o projeto

4 - Dentro da pasta raíz do projeto execute o comando "npm install"

5 - Execute o comando "php artisan migrate" para criar as tabelas

6 - Execute o comando "php artisan serve"

7 - Entre em http://localhost:8000 ou na porta que tiver escolhido e o projeto estará sendo executado

8 - O sistema já vem com um usuário default com os seguintes dados para teste:

	Login: teste@teste.com.br
	Senha: 1234testsystem