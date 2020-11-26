<?php
$pdo=new PDO("mysql:host=localhost;dbname=invoicesys;charset=utf8",'root','');


function actSQL($action,$tableName,$updateData,$condition){
  global $pdo;
  foreach($condition as $column => $value){
    $where[]="`$column`='$value'";
    $columns[]=$column;
    $values[]=$value;
  }
  switch ($action){
    case 'select':
      $sql="select * from `$tableName` where implode("&&", $where)";
      break;
    case 'add':
      $sql="insert into `$tableName`(`implode("`,`",$columns)`) values('implode("','",$values)')";  
      break;
    case 'delete':
      $sql="delete from `$tableName` where implode("&&", $where)";
      break;
    case 'update':
      foreach($updateData as $c => $v){
        $set[]="`$column`='$value'";
      }
      $sql="update `$tableName` implode(",", $set) set where implode("&&", $where)"; 
      break;
  }
  $pdo->query($sql);
}





?>