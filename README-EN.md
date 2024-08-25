# WEBYA PROJECT

Welcome to the official README of the Webya PHP framework! This framework, inspired by Laravel, is designed to make PHP application development easier and faster.

## Features

- **MVC Architecture**: Supports the Model-View-Controller architecture for separating business logic from the presentation layer.
- **Database Interface**: Includes tools for working with databases in an object-oriented manner.
- **Advanced Routing System**: Easily define HTTP routes with better management and organization capabilities.
- **Controllers and Views**: Supports controllers and views for presenting content to the user.
- **Ease of Use**: Comprehensive documentation and a simple API make developing applications faster.

## Prerequisites

Before installing and using this framework, you should have the following prerequisites:

- PHP version 7.4 or higher
- Web server (like Apache or Nginx)
- Composer (PHP dependency management)
- Database (like MySQL, PostgreSQL, etc.)

## Installation

### 1. Clone the Repository

First, clone the framework repository from GitHub:
```bash
git clone https://github.com/ilyajalayi/Webya.git

cd webya

php -S 127.0.0.1:3000
```
### 2. Setting Up Routes

In the route folder, open the web.php file and define routes like the example below:
```php
Route::get('/posts/:id','test');
Route::get('/posts/*','test');
Route::get('/posts/','test');
```
In the controller folder, you can define your own controllers. For example, test.php:
```php
<?php

class test{
    public $args;
    public $post=[
        [
            'title'=>'Webya Framework',
            'header'=>'Let\'s talk a little about the Webya framework',
            'content'=>'Webya framework is a framework like Laravel with better ease than Laravel, much higher speed, and 10 times less size! This framework is written in raw PHP by Ilya Jalayi',
        ],
        [
            'title'=>'Laravel',
            'header'=>'Let\'s talk a little about the Laravel framework',
            'content'=>'Laravel framework with much higher speed and 10 times less size than your poor code! This framework is written in raw PHP by I do not know who',
        ]
    ];

    public function __construct($arg) {
        $this->args = $arg;
    }

    public function progress() {
        if(isset($this->args['id']) && isset($this->post) && count($this->post) > 0) {
            if (!empty($this->post[intval($this->args['id'])])) {
                // Logic here
            } else {
                echo '404 error!';
            }
        } else {
            echo '404 error!';
        }
        return true;
    }

    public function return_view() {
        View::render('test', $this->post[intval($this->args['id'])]);
    }
}
```
### 3. Creating View Templates

Create view templates in the views folder with the format test.view.php. To display a view in the controller, use the following code:
```php
View::render('test', $this->post[intval($this->args['id'])]);
```
For example, a simple view can be like this:
```html
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title?></title>
</head>
<body>
<center dir="rtl">
    <h1><?php echo $header?></h1>
    <h2><?php echo $content?></h2>
</center>
</body>
</html>
```
This framework is under development, and I would be happy to have you collaborate in its development 🤝 ;)

Thank you, Ilya Jalayi ❤️.
