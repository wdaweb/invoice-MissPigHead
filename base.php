<?php
$pdo=new PDO("mysql:host=localhost;dbname=invoicesys;charset=utf8",'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

function actSQL($action,$tableName,$updateData,$whereDes){
  global $pdo;
  if(!empty($whereDes)){
    foreach($whereDes as $c => $v){
      $where[]="`$c`='$v'";
      $columns[]=$c;
      $values[]=$v;
    }
    $whereDes="where ".implode("&&", $where);
  }else{
    $whereDes='';
  }
  if(!empty($updateData)){
    foreach($updateData as $c => $v){
      $set[]="`$c`='$v'";
    }
    $setDes="set ".implode(",", $set);
  }else{
    $setDes='';
  }
  switch ($action){
    case 'select':
      $sql="select * from `".$tableName."` ".$whereDes;
      return $pdo->query($sql)->fetchAll();
    break;
    case 'add':
      $sql="insert into `".$tableName."`(`".implode("`,`",$columns)."`) values('".implode("','",$values);  
      return $pdo->exec($sql);
    break;
    case 'delete':
      $sql="delete from `".$tableName."` ".$whereDes;
      return $pdo->exec($sql);
    break;
    case 'update':
      $sql="update `".$tableName." ".$setDes." ".$whereDes;
      return $pdo->exec($sql);
    break;
  }
}


?>