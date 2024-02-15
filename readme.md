# The Blogger
A Simple Blog system for manage Users and thier Posts. 

## Tech Stack
- HTML/CSS/Bootstrap
- JS/AJax
- PHP/Laravel
- Blade Templete
- Vite

## Features
- User Authentication and Authorization
- Login and Registerion
- Email Activation and Reset Password Using Google smtp Server 
- Update User Profile and his Cover Image
- Full CRUD On Posts Model
- Live search With ajax About Specifc Post

## Comming Features
- Share on Social Media Platform
- Comments on Post
  
## About

Project Consist of  Post , User and Tag modules with MVC Design Pattern.

## Prerequisites
- XAMPP
- Git
- Composer
- NPM

## Installation

1- Update apache Virtual Host in apache/conf/extra/httpd-vhosts.conf
```bash
# // Add this section
  <VirtualHost *:80>
      DocumentRoot "your_xamp_htdocs_path\simple_blog\public"
      ServerName simpleBlog
  </VirtualHost>
```
2- Update Localhost Configration file on Windows System
```bash
# // Add this section
127.0.0.1 simpleBlog
# // Search about Localhost configration on Other OS 
```

3- Download Repo in Xampp/htdocs Path
```bash
git clone https://github.com/M0M0-NASR/simple_blog.git
```

4- Install Packeges with Composer and NPM
```bash
composer intall
npm install
```
5- Run Vite
```bash
npm run dev
```
6- Start Apache Server and Mysql server

7- Try and enjoy!!
