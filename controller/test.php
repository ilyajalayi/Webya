<?php

class test{
    public $args;
    public function __construct($arg)
    {
var_dump($arg);
        $this->args = $arg;
    }
    public function progress()
    {
        foreach ($this->args as $key=>$value){
            $this->args[$key] = $value . ' ❤';
        }
        return true;
    }

    public function return_view()
    {
        foreach ($this->args as $value){
            echo "
<center>
        <h1>hi ".$value."</h1><br>
        ";
        }


    }
} inc_view('test');