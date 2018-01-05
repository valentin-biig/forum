Valouleloup issue bundle test
========================

The goal of this library is to test the bundle [**valouleloup/issue-bundle**][90]

## Overview
 
 * Docker (nginx, php-fpm, mysql, phpmyadmin, elasticsearch)
 * Symfony 3.4
 * Valouleloup/IssueBundle

## Install
 
 Create a ` .env ` file with the configuration in ` .env.dist `
 
 ` docker-compose build `
 
 ` docker-compose up -d `
 
 ` docker-compose start `
 
 ` composer install `
 
#### Container
 
 ` docker-compose exec php bash `
 
#### Fixtures
  
  ` bin/console do:sc:up --force `
  
  ` bin/console do:fi:lo `
  
#### Index posts in elasticsearch (for search)

  ` bin/console issue:elastic:populate `
 
#### Issue bundle endpoint
 
 First, register one user here :
 
 [http://localhost:8091/register][92]
 
 Then login :
 
 [http://localhost:8091/login][93]
 
 And go to the main page :
 
 [http://localhost:8091/issue-bundle/themes/][91]
 

[90]: https://github.com/Valouleloup/IssueBundle
[91]: http://localhost:8091/issue-bundle/themes/
[92]: http://localhost:8091/register
[93]: http://localhost:8091/login

