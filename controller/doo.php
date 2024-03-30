<?php

class doo{
    public $args;
    public function __construct($arg)
    {
var_dump($arg);
        $this->args = $arg;
    }
    public function progress()
    {
        foreach ($this->args as $key=>$value){
            $this->args[$key] = $value . ' - doo';
        }
        return true;
    }

    public function return_view()
    {
        foreach ($this->args as $value){
            echo "
<center>
        <h1 style='color: red'>hi ".$value."</h1><br>
        ";
        }


    }
} inc_view('test');