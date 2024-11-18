<?php
define("DBNAME","file");



function dd($array){
    echo "<pre>";   
    print_r($array);
    echo "</pre>";
}

function pdo($dbname){
    $dsn="mysql:host=localhost;charset=utf8;dbname=$dbname";
    $pdo=new PDO($dsn,'root','');
    return $pdo;
}
function all($table,...$arg)
{
    $totalArgs = count($arg);
    if($totalArgs>=1)
        $dbname=$arg[0];  
    else 
        $dbname=DBNAME;
    echo $totalArgs.",";
    echo $dbname;
    $dsn="mysql:host=localhost;chaset=utf8;dbname=$dbname";
    $pdo =new PDO($dsn,'root','');
    $all="select * from $table";
    $datas=$pdo->query($all)->fetchall(PDO::FETCH_ASSOC);
    return $datas;

    
}
function insert($table,$value1,$value2)
{
    $pdo=pdo(DBNAME);
    $sql="insert into ".$table." ";
    $sql=$sql.$value1." values ".$value2;
    echo $sql;
    return $pdo->exec($sql);

}

function del($table ,$where){
    $sql="delete from $table where $where";
    echo $sql;
    $pdo=pdo(DBNAME); 
    return  $pdo->exec($sql);
    
}

function find($table,$where){
    $sql="select count(id) from $table where $where";
    echo $sql;
    $pdo=pdo(DBNAME);
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);    
    return $row;
}
function update($table,$set,$where)
{
    $sql="update $table set $set where $where";
    echo $sql;
    $pdo=$pdo=pdo(DBNAME);
    return $pdo->exec($sql); 
}