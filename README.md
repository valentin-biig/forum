Valouleloup issue bundle test
========================

The goal of this library is to test the bundle [**valouleloup/issue-bundle**][90]

## Overview
 
 * Docker (nginx, php-fpm, mysql, phpmyadmin)
 * Symfony 3.4

 ## Install
 
 Create a ` .env ` file with the configuration in ` .env.dist `
 
 ` docker-compose build `
 
 ` docker-compose up -d `
 
 ` docker-compose start `
 
 ` composer install `
 
 #### Container
 
 ` docker-compose exec php bash `
 
 #### Issue bundle endpoint
 
 [http://localhost:8091/issue-bundle/themes/][91]
 

[90]: https://github.com/Valouleloup/IssueBundle
[91]: http://localhost:8091/issue-bundle/themes/

