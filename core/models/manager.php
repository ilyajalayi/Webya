<?php


class DB
{
    static function connect(){
        $dsn = "mysql:host=${db_host};dbname=${db_name};charset=${db_charset}";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        try {
            return new PDO($dsn,db_user,db_pass,$opt);


        }catch (\PDOException $e){

            throw new \PDOException($e->getMessage(),(int) $e->getCode());
        }
    }
}

$pdo=DB::connect();
//read obj mode
$stmt = $pdo->query('SELECT * FROM `user`');
while ($row = $stmt->fetchObject()){
    echo $row->name;
}
