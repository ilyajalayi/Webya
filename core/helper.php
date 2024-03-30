<?php
function createInstance($class, $param) {
    $path = DIR."\controller\\$class.php";
    if (file_exists($path)){
        require_once $path;
        if (class_exists($class)) {
            $obj =  new $class(empty($param) || $param===''?[]:$param);
            if(method_exists($obj, 'progress')&&method_exists($obj, 'return_view')) {
                return $obj;
            }else{
                throw new Exception('Class '.$class.' not "progress" and "return_view" method exists');
                return false;
            }
        } else {
            throw new Exception("Class $class does not exist");
            return false;
        }
    }else{
        throw new Exception("Class $class file does not exist");
        return false;
    }
}

function inc_file($path){
    if(file_exists($path)){
        require_once $path;
        return true;
    }else{
        throw new Exception("$path file does not exist");
        return false;
    }
}

function inc_view($path){
    $path = DIR."\\views\\$path.view.php";
    if(file_exists($path)){
        require_once $path;

    }else{
        throw new Exception("$path view file does not exist");

    }
}