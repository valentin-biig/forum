Valouleloup issue bundle test
========================

The goal of this library is to test the bundle [**valouleloup/issue-bundle**][90]

# Overview
 
 * Docker (nginx, php-fpm, mysql, phpmyadmin, elasticsearch)
 * Symfony 3.4
 * Valouleloup IssueBundle
 * FOS User Bundle
 * HWI OAuthBundle (Gitlab connect)

# Install
 
 ##### 1) Create a ` .env ` file with the configuration in ` .env.dist `
 
 Replace variables with good values :
 
 ```
 NGINX_PORT=8091
 PHPMYADMIN_PORT=8081
  
 MYSQL_USER=user
 MYSQL_PASSWORD=password
 MYSQL_DATABASE=issue
 MYSQL_ALLOW_EMPTY_PASSWORD=no
  
 PMA_HOST=mysql
 PMA_USER=user
 PMA_PASSWORD=password
  
 MATTERMOST_WEBHOOK=YourIncomingWebhook
 ```
 
 ##### 2) Build images
 
 ` docker-compose build `
 
 ##### 3) Create containers
 
 ` docker-compose up -d `
 
 ##### 4) Start containers
 
 ` docker-compose start `
 
 ##### 5) Composer install
 
 ` composer install `
 
## Container
 
 ##### 6) Connect to the php container
 
 ` docker-compose exec php bash `
 
### Fixtures
  
  ##### 7) Update database schema
  
  ` bin/console do:sc:up --force `
  
  ##### 8) Load fixtures
  
  ` bin/console do:fi:lo `
  
### Assets (Optional)

  If styles are not loaded correctly :
  
  ` bin/console assets:install `
  
### Index posts in elasticsearch (Optional)

  For Search :

  ` bin/console issue:elastic:populate `
 
# Usage
 
 Login to the application with your gitlab account :
 
 [http://localhost:8091/login][93]
 
 If you are not redirected automatically, go to :
 
 [http://localhost:8091/issue-bundle/themes/][91]
 
# Configuration

 You change change the configuration inside ` parameters.yml ` :
 
 ```yml
 
 gitlab_client_id: 'yourId'
 gitlab_client_secret: 'yourSecret'
 gitlab_domain: 'http://gitlab-domain.fr'
  
 elastic_host: 'elasticsearch'
 elastic_port: 9200
 ``` 
 

[90]: https://github.com/Valouleloup/IssueBundle
[91]: http://localhost:8091/issue-bundle/themes/
[93]: http://localhost:8091/login

