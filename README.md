## Alunos:
### Murilo Matheus Ruiz
### Carlos Eduardo da Silva

## Descrição:
Trabalho realizado para a matéria de Web-Servidor com o intuito de apresentar o terceiro projeto para avaliação. O projeto trata-se de uma api que realiza consultas, inserções, atualizações e deleções no banco de dados do sistema da pizzaria dos outros projetos.

## Documentação:
Utilizamos o Xampp para inicializarmos o MySQL, desta forma, o Apache e o MySQL precisam estar ativos;
Coloque a pasta no 'htdocs' do XAMPP e navegue pelo CMD até a pasta da API (no htdocs);
Copie o '.env.example' e crie um '.env' com as informações do seu banco de dados (coloque o seu DB_USERNAME e o DB_PASSWORD);

Precisamos utilizar alguns comandos no CMD para 'ligar' a API;
Começando com o "composer install" ao qual vai instalar os pacotes necessários do laravel;
depois utilizaremos o "php artisan migrate" que vai servir para a construçao do banco de dados utilizando as migrations;
e por fim, coloque o comando "php artisan serve" serve para 'ligar' o servidor da API.

Para o teste da API utilizamos o Insomnia;
Será necessário importar o arquivo lilcoxas-insomniaimport.json para execução dos testes;
Devido a autenticação necessária para as rotas somente os testes de registro e login foram automatizados;
Para as demais rotas, faz-se necessário utilizar um token já criado via registro ou login.

## Features:
Criação do banco de dados;
CRUD;
Rotas estruturadas;
Autenticação;

## Atividades:
### *Murilo Matheus Ruiz*
Criação da rota e controller de Flavor e Size;
Padronização de mensagens de retorno para todos os métodos dos controllers;
Tratamento de erros de todos os métodos dos controllers.
Autenticação API Token via Sanctum;

### *Carlos Eduardo da Silva*
Criação das Migrations;
Criação dos Models;
Criação da rota e controller de Dough e Sauce;
Realização do README.
Validação de testes por meio do Insomnia.
