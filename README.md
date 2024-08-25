# WEBYA PROJECT

به README رسمی فریمورک PHP خوش آمدید! این فریمورک که مشابه لاراول است، طراحی شده تا توسعه برنامه‌های PHP را آسان‌تر و سریع‌تر کند.

## ویژگی‌ها

- **ساختار MVC**: پشتیبانی از معماری Model-View-Controller برای جداسازی منطق برنامه از لایه نمایش.
- **رابط پایگاه داده**: شامل ابزارهایی برای کار با پایگاه داده به صورت شی‌گرایانه.
- **سیستم روتینگ پیشرفته**: تعریف مسیرهای HTTP به سادگی با قابلیت مدیریت و سازماندهی بهتر.
- **کنترلرها و ویوها**: پشتیبانی از کنترلرها و ویوها برای نمایش محتوا به کاربر.
- **استفاده آسان**: مستندات جامع و API ساده که توسعه برنامه‌های کاربردی را سریع‌تر می‌کند.

## پیش‌نیازها

قبل از نصب و استفاده از این فریمورک، باید پیش‌نیازهای زیر را داشته باشید:

- PHP نسخه 7.4 یا بالاتر
- وب سرور (مانند Apache یا Nginx)
- Composer (مدیریت وابستگی‌ها در PHP)
- پایگاه داده (مانند MySQL، PostgreSQL و ...)

## نصب

### 1. کلون کردن مخزن

ابتدا، مخزن فریمورک را از GitHub کلون کنید:
```bash
git clone https://github.com/ilyajalayi/Webya.git

cd webya

php -S 127.0.0.1:3000
```
### 2. تنظیمات مسیرها

در پوشه route، فایل web.php را باز کنید و مانند نمونه زیر مسیرها را تعریف کنید:
```php
Route::get('/posts/:id','test');
Route::get('/posts/*','test');
Route::get('/posts/','test');
```
در پوشه controller نیز می‌توانید کنترلرهای خود را تعریف کنید. به عنوان مثال، test.php:
```php
<?php

class test{
    public $args;
    public $post=[
        [
            'title'=>'فریمورک webya',
            'header'=>'بیایید کمی درمورد فریمورک وبیا حرف بزنیم',
            'content'=>'فریم ورک وبیا یک فریمورک مانند لاراول با راحتی بهتر از لاراول و سرعت خیلی بالاتر و حجم 10 برابر کمتر! این فریمورک با php خام نوشته شده توسط ایلیا جلایی',
        ],
        [
            'title'=>'laravel',
            'header'=>'بیایید کمی درمورد فریمورک لاراول حرف بزنیم',
            'content'=>'فریم ورک لاراول و سرعت خیلی بالاتر و حجم 10 برابر کمتر از کد چرت شما! این فریمورک با php خام نوشته شده توسط نیمودونوم',
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
### 3. ایجاد قالب‌های نمایش

قالب‌های نمایشی (Views) را در پوشه views با فرمت test.view.php ایجاد کنید. برای نمایش یک قالب در کنترلر، از کد زیر استفاده کنید:
```php
View::render('test', $this->post[intval($this->args['id'])]);
```
به عنوان مثال، یک قالب ساده می‌تواند به این صورت باشد:
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
این فریمورک در حال توسعه است و من خوشحال می‌شوم که شما در توسعه آن همکاری کنید ;)

با تشکر، ایلیا جلائی ❤️.
