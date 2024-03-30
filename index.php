<?php
if(file_exists(__DIR__.'\config.php')){
    require_once __DIR__.'\config.php';
}else{
    throw new Exception("config.php file does not exist");
}
if (file_exists('core/bootstrap.php')){
    require_once 'core/bootstrap.php';
}else{
    throw new Exception("bootstrap.php file does not exist");
}


