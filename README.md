## Main

### Project title:<br>

• My blog

### Project description:<br>

*This is a simple blog with some amount of posts where users are able to leave their comments.<br>
It includes three pages: "Home", "Posts" and "About".
Home page consists of: hero image, recents news, a slider whit lasts comments, and a common additional information.
Posts' page consist of all posts on the blog, which users can open and comment on.*

•	Author: rk-pol 

## Requirements
•	PHP 8.1 or higher 
• 	Mysql

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone https://github.com/rk-pol/blog.git
composer install
php artisan key:generate
php artisan serve
```


## Before starting <br>
Create a database <br>
```
mysql
create database blog;
exit;
```

Setup the database credentials in the .env file <br>

Database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```
Migrate the tables
```
php artisan migrate
```	

Seed the tables
```
php artisan db:seed
```	
